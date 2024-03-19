<?php

  // get dominican republic content
  if (have_rows('content')) {
    $counter = 0;
    while (have_rows('content')) {
        the_row();
        if (get_row_layout() == 'stories') {
          $columns = get_sub_field('columns');
          $sectionPhoto = get_sub_field('section-photo');
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

          if ($columns == 'one-col') {
            if ($counter == 0) {
              $class = 'first';
            } else {
              $class = '';
            }
?>
          <div class="grid-container full dominican-republic-story <?php echo $class; ?>">
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
              <div class="<?php echo $columnType; ?> small-12 cell">
                <?php if ($sectionPhoto != '') { ?>
                  <img src="<?php echo $sectionPhoto; ?>" alt="" title="" />
                <?php } else { ?>
                  <img src="<?php echo $photo; ?>" alt="" title="" />
                <?php } ?>
              </div>
            <?php
              }
            }
            ?>
            </div>
          </div>

<?php
          } else {
?>
          <div class="grid-container dominican-republic-story">
            <div class="grid-x grid-margin-x">
              <?php
              if ($storyList) {
                foreach ($storyList as $story) {
                    $permalink = get_permalink($story->ID);
                    $title = get_the_title($story->ID);
                    $storyTease = get_field('story_tease', $story->ID);
                    $photo = get_the_post_thumbnail_url($story->ID);
                    $photoSmall = get_the_post_thumbnail($story->ID);
              ?>
                <div class="<?php echo $columnType; ?> small-12 cell">
                  <?php if ($sectionPhoto != '') { ?>
                    <img src="<?php echo $sectionPhoto; ?>" alt="" title="" />
                  <?php } else { ?>
                    <img src="<?php echo $photo; ?>" alt="" title="" />
                  <?php } ?>
                </div>
              <?php
                }
              }
              ?>
              </div>
            </div>
<?php
          }
?>
          <div class="grid-container dominican-republic-story">
            <div class="grid-x grid-margin-x">
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
      $counter++;
    }
?>
