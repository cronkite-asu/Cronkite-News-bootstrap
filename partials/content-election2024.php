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
                  <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?><h3><?php echo $title; ?></h3></a>
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
                      <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($mainStory); ?><h3><?php echo $title; ?></h3></a>
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

<div class="grid-container key-dates">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <img class="show-for-medium" src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/10/Election-Dates-Long-Long-V2.jpg" />
      <img class="show-for-small-only" src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/10/Election-Dates-Long-Mobile-640.jpg" />
    </div>
  </div>
</div>

<div class="grid-container videos">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Videos</h4>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="carousel-stories">
        <?php
        if( have_rows('videos') ) {
          while( have_rows('videos') ) {
            the_row();
            $title = get_sub_field('title');
            $permalink = get_sub_field('yt_link');
            $screenshot = get_sub_field('screenshot');
        ?>
            <div class="large-3 medium-3 small-12 cell"><a href="<?php echo $permalink; ?>" target="_blank"><img src="<?php echo $screenshot; ?>" /><h3><?php echo $title; ?></h3></a></div>
        <?php
            }
          }
        ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid-container candidate-profiles">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Candidate Profiles</h4>
        </div>
      </div>
      <div class="grid-x grid-padding-x">
        <!-- mayor -->
        <div class="large-6 medium-6 small-12 cell candidate-divider">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell candidate-position">
              <p>Mayor</p>
            </div>
        <?php
        $candidateProfilesList = get_field('candidate_profiles', 237021);
        $candidateCounter = 0;
        foreach ($candidateProfilesList as $profile) {
            if ($candidateCounter < 2) {
            $permalink = get_permalink($profile);
            $summary = get_field('story_tease', $profile);
            if (get_field('use_short_headline', $profile) == 'yes' && get_field('homepage_headline', $profile) != '') {
                $title = get_field('homepage_headline', $profile);
            } else {
                $title = get_the_title($profile);
            }
            // save main story ID
            $topStoriesArray[] = $profile;
        ?>
            <div class="large-6 medium-6 small-6 cell story">
              <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($profile); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
            </div>
        <?php } ?>
        <?php $candidateCounter++; ?>
        <?php } ?>
            <hr>
          </div>
        </div>

        <!-- sheriff -->
        <div class="large-6 medium-6 small-12 cell">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell candidate-position">
              <p>Sheriff</p>
            </div>
        <?php
        $candidateProfilesList = get_field('candidate_profiles', 237021);
        $candidateCounter = 0;
        foreach ($candidateProfilesList as $profile) {
            if ($candidateCounter >= 2 && $candidateCounter < 4) {
            $permalink = get_permalink($profile);
            $summary = get_field('story_tease', $profile);
            if (get_field('use_short_headline', $profile) == 'yes' && get_field('homepage_headline', $profile) != '') {
                $title = get_field('homepage_headline', $profile);
            } else {
                $title = get_the_title($profile);
            }
            // save main story ID
            $topStoriesArray[] = $profile;
        ?>
            <div class="large-6 medium-6 small-6 cell story">
              <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($profile); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
            </div>
        <?php } ?>
        <?php $candidateCounter++; ?>
        <?php } ?>
            <hr>
          </div>
        </div>

        <!-- district 3 -->
        <div class="large-6 medium-6 small-12 cell candidate-divider">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell candidate-position">
              <p>District 3</p>
            </div>
        <?php
        $candidateProfilesList = get_field('candidate_profiles', 237021);
        $candidateCounter = 0;
        foreach ($candidateProfilesList as $profile) {
            if ($candidateCounter >= 5 && $candidateCounter < 7) {
            $permalink = get_permalink($profile);
            $summary = get_field('story_tease', $profile);
            if (get_field('use_short_headline', $profile) == 'yes' && get_field('homepage_headline', $profile) != '') {
                $title = get_field('homepage_headline', $profile);
            } else {
                $title = get_the_title($profile);
            }
            // save main story ID
            $topStoriesArray[] = $profile;
        ?>
            <div class="large-6 medium-6 small-6 cell story">
              <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($profile); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
            </div>
        <?php } ?>
        <?php $candidateCounter++; ?>
        <?php } ?>
            <hr>
          </div>
        </div>

        <!-- district 5 -->
        <div class="large-6 medium-6 small-12 cell">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell candidate-position">
              <p>District 5</p>
            </div>
        <?php
        $candidateProfilesList = get_field('candidate_profiles', 237021);
        $candidateCounter = 0;
        foreach ($candidateProfilesList as $profile) {
            if ($candidateCounter >= 7 && $candidateCounter < 9) {
            $permalink = get_permalink($profile);
            $summary = get_field('story_tease', $profile);
            if (get_field('use_short_headline', $profile) == 'yes' && get_field('homepage_headline', $profile) != '') {
                $title = get_field('homepage_headline', $profile);
            } else {
                $title = get_the_title($profile);
            }
            // save main story ID
            $topStoriesArray[] = $profile;
        ?>
            <div class="large-6 medium-6 small-6 cell story">
              <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($profile); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
            </div>
        <?php } ?>
        <?php $candidateCounter++; ?>
        <?php } ?>
            <hr>
          </div>
        </div>

        <!-- district 7 -->
        <div class="large-6 medium-6 small-12 cell candidate-divider">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell candidate-position">
              <p>District 7</p>
            </div>
        <?php
        $candidateProfilesList = get_field('candidate_profiles', 237021);
        $candidateCounter = 0;
        foreach ($candidateProfilesList as $profile) {
            if ($candidateCounter >= 9 && $candidateCounter < 14) {
            $permalink = get_permalink($profile);
            $summary = get_field('story_tease', $profile);
            if (get_field('use_short_headline', $profile) == 'yes' && get_field('homepage_headline', $profile) != '') {
                $title = get_field('homepage_headline', $profile);
            } else {
                $title = get_the_title($profile);
            }
            // save main story ID
            $topStoriesArray[] = $profile;
        ?>
            <div class="large-6 medium-6 small-6 cell story">
              <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($profile); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
            </div>
        <?php } ?>
        <?php $candidateCounter++; ?>
        <?php } ?>
          </div>
        </div>

        <!-- district 1 -->
        <div class="large-6 medium-6 small-12 cell">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell candidate-position">
              <p>District 1</p>
            </div>
        <?php
        // left side stories
        $candidateProfilesList = get_field('candidate_profiles', 237021);
        $candidateCounter = 0;
        foreach ($candidateProfilesList as $profile) {
            if ($candidateCounter >= 4 && $candidateCounter < 5) {
            $permalink = get_permalink($profile);
            $summary = get_field('story_tease', $profile);
            if (get_field('use_short_headline', $profile) == 'yes' && get_field('homepage_headline', $profile) != '') {
                $title = get_field('homepage_headline', $profile);
            } else {
                $title = get_the_title($profile);
            }
            // save main story ID
            $topStoriesArray[] = $profile;
        ?>
            <div class="large-6 medium-6 small-12 cell story district1">
              <a href="<?php echo $permalink; ?>" target="_blank"><?php echo get_the_post_thumbnail($profile); ?><h3 style="margin-top:15px;"><?php echo $title; ?></h3></a>
            </div>
        <?php } ?>
        <?php $candidateCounter++; ?>
        <?php } ?>
            <hr>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<div class="grid-container spanish">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>Spanish</h4>
        </div>
      </div>
      <div class="grid-x grid-margin-x">
        <div class="carousel-stories">
          <?php
            $args = [
                    'post_type' => 'post',
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'posts_per_page' => 10,
                    'tax_query'         =>  array(
                        'relation'      =>  'AND',
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'noticias',
                        ),
                        array(
                            'taxonomy' => 'category',
                            'field'    => 'slug',
                            'terms'    => 'election-2024',
                        )
                    )
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $permalink = get_permalink(get_the_ID());
                    if (get_field('use_short_headline', get_the_ID()) == 'yes' && get_field('homepage_headline', get_the_ID()) != '') {
                        $title = get_field('homepage_headline', get_the_ID());
                    } else {
                        $title = get_the_title(get_the_ID());
                    }
                    // save main story ID
                    $topStoriesArray[] = get_the_ID();
                    echo '<div class="large-3 medium-3 small-12 cell"><a href="'.$permalink.'">'.get_the_post_thumbnail(get_the_ID()).'<h3>'.$title.'</h3></a></div>';
                }
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="grid-container latest-news">
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
          <h4>More Coverage</h4>
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
                    'posts_per_page' => -1
                    /*'post__not_in' => $candidateProfiles,*/
            ];
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $permalink = get_permalink(get_the_ID());
                    if (get_field('use_short_headline', get_the_ID()) == 'yes' && get_field('homepage_headline', get_the_ID()) != '') {
                        $title = get_field('homepage_headline', get_the_ID());
                    } else {
                        $title = get_the_title(get_the_ID());
                    }
                    echo '<div class="large-3 medium-3 small-12 cell latest-news-story"><a href="'.$permalink.'"><div class="img-holder">'.get_the_post_thumbnail(get_the_ID()).'</div><div class="title-holder"><h3>'.$title.'</h3></div></a></div>';
                }
            }
          ?>
      </div>
    </div>
  </div>
</div>
