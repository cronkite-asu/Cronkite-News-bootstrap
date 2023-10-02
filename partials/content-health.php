<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1>Health</h1>
      </div>
    </div>
  </div>
</div>

<div class="grid-container content">
<?php
  // save main story ID
  $repeatStoriesArray = array();

  // get health content
  if (have_rows('page_layout') ) {
    while ( have_rows('page_layout') ) {
        the_row();
        if (get_row_layout() == 'latest_news_block' ) { ?>
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
                $args = array(
                            'post_type'   => 'post',
                            'post_status' => 'publish',
                            //'post__not_in' => $topStoriesArray,
                            'posts_per_page' => 1,
                            'cat' => 7022
                           );

                $latestNews = new WP_Query($args);
                if ($latestNews->have_posts()) {
                  while ($latestNews->have_posts()) {
                    $latestNews->the_post();

                    $permalink = get_permalink($latestNews->ID);
                    $title = get_the_title($latestNews->ID);
                    $storyTease = get_field('story_tease', $latestNews->ID);
                    $photoURL = get_the_post_thumbnail_url($latestNews->ID);
                    $photoImg = get_the_post_thumbnail($latestNews->ID);
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
                  $args = array(
                              'post_type'   => 'post',
                              'post_status' => 'publish',
                              //'post__not_in' => $topStoriesArray,
                              'posts_per_page' => 7,
                              'cat' => 7022
                             );

                  $latestNews = new WP_Query($args);
                  if ($latestNews->have_posts()) {
                    while ($latestNews->have_posts()) {
                      $latestNews->the_post();

                      $permalink = get_permalink($latestNews->ID);
                      $title = get_the_title($latestNews->ID);
                      $storyTease = get_field('story_tease', $latestNews->ID);
                      $photoURL = get_the_post_thumbnail_url($latestNews->ID);
                      $photoImg = get_the_post_thumbnail($latestNews->ID);

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

        <?php } elseif (get_row_layout() == 'cta_block' ) { ?>

          <?php if (get_sub_field('show_newsletter') == 'yes') { ?>
            <!-- newsletter subscription -->
            <div class="large-12 medium-12 small-12 cell cta subscribe">
              <div class="grid-x align-stretch">

                <div class="large-4 medium-4 small-12 cell">
                  <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2023/04/pathways-logo.png" alt="Pathways" title="Pathways" />
                </div>
                <div class="large-4 medium-4 small-12 cell newsletter-signup">
                  <p>Pathways to Equity is a monthly newsletter about health disparities across the Southwest – and about those on the ground trying to turn things around.</p>
                  <!-- Begin Mailchimp Signup Form -->
                  <div id="mc_embed_signup">
                    <form action="https://asu.us3.list-manage.com/subscribe/post?u=62eb7ffdceb41767fa48e3ced&amp;id=22dfb26d07&amp;f_id=00c9c2e1f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_self">
                      <div id="mc_embed_signup_scroll">
                        <div class="mc-field-group">
                        	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
                        	<span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
                        </div>
                      	<div id="mce-responses" class="clear">
                      		<div class="response" id="mce-error-response" style="display:none"></div>
                      		<div class="response" id="mce-success-response" style="display:none"></div>
                      	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_62eb7ffdceb41767fa48e3ced_22dfb26d07" tabindex="-1" value=""></div>
                        <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                      </div>
                    </form>
                  </div>
                  <!--End mc_embed_signup-->
                </div>
                <div class="large-4 medium-4 small-12 cell border-left more-stories">
                  <p><a href="https://cronkitenews.azpbs.org/category/health/" target="_blank">Find more health stories</a> <i class="fa-solid fa-angles-right"></i></p>
                </div>
              </div>
            </div>
          <?php } else { ?>
            <div class="large-12 medium-12 small-12 cell cta noticias-preview">
              <div class="grid-x align-stretch">
                <div class="large-6 medium-6 small-12 cell">
                  <?php echo get_sub_field('content-english'); ?>
                </div>
                <div class="large-6 medium-6 small-12 cell border-left">
                  <?php echo get_sub_field('content-spanish'); ?>
                </div>
              </div>
            </div>
          <?php } ?>

        <?php } elseif (get_row_layout() == 'stories_block' ) { ?>

            <div class="grid-x grid-padding-x sub-head">
              <div class="large-12 medium-12 small-12 cell">
                <h4><?php echo get_sub_field('section_title'); ?></h4>
              </div>
              <div class="large-12 medium-12 small-12 cell">
                <?php echo get_sub_field('description'); ?>
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

        <?php } elseif (get_row_layout() == 'videos_block' ) { ?>

          <div class="large-12 medium-12 small-12 cell video">
            <div class="grid-x grid-padding-x sub-head">
              <div class="large-12 medium-12 small-12 cell">
                <h4><?php echo get_sub_field('section_title'); ?></h4>
              </div>
            </div>
            <div class="grid-x grid-padding-x">
              <?php
                if (have_rows('video') ) {
                  while ( have_rows('video') ) {
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

        <?php } elseif (get_row_layout() == 'embed_block' ) { ?>

        <?php } elseif (get_row_layout() == 'text_block' ) { ?>

            <div class="grid-x grid-padding-x sub-head">
              <div class="large-12 medium-12 small-12 cell">
                <h4><?php echo get_sub_field('section_title'); ?></h4>
              </div>
            </div>
            <div class="grid-x grid-padding-x section-break">
              <?php if (get_sub_field('content')) { ?>
                <div class="large-8 medium-8 small-12 cell">
                  <?php echo get_sub_field('content'); ?>

                  <div class="grid-x">
                    <div class="large-6 medium-6 small-6 cell">
                      <div class="author_bio post-holder">
                        <div class="author_photo post faculty">
                          <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2023/08/EBY1XTCCR-U05L141RGMD-a3a273171f1e-512.jpeg" class="cn-staff-bio-circular-large staff" alt="Catherine Williams" />
                          <h3>Catherine Williams</h3>
                        </div>
                      </div>
                    </div>


                    <div class="large-6 medium-6 small-6 cell">
                      <div class="author_bio post-holder">
                        <div class="author_photo post faculty">
                          <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2019/09/Julio_Cisneros.jpg" class="cn-staff-bio-circular-large staff" alt="Julio Cisneros" />
                          <h3>Julio Cisneros</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div class="large-4 medium-4 small-12 cell">
                <img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/06/health-insider-800x500-1.jpg" />
                <div class="grey-bg">
                  <p>Cronkite News has partnered with ABC15 Arizona to expand the station’s <a href="https://www.abc15.com/news/health" target="_blank">Health Insider</a> series, which provides expert advice and insights into health topics. Watch our explainer videos <a href="https://cronkitenews.azpbs.org/health-explainer-videos/" target="_blank">here</a>.</p>
                </div>
              </div>
            </div>


        <?php } elseif (get_row_layout() == 'students_block' ) { ?>
          <div class="grid-x grid-padding-x students">
            <div class="large-12 medium-12 small-12 cell">
              <h4><?php echo get_sub_field('section_title'); ?></h4>
            </div>
            <?php
              $staffList = get_sub_field('students', 209553);
              $normalizeChars = array(
                 'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
                 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
                 'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
                 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
                 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
                 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
                 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
                 'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
              );
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
                        <a href="https://cronkitenews.azpbs.org/people/<?php echo $staffNameURLSafe; ?>" target="_blank"><img src="<?php echo get_field('student_photo', $staff); ?>" class="cn-staff-bio-circular-large staff" alt="<?php echo get_the_title($staff); ?>" /></a>
                        <h3><a href="https://cronkitenews.azpbs.org/people/<?php echo $staffNameURLSafe; ?>" target="_blank"><?php echo get_the_title($staff); ?></a></h3>
                      </div>
                    </div>
                  </div>
              <?php
                  $staffCounter++;
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
