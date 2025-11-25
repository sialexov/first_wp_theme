<?php
    get_header();
?>
<style>
.post1 {
    display: inline-block;
    width: min-content;
    border: 1px gray solid;
    padding-right: 5px;
}
</style>


<?php get_template_part('template-parts/product-ingredients');?>

<br>
<!-- <?php
    if (is_active_sidebar('sidebar1')) : ?>
    <aside><?php dynamic_sidebar('sidebar1');?></aside>
<?php endif; ?> -->

<div class="posts_header">
<h2>3 свежие записи:</h2><br>
</div>

<?php
$myposts = [];
$i = 0;
if (have_posts()) :
    while (have_posts()) : the_post();
        $myposts[$i] = [get_the_title(), get_the_permalink(), get_the_post_thumbnail(null, 'medium'), get_the_author()];
        $i++;
    endwhile;
endif;

foreach ($myposts as $data) {
    ?>
    <a href="<?php echo $data[1]; ?>"><?php echo "{$data[0]}<br>"; ?></a>
    <?php
    echo $data[2] . "<br>";
    echo $data[3] . "<br>";
    echo "<hr width=200px align=left>";
}
wp_reset_postdata();
?>
<br>


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