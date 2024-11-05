<!-- main body container -->
<?php if (get_field('election-layout', 24) == 'yes') { ?>
<!-- main body container -->
<div id="election-container" class="grid-container">
  <div class="grid-x grid-padding-x align-stretch">
    <div class="large-12 medium-12 small-12 cell">

      <div class="grid-x grid-padding-x">
        <div class="large-3 medium-3 small-12 cell story slide-aside">
          <div class="grid-x grid-padding-x">
            <?php
            // left side stories
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
            foreach ($mainStoryList as $mainStory) {
              if ($mainStoryCounter > 0 && $mainStoryCounter < 3) {
                  $permalink = get_permalink($mainStory);
                  $summary = get_field('story_tease', $mainStory);
                  if ($mainStoryCounter == 1) {
                    $firstChild = 'spacer';
                  }

                  if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                      $title = get_field('homepage_headline', $mainStory);
                  } else {
                      $title = get_the_title($mainStory);
                  }

                  // save main story ID
                  $topStoriesArray[] = $mainStory;
            ?>
                <div class="large-12 medium-12 small-6 cell <?php echo $firstChild; ?>">
                  <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($mainStory); ?><h3><?php echo $title; ?></h3></a>
                </div>
            <?php
              }
              $mainStoryCounter++;
            }
            ?>
          </div>
        </div>

        <?php
            // main story
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
            foreach ($mainStoryList as $mainStory) {
              if ($mainStoryCounter < 1) {
                $permalink = get_permalink($mainStory);
                $summary = get_field('story_tease', $mainStory);
                $title = get_the_title($mainStory);

                // save main story ID
                $topStoriesArray[] = $mainStory;
        ?>
                <div class="large-6 medium-6 small-12 cell main-story">
                  <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell">
                      <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($mainStory); ?><h3><?php echo $title; ?></h3></a>
                      <ul class="more-coverage">
                        <li><a href="https://cronkitenews.azpbs.org/election-2024/" target="_blank">More election coverage &raquo;</a></li>
                        <li><a href="https://cronkitenews.azpbs.org/election-2024/results/" target="_blank">Live election results &raquo;</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
        <?php
              }
              $mainStoryCounter++;
            }

            // top stories section
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
        ?>
              <div class="large-3 medium-3 small-12 cell top-stories">
                <div class="grid-x grid-padding-x">
                  <div class="large-12 medium-12 small-12 cell">
                    <h4>Top stories</h4>
                  </div>
                  <div class="large-12 medium-12 small-12 cell">
                    <ul>
        <?php
                    foreach ($mainStoryList as $mainStory) {
                      if ($mainStoryCounter > 2) {
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
                          <li><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></li>
        <?php
                        }
                        $mainStoryCounter++;
                      }
        ?>
                  </ul>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>

<div id="homepage-container">


    <!-- featured stories -->
    <div class="featured-stories-block">
      <div class="grid-container featured-stories">
        <?php if (get_field('election-content') != '') { ?>
          <div class="grid-x grid-margin-x">
            <div class="large-12 medium-12 small-12 cell filler-color">
              <h4>Election 2024</h4>
            </div>
            <div class="large-12 medium-12 small-12 cell">
              <?php echo get_field('election-content', 24); ?>
            </div>
          </div>
        <?php } else { ?>
        <div class="grid-x grid-margin-x">
          <div class="large-12 medium-12 small-12 cell filler-color">
            <h4>Special Projects</h4>
          </div>

          <div class="homepage-special-projects">
            <?php if (have_rows('projects', 24)) { ?>
                <?php while (have_rows('projects', 24)) {
                    the_row(); ?>
                  <div class="large-4 medium-4 small-12 cell text-center special-projects">
                    <?php
                    if (get_sub_field('photo') != '') {
                        $storyPhoto = get_sub_field('photo');
                    } else {
                        $storyPhoto = get_sub_field('photo_url');
                    }
                    ?>
                    <a href="<?php echo get_sub_field('link') ?>" target="_blank"><img src="<?php echo $storyPhoto; ?>" /></a>
                  </div>
                <?php } ?>
            <?php } ?>
          </div>
        </div>

        <div class="grid-x grid-padding-x latest-series">
            <?php
            $seriesTitle = get_field('series_title', 24);
            $seriesDescription = get_field('series_description', 24);
            $seriesStories = get_field('series_stories', 24);
            $seriesURL = get_field('page_url', 24);
            ?>
              <div class="large-4 medium-12 small-12 cell description">
                <h5>
                  <?php if ($seriesTitle != '') {
                      echo $seriesTitle;
                  } ?>
                </h5>
                  <?php if ($seriesDescription != '') {
                      echo $seriesDescription;
                  } ?>
                  <?php if ($seriesURL != '') {
                      echo '<a class="read-more" href="'.$seriesURL.'">READ MORE <i class="fa-regular fa-arrow-right-long"></i></a>';
                  } ?>
              </div>

              <div class="large-8 medium-12 small-12 cell series-stories">
                <ul class="no-bullet">
                <?php
                    if ($seriesStories) {
                        $seriesCounter = 0;
                        foreach ($seriesStories as $seriesNews) {
                          if ($seriesCounter < 8) {
                            $permalink = get_permalink($seriesNews);

                            if (get_field('use_short_headline', $seriesNews) == 'yes' && get_field('homepage_headline', $seriesNews) != '') {
                                $title = get_field('homepage_headline', $seriesNews);
                            } else {
                                $title = get_the_title($seriesNews);
                            }
                ?>
                      <li><i class="fas fa-angle-right"></i> <a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></li>
                <?php
                        }
                        $seriesCounter++;
                      }
                    }
                ?>
                </ul>
              </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <!-- latest stories -->
    <div class="grid-container latest-stories">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Latest News</h4>
        </div>
        <?php
          $latestNewsList = get_field('latest_news_stories', 24);
        if ($latestNewsList) {
            $latestNewsCounter = 0;
            foreach ($latestNewsList as $latestNews) {
                if ($latestNewsCounter < 8) {
                    $permalink = get_permalink($latestNews);
                    ?>
              <div class="large-3 medium-6 small-5 cell">

                  <?php if (get_field('redirect_story', $latestNews) == 'yes' && get_field('redirect_url', $latestNews) != '') { ?>
                    <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($latestNews); ?></a>
                  <?php } else { ?>
                    <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($latestNews); ?></a>
                  <?php } ?>

                    <?php
                    if (get_field('use_short_headline', $latestNews) == 'yes' && get_field('homepage_headline', $latestNews) != '') {
                        $title = get_field('homepage_headline', $latestNews);
                    } else {
                        $title = get_the_title($latestNews);
                    }
                    ?>

                    <?php if (get_field('redirect_story', $latestNews) == 'yes' && get_field('redirect_url', $latestNews) != '') { ?>
                      <h3 class="show-for-medium"><a href="<?php echo $permalink; ?>" target="_blank"><?php echo $title; ?></a></h3>
                    <?php } else { ?>
                      <h3 class="show-for-medium"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                    <?php } ?>
              </div>
              <div class="large-3 medium-6 small-7 cell align-self-middle show-for-small-only">
                <?php if (get_field('redirect_story', $latestNews) == 'yes' && get_field('redirect_url', $latestNews) != '') { ?>
                  <h3><a href="<?php echo $permalink; ?>" target="_blank"><?php echo $title; ?></a></h3>
                <?php } else { ?>
                  <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                <?php } ?>
              </div>
                    <?php
                }
                $latestNewsCounter++;
            }
        }
        ?>
      </div>
    </div>


    <?php if (current_user_can('administrator')) { ?>
    <div class="grid-container photo-gallery-block">
      <div class="grid-x grid-margin-x">
        <div class="large-9 medium-9 small-12 cell">
          <h4>Featured photos</h4>
        </div>
        <div class="large-9 medium-9 small-12 cell">
          <div class="news-featured-photos">
            <?php $featuredPhotos = get_field('featured-photo-gallery', 24); ?>
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

        <div class="large-3 medium-3 small-12 cell">
          <div class="large-12 medium-12 small-12 cell">

          </div>

          <div class="large-12 medium-12 small-12 cell">

          </div>
        </div>
      </div>
    </div>
    <?php } ?>
</div>
