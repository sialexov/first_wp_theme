<?php
// Открывается по ?post_type=produkts

// Добавьте эту строку в самом начале для отладки
echo '<!-- Загружен archive-produkts.php -->';

get_header(); 
?>

<main>
    <h1>Наша продукция</h1>
    
    <?php 
    // Проверка, какие посты загружаются
    global $wp_query;
    echo '<!-- Количество постов: ' . $wp_query->post_count . ' -->';
    ?>
    
    <?php
    if (have_posts()) :
        $in_stock = [];
        $out_stock = [];

        while (have_posts()) : the_post();
            $status = get_field('button');
            $details = array(
                'id' => get_the_id(),
                'title' => get_the_title(),
                'img' => get_the_post_thumbnail(get_the_ID(), 'thumbnail'),
                'price' => get_field('price'),
                'status' => $status
            );

            if ($status == "В наличии") :
                    $in_stock[] = $details;
            elseif ($status == "Нет в наличии") :
                $out_stock[] = $details;
            
            endif;
        endwhile;
    endif; 
        ?>
<h2>Товары в наличии</h2><br>
<?php 
foreach ($in_stock as $detail => $unit) {
    echo $unit['img'] ? "{$unit['img']}<br>" : "Изображение отсутствует<br>";
    echo $unit['title'] . "<br>";
    echo "Артикул: " . $unit['id'] . "<br>";
    echo "Цена: " . $unit['price'] . "<br>";
    echo "В наличии: ";
    echo $unit['status'] == "В наличии" ? "Да" : "Нет";
    echo "<br><hr>";
}
?>

<h2>Товаров нет в наличии</h2><br>
<?php 
foreach ($out_stock as $detail => $unit) {
    echo $unit['img'] . "<br>";
    echo $unit['title'] . "<br>";
    echo "Артикул: " . $unit['id'] . "<br>";
    echo "Цена: " . $unit['price'] . "<br>";
    echo "В наличии: ";
    echo $unit['status'] == "В наличии" ? "Да" : "Нет";
    echo "<br><hr>";
}
?>

</main>

<?php get_footer(); ?>