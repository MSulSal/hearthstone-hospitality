<?php
if (!defined("ABSPATH")) {
    exit;
}

get_header();
?>

<main id="main-content" class="site-main">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class("page-shell"); ?>>
                <header class="page-shell__hero">
                    <div class="page-shell__hero-inner">
                        <p class="page-shell__eyebrow">
                            <?php echo esc_html(get_bloginfo("name")); ?>
                        </p>
                        <h1 class="page-shell__title"><?php the_title(); ?></h1>
                        <?php if (has_excerpt()) : ?>
                            <p class="page-shell__subtitle"><?php echo esc_html(get_the_excerpt()); ?></p>
                        <?php endif; ?>
                    </div>
                </header>

                <section class="page-shell__content">
                    <div class="page-shell__content-inner">
                        <?php the_content(); ?>
                    </div>
                </section>
            </article>
        <?php endwhile; ?>
    <?php else : ?>
        <section class="page-shell__content">
            <div class="page-shell__content-inner">
                <h1><?php esc_html_e("Page not found", "chama-inn"); ?></h1>
                <p><?php esc_html_e("Create this page in wp-admin to add content.", "chama-inn"); ?></p>
            </div>
        </section>
    <?php endif; ?>
</main>

<?php
get_footer();

