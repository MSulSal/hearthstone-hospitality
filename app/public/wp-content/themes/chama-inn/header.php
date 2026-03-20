<?php
if (!defined('ABSPATH')) {
    exit;
}

$header_cta_url   = function_exists('chama_inn_get_header_cta_url') ? chama_inn_get_header_cta_url() : home_url('/contact');
$header_cta_label = function_exists('chama_inn_get_header_cta_label') ? chama_inn_get_header_cta_label() : __('Book Your Stay', 'chama-inn');
$packaged_logo_uri = function_exists('chama_inn_get_packaged_logo_uri') ? chama_inn_get_packaged_logo_uri() : '';
$site_name = get_bloginfo('name');
$is_front_page = is_front_page();
$show_site_title = true;
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<script>document.documentElement.classList.add("has-js");</script>

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'chama-inn'); ?></a>

<header class="site-header">
    <div class="site-header__inner">
        <div class="site-header__brand">
            <?php if ($packaged_logo_uri !== '' && !$is_front_page) : ?>
                <div class="site-header__logo">
                    <a class="site-header__logo-link" href="<?php echo esc_url(home_url('/')); ?>">
                        <img class="site-header__logo-image" src="<?php echo esc_url($packaged_logo_uri); ?>" alt="<?php echo esc_attr($site_name); ?>">
                    </a>
                </div>
                <?php $show_site_title = false; ?>
            <?php elseif (function_exists('the_custom_logo') && has_custom_logo() && !$is_front_page) : ?>
                <div class="site-header__logo">
                    <?php the_custom_logo(); ?>
                </div>
                <?php $show_site_title = false; ?>
            <?php endif; ?>

            <?php if ($show_site_title) : ?>
                <a class="site-header__title" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php echo esc_html($site_name); ?>
                </a>
            <?php endif; ?>
        </div>

        <button class="site-header__menu-toggle" type="button" aria-expanded="false" aria-controls="site-header-panel">
            <span class="site-header__menu-toggle-line"></span>
            <span class="site-header__menu-toggle-line"></span>
            <span class="site-header__menu-toggle-line"></span>
            <span class="screen-reader-text"><?php esc_html_e('Toggle navigation menu', 'chama-inn'); ?></span>
        </button>

        <div class="site-header__panel" id="site-header-panel">
            <nav class="site-header__nav" aria-label="<?php esc_attr_e('Primary menu', 'chama-inn'); ?>">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'wp_page_menu',
                ]);
                ?>
            </nav>

            <a class="site-header__cta" href="<?php echo esc_url($header_cta_url); ?>">
                <?php echo esc_html($header_cta_label); ?>
            </a>
        </div>
    </div>
</header>
