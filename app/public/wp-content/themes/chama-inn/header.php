<?php
if (!defined('ABSPATH')) {
    exit;
}
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

<a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e('Skip to content', 'chama-inn'); ?></a>

<header class="site-header">
    <div class="site-header__inner">
        <div class="site-header__brand">
            <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                <div class="site-header__logo">
                    <?php the_custom_logo(); ?>
                </div>
            <?php endif; ?>

            <a class="site-header__title" href="<?php echo esc_url(home_url('/')); ?>">
                <?php echo esc_html(get_bloginfo('name')); ?>
            </a>
        </div>

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

        <a class="site-header__cta" href="<?php echo esc_url(home_url('/contact')); ?>">
            <?php esc_html_e('Book Your Stay', 'chama-inn'); ?>
        </a>
    </div>
</header>
