<div class="grid-container intro">
  <div class="grid-x">
    <div class="large-12 medium-12 small-12 cell superbowl-header">
      <img class="superbowl-logo" src="https://cronkitenews.azpbs.org/wp-content/uploads/2023/01/superbowl-logo-arizona.png"  alt="Super Bowl LVII" title="Super Bowl LVII" /><h1 class="text-center"><?php echo get_the_title(); ?></h1>
    </div>
  </div>
</div>

<?php
  // save main story ID
  $latestStoriesArray = array();

  // get super bowl content
if (have_rows('super_bowl_content') ) {
    while ( have_rows('super_bowl_content') ) {
        the_row();
        if (get_row_layout() == 'stories-list' ) {
            // get stories
            $mainStoryCounter = 1;
            $counter = 0;
            $storyList = get_sub_field('stories');
            ?>
          <div class="grid-container content">
            <div class="grid-x">
              <div class="large-5 medium-5 small-12 cell story-text">
                <?php
                if ($storyList) {
                    foreach ($storyList as $story) {
                        $permalink = get_permalink($story->ID);
                        $title = get_the_title($story->ID);
                        $storyTease = get_field('story_tease', $story->ID);
                        $photoURL = get_the_post_thumbnail_url($story->ID);
                        $photoImg = get_the_post_thumbnail($story->ID);

                        // save main story ID
                        $latestStoriesArray[] = $story->ID;
                        ?>
                        <?php if ($counter == 0) { ?>
                      <a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a>
                      <h3 class="main"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                        <?php } ?>
                        <?php
                        $counter++;
                    }
                }
                ?>

              </div>
              <div class="large-7 medium-7 small-12 cell">
                <div class="grid-x">
                  <?php
                    $counter = 0;
                    foreach ($storyList as $story) {
                        $permalink = get_permalink($story->ID);
                        $title = get_the_title($story->ID);
                        $storyTease = get_field('story_tease', $story->ID);
                        $photoURL = get_the_post_thumbnail_url($story->ID);
                        $photoImg = get_the_post_thumbnail($story->ID);
                        $counter++;

                        if ($counter > 1) {
                            ?>
                      <div class="large-4 medium-4 small-6 cell story-text">
                        <a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a>
                            <?php if (get_field('use_short_headline', $story->ID) == 'yes' && get_field('homepage_headline', $story->ID) != '') { ?>
                          <h3><a href="<?php echo $permalink; ?>"><?php echo get_field('homepage_headline', $story->ID); ?></a></h3>
                            <?php } else { ?>
                          <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                            <?php } ?>
                      </div>
                            <?php
                        }
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>

            <?php
        } elseif (get_row_layout() == 'videos-list' ) {
            // get videos
            $videoList = get_sub_field('videos');
            ?>

          <!-- videos -->
          <div class="grid-container video">
            <div class="grid-x">
              <div class="large-12 medium-12 small-12 cell">
                <h4>Videos</h4>
              </div>

              <?php
                if ($videoList) {
                    foreach ($videoList as $video) {
                        ?>
                  <div class="large-3 medium-3 small-6 cell story-text">
                    <a class="img-preview" href="<?php echo $video['url']; ?>" target="_blank"><img src="<?php echo $video['photo']; ?>" />
                    <div class="overlay"><i class="fa-sharp fa-solid fa-play"></i></div></a>
                    <h3><a href="<?php echo $video['url']; ?>" target="_blank"><?php echo $video['video_headline']; ?></a></h3>
                  </div>
                        <?php
                    }
                }
                ?>
            </div>
          </div>
            <?php
        }
    }
}
?>

<!-- all super bowl stories -->
<div class="grid-container stories">
  <div class="grid-x">
    <div class="large-12 medium-12 small-12 cell">
      <h4>Latest Stories</h4>
    </div>

    <?php
      $args = array(
        'cat' => '29133',
        'post_type' => 'post',
        'post_status' => 'publish',
        'post__not_in' => $latestStoriesArray,
        'posts_per_page' => -1
      );
      $query = new WP_Query($args);
        ?>

    <?php if ($query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <div class="large-4 medium-4 small-12 cell story-text">
          <a href="<?php echo get_permalink(); ?>" target="_blank"><?php echo get_the_post_thumbnail(); ?></a>
        </div>
        <div class="large-8 medium-8 small-12 cell story-text">
          <h3><a href="<?php echo get_permalink(); ?>" target="_blank"><?php echo get_the_title(); ?></a></h3>
          <p><?php echo get_field('story_tease'); ?></p>
          <a href="<?php echo get_permalink(); ?>" class="button">Read More <i class="fa-regular fa-angle-right"></i></a>
        </div>
        <div class="large-12 medium-12 small-12 cell divider"></div>
        <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>
