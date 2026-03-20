<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<footer class="site-footer">
    <?php
    $footer_logo = function_exists('chama_inn_get_packaged_logo_uri') ? chama_inn_get_packaged_logo_uri() : '';
    ?>
    <div class="site-footer__inner">
        <div class="site-footer__brand">
            <?php if ($footer_logo !== '') : ?>
                <img class="site-footer__logo-image" src="<?php echo esc_url($footer_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            <?php endif; ?>
            <p class="site-footer__text">
                <?php
                printf(
                    esc_html__('Copyright %1$s %2$s - All Rights Reserved.', 'chama-inn'),
                    esc_html(gmdate('Y')),
                    esc_html(get_bloginfo('name'))
                );
                ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
