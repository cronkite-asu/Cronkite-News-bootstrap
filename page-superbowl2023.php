<?php

/*
  Template Name: Super Bowl 2023
*/

get_header('superbowl'); ?>

  <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
        }
    }

    get_template_part('partials/content', 'superbowl2023');
?>

<?php get_footer('new2020'); ?>
