<?php
if (!defined("ABSPATH")) {
    exit;
}

get_header();
?>

<main id="main-content" class="site-main">
    <section class="page-shell__content">
        <div class="page-shell__content-inner">
            <h1><?php echo esc_html(get_bloginfo("name")); ?></h1>

            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class("index-post"); ?>>
                        <h2 class="index-post__title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <div class="index-post__excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
                <?php endwhile; ?>
            <?php else : ?>
                <p><?php esc_html_e("Theme is active. Add pages using the WordPress editor.", "chama-inn"); ?></p>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
