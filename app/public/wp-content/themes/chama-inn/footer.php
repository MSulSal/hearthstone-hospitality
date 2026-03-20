<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<footer class="site-footer">
    <p class="site-footer__text">
        <?php
        printf(
            esc_html__('Copyright %1$s %2$s - All Rights Reserved.', 'chama-inn'),
            esc_html(gmdate('Y')),
            esc_html(get_bloginfo('name'))
        );
        ?>
    </p>
</footer>

<?php wp_footer(); ?>
</body>
</html>

