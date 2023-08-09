  <!-- header -->
  <div class="page-header">
    <div class="grid-container main-stories">
      <div class="grid-x grid-padding-x single-story-block">
        <div class="large-12 medium-12 small-12 cell">
          <h1>Audio <i class="fas fa-headphones"></i></h1>
        </div>
      </div>
    </div>
  </div>

  <!-- audio player -->
  <div class="audio-player-container">
    <div class="grid-container main-stories">
      <div class="grid-x grid-padding-x single-story-block">
        <div class="large-7 medium-12 small-12 cell">
          <audio id="main-audio-player" preload="auto" crossorigin playsinline>
                <source src="" type="audio/mp3">
            </audio>
        </div>
        <div class="large-5 medium-12 small-12 cell now-playing-notice medium-text-right">
          <p><strong>NOW PLAYING</strong></p>
          <p class="current-audio-title"></p>
        </div>
      </div>
    </div>
  </div>

  <!-- main body container -->
  <div id="audio-container" class="grid-container main-stories">

    <div class="grid-x grid-padding-x single-story-block">
      <div class="audio-featured-stories">
        <?php
          $newsStoriesList = get_field('featured_audios', 122187);
        if ($newsStoriesList) {
            $newsStoriesCounter = 0;
            foreach ($newsStoriesList as $newsStories) {
                if ($newsStoriesCounter < 8) {
                    setup_postdata($newsStories);
                    //$permalink = get_permalink( $newsStories );
                    $audioFile = get_field('audio_video_file', $newsStories);
                    $newsFeaturedImg = get_the_post_thumbnail($newsStories);
                    ?>
              <div class="large-4 medium-4 small-12 cell">
                    <?php
                    if (get_field('use_short_headline', $newsStories) == 'yes' && get_field('homepage_headline', $newsStories) != '') {
                        $title = get_field('homepage_headline', $newsStories);
                    } else {
                        $title = get_the_title($newsStories);
                    }
                    ?>
                <a class="audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><?php echo $newsFeaturedImg; ?></a>
                <h3><a class="audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><i class="fas fa-play-circle"></i> <span><?php echo $title; ?><span></a></h3>
              </div>
                    <?php
                }
                $newsStoriesCounter++;
            }
        }
        ?>
      </div>
    </div>

    <div class="grid-x grid-padding-x single-story-block section remove-margin">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content">
        <h2>CN2Go briefings</h2>
      </div>
      <div class="large-6 medium-12 small-12 cell">
        <iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/877770739&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=false"></iframe>
      </div>
      <div class="large-6 medium-12 small-12 cell">
        <div class="grid-x grid-padding-x">
          <div class="large-4 medium-12 small-12 cell ever-green">
            <?php
              $sportsFeaturedStory = get_field('news_audio', 122187);
            if ($sportsFeaturedStory) {
                $sportsStoriesCounter = 0;
                foreach ($sportsFeaturedStory as $sportsFeature) {
                    if ($sportsStoriesCounter < 8) {
                        setup_postdata($sportsFeature);
                        $permalink = get_permalink($sportsFeature);
                        $audioFile = get_field('audio_video_file', $sportsFeature);
                        $newsFeaturedImg = get_the_post_thumbnail_url($sportsFeature);

                        if ($newsFeaturedImg != '') {
                            ?>
                      <img src="<?php echo $newsFeaturedImg; ?>" />
                            <?php
                        }
                        ?>
          </div>

          <div class="large-8 medium-12 small-12 cell ever-green">
                        <?php
                        if (get_field('use_short_headline', $sportsFeature) == 'yes' && get_field('homepage_headline', $sportsFeature) != '') {
                            $title = get_field('homepage_headline', $sportsFeature);
                        } else {
                            $title = get_the_title($sportsFeature);
                        }
                        ?>
                    <h3><a class="audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                    <p><?php echo get_field('story_tease', $sportsFeature); ?></p>
                        <?php
                    }
                    $sportsStoriesCounter++;
                }
                wp_reset_postdata();
            }
            ?>
            <!-- https://cronkitenews.azpbs.org/wp-content/uploads/2021/06/Sharpe-Protection-Act-FINAL.mp3 -->
          </div>
          <div class="large-12 medium-12 small-12 cell remove-margin">
            <hr />
          </div>
        </div>

        <div class="grid-x grid-padding-x">
          <div class="large-12 medium-12 small-12 cell listed-stories">
            <h3>Keep listening</h3>
          </div>
          <?php
            $newsStoriesList = get_field('news_stories', 122187);
            if ($newsStoriesList) {
                $newsStoriesCounter = 0;
                foreach ($newsStoriesList as $newsStories) {
                    if ($newsStoriesCounter < 8) {
                        $permalink = get_permalink($newsStories);
                        $audioFile = get_field('audio_video_file', $newsStories);
                        ?>
                <div class="large-12 medium-12 small-12 cell listed-stories">
                        <?php
                        if (get_field('use_short_headline', $newsStories) == 'yes' && get_field('homepage_headline', $newsStories) != '') {
                            $title = get_field('homepage_headline', $newsStories);
                        } else {
                            $title = get_the_title($newsStories);
                        }
                        ?>
                  <a class="show-for-medium audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><i class="fas fa-play-circle"></i> <?php echo $title; ?></a>
                </div>
                <div class="large-12 medium-12 small-12 cell align-self-middle show-for-small-only remove-margins">
                  <a class="audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><i class="fas fa-play-circle"></i> <?php echo $title; ?></a>
                </div>
                        <?php
                    }
                    $newsStoriesCounter++;
                }
            }
            ?>
        </div>
      </div>
    </div>

    <div class="grid-x grid-padding-x single-story-block">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content">
        <h2>The Sweet Spot</h2>
      </div>
      <div class="large-12 medium-12 small-12 cell">
        <iframe title="The Sweet Spot" allowtransparency="true" height="315" width="100%" style="border: none; min-width: min(100%, 430px);" scrolling="no" data-name="pb-iframe-player" src="https://www.podbean.com/player-v2/?i=3g7ep-f1c9ea-pbblog-playlist&share=1&download=1&rtl=0&fonts=Arial&skin=1&font-color=&logo_link=episode_page&order=episodic&limit=10&filter=all&ss=a713390a017602015775e868a2cf26b0&btn-skin=7&size=315" allowfullscreen=""></iframe>
      </div>
    </div>

    <div class="grid-x grid-padding-x single-story-block">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content">
        <h2>Cronkite Sports in Focus</h2>
      </div>
      <div class="large-6 medium-12 small-12 cell">
        <iframe width="100%" height="450" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/1155132580&color=%23ff5500&auto_play=false&hide_related=true&show_comments=false&show_user=true&show_reposts=false&show_teaser=false"></iframe>
      </div>
      <div class="large-6 medium-12 small-12 cell">
        <div class="grid-x grid-padding-x">
          <div class="large-4 medium-12 small-12 cell ever-green">
            <?php
              $sportsFeaturedStory = get_field('sports_audio', 122187);
            if ($sportsFeaturedStory) {
                $sportsStoriesCounter = 0;
                foreach ($sportsFeaturedStory as $sportsFeature) {
                    if ($sportsStoriesCounter < 8) {
                        setup_postdata($sportsFeature);
                        $permalink = get_permalink($sportsFeature);
                        $audioFile = get_field('audio_video_file', $sportsFeature);
                        $newsFeaturedImg = get_the_post_thumbnail_url($sportsFeature);

                        if ($newsFeaturedImg != '') {
                            ?>
                      <img src="<?php echo $newsFeaturedImg; ?>" />
                            <?php
                        }
                        ?>
          </div>

          <div class="large-8 medium-12 small-12 cell ever-green">
                        <?php
                        if (get_field('use_short_headline', $sportsFeature) == 'yes' && get_field('homepage_headline', $sportsFeature) != '') {
                            $title = get_field('homepage_headline', $sportsFeature);
                        } else {
                            $title = get_the_title($sportsFeature);
                        }
                        ?>
                    <h3><a class="audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><?php echo $title; ?></a></h3>
                    <p><?php echo get_field('story_tease', $sportsFeature); ?></p>
                        <?php
                    }
                    $sportsStoriesCounter++;
                }
                wp_reset_postdata();
            }
            ?>
          </div>
          <div class="large-12 medium-12 small-12 cell remove-margin">
            <hr />
          </div>
        </div>

        <div class="grid-x grid-padding-x">
          <div class="large-12 medium-12 small-12 cell listed-stories">
            <h3>Keep listening</h3>
          </div>
          <?php
            $sportsStoriesList = get_field('sports_stories', 122187);
            if ($sportsStoriesList) {
                $sportsStoriesCounter = 0;
                foreach ($sportsStoriesList as $sportsStories) {
                    if ($sportsStoriesCounter < 8) {
                        $audioFile = get_field('audio_video_file', $sportsStories);
                        $permalink = get_permalink($sportsStories);
                        ?>
                <div class="large-12 medium-12 small-12 cell listed-stories">
                        <?php
                        if (get_field('use_short_headline', $sportsStories) == 'yes' && get_field('homepage_headline', $sportsStories) != '') {
                            $title = get_field('homepage_headline', $sportsStories);
                        } else {
                            $title = get_the_title($sportsStories);
                        }
                        ?>
                  <a class="show-for-medium audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><i class="fas fa-play-circle"></i> <?php echo $title; ?></a>
                </div>
                <div class="large-12 medium-12 small-12 cell align-self-middle show-for-small-only remove-margins">
                  <a class="audio-plyr" data-link="<?php echo $audioFile; ?>" data-title="<?php echo $title; ?>"><i class="fas fa-play-circle"></i> <?php echo $title; ?></a>
                </div>
                        <?php
                    }
                    $sportsStoriesCounter++;
                }
            }
            ?>
        </div>
      </div>
    </div>

    <div class="grid-x grid-padding-x single-story-block section remove-margin">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content">
        <h2>Hosts</h2>
      </div>
      <?php
        $audioStaffList = get_field('audio_staff', 122187);
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
        if ($audioStaffList) {
            $audioStaffCounter = 0;
            foreach ($audioStaffList as $audioStaff) {
                $permalink = get_permalink($audioStaff);

                $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($audioStaff)))));
                $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);
                ?>

            <div class="large-2 medium-2 small-6 cell text-center">
              <div class="author_bio post-holder">
                <div class="author_photo post">
                  <a href="https://cronkitenews.azpbs.org/people/<?php echo $staffNameURLSafe; ?>" target="_blank"><img src="<?php echo get_field('student_photo', $audioStaff); ?>" class="cn-staff-bio-circular-large staff" alt="<?php echo get_the_title($audioStaff); ?>" /></a>
                  <h3><a href="https://cronkitenews.azpbs.org/people/<?php echo $staffNameURLSafe; ?>" target="_blank"><?php echo get_the_title($audioStaff); ?></a></h3>
                </div>
              </div>
            </div>
                <?php
                $audioStaffCounter++;
            }
        }
        ?>
    </div>

    <div class="grid-x grid-padding-x single-story-block section-text">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content-text">
        <h2>Partners</h2>
        <p>Want to use our audio content free of charge? Contact Sadie Babits, <a href="mailto:sbabits@asu.edu" target="_blank">sbabits@asu.edu</a>, to become a partner.</p>
      </div>
      <?php
        $partnersList = get_field('partners', 122187);
        if ($partnersList) {
            foreach ($partnersList as $partner) {
                $logo = $partner['logo'];
                $link = $partner['link'];
                $title = $partner['title'];
                ?>

            <div class="large-4 medium-4 small-12 cell text-center partner-logos">
              <a href="<?php echo $link; ?>"><img src="<?php echo $logo; ?>" alt="<?php echo $title; ?>" /></a>
            </div>
                <?php
            }
        }
        ?>
    </div>

    <div class="grid-x grid-padding-x single-story-block section-text">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content-text">
        <h2>Audio news briefing</h2>
        <p>Our Cronkite News audio producers put together a 3- to 5-minute <a href="https://soundcloud.com/cronkitenews/sets/cn2go" target="_blank">audio news briefing</a> each weekday morning that focuses on important stories that impact residents in Arizona and beyond. Listen now on your smart speaker. All it takes is saying: <em class="cnblue-text">“Alexa, open Cronkite News,”</em> or <em class="cnblue-text">“Hey, Google, play Cronkite News.”</em> The <a href="https://soundcloud.com/cronkitenews/sets/cn2go" target="_blank">CN2Go audio briefing</a> is also on all major audio platforms:</p>
      </div>
      <div class="large-2 medium-2 small-12 cell text-center partner-logos">
        <a href="https://music.amazon.com/podcasts/86389b09-1c1f-4489-b3bb-42e6ed355091/Cronkite-News-CN2Go" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/11/Amazon-Music-logo-205x40-1.png" alt="Amazon Music" title="Amazon Music" /></a>
      </div>
      <div class="large-2 medium-2 small-12 cell text-center partner-logos">
        <a href="https://podcasts.apple.com/us/podcast/cronkite-news-cn2go/id1536828047" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/11/US_UK_Apple_Podcasts_Listen_Badge_RGB.png" alt="Apple Podcast" title="Apple Podcast" /></a>
      </div>
      <div class="large-2 medium-2 small-12 cell text-center partner-logos">
        <a href="https://podcasts.google.com/feed/aHR0cDovL2Nyb25raXRlbmV3cy5henBicy5vcmcvcG9kY2FzdHMtcnNzL2NuMmdvLXJzcy54bWw?sa=X&ved=2ahUKEwiIuZb79tLsAhWYhZ4KHVI6ClYQ9sEGegQIARAD" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/11/EN_Google_Podcasts_Badge_8x.png" alt="Google Podcast" title="Google Podcast" /></a>
      </div>
      <div class="large-2 medium-2 small-12 cell text-center partner-logos">
        <a href="https://open.spotify.com/show/0ucDcjZmN2R8ajtj0tSVmO?si=w2yqxVyUSr21JDSCHlw2RA" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/11/spotify-podcast-badge-blk-grn-165x40-1.png" alt="Spotify" title="Spotify" /></a>
      </div>
      <div class="large-2 medium-2 small-12 cell text-center partner-logos">
        <a href="https://www.stitcher.com/podcast/cronkite-news-cn2go?refid=stpr" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/11/stitcher-logo-133x40-1.png" alt="Stitcher" title="Stitcher" /></a>
      </div>
      <div class="large-2 medium-2 small-12 cell text-center partner-logos">
        <a href="https://tunein.com/podcasts/News--Politics-Podcasts/Cronkite-News-CN2Go-p1376992/" target="_blank"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2021/11/tunein-logo-91x40-1.png" alt="TuneIn" title="TuneIn" /></a>
      </div>
    </div>

    <div class="grid-x grid-padding-x single-story-block section-text">
      <div style="margin-top:25px;margin-bottom:25px;" class="large-12 medium-12 small-12 cell story-content">
        <hr />
      </div>

      <div class="large-12 medium-12 small-12 cell story-content-text">
        <h2>Contact Us</h2>
        <p>What do you think of our audio content? We'd love to hear your questions and feedback at <a href="mailto:sbabits@asu.edu" target="_blank">sbabits@asu.edu</a>.</p>
      </div>
    </div>
    <br />
    <br />
    <br />
  </div>


  <script>
    jQuery(document).ready(function($) {
      var player = document.querySelector('audio');
      var $play_button = $('.play');
      var $pause_button = $('.pause');
      var $bar = $('.bar');
      var update_time;

      function startNupdate() {
        document.querySelector('audio').pause();
        player.play();
        $play_button.hide();
        $pause_button.show();

        function pad(num, size) {
          var s = num + "";
          while (s.length < size) s = "0" + s;
          return s;
        }
        clearInterval(update_time);
        update_time = setInterval(function() {
          var gradients = '';
          for (var i = 0; i < player.buffered.length; i++) {
            var perc_start = ((player.buffered.start(i) / player.duration) * 100).toString();
            var perc_end = ((player.buffered.end(i) / player.duration) * 100).toString();

            if (i > 0) {
              gradients = gradients + ',rgba(240,240,240) ' + perc_start + '%,#9D9D9D ' + perc_start + '%' +
                ', #9D9D9D ' + perc_end + '%, rgba(240,240,240) ' + perc_end + '%'
            } else {
              gradients = gradients + '#9D9D9D ' + perc_start + '%' + ', #9D9D9D ' + perc_end +
                '%, rgba(240,240,240) ' + perc_end + '%'
            }
          }
          gradients = gradients + ',rgba(240,240,240) ' + ((player.buffered.end(player.buffered.length - 1) / player
            .duration) * 100) + '%, rgba(240,240,240)'
          $bar.css({
            "background": "linear-gradient(to right, #F0F0F0, " + gradients + ")"
          })
          var minutes = pad(Math.floor(player.currentTime / 60), 2);
          var seconds = pad(Math.floor(player.currentTime - minutes * 60), 2);
          $('.elapsed span').html(minutes + ':' + seconds);
          $('.position-marker').css({
            "left": ((player.currentTime / player.duration) * 100) + '%'
          })
        }, 1000)
      }

      $bar.on('click', function(event) {
        var pos_perc = event.offsetX / event.target.offsetWidth;
        player.currentTime = (player.duration * pos_perc);
        startNupdate();
      })

      $play_button.on('click', function() {
        startNupdate();
      });
      $pause_button.on('click', function() {
        player.pause();
        $pause_button.hide();
        $play_button.show();
        clearInterval(update_time);
      });
    })
  </script>
