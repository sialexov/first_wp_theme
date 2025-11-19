<?php
$ingr = get_field('ingr');
$ingr = is_array($ingr) ? $ingr : array($ingr);

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