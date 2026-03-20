<?php
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<main id="main-content" class="home-shell">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php
            $hero_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $hero_style     = $hero_image_url !== false
                ? ' style="background-image:url(' . esc_url($hero_image_url) . ');"'
                : '';
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('home-page'); ?>>
                <section class="home-hero"<?php echo $hero_style; ?>>
                    <div class="home-hero__overlay"></div>
                    <div class="home-hero__content">
                        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                            <div class="home-hero__logo-wrap">
                                <?php the_custom_logo(); ?>
                            </div>
                        <?php endif; ?>

                        <p class="home-hero__eyebrow">
                            <?php echo esc_html(get_bloginfo('description')); ?>
                        </p>
                        <h1 class="home-hero__title"><?php the_title(); ?></h1>

                        <?php if (has_excerpt()) : ?>
                            <p class="home-hero__subtitle"><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                    </div>
                </section>

                <section class="home-content">
                    <div class="home-content__inner">
                        <?php the_content(); ?>
                    </div>
                </section>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="home-content">
            <div class="home-content__inner">
                <h1><?php esc_html_e('Welcome to Chama Station Inn', 'chama-inn'); ?></h1>
                <p><?php esc_html_e('Create and publish a Home page to control this content in WordPress.', 'chama-inn'); ?></p>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();
