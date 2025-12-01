<?php
get_header();

$myposts = [];
$i = 0;
if (have_posts()) :
    while (have_posts()) : the_post();
        $myposts[$i] = [get_the_title(), get_the_permalink(), get_the_post_thumbnail(null, 'medium'), get_the_author()];
        $i++;
    endwhile;
endif;

foreach ($myposts as $data) {
    ?>
    <a href="<?php echo $data[1]; ?>"><?php echo "{$data[0]}<br>"; ?></a>
    <?php
    echo $data[2] . "<br>";
    echo $data[3] . "<br>";
    echo "<hr width=200px align=left>";
}
wp_reset_postdata();
?>
<br>