<?php
/**
 * The template for displaying single posts
 */
get_header();
?>


<?php 
dynamic_sidebar('bcmed_left_sidebar');
?>
<main id="main">
    <?php 
    if (have_posts()) :
    while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?> </h1>
            <div>
                Опубликовано: <?php the_date(); ?><br>
                Автор: <?php the_author(); ?><br>
                Категория: <?php the_category(', '); ?><br>
            </div>
            <div>
                <?php the_post_thumbnail("large");?> <br>
                <?php the_content();?><br>
                <?php the_tags();?>
            </div>
        </article>
    <?php 
    endwhile;
    endif;
    ?>
</main>

<?php
get_footer();