<?php
// top stories array to avoid dups
$topStoriesArray = [];
$candidateProfiles = [];

$mainStoryList = get_field('candidate_profiles', 237021);
$mainStoryCounter = 0;

foreach ($mainStoryList as $mainStory) {
    $candidateProfiles[] = $mainStory->ID;
}
?>

<!-- main body container -->
<div id="election-container" class="grid-container">
  <div class="grid-x grid-padding-x align-stretch">
    <div class="large-12 medium-12 small-12 cell">

      <div class="grid-x grid-padding-x">
        <div class="large-3 medium-12 small-12 cell story slide-aside">
          <div class="grid-x grid-padding-x">
            <?php
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
            foreach ($mainStoryList as $mainStory) {
              if ($mainStoryCounter != 0) {
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
                <div class="large-6 medium-6 small-6 cell story">
                  <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                  <a href="<?php echo $permalink; ?>" target="_blank"><h5 style="margin-top:15px;"><?php echo $title; ?></h5></a>
                </div>
            <?php
              }
              $mainStoryCounter++;
            }
            ?>
          </div>
        </div>

        <?php
            $mainStoryList = get_field('stories', 237021);
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
                <div class="large-6 medium-12 small-12 cell story">
                  <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                  <a href="<?php echo $permalink; ?>" target="_blank"><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
                </div>
        <?php
              }
              $mainStoryCounter++;
            }
        ?>

        <div class="large-3 medium-12 small-12 cell story slide-aside">
          <div class="grid-x grid-padding-x">
            <?php
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
            foreach ($mainStoryList as $mainStory) {
              if ($mainStoryCounter != 0) {
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
                <div class="large-6 medium-6 small-6 cell story">
                  <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?></a>
                  <a href="<?php echo $permalink; ?>" target="_blank"><h5 style="margin-top:15px;"><?php echo $title; ?></h5></a>
                </div>
            <?php
              }
              $mainStoryCounter++;
            }
            ?>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="grid-container election-details">
  <div class="grid-x grid-padding-x">
    <div class="large-4 medium-4 small-12 cell key-dates">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Latest News</h4>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="large-12 medium-12 small-12 cell">
          <ul class="story-list">
          <?php
            $args = [
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'cat' =>  32929,
                    'posts_per_page' => 19,
                    'post__not_in' => $candidateProfiles,
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    echo '<li><a href="'.$permalink.'">'.get_the_post_thumbnail(get_the_ID()).'</a><h2><a href="'.get_permalink(get_the_ID()).'">'.get_the_title(get_the_ID()).'</a></h2></li>';
                }
            }
          ?>
          </ul>
        </div>
      </div>
    </div>

    <?php
      $mainStoryList = get_field('candidate_profiles', 237021);
      $mainStoryCounter = 0;
      if (count($mainStoryList) > 0) {
    ?>
      <div class="large-8 medium-8 small-12 cell candidate-profiles">
        <div class="grid-x grid-padding-x">
          <div class="large-12 medium-12 small-12 cell">
            <h4>Candidate Profiles</h4>
          </div>
      <?php
        foreach ($mainStoryList as $mainStory) {
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
      <div class="large-3 medium-3 small-6 cell story">
        <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?></a>
        <a href="<?php echo $permalink; ?>" target="_blank"><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
      </div>
      <?php
          $mainStoryCounter++;
        }
      ?>
      </div>
    </div>
  <?php } ?>
  </div>
</div>

<div class="grid-container latest-stories">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <h4><a href="https://cronkitenews.azpbs.org/election-2022/" target="_blank">Arizona ballot propositions</a></h4>
    </div>
    <?php
      $videosList = get_field('explainer_videos', 237021);
      if ($videosList) {
          $videosCounter = 0;
          foreach ($videosList as $videoNews) {
              if ($videosCounter == 0) {
                  if (get_field('video_location', $videoNews) != '') {
                      $permalink = get_field('video_location', $videoNews);
                  } else {
                      $permalink = get_permalink($videoNews);
                  }
                  ?>
                <div class="large-6 medium-6 small-12 cell">
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
                  $videosCounter++;
              }
          }
        ?>
          <div class="large-6 medium-6 small-12 cell">
        <?php
          foreach ($videosList as $videoNews) {
              if ($videosCounter > 1) {
                  if (get_field('video_location', $videoNews) != '') {
                      $permalink = get_field('video_location', $videoNews);
                  } else {
                      $permalink = get_permalink($videoNews);
                  }
                  ?>
                  <div class="grid-x grid-padding-x kill-bottom-space">
                    <div class="large-3 medium-3 small-3 cell">
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
                    </div>
                    <div class="large-9 medium-9 small-9 cell small-stories">
                      <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                      <?php if (get_field('story_tease', $videoNews) != '') { ?>
                      <p><?php echo get_field('story_tease', $videoNews); ?></p>
                      <?php } ?>
                    </div>
                  </div>
        <?php
              }
              $videosCounter++;
          }
        ?>
        </div>
        <?php } ?>
  </div>
</div>
