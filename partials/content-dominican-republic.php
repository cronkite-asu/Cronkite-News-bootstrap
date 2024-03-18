<?php

  // get dominican republic content
  if (have_rows('content')) {
    while (have_rows('content')) {
        the_row();
        if (get_row_layout() == 'stories') {
          $columns = get_sub_field('columns');
          // get stories
          $storyList = get_sub_field('story');

          // check column type
          if ($columns == 'one-col') {
            $columnType = 'large-12 medium-12';
          } else if ($columns == 'two-col') {
            $columnType = 'large-6 medium-6';
          } else if ($columns == 'three-col') {
            $columnType = 'large-4 medium-4';
          } else if ($columns == 'four-col') {
            $columnType = '';
          }
?>
          <div class="grid-container dominican-republic-story">
            <div class="grid-x">
<?php
          if ($storyList) {
            foreach ($storyList as $story) {
                $permalink = get_permalink($story->ID);
                $title = get_the_title($story->ID);
                $storyTease = get_field('story_tease', $story->ID);
                $photo = get_the_post_thumbnail_url($story->ID);
                $photoSmall = get_the_post_thumbnail($story->ID);
              ?>
                <div class="<?php echo $columnType; ?> small-12 cell story-text">
                  <h3><a href="<?php echo get_permalink($story->ID); ?>"><?php echo get_the_title($story->ID); ?></a></h3>
                  <p><?php echo get_field('story_tease', $story->ID); ?></p>
                  <a href="<?php echo get_permalink($story->ID); ?>" class="button">Read More <i class="fa-regular fa-angle-right"></i></a>
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
