<?php
function bcmed_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'bcmed_setup');

// Menus registration
function bcmed_menus() {
    register_nav_menus( array(
        'main_nav' => 'На главной',
        'products_nav' => 'Для архивов',
        'blog_nav' => 'Для блога'
    ));
}
add_action('after_setup_theme', 'bcmed_menus');



// Widget registration
function bcmed_widgets() {
    register_sidebar( array(
        'name' => 'bcmed_left_sidebar',
        'id' => 'sidebar1',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n"
    ));

        register_sidebar( array(
        'name' => 'bcmed_footer_sidebar',
        'id' => 'sidebar2',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget'  => "</li>\n",
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => "</h2>\n"
    ));
}
add_action('widgets_init', 'bcmed_widgets');


// Проверка архива продуктов
add_action('wp_footer', function() {
    if(current_user_can('manage_options')) { // Только для админов
        $cpt = get_post_type_object('produkts');
        echo '<div style="background:#fff;padding:20px;margin:20px;border:2px solid red;">';
        echo '<h3>Диагностика CPT Products:</h3>';
        if($cpt) {
            echo '<pre>';
            echo 'Public: ' . ($cpt->public ? 'true' : 'false') . "\n";
            echo 'Has Archive: ' . ($cpt->has_archive ? 'true' : 'false') . "\n";
            echo 'Rewrite Slug: ' . ($cpt->rewrite['slug'] ?? 'не установлен') . "\n";
            echo 'Show in REST: ' . ($cpt->show_in_rest ? 'true' : 'false') . "\n";
            echo 'Query Var: ' . ($cpt->query_var ? 'true' : 'false') . "\n";
            echo '</pre>';
        } else {
            echo 'CPT "products" не зарегистрирован!';
        }
        echo '</div>';
    }
});