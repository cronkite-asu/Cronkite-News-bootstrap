<!-- content -->
<div class="grid-container full bg-holder">
  <div class="grid-x grid-padding-x">
    <div class="large-12 cell text-center">
      <h1 style="line-height:5rem;margin-bottom: 0px;padding-bottom: 40px;">Need a project headline</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vel ultrices quam. Ut vitae porta nunc, et posuere est. Praesent in orci mattis, aliquet lectus vel, auctor tellus. Duis tincidunt mattis mi, eget pharetra nulla hendrerit id. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed tincidunt feugiat urna ac lobortis. Aenean volutpat nisi eget purus dapibus malesuada. Proin vulputate vitae nulla sed tempus. Nullam est nisl, commodo tristique nulla sed, vulputate sodales nunc.</p>            
    </div>
  </div>
</div>

<?php
if (have_rows('layout')) {
    while (have_rows('layout')) {
        the_row();
        if (get_row_layout() == 'intro-split') {
            $intro = get_sub_field('intro_summary');
            ?>
  <div id="intro" class="grid-container full">
    <div class="grid-x grid-padding-x">
      <div class="large-6 medium-12 small-12 cell intro-text">
            <?php if (get_sub_field('color') != '') { ?>
                <?php $color = "color:".get_sub_field('color').";" ?>
            <?php } else { ?>
                <?php $color = ''; ?>
            <?php } ?>

            <?php if (get_sub_field('capitalize') == 'yes') { ?>
                <?php $capitalize = "text-transform:uppercase;" ?>
            <?php } else { ?>
                <?php $capitalize = ''; ?>
            <?php } ?>

            <?php if (get_sub_field('font-family') == 'merriweather') { ?>
                <?php $font = "font-family:".get_sub_field('font-family').";" ?>
            <?php } elseif (get_sub_field('font-family') == 'montserrat') { ?>
                <?php $font = "font-family:".get_sub_field('font-family').";" ?>
            <?php } elseif (get_sub_field('font-family') == 'roboto') { ?>
                <?php $font = "font-family:".get_sub_field('font-family').";" ?>
            <?php } else { ?>
                <?php $font = "font-family:".get_sub_field('font-family').";" ?>
            <?php } ?>

            <?php if (get_sub_field('photo_position_leftright') != '') { ?>
                <?php $position = "background-position:".get_sub_field('photo_position_leftright')." center !important"; ?>
            <?php } else { ?>
                <?php $position = ""; ?>
            <?php } ?>


        <h1 style="<?php echo $color;
            echo $capitalize;
            echo $font; ?>"><?php echo get_sub_field('headline'); ?></h1>
            <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <div class="large-6 medium-12 small-12 cell background-img" <?php echo 'style="background:url('.get_sub_field('photo').')"'; ?>>
        <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
      </div>
    </div>
  </div>


            <?php
        } elseif (get_row_layout() == 'intro-head-photo') {
            $intro = get_sub_field('intro_summary');
            ?>
  <div id="intro-head-photo" class="grid-container full">
    <div class="grid-x grid-padding-x">
      <div class="large-12 medium-12 small-12 cell intro-text text-center">
            <?php if (get_sub_field('headline') == '') { ?>
          <h1><?php echo get_the_title(); ?></h1>
            <?php } else { ?>
          <h1><?php echo get_sub_field('headline'); ?></h1>
            <?php } ?>
            <?php echo get_sub_field('intro_summary'); ?>
      </div>
            <?php
              // check photo and select credit width
              [$width, $height, $type, $attr] = getimagesize(get_sub_field('photo'));
            if ($width == 1200) {
                $introPhotoWidth = 'photo-credit-width-1200';
            } else {
                $introPhotoWidth = 'photo-credit-width-1800';
            }

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            }
            ?>

      <div class="large-12 medium-12 small-12 cell text-center <?php echo $photoStyle; ?>">
        <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
      </div>
      <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
        <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
      </div>
    </div>
  </div>


            <?php
        } elseif (get_row_layout() == 'intro-gradient-photo') {
            $intro = get_sub_field('intro_summary');
            ?>
  <div id="intro-head-photo" class="grid-container full">
    <div class="grid-x grid-padding-x">
      <div class="large-12 medium-12 small-12 cell intro-text text-center">
            <?php if (get_sub_field('headline') == '') { ?>
          <h1><?php echo get_the_title(); ?></h1>
            <?php } else { ?>
          <h1><?php echo get_sub_field('headline'); ?></h1>
            <?php } ?>
            <?php echo get_sub_field('intro_summary'); ?>
      </div>
            <?php
              // check photo and select credit width
              [$width, $height, $type, $attr] = getimagesize(get_sub_field('photo'));
            if ($width == 1200) {
                $introPhotoWidth = 'photo-credit-width-1200';
            } else {
                $introPhotoWidth = 'photo-credit-width-1800';
            }

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            }
            ?>

      <div class="large-12 medium-12 small-12 cell text-center <?php echo $photoStyle; ?>">
        <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
      </div>
      <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
        <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
      </div>
    </div>
  </div>

            <?php
        } elseif (get_row_layout() == 'plain-code-block') {
            ?>

    <div class="grid-container text-content">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <?php echo get_sub_field('content');    ?>
        </div>
      </div>
    </div>


            <?php
        } elseif (get_row_layout() == 'text-block') {
            ?>

  <div class="grid-container text-content">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
            <?php echo get_sub_field('content');    ?>
      </div>
    </div>
  </div>

            <?php
        } elseif (get_row_layout() == 'stories-list') {
            ?>
            <?php $featured_posts = get_sub_field('stories'); ?>
    <div class="grid-container stories-list">
      <div class="grid-x grid-padding-x">
            <?php if ($featured_posts) { ?>
                <?php $counter = 0; ?>

                <?php
                $featured_posts = get_sub_field('stories');
                if ($featured_posts) {
                    ?>
                    <?php foreach ($featured_posts as $featured_post) {
                        $permalink = get_permalink($featured_post->ID);
                        $title = get_the_title($featured_post->ID);
                        $story_tease = get_field('story_tease', $featured_post->ID);
                        $photo = get_the_post_thumbnail($featured_post->ID);
                        ?>
              <div class="large-4 medium-4 small-12 cell show-for-small-only">
                <a href="<?php echo esc_url($permalink); ?>"><?php echo $photo; ?></a>
              </div>
              <div class="large-8 medium-8 small-12 cell">
                <a href="<?php echo esc_url($permalink); ?>"><h3><?php echo esc_html($title); ?></h3></a>
                <p><?php echo $story_tease; ?></p>
                <a href="<?php echo esc_url($permalink); ?>"><button class="read-more">Read story <i class="fas fa-chevron-circle-right"></i></button></a>
              </div>
              <div class="large-4 medium-4 small-12 cell hide-for-small-only">
                <a href="<?php echo esc_url($permalink); ?>"><?php echo $photo; ?></a>
              </div>
              <div class="large-12 cell">
                <hr style="width:100%" />
              </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

      </div>
    </div>

            <?php
        }
    }
}
?>
