<?php

/**
 * Template Name: World Series 2023
 */

get_header('superbowl'); ?>

  <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
        }
    }

    get_template_part('partials/content', 'worldseries2023');
?>

<?php get_footer('new2020'); ?>
