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
