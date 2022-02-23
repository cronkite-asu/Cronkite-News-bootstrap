<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <?php if (get_the_title() == 'Newsletter Sign Up') { ?>
          <h1><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1><?php echo get_the_title(); ?> <i class="fas fa-video"></i></h1>
        <?php }?>
      </div>
    </div>
  </div>
</div>

<!-- main body container -->
<div id="audio-container" class="grid-container main-stories" style="margin-bottom:100px;">

  <div class="grid-x grid-padding-x single-story-block">
    <div class="large-12 medium-12 small-12 cell">
      <?php echo the_content(); ?>
      <p>&nbsp;</p>
    </div>
  </div>

</div>
