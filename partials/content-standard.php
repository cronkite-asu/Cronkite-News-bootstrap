    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post article-listing category">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">

        <div class="large-12 medium-12 small-12 cell story-content">
          <h1 class="main-title-hdr"><?php the_title(); ?></h1>
        </div>

        <div id="latest-stories" class="large-12 medium-12 small-12 cell story-content">
          <?php
            if ( have_posts() ) {
              while ( have_posts() ) { the_post();
                the_content();
              }
            }
          ?>
        </div>
      </div>
    </div>
