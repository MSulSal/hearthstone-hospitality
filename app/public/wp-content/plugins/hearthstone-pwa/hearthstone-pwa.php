<?php
/**
 * Plugin Name: Hearthstone PWA
 * Plugin URI: https://example.com/
 * Description: Deployment-safe PWA bridge for the Hearthstone Hospitality guest app.
 * Version: 0.1.0
 * Requires at least: 6.0
 * Requires PHP: 8.1
 * Author: Hearthstone Hospitality
 * Text Domain: hearthstone-pwa
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Show a setup notice when the companion theme is not active.
 */
function hearthstone_pwa_maybe_warn_about_theme(): void
{
    if (!is_admin() || !current_user_can('activate_plugins')) {
        return;
    }

    $theme = wp_get_theme();

    if ($theme->get_stylesheet() === 'hearthstone-hospitality') {
        return;
    }
    ?>
    <div class="notice notice-warning">
        <p>
            <?php esc_html_e('Hearthstone PWA expects the Hearthstone Hospitality theme to provide manifest and service-worker behavior.', 'hearthstone-pwa'); ?>
        </p>
    </div>
    <?php
}
add_action('admin_notices', 'hearthstone_pwa_maybe_warn_about_theme');
