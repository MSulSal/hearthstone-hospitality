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

    $pattern_file = get_theme_file_path("patterns/inn-conversion-page.php");

    if (!file_exists($pattern_file)) {
        return;
    }

    $pattern_content = include $pattern_file;

    if (!is_string($pattern_content) || trim($pattern_content) === "") {
        return;
    }

    register_block_pattern("chama-inn/inn-conversion-page", [
        "title"       => __("Inn Conversion Page (Light)", "chama-inn"),
        "description" => __("Editable homepage layout for a premium inn landing page and operations pitch.", "chama-inn"),
        "categories"  => ["chama-inn"],
        "content"     => $pattern_content,
    ]);
}
add_action("init", "chama_inn_register_block_patterns");
