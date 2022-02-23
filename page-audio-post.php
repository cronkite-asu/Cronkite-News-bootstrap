<?php

/*
  Template Name: Audio Post Template
*/

get_header('new2019'); ?>

  <?php
    if ( have_posts() ) {
      while ( have_posts() ) {
        the_post();
      }
    }

    get_template_part( 'partials/content', 'audio-post-template' );
  ?>

<?php get_footer('new2020'); ?>
