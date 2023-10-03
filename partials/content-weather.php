<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1>Weather</h1>
      </div>
    </div>
  </div>
</div>

<div class="grid-container content">

<?php
  // save main story ID
  $repeatStoriesArray = array();

// get super bowl content
if (have_rows('weather_content')) {
    while (have_rows('weather_content')) {
        the_row();
        if (get_row_layout() == 'weather_report') {
            // get stories
            $mainStoryCounter = 1;
            $counter = 0;
            $weatherReportVideo = get_sub_field('weather_youtube_link');
            ?>
        <div class="grid-x">
          <div class="large-7 medium-7 small-12 cell story-text">

            <?php
            if ($weatherReportVideo != '') {
                $youtubeID = explode('=', $weatherReportVideo);
                ?>
                <div class="embed-container"><iframe src="https://www.youtube.com/embed/<?php echo $youtubeID[1]; ?>" frameborder="0" allowfullscreen></iframe></div>
            <?php } ?>
          </div>

        <?php } elseif (get_row_layout() == 'top_stories') { ?>

          <div class="large-5 medium-5 small-12 cell top-stories">
            <div class="grid-x grid-padding-x">
              <div class="large-12 medium-12 small-12 cell">
                <h4><?php echo get_sub_field('section_title'); ?></h4>
              </div>
            </div>
            <div class="grid-x grid-padding-x">
              <?php
                $counter = 0;
            $storyList = get_sub_field('story_list');
            foreach ($storyList as $story) {
                if ($counter < 2) {
                    $permalink = get_permalink($story->ID);
                    $title = get_the_title($story->ID);
                    $storyTease = get_field('story_tease', $story->ID);
                    $photoURL = get_the_post_thumbnail_url($story->ID);
                    $photoImg = get_the_post_thumbnail($story->ID);
                    ?>
                  <div class="large-6 medium-6 small-12 cell">
                    <a href="<?php echo $permalink; ?>"><?php echo $photoImg; ?></a>
                        <?php if (get_field('use_short_headline', $story->ID) == 'yes' && get_field('homepage_headline', $story->ID) != '') { ?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo get_field('homepage_headline', $story->ID); ?></a></h3>
                        <?php } else { ?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                        <?php } ?>
                  </div>
                        <?php
                }
                $counter++;
            }
            ?>
            </div>
            <div class="grid-x grid-padding-x">
              <div class="large-12 medium-12 small-12 cell">
                <div class="survey-cta">
                  <h5>Climate anxiety survey</h5>
                  <p><i class="fa-sharp fa-solid fa-square-check"></i><span>Please take this <a href="https://cronkitenews.azpbs.org/2023/02/21/climate-change-anxiety-survey-arizona-drought/" rel="noopener" target="_blank">short survey</a> now and help us report on climate anxiety.</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php } elseif (get_row_layout() == 'stories') { ?>

        <div class="large-12 medium-12 small-12 cell">
          <div class="grid-x">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x">
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
                <?php } else { ?>
                      <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                <?php } ?>
                  </div>
                <?php
            }
            ?>
          </div>
        </div>

        <?php } elseif (get_row_layout() == 'videos') { ?>

        <div class="large-12 medium-12 small-12 cell video">
          <div class="grid-x">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
          </div>
          <div class="grid-x grid-padding-x">
            <?php
            if (have_rows('video')) {
                while (have_rows('video')) {
                    the_row();
                    ?>
                  <div class="large-3 medium-3 small-12 cell">
                    <?php echo '<a href="'.get_sub_field('link').'" target="_blank"><img src="'.get_sub_field('preview_image').'"></a>'; ?>
                  </div>
                    <?php
                }
            }
            ?>
          </div>
        </div>

        <?php } elseif (get_row_layout() == 'embeds') { ?>

            <?php
        }
    }
}
?>

</div>
