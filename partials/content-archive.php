

    <!-- main body container -->
    <div id="main_container" class="grid-container single-story-post article-listing category">

      <!-- story content -->
      <div class="grid-x grid-padding-x single-story-block">

        <div class="large-12 medium-12 small-12 cell story-content">
          <h1 class="main-title-hdr"><?php single_cat_title('', true);  ?></h1>
        </div>

        <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
          <?php $month = (isset($_GET['monthOption']) && !empty($_GET['monthOption'])) ? $_GET['monthOption'] : ""; ?>
          <?php $years = (isset($_GET['yearOption']) && !empty($_GET['yearOption'])) ? $_GET['yearOption'] : ""; ?>


          <?php  $startYear = 2014;
          $curYear = date('Y'); ?>

          <form id="form-filter" method="get">
              <select name="monthOption">
                  <option value="filter by Month">Filter by Month</option>
                  <option <?php selected($month, "1"); ?> value="1">1</option>
                  <option <?php selected($month, "2"); ?> value="2">2</option>
                  <option <?php selected($month, "3"); ?> value="3">3</option>
                  <option <?php selected($month, "4"); ?> value="4">4</option>
                  <option <?php selected($month, "5"); ?> value="5">5</option>
                  <option <?php selected($month, "6"); ?> value="6">6</option>
                  <option <?php selected($month, "7"); ?> value="7">7</option>
                  <option <?php selected($month, "8"); ?> value="8">8</option>
                  <option <?php selected($month, "9"); ?> value="9">9</option>
                  <option <?php selected($month, "10"); ?> value="10">10</option>
                  <option <?php selected($month, "11"); ?> value="11">11</option>
                  <option <?php selected($month, "12"); ?> value="12">12</option>
              </select>

              <select name="yearOption">
                  <option value="filter by Year">Filter by Year</option>
                  <?php for ($i = $startYear; $i <= $curYear; $i++) : ?>
                      <option <?php selected($years, $i); ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                  <?php endfor; ?>
              </select>
          </form>
          <?php
          $args = [
            'post_type'        => 'post',
            'order'            => 'ASC',
            'orderby'        => 'date',
            'posts_per_page'    => -1,
            'monthnum' => $month,
            'year' => $years,

          ];
          $the_query = new WP_Query($args);
          if ($the_query->have_posts()) {
              while ($the_query->have_posts()) {
                  $the_query->the_post();
                  ?>
                <div class="grid-x grid-margin-x story-results-stack">
                  <div class="large-8 medium-8 small-8 cell">
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
              ?>

                <?php
          }
          ?>
            <div class="grid-x grid-margin-x story-results-stack">
              <div class="large-12 medium-12 small-12 cell">
                <?php bootstrap_pagination(); ?>
              </div>
            </div>
          <?php
          wp_reset_query();
          ?>

        </div>

        <div class="large-4 medium-12 small-12 cell sidebar">
            <?php dynamic_sidebar('Sidebar Author - 2020'); ?>
        </div>

        <?php echo $category_id; ?>
        <?php if ($category_id == 5978) { ?>
        <div class="large-4 medium-12 small-12 cell sidebar">
            <?php dynamic_sidebar('Health Insider'); ?>
        </div>
        <?php } ?>
      </div>
    </div>
