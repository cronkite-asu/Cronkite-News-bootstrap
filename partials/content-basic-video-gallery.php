  <!-- header -->
  <div class="page-header">
    <div class="grid-container main-stories">
      <div class="grid-x grid-padding-x single-story-block">
        <div class="large-12 medium-12 small-12 cell">
          <h1><?php echo get_the_title(); ?> <i class="fas fa-video"></i></h1>
        </div>
      </div>
    </div>
  </div>

  <!-- main body container -->
  <div id="audio-container" class="grid-container main-stories" style="margin-bottom:100px;">

    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <p><?php echo get_the_content(); ?></p>        
      </div>
    </div>

    <div class="grid-x grid-padding-x single-story-block">
      <?php
        $videosList = get_field('videos', get_the_ID());
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
                <iframe width="100%" height="220" src="https://www.youtube.com/embed/<?php echo $videoID[1]; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              <?php } ?>
              <?php
                if (get_field('use_short_headline', $videoNews) == 'yes' && get_field('homepage_headline', $videoNews) != '') {
                  $title = get_field('homepage_headline', $videoNews);
                } else {
                  $title = get_the_title($videoNews);
                }
              ?>
              <h3 class="show-for-medium"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
              <?php if (get_field('story_tease', $videoNews) != '') { ?>
              <?php echo get_field('story_tease', $videoNews); ?>
              <?php } ?>
            </div>
            <div class="large-3 medium-6 small-7 cell align-self-middle show-for-small-only">
              <h3><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
            </div>
      <?php
            }
            $videosCounter++;
          }
        }
      ?>
    </div>
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
