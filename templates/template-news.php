<?php
/*
 * Template Name: News Page
 * Newscast archive
 */
get_header('new2019'); ?>

  <!-- main body container -->
  <div id="main_container" class="grid-container single-story-post article-listing category">

    <!-- story content -->
    <div class="grid-x grid-padding-x single-story-block">

      <div class="large-12 medium-12 small-12 cell story-content">
        <h1 class="main-title-hdr"><?php the_title(); ?></h1>
      </div>

      <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
        <?php
          //$paged = get_query_var('paged');
          global $post;
          $arg = array(
              'post_type'        => 'post',
              'order'            => 'DESC',
              'orderby'        => 'date',
              'posts_per_page'    => 1,
              'category_name' =>  'newscast'
          );
          $newscast = new WP_Query($arg);
          if ($newscast->have_posts() ) {
              while ( $newscast->have_posts() ) {
                  $newscast->the_post();

                  $vid = get_field('video_file', false, false);
                    ?>
              <div class="grid-x grid-margin-x story-results-stack">
                <div class="large-8 medium-12 small-12 cell">
                  <?php
                    echo '<div id="video-holder">';
                    echo '<div class="video-wrap">';
                    echo '<div class="video">';
                    echo '<div class="close-video"><i class="fas fa-times"></i></div>';
                    echo '<div class="plyr__video-embed responsive-embed widescreen" id="player">';
                    //echo '<iframe width="800" height="500" src="'.$vidlink.'?rel=0" frameborder="0" gesture="media" allowfullscreen></iframe>';
                    echo '<iframe
                      src="'.$vid.'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                      allowfullscreen
                      allowtransparency
                      allow="autoplay"
                  ></iframe>';
                    echo '</div>';
                    echo '<div class="asset-caption">'.get_field('video_caption').'</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    ?>
                  <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                  <p><?php echo get_field('story_tease'); ?></p>
                  <div class="pub_date">
                    <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                  </div>
                </div>
                <div class="large-4 medium-4 small-4 cell">
                  <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID()); ?></a>
                </div>
                <div class="large-12 medium-12 small-12 cell">
                  <hr />
                </div>
              </div>

                  <?php
              }
          } else {

          }
          wp_reset_query();
            ?>

        <?php
          query_posts('post_type=post&category_name=newscast&post_status=publish&posts_per_page=8&paged='. get_query_var('paged'));
        if (have_posts() ) {
            while ( have_posts() ) { the_post();
                ?>
            <div class="grid-x grid-margin-x story-results-stack">
              <div class="large-8 medium-12 small-12 cell">
                <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                <p><?php echo get_field('story_tease'); ?></p>
                <div class="pub_date">
                  <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                </div>
              </div>
              <div class="large-4 medium-4 small-4 cell">
                <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID()); ?></a>
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
          <?php dynamic_sidebar('Sidebar Author - 2020'); ?>
      </div>
    </div>
  </div>

<?php get_footer('new2020'); ?>
