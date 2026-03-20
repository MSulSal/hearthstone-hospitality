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

function chama_inn_enqueue_assets(): void
{
    wp_enqueue_style(
        "chama-inn-style",
        get_stylesheet_uri(),
        [],
        wp_get_theme()->get("Version")
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

    $wp_customize->add_setting("chama_inn_header_cta_page", [
        "default"           => 0,
        "sanitize_callback" => "absint",
        "type"              => "theme_mod",
    ]);

    $wp_customize->add_control("chama_inn_header_cta_page", [
        "label"       => __("Header CTA Page", "chama-inn"),
        "description" => __("Choose which page the Book Your Stay button opens.", "chama-inn"),
        "section"     => "chama_inn_design",
        "type"        => "dropdown-pages",
    ]);

    $wp_customize->add_setting("chama_inn_header_cta_label", [
        "default"           => "Book Your Stay",
        "sanitize_callback" => "sanitize_text_field",
        "type"              => "theme_mod",
    ]);

    $wp_customize->add_control("chama_inn_header_cta_label", [
        "label"       => __("Header CTA Label", "chama-inn"),
        "description" => __("Short button text shown in the site header.", "chama-inn"),
        "section"     => "chama_inn_design",
        "type"        => "text",
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

function chama_inn_get_header_cta_url(): string
{
    $selected_page_id = (int) get_theme_mod("chama_inn_header_cta_page", 0);

    if ($selected_page_id > 0) {
        $selected_url = get_permalink($selected_page_id);

        if (is_string($selected_url) && $selected_url !== "") {
            return $selected_url;
        }
    }

    $fallback_paths = ["contact", "book", "inquire"];

    foreach ($fallback_paths as $path) {
        $page = get_page_by_path($path);

        if ($page instanceof WP_Post) {
            $fallback_url = get_permalink($page);

            if (is_string($fallback_url) && $fallback_url !== "") {
                return $fallback_url;
            }
        }
    }

    return (string) home_url("/");
}

function chama_inn_get_header_cta_label(): string
{
    $label = (string) get_theme_mod("chama_inn_header_cta_label", "Book Your Stay");
    $label = trim($label);

    if ($label === "") {
        return __("Book Your Stay", "chama-inn");
    }

    return $label;
}

function chama_inn_get_core_page_blueprint(): array
{
    return [
        [
            "title"   => __("Home", "chama-inn"),
            "slug"    => "home",
            "excerpt" => __("A restored Chama railroad inn with calm, premium hospitality.", "chama-inn"),
            "pattern" => "patterns/inn-conversion-page.php",
        ],
        [
            "title"   => __("Stay / Rooms", "chama-inn"),
            "slug"    => "stay-rooms",
            "excerpt" => __("Room options and amenities for a comfortable Chama stay.", "chama-inn"),
            "pattern" => "patterns/stay-rooms-page.php",
        ],
        [
            "title"   => __("Dining", "chama-inn"),
            "slug"    => "dining",
            "excerpt" => __("Current dining details and upcoming additions.", "chama-inn"),
            "pattern" => "patterns/dining-page.php",
        ],
        [
            "title"   => __("Weddings & Events", "chama-inn"),
            "slug"    => "weddings-events",
            "excerpt" => __("Inquire about intimate weddings and private events.", "chama-inn"),
            "pattern" => "patterns/weddings-events-page.php",
        ],
        [
            "title"   => __("Explore Chama", "chama-inn"),
            "slug"    => "explore-chama",
            "excerpt" => __("Railroad-first local recommendations for your visit.", "chama-inn"),
            "pattern" => "patterns/explore-chama-page.php",
        ],
        [
            "title"   => __("About / Our Story", "chama-inn"),
            "slug"    => "about-our-story",
            "excerpt" => __("Restoration story, inn values, and place-based identity.", "chama-inn"),
            "pattern" => "patterns/about-story-page.php",
        ],
        [
            "title"   => __("Contact / Book / Inquire", "chama-inn"),
            "slug"    => "contact",
            "excerpt" => __("Book your stay or send an inquiry.", "chama-inn"),
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

function chama_inn_set_default_nav_menu(array $pages_by_slug): void
{
    $menu_id = chama_inn_get_or_create_nav_menu(__("Primary Menu", "chama-inn"));

    if ($menu_id <= 0) {
        return;
    }

    $menu_order = [
        "home",
        "stay-rooms",
        "dining",
        "weddings-events",
        "explore-chama",
        "about-our-story",
        "contact",
    ];

    foreach ($menu_order as $slug) {
        if (!isset($pages_by_slug[$slug])) {
            continue;
        }

        $page_id = (int) $pages_by_slug[$slug];

        if ($page_id <= 0 || chama_inn_menu_has_page($menu_id, $page_id)) {
            continue;
        }

        wp_update_nav_menu_item($menu_id, 0, [
            "menu-item-object-id" => $page_id,
            "menu-item-object"    => "page",
            "menu-item-type"      => "post_type",
            "menu-item-status"    => "publish",
        ]);
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
            "title"       => __("Inn Conversion Page (Light)", "chama-inn"),
            "description" => __("Editable homepage layout for a premium inn landing page and operations pitch.", "chama-inn"),
        ],
        "stay-rooms-page" => [
            "file"        => "patterns/stay-rooms-page.php",
            "title"       => __("Interior: Stay and Rooms", "chama-inn"),
            "description" => __("Starter layout for room categories, amenities, and booking CTA.", "chama-inn"),
        ],
        "dining-page" => [
            "file"        => "patterns/dining-page.php",
            "title"       => __("Interior: Dining", "chama-inn"),
            "description" => __("Starter layout for dining details, hours, and upcoming menu expansion.", "chama-inn"),
        ],
        "weddings-events-page" => [
            "file"        => "patterns/weddings-events-page.php",
            "title"       => __("Interior: Weddings and Events", "chama-inn"),
            "description" => __("Starter layout for intimate wedding and private event inquiries.", "chama-inn"),
        ],
        "explore-chama-page" => [
            "file"        => "patterns/explore-chama-page.php",
            "title"       => __("Interior: Explore Chama", "chama-inn"),
            "description" => __("Starter layout for railroad-first local exploration highlights.", "chama-inn"),
        ],
        "about-story-page" => [
            "file"        => "patterns/about-story-page.php",
            "title"       => __("Interior: About and Story", "chama-inn"),
            "description" => __("Starter layout for restoration story, community role, and inn values.", "chama-inn"),
        ],
        "contact-inquiry-page" => [
            "file"        => "patterns/contact-inquiry-page.php",
            "title"       => __("Interior: Contact and Inquiry", "chama-inn"),
            "description" => __("Starter layout for direct contact details, map info, and inquiry CTA.", "chama-inn"),
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
