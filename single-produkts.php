<?php get_header(); ?>


<?php //get_fields(); // возвращает массив всех полей записи ACF

$img = get_field('main_img'); // Картинка. Возврат массив
$artikul = get_field('artikul'); //Протое поле
$price = (int)get_field('price'); //Простое поле
$obem = get_field('obem'); // Простое поле
$ingr = get_field('ingr'); // Объект записи. Возврат массив объектов
$status = get_field('button'); // Чекбокс. Возврат значения
$tip_kozhi = get_field('tip_kozhi'); // Радио-кнопка. Возврат значения => массив объектов

// Bring to array
$ingr = is_array($ingr) ? $ingr : array($ingr);
$tip_kozhi = is_array($tip_kozhi) ? $tip_kozhi : array($tip_kozhi);
?>

<?php
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
?>

<!-- Вывод картинки из записи -->
<!-- <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_post_thumbnail('medium');
            echo "<br>Это картинка из записи";
        endwhile;
    endif;
?> -->

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
    if ($status == "в наличии") :
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
    foreach ($ingr as $wp_post) {
        ?>
        <li>
            <a href="<?php echo $wp_post -> guid?>" target="_blank">
                <?php echo $wp_post -> post_title; ?>
            </a>
    <?php
    }
    wp_reset_postdata(); //Восстанавливает $post()
?>
</ul>


<br>
Для типов кожи:
<ul>
<?php
    foreach ($tip_kozhi as $tip) {
        if ($tip) :
            echo "<li>" . $tip -> name;
        else :
            echo "Тип кожи не указан";
        endif;
}
        
?>
</ul>
<?php get_footer(); ?>