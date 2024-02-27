<?php

/**
 * Template Name: Dominican Republic
 */

get_header('new2019'); ?>

  <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
        }
    }

    get_template_part('partials/content', 'dominican-republic');
?>

<?php get_footer('new2020'); ?>
