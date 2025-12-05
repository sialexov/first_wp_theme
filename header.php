<head>
    <!-- Коммент для GitHub -->
    <meta charset="UTF-8">
    <link rel="stylesheets" href="style.css">
    <h1>This is the header</h1>
    <?php wp_head(); ?>

    <?php get_template_part('template-parts/header/main-navigation')?>

    <!-- <?php
    if (is_front_page()) {
        wp_nav_menu( array(
            'theme_location' => 'main_nav'
        ));
    } else if (is_single()) {
        wp_nav_menu( array(
            'theme_location' => 'blog_nav'
        ));  
    }
    ?> -->
</head>