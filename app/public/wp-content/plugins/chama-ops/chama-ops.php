<?php
/**
 * Plugin Name: Chama Ops
 * Plugin URI: https://chamastationinn.com
 * Description: Hospitality operations data models and workflows for Chama Station Inn.
 * Version: 0.1.0
 * Author: Suleman Saleem
 * Text Domain: chama-ops
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom post types for hospitality operations.
 */
function chama_ops_register_post_types(): void
{
    $guest_labels = [
        'name'                  => __('Guests', 'chama-ops'),
        'singular_name'         => __('Guest', 'chama-ops'),
        'menu_name'             => __('Guests', 'chama-ops'),
        'name_admin_bar'        => __('Guest', 'chama-ops'),
        'add_new'               => __('Add New', 'chama-ops'),
        'add_new_item'          => __('Add New Guest', 'chama-ops'),
        'new_item'              => __('New Guest', 'chama-ops'),
        'edit_item'             => __('Edit Guest', 'chama-ops'),
        'view_item'             => __('View Guest', 'chama-ops'),
        'all_items'             => __('All Guests', 'chama-ops'),
        'search_items'          => __('Search Guests', 'chama-ops'),
        'not_found'             => __('No guests found.', 'chama-ops'),
        'not_found_in_trash'    => __('No guests found in Trash.', 'chama-ops'),
    ];

    $guest_args = [
        'labels'                => $guest_labels,
        'public'                => false,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_rest'          => true,
        'menu_position'         => 25,
        'menu_icon'             => 'dashicons-id',
        'supports'              => ['title', 'editor', 'custom-fields'],
        'has_archive'           => false,
        'rewrite'               => false,
    ];

    register_post_type('guest', $guest_args);

    $stay_labels = [
        'name'                  => __('Stays', 'chama-ops'),
        'singular_name'         => __('Stay', 'chama-ops'),
        'menu_name'             => __('Stays', 'chama-ops'),
        'name_admin_bar'        => __('Stay', 'chama-ops'),
        'add_new'               => __('Add New', 'chama-ops'),
        'add_new_item'          => __('Add New Stay', 'chama-ops'),
        'new_item'              => __('New Stay', 'chama-ops'),
        'edit_item'             => __('Edit Stay', 'chama-ops'),
        'view_item'             => __('View Stay', 'chama-ops'),
        'all_items'             => __('All Stays', 'chama-ops'),
        'search_items'          => __('Search Stays', 'chama-ops'),
        'not_found'             => __('No stays found.', 'chama-ops'),
        'not_found_in_trash'    => __('No stays found in Trash.', 'chama-ops'),
    ];

    $stay_args = [
        'labels'                => $stay_labels,
        'public'                => false,
        'publicly_queryable'    => false,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_rest'          => true,
        'menu_position'         => 26,
        'menu_icon'             => 'dashicons-calendar-alt',
        'supports'              => ['title', 'editor', 'custom-fields'],
        'has_archive'           => false,
        'rewrite'               => false,
    ];

    register_post_type('stay', $stay_args);
}

add_action('init', 'chama_ops_register_post_types');