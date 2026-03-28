<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main-content" class="home-shell">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('home-page'); ?>>
                <section class="home-content home-content--app-shell">
                    <div class="home-content__inner home-content__inner--app-shell">
                        <?php echo do_shortcode('[chama_guest_home_shell]'); ?>
                    </div>
                </section>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="home-content">
            <div class="home-content__inner">
                <h1><?php esc_html_e('Welcome to Hearthstone Hospitality', 'chama-inn'); ?></h1>
                <p><?php esc_html_e('Create and publish a Home page to control this content in WordPress.', 'chama-inn'); ?></p>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
