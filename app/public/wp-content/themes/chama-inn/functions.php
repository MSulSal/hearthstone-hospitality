<?php

if (!defined("ABSPATH")) {
    exit;
}

function chama_inn_setup(): void
{
    add_theme_support("title-tag");
    add_theme_support("post-thumbnails");
    add_theme_support("html5", ["search-form", "comment-form", "comment-list", "gallery", "caption", "style", "script"]);

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