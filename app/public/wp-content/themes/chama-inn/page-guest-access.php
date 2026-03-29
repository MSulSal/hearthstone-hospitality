<?php
if (!defined("ABSPATH")) {
    exit;
}

get_header();

$hero_image_url = 'https://cdn.pixabay.com/photo/2020/06/29/17/54/courtyard-5354495_1280.jpg';
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
