<div class="grid-container intro">
  <div class="grid-x">
    <div class="large-12 medium-12 small-12 cell">
      <h1 class="text-center"><?php echo get_the_title(); ?></h1>
      <p><?php the_content(); ?></p>
    </div>
  </div>
</div>

<?php




  // get tapachula content
if (have_rows('content')) {
    while (have_rows('content')) {
        the_row();
        if (get_row_layout() == 'story') {
            // get stories
            $storyList = get_sub_field('story');
            if ($storyList) {
                foreach ($storyList as $story) {
                    $permalink = get_permalink($story->ID);
                    $title = get_the_title($story->ID);
                    $storyTease = get_field('story_tease', $story->ID);
                    $photo = get_the_post_thumbnail_url($story->ID);
                    $photoSmall = get_the_post_thumbnail($story->ID);
                }
            }

            ?>
          <div class="grid-container tapachula-story">
            <div class="grid-x">
              <div class="large-6 medium-6 small-12 cell story-text">
                <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                <p><?php echo $storyTease; ?></p>
                <a href="<?php echo $permalink; ?>" class="button">Read More <i class="fa-regular fa-angle-right"></i></a>
              </div>

              <div class="large-6 medium-6 small-12 cell story-photo show-for-medium" style="background-image:url('<?php echo $photo; ?>');background-size:cover;background-repeat:no-repeat;">

              </div>
              <div class="large-6 medium-6 small-12 cell story-photo show-for-small-only">
                <?php echo $photoSmall; ?>
              </div>
            </div>
          </div>
        <?php } elseif (get_row_layout() == 'photo-story') {
            // get stories
            $storyList = get_sub_field('photo_story');
            if ($storyList) {
                foreach ($storyList as $story) {
                    $permalink = get_permalink($story->ID);
                    $title = get_the_title($story->ID);
                    $storyTease = get_field('story_tease', $story->ID);
                    $photo = get_the_post_thumbnail_url($story->ID);
                    $photoSmall = get_the_post_thumbnail($story->ID);
                }
            }

            ?>
          <div class="grid-container tapachula-story">
            <div class="grid-x">
              <div class="large-6 medium-6 small-12 cell story-text">
                <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                <p><?php echo $storyTease; ?></p>
                <a href="<?php echo $permalink; ?>" class="button">Photo story <i class="fa-regular fa-angle-right"></i></a>
              </div>

              <div class="large-6 medium-6 small-12 cell story-photo show-for-medium" style="background-image:url('<?php echo $photo; ?>');background-size:cover;background-repeat:no-repeat;">

              </div>
              <div class="large-6 medium-6 small-12 cell story-photo show-for-small-only">
                <?php echo $photoSmall; ?>
              </div>
            </div>
          </div>

        <?php } elseif (get_row_layout() == 'gallery') { ?>
        <?php } elseif (get_row_layout() == 'video') {
            // get stories
            $storyList = get_sub_field('video_story');
            if ($storyList) {
                foreach ($storyList as $story) {
                    $permalink = get_permalink($story->ID);
                    $title = get_the_title($story->ID);
                    $storyTease = get_field('story_tease', $story->ID);
                    $photo = get_the_post_thumbnail_url($story->ID);
                    $photoSmall = get_the_post_thumbnail($story->ID);
                }
            }

            ?>
          <div class="grid-container tapachula-story">
            <div class="grid-x">
              <div class="large-6 medium-6 small-12 cell story-text">
                <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                <p><?php echo $storyTease; ?></p>
                <a href="<?php echo $permalink; ?>" class="button">Watch <i class="fa-regular fa-angle-right"></i></a>
              </div>

              <div class="large-6 medium-6 small-12 cell story-photo show-for-medium" style="background-image:url('<?php echo $photo; ?>');background-size:cover;background-repeat:no-repeat;">

              </div>
              <div class="large-6 medium-6 small-12 cell story-photo show-for-small-only">
                <?php echo $photoSmall; ?>
              </div>
            </div>
          </div>

            <?php
        }
    }
}
      ?>
