<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/06/Paris2024_OlyEmbleme_RVB_Poly_2021.png.png" width="60" height="60" alt="2024 Paris Olympics" title="2024 Paris Olympics" style="margin-right:20px;" /> 2024 Paris Olympics</h1>
      </div>
    </div>
  </div>
</div>

<div class="grid-container content">
<?php
  // save main story ID
  $repeatStoriesArray = [];

  // get health content
  if (have_rows('page_layout')) {
    while (have_rows('page_layout')) {
        the_row();
        if (get_row_layout() == 'latest_news_block') { ?>
        <?php
          // get stories
          $mainStoryCounter = 1;
          $counter = 0;
        ?>
          <div class="grid-x grid-padding-x sub-head">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x section-break">
            <div class="large-5 medium-5 small-12 cell story-text">
              <?php
                  $args = [
                              'post_type'   => 'post',
                              'post_status' => 'publish',
                              //'post__not_in' => $topStoriesArray,
                              'posts_per_page' => 1,
                              'cat' => 35197,
                          ];

                  $latestNews = new WP_Query($args);
                  if ($latestNews->have_posts()) {
                      while ($latestNews->have_posts()) {
                          $latestNews->the_post();

                          $permalink = get_permalink($latestNews->ID);
                          $title = get_the_title($latestNews->ID);
                          $storyTease = get_field('story_tease', $latestNews->ID);
                          $photoURL = get_the_post_thumbnail_url($latestNews->ID);
                          $photoImg = get_the_post_thumbnail($latestNews->ID);

                          // save main story ID
                          $repeatStoriesArray[] = get_the_ID();
                          ?>
                            <a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a>
                            <?php if (get_field('use_short_headline', $story->ID) == 'yes' && get_field('homepage_headline', $story->ID) != '') { ?>
                              <h3 class="main"><a href="<?php echo $permalink; ?>"><?php echo get_field('homepage_headline', $story->ID); ?></a></h3>
                            <?php } else {?>
                              <h3 class="main"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                            <?php } ?>
                            <p><?php echo $storyTease; ?></p>
              <?php
                                $counter++;
                      }
                  }
              ?>
            </div>
            <div class="large-7 medium-7 small-12 cell">
              <div class="grid-x grid-padding-x">
                <?php
                $counter = 0;
                $args = [
                            'post_type'   => 'post',
                            'post_status' => 'publish',
                            //'post__not_in' => $topStoriesArray,
                            'posts_per_page' => 7,
                            'cat' => 35197,
                           ];

                $latestNews = new WP_Query($args);
                if ($latestNews->have_posts()) {
                    while ($latestNews->have_posts()) {
                        $latestNews->the_post();

                        $permalink = get_permalink($latestNews->ID);
                        $title = get_the_title($latestNews->ID);
                        $storyTease = get_field('story_tease', $latestNews->ID);
                        $photoURL = get_the_post_thumbnail_url($latestNews->ID);
                        $photoImg = get_the_post_thumbnail($latestNews->ID);

                        // save main story ID
                        $repeatStoriesArray[] = get_the_ID();

                        if ($counter >= 1) {
                            ?>
                          <div class="large-4 medium-4 small-6 cell story-text">
                            <a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a>
                            <?php if (get_field('use_short_headline', $story->ID) == 'yes' && get_field('homepage_headline', $story->ID) != '') { ?>
                              <h3><a href="<?php echo $permalink; ?>"><?php echo get_field('homepage_headline', $story->ID); ?></a></h3>
                            <?php } else {?>
                              <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                            <?php } ?>
                          </div>
                    <?php
                        }
                        $counter++;
                    }
                }

                wp_reset_query();
                ?>
              </div>
            </div>
          </div>

        <?php } elseif (get_row_layout() == 'countdown') { ?>
          <?php if (get_sub_field('show_countdown') == 'yes') { ?>
            <div class="large-12 medium-12 small-12 cell cta noticias-preview">
              <div class="grid-x align-stretch">
                <div class="large-2 medium-2 small-12 cell text-center">
                  <div class="logo">
                    <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/06/Paris2024_OlyEmbleme_RVB_Poly_2021.png.png" alt="2024 Paris Olympics" />
                  </div>
                </div>
                <div class="large-5 medium-5 small-12 cell">
                  <div class="description">
                    <p>2024 Paris Olympics<br />July 26 - August 11, 2024</p>
                  </div>
                </div>
                <div class="large-5 medium-5 small-12 cell border-left">
                  <div id="olympics-countdown" class="large-12 medium-12 small-12 cell">
                    <div class="countdown">
                      <div>
                        <span id="day"></span>
                        <div>Days</div>
                      </div>
                      <div>
                        <span id="hour"></span>
                        <div>Hours</div>
                      </div>
                      <div>
                        <span id="minute"></span>
                        <div>Minutes</div>
                      </div>
                      <div>
                        <span id="second"></span>
                        <div>Seconds</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>

        <?php } elseif (get_row_layout() == 'stories_block') { ?>

          <div class="grid-x grid-padding-x sub-head">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x">
            <div class="featured-health-stories">
            <?php
            $counter = 0;
            $storyList = get_sub_field('story_list');

            foreach ($storyList as $story) {
                $permalink = get_permalink($story->ID);
                $title = get_the_title($story->ID);
                $storyTease = get_field('story_tease', $story->ID);
                $photoURL = get_the_post_thumbnail_url($story->ID);
                $photoImg = get_the_post_thumbnail($story->ID);
              ?>
                  <div class="large-3 medium-3 small-12 cell">
                    <a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a>
                    <?php if (get_field('use_short_headline', $story->ID) == 'yes' && get_field('homepage_headline', $story->ID) != '') { ?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo get_field('homepage_headline', $story->ID); ?></a></h3>
                    <?php } else {?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                    <?php } ?>
                  </div>
            <?php } ?>
            </div>
          </div>

        <?php } elseif (get_row_layout() == 'videos_block') { ?>

          <div class="grid-x grid-padding-x sub-head">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x">
            <div class="featured-health-stories">
            <?php
            $counter = 0;
            $videoList = get_sub_field('video_list');

            foreach ($videoList as $video) {
                print_r($video->[url]);
                echo 'HERE:'.$videoThumb = get_field('thumbnail', $video->ID);
                $videoURL = get_field('video_url', $video->ID);
                $videoTitle = get_field('title', $video->ID);
              ?>
                <div class="large-3 medium-3 small-12 cell">
                  <a href="<?php echo $videoURL; ?>"><?php echo $videoThumb; ?></a>
                  <h3><a href="<?php echo $videoURL; ?>"><?php echo $videoTitle; ?></a></h3>
                </div>
          <?php } ?>
          </div>
        </div>

        <?php } elseif (get_row_layout() == 'featured_block') { ?>
          <div class="grid-x grid-padding-x sub-head">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x sub-head">
              <?php
              $counter = 0;
              $args = [
                          'post_type'   => 'post',
                          'post_status' => 'publish',
                          //'post__not_in' => $repeatStoriesArray,
                          'posts_per_page' => 8,
                          'cat' => 35197,
                         ];

              $latestNews = new WP_Query($args);
              if ($latestNews->have_posts()) {
                  while ($latestNews->have_posts()) {
              ?>
                <div class="large-6 medium-6 small-12 cell featured-block">
                  <div class="grid-x grid-margin-x">
                    <?php
                        $latestNews->the_post();
                        $permalink = get_permalink($latestNews->ID);
                        $title = get_the_title($latestNews->ID);
                        $storyTease = get_field('story_tease', $latestNews->ID);
                        $photoURL = get_the_post_thumbnail_url($latestNews->ID);
                        $photoImg = get_the_post_thumbnail($latestNews->ID);
                    ?>
                    <div class="large-4 medium-4 small-4 cell"><a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a></div>
                    <div class="large-8 medium-8 small-8 cell">
                    <?php if (get_field('use_short_headline', $story->ID) == 'yes' && get_field('homepage_headline', $story->ID) != '') { ?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo get_field('homepage_headline', $story->ID); ?></a></h3>
                    <?php } else {?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                    <?php } ?>
                    <p><?php echo $storyTease = get_field('story_tease', $latestNews->ID); ?></p>
                    </div>
                  </div>
                </div>
              <?php
                }
              }

              wp_reset_query();
              ?>
            </div>
        <?php } elseif (get_row_layout() == 'students_block') { ?>

          <div class="grid-x grid-padding-x students">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
            <?php
            $staffList = get_sub_field('students', 232869);
            $normalizeChars = [
               'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
               'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
               'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
               'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
               'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
               'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
               'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
               'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
            ];
            if ($staffList) {
              $staffCounter = 0;
              foreach ($staffList as $staff) {
                  $permalink = get_permalink($staff);

                  $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($staff)))));
                  $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);
                  ?>
                <div class="large-2 medium-2 small-6 cell text-center">
                  <div class="author_bio post-holder">
                    <div class="author_photo post">
                      <img src="<?php echo get_field('student_photo', $staff); ?>" class="cn-staff-bio-circular-large staff" alt="<?php echo get_the_title($staff); ?>" />
                      <h3><?php echo get_the_title($staff); ?></h3>
                    </div>
                  </div>
                </div>
            <?php
                $staffCounter++;
              }
            }
            ?>
            </div>

        <?php } elseif (get_row_layout() == 'text_block') { ?>

          <div class="grid-x grid-padding-x sub-head">
            <div class="large-6 medium-6 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
            <div class="large-6 medium-6 small-12 cell">
              <h4>Instructors</h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x section-break">
            <?php if (get_sub_field('content')) { ?>
              <div class="large-6 medium-6 small-12 cell">
                <?php echo get_sub_field('content'); ?>
              </div>
            <?php } ?>
            <div class="large-6 medium-6 small-12 cell">
              <div class="grid-x grid-padding-x students">
                <div class="large-4 medium-4 small-4 cell text-center">
                  <div class="author_bio post-holder">
                    <div class="author_photo post">
                      <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2019/09/Brett-Kurland-400x400-1.jpg" class="cn-staff-bio-circular-large staff"  />
                      <h3>Brett Kurland</h3>
                    </div>
                  </div>
                </div>
                <div class="large-4 medium-4 small-4 cell text-center">
                  <div class="author_bio post-holder">
                    <div class="author_photo post">
                      <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2019/09/paolaboivin.jpg" class="cn-staff-bio-circular-large staff"  />
                      <h3>Paola Boivin</h3>
                    </div>
                  </div>
                </div>
                <div class="large-4 medium-4 small-4 cell text-center">
                  <div class="author_bio post-holder">
                    <div class="author_photo post">
                      <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/07/Rian-Bosse.jpg" class="cn-staff-bio-circular-large staff"  />
                      <h3>Rian Bosse</h3>
                    </div>
                  </div>
                </div>
                </div>
              </div>
            </div>

        <?php
      }
    }
  }
?>

</div>
