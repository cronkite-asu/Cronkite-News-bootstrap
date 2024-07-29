<?php
if (have_rows('noticias_homepage')) {
    while (have_rows('noticias_homepage')) {
        the_row();
        // top section
        if (get_row_layout() == 'noticias-main-stories') {
            $intro = get_sub_field('intro_summary');


        } elseif (get_row_layout() == 'intro-split-code') {

        }
    }
}

// top stories array to avoid dups
$topStoriesArray = [];
?>

<!-- main body container -->
<div id="noticias-container" class="grid-container">
  <div class="grid-x grid-padding-x align-stretch">

    <!-- top content -->
    <div class="large-9 medium-12 small-12 cell">

      <!-- main story -->
      <div class="grid-x grid-padding-x">

      <?php
        if (have_rows('noticias_homepage')) {
            while (have_rows('noticias_homepage')) {
                the_row();
                // top section
                if (get_row_layout() == 'noticias-main-stories') {
                    $mainStoryList = get_sub_field('main_stories', 181966);
                    if ($mainStoryList) {
                        $mainStoryCounter = 0;
                        foreach ($mainStoryList as $mainStory) {
                            if ($mainStoryCounter < 1) {
                                //$permalink = get_permalink( $mainStory );
                                $summary = get_field('story_tease', $mainStory);
                                if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                                    $title = get_field('homepage_headline', $mainStory);
                                } else {
                                    $title = get_the_title($mainStory);
                                }

                                // save main story ID
                                $topStoriesArray[] = $mainStory;

                                // build clean URL
                                $storyCleanURL = str_replace("&#8217;", "", str_replace('’', '', str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($mainStory))))));
                                if (get_field('video_location', $mainStory) != '') {
                                    $assetLocation = get_field('video_location', $mainStory);
                                    $target = 'target="_blank"';
                                } elseif (get_field('audio_video_file', $mainStory) != '') {
                                    $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".$mainStory."/".$storyCleanURL;
                                    $target = "";
                                } elseif (get_field('external_link', $mainStory) != '') {
                                    $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".$mainStory."/".$storyCleanURL;
                                    $target = 'target="_blank"';
                                } else {
                                    $assetLocation = get_the_permalink($mainStory);
                                    $target = "";
                                }

                                ?>
                    <div class="large-8 medium-12 small-12 cell story">
                      <a href="<?php echo $assetLocation; ?>" <?php echo $target; ?>><?php echo get_the_post_thumbnail($mainStory); ?></a>
                      <h2><a href="<?php echo $assetLocation; ?>" <?php echo $target; ?>><?php echo $title; ?></a></h2>
                      <p><?php echo $summary; ?></p>
                    </div>
                                <?php
                            }
                        }
                    }
                }
            }
        }
?>

        <div class="large-4 medium-12 small-12 cell story slide-aside">
          <div class="grid-x grid-padding-x">
        <?php
          if (have_rows('noticias_homepage')) {
              while (have_rows('noticias_homepage')) {
                  the_row();
                  // top section
                  if (get_row_layout() == 'noticias-main-stories') {
                      $mainStoryList = get_sub_field('noticias_slide_aside', 181966);
                      if ($mainStoryList) {
                          $mainStoryCounter = 0;
                          foreach ($mainStoryList as $mainStory) {
                              $permalink = get_permalink($mainStory);
                              $summary = get_field('story_tease', $mainStory);
                              if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                                  $title = get_field('homepage_headline', $mainStory);
                              } else {
                                  $title = get_the_title($mainStory);
                              }

                              // save top and bottom slide aside ID
                              $topStoriesArray[] = $mainStory;

                              // build clean URL
                              $storyCleanURL = str_replace("&#8217;", "", str_replace('’', '', str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($mainStory))))));
                              if (get_field('video_location', $mainStory) != '') {
                                  $assetLocation = get_field('video_location', $mainStory);
                                  $target = 'target="_blank"';
                              } elseif (get_field('audio_video_file', $mainStory) != '') {
                                  $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".$mainStory."/".$storyCleanURL;
                                  $target = "";
                              } elseif (get_field('external_link', $mainStory) != '') {
                                  $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".$mainStory."/".$storyCleanURL;
                                  $target = 'target="_blank"';
                              } else {
                                  $assetLocation = get_the_permalink($mainStory);
                                  $target = "";
                              }
                              ?>
                            <div class="large-12 medium-6 small-12 cell story">
                              <a href="<?php echo $assetLocation; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                              <h3><a href="<?php echo $assetLocation; ?>" target="_blank"><?php echo $title; ?></a></h3>
                            </div>
                                      <?php
                          }
                      }
                  }
              }
          }
          ?>
          </div>
        </div>
      </div>
    </div>

    <!-- top stories -->
    <div class="large-3 medium-12 small-12 cell left-column">
      <h4>Lo más destacado</h4>

      <?php
$args = [
              'post_type'   => 'post',
              'post_status' => 'publish',
              'post__not_in' => $topStoriesArray,
              'posts_per_page' => 7,
              'cat' => 22877,
              'order' => 'DESC',
             ];

$latestNews = new WP_Query($args);
if ($latestNews->have_posts()) {
    ?>
          <ul class="no-bullet top-stories">
            <?php
    while ($latestNews->have_posts()) {
        $latestNews->the_post();
        $curID = get_the_ID();
        $permalink = get_permalink($curID);
        $summary = get_field('story_tease', $curID);
        if (get_field('use_short_headline', $curID) == 'yes' && get_field('homepage_headline', $curID) != '') {
            $title = get_field('homepage_headline', $curID);
        } else {
            $title = get_the_title($curID);
        }
        ?>
            <li><a href="<?php echo $permalink; ?>" target="_blank"><?php echo $title; ?></a></li>
            <?php } ?>
          </ul>
            <?php
}
wp_reset_query();
?>
    </div>
  </div>

  <div class="grid-x grid-padding-x">
    <div class="large-9 medium-12 small-12 cell">

    <?php
    if (have_rows('noticias_homepage')) {
        while (have_rows('noticias_homepage')) {
            the_row();
            // top section
            if (get_row_layout() == 'noticias-audio') {
                ?>
          <!-- Cronkite Noticias in Focus -->
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell story audio-block">
              <h4>Cronkite Noticias in Focus</h4>
                <?php echo get_sub_field('noticias-audio-embed', 181966); ?>
            </div>
          </div>

            <?php } elseif (get_row_layout() == 'noticias-custom-section') { ?>
          <!-- latest stories -->
          <div class="grid-x grid-padding-x custom-section">
            <div class="large-12 medium-12 small-12 cell story">
              <h4><?php echo get_sub_field('section-title'); ?></h4>
            </div>

                <?php
                $audioTitleCleanURL = '';
                $mainStoryList = get_sub_field('curated-custom-stories', 181966);
                if ($mainStoryList) {
                    $mainStoryCounter = 0;
                    foreach ($mainStoryList as $mainStory) {
                        $summary = get_field('story_tease');
                        if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                            $title = get_field('homepage_headline', $mainStory);
                        } else {
                            $title = get_the_title($mainStory);
                        }

                        // build clean URL
                        $storyCleanURL = str_replace("&#8217;", "", str_replace('’', '', str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($mainStory))))));
                        if (get_field('video_location', $mainStory) != '') {
                            $assetLocation = get_field('video_location', $mainStory);
                            $target = 'target="_blank"';
                        } elseif (get_field('audio_video_file', $mainStory) != '') {
                            $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".$mainStory."/".$storyCleanURL;
                            $target = "";
                        } elseif (get_field('external_link', $mainStory) != '') {
                            $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".$mainStory."/".$storyCleanURL;
                            $target = 'target="_blank"';
                        } else {
                            $assetLocation = get_the_permalink($mainStory);
                            $target = "";
                        }
                        ?>
                  <div class="large-4 medium-4 small-12 cell align-top">
                    <a href="<?php echo $assetLocation; ?>" <?php echo $target; ?>><?php echo get_the_post_thumbnail($mainStory); ?></a>
                    <h3><a href="<?php echo $assetLocation; ?>" <?php echo $target; ?>><?php echo $title; ?></a></h3>
                  </div>
                        <?php
                    }
                }
                ?>
          </div>
            <?php } elseif (get_row_layout() == 'noticias-report') { ?>
          <div class="grid-x grid-padding-x noticias-report">
            <div class="large-12 medium-12 small-12 cell story">
              <h4>Noticiero Cronkite Noticias</h4>
            </div>
            <div class="large-8 medium-8 small-12 cell">
                <?php echo get_sub_field('noticias_broadcast_embed', 181966); ?>
            </div>
            <div class="large-4 medium-4 small-12 cell">
              <!--<h3><?php //echo get_sub_field('newscast-title', 181966);?></h3>-->
                <?php echo get_sub_field('description', 181966); ?>
            </div>
          </div>
                <?php
            }
        }
    }
?>
    </div>

    <div class="large-3 medium-12 small-12 cell">
      <div class="grid-x grid-padding-x social-accounts">
        <div class="large-12 medium-12 small-12 cell story">
          <h4>Seguir</h4>
        </div>
        <div class="large-12 medium-12 small-12 cell story">
          <a href="https://twitter.com/cronknoticias" target="_blank"><i class="fa-brands fa-twitter-square"></i></a>
          <a href="https://www.facebook.com/CronkiteNoticias/" target="_blank"><i class="fa-brands fa-facebook-square"></i></a>
          <a href="https://www.youtube.com/channel/UC2Iqah0ezokMG1gJH0iZAWA" target="_blank"><i class="fa-brands fa-youtube-square"></i></a>
          <a href="https://www.instagram.com/cronknoticias/" target="_blank"><i class="fa-brands fa-instagram-square"></i></a>
        </div>
      </div>
      <?php
    if (have_rows('noticias_homepage')) {
        while (have_rows('noticias_homepage')) {
            the_row();
            // top section
            if (get_row_layout() == 'noticias-twitter') {
                ?>
            <div class="grid-x grid-padding-x twitter-embed">
              <div class="large-12 medium-12 small-12 cell story">
                <h4>Twitter</h4>
              </div>
              <div class="large-12 medium-12 small-12 cell">
                    <?php echo get_sub_field('twitter_embed_code', 181966); ?>
              </div>
            </div>
                    <?php
            }
        }
    }
?>
    </div>
  </div>
</div>
