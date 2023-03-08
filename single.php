<?php
/**
 * Single
 *
 * Loop container for single post content
 */
?>

<?php
  $post = $wp_query->post;  
if (in_category('noticias')) {
    ?>
    <?php get_template_part('single', 'noticias'); ?>
<?php } else { ?>
    <?php get_template_part('single', 'news'); ?>
<?php } ?>
