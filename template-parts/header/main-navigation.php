<?php

function bcmed_get_current_navigation () {
        if (is_front_page()) return 'main_nav';
        if (is_single()) return 'blog_nav';
}

$current_menu = bcmed_get_current_navigation();
?>

<nav>
    <?php wp_nav_menu( array('theme_location' => $current_menu)); ?>
</nav>