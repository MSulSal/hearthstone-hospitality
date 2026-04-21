<?php
if (!defined("ABSPATH")) {
    exit;
}

get_header();
?>

<main id="main-content" class="guest-auth-shell">
    <section class="guest-auth-shell__backdrop">
        <div class="guest-auth-shell__overlay"></div>
        <div class="guest-auth-shell__inner">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php else : ?>
                <?php echo do_shortcode('[hearthstone_guest_auth_app]'); ?>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
