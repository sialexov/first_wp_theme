<?php get_header(); ?>
<html>
<main>
    <h1>Наши Тестыыыы!!!!!!!!!!!! УРААА!!!</h1>
    
    <?php if ( have_posts() ) : ?>
        <div class="products-grid">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="product-item">
                <h2><?php the_title(); ?></h2>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="product-image"><?php the_post_thumbnail(); ?></div>
                <?php endif; ?>
                <div class="product-excerpt"><?php the_excerpt(); ?></div>
                <a href="<?php the_permalink(); ?>">Подробнее</a>
            </div>
        <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>Продукты не найдены.</p>
    <?php endif; ?>
</main>
</html>
<?php get_footer(); ?>
