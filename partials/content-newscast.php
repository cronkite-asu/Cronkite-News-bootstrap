<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1>Newscast</h1>
      </div>
    </div>
  </div>
</div>

    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post article-listing category">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">
        <?php
          $category_id = get_queried_object_id();
        ?>
        <div id="latest-stories" class="large-12 medium-12 small-12 cell story-content">

          <iframe width="100%" height="600" src="https://www.youtube.com/embed/videoseries?si=cwpUkoFJB01a3Bys&amp;list=PLQ10JyjBe_u5ltL9YqidL1JttoQrbORBg&autoplay=1&start=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          <?php wp_reset_query(); ?>

        </div>
      </div>
    </div>
