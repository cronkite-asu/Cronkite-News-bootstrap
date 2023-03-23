    <?php
    if (get_query_var('staffname')) {
        $search_staff_name = get_query_var('staffname');
        $normal_staff_name = ucwords(str_replace('-', ' ', $search_staff_name));
    }
    ?>

    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post article-listing">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">

        <div class="large-12 medium-12 small-12 cell story-content">
          <!-- author biography -->
          <?php

            echo '<div class="author_bio">';

            $args = array(
                 'name'           => '"'. (isset($search_staff_name) ? $search_staff_name : "") .'"',
                 'post_type'      => array('students', 'cn_staff'),
                 'post_status'    => 'publish',
                 'posts_per_page' => 1
             );

            $staffProID = get_posts($args);
            $staffDetails = new WP_Query($args);
            $staffChecker = 0;
            if ($staffDetails->have_posts()) {

                while ($staffDetails->have_posts()) {
                    $staffDetails->the_post();

                    if (get_field('student_photo') != '' || get_field('cn_staff_photo') != '') {
                        echo '<div class="author_photo">';
                        if (get_field('cn_staff_photo') != '') {
                              $staffChecker = 1;
                              echo '<img src="'.get_field('cn_staff_photo').'" class="cn-staff-bio-circular-large" alt="'.(isset($staffID) ? get_the_title($staffID) : null).'" />';
                        } else {
                            $staffChecker = 0;
                            echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular-large" alt="'. (isset($staffID) ? get_the_title($staffID) : null) .'" />';
                        }
                        echo '</div>';
                    }

                    echo '<div class="bio">';
                    echo '<div class="name_container">';
                    if (isset($val) && get_the_title($val) != '') {
                        echo '<span class="name-lg">'.get_the_title($val).'</span>';
                    } else {
                        echo '<span class="name-lg">'.'No author name found.'.'</span>';
                    }

                    // show name pronunciation
                    if (get_field('pronunciation') != '' || get_field('audio_pronunciation') != '') {
                        if (get_field('pronunciation') != '') {
                            $pronunciationHolder = get_field('pronunciation');
                        } else {
                            $pronunciationHolder = "Pronunciation";
                        }
                        echo '<span class="pronunciation">';
                        ?>
                        <?php if (get_field('audio_pronunciation') != '') { ?><a onclick="document.getElementById('pronunciation-audio-<?php echo $staffNameURLSafe ?? ''; ?>').play()" class="pronunciation-audio-link"><i class="fas fa-volume-down"></i></a><?php 
                        } ?> <?php echo $pronunciationHolder; ?></span>
                        <?php
                        echo '<audio id="pronunciation-audio-'. (isset($staffNameURLSafe) ? $staffNameURLSafe : "") .'" src="'.get_field('audio_pronunciation').'">Your browser does not support the <code>audio</code> element.</audio>';
                    }

                    // show name pronoun
                    if (get_field('pronoun')) {
                        echo '<span class="pronoun">('.get_field('pronoun').')</span>';
                    }

                    echo '</div>';

                    if (get_field('student_title') != '') {
                        echo '<span class="team-title-lg">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                    } else if (get_field('cn_staff_title') != '') {
                        echo '<span class="team-title-lg">'.ucwords(str_replace('-', ' ', get_field('cn_staff_title'))).'</span>';
                    } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                        echo '<span class="team-title-lg">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                    }

                    if (get_field('biography') != '') {
                        echo get_field('biography');
                    } else if (get_field('cn_staff_bio') != '') {
                        echo get_field('cn_staff_bio');
                    } else {

                    }

                    if (have_rows('social_media_outlets') ) {
                        echo '<div class="author_social_links_lg">';
                        while ( have_rows('social_media_outlets') ) {
                            the_row();
                            if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                if (get_sub_field('social_media_type') == 'twitter') {
                                    ?>
                       <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                       <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                <?php } else if (get_sub_field('social_media_type') == 'facebook') { ?>
                       <a href="https://www.facebook.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                <?php } else if (get_sub_field('social_media_type') == 'instagram') { ?>
                       <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <?php } else if (get_sub_field('social_media_type') == 'linkedin') { ?>
                       <a href="https://www.linkedin.com/in/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <?php } else if (get_sub_field('social_media_type') == 'tiktok') { ?>
                       <a href="https://www.tiktok.com/@<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                    <?php
                                }
                            }
                        }
                        echo '</div>';
                    }

                    if (have_rows('cn_staff_contact') ) {
                        echo '<div class="author_social_links_lg">';
                        while ( have_rows('cn_staff_contact') ) {
                            the_row();
                            if (get_sub_field('contact_outlet') != '' && get_sub_field('social_media_handle') != '') {
                                if (get_sub_field('contact_outlet') == 'twitter') {
                                    ?>
                       <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                <?php } else if (get_sub_field('contact_outlet') == 'email') { ?>
                       <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                <?php } else if (get_sub_field('contact_outlet') == 'facebook') { ?>
                       <a href="https://www.facebook.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                <?php } else if (get_sub_field('contact_outlet') == 'instagram') { ?>
                       <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                <?php } else if (get_sub_field('contact_outlet') == 'linkedin') { ?>
                       <a href="https://www.linkedin.com/in/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                <?php } else if (get_sub_field('social_media_type') == 'tiktok') { ?>
                       <a href="https://www.tiktok.com/@<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                    <?php
                                }
                            }
                        }
                        echo '</div>';
                    }
                    echo '</div>';
                }
            }
            echo '</div>';
            wp_reset_query();
            ?>
        </div>

        <?php
          $args = array(
            'post_type'        => array('post', 'audioVideoCPT'),
            'post_status'      => 'publish',
            'suppress_filters' => false,
            'posts_per_page'   => -1,
            'meta_query'       => array(
              'relation' => 'OR',
              array(
                'key'        => 'byline_info_cn_staff',
                'compare'    => 'LIKE',
                'value'        => '"'.($staffProID[0]->ID ?? null).'"'
              ),
              array(
                'key'        => 'byline_info_cn_photographers',
                'compare'    => 'LIKE',
                'value'        => '"'.($staffProID[0]->ID ?? null).'"'
              ),
              array(
                'key'        => 'byline_info_cn_broadcast_reporters',
                'compare'    => 'LIKE',
                'value'        => '"'.($staffProID[0]->ID ?? null).'"'
              ),
              array(
                'key'        => 'byline_info_cn_data_visualizer',
                'compare'    => 'LIKE',
                'value'        => '"'.($staffProID[0]->ID ?? null).'"'
              )
            )
          );

          $staffStories = new WP_Query($args);

          if ($staffStories->have_posts() ) {
                ?>
          <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
            <div class="grid-x grid-padding-x">
              <div class="large-12 medium-12 small-12 cell">
                <h6>Latest from <?php echo $normal_staff_name; ?></h6>
              </div>
            </div>
              <?php
                while ( $staffStories->have_posts() ) {
                    $staffStories->the_post();

                    $audioTitleCleanURL = str_replace("&#8217;", "", str_replace('’', '', str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title())))));
                    echo '<!-- TITLE: '.get_the_ID().'-->';

                    if (get_field('original-content', get_the_ID()) == 'yes' || get_field('original-content', get_the_ID()) == '') {
                        if (get_field('video_location') != '') {
                            $assetLocation = get_field('video_location');
                        } else if (get_field('audio_video_file') != '') {
                            $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".get_the_ID()."/".$audioTitleCleanURL;
                        } else if (get_field('external_link') != '') {
                            $assetLocation = "https://cronkitenews.azpbs.org/audio/story/".get_the_ID()."/".$audioTitleCleanURL;
                        } else {
                            $assetLocation = get_the_permalink();
                        }
                        ?>
              <div class="grid-x grid-margin-x story-results-stack">
                <div class="large-8 medium-8 small-8 cell">
                  <h4><a href="<?php echo $assetLocation; ?>" target="_blank"><?php echo get_the_title(); ?></a></h4>
                  <p><?php echo get_field('story_tease'); ?></p>
                  <div class="pub_date">
                    <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                  </div>
                </div>
                <div class="large-4 medium-4 small-4 cell">
                  <a href="<?php echo $assetLocation; ?>" target="_blank"><?php echo get_the_post_thumbnail(get_the_ID()); ?></a>
                </div>
                <div class="large-12 medium-12 small-12 cell">
                  <hr />
                </div>
              </div>
                        <?php
                    }
                }
                ?>
          </div>
          <div class="large-4 medium-12 small-12 cell sidebar">
              <?php if ($staffChecker != 1) { ?>
                    <?php dynamic_sidebar('Sidebar Author - 2020'); ?>
              <?php } ?>
          </div>
              <?php 
          } else {
              if ($staffChecker != 1) {
                    ?>
              <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
                <div class="grid-x grid-padding-x">
                  <div class="large-12 medium-12 small-12 cell">

                  </div>
                </div>
              </div>
              <div class="large-4 medium-12 small-12 cell sidebar">

              </div>
                    <?php
              }
          }
          wp_reset_query();
            ?>
      </div>
    </div>
