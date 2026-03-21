<?php
if (!defined('ABSPATH')) {
    exit;
}

$header_logo_uri = function_exists('chama_inn_get_logo_variant_uri') ? chama_inn_get_logo_variant_uri('header') : '';
$site_name = get_bloginfo('name');
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
            <?php if ($header_logo_uri !== '') : ?>
                <div class="site-header__logo">
                    <a class="site-header__logo-link" href="<?php echo esc_url(home_url('/')); ?>">
                        <img class="site-header__logo-image" src="<?php echo esc_url($header_logo_uri); ?>" alt="<?php echo esc_attr($site_name); ?>">
                    </a>
                </div>
                <?php $show_site_title = false; ?>
            <?php elseif (function_exists('the_custom_logo') && has_custom_logo()) : ?>
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
                <?php chama_inn_render_fallback_menu([
                    'menu_id'    => 'primary-menu',
                    'menu_class' => 'menu',
                ]); ?>
            </nav>
        </div>
    </div>
</header>
