<?php
if (!defined("ABSPATH")) {
    exit;
}

get_header();

$hero_gallery_images = function_exists('chama_inn_get_home_hero_gallery_uris') ? chama_inn_get_home_hero_gallery_uris() : [];
$hero_image_url = $hero_gallery_images[0] ?? get_theme_file_uri('assets/images/csi-assets/csi-31.jpg');
$hero_style = $hero_image_url !== false
    ? ' style="background-image:url(' . esc_url($hero_image_url) . ');"'
    : '';
?>

<main id="main-content" class="guest-auth-shell">
    <section class="guest-auth-shell__backdrop"<?php echo $hero_style; ?>>
        <div class="guest-auth-shell__overlay"></div>
        <div class="guest-auth-shell__inner">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php echo do_shortcode('[chama_guest_auth_app]'); ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
