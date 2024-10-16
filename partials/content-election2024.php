<?php
// top stories array to avoid dups
$topStoriesArray = [];
$candidateProfiles = [];

/*$mainStoryList = get_field('candidate_profiles', 237021);
$mainStoryCounter = 0;

foreach ($mainStoryList as $mainStory) {
    $candidateProfiles[] = $mainStory->ID;
}*/
?>

<!-- main body container -->
<div id="election-container" class="grid-container">
  <div class="grid-x grid-padding-x align-stretch">
    <div class="large-12 medium-12 small-12 cell">

      <div class="grid-x grid-padding-x">
        <div class="large-3 medium-3 small-12 cell story slide-aside">
          <div class="grid-x grid-padding-x">
            <?php
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
            foreach ($mainStoryList as $mainStory) {
              if ($mainStoryCounter > 0 && $mainStoryCounter < 3) {
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
                <div class="large-12 medium-12 small-12 cell story">
                  <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
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
                <div class="large-6 medium-6 small-12 cell story">
                  <div class="grid-x grid-padding-x">
                    <div class="large-12 medium-12 small-12 cell story">
                      <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
                    </div>
                  </div>
                </div>
        <?php
              }
              $mainStoryCounter++;
            }
        ?>

        <?php
            $mainStoryList = get_field('stories', 237021);
            $mainStoryCounter = 0;
        ?>
              <div class="large-3 medium-3 small-12 cell top-stories">
                <div class="grid-x grid-padding-x">
                  <div class="large-12 medium-12 small-12 cell story">
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
                          <li><a href="<?php echo $permalink; ?>" target="_blank"><?php echo $title; ?></a></li>
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

<div class="grid-container videos">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell key-dates">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Videos</h4>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
          <?php
            $args = [
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'cat' =>  22877,
                    'posts_per_page' => 4,
                    /*'post__not_in' => $candidateProfiles,*/
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    echo '<div class="large-3 medium-3 small-12 cell"><a href="'.$permalink.'">'.get_the_post_thumbnail(get_the_ID()).'<h3>'.get_the_title(get_the_ID()).'</h3></a></div>';
                }
            }
          ?>
      </div>
    </div>
  </div>
</div>

<div class="grid-container spanish">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell key-dates">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Spanish</h4>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
          <?php
            $args = [
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'cat' =>  22877,
                    'posts_per_page' => 4,
                    /*'post__not_in' => $candidateProfiles,*/
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    if (get_field('use_short_headline', get_the_ID()) == 'yes' && get_field('homepage_headline', get_the_ID()) != '') {
                        $title = get_field('homepage_headline', get_the_ID());
                    } else {
                        $title = get_the_title(get_the_ID());
                    }
                    echo '<div class="large-3 medium-3 small-12 cell"><a href="'.$permalink.'">'.get_the_post_thumbnail(get_the_ID()).'<h3>'.$title.'</h3></a></div>';
                }
            }
          ?>
      </div>
    </div>
  </div>
</div>

<div class="grid-container latest-news">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Latest News</h4>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
          <?php
            $args = [
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'cat' =>  32929,
                    'category__not_in' => array(22877),
                    'post__not_in' => $topStoriesArray,
                    /*'post__not_in' => $candidateProfiles,*/
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    if (get_field('use_short_headline', get_the_ID()) == 'yes' && get_field('homepage_headline', get_the_ID()) != '') {
                        $title = get_field('homepage_headline', get_the_ID());
                    } else {
                        $title = get_the_title(get_the_ID());
                    }
                    echo '<div class="large-3 medium-3 small-12 cell"><a href="'.$permalink.'">'.get_the_post_thumbnail(get_the_ID()).'</a><a href="'.$permalink.'"><h3>'.$title.'</a></h3></div>';
                }
            }
          ?>
      </div>
    </div>

  </div>
</div>
