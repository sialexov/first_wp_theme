<?php
    get_header();
?>
<br>
<?php
    if (is_active_sidebar('sidebar1')) : ?>
    <aside><?php dynamic_sidebar('sidebar1');?></aside>
<?php endif; ?>

<h2>3 свежие записи:</h2><br>
<?php
    if (have_posts()) :
        $post_num = 0;
        while (have_posts()) : the_post();
            if ($post_num == 3) break;
        ?>
        <a href="<?php the_permalink()?>"><h3><?php the_title()?></h3></a>
        <?php the_post_thumbnail([100, 100])?>

        <hr>
        <?php
        $post_num++;
        endwhile;
    endif;
?>
<br>
<!-- Products section -->
<h2>4 продукта:</h2><br>
<?php
    $product_query = new WP_Query ( array(
        'post_type' => 'produkts',
        'post_per_page' => '4',
        'orderby' => 'rand'
    ));

    if ($product_query -> have_posts()) : 
        while ($product_query -> have_posts()) : $product_query -> the_post();
            ?>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title();?> </h3></a>
            <?php the_post_thumbnail([100, 100])?>
            
        <?php
        endwhile;
    endif;
?>
<hr>
<!-- Ingredients terms -->
<h2>5 терминов глоссария:</h2>
<?php
    $glossary_query = new WP_Query (array (
        'post_type' => 'ingredienty',
        'post_per_page' => '5',
        'orderby' => 'rand'
    ));

    if ($glossary_query -> have_posts()) :
        while ($glossary_query -> have_posts()) : $glossary_query -> the_post();
            ?>
            <a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
        <?php
        endwhile;
    endif;

?>