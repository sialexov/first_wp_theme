<?php
    get_header();
?>
<style>
.post1 {
    display: inline-block;
    width: min-content;
    border: 1px gray solid;
    border-radius: 8px;
    background-color: beige;
    padding: 5px;
    margin: 10px;

}
</style>

<?php
    $location = 'main_nav';
    $locations = get_nav_menu_locations();
    $menu = wp_get_nav_menu_object($locations[$location]);
    $menu_items = wp_get_nav_menu_items($menu->term_id);

    foreach ($menu_items as $item) {
        echo "<div class=post1>$item->title</div>";
    }
?>

<h2>4 последних продукта</h2>
    <?php
$product_querry = new WP_Query( array (
    'post_type' => 'produkts',
    'posts_per_page' => 3,
    'order' =>'DESC'
));
//print_r($product_querry -> the_post());
if ($product_querry -> have_posts()) :
    while ($product_querry -> have_posts()) : $product_querry -> the_post();
    ?>
    <div style="display: inline-block; margin: 10px; border: beige 1px solid; background-color: beige; padding: 5px 10px; border-radius: 8px">
        <?php
        echo the_title() . "<br>";
        echo the_post_thumbnail('medium');
        ?>
    </div>
<?php
    endwhile;
    wp_reset_postdata();
endif;

?>
<div class="posts_header">
    
<h2>3 свежие записи:</h2><br>
</div>

<?php
    $myposts = get_posts( array(
        'post_type' => 'post',
    ));

    foreach ($myposts as $i) :
        $id = $i -> ID;
        echo $i -> post_title . "<br>";
        echo get_the_post_thumbnail($id, 'medium') . "<br>";
    endforeach;
    //print_r($myposts);
?>




<!-- Products section -->
<h2>4 продукта:</h2><br>
    
    <?php
    // Products query from WP_Query
    $products = get_posts( array(
        'post_type' => 'produkts',
        'posts_per_page' => 4,
        'meta_key' => 'button',
        'meta_value' => "В наличии"
    ));

    foreach ($products as $product) {
        $id = $product -> ID;
        $details = array(
            'articul' => get_field('artikul', $id),
            'title' => get_the_title($id),
            'img' => get_the_post_thumbnail($id, 'thumbnail'),
            'price' => get_field('price', $id),
            'status' => get_field('button', $id)
        );
            echo $details['img'] ? "{$details['img']}<br>" : "Изображение отсутствует<br>";
            echo $details['title'] . "<br>";
            echo "Артикул: " . $details['articul'] . "<br>";
            echo "Цена: " . $details['price'] . "<br>";
            echo "В наличии: ";
            echo $details['status'] == "В наличии" ? "Да" : "Нет";
            echo "<br><hr>";
    }
    wp_reset_postdata();  
    ?>
<hr>



<!-- Ingredients terms -->
<h2>5 терминов глоссария:</h2>
<?php
    $ingr = get_posts (array (
        'post_type' => 'ingredients',
        'posts_per_page' => 3
    ));

    foreach ($ingr as $i) {
        echo $i -> post_title . "<br>";
    }

    // echo "<pre>";
    //     print_r($ingr);
    // echo "<pre>";
    wp_reset_postdata();
?>