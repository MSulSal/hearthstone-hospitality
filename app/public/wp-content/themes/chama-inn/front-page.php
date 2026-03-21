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
            $hero_logo_uri = function_exists('chama_inn_get_logo_variant_uri') ? chama_inn_get_logo_variant_uri('hero') : '';
            $hero_gallery_images = function_exists('chama_inn_get_home_hero_gallery_uris') ? chama_inn_get_home_hero_gallery_uris() : [];
            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

            if (is_string($featured_image_url) && $featured_image_url !== '') {
                array_unshift($hero_gallery_images, $featured_image_url);
                $hero_gallery_images = array_values(array_unique($hero_gallery_images));
            }

            $hero_image_url = $hero_gallery_images[0] ?? get_theme_file_uri('assets/images/csi-assets/csi-31.jpg');
            $hero_style     = $hero_image_url !== false
                ? ' style="background-image:url(' . esc_url($hero_image_url) . ');"'
                : '';
            $hero_gallery_attr = count($hero_gallery_images) > 1
                ? ' data-gallery="' . esc_attr(implode('|', $hero_gallery_images)) . '"'
                : '';
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('home-page'); ?>>
                <section class="home-hero"<?php echo $hero_style; ?><?php echo $hero_gallery_attr; ?>>
                    <div class="home-hero__overlay"></div>
                    <div class="home-hero__content">
                        <?php if ($hero_logo_uri !== '') : ?>
                            <div class="home-hero__logo-wrap">
                                <img class="home-hero__brand-image" src="<?php echo esc_url($hero_logo_uri); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            </div>
                            <h1 class="screen-reader-text"><?php echo esc_html(get_bloginfo('name')); ?></h1>
                        <?php elseif (function_exists('the_custom_logo') && has_custom_logo()) : ?>
                            <div class="home-hero__logo-wrap">
                                <?php the_custom_logo(); ?>
                            </div>
                            <h1 class="screen-reader-text"><?php echo esc_html(get_bloginfo('name')); ?></h1>
                        <?php else : ?>
                            <h1 class="home-hero__title"><?php echo esc_html(get_bloginfo('name')); ?></h1>
                        <?php endif; ?>

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
