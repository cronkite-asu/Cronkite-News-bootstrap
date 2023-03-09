  <!-- header -->
  <div class="special-header">
    <div class="grid-container main-stories">
      <div class="grid-x grid-padding-x single-story-block align-middle">

        <?php
        if (have_rows('layout') ) {
            while ( have_rows('layout') ) { the_row();
                if (get_row_layout() == 'intro-half' ) {
                    ?>
                <div class="large-7 medium-7 small-12 cell">
                    <?php if (get_sub_field('photo') != '') { ?>
                    <img src="<?php echo get_sub_field('photo'); ?>" />
                    <?php } ?>
                </div>
                <div class="large-5 medium-5 small-12 cell">
                  <h1><?php echo get_sub_field('headline'); ?></h1>
                    <?php echo get_sub_field('intro_summary'); ?>
                </div>
                    <?php
                }
            }
        }
        ?>

      </div>
    </div>
  </div>

  <!-- main body container -->
  <div id="special-container" class="grid-container main-stories" style="margin-bottom:100px;">

    <div class="grid-x grid-padding-x single-story-block">
      <?php
        if (have_rows('layout') ) {
            while ( have_rows('layout') ) { the_row();
                if (get_row_layout() == 'stories-list' ) {
                    $featured_posts = get_sub_field('stories');
                    if ($featured_posts ) {

                        foreach ( $featured_posts as $featured_post ) {
                            $permalink = get_permalink($featured_post->ID);
                            $title = get_the_title($featured_post->ID);
                            $story_tease = get_field('story_tease', $featured_post->ID);
                            $photo = get_the_post_thumbnail($featured_post->ID);

                            ?>
                    <div class="large-3 medium-4 small-12 cell story-list">
                      <a href="<?php echo esc_url($permalink); ?>"><?php echo $photo; ?></a>
                            <?php
                            if (get_field('use_short_headline', $featured_post) == 'yes' && get_field('homepage_headline', $featured_post) != '') {
                                $title = get_field('homepage_headline', $featured_post);
                            } else {
                                $title = get_the_title($featured_post);
                            }
                            ?>
                      <h3 class="show-for-medium"><a href="<?php echo $permalink; ?>"><?php echo $title; ?></a></h3>
                    </div>
                    <div class="large-3 medium-6 small-12 cell align-self-middle show-for-small-only">
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
    <br />
    <br />
  </div>
