<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<?php if (!is_page('guest-access')) : ?>
    <footer class="site-footer">
        <?php
        $footer_logo = function_exists('chama_inn_get_logo_variant_uri') ? chama_inn_get_logo_variant_uri('footer') : '';
        $property_name = function_exists('chama_inn_get_branding_value')
            ? chama_inn_get_branding_value('property_name')
            : get_bloginfo('name');
        ?>
        <div class="site-footer__inner">
            <div class="site-footer__brand">
                <?php if ($footer_logo !== '') : ?>
                    <img class="site-footer__logo-image" src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr($property_name); ?>">
                <?php endif; ?>
                <p class="site-footer__text">
                    <?php
                    printf(
                        esc_html__('Copyright %1$s %2$s - All Rights Reserved.', 'chama-inn'),
                        esc_html(gmdate('Y')),
                        esc_html($property_name)
                    );
                    ?>
                </p>
            </div>
        </div>
    </footer>
<?php endif; ?>

<?php
if (!is_page('guest-access') && function_exists('chama_inn_render_guest_mobile_nav')) {
    chama_inn_render_guest_mobile_nav();
}
?>

<?php wp_footer(); ?>
</body>
</html>
