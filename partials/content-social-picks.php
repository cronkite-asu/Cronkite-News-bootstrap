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

  <div class="grid-x grid-margin-x">
    <?php if ($query->have_posts() ) : ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="cell large-4 small-4"><a href="<?php echo get_permalink(); ?>" target="_blank"><?php echo get_the_post_thumbnail(get_the_ID()); ?></a></div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>

</div>
