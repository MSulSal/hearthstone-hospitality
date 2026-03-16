<?php
if (!defined("ABSPATH")) {
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<main class="home-hero">
    <div class="home-hero__inner">
        <h1 class="home-hero__title"><?php bloginfo("name"); ?></h1>
        <p class="home-hero__subtitle">Coming soon.</p>
    </div>
</main>

<?php wp_footer(); ?>
</body>
</html>