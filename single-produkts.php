<!-- Новый файл -->
<?php get_header(); ?>

<?php //get_fields(); // возвращает массив всех полей записи ACF

$img = get_field('main_img'); // Картинка. Возврат массив
$artikul = get_field('artikul'); //Протое поле
$price = (int)get_field('price');
$obem = get_field('obem'); // Простое поле
//$ingr = get_field('ingr'); // Объект записи. Возврат массив объектов
$status = get_field('button')[0]; // Чекбокс. Возврат значения
$tip_kozhi = get_field('tip_kozhi'); // Радио-кнопка. Возврат значения => массив объектов

// Bring to array

$tip_kozhi = is_array($tip_kozhi) ? $tip_kozhi : array($tip_kozhi);
?>

<!-- <?php
    if ($img) : ?>
        <figure>
                <img src="<?php echo $img['sizes']['medium'];?>">
            <figcaption>Это картинка</figcaption>
        </figure>
    <?php
    else : ?>
    <figure>
        <img src="https://mywp.local/wp-content/uploads/2025/09/Good-Mood-Sun-Sun-Flower-Flower-Fun-Face-Funny-2719167.jpg" width="400">
        <figcaption>Это заглушка</figcaption>
    </figure>
<?php
    endif;
?> -->

<!-- Вывод картинки из записи -->
<?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_post_thumbnail('medium');
        endwhile;
    endif;
?>

<br>
<p>
Артикул: <?php echo $artikul; ?>
</p>
Цена: <?php
if (gettype($price) === 'integer') :
    echo "{$price}₽"; 
else :
    echo "Цена по запросу";
endif;

?>
<br>
Объем: <?php echo $obem; ?>
<br>
В наличии:
<?php
    if ($status == "В наличии") :
        echo "<span class='product-available'>$status</span>";
    else :
        echo "<span class='product-unavailable'>$status</span>";
    endif;
?>
</p>
Активные компоненты:

<!-- Вывод в виде списка ссылок -->
<ul>
<?php
get_template_part('template-parts/product-ingredients');

?>
</ul>


<br>
Для типов кожи:
<ul>
<?php
    foreach ($tip_kozhi as $tip) {
        if ($tip) :
            echo "<li>" . $tip;
        else :
            echo "Тип кожи не указан";
        endif;
}      
?>
</ul>
<hr>
<h3>Рекомендумые товары</h3>
<?php
$term = wp_get_post_terms(get_the_ID(), 'product-line');

$product_query = new WP_Query( array (
    'post_type' => 'produkts',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
        'taxonomy' => 'product-line',
        'field' => 'slug',
        'terms' => $term[0]->slug
        )
    )
));
if ($product_query -> have_posts()) :
    while ($product_query -> have_posts()) : $product_query -> the_post();
        echo the_title() . "<br>";
    endwhile;
    wp_reset_postdata();
endif;

?>
<pre>
<?php print_r($term)?>
</pre>
<?php get_footer(); ?>