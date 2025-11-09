<!DOCTYPE html>
<html>

<?php get_header(); ?>

<body>
    <h1>Добро пожаловать в BCMED!</h1>
    <div>
        <a href="<?php echo get_post_type_archive_link('produkts'); ?>"><?php echo get_post_type_archive_link('produkts'); ?></a>
    </div>
    <?php  
       if (have_posts()) :
        while (have_posts()) : the_post();
            ?> 
            <article style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">
                <h2>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <p><?php the_excerpt(); ?>
            <?php 
                if (has_post_thumbnail()) :
                    the_post_thumbnail('medium');
                endif;
            ?>
            <div style="margin-top: 10px; font-size: 14px; color: #666;">
                Опубликовано: <?php the_date();?><br>
                Автор: <?php the_author();?><br>
                Наличие в категориях: <?php the_category(', '); ?>
            </div>
            </article>
            <?php
        endwhile;
        else : ?>
            <p>Записи не найдены</p>
        <?php
    endif;
    ?>
    <p>Это базовая тема сайта.</p>
</body>

<?php get_footer(); ?>

</html>
