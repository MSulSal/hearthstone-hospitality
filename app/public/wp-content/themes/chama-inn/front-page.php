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
<body <?php body_class('home-page'); ?>>
<?php wp_body_open(); ?>

<main class="billboard">
    <div class="billboard__media" aria-hidden="true">
        <img
            class="billboard__poster"
            src="https://img1.wsimg.com/isteam/videos/gyyYoKP"
            alt=""
        />
        <div class="billboard__overlay"></div>
    </div>

    <div class="billboard__content">
        <img
            class="billboard__logo"
            src="https://img1.wsimg.com/isteam/ip/b34e47f3-f61f-4e2a-9edf-27b8883a5ac0/Copy%20of%20CSI_Logo%20%28Website%29%20%282%29.png/:/rs=h:200,cg:true,m/qt=q:95"
            alt="Chama Station Inn"
        />

        <h1 class="billboard__title">Coming Soon</h1>
    </div>
</main>

<footer class="site-footer">
    <p class="site-footer__text">Copyright © 2026 Chama Station Inn - All Rights Reserved.</p>
</footer>

<?php wp_footer(); ?>
</body>
</html>