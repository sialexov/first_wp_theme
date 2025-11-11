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
        while (have_posts()) : the_post();
        ?>
        <div>
            <h3><a href="<?php the_permalink()?>"><?php the_title();?></a></h3><br>
            <?php the_post_thumbnail([150, 150])?><br>
            <?php the_field('price'); ?> р<br>
            <?php the_field('artikul');?><br>
            <a href="<?php the_permalink()?>">Подробнее</a><br>
        </div>
        <hr>

        <?php
        endwhile;
    endif;
        ?>
    
    
</main>

<?php get_footer(); ?>