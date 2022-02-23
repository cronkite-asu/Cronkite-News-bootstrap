<!-- main body container -->
<div id="homepage-container">

  <!-- main stories -->
  <div class="grid-container main-stories">
    <div class="grid-x">

      <div class="large-8 medium-8 small-12 cell main-slot show-for-medium">
        <?php
          $home_main_story = get_field('main_story_settings', 24);
          if (get_field('main_custom_photo', 24) == '') {
            if ($home_main_story) {
              $counter = 0;
              foreach ($home_main_story as $main_story) {
                if ($counter < 1) {
        ?>
            <?php if (get_field('use_short_headline', $main_story[0]) == 'yes' && get_field('homepage_headline', $main_story[0]) != '') { ?>
              <a href="<?php echo get_permalink($main_story[0]); ?>">
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($main_story[0])); ?>" />
                <h2><?php echo get_field('homepage_headline', $main_story[0]); ?></h2>
              </a>
            <?php } else { ?>
              <a href="<?php echo get_permalink($main_story[0]); ?>">
                <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($main_story[0])); ?>" />
                <h2><?php echo get_the_title($main_story[0]); ?></h2>
              </a>
            <?php } ?>
          <?php
                }
                $counter++;
              }
            }
          } else {
        ?>
            <a href="<?php echo get_field('main_custom_link'); ?>">
              <img src="<?php echo get_field('main_custom_photo'); ?>" />
              <h2><?php echo get_field('main_custom_title'); ?></h2>
            </a>
        <?php
          }
        ?>
      </div>
      <div class="large-4 medium-4 small-12 cell slide-aside show-for-medium">
        <div class="grid-x">
        <?php
          $slideAsideList = get_field('slide_aside', 24);
          if ($slideAsideList != '') {
            foreach ($slideAsideList as $slideAside) {
              $permalink = get_permalink( $slideAside );
        ?>
              <div class="large-12 medium-12 small-12 cell">
                <a href="<?php echo $permalink; ?>"><img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slideAside)); ?>" /></a>
                <?php
                  if (get_field('use_short_headline', $slideAside) == 'yes' && get_field('homepage_headline', $slideAside) != '') {
                    $title = get_field('homepage_headline', $slideAside);
                  } else {
                    $title = get_the_title($slideAside);
                  }
                ?>
                <a href="<?php echo $permalink; ?>"><h2><?php echo $title; ?></h2></a>
              </div>
        <?php
            }
          }
        ?>

        <?php
          if (get_field('custom_slide_aside_title1', 24) != '') {
        ?>
            <div class="large-12 medium-12 small-12 cell">
              <a href="<?php echo get_field('custom_slide_aside_link1', 24); ?>"><img src="<?php echo get_field('custom_slide_aside_photo1', 24); ?>" /></a>
              <?php $title = get_field('custom_slide_aside_title1', 24); ?>
              <a href="<?php echo get_field('custom_slide_aside_link1', 24); ?>"><h2><?php echo $title; ?></h2></a>
            </div>
        <?php
          }

          if (get_field('custom_slide_aside_title2', 24) != '') {
        ?>
            <div class="large-12 medium-12 small-12 cell">
              <a href="<?php echo get_field('custom_slide_aside_link2', 24); ?>"><img src="<?php echo get_field('custom_slide_aside_photo2', 24); ?>" /></a>
              <?php $title = get_field('custom_slide_aside_title2', 24); ?>
              <a href="<?php echo get_field('custom_slide_aside_link2', 24); ?>"><h2><?php echo $title; ?></h2></a>
            </div>
        <?php
          }
        ?>
        </div>
      </div>

        <!-- mobile slider -->
        <div class="large-12 medium-12 small-12 cell slide-aside-main-small show-for-small-only">
          <?php
              $home_main_storyID = get_field('main_story_settings', 24);
              if ($home_main_storyID) {
                $counter = 0;
                foreach ($home_main_story as $main_story) {
                  if ($counter < 1) {
            ?>

            <?php if (get_field('main_custom_photo', 24) == '') { ?>
              <?php if (get_field('use_short_headline', $main_story[0]) == 'yes' && get_field('homepage_headline', $main_story[0]) != '') { ?>
                <a href="<?php echo get_permalink($main_story[0]); ?>">
                  <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($main_story[0])); ?>" />
                  <h2><?php echo get_field('homepage_headline', $main_story[0]); ?></h2>
                </a>
              <?php } else { ?>
                <a href="<?php echo get_permalink($main_story[0]); ?>">
                  <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($main_story[0])); ?>" />
                  <h2><?php echo get_the_title($main_story[0]); ?></h2>
                </a>
              <?php } ?>
            <?php } else { ?>
              <a href="<?php echo get_field('main_custom_link', 24); ?>" target="_blank">
                <img src="<?php echo get_field('main_custom_photo', 24); ?>" />
                <h2><?php echo get_field('main_custom_title', 24); ?></h2>
              </a>
            <?php } ?>
          <?php } ?>
          <?php $counter++; ?>
          <?php } ?>
          <?php } ?>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
          <div class="small-12 cell show-for-small-only"><hr></div>
          <?php
            $slideAsideList = get_field('slide_aside', 24);
            if ($slideAsideList) {
              foreach ($slideAsideList as $slideAside) {
                $permalink = get_permalink( $slideAside );
          ?>
                <div class="large-4 medium-4 small-5 cell slide-aside-small show-for-small-only">
                  <a href="<?php echo $permalink; ?>">
                    <?php echo get_the_post_thumbnail($slideAside, 'full', array('class' => 'img-responsive')); ?>
                  </a>
                </div>
                <div class="large-4 medium-4 small-7 cell slide-aside-small show-for-small-only">
                  <?php
                    if (get_field('use_short_headline', $slideAside) == 'yes' && get_field('homepage_headline', $slideAside) != '') {
                      $title = get_field('homepage_headline', $slideAside);
                    } else {
                      $title = get_the_title($slideAside);
                    }
                  ?>
                  <a href="<?php echo $permalink; ?>"><h2><?php echo $title; ?></h2></a>
                </div>
                <div class="small-12 cell show-for-small-only"><hr></div>
          <?php
              }
            }
             wp_reset_query();
          ?>

      </div>
    </div>


    <!-- vertical stories -->
    <div class="grid-container vertical-stories">
      <div class="grid-x grid-margin-x">

        <?php if (have_rows('area_works_box', 24)) { ?>
          <?php while (have_rows('area_works_box', 24)) { the_row(); ?>
          <div class="large-4 medium-4 small-5 cell stories show-for-small-only">
          <?php
            $image = get_sub_field('area_works_image');
            $postID = get_sub_field('area_works_link');
            $customLinks = get_sub_field('custom_link');
            $customTitle = get_sub_field('story_homepage_title');
            echo '<!--'.$image['url'].'-->';
          ?>
              <div class="img-holder">
              <?php if ($customLinks != '') { ?>
                <a target="_blank" href="<?php echo $customLinks; ?>">
              <?php } else { ?>
                <a href="<?php echo get_permalink($postID); ?>" >
              <?php } ?>
              <?php if ($image['url'] == '') { ?>
                  <img src="<?php echo get_the_post_thumbnail_url($postID); ?>" />
              <?php } else { ?>
                  <img src="<?php echo $image['url']; ?>" />
              <?php } ?>
                </a>
              </div>
            </div>
            <div class="small-7 cell stories remove-padding-left align-self-middle show-for-small-only">
              <?php if ($customTitle != '') { ?>
                <?php if ($customLinks != '') { ?>
                  <a href="<?php echo $customLinks; ?>"><h3><?php echo $customTitle; ?></h3></a>
                <?php } else { ?>
                  <a href="<?php echo get_permalink($postID); ?>"><h3><?php echo $customTitle; ?></h3></a>
                <?php } ?>
              <?php } else { ?>

                <?php if (get_field('use_short_headline', $postID) == 'yes' && get_field('homepage_headline', $postID) != '') { ?>
                  <a href="<?php echo get_permalink($postID); ?>" ><h3><?php echo get_field('homepage_headline', $postID); ?></h3></a>
                <?php } else { ?>
                  <a href="<?php echo get_permalink($postID); ?>" ><h3><?php echo get_the_title($postID); ?></h3></a>
                <?php } ?>
              <?php } ?>
            </div>
            <div class="small-12 cell show-for-small-only"><hr></div>
          <?php } ?>
        <?php } wp_reset_query(); ?>

        <div class="large-4 medium-4 small-12 cell newscast-block">
          <?php
            $videoSetting = get_field('v_video_or_newscast', 24);
            if ($videoSetting == 'Newscast') {

                $arg = array(
                    'post_type'	    => 'post',
                    'order'		    => 'DESC',
                    'orderby'	    => 'date',
                    'posts_per_page'    => 1,
                    'category_name' =>  'newscast'
                );

                $the_query = new WP_Query ($arg);
                if ($the_query->have_posts()) {
                  while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $videoURL = get_field('video_file', false, false);
                    $videoTitle = rtrim(get_the_content(), '.');
                    $vURLid = explode('/', $videoURL);
          ?>
                    <div id="video-holder">
                      <style>.embed-container { position: relative; padding-bottom: 62.5%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
                      <div class="embed-container"><iframe src="<?php echo $videoURL; ?>" frameborder="0" allowfullscreen></iframe></div>
                      <div class="asset-caption"><a href="https://www.youtube.com/watch?v=<?php echo $vURLid[4]; ?>"><h3><?php echo $videoTitle; ?></h3></a></div>
                    </div>
          <?php
                  }
                }
              wp_reset_query();
            }
          ?>
        </div>

        <?php if (have_rows('area_works_box', 24)) { ?>
          <?php while (have_rows('area_works_box', 24)) { the_row(); ?>
          <div class="large-4 medium-4 small-5 cell stories show-for-medium">
          <?php
            $image = get_sub_field('area_works_image');
            $postID = get_sub_field('area_works_link');
            $customLinks = get_sub_field('custom_link');
            $customTitle = get_sub_field('story_homepage_title');
          ?>
            <div class="img-holder">
            <?php if ($customLinks != '') { ?>
              <a target="_blank" href="<?php echo $customLinks; ?>">
            <?php } else { ?>
              <a href="<?php echo get_permalink($postID); ?>" >
            <?php } ?>
            <?php if ($image['url'] == '' ) { ?>
                <img src="<?php echo get_the_post_thumbnail_url($postID); ?>" />
            <?php } else { ?>
                <img src="<?php echo $image['url']; ?>" />
            <?php } ?>
              </a>
            </div>

              <div class="show-for-medium">
              <?php if ($customTitle != '') { ?>
                <?php if($customLinks != '') { ?>
                  <a href="<?php echo $customLinks; ?>"><h3><?php echo $customTitle; ?></h3></a>
                <?php } else { ?>
                  <a href="<?php echo get_permalink($postID); ?>"><h3><?php echo $customTitle; ?></h3></a>
                <?php } ?>
              <?php } else { ?>

                <?php if (get_field('use_short_headline', $postID) == 'yes' && get_field('homepage_headline', $postID) != '') { ?>
                  <a href="<?php echo get_permalink($postID); ?>" ><h3><?php echo get_field('homepage_headline', $postID); ?></h3></a>
                <?php } else { ?>
                  <a href="<?php echo get_permalink($postID); ?>" ><h3><?php echo get_the_title($postID); ?></h3></a>
                <?php } ?>
              <?php } ?>
              </div>
            </div>
          <?php } ?>
        <?php } wp_reset_query(); ?>
      </div>
    </div>

    <!-- featured stories -->
    <div class="featured-stories-block">
      <div class="grid-container featured-stories">
        <div class="grid-x grid-margin-x">
          <div class="large-12 medium-12 small-12 cell filler-color">
            <h4>Special Projects</h4>
          </div>

          <div class="homepage-special-projects">
            <?php if (have_rows('projects', 24)) { ?>
                <?php while (have_rows('projects', 24)) { the_row(); ?>
                  <div class="large-4 medium-4 small-12 cell text-center special-projects">
                    <a href="<?php echo get_sub_field('link')?>" target="_blank"><img src="<?php echo get_sub_field('photo')?>" /></a>
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
          ?>
                <div class="large-5 medium-12 small-12 cell description">
                  <h5><?php if ($seriesTitle != '') { echo $seriesTitle;} ?></h5>
                  <?php if ($seriesDescription != '') { echo $seriesDescription;} ?>
                </div>

                <div class="large-7 medium-12 small-12 cell series-stories">
                  <ul class="no-bullet">
          <?php
            if ($seriesStories) {
              $seriesCounter = 0;
              foreach ($seriesStories as $seriesNews) {
                if ($seriesCounter < 8) {
                $permalink = get_permalink( $seriesNews );
          ?>

                <?php
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
      </div>
    </div>

    <?php if (current_user_can('administrator')) { ?>
    <div class="grid-container photo-gallery-block">
      <div class="grid-x grid-margin-x">
        <div class="large-12 medium-12 small-12 cell">

          <h4>Featured photos</h4>
          <div class="sports-featured-photos">
            <?php $featuredPhotos = get_sub_field('featured-photo-gallery', 180881); ?>
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
    </div>
    <?php } ?>


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
              $permalink = get_permalink( $latestNews );
        ?>
              <div class="large-3 medium-6 small-5 cell">
                <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($latestNews); ?></a>
                <?php
                  if (get_field('use_short_headline', $latestNews) == 'yes' && get_field('homepage_headline', $latestNews) != '') {
                    $title = get_field('homepage_headline', $latestNews);
                  } else {
                    $title = get_the_title($latestNews);
                  }
                ?>
                <h3 class="show-for-medium"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
              </div>
              <div class="large-3 medium-6 small-7 cell align-self-middle show-for-small-only">
                <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
              </div>
        <?php
              }
              $latestNewsCounter++;
            }
          }
        ?>
      </div>
    </div>

    <div class="grid-container latest-stories">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4><a href="https://cronkitenews.azpbs.org/media-literacy/" target="_blank">Media Literacy</a></h4>
        </div>
        <!--<div class="media-literacy-slideshow">-->
        <?php
          $videosList = get_field('videos', 174126);
          if ($videosList) {
            $videosCounter = 0;
            foreach ($videosList as $videoNews) {
              if ($videosCounter < 8) {
                if (get_field('video_location', $videoNews) != '') {
                  $permalink = get_field('video_location', $videoNews);
                } else {
                  $permalink = get_permalink( $videoNews );
                }
        ?>
              <div class="large-4 medium-4 small-12 cell">
                <?php if (get_the_post_thumbnail($videoNews) != '') { ?>
                  <a href="<?php echo $permalink; ?>"><?php echo get_the_post_thumbnail($videoNews); ?></a>
                <?php } else { ?>
                  <?php $videoID = explode('https://youtu.be/', get_field('video_location', $videoNews)); ?>
                  <iframe width="100%" height="210" src="https://www.youtube.com/embed/<?php echo $videoID[1]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <?php } ?>
                <?php
                  if (get_field('use_short_headline', $videoNews) == 'yes' && get_field('homepage_headline', $videoNews) != '') {
                    $title = get_field('homepage_headline', $videoNews);
                  } else {
                    $title = get_the_title($videoNews);
                  }
                ?>
                <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                <?php if (get_field('story_tease', $videoNews) != '') { ?>
                <p><?php echo get_field('story_tease', $videoNews); ?></p>
                <?php } ?>
              </div>
        <?php
              }
              $videosCounter++;
            }
          }
        ?>
        <!--</div>-->
      </div>
    </div>
</div>
