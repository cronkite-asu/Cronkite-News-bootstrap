<!-- header -->
<div class="page-header">
  <div class="grid-container main-stories">
    <div class="grid-x grid-padding-x single-story-block">
      <div class="large-12 medium-12 small-12 cell">
        <h1><?php single_cat_title( '', true );  ?></h1>
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
        <div id="latest-stories" class="large-8 medium-12 small-12 cell story-content">
          <?php
            $paged = get_query_var('paged');

            if ( have_posts() ) {
              while ( have_posts() ) {
                the_post();

                $externalAuthorCount = 1;
                $internalAuthorCount = 0;
                $commaSeparator = ',';
                $andSeparator = ' and ';
                $cnStaffCount = 0;
                $newCheck = 0;
                $finalAuthor = '';

                // bypass group not showing repeater field issue
                $groupFields = get_field('byline_info', get_the_ID());
                $externalAuthorRepeater = $groupFields['external_authors_repeater'];

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

               if (have_rows('byline_info', get_the_ID())) {
                  $sepCounter = 0;

                  while (have_rows('byline_info', get_the_ID())) {
                    the_row();
                    $staffID = get_sub_field('cn_staff');
                    $cnStaffCount = count($staffID);

                    foreach ($staffID as $key => $val) {
                      $args = array(
                                    'post_type'   => 'students',
                                    'post_status' => 'publish',
                                    'p' => $val
                                  );

                      $staffDetails = new WP_Query( $args );
                      if ($staffDetails->have_posts()) {
                        while ($staffDetails->have_posts()) {
                          $staffDetails->the_post();
                          $sepCounter++;

                          $staffNameURLSafe = str_replace("’", "", str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val))))));
                          $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                          $finalAuthor .= '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a>';
                          if ($sepCounter != $cnStaffCount) {
                            if ($sepCounter == ($cnStaffCount - 1)) {
                              $finalAuthor .=  $andSeparator.' ';
                            } else {
                              $finalAuthor .=  $commaSeparator.' ';
                            }
                          }
                        }
                      }
                      $newCheck++;
                    }
                  }

                  if (count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
                    $extStaffCount = count($externalAuthorRepeater);
                    if ($groupFields['cn_staff'] != '') {
                      $finalAuthor .=  ' and ';
                    }
                    $sepCounter = 0;
                    foreach ($externalAuthorRepeater as $key => $val ) {
                      $sepCounter++;
                      $finalAuthor .=  $val['external_authors'];
                      if ($val['author_title_site'] != '' || $val['author_title_site'] != 'other') {

                      }
                      if ($sepCounter != $extStaffCount) {
                        if ($sepCounter == ($extStaffCount - 1)) {
                          $finalAuthor .=  $andSeparator.' ';
                        } else {
                          $finalAuthor .=  $commaSeparator.' ';
                        }
                      }
                    }
                    $newCheck++;
                  }
                }

                if ($newCheck == 0 && get_field('post_author') != '') {
                  if ($postAuthor = get_field('post_author')) {
                    $finalAuthor .= $postAuthor;
                  }
                }
                wp_reset_query();
          ?>
                <div class="grid-x grid-margin-x story-results-stack">
                  <div class="large-8 medium-8 small-8 cell">
                    <h4><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h4>
                    <p><?php echo get_field('story_tease'); ?></p>
                    <div class="pub_date">
                      <?php if ($finalAuthor != '') { echo '<span class="byline">By '.$finalAuthor.'</span> | '; } ?><time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                    </div>
                  </div>
                  <div class="large-4 medium-4 small-4 cell">
                    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_post_thumbnail( get_the_ID()); ?></a>
                  </div>
                  <div class="large-12 medium-12 small-12 cell">
                    <hr />
                  </div>
                </div>

          <?
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

            <?php if ($category_id == 7022) { ?>
            <div class="large-4 medium-12 small-12 cell sidebar">
                <?php dynamic_sidebar('Health Insider'); ?>
            </div>
            <?php } ?>
        </div>
      </div>
    </div>
