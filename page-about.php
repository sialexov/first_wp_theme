<?php 
/*
Template Name: Страница "О компании"
*/
get_header();
?>

<h1>This about page</h1>
<main>
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
            <div><img src='<?php the_post_thumbnail(); ?>'></div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
