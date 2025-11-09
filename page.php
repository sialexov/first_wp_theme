<?php get_header(); ?>

<main>
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
            <!-- ДОБАВЛЯЕМ ВЫВОД МИНИАТЮРЫ -->
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-image">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endif; ?>
            <!-- КОНЕЦ БЛОКА С МИНИАТЮРОЙ -->
            <div><?php the_post_thumbnail(); ?></div>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
