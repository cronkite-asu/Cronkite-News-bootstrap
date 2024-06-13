<?php

/*
  Template Name: 2024 Paris Olympics
*/

get_header('new2019'); ?>

  <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
        }
    }

    get_template_part('partials/content', 'olympics-2024');
?>

<?php get_footer('new2020'); ?>
