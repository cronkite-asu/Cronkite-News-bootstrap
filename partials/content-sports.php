<?php
if (have_rows('sports_homepage')) {
    while (have_rows('sports_homepage')) {
        the_row();
        // top section
        if (get_row_layout() == 'sports-main-stories') {
            $intro = get_sub_field('intro_summary');


        } elseif (get_row_layout() == 'intro-split-code') {

        }
    }
}

// top stories array to avoid dups
$topStoriesArray = [];
?>

<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1>Sports</h1>
      </div>
    </div>
  </div>
</div>

<!-- main body container -->
<div id="sports-container" class="grid-container">
  <div class="grid-x grid-padding-x align-stretch">

    <!-- top content -->
    <div class="large-9 medium-12 small-12 cell">

      <!-- main story -->
      <div class="grid-x grid-padding-x">

      <?php
        if (have_rows('sports_homepage')) {
            while (have_rows('sports_homepage')) {
                the_row();
                // top section
                if (get_row_layout() == 'sports-main-stories') {
                    $mainStoryList = get_sub_field('main_stories', 180881);
                    if ($mainStoryList) {
                        $mainStoryCounter = 0;
                        foreach ($mainStoryList as $mainStory) {
                            if ($mainStoryCounter < 1) {
                                $permalink = get_permalink($mainStory);
                                $summary = get_field('story_tease', $mainStory);
                                if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                                    $title = get_field('homepage_headline', $mainStory);
                                } else {
                                    $title = get_the_title($mainStory);
                                }

                                // save main story ID
                                $topStoriesArray[] = $mainStory;
                                ?>
                                <div class="large-8 medium-12 small-12 cell story">
                                  <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                                  <h2><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h2>
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
if (have_rows('sports_homepage')) {
    while (have_rows('sports_homepage')) {
        the_row();
        // top section
        if (get_row_layout() == 'sports-main-stories') {
            $mainStoryList = get_sub_field('sports_slide_aside', 180881);
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
                    ?>
                  <div class="large-12 medium-6 small-6 cell story">
                    <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                    <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
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
      <h4>Top Stories</h4>
      <?php
if (have_rows('sports_homepage')) {
    while (have_rows('sports_homepage')) {
        the_row();
        // top section
        if (get_row_layout() == 'sports-top-stories') {
            $mainStoryList = get_sub_field('stories', 180881);
            ?>
              <ul class="no-bullet top-stories">
                    <?php
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
                    ?>
                  <li><a href="<?php echo $permalink; ?>" target="_blank"><?php echo $title; ?></a></li>
                            <?php
                }
            }
            ?>
              </ul>
                    <?php
        }
    }
}
?>
    </div>
  </div>

  <div class="grid-x grid-padding-x">
    <div class="large-9 medium-12 small-12 cell">

      <?php if (current_user_can('administrator')) { ?>
      <div class="grid-x grid-margin-x">
        <div id="ncaa-countdown" class="large-12 medium-12 small-12 cell">
          <div class="logo">
            <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2023/11/2024_MFF_Logo_Color-1.svg" alt="NCAA 2024 Men's Final Four in Phoenix" />
          </div>
          <div class="countdown">
            <div>
              <span id="day"></span>
              <div>Day</div>
            </div>
            <div>
              <span id="hour"></span>
              <div>Hour</div>
            </div>
            <div>
              <span id="minute"></span>
              <div>Minute</div>
            </div>
            <div>
              <span id="second"></span>
              <div>Second</div>
            </div>
          </div>
        </div>
      </div>
      <?php } ?>

    <?php
    if (have_rows('sports_homepage')) {
        while (have_rows('sports_homepage')) {
            the_row();
            // top section
            if (get_row_layout() == 'sports-audio') {
                ?>
          <!-- Cronkite Sports in Focus -->
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell story audio-block">
              <h4>The Sweet Spot</h4>
                <?php echo get_sub_field('sports-audio-embed', 180881); ?>
            </div>
          </div>
            <?php } elseif (get_row_layout() == 'sports-video-section') { ?>
          <!-- Cronkite Sports Report -->
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell story audio-block">
              <h4><?php echo get_sub_field('section-title', 180881); ?></h4>
                <?php echo get_sub_field('video-embed', 180881); ?>
            </div>
          </div>

            <?php } elseif (get_row_layout() == 'sports-photos-gallery') { ?>

          <!-- photo gallery -->
          <div class="grid-x grid-padding-x photo-gallery">
            <div class="large-12 medium-12 small-12 cell story">
              <h4>Featured photos</h4>
              <div class="sports-featured-photos">
                <?php $featuredPhotos = get_sub_field('gallery', 180881); ?>
                <?php if ($featuredPhotos) { ?>
                    <?php foreach ($featuredPhotos as $photoID) { ?>
                    <div>
                        <?php echo wp_get_attachment_image($photoID, 'full'); ?>
                      <div class="asset-caption">
                        <p><?php echo wp_get_attachment_caption($photoID); ?></p>
                      </div>
                    </div>
                    <?php } ?>
                <?php } ?>
              </div>
            </div>
          </div>

            <?php } elseif (get_row_layout() == 'sports-latest-stories') { ?>

          <!-- latest stories -->
          <div class="grid-x grid-padding-x latest-news">
            <div class="large-12 medium-12 small-12 cell story">
              <h4>Latest Stories</h4>
            </div>

                <?php
                $args = [
                            'post_type'   => 'post',
                            'post_status' => 'publish',
                            'post__not_in' => $topStoriesArray,
                            'posts_per_page' => 5,
                            'cat' => 185,
                           ];

                $latestNews = new WP_Query($args);
                if ($latestNews->have_posts()) {
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
                  <div class="large-8 medium-8 small-7 cell align-top">
                    <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                    <p><?php echo $summary; ?></p>
                  </div>
                  <div class="large-4 medium-4 small-5 cell">
                    <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($curID); ?></a>
                  </div>
                  <div class="large-12 medium-12 small-12 cell story"><hr /></div>
                        <?php
                    }
                }
                wp_reset_query();
                ?>
          </div>

            <?php } elseif (get_row_layout() == 'sports-custom-section') { ?>

          <!-- custom stories -->
          <div class="grid-x grid-padding-x custom-section">
            <div class="large-12 medium-12 small-12 cell story">
              <h4><?php echo get_sub_field('section-title'); ?></h4>
            </div>

                <?php
                $mainStoryList = get_sub_field('curated-custom-stories', 180881);
                if ($mainStoryList) {
                    $mainStoryCounter = 0;
                    foreach ($mainStoryList as $mainStory) {

                        // save main story ID
                        $topStoriesArray[] = $mainStory;

                        $permalink = get_permalink($mainStory);
                        $summary = get_field('story_tease', $mainStory);
                        if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                            $title = get_field('homepage_headline', $mainStory);
                        } else {
                            $title = get_the_title($mainStory);
                        }
                        ?>
                  <div class="large-4 medium-4 small-7 cell align-top">
                    <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                    <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                  </div>
                        <?php
                    }
                }
                ?>

          </div>
                <?php
            }
        }
    }
?>
    </div>

    <div class="large-3 medium-12 small-12 cell">
      <?php
    if (have_rows('sports_homepage')) {
        while (have_rows('sports_homepage')) {
            the_row();
            // top section
            if (get_row_layout() == 'sports-report') {
                ?>
            <div class="grid-x grid-padding-x sports-report">
              <div class="large-12 medium-12 small-12 cell story">
                <h4>Cronkite Sports Report</h4>
              </div>
              <div class="large-12 medium-12 small-12 cell">
                    <?php echo get_sub_field('sports_broadcast_embed', 180881); ?>
                <h3><a href="<?php echo get_sub_field('direct_link', 180881); ?>" target="_blank"><?php echo get_sub_field('newscast-title', 180881); ?></a></h3>
              </div>
            </div>
                    <?php
            } elseif (get_row_layout() == 'sports-twitter') {
                ?>
            <div class="grid-x grid-padding-x twitter-embed">
              <div class="large-12 medium-12 small-12 cell story">
                <h4>Sports Twitter</h4>
              </div>
              <div class="large-12 medium-12 small-12 cell">
                    <?php echo get_sub_field('twitter_embed_code', 180881); ?>
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
