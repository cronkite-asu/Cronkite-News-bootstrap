<?php
if ( have_rows('noticias_homepage') ) {
  while ( have_rows('noticias_homepage') ) { the_row();
    // top section
    if ( get_row_layout() == 'noticias-main-stories' ) {
      $intro = get_sub_field('intro_summary');


    }	elseif ( get_row_layout() == 'intro-split-code' ) {

    }
  }
}

// top stories array to avoid dups
$topStoriesArray = array();
?>

<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1>Noticias</h1>
      </div>
    </div>
  </div>
</div>

<!-- main body container -->
<div id="noticias-container" class="grid-container">
  <div class="grid-x grid-padding-x align-stretch">

    <!-- top content -->
    <div class="large-9 medium-12 small-12 cell">

      <!-- main story -->
      <div class="grid-x grid-padding-x">

      <?php
        if ( have_rows('noticias_homepage') ) {
          while ( have_rows('noticias_homepage') ) { the_row();
            // top section
            if ( get_row_layout() == 'noticias-main-stories' ) {
              $mainStoryList = get_sub_field('main_stories', 180881);
              if ($mainStoryList) {
                $mainStoryCounter = 0;
                foreach ($mainStoryList as $mainStory) {
                  if ($mainStoryCounter < 1) {
                    $permalink = get_permalink( $mainStory );
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
        if ( have_rows('noticias_homepage') ) {
          while ( have_rows('noticias_homepage') ) { the_row();
            // top section
            if ( get_row_layout() == 'noticias-main-stories' ) {
              $mainStoryList = get_sub_field('noticias_slide_aside', 180881);
              if ($mainStoryList) {
                $mainStoryCounter = 0;
                foreach ($mainStoryList as $mainStory) {
                  $permalink = get_permalink( $mainStory );
                  $summary = get_field('story_tease', $mainStory);
                  if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                    $title = get_field('homepage_headline', $mainStory);
                  } else {
                    $title = get_the_title($mainStory);
                  }

                  // save top and bottom slide aside ID
                  $topStoriesArray[] = $mainStory;
      ?>
                  <div class="large-12 medium-6 small-12 cell story">
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
        if ( have_rows('noticias_homepage') ) {
          while ( have_rows('noticias_homepage') ) { the_row();
            // top section
            if ( get_row_layout() == 'noticias-top-stories' ) {
              $mainStoryList = get_sub_field('stories', 180881);
      ?>
              <ul class="no-bullet top-stories">
      <?php
              if ($mainStoryList) {
                $mainStoryCounter = 0;
                foreach ($mainStoryList as $mainStory) {
                  $permalink = get_permalink( $mainStory );
                  $summary = get_field('story_tease', $mainStory);
                  if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                    $title = get_field('homepage_headline', $mainStory);
                  } else {
                    $title = get_the_title($mainStory);
                  }
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

    <?php
      if ( have_rows('noticias_homepage') ) {
        while ( have_rows('noticias_homepage') ) { the_row();
          // top section
          if ( get_row_layout() == 'noticias-audio' ) {
    ?>
          <!-- Cronkite Noticias in Focus -->
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell story audio-block">
              <h4>Cronkite Noticias in Focus</h4>
              <?php echo get_sub_field('noticias-audio-embed', 180881); ?>
            </div>
          </div>

    <?php } else if (get_row_layout() == 'noticias-custom-section') { ?>
          <!-- latest stories -->
          <div class="grid-x grid-padding-x custom-section">
            <div class="large-12 medium-12 small-12 cell story">
              <h4><?php echo get_sub_field('section-title'); ?></h4>
            </div>

            <?php
              $mainStoryList = get_sub_field('curated-custom-stories', 180881);
              if ($mainStoryList) {
                $mainStoryCounter = 0;
                foreach ($mainStoryList as $mainStory) {
                  $permalink = get_permalink( $mainStory );
                  $summary = get_field('story_tease', $mainStory);
                  if (get_field('use_short_headline', $mainStory) == 'yes' && get_field('homepage_headline', $mainStory) != '') {
                    $title = get_field('homepage_headline', $mainStory);
                  } else {
                    $title = get_the_title($mainStory);
                  }
            ?>
                  <div class="large-4 medium-4 small-12 cell align-top">
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
        if ( have_rows('noticias_homepage') ) {
          while ( have_rows('noticias_homepage') ) { the_row();
            // top section
            if ( get_row_layout() == 'noticias-report' ) {
      ?>
            <div class="grid-x grid-padding-x noticias-report">
              <div class="large-12 medium-12 small-12 cell story">
                <h4>Cronkite Noticias Report</h4>
              </div>
              <div class="large-12 medium-12 small-12 cell">
                <?php echo get_sub_field('noticias_broadcast_embed', 180881); ?>
                <h3><a href="<?php echo get_sub_field('direct_link', 180881); ?>" target="_blank"><?php echo get_sub_field('newscast-title', 180881); ?></a></h3>
              </div>
            </div>
      <?php
            } else if ( get_row_layout() == 'noticias-twitter' ) {
      ?>
            <div class="grid-x grid-padding-x twitter-embed">
              <div class="large-12 medium-12 small-12 cell story">
                <h4>Cronkite Noticias Twitter</h4>
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
