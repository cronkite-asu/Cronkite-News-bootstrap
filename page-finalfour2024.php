<?php

/**
 * Template Name: Final Four 2024
 */

get_header('new2019'); ?>

  <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
        }
    }

    get_template_part('partials/content', 'finalfour2024');
?>

<?php get_footer('new2020'); ?>
