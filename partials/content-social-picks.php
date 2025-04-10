<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1>Social Stories</h1>
      </div>
    </div>
  </div>
</div>

<!-- main body container -->
<div id="homepage-container">
  <!-- main stories -->
  <div class="grid-container content">
  <?php
    $args = array(
      'post_type' => 'post',
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'category__in' => array( 37726 )
    );
    $query = new WP_Query($args);
  ?>

  <style>
    .headline-holder {
      margin-bottom:25px;
    }
    .headline-holder a {
      position: relative;
      display: block;
    }
    .headline-holder a h2 {
      position: absolute;
      bottom: 0;
      left: 0;
      max-width: 100%;
      width: 100%;
      background-image: linear-gradient(to bottom, transparent, #0a0a0a);
      font-weight: 600;
      font-family: "Roboto", sans-serif;
      font-size: 1.15rem !important;
      margin-top: 16px;
      margin-bottom: 0px;
      padding: 10px 25px;
      color: #ffffff;
    }
  </style>

  <div class="grid-x grid-margin-x">
    <?php if ($query->have_posts() ) : ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php $homepageHeadline = get_field('homepage_headline', get_the_ID()); ?>
        <div class="cell large-4 small-4 headline-holder"><a href="<?php echo get_permalink(); ?>" target="_blank"><?php echo get_the_post_thumbnail(get_the_ID()); ?><h2><?php echo $homepageHeadline; ?></h2></a></div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

</div>
