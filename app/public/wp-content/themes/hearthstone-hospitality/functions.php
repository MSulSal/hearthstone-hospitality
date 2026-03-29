<?php

if (!defined("ABSPATH")) {
    exit;
}

function hearthstone_hospitality_setup(): void
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
        "primary" => __("Primary Menu", "hearthstone-hospitality"),
    ]);
}
add_action("after_setup_theme", "hearthstone_hospitality_setup");

function hearthstone_hospitality_get_branding_defaults(): array
{
    return [
        "property_name"   => "Hearthstone Hospitality",
        "app_name"        => "Hearthstone Guest App",
        "app_short_name"  => "Hearthstone",
        "app_description" => "Guest stay app for dining orders, gift shop purchases, service requests, and front desk support.",
        "location_label"  => "Your Destination",
    ];
}

function hearthstone_hospitality_sanitize_branding_text($value): string
{
    return sanitize_text_field((string) $value);
}

function hearthstone_hospitality_get_branding_value(string $key): string
{
    $defaults = hearthstone_hospitality_get_branding_defaults();

    if (!array_key_exists($key, $defaults)) {
        return "";
    }

    $value = get_theme_mod("hearthstone_hospitality_brand_" . $key, (string) $defaults[$key]);
    $value = is_string($value) ? trim($value) : "";

    if ($value === "") {
        return (string) $defaults[$key];
    }

    return $value;
}

function hearthstone_hospitality_should_hide_page_hero(int $post_id): bool
{
    if ($post_id <= 0) {
        return false;
    }

    $slug = sanitize_title((string) get_post_field("post_name", $post_id));
    $hero_free_slugs = [
        "dining",
        "gift-shop",
        "perks-info",
        "explore-local",
        "help",
        "my-stay",
    ];

    return in_array($slug, $hero_free_slugs, true);
}

function hearthstone_hospitality_get_primary_nav_items(): array
{
    return [
        [
            "slug" => "home",
            "label" => __("Home", "hearthstone-hospitality"),
            "fallback_path" => "/",
        ],
        [
            "slug" => "dining",
            "label" => __("Dining", "hearthstone-hospitality"),
            "fallback_path" => "/dining/",
        ],
        [
            "slug" => "gift-shop",
            "label" => __("Gift Shop", "hearthstone-hospitality"),
            "fallback_path" => "/gift-shop/",
        ],
        [
            "slug" => "help",
            "label" => __("Help", "hearthstone-hospitality"),
            "fallback_path" => "/help/",
        ],
        [
            "slug" => "my-stay",
            "label" => __("My Stay", "hearthstone-hospitality"),
            "fallback_path" => "/my-stay/",
        ],
    ];
}

function hearthstone_hospitality_get_primary_nav_slugs(): array
{
    return array_map(static function (array $item): string {
        return sanitize_title((string) ($item["slug"] ?? ""));
    }, hearthstone_hospitality_get_primary_nav_items());
}

function hearthstone_hospitality_primary_menu_has_items(): bool
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

function hearthstone_hospitality_render_fallback_menu($args = []): void
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

    foreach (hearthstone_hospitality_get_primary_nav_items() as $nav_item) {
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

function hearthstone_hospitality_get_guest_logout_url(): string
{
    if (!hearthstone_hospitality_has_active_guest_session()) {
        return "";
    }

    return (string) wp_nonce_url(
        admin_url("admin-post.php?action=hearthstone_ops_guest_sign_out"),
        "hearthstone_ops_guest_sign_out_action",
        "hearthstone_ops_guest_sign_out_nonce"
    );
}

function hearthstone_hospitality_get_guest_mobile_nav_items(): array
{
    $items = [
        [
            "slug"  => "home",
            "label" => __("Home", "hearthstone-hospitality"),
            "icon"  => "dashicons-admin-home",
            "url"   => home_url("/"),
        ],
        [
            "slug"  => "dining",
            "label" => __("Restaurant", "hearthstone-hospitality"),
            "icon"  => "dashicons-food",
            "url"   => home_url("/dining/"),
        ],
        [
            "slug"  => "gift-shop",
            "label" => __("Gift Shop", "hearthstone-hospitality"),
            "icon"  => "hearthstone-icon-shopping-bag",
            "url"   => home_url("/gift-shop/"),
        ],
        [
            "slug"  => "my-stay",
            "label" => __("My Stay", "hearthstone-hospitality"),
            "icon"  => "dashicons-id-alt",
            "url"   => home_url("/my-stay/"),
        ],
        [
            "slug"  => "help",
            "label" => __("Help", "hearthstone-hospitality"),
            "icon"  => "dashicons-bell",
            "url"   => home_url("/help/"),
        ],
    ];

    $logout_url = hearthstone_hospitality_get_guest_logout_url();

    if ($logout_url !== "") {
        $items[] = [
            "slug"  => "guest-logout",
            "label" => __("Log out", "hearthstone-hospitality"),
            "icon"  => "dashicons-exit",
            "url"   => $logout_url,
        ];
    }

    return $items;
}

function hearthstone_hospitality_has_active_guest_session(): bool
{
    if (!function_exists("hearthstone_ops_is_guest_authenticated")) {
        return false;
    }

    return hearthstone_ops_is_guest_authenticated();
}

function hearthstone_hospitality_render_guest_mobile_nav(): void
{
    if (is_admin() || !hearthstone_hospitality_has_active_guest_session()) {
        return;
    }

    $items = hearthstone_hospitality_get_guest_mobile_nav_items();
    ?>
    <nav class="guest-mobile-nav" aria-label="<?php esc_attr_e("Guest app navigation", "hearthstone-hospitality"); ?>">
        <ul class="guest-mobile-nav__list">
            <?php foreach ($items as $item) : ?>
                <?php
                if (!is_array($item) || !isset($item["slug"], $item["label"], $item["url"], $item["icon"])) {
                    continue;
                }

                $slug = sanitize_title((string) $item["slug"]);
                $icon_class = sanitize_html_class((string) $item["icon"]);
                $is_dashicon = strpos((string) $item["icon"], "dashicons-") === 0;
                $icon_classes = "guest-mobile-nav__icon " . ($is_dashicon ? "dashicons " : "") . $icon_class;
                $active = is_front_page() && $slug === "home";

                if (!$active && is_page($slug)) {
                    $active = true;
                }

                $item_classes = ["guest-mobile-nav__item"];

                if ($active) {
                    $item_classes[] = "is-active";
                }

                if ($slug === "guest-logout") {
                    $item_classes[] = "is-logout";
                }
                ?>
                <li class="<?php echo esc_attr(implode(" ", $item_classes)); ?>">
                    <a href="<?php echo esc_url((string) $item["url"]); ?>" aria-label="<?php echo esc_attr((string) $item["label"]); ?>" title="<?php echo esc_attr((string) $item["label"]); ?>">
                        <span class="<?php echo esc_attr($icon_classes); ?>" aria-hidden="true"></span>
                        <span class="guest-mobile-nav__label" aria-hidden="true"><?php echo esc_html((string) $item["label"]); ?></span>
                        <span class="screen-reader-text"><?php echo esc_html((string) $item["label"]); ?></span>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
    <?php
}

function hearthstone_hospitality_add_guest_session_body_class(array $classes): array
{
    if (hearthstone_hospitality_has_active_guest_session()) {
        $classes[] = "has-guest-mobile-nav";
    }

    return $classes;
}
add_filter("body_class", "hearthstone_hospitality_add_guest_session_body_class");

function hearthstone_hospitality_redirect_legacy_guest_sections_to_my_stay(): void
{
    if (is_admin()) {
        return;
    }

    if (!is_page(["perks-info", "explore-local"])) {
        return;
    }

    $target_url = function_exists("hearthstone_ops_get_guest_page_url")
        ? hearthstone_ops_get_guest_page_url("my-stay", "/my-stay/")
        : home_url("/my-stay/");

    if ($target_url === "") {
        $target_url = home_url("/my-stay/");
    }

    wp_safe_redirect($target_url, 302);
    exit;
}
add_action("template_redirect", "hearthstone_hospitality_redirect_legacy_guest_sections_to_my_stay");

function hearthstone_hospitality_enqueue_assets(): void
{
    $theme_version = (string) wp_get_theme()->get("Version");
    $style_path = get_stylesheet_directory() . "/style.css";
    $navigation_script_path = get_theme_file_path("assets/js/navigation.js");
    $pwa_script_path = get_theme_file_path("assets/js/pwa-register.js");

    $style_version = file_exists($style_path) ? (string) filemtime($style_path) : $theme_version;
    $navigation_script_version = file_exists($navigation_script_path) ? (string) filemtime($navigation_script_path) : $theme_version;
    $pwa_script_version = file_exists($pwa_script_path) ? (string) filemtime($pwa_script_path) : $theme_version;

    wp_enqueue_style("dashicons");

    wp_enqueue_style(
        "hearthstone-hospitality-style",
        get_stylesheet_uri(),
        [],
        $style_version
    );

    wp_enqueue_script(
        "hearthstone-hospitality-navigation",
        get_theme_file_uri("assets/js/navigation.js"),
        [],
        $navigation_script_version,
        true
    );

    wp_enqueue_script(
        "hearthstone-hospitality-pwa-register",
        get_theme_file_uri("assets/js/pwa-register.js"),
        [],
        $pwa_script_version,
        true
    );

    wp_localize_script("hearthstone-hospitality-pwa-register", "hearthstonePwaConfig", [
        "serviceWorkerUrl" => (string) home_url("/?hearthstone_pwa_sw=1"),
        "cachePrefix"      => sanitize_title(hearthstone_hospitality_get_branding_value("app_short_name")),
    ]);
}
add_action("wp_enqueue_scripts", "hearthstone_hospitality_enqueue_assets");

function hearthstone_hospitality_print_nav_runtime_overrides(): void
{
    if (is_admin()) {
        return;
    }
    ?>
    <style id="hearthstone-nav-runtime-overrides">
      @media (min-width: 769px) {
        .site-header .site-header__inner {
          width: 100% !important;
          max-width: none !important;
          grid-template-columns: minmax(0, 1fr) minmax(0, 68rem) minmax(0, 1fr) !important;
        }

        .site-header .site-header__brand {
          justify-content: center !important;
          justify-self: center !important;
          width: auto !important;
        }

        .site-header .site-header__logo-image {
          max-height: 110px !important;
        }

        .site-header .site-header__actions {
          justify-self: center !important;
        }

        .site-header .site-header__logout,
        .site-header .site-header__logout:hover,
        .site-header .site-header__logout:focus-visible {
          min-height: 2.55rem !important;
          padding: 0.52rem 1.08rem !important;
          font-size: 1.02rem !important;
          color: color-mix(in srgb, var(--hearthstone-nav-ink) 88%, var(--hearthstone-accent-soft) 12%) !important;
          background: color-mix(in srgb, var(--hearthstone-shell-bg) 84%, #000 16%) !important;
          border-color: color-mix(in srgb, var(--hearthstone-border) 44%, transparent 56%) !important;
          transform: none !important;
          transition: none !important;
        }
      }
    </style>
    <?php
}
add_action("wp_head", "hearthstone_hospitality_print_nav_runtime_overrides", 120);

function hearthstone_hospitality_enqueue_editor_assets(): void
{
    add_editor_style("style.css");
}
add_action("after_setup_theme", "hearthstone_hospitality_enqueue_editor_assets");

function hearthstone_hospitality_get_color_schemes(): array
{
    return [
        "sunrise-plaster"  => __("Exterior Stucco (Default)", "hearthstone-hospitality"),
        "sage-retreat"     => __("Dusty Sage", "hearthstone-hospitality"),
        "moonstone-calm"   => __("Moonstone Calm (Cool)", "hearthstone-hospitality"),
        "alpine-stillness" => __("Alpine Stillness (Cool)", "hearthstone-hospitality"),
        "terracotta-dawn"  => __("Terracotta Dawn (Warm)", "hearthstone-hospitality"),
        "rail-burgundy"    => __("Heritage Garnet (Accent)", "hearthstone-hospitality"),
        "desert-contrast"  => __("Desert Contrast (Neutral)", "hearthstone-hospitality"),
    ];
}

function hearthstone_hospitality_sanitize_color_scheme(string $value): string
{
    $schemes = hearthstone_hospitality_get_color_schemes();

    if (array_key_exists($value, $schemes)) {
        return $value;
    }

    return "sunrise-plaster";
}

function hearthstone_hospitality_customize_register(WP_Customize_Manager $wp_customize): void
{
    $wp_customize->add_section("hearthstone_hospitality_design", [
        "title"       => __("Guest App Design", "hearthstone-hospitality"),
        "priority"    => 35,
        "description" => __("Adjust visual presentation without editing code.", "hearthstone-hospitality"),
    ]);

    $wp_customize->add_setting("hearthstone_hospitality_color_scheme", [
        "default"           => "sunrise-plaster",
        "sanitize_callback" => "hearthstone_hospitality_sanitize_color_scheme",
        "type"              => "theme_mod",
    ]);

    $wp_customize->add_control("hearthstone_hospitality_color_scheme", [
        "label"       => __("Color Scheme", "hearthstone-hospitality"),
        "description" => __("Switch between ready-made palettes for demos and client preference checks.", "hearthstone-hospitality"),
        "section"     => "hearthstone_hospitality_design",
        "type"        => "select",
        "choices"     => hearthstone_hospitality_get_color_schemes(),
    ]);

    $wp_customize->add_section("hearthstone_hospitality_branding", [
        "title"       => __("Guest App Branding", "hearthstone-hospitality"),
        "priority"    => 36,
        "description" => __("White-label prep: update names/labels once and reuse across manifest and theme UI.", "hearthstone-hospitality"),
    ]);

    $branding_fields = [
        "property_name" => [
            "label"       => __("Property Name", "hearthstone-hospitality"),
            "description" => __("Used for logo alt text, footer copy, and fallback title.", "hearthstone-hospitality"),
        ],
        "app_name" => [
            "label"       => __("App Name", "hearthstone-hospitality"),
            "description" => __("Used in PWA manifest name.", "hearthstone-hospitality"),
        ],
        "app_short_name" => [
            "label"       => __("App Short Name", "hearthstone-hospitality"),
            "description" => __("Used in PWA install icon label.", "hearthstone-hospitality"),
        ],
        "app_description" => [
            "label"       => __("App Description", "hearthstone-hospitality"),
            "description" => __("Used in PWA manifest description.", "hearthstone-hospitality"),
        ],
        "location_label" => [
            "label"       => __("Location Label", "hearthstone-hospitality"),
            "description" => __("Optional display label for future marketing copy swaps.", "hearthstone-hospitality"),
        ],
    ];

    foreach ($branding_fields as $field_key => $field_config) {
        if (!is_array($field_config) || !isset($field_config["label"])) {
            continue;
        }

        $setting_id = "hearthstone_hospitality_brand_" . $field_key;

        $wp_customize->add_setting($setting_id, [
            "default"           => hearthstone_hospitality_get_branding_defaults()[$field_key] ?? "",
            "sanitize_callback" => "hearthstone_hospitality_sanitize_branding_text",
            "type"              => "theme_mod",
        ]);

        $wp_customize->add_control($setting_id, [
            "label"       => (string) $field_config["label"],
            "description" => isset($field_config["description"]) ? (string) $field_config["description"] : "",
            "section"     => "hearthstone_hospitality_branding",
            "type"        => "text",
        ]);
    }

}
add_action("customize_register", "hearthstone_hospitality_customize_register");

function hearthstone_hospitality_add_color_scheme_body_class(array $classes): array
{
    $scheme    = get_theme_mod("hearthstone_hospitality_color_scheme", "sunrise-plaster");
    $scheme    = hearthstone_hospitality_sanitize_color_scheme((string) $scheme);
    $classes[] = "hearthstone-scheme-" . sanitize_html_class($scheme);

    return $classes;
}
add_filter("body_class", "hearthstone_hospitality_add_color_scheme_body_class");

function hearthstone_hospitality_redirect_legacy_guest_hub(): void
{
    if (!is_page("guest-hub")) {
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
add_action("template_redirect", "hearthstone_hospitality_redirect_legacy_guest_hub");

function hearthstone_hospitality_redirect_legacy_guest_paths(): void
{
    if (is_admin()) {
        return;
    }

    $redirect_map = [
        "service-requests" => "help",
        "contact"          => "help",
    ];

    foreach ($redirect_map as $legacy_slug => $target_slug) {
        if (!is_page($legacy_slug)) {
            continue;
        }

        $target_page = get_page_by_path($target_slug, OBJECT, "page");
        $target_url = $target_page instanceof WP_Post ? (string) get_permalink($target_page) : (string) home_url("/" . trim($target_slug, "/") . "/");

        if ($target_url === "") {
            $target_url = (string) home_url("/");
        }

        wp_safe_redirect($target_url, 301);
        exit;
    }
}
add_action("template_redirect", "hearthstone_hospitality_redirect_legacy_guest_paths");

function hearthstone_hospitality_get_packaged_logo_uri(): string
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

function hearthstone_hospitality_get_home_hero_gallery_uris(): array
{
    $relative_paths = [
        // Home hero fixed image.
        "assets/images/csi-assets/csi-1.png",
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

function hearthstone_hospitality_get_logo_variant_uri(string $context = "default"): string
{
    $context = sanitize_key($context);

    // Prefer a single universal logo file first so white-label swaps are instant.
    $global_paths = [
        "assets/images/logo_bg_extremes/warm_white.png",
        "assets/images/client-logo.webp",
        "assets/images/client-logo.png",
        "assets/images/client-logo.jpg",
        "assets/images/client-logo.jpeg",
        "assets/images/client-logo.svg",
    ];

    $context_paths = [
        "header-home" => [
            "assets/images/logo_bg_extremes/warm_white.png",
            "assets/images/logo_color_spectrum/dusty_sage.png",
            "assets/images/logo_color_spectrum/trim_blue_green.png",
        ],
        "header"    => [
            "assets/images/logo_bg_extremes/warm_white.png",
            "assets/images/logo_color_spectrum/dusty_sage.png",
            "assets/images/logo_color_spectrum/trim_blue_green.png",
        ],
        "footer"    => [
            "assets/images/logo_color_spectrum/soft_charcoal.png",
            "assets/images/logo_color_spectrum/iron_brown.png",
        ],
        "hero"      => [
            "assets/images/logo_bg_extremes/warm_white.png",
            "assets/images/logo_color_spectrum/dusty_sage.png",
            "assets/images/logo_color_spectrum/golden_adobe.png",
            "assets/images/logo_color_spectrum/honey_oak.png",
        ],
        "admin-bar" => [
            "assets/images/logo_color_spectrum/golden_adobe.png",
            "assets/images/logo_color_spectrum/honey_oak.png",
            "assets/images/logo_color_spectrum/trim_blue_green.png",
        ],
        "login"     => [
            "assets/images/logo_color_spectrum/soft_charcoal.png",
            "assets/images/logo_color_spectrum/iron_brown.png",
        ],
    ];

    $paths = $context_paths[$context] ?? [];

    $paths = array_values(array_unique(array_merge($global_paths, $paths)));

    foreach ($paths as $relative_path) {
        $absolute_path = get_theme_file_path($relative_path);

        if (file_exists($absolute_path)) {
            return get_theme_file_uri($relative_path);
        }
    }

    return "";
}

function hearthstone_hospitality_print_branding_styles(): void
{
    $admin_logo_uri = hearthstone_hospitality_get_logo_variant_uri("admin-bar");
    $login_logo_uri = hearthstone_hospitality_get_logo_variant_uri("login");

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
    <style id="hearthstone-hospitality-admin-branding">
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
add_action("admin_head", "hearthstone_hospitality_print_branding_styles");
add_action("login_head", "hearthstone_hospitality_print_branding_styles");

function hearthstone_hospitality_get_pwa_icon_entries(): array
{
    $icon_specs = [
        [
            "file"    => "assets/images/pwa/icon-192.png",
            "sizes"   => "192x192",
            "purpose" => "any",
        ],
        [
            "file"    => "assets/images/pwa/icon-512.png",
            "sizes"   => "512x512",
            "purpose" => "any",
        ],
        [
            "file"    => "assets/images/pwa/icon-maskable-512.png",
            "sizes"   => "512x512",
            "purpose" => "maskable",
        ],
    ];

    $entries = [];

    foreach ($icon_specs as $spec) {
        if (!is_array($spec) || !isset($spec["file"], $spec["sizes"], $spec["purpose"])) {
            continue;
        }

        $file = (string) $spec["file"];

        if (!file_exists(get_theme_file_path($file))) {
            continue;
        }

        $entries[] = [
            "src"     => (string) get_theme_file_uri($file),
            "sizes"   => (string) $spec["sizes"],
            "type"    => "image/png",
            "purpose" => (string) $spec["purpose"],
        ];
    }

    return $entries;
}

function hearthstone_hospitality_get_apple_touch_icon_url(): string
{
    $file = "assets/images/pwa/apple-touch-icon-180.png";

    if (file_exists(get_theme_file_path($file))) {
        return (string) get_theme_file_uri($file);
    }

    return "";
}

function hearthstone_hospitality_output_pwa_head_tags(): void
{
    if (is_admin()) {
        return;
    }

    $manifest_url = (string) home_url("/?hearthstone_pwa_manifest=1");
    $touch_icon_url = hearthstone_hospitality_get_apple_touch_icon_url();
    ?>
    <link rel="manifest" href="<?php echo esc_url($manifest_url); ?>">
    <meta name="theme-color" content="#2a221d">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <?php if ($touch_icon_url !== "") : ?>
        <link rel="apple-touch-icon" href="<?php echo esc_url($touch_icon_url); ?>">
    <?php endif; ?>
    <?php
}
add_action("wp_head", "hearthstone_hospitality_output_pwa_head_tags", 2);

function hearthstone_hospitality_should_serve_pwa_payload(string $key): bool
{
    if (!isset($_GET[$key])) {
        return false;
    }

    $raw_value = (string) wp_unslash($_GET[$key]);
    $value = strtolower(trim($raw_value));

    if ($value === "") {
        return true;
    }

    return in_array($value, ["1", "true", "yes"], true);
}

function hearthstone_hospitality_serve_pwa_manifest(): void
{
    $icons = hearthstone_hospitality_get_pwa_icon_entries();
    $app_name = hearthstone_hospitality_get_branding_value("app_name");
    $app_short_name = hearthstone_hospitality_get_branding_value("app_short_name");
    $app_description = hearthstone_hospitality_get_branding_value("app_description");

    $manifest = [
        "id"               => (string) home_url("/"),
        "name"             => $app_name,
        "short_name"       => $app_short_name,
        "description"      => $app_description,
        "start_url"        => (string) home_url("/"),
        "scope"            => "/",
        "display"          => "standalone",
        "orientation"      => "portrait-primary",
        "background_color" => "#1f1b18",
        "theme_color"      => "#2a221d",
        "icons"            => $icons,
    ];

    nocache_headers();
    header("Content-Type: application/manifest+json; charset=utf-8");
    echo wp_json_encode($manifest, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

function hearthstone_hospitality_serve_service_worker(): void
{
    $theme_version = (string) wp_get_theme()->get("Version");
    $style_path = get_stylesheet_directory() . "/style.css";
    $navigation_script_path = get_theme_file_path("assets/js/navigation.js");
    $pwa_script_path = get_theme_file_path("assets/js/pwa-register.js");

    $style_version = file_exists($style_path) ? (string) filemtime($style_path) : $theme_version;
    $navigation_script_version = file_exists($navigation_script_path) ? (string) filemtime($navigation_script_path) : $theme_version;
    $pwa_script_version = file_exists($pwa_script_path) ? (string) filemtime($pwa_script_path) : $theme_version;

    $cache_prefix = sanitize_title(hearthstone_hospitality_get_branding_value("app_short_name"));

    if ($cache_prefix === "") {
        $cache_prefix = "guest-app";
    }

    $cache_name = $cache_prefix . "-v" . md5($theme_version . "|" . $style_version . "|" . $navigation_script_version . "|" . $pwa_script_version . "|pwa");

    $precache_urls = array_values(array_unique([
        (string) home_url("/guest-access/"),
        (string) home_url("/"),
        (string) home_url("/dining/"),
        (string) home_url("/gift-shop/"),
        (string) home_url("/perks-info/"),
        (string) home_url("/explore-local/"),
        (string) home_url("/help/"),
        (string) home_url("/my-stay/"),
        (string) add_query_arg("ver", rawurlencode($style_version), get_stylesheet_uri()),
        (string) add_query_arg("ver", rawurlencode($navigation_script_version), get_theme_file_uri("assets/js/navigation.js")),
        (string) add_query_arg("ver", rawurlencode($pwa_script_version), get_theme_file_uri("assets/js/pwa-register.js")),
        (string) home_url("/?hearthstone_pwa_manifest=1"),
    ]));

    nocache_headers();
    header("Content-Type: application/javascript; charset=utf-8");
    header("Service-Worker-Allowed: /");

    echo "const CACHE_NAME = " . wp_json_encode($cache_name) . ";\n";
    echo "const PRECACHE_URLS = " . wp_json_encode($precache_urls, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . ";\n";
    ?>
self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => cache.addAll(PRECACHE_URLS))
  );
  self.skipWaiting();
});

self.addEventListener("activate", (event) => {
  event.waitUntil(
    caches.keys().then((keys) =>
      Promise.all(
        keys.map((key) => {
          if (key !== CACHE_NAME) {
            return caches.delete(key);
          }
          return Promise.resolve();
        })
      )
    )
  );
  self.clients.claim();
});

self.addEventListener("fetch", (event) => {
  const { request } = event;

  if (request.method !== "GET") {
    return;
  }

  const url = new URL(request.url);

  if (url.origin !== self.location.origin) {
    return;
  }

  if (request.mode === "navigate") {
    event.respondWith(
      fetch(request).catch(() => caches.match(PRECACHE_URLS[0]))
    );
    return;
  }

  event.respondWith(
    caches.match(request).then((cachedResponse) => {
      if (cachedResponse) {
        return cachedResponse;
      }

      return fetch(request).then((response) => {
        const clone = response.clone();
        caches.open(CACHE_NAME).then((cache) => cache.put(request, clone));
        return response;
      });
    })
  );
});
    <?php
    exit;
}

function hearthstone_hospitality_maybe_serve_pwa_payloads(): void
{
    if (is_admin()) {
        return;
    }

    if (hearthstone_hospitality_should_serve_pwa_payload("hearthstone_pwa_manifest")) {
        hearthstone_hospitality_serve_pwa_manifest();
    }

    if (hearthstone_hospitality_should_serve_pwa_payload("hearthstone_pwa_sw")) {
        hearthstone_hospitality_serve_service_worker();
    }
}
add_action("template_redirect", "hearthstone_hospitality_maybe_serve_pwa_payloads", 0);

function hearthstone_hospitality_get_core_page_blueprint(): array
{
    return [
        [
            "title"   => __("Guest Access", "hearthstone-hospitality"),
            "slug"    => "guest-access",
            "excerpt" => __("Secure room-number and access-code sign in for in-stay guests.", "hearthstone-hospitality"),
            "pattern" => "patterns/guest-access-page.php",
        ],
        [
            "title"   => __("Home", "hearthstone-hospitality"),
            "slug"    => "home",
            "excerpt" => __("Guest-facing stay app for restaurant orders, gift shop checkout, service requests, and front desk help.", "hearthstone-hospitality"),
            "pattern" => "patterns/property-conversion-page.php",
        ],
        [
            "title"   => __("Restaurant Orders", "hearthstone-hospitality"),
            "slug"    => "dining",
            "excerpt" => __("Order flow, timing, and service windows during your stay.", "hearthstone-hospitality"),
            "pattern" => "patterns/dining-page.php",
        ],
        [
            "title"   => __("Gift Shop", "hearthstone-hospitality"),
            "slug"    => "gift-shop",
            "excerpt" => __("Guest-side catalog and pickup-ready purchase flow.", "hearthstone-hospitality"),
            "pattern" => "patterns/gift-shop-page.php",
        ],
        [
            "title"   => __("Perks & Info", "hearthstone-hospitality"),
            "slug"    => "perks-info",
            "excerpt" => __("Amenities, included perks, hours, and practical stay info.", "hearthstone-hospitality"),
            "pattern" => "patterns/perks-info-page.php",
        ],
        [
            "title"   => __("Explore Town", "hearthstone-hospitality"),
            "slug"    => "explore-local",
            "excerpt" => __("What to do at the property and in town during your current stay.", "hearthstone-hospitality"),
            "pattern" => "patterns/explore-local-page.php",
        ],
        [
            "title"   => __("Help", "hearthstone-hospitality"),
            "slug"    => "help",
            "excerpt" => __("Call front desk, submit requests, and track support updates.", "hearthstone-hospitality"),
            "pattern" => "patterns/help-page.php",
        ],
        [
            "title"   => __("My Stay", "hearthstone-hospitality"),
            "slug"    => "my-stay",
            "excerpt" => __("Stay summary, active orders, perks, and local tips in one page.", "hearthstone-hospitality"),
            "pattern" => "patterns/my-stay-page.php",
        ],
    ];
}

function hearthstone_hospitality_load_pattern_content(string $relative_path): string
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

function hearthstone_hospitality_get_or_create_nav_menu(string $menu_name): int
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

function hearthstone_hospitality_menu_has_page(int $menu_id, int $page_id): bool
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

function hearthstone_hospitality_get_menu_item_id_for_page(int $menu_id, int $page_id): int
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

function hearthstone_hospitality_set_default_nav_menu(array $pages_by_slug): void
{
    $menu_id = hearthstone_hospitality_get_or_create_nav_menu(__("Primary Menu", "hearthstone-hospitality"));

    if ($menu_id <= 0) {
        return;
    }

    $menu_order = hearthstone_hospitality_get_primary_nav_slugs();

    $legacy_slugs_to_remove = ["weddings-events", "stay-rooms", "guest-hub", "about-our-story", "service-requests", "contact"];
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

        $existing_menu_item_id = hearthstone_hospitality_get_menu_item_id_for_page($menu_id, $page_id);

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

function hearthstone_hospitality_ensure_core_pages(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $blueprint     = hearthstone_hospitality_get_core_page_blueprint();
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

        $pattern_content = hearthstone_hospitality_load_pattern_content((string) $page_definition["pattern"]);

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

    hearthstone_hospitality_set_default_nav_menu($pages_by_slug);

    if ($created_count > 0) {
        update_option("hearthstone_hospitality_created_pages_count", $created_count, false);
    }
}
add_action("admin_init", "hearthstone_hospitality_ensure_core_pages");

function hearthstone_hospitality_refresh_dining_layout_pattern(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $migration_version = (int) get_option("hearthstone_hospitality_dining_layout_version", 0);

    if ($migration_version >= 1) {
        return;
    }

    $page = get_page_by_path("dining", OBJECT, "page");

    if (!($page instanceof WP_Post)) {
        update_option("hearthstone_hospitality_dining_layout_version", 1, false);
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
        $pattern_content = hearthstone_hospitality_load_pattern_content("patterns/dining-page.php");

        if ($pattern_content !== "") {
            wp_update_post([
                "ID"           => (int) $page->ID,
                "post_content" => $pattern_content,
            ]);
        }
    }

    update_option("hearthstone_hospitality_dining_layout_version", 1, false);
}
add_action("admin_init", "hearthstone_hospitality_refresh_dining_layout_pattern");

function hearthstone_hospitality_created_pages_notice(): void
{
    if (!current_user_can("manage_options")) {
        return;
    }

    $created_count = (int) get_option("hearthstone_hospitality_created_pages_count", 0);

    if ($created_count <= 0) {
        return;
    }

    delete_option("hearthstone_hospitality_created_pages_count");

    echo '<div class="notice notice-success is-dismissible"><p>';
    echo esc_html(sprintf(
        /* translators: %d: number of pages auto-created */
        __("Hearthstone Hospitality setup created %d core pages and assigned the primary menu.", "hearthstone-hospitality"),
        $created_count
    ));
    echo "</p></div>";
}
add_action("admin_notices", "hearthstone_hospitality_created_pages_notice");

function hearthstone_hospitality_clear_home_excerpt_once(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $migration_version = (int) get_option("hearthstone_hospitality_home_excerpt_version", 0);

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

    update_option("hearthstone_hospitality_home_excerpt_version", 1, false);
}
add_action("admin_init", "hearthstone_hospitality_clear_home_excerpt_once");

function hearthstone_hospitality_migrate_seeded_copy(): void
{
    if (!is_admin() || !current_user_can("manage_options")) {
        return;
    }

    $target_version = 21;
    $current_version = (int) get_option("hearthstone_hospitality_copy_migration_version", 0);

    if ($current_version >= $target_version) {
        return;
    }

    $replacements = [
        "Hearthstone Hospitality" => "Hearthstone Hospitality",
        "hearthstone hospitality" => "hearthstone hospitality",
        "Hearthstone Property" => "Hearthstone Hospitality",
        "hearthstone property" => "hearthstone hospitality",
        "Restored railroad property in Hearthstone, New Mexico" => "Boutique stay with regional character and modern comfort.",
        "restored railroad property in hearthstone, new mexico" => "Boutique stay with regional character and modern comfort.",
        "A lightened historic property with clean comfort, welcoming service, and courtyard calm in the heart of Hearthstone." => "A lightened boutique stay with clean comfort, welcoming service, and courtyard calm.",
        "Historic place. Modern comfort." => "Quiet place. Modern comfort.",
        "Use this card for a room category that highlights historic details and classic character." => "Character-forward rooms with thoughtful details, comfortable bedding, and practical layouts for train travelers and weekend guests.",
        "Use this card for bright rooms, premium bedding, and a slower restorative atmosphere." => "Bright, quiet rooms designed for restorative nights and easy mornings before exploring the area.",
        "Use this card for families or longer stays looking for space and easy downtown/train access." => "Extra-space options for couples, families, and longer stays who want walkable convenience and mountain-town calm.",
        "Use this section to show flowers, outdoor seating, fresh air, and the quiet rhythm guests remember after their stay." => "Courtyard seating, mountain air, and a slower rhythm make the property feel both grounded and quietly premium.",
        "Use this trust area for verified, review-backed themes: clean rooms, friendly service, train convenience, and restful stays." => "Review themes consistently mention clean rooms, friendly hospitality, and easy train-station convenience.",
        "A historic property, thoughtfully restored for modern Hearthstone stays" => "A boutique stay with regional character and modern comfort",
        "Use this page to connect heritage, restoration, and the property's long-term vision for guests and community." => "Use this page to connect place, hospitality style, and the property's long-term vision for guests and community.",
        "Intimate celebrations in a restored Hearthstone setting" => "Intimate celebrations in a calm boutique setting",
        "Feature up to three room experiences here so guests can choose quickly and confidently." => "Choose from nine thoughtfully prepared rooms designed for comfort, quiet sleep, and easy access to the train and downtown.",
        "Keep the tone intimate and restorative, not resort-scale." => "Ideal for couples, families, and travelers who want a welcoming home base.",
        "Present current food-and-beverage reality clearly, then leave space for future additions such as expanded dinner service, market items, and a fuller bar program." => "Dining around the property keeps your stay easy: quick coffee options, walkable local favorites, and growing on-site offerings over time.",
        "<li>On-site convenience for train travelers and weekend guests</li><li>Seasonal and local flavor where possible</li><li>Clear operating hours and easy access to menus</li>" => "<li>Easy options before and after your train day</li><li>Walkable choices in the heart of town</li><li>Clear hours and simple dining guidance at check-in</li>",
        "<strong>Dining note:</strong> Keep promises specific and credible. Show what guests can enjoy now, then label upcoming additions as \"coming soon.\"</p>" => "<strong>Dining update:</strong> The property continues to expand guest dining options while keeping clear, reliable recommendations available now.</p>",
        "Lead with the railroad experience, then curate a short set of nearby outdoor and local-town highlights." => "Start with the historic railroad, then explore nearby trails, local shops, and mountain-town views at your own pace.",
        "Keep this final section simple: one booking action, one inquiry action, and clear contact details." => "Planning a train weekend, event trip, or quiet getaway? Our team can help you choose the right room and dates.",
        "Dining that supports the stay" => "Restaurant and dining",
        "Review themes consistently mention clean rooms, friendly hospitality, and easy train-station convenience." => "Recent five-star reviews repeatedly call out clean rooms, friendly service, and easy train access.",
        ];

    $slugs_to_scan = [
        "guest-access",
        "home",
        "dining",
        "gift-shop",
        "perks-info",
        "explore-local",
        "help",
        "my-stay",
    ];

    $updated_pages = 0;

    foreach ($slugs_to_scan as $slug) {
        $page = get_page_by_path($slug, OBJECT, "page");

        if (!($page instanceof WP_Post)) {
            continue;
        }

        $original_content = (string) $page->post_content;
        $updated_content  = strtr($original_content, $replacements);

        if ($slug === "home") {
            $legacy_markers = [
                "Stay / Rooms",
                "Book your stay or send an inquiry",
                "Planning a train weekend, event trip, or quiet getaway?",
                "A calm mountain stay, supported by modern property operations",
                "Spa style comfort in historic Hearthstone, New Mexico",
                "Use this section for your primary promise.",
                "Restored railroad property in Hearthstone, New Mexico",
                "restored railroad property in hearthstone, new mexico",
                "Boutique railroad-town property in Hearthstone, New Mexico",
                "Temporary demo images. Replace with current client-owned photos before production launch.",
                "Client-provided image set applied for this draft. Swap individual photos in Theme Editor if needed.",
                "Clean, comfortable, cozy, and right across from the station.",
                "Quietly luxurious stays across from the Cumbres and Toltec depot",
                "hearthstone-brand-mark",
                "csi-32.jpg",
                "csi-30.jpg",
                "Review themes consistently mention clean rooms, friendly hospitality, and easy train-station convenience.",
                "Welcome to your stay app",
                "Use this app to place orders, request service, and get help from the front desk while you are at the property.",
                "Open My Stay",
                "[hearthstone_guest_action_grid]",
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

            if (strpos($updated_content, "[hearthstone_guest_action_grid]") === false) {
                $should_refresh_home = true;
            }

            if ($should_refresh_home) {
                $fresh_home_pattern = hearthstone_hospitality_load_pattern_content("patterns/property-conversion-page.php");
                $updated_content = $fresh_home_pattern;
            }
        }

        if ($slug === "stay-rooms") {
            $should_refresh_stay = strpos($updated_content, "Room Category One") !== false
                || strpos($updated_content, "Replace with room summary, occupancy, and signature features.") !== false
                || strpos($updated_content, "Nine guest rooms with clean comfort, friendly service, and walkable access to the train depot and downtown Hearthstone.") !== false;

            if ($should_refresh_stay) {
                $fresh_stay_pattern = hearthstone_hospitality_load_pattern_content("patterns/stay-rooms-page.php");

                if ($fresh_stay_pattern !== "") {
                    $updated_content = $fresh_stay_pattern;
                }
            }
        }

        if ($slug === "guest-access") {
            $should_refresh_guest_access = strpos($updated_content, "[hearthstone_guest_auth_app]") === false;

            if ($should_refresh_guest_access) {
                $fresh_guest_access_pattern = hearthstone_hospitality_load_pattern_content("patterns/guest-access-page.php");

                if ($fresh_guest_access_pattern !== "") {
                    $updated_content = $fresh_guest_access_pattern;
                }
            }
        }

        if ($slug === "explore-local") {
            $should_refresh_explore = strpos($updated_content, "Keep this page curated and concise. Lead with the railroad experience, then add local highlights.") !== false
                || strpos($updated_content, "Need help planning?") !== false
                || strpos($updated_content, "Explore Hearthstone") !== false
                || strpos($updated_content, "Railroad heritage, mountain air, and local discovery") !== false;

            if ($should_refresh_explore) {
                $fresh_explore_pattern = hearthstone_hospitality_load_pattern_content("patterns/explore-local-page.php");

                if ($fresh_explore_pattern !== "") {
                    $updated_content = $fresh_explore_pattern;
                }
            }
        }

        if ($slug === "dining") {
            $should_refresh_dining = strpos($updated_content, "Service hours") !== false
                || strpos($updated_content, "Planned expansions") !== false
                || strpos($updated_content, "Order in seconds") !== false
                || strpos($updated_content, "Use <strong>+</strong> and <strong>-</strong> to adjust quantity, then submit once.") !== false
                || strpos($updated_content, "<strong>Fast path:</strong> choose items, review totals, submit order.") !== false
                || strpos($updated_content, "[hearthstone_room_service_app]") === false;

            if ($should_refresh_dining) {
                $fresh_dining_pattern = hearthstone_hospitality_load_pattern_content("patterns/dining-page.php");

                if ($fresh_dining_pattern !== "") {
                    $updated_content = $fresh_dining_pattern;
                }
            }
        }

        if ($slug === "help") {
            $should_refresh_help = strpos($updated_content, "Guests should be able to ask for help in less than a minute.") !== false
                || strpos($updated_content, "[hearthstone_guest_help_center]") === false;

            if ($should_refresh_help) {
                $fresh_help_pattern = hearthstone_hospitality_load_pattern_content("patterns/help-page.php");

                if ($fresh_help_pattern !== "") {
                    $updated_content = $fresh_help_pattern;
                }
            }
        }

        if ($slug === "perks-info") {
            $should_refresh_perks = strpos($updated_content, "[hearthstone_guest_perks_info]") === false;

            if ($should_refresh_perks) {
                $fresh_perks_pattern = hearthstone_hospitality_load_pattern_content("patterns/perks-info-page.php");

                if ($fresh_perks_pattern !== "") {
                    $updated_content = $fresh_perks_pattern;
                }
            }
        }

        if ($slug === "my-stay") {
            $should_refresh_my_stay = strpos($updated_content, "[hearthstone_guest_my_stay]") === false
                || strpos($updated_content, "Orders and session") !== false
                || strpos($updated_content, "See active orders, room context, and sign out when your stay is complete.") !== false;

            if ($should_refresh_my_stay) {
                $fresh_my_stay_pattern = hearthstone_hospitality_load_pattern_content("patterns/my-stay-page.php");

                if ($fresh_my_stay_pattern !== "") {
                    $updated_content = $fresh_my_stay_pattern;
                }
            }
        }

        if ($slug === "gift-shop") {
            $should_refresh_gift_shop = strpos($updated_content, "Featured categories") !== false
                || strpos($updated_content, "Operations readiness") !== false
                || strpos($updated_content, "Sample catalog (demo data)") !== false
                || strpos($updated_content, "Hearthstone Rail Mug") !== false
                || strpos($updated_content, "Shop from your room") !== false
                || strpos($updated_content, "Browse the catalog and send your order for front-desk pickup or room drop-off.") !== false
                || strpos($updated_content, "[hearthstone_gift_shop_app]") === false;

            if ($should_refresh_gift_shop) {
                $fresh_gift_shop_pattern = hearthstone_hospitality_load_pattern_content("patterns/gift-shop-page.php");

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

    update_option("hearthstone_hospitality_copy_migration_version", $target_version, false);

    if ($updated_pages > 0) {
        update_option("hearthstone_hospitality_copy_migration_count", $updated_pages, false);
    }
}
add_action("admin_init", "hearthstone_hospitality_migrate_seeded_copy");

function hearthstone_hospitality_copy_migration_notice(): void
{
    if (!current_user_can("manage_options")) {
        return;
    }

    $updated_pages = (int) get_option("hearthstone_hospitality_copy_migration_count", 0);

    if ($updated_pages <= 0) {
        return;
    }

    delete_option("hearthstone_hospitality_copy_migration_count");

    echo '<div class="notice notice-success is-dismissible"><p>';
    echo esc_html(sprintf(
        /* translators: %d: number of pages updated */
        __("Hearthstone Hospitality content update applied to %d page(s), including sample menu and gift shop catalog blocks.", "hearthstone-hospitality"),
        $updated_pages
    ));
    echo "</p></div>";
}
add_action("admin_notices", "hearthstone_hospitality_copy_migration_notice");

function hearthstone_hospitality_register_block_patterns(): void
{
    if (!function_exists("register_block_pattern")) {
        return;
    }

    if (function_exists("register_block_pattern_category")) {
        register_block_pattern_category("hearthstone-hospitality", [
            "label" => __("Hearthstone Hospitality", "hearthstone-hospitality"),
        ]);
    }

    $pattern_registry = [
        "guest-access-page" => [
            "file"        => "patterns/guest-access-page.php",
            "title"       => __("Guest Access", "hearthstone-hospitality"),
            "description" => __("Guest authentication screen for room number and access code entry.", "hearthstone-hospitality"),
        ],
        "property-conversion-page" => [
            "file"        => "patterns/property-conversion-page.php",
            "title"       => __("Guest App Home (QR Entry)", "hearthstone-hospitality"),
            "description" => __("Guest-first homepage for in-stay actions opened from room QR codes.", "hearthstone-hospitality"),
        ],
        "stay-rooms-page" => [
            "file"        => "patterns/stay-rooms-page.php",
            "title"       => __("Interior: Rooms and Booking", "hearthstone-hospitality"),
            "description" => __("Prospective-guest room browse page kept as secondary to in-stay flows.", "hearthstone-hospitality"),
        ],
        "dining-page" => [
            "file"        => "patterns/dining-page.php",
            "title"       => __("Interior: Restaurant Orders", "hearthstone-hospitality"),
            "description" => __("Guest-side restaurant ordering and timing communication surface.", "hearthstone-hospitality"),
        ],
        "gift-shop-page" => [
            "file"        => "patterns/gift-shop-page.php",
            "title"       => __("Interior: Gift Shop", "hearthstone-hospitality"),
            "description" => __("Guest-side catalog and pickup flow for gift shop items.", "hearthstone-hospitality"),
        ],
        "perks-info-page" => [
            "file"        => "patterns/perks-info-page.php",
            "title"       => __("Interior: Perks and Info", "hearthstone-hospitality"),
            "description" => __("Amenities, practical stay details, and included perks for active guests.", "hearthstone-hospitality"),
        ],
        "explore-local-page" => [
            "file"        => "patterns/explore-local-page.php",
            "title"       => __("Interior: Explore Town", "hearthstone-hospitality"),
            "description" => __("What to do at the property and around town during your stay.", "hearthstone-hospitality"),
        ],
        "help-page" => [
            "file"        => "patterns/help-page.php",
            "title"       => __("Interior: Help Center", "hearthstone-hospitality"),
            "description" => __("One-tap support, request form, and urgent front-desk actions.", "hearthstone-hospitality"),
        ],
        "my-stay-page" => [
            "file"        => "patterns/my-stay-page.php",
            "title"       => __("Interior: My Stay", "hearthstone-hospitality"),
            "description" => __("Unified stay hub: orders, perks, and in-town tips.", "hearthstone-hospitality"),
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

        register_block_pattern("hearthstone-hospitality/" . $slug, [
            "title"       => $pattern["title"],
            "description" => $pattern["description"],
            "categories"  => ["hearthstone-hospitality"],
            "content"     => $pattern_content,
        ]);
    }
}
add_action("init", "hearthstone_hospitality_register_block_patterns");
