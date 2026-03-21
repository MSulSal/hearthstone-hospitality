<?php

if (!defined("ABSPATH")) {
    exit;
}

function chama_inn_setup(): void
{
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("html5", ["search-form", "comment-form", "comment-list", "gallery", "caption", "style", "script"]);
    add_theme_support("custom-logo", [
        "height"      => 240,
        "width"       => 640,
        "flex-height" => true,
        "flex-width"  => true,
    ]);
    add_theme_support("responsive-embeds");
    add_theme_support("editor-styles");

    register_nav_menus([
        "primary" => __("Primary Menu", "chama-inn"),
    ]);
}
add_action("after_setup_theme", "chama_inn_setup");

function chama_inn_should_hide_page_hero(int $post_id): bool
{
    if ($post_id <= 0) {
        return false;
    }

    $slug = sanitize_title((string) get_post_field("post_name", $post_id));
    $hero_free_slugs = [
        "dining",
        "gift-shop",
        "service-requests",
    ];

    return in_array($slug, $hero_free_slugs, true);
}

function chama_inn_get_primary_nav_items(): array
{
    return [
        [
            "slug" => "home",
            "label" => __("Home", "chama-inn"),
            "fallback_path" => "/",
        ],
        [
            "slug" => "dining",
            "label" => __("Restaurant Orders", "chama-inn"),
            "fallback_path" => "/dining/",
        ],
        [
            "slug" => "gift-shop",
            "label" => __("Gift Shop", "chama-inn"),
            "fallback_path" => "/gift-shop/",
        ],
        [
            "slug" => "service-requests",
            "label" => __("Service Requests", "chama-inn"),
            "fallback_path" => "/service-requests/",
        ],
        [
            "slug" => "explore-chama",
            "label" => __("During Your Stay", "chama-inn"),
            "fallback_path" => "/explore-chama/",
        ],
        [
            "slug" => "contact",
            "label" => __("Front Desk / Contact", "chama-inn"),
            "fallback_path" => "/contact/",
        ],
    ];
}

function chama_inn_get_primary_nav_slugs(): array
{
    return array_map(static function (array $item): string {
        return sanitize_title((string) ($item["slug"] ?? ""));
    }, chama_inn_get_primary_nav_items());
}

function chama_inn_primary_menu_has_items(): bool
{
    $locations = get_nav_menu_locations();

    if (!is_array($locations) || empty($locations["primary"])) {
        return false;
    }

    $menu_id = (int) $locations["primary"];

    if ($menu_id <= 0) {
        return false;
    }

    $menu_items = wp_get_nav_menu_items($menu_id, [
        "update_post_term_cache" => false,
    ]);

    if (!is_array($menu_items)) {
        return false;
    }

    foreach ($menu_items as $menu_item) {
        if ($menu_item instanceof WP_Post && (string) $menu_item->post_status === "publish") {
            return true;
        }
    }

    return false;
}

function chama_inn_render_fallback_menu($args = []): void
{
    $menu_id = "primary-menu";
    $menu_class = "menu";

    if (is_object($args)) {
        if (!empty($args->menu_id)) {
            $menu_id = (string) $args->menu_id;
        }

        if (!empty($args->menu_class)) {
            $menu_class = (string) $args->menu_class;
        }
    } elseif (is_array($args)) {
        if (!empty($args["menu_id"])) {
            $menu_id = (string) $args["menu_id"];
        }

        if (!empty($args["menu_class"])) {
            $menu_class = (string) $args["menu_class"];
        }
    }

    echo '<ul id="' . esc_attr($menu_id) . '" class="' . esc_attr($menu_class) . '">';

    foreach (chama_inn_get_primary_nav_items() as $nav_item) {
        $slug = isset($nav_item["slug"]) ? sanitize_title((string) $nav_item["slug"]) : "";

        if ($slug === "") {
            continue;
        }

        $page = get_page_by_path($slug, OBJECT, "page");
        $link_label = isset($nav_item["label"]) ? (string) $nav_item["label"] : $slug;
        $link_url = isset($nav_item["fallback_path"]) ? (string) home_url((string) $nav_item["fallback_path"]) : (string) home_url("/");

        if ($page instanceof WP_Post) {
            $page_permalink = (string) get_permalink($page);

            if ($page_permalink !== "") {
                $link_url = $page_permalink;
            }
        }

        $item_classes = ["menu-item", "menu-item-type-post_type", "menu-item-object-page"];

        if (is_page($slug)) {
            $item_classes[] = "current-menu-item";
            $item_classes[] = "current_page_item";
        }

        echo '<li class="' . esc_attr(implode(" ", $item_classes)) . '">';
        echo '<a href="' . esc_url($link_url) . '">' . esc_html($link_label) . "</a>";
        echo "</li>";
    }

    echo "</ul>";
}

function chama_inn_enqueue_assets(): void
{
    wp_enqueue_style(
        "chama-inn-style",
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get("Version")
    );

    wp_enqueue_script(
        "chama-inn-navigation",
        get_theme_file_uri("assets/js/navigation.js"),
        [],
        wp_get_theme()->get("Version"),
        true
    );
}
add_action("wp_enqueue_scripts", "chama_inn_enqueue_assets");

function chama_inn_enqueue_editor_assets(): void
{
    add_editor_style("style.css");
}
add_action("after_setup_theme", "chama_inn_enqueue_editor_assets");

function chama_inn_get_color_schemes(): array
{
    return [
        "sunrise-plaster"  => __("Exterior Stucco (Default)", "chama-inn"),
        "sage-retreat"     => __("Dusty Sage", "chama-inn"),
        "moonstone-calm"   => __("Moonstone Calm (Cool)", "chama-inn"),
        "alpine-stillness" => __("Alpine Stillness (Cool)", "chama-inn"),
        "terracotta-dawn"  => __("Terracotta Dawn (Warm)", "chama-inn"),
        "rail-burgundy"    => __("Heritage Garnet (Accent)", "chama-inn"),
        "desert-contrast"  => __("Desert Contrast (Neutral)", "chama-inn"),
    ];
}

function chama_inn_sanitize_color_scheme(string $value): string
{
    $schemes = chama_inn_get_color_schemes();

    if (array_key_exists($value, $schemes)) {
        return $value;
    }

    return "sunrise-plaster";
}

function chama_inn_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section("chama_inn_design", [
        "title"       => __("Chama Inn Design", "chama-inn"),
        "priority"    => 35,
        "description" => __("Adjust visual presentation without editing code.", "chama-inn"),
    ]);

    $wp_customize->add_setting("chama_inn_color_scheme", [
        "default"           => "sunrise-plaster",
        "sanitize_callback" => "chama_inn_sanitize_color_scheme",
        "type"              => "theme_mod",
    ]);

    $wp_customize->add_control("chama_inn_color_scheme", [
        "label"       => __("Color Scheme", "chama-inn"),
        "description" => __("Switch between ready-made palettes for demos and client preference checks.", "chama-inn"),
        "section"     => "chama_inn_design",
        "type"        => "select",
        "choices"     => chama_inn_get_color_schemes(),
    ]);

}
add_action("customize_register", "chama_inn_customize_register");

function chama_inn_add_color_scheme_body_class(array $classes): array
{
    $scheme    = get_theme_mod("chama_inn_color_scheme", "sunrise-plaster");
    $scheme    = chama_inn_sanitize_color_scheme((string) $scheme);
    $classes[] = "chama-scheme-" . sanitize_html_class($scheme);

    return $classes;
}
add_filter("body_class", "chama_inn_add_color_scheme_body_class");

function chama_inn_redirect_legacy_guest_hub(): void
{
    if (!is_page("guest-hub") && !is_page("my-stay")) {
        return;
    }

    $home_page = get_page_by_path("home", OBJECT, "page");
    $target_url = $home_page instanceof WP_Post ? (string) get_permalink($home_page) : (string) home_url("/");

    if ($target_url === "") {
        $target_url = (string) home_url("/");
    }

    wp_safe_redirect($target_url, 301);
    exit;
}
add_action("template_redirect", "chama_inn_redirect_legacy_guest_hub");

function chama_inn_get_packaged_logo_uri(): string
{
    $relative_paths = [
        "assets/images/client-logo.webp",
        "assets/images/client-logo.png",
        "assets/images/client-logo.jpg",
        "assets/images/client-logo.jpeg",
        "assets/images/client-logo.svg",
    ];

    foreach ($relative_paths as $relative_path) {
        $absolute_path = get_theme_file_path($relative_path);

        if (file_exists($absolute_path)) {
            return get_theme_file_uri($relative_path);
        }
    }

    return "";
}

function chama_inn_get_home_hero_gallery_uris(): array
{
    $relative_paths = [
        // Curated: high-quality landscape assets only, excluding files that contain text overlays.
        "assets/images/csi-assets/csi-15.jpg",
        "assets/images/csi-assets/csi-20.jpg",
        "assets/images/csi-assets/csi-41.jpg",
        "assets/images/csi-assets/csi-32.jpg",
        "assets/images/csi-assets/csi-51.jpg",
        "assets/images/csi-assets/csi-49.jpg",
    ];

    $uris = [];

    foreach ($relative_paths as $relative_path) {
        $absolute_path = get_theme_file_path($relative_path);

        if (!file_exists($absolute_path)) {
            continue;
        }

        $uris[] = (string) get_theme_file_uri($relative_path);
    }

    if (empty($uris)) {
        $fallback_path = "assets/images/csi-assets/csi-31.jpg";

        if (file_exists(get_theme_file_path($fallback_path))) {
            $uris[] = (string) get_theme_file_uri($fallback_path);
        }
    }

    return array_values(array_unique($uris));
}

function chama_inn_get_logo_variant_uri(string $context = "default"): string
{
    $context = sanitize_key($context);

    $context_paths = [
        "header-home" => [
            "assets/images/chama_logo_color_spectrum/trim_blue_green.png",
            "assets/images/chama_logo_color_spectrum/dusty_sage.png",
            "assets/images/chama_logo_bg_extremes/warm_white.png",
        ],
        "header"    => [
            "assets/images/chama_logo_color_spectrum/trim_blue_green.png",
            "assets/images/chama_logo_color_spectrum/dusty_sage.png",
            "assets/images/chama_logo_color_spectrum/soft_charcoal.png",
        ],
        "footer"    => [
            "assets/images/chama_logo_color_spectrum/soft_charcoal.png",
            "assets/images/chama_logo_color_spectrum/iron_brown.png",
        ],
        "hero"      => [
            "assets/images/chama_logo_bg_extremes/warm_white.png",
            "assets/images/chama_logo_color_spectrum/dusty_sage.png",
            "assets/images/chama_logo_color_spectrum/golden_adobe.png",
            "assets/images/chama_logo_color_spectrum/honey_oak.png",
        ],
        "admin-bar" => [
            "assets/images/chama_logo_color_spectrum/golden_adobe.png",
            "assets/images/chama_logo_color_spectrum/honey_oak.png",
            "assets/images/chama_logo_color_spectrum/trim_blue_green.png",
        ],
        "login"     => [
            "assets/images/chama_logo_color_spectrum/soft_charcoal.png",
            "assets/images/chama_logo_color_spectrum/iron_brown.png",
        ],
    ];

    $paths = $context_paths[$context] ?? [];

    $paths = array_merge($paths, [
        "assets/images/client-logo.webp",
        "assets/images/client-logo.png",
        "assets/images/client-logo.jpg",
        "assets/images/client-logo.jpeg",
        "assets/images/client-logo.svg",
    ]);

    foreach ($paths as $relative_path) {
        $absolute_path = get_theme_file_path($relative_path);

        if (file_exists($absolute_path)) {
            return get_theme_file_uri($relative_path);
        }
    }

    return "";
}

function chama_inn_print_branding_styles(): void
{
    $admin_logo_uri = chama_inn_get_logo_variant_uri("admin-bar");
    $login_logo_uri = chama_inn_get_logo_variant_uri("login");

    if ($admin_logo_uri === "" && $login_logo_uri === "") {
        return;
    }

    if ($admin_logo_uri === "") {
        $admin_logo_uri = $login_logo_uri;
    }

    if ($login_logo_uri === "") {
        $login_logo_uri = $admin_logo_uri;
    }

    ?>
    <style id="chama-inn-admin-branding">
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before {
            content: "";
            display: block;
            width: 18px;
            height: 18px;
            margin-top: 7px;
            background-image: url('<?php echo esc_url($admin_logo_uri); ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon,
        #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon {
            width: 24px;
        }

        body.login h1 a {
            background-image: url('<?php echo esc_url($login_logo_uri); ?>');
            background-size: contain;
            background-position: center;
            width: 280px;
            max-width: 84vw;
        }
    </style>
    <?php
}
add_action("admin_head", "chama_inn_print_branding_styles");
add_action("login_head", "chama_inn_print_branding_styles");

function chama_inn_get_core_page_blueprint(): array
{
    return [
        [
            "title"   => __("Home", "chama-inn"),
            "slug"    => "home",
            "excerpt" => __("Guest-facing stay app for restaurant orders, gift shop checkout, service requests, and front desk help.", "chama-inn"),
            "pattern" => "patterns/inn-conversion-page.php",
        ],
        [
            "title"   => __("Restaurant Orders", "chama-inn"),
            "slug"    => "dining",
            "excerpt" => __("Order flow, timing, and service windows during your stay.", "chama-inn"),
            "pattern" => "patterns/dining-page.php",
        ],
        [
            "title"   => __("Gift Shop", "chama-inn"),
            "slug"    => "gift-shop",
            "excerpt" => __("Guest-side catalog and pickup-ready purchase flow.", "chama-inn"),
            "pattern" => "patterns/gift-shop-page.php",
        ],
        [
            "title"   => __("Service Requests", "chama-inn"),
            "slug"    => "service-requests",
            "excerpt" => __("Request housekeeping, amenities, and front-desk support.", "chama-inn"),
            "pattern" => "patterns/service-requests-page.php",
        ],
        [
            "title"   => __("During Your Stay", "chama-inn"),
            "slug"    => "explore-chama",
            "excerpt" => __("What to do at the inn and in Chama during your current stay.", "chama-inn"),
            "pattern" => "patterns/explore-chama-page.php",
        ],
        [
            "title"   => __("Front Desk / Contact", "chama-inn"),
            "slug"    => "contact",
            "excerpt" => __("Direct contact, urgent help path, and stay support details.", "chama-inn"),
            "pattern" => "patterns/contact-inquiry-page.php",
        ],
    ];
}

function chama_inn_load_pattern_content(string $relative_path): string
{
    $absolute_path = get_theme_file_path($relative_path);

    if (!file_exists($absolute_path)) {
        return "";
    }

    $content = include $absolute_path;

    if (!is_string($content)) {
        return "";
    }

    return trim($content);
}

function chama_inn_get_or_create_nav_menu(string $menu_name): int
{
    $menu = wp_get_nav_menu_object($menu_name);

    if ($menu instanceof WP_Term) {
        return (int) $menu->term_id;
    }

    $menu_id = wp_create_nav_menu($menu_name);

    if (is_wp_error($menu_id)) {
        return 0;
    }

    return (int) $menu_id;
}

function chama_inn_menu_has_page(int $menu_id, int $page_id): bool
{
    $items = wp_get_nav_menu_items($menu_id);

    if (!is_array($items)) {
        return false;
    }

    foreach ($items as $item) {
        if ((int) $item->object_id === $page_id) {
            return true;
        }
    }

    return false;
}

function chama_inn_get_menu_item_id_for_page(int $menu_id, int $page_id): int
{
    $items = wp_get_nav_menu_items($menu_id);

    if (!is_array($items)) {
        return 0;
    }

    foreach ($items as $item) {
        if ((int) $item->object_id === $page_id) {
            return (int) $item->ID;
        }
    }

    return 0;
}

function chama_inn_set_default_nav_menu(array $pages_by_slug): void
{
    $menu_id = chama_inn_get_or_create_nav_menu(__("Primary Menu", "chama-inn"));

    if ($menu_id <= 0) {
        return;
    }

    $menu_order = chama_inn_get_primary_nav_slugs();

    $legacy_slugs_to_remove = ["weddings-events", "stay-rooms", "guest-hub", "about-our-story"];
    $menu_items = wp_get_nav_menu_items($menu_id);

    if (is_array($menu_items)) {
        foreach ($menu_items as $menu_item) {
            if (!$menu_item instanceof WP_Post || $menu_item->object !== "page") {
                continue;
            }

            $object_id = (int) $menu_item->object_id;

            if ($object_id <= 0) {
                continue;
            }

            $linked_page = get_post($object_id);

            if (!($linked_page instanceof WP_Post) || $linked_page->post_type !== "page") {
                continue;
            }

            $linked_slug = sanitize_title((string) $linked_page->post_name);

            $is_legacy_item = in_array($linked_slug, $legacy_slugs_to_remove, true);
            $is_non_core_item = !in_array($linked_slug, $menu_order, true);

            if ($is_legacy_item || $is_non_core_item) {
                wp_delete_post((int) $menu_item->ID, true);
            }
        }
    }

    $menu_position = 1;

    foreach ($menu_order as $slug) {
        if (!isset($pages_by_slug[$slug])) {
            continue;
        }

        $page_id = (int) $pages_by_slug[$slug];

        if ($page_id <= 0) {
            continue;
        }

        $existing_menu_item_id = chama_inn_get_menu_item_id_for_page($menu_id, $page_id);

        if ($existing_menu_item_id > 0) {
            wp_update_nav_menu_item($menu_id, $existing_menu_item_id, [
                "menu-item-position" => $menu_position,
            ]);
            $menu_position++;
            continue;
        }

        wp_update_nav_menu_item($menu_id, 0, [
            "menu-item-object-id" => $page_id,
            "menu-item-object"    => "page",
            "menu-item-type"      => "post_type",
            "menu-item-status"    => "publish",
            "menu-item-position"  => $menu_position,
        ]);
        $menu_position++;
    }

    $locations            = get_nav_menu_locations();
    $locations["primary"] = $menu_id;
    set_theme_mod("nav_menu_locations", $locations);
}

function chama_inn_ensure_core_pages(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $blueprint     = chama_inn_get_core_page_blueprint();
    $created_count = 0;
    $pages_by_slug = [];

    foreach ($blueprint as $page_definition) {
        if (
            !is_array($page_definition)
            || !isset($page_definition["title"], $page_definition["slug"], $page_definition["excerpt"], $page_definition["pattern"])
        ) {
            continue;
        }

        $slug     = sanitize_title((string) $page_definition["slug"]);
        $existing = get_page_by_path($slug, OBJECT, "page");

        if ($existing instanceof WP_Post) {
            $pages_by_slug[$slug] = (int) $existing->ID;

            $sync_payload = [
                "ID" => (int) $existing->ID,
            ];
            $needs_sync = false;

            if ((string) $existing->post_title !== (string) $page_definition["title"]) {
                $sync_payload["post_title"] = (string) $page_definition["title"];
                $needs_sync = true;
            }

            if ((string) $existing->post_excerpt !== (string) $page_definition["excerpt"]) {
                $sync_payload["post_excerpt"] = (string) $page_definition["excerpt"];
                $needs_sync = true;
            }

            if ($needs_sync) {
                wp_update_post($sync_payload);
            }

            continue;
        }

        $pattern_content = chama_inn_load_pattern_content((string) $page_definition["pattern"]);

        $created_page_id = wp_insert_post([
            "post_title"   => (string) $page_definition["title"],
            "post_name"    => $slug,
            "post_excerpt" => (string) $page_definition["excerpt"],
            "post_content" => $pattern_content,
            "post_status"  => "publish",
            "post_type"    => "page",
        ], true);

        if (is_wp_error($created_page_id)) {
            continue;
        }

        $created_count++;
        $pages_by_slug[$slug] = (int) $created_page_id;
    }

    if (isset($pages_by_slug["home"]) && (int) $pages_by_slug["home"] > 0) {
        update_option("show_on_front", "page");
        update_option("page_on_front", (int) $pages_by_slug["home"]);
    }

    chama_inn_set_default_nav_menu($pages_by_slug);

    if ($created_count > 0) {
        update_option("chama_inn_created_pages_count", $created_count, false);
    }
}
add_action("admin_init", "chama_inn_ensure_core_pages");

function chama_inn_refresh_dining_layout_pattern(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $migration_version = (int) get_option("chama_inn_dining_layout_version", 0);

    if ($migration_version >= 1) {
        return;
    }

    $page = get_page_by_path("dining", OBJECT, "page");

    if (!($page instanceof WP_Post)) {
        update_option("chama_inn_dining_layout_version", 1, false);
        return;
    }

    $current_content = (string) $page->post_content;
    $legacy_markers = [
        "Order from your room",
        "Browse the live room-service menu",
        "Guest note field for requests or allergies",
    ];

    $should_refresh = false;

    foreach ($legacy_markers as $marker) {
        if (strpos($current_content, $marker) !== false) {
            $should_refresh = true;
            break;
        }
    }

    if ($should_refresh) {
        $pattern_content = chama_inn_load_pattern_content("patterns/dining-page.php");

        if ($pattern_content !== "") {
            wp_update_post([
                "ID"           => (int) $page->ID,
                "post_content" => $pattern_content,
            ]);
        }
    }

    update_option("chama_inn_dining_layout_version", 1, false);
}
add_action("admin_init", "chama_inn_refresh_dining_layout_pattern");

function chama_inn_created_pages_notice(): void
{
    if (!current_user_can("manage_options")) {
        return;
    }

    $created_count = (int) get_option("chama_inn_created_pages_count", 0);

    if ($created_count <= 0) {
        return;
    }

    delete_option("chama_inn_created_pages_count");

    echo '<div class="notice notice-success is-dismissible"><p>';
    echo esc_html(sprintf(
        /* translators: %d: number of pages auto-created */
        __("Chama Inn setup created %d core pages and assigned the primary menu.", "chama-inn"),
        $created_count
    ));
    echo "</p></div>";
}
add_action("admin_notices", "chama_inn_created_pages_notice");

function chama_inn_clear_home_excerpt_once(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $migration_version = (int) get_option("chama_inn_home_excerpt_version", 0);

    if ($migration_version >= 1) {
        return;
    }

    $home_page = get_page_by_path("home", OBJECT, "page");

    if ($home_page instanceof WP_Post) {
        $excerpt = trim((string) $home_page->post_excerpt);

        if ($excerpt !== "") {
            wp_update_post([
                "ID" => (int) $home_page->ID,
                "post_excerpt" => "",
            ]);
        }
    }

    update_option("chama_inn_home_excerpt_version", 1, false);
}
add_action("admin_init", "chama_inn_clear_home_excerpt_once");

function chama_inn_migrate_seeded_copy(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $target_version = 15;
    $current_version = (int) get_option("chama_inn_copy_migration_version", 0);

    if ($current_version >= $target_version) {
        return;
    }

    $replacements = [
        "Restored railroad inn in Chama, New Mexico" => "Boutique railroad-town inn in Chama, New Mexico",
        "restored railroad inn in chama, new mexico" => "Boutique railroad-town inn in Chama, New Mexico",
        "A lightened historic inn with clean comfort, welcoming service, and courtyard calm in the heart of Chama." => "A lightened Chama inn with clean comfort, welcoming service, and courtyard calm in the heart of town.",
        "Historic place. Modern comfort." => "Quiet place. Modern comfort.",
        "Use this card for a room category that highlights historic details and classic character." => "Character-forward rooms with thoughtful details, comfortable bedding, and practical layouts for train travelers and weekend guests.",
        "Use this card for bright rooms, premium bedding, and a slower restorative atmosphere." => "Bright, quiet rooms designed for restorative nights and easy mornings before exploring Chama.",
        "Use this card for families or longer stays looking for space and easy downtown/train access." => "Extra-space options for couples, families, and longer stays who want walkable convenience and mountain-town calm.",
        "Use this section to show flowers, outdoor seating, fresh air, and the quiet rhythm guests remember after their stay." => "Courtyard seating, mountain air, and a slower rhythm make the inn feel both grounded and quietly premium.",
        "Use this trust area for verified, review-backed themes: clean rooms, friendly service, train convenience, and restful stays." => "Review themes consistently mention clean rooms, friendly hospitality, and easy train-station convenience.",
        "A historic inn, thoughtfully restored for modern Chama stays" => "A boutique Chama inn with regional character and modern comfort",
        "Use this page to connect heritage, restoration, and the inn's long-term vision for guests and community." => "Use this page to connect place, hospitality style, and the inn's long-term vision for guests and community.",
        "Intimate celebrations in a restored Chama setting" => "Intimate celebrations in a calm Chama setting",
        "Feature up to three room experiences here so guests can choose quickly and confidently." => "Choose from nine thoughtfully prepared rooms designed for comfort, quiet sleep, and easy access to the train and downtown.",
        "Keep the tone intimate and restorative, not resort-scale." => "Ideal for couples, families, and rail travelers who want a welcoming home base in Chama.",
        "Present current food-and-beverage reality clearly, then leave space for future additions such as expanded dinner service, market items, and a fuller bar program." => "Dining around the inn keeps your stay easy: quick coffee options, walkable local favorites, and growing on-site offerings over time.",
        "<li>On-site convenience for train travelers and weekend guests</li><li>Seasonal and local flavor where possible</li><li>Clear operating hours and easy access to menus</li>" => "<li>Easy options before and after your train day</li><li>Walkable choices in the heart of town</li><li>Clear hours and simple dining guidance at check-in</li>",
        "<strong>Dining note:</strong> Keep promises specific and credible. Show what guests can enjoy now, then label upcoming additions as \"coming soon.\"</p>" => "<strong>Dining update:</strong> The inn continues to expand guest dining options while keeping clear, reliable recommendations available now.</p>",
        "Lead with the railroad experience, then curate a short set of nearby outdoor and local-town highlights." => "Start with the historic railroad, then explore nearby trails, local shops, and mountain-town views at your own pace.",
        "Keep this final section simple: one booking action, one inquiry action, and clear contact details." => "Planning a train weekend, event trip, or quiet getaway? Our team can help you choose the right room and dates.",
        "Dining that supports the stay" => "Restaurant and dining",
        "Review themes consistently mention clean rooms, friendly hospitality, and easy train-station convenience." => "Recent five-star reviews repeatedly call out clean rooms, friendly service, and easy train access.",
        ];

    $slugs_to_scan = [
        "home",
        "dining",
        "gift-shop",
        "service-requests",
        "explore-chama",
        "about-our-story",
        "contact",
    ];

    $updated_pages = 0;

    foreach ($slugs_to_scan as $slug) {
        $page = get_page_by_path($slug, OBJECT, "page");

        if (!($page instanceof WP_Post)) {
            continue;
        }

        $is_elementor_managed = (string) get_post_meta((int) $page->ID, "_elementor_edit_mode", true) !== "";

        if ($is_elementor_managed) {
            continue;
        }

        $original_content = (string) $page->post_content;
        $updated_content  = strtr($original_content, $replacements);

        if ($slug === "home") {
            $legacy_markers = [
                "Stay / Rooms",
                "Book your stay or send an inquiry",
                "Planning a train weekend, event trip, or quiet getaway?",
                "A calm mountain stay, supported by modern inn operations",
                "Spa style comfort in historic Chama, New Mexico",
                "Use this section for your primary promise.",
                "Restored railroad inn in Chama, New Mexico",
                "restored railroad inn in chama, new mexico",
                "Boutique railroad-town inn in Chama, New Mexico",
                "Temporary demo images. Replace with current client-owned photos before production launch.",
                "Client-provided image set applied for this draft. Swap individual photos in Theme Editor if needed.",
                "Clean, comfortable, cozy, and right across from the station.",
                "Quietly luxurious stays across from the Cumbres and Toltec depot",
                "chama-brand-mark",
                "csi-32.jpg",
                "csi-30.jpg",
                "Review themes consistently mention clean rooms, friendly hospitality, and easy train-station convenience.",
                "Welcome to your stay app",
                "Use this app to place orders, request service, and get help from the front desk while you are at the inn.",
                "Open My Stay",
                "[chama_guest_action_grid]",
                "Restaurant Orders",
                "Service Requests",
            ];
            $should_refresh_home = false;

            foreach ($legacy_markers as $marker) {
                if (strpos($updated_content, $marker) !== false) {
                    $should_refresh_home = true;
                    break;
                }
            }

            if (strpos($updated_content, "[chama_guest_action_grid]") === false) {
                $should_refresh_home = true;
            }

            if ($should_refresh_home) {
                $fresh_home_pattern = chama_inn_load_pattern_content("patterns/inn-conversion-page.php");
                $updated_content = $fresh_home_pattern;
            }
        }

        if ($slug === "stay-rooms") {
            $should_refresh_stay = strpos($updated_content, "Room Category One") !== false
                || strpos($updated_content, "Replace with room summary, occupancy, and signature features.") !== false
                || strpos($updated_content, "Nine guest rooms with clean comfort, friendly service, and walkable access to the train depot and downtown Chama.") !== false;

            if ($should_refresh_stay) {
                $fresh_stay_pattern = chama_inn_load_pattern_content("patterns/stay-rooms-page.php");

                if ($fresh_stay_pattern !== "") {
                    $updated_content = $fresh_stay_pattern;
                }
            }
        }

        if ($slug === "about-our-story") {
            $should_refresh_about = strpos($updated_content, "Use this page to connect place, hospitality style, and the inn's long-term vision for guests and community.") !== false
                || strpos($updated_content, "Story timeline") !== false
                || strpos($updated_content, "What guests experience") !== false;

            if ($should_refresh_about) {
                $fresh_about_pattern = chama_inn_load_pattern_content("patterns/about-story-page.php");

                if ($fresh_about_pattern !== "") {
                    $updated_content = $fresh_about_pattern;
                }
            }
        }

        if ($slug === "explore-chama") {
            $should_refresh_explore = strpos($updated_content, "Keep this page curated and concise. Lead with the railroad experience, then add local highlights.") !== false
                || strpos($updated_content, "Need help planning?") !== false
                || strpos($updated_content, "Explore Chama") !== false
                || strpos($updated_content, "Railroad heritage, mountain air, and local discovery") !== false;

            if ($should_refresh_explore) {
                $fresh_explore_pattern = chama_inn_load_pattern_content("patterns/explore-chama-page.php");

                if ($fresh_explore_pattern !== "") {
                    $updated_content = $fresh_explore_pattern;
                }
            }
        }

        if ($slug === "dining") {
            $should_refresh_dining = strpos($updated_content, "Service hours") !== false
                || strpos($updated_content, "Planned expansions") !== false
                || strpos($updated_content, "[chama_room_service_app]") === false;

            if ($should_refresh_dining) {
                $fresh_dining_pattern = chama_inn_load_pattern_content("patterns/dining-page.php");

                if ($fresh_dining_pattern !== "") {
                    $updated_content = $fresh_dining_pattern;
                }
            }
        }

        if ($slug === "service-requests") {
            $should_refresh_service_requests = strpos($updated_content, "Guests should be able to ask for help in less than a minute.") !== false
                || strpos($updated_content, "Implementation note:") !== false
                || strpos($updated_content, "[chama_service_request_app]") === false;

            if ($should_refresh_service_requests) {
                $fresh_service_requests_pattern = chama_inn_load_pattern_content("patterns/service-requests-page.php");

                if ($fresh_service_requests_pattern !== "") {
                    $updated_content = $fresh_service_requests_pattern;
                }
            }
        }

        if ($slug === "gift-shop") {
            $should_refresh_gift_shop = strpos($updated_content, "Featured categories") !== false
                || strpos($updated_content, "Operations readiness") !== false
                || strpos($updated_content, "Sample catalog (demo data)") === false
                || strpos($updated_content, "Chama Rail Mug") === false;

            if ($should_refresh_gift_shop) {
                $fresh_gift_shop_pattern = chama_inn_load_pattern_content("patterns/gift-shop-page.php");

                if ($fresh_gift_shop_pattern !== "") {
                    $updated_content = $fresh_gift_shop_pattern;
                }
            }
        }

        if ($updated_content === $original_content) {
            continue;
        }

        wp_update_post([
            "ID"           => (int) $page->ID,
            "post_content" => $updated_content,
        ]);

        $updated_pages++;
    }

    update_option("chama_inn_copy_migration_version", $target_version, false);

    if ($updated_pages > 0) {
        update_option("chama_inn_copy_migration_count", $updated_pages, false);
    }
}
add_action("admin_init", "chama_inn_migrate_seeded_copy");

function chama_inn_copy_migration_notice(): void
{
    if (!current_user_can("manage_options")) {
        return;
    }

    $updated_pages = (int) get_option("chama_inn_copy_migration_count", 0);

    if ($updated_pages <= 0) {
        return;
    }

    delete_option("chama_inn_copy_migration_count");

    echo '<div class="notice notice-success is-dismissible"><p>';
    echo esc_html(sprintf(
        /* translators: %d: number of pages updated */
        __("Chama Inn content update applied to %d page(s), including sample menu and gift shop catalog blocks.", "chama-inn"),
        $updated_pages
    ));
    echo "</p></div>";
}
add_action("admin_notices", "chama_inn_copy_migration_notice");

function chama_inn_register_block_patterns(): void
{
    if (!function_exists("register_block_pattern")) {
        return;
    }

    if (function_exists("register_block_pattern_category")) {
        register_block_pattern_category("chama-inn", [
            "label" => __("Chama Inn", "chama-inn"),
        ]);
    }

    $pattern_registry = [
        "inn-conversion-page" => [
            "file"        => "patterns/inn-conversion-page.php",
            "title"       => __("Guest App Home (QR Entry)", "chama-inn"),
            "description" => __("Guest-first homepage for in-stay actions opened from room QR codes.", "chama-inn"),
        ],
        "stay-rooms-page" => [
            "file"        => "patterns/stay-rooms-page.php",
            "title"       => __("Interior: Rooms and Booking", "chama-inn"),
            "description" => __("Prospective-guest room browse page kept as secondary to in-stay flows.", "chama-inn"),
        ],
        "dining-page" => [
            "file"        => "patterns/dining-page.php",
            "title"       => __("Interior: Restaurant Orders", "chama-inn"),
            "description" => __("Guest-side restaurant ordering and timing communication surface.", "chama-inn"),
        ],
        "gift-shop-page" => [
            "file"        => "patterns/gift-shop-page.php",
            "title"       => __("Interior: Gift Shop", "chama-inn"),
            "description" => __("Guest-side catalog and pickup flow for gift shop items.", "chama-inn"),
        ],
        "service-requests-page" => [
            "file"        => "patterns/service-requests-page.php",
            "title"       => __("Interior: Service Requests", "chama-inn"),
            "description" => __("Housekeeping and support request surface for active guests.", "chama-inn"),
        ],
        "explore-chama-page" => [
            "file"        => "patterns/explore-chama-page.php",
            "title"       => __("Interior: During Your Stay", "chama-inn"),
            "description" => __("What to do at the inn and in Chama during your current stay.", "chama-inn"),
        ],
        "about-story-page" => [
            "file"        => "patterns/about-story-page.php",
            "title"       => __("Interior: About and Story", "chama-inn"),
            "description" => __("Optional brand-story page kept secondary to in-stay app flows.", "chama-inn"),
        ],
        "contact-inquiry-page" => [
            "file"        => "patterns/contact-inquiry-page.php",
            "title"       => __("Interior: Front Desk and Contact", "chama-inn"),
            "description" => __("Direct support contact page for guests who need quick assistance.", "chama-inn"),
        ],
    ];

    foreach ($pattern_registry as $slug => $pattern) {
        if (!is_array($pattern) || !isset($pattern["file"], $pattern["title"], $pattern["description"])) {
            continue;
        }

        $pattern_file = get_theme_file_path((string) $pattern["file"]);

        if (!file_exists($pattern_file)) {
            continue;
        }

        $pattern_content = include $pattern_file;

        if (!is_string($pattern_content) || trim($pattern_content) === "") {
            continue;
        }

        register_block_pattern("chama-inn/" . $slug, [
            "title"       => $pattern["title"],
            "description" => $pattern["description"],
            "categories"  => ["chama-inn"],
            "content"     => $pattern_content,
        ]);
    }
}
add_action("init", "chama_inn_register_block_patterns");
