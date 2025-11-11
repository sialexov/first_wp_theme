<head>
    <!-- Коммент для GitHub -->
    <meta charset="UTF-8">
    <h1>This is the header</h1>
    <?php wp_head(); ?>

    <?php
    if (is_front_page()) {
        wp_nav_menu( array(
            'theme_location' => 'bcmed_header_menu',
            'menu' => 'Хедер'
        ));
    } else if (is_single()) {
        wp_nav_menu( array(
            'theme_location' => 'bcmed_header_menu',
            'menu' => 'Для постов'
        ));  
    }
    ?>
</head>