<!-- Post page for Noticias -->
 <?php
  get_header('noticias');

  $audio_title_url = get_query_var('title');
  $clean_title = ucwords(str_replace('-', ' ', $audio_title_url));

 if (get_the_ID() == '138082') {
     wp_redirect('https://cronkitenews.azpbs.org/story-removed/');
 } else if (get_the_ID() == '140913') {
     wp_redirect('https://cronkitenews.azpbs.org/homeland-secrets/');
 }
    ?>


     <!-- main body container -->
     <div id="main_container" class="grid-container single-story-post">

       <!-- story content -->
       <div class="grid-x grid-padding-x single-story-block">
         <div class="large-12 medium-12 small-12 cell">
           <!-- breadcrumbs -->
           <?php
             $categories = get_the_category();
            if (! empty($categories) ) {
                ?>
             <nav aria-label="Cronkite Noticias: Breadcrumbs" role="navigation">
               <ul class="breadcrumbs">
                 <li>
                  <?php
                    $catCount = count($categories);
                    foreach ($categories as $key => $val) {
                        if ($categories[$key]->name != 'New 2020') {
                            echo '<a href="' . esc_url(get_category_link($categories[$key]->term_id)) . '">' . esc_html($categories[$key]->name) . '</a>';
                            if ($catCount > 1) {
                                echo '  ';
                            }
                        }
                    }
                    ?>
                 </li>
               </ul>
             </nav>
                <?php
            }
            ?>

           <h1 class="single-story-hdr"><?php the_title(); ?></h1>
           <!-- byline and date -->
           <div class="byline">
             <?php
                if (get_the_ID() == 165700) {
                    $externalSites = array('arizona-pbs' => "https://www.azpbs.org",
                                        'arizona-public-media' => "https://www.azpm.org/",
                                        'boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                        'colorado-public-radio' => "https://www.cpr.org/",
                                        'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                        'elemental-reports' => "https://www.elementalreports.com/",
                                        'globalsport-matters' => "https://www.globalsportmatters.com/",
                                        'gaylord-news' => "https://gaylordnews.net/",
                                        'inside-climate-news' => "https://insideclimatenews.org/",
                                        'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                        'KSJD' => "https://www.ksjd.org/",
                                        'KJZZ' => "https://kjzz.org/content/1689925/boots-ground-how-phoenix-plans-help-small-businesses",
                                        'KPCC' => "https://www.scpr.org/",
                                        'KUNC' => "https://www.kunc.org/",
                                        'KUER' => "https://www.kuer.org/",
                                        'LAIST' => "https://laist.com/",
                                        'PBS-SoCal' => "https://www.pbssocal.org/",
                                        'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                        'special-to-cronkite-news' => ""
                                       );
                } else if (get_the_ID() == 167042) {
                    $externalSites = array('arizona-pbs' => "https://www.azpbs.org",
                                        'arizona-public-media' => "https://www.azpm.org/",
                                        'boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                        'colorado-public-radio' => "https://www.cpr.org/",
                                        'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                        'elemental-reports' => "https://www.elementalreports.com/",
                                        'globalsport-matters' => "https://www.globalsportmatters.com/",
                                        'gaylord-news' => "https://gaylordnews.net/",
                                        'inside-climate-news' => "https://insideclimatenews.org/",
                                        'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                        'KSJD' => "https://www.ksjd.org/",
                                        'KJZZ' => "https://kjzz.org/content/1689925/boots-ground-how-phoenix-plans-help-small-businesses",
                                        'KPCC' => "https://www.scpr.org/",
                                        'KUNC' => "https://www.kunc.org/",
                                        'KUER' => "https://www.kuer.org/",
                                        'LAIST' => "https://laist.com/",
                                        'PBS-SoCal' => "https://www.pbssocal.org/",
                                        'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                        'special-to-cronkite-news' => "",
                                        'fronteras' => "https://fronterasdesk.org/content/1696137/hermosillo-pedestrians-face-many-dangers-work-address-them-underway"
                                       );
                } else if (get_the_ID() == 168187) {
                    $externalSites = array('arizona-pbs' => "https://www.azpbs.org",
                                        'arizona-public-media' => "https://www.azpm.org/",
                                        'boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                        'colorado-public-radio' => "https://www.cpr.org/",
                                        'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                        'elemental-reports' => "https://www.elementalreports.com/",
                                        'globalsport-matters' => "https://www.globalsportmatters.com/",
                                        'gaylord-news' => "https://gaylordnews.net/",
                                        'inside-climate-news' => "https://insideclimatenews.org/",
                                        'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                        'KSJD' => "https://www.ksjd.org/",
                                        'KJZZ' => "https://kjzz.org/content/1689925/boots-ground-how-phoenix-plans-help-small-businesses",
                                        'KPCC' => "https://www.scpr.org/",
                                        'KUNC' => "https://www.kunc.org/",
                                        'KUER' => "https://www.kuer.org/",
                                        'LAIST' => "https://laist.com/",
                                        'PBS-SoCal' => "https://www.pbssocal.org/",
                                        'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                        'special-to-cronkite-news' => "",
                                        'fronteras' => "https://fronterasdesk.org/content/1703038/women-and-conservation-sonoran-scientists-start-group-latin-american-women"
                                       );
                } else {
                    $externalSites = array('arizona-pbs' => "https://www.azpbs.org",
                                        'arizona-public-media' => "https://www.azpm.org/",
                                        'boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                        'colorado-public-radio' => "https://www.cpr.org/",
                                        'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                        'elemental-reports' => "https://www.elementalreports.com/",
                                        'globalsport-matters' => "https://www.globalsportmatters.com/",
                                        'gaylord-news' => "https://gaylordnews.net/",
                                        'inside-climate-news' => "https://insideclimatenews.org/",
                                        'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                        'KSJD' => "https://www.ksjd.org/",
                                        'KJZZ' => "https://www.kjzz.org",
                                        'KPCC' => "https://www.scpr.org/",
                                        'KUNC' => "https://www.kunc.org/",
                                        'KUER' => "https://www.kuer.org/",
                                        'LAIST' => "https://laist.com/",
                                        'PBS-SoCal' => "https://www.pbssocal.org/",
                                        'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                        'special-to-cronkite-news' => ""
                                       );
                }
                $externalAuthorCount = 1;
                $internalAuthorCount = 0;
                $commaSeparator = ',';
                $andSeparator = ' and ';
                $cnStaffCount = 0;
                $newCheck = 0;

                // bypass group not showing repeater field issue
                $groupFields = get_field('byline_info');
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

                if (have_rows('byline_info')) {
                    $sepCounter = 0;

                    echo '<span class="author_name">';
                    while (have_rows('byline_info')) {
                        the_row();
                        $staffID = get_sub_field('cn_staff');
                        $cnStaffCount = count($staffID);

                        foreach ($staffID as $key => $val) {
                            $args = array(
                                   'post_type'   => 'students',
                                   'post_status' => 'publish',
                                   'p' => $val
                                 );

                            $staffDetails = new WP_Query($args);
                            if ($staffDetails->have_posts()) {
                                while ($staffDetails->have_posts()) {
                                    $staffDetails->the_post();
                                    $sepCounter++;

                                    $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                                    $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                                    if (get_field('student_photo') != '') {
                                          echo '<div class="author_photo post">';
                                        if ($staffNameURLSafe == 'staff') {
                                            echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular-sm staff" alt="'.get_the_title($staffID).'" />';
                                        } else {
                                            echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular-sm" alt="'.get_the_title($staffID).'" /></a>';
                                        }
                                        echo '</div>';
                                    }

                                    echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a>';
                                    if ($sepCounter != $cnStaffCount) {
                                        if ($sepCounter == ($cnStaffCount - 1)) {
                                            echo $andSeparator.' ';
                                        } else {
                                            echo $commaSeparator.' ';
                                        }
                                    }
                                }
                            }
                            $newCheck++;
                        }
                        if ($cnStaffCount > 0 && $staffID != '') {
                            if (get_sub_field('cn_project') != '') {
                                echo '/'.str_replace('Pbs', 'PBS', str_replace(' For ', ' for ', ucwords(str_replace('-', ' ', get_sub_field('cn_project')))));
                            } else {
                                echo '/Cronkite Noticias</span>';
                            }
                        }
                    }
                    //wp_reset_query();

                    if (is_countable($externalAuthorRepeater) && count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
                        $extStaffCount = count($externalAuthorRepeater);
                        if ($groupFields['cn_staff'] != '') {
                            echo ' and ';
                        }
                        $sepCounter = 0;
                        foreach ($externalAuthorRepeater as $key => $val ) {
                            $sepCounter++;
                            echo $val['external_authors'];
                            if ($val['author_title_site'] != '' || $val['author_title_site'] != 'other') {
                                if (array_key_exists($val['author_title_site'], $externalSites) == true) {
                                     echo '/<a href="'.$externalSites[$val['author_title_site']].'" target="_blank">'.ucwords(str_replace('-', ' ', $val['author_title_site'])).'</a>';
                                } else {
                                    echo '/'.str_replace('Pbs', 'PBS', str_replace('For', 'for', ucwords(str_replace('-', ' ', $val['author_title_site']))));
                                }
                            }
                            if ($sepCounter != $extStaffCount) {
                                if ($sepCounter == ($extStaffCount - 1)) {
                                    echo $andSeparator.' ';
                                } else {
                                    echo $commaSeparator.' ';
                                }
                            }
                        }
                        echo '</span>';
                        $newCheck++;
                    }

                }

                if ($newCheck == 0 && get_field('post_author') != '') {
                    if ($postAuthor = get_field('post_author')) {
                        ?>
                 <a href="<?php echo site_url(); ?>?s=<?php echo $postAuthor; ?>">
                        <?php echo $postAuthor; ?></a>/
                    <?php } ?>
                    <?php
                    if ($siteTitle = get_field('site_title')) {
                        $url = get_field('site_url');
                        $url = esc_url($url);
                        ?><a href="<?php echo $url; ?>"><?php echo $siteTitle; ?></a>
                        <?php
                    }
                    echo '</span>';
                }
                wp_reset_query();
                ?>
           </div>

           <div class="date-social">
             <div class="pub_date">
               <time datetime="<?php echo ap_noticias_date(); ?>"><?php echo ap_noticias_date(); ?></time>
               <?php if (get_field('updated_date_and_time') != '') { ?>
                  | <span class="article_updated">Updated:</span> <time datetime="<?php echo get_field('updated_date_and_time'); ?>"><?php echo get_field('updated_date_and_time'); ?></time>
               <?php } ?>
             </div>

             <div class="social_share">
                <div class="addthis_inline_share_toolbox"></div>
             </div>
           </div>
         </div>
         <?php if (get_field('hide_right_sidebar') == 'yes') { ?>
         <div class="large-12 medium-12 small-12 cell story-content">
         <?php } else { ?>
         <div class="large-8 medium-12 small-12 cell story-content">
         <?php } ?>

           <article id="story-post">
             <!-- story photo/video/slideshow -->
             <?php
                $isvid = get_field('video_file', false, false);
                if ($isvid ) { // if we have a video load the video instead of the carousel

                    function linkifyYouTubeURLs($text)
                    {
                        $text = preg_replace(
                            '~(?#!js YouTubeId Rev:20160125_1800)
                         # Match non-linked youtube URL in the wild. (Rev:20130823)
                         https?://          # Required scheme. Either http or https.
                         (?:[0-9A-Z-]+\.)?  # Optional subdomain.
                         (?:                # Group host alternatives.
                           youtu\.be/       # Either youtu.be,
                         | youtube          # or youtube.com or
                           (?:-nocookie)?   # youtube-nocookie.com
                           \.com            # followed by
                           \S*?             # Allow anything up to VIDEO_ID,
                           [^\w\s-]         # but char before ID is non-ID char.
                         )                  # End host alternatives.
                         ([\w-]{11})        # $1: VIDEO_ID is exactly 11 chars.
                         (?=[^\w-]|$)       # Assert next char is non-ID or EOS.
                         (?!                # Assert URL is not pre-linked.
                           [?=&+%\w.-]*     # Allow URL (query) remainder.
                           (?:              # Group pre-linked alternatives.
                             [\'"][^<>]*>   # Either inside a start tag,
                           | </a>           # or inside <a> element text contents.
                           )                # End recognized pre-linked alts.
                         )                  # End negative lookahead assertion.
                         [?=&+%\w.-]*       # Consume any URL (query) remainder.
                         ~ix', '$1',
                            $text
                        );
                         return $text;
                    }

                    $host = parse_url($isvid);
                    $isjpg = false;

                    if ($host['host'] == 'www.youtube.com') {
                        $id = linkifyYouTubeURLs($isvid);
                        $vidlink = $isvid;
                        echo '<div id="video-holder">';

                        echo '<div class="video-wrap">';
                        echo '<div class="video">';
                        echo '<div class="close-video"><i class="fas fa-times"></i></div>';
                        echo '<div class="plyr__video-embed responsive-embed widescreen" id="player">';
                        //echo '<iframe width="800" height="500" src="'.$vidlink.'?rel=0" frameborder="0" gesture="media" allowfullscreen></iframe>';
                        echo '<iframe
                       src="'.$vidlink.'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                       allowfullscreen
                       allowtransparency
                       allow="autoplay"
                   ></iframe>';
                        echo '</div>';
                        echo '<div class="asset-caption">'.strip_tags(get_field('video_caption'), '<a>').'</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else if (have_rows('slider_images') ) { ?>
                 <div id="story-photo" class="story-photos">
                    <?php
                    while ( have_rows('slider_images') ) {
                        the_row();
                        $imageCount = count(get_field('slider_images'));
                        $postImages = get_sub_field('images');
                        $photoCaption = get_sub_field('description');

                        if ($imageCount == 1) {
                            ?>
                     <div>
                       <img src="<?php echo $postImages; ?>" width="800" alt="" title="" />
                       <div class="asset-caption"><?php echo $photoCaption; ?></div>
                     </div>
                            <?php
                        } else {
                            ?>
                     <div>
                       <img src="<?php echo $postImages; ?>" width="100%" alt="" title="" />
                       <div class="asset-caption"><?php echo $photoCaption; ?></div>
                     </div>
                            <?php
                        }
                    }
                    ?>
                 </div>
                    <?php
                } else if (get_field('before_after_slider')) {
                    $beforeAfterAssets = get_field('before_after_slider');
                    ?>
                 <div class="before-after-photos" class="twentytwenty-container">
                   <div class="photos">
                     <img src="<?php echo $beforeAfterAssets['first_image']; ?>" />
                     <img src="<?php echo $beforeAfterAssets['second_image']; ?>" />
                   </div>
                   <div class="asset-caption"><?php echo $beforeAfterAssets['caption']; ?></div>
                 </div>
                    <?php
                } else {
                    echo "<br />";
                }
                wp_reset_query();
                ?>

             <!-- story content -->
             <?php the_content(); ?>

             <?php
                // in this series settings
                $inthisseriesSettings = get_field('in-this-series-stories');
                if ($inthisseriesSettings['show'] == 'yes') {
                    if ($inthisseriesSettings['story-status'] == 'coming-soon') {
                        if ($inthisseriesSettings['title'] != '') {
                            $seriesTitle = ': '.$inthisseriesSettings['title'];
                        } else {
                            $seriesTitle = $inthisseriesSettings['title'];
                        }
                        ?>
               <!-- in this series -->
               <div class="grid-x grid-padding-x series-block">
                 <div class="large-12 medium-12 small-12 cell">
                   <h4>In this series<span><?php echo $seriesTitle; ?><span></h4>
                   <div class="in-this-series">
                        <?php
                         $upcomingStoryList = $inthisseriesSettings['upcoming-stories'];
                        if ($upcomingStoryList != '') {
                            foreach ($upcomingStoryList as $upcomingStory) {
                                if ($upcomingStory['story-posted'] == 'no') {
                                    ?>
                         <div>
                                    <?php
                                    if ($upcomingStory['photo'] == '') {
                                        ?>
                              <div class="preview">Coming Soon</div>
                                    <?php } else { ?>
                             <div class="img-preview">
                              <img src="<?php echo $upcomingStory['photo']; ?>" />
                              <div class="preview transparent">Coming Soon</div>
                             </div>
                                    <?php } ?>
                                    <?php
                                    if ($upcomingStory['headline'] == '') {
                                        if (get_field('use_short_headline', $upcomingStory['posted-link']) == 'yes' && get_field('homepage_headline', $upcomingStory['posted-link']) != '') {
                                            ?>
                                  <h5><?php echo get_field('homepage_headline', $upcomingStory['posted-link']); ?></h5>
                                            <?php
                                        } else {
                                            ?>
                                  <h5><?php echo get_the_title($upcomingStory['posted-link']); ?></h5>
                                        <?php } ?>
                                    <?php } else {  ?>
                            <h5><?php echo $upcomingStory['headline']; ?></h5>
                                    <?php } ?>
                         </div>
                                <?php } else { ?>
                         <div>
                           <a href="<?php echo get_permalink($upcomingStory['posted-link']); ?>"><?php echo get_the_post_thumbnail($upcomingStory['posted-link'], 'full', array('class' => 'img-responsive')); ?></a>
                                    <?php
                                    if (get_field('use_short_headline', $upcomingStory['posted-link']) == 'yes' && get_field('homepage_headline', $upcomingStory['posted-link']) != '') {
                                        ?>
                               <h5><a href="<?php echo get_permalink($upcomingStory['posted-link']); ?>"><?php echo get_field('homepage_headline', $upcomingStory['posted-link']); ?></a></h5>
                                        <?php
                                    } else {
                                        ?>
                           <h5><a href="<?php echo get_permalink($upcomingStory['posted-link']); ?>"><?php echo get_the_title($upcomingStory['posted-link']); ?></a></h5>
                                    <?php } ?>
                         </div>
                                    <?php
                                }
                            }
                        }
                        ?>
                   </div>
                 </div>
               </div>
                        <?php
                    } else {
                        ?>
               <!-- in this series -->
               <div class="grid-x grid-padding-x series-block">
                 <div class="large-12 medium-12 small-12 cell">
                        <?php
                        if ($inthisseriesSettings['title'] != '') {
                            $seriesTitle = $inthisseriesSettings['title'];
                        }
                        ?>
                   <h4><?php echo $seriesTitle; ?></h4>
                   <div class="in-this-series">
                        <?php
                        $pubbedStoryList = $inthisseriesSettings['stories'];
                        if ($pubbedStoryList != '') {
                            foreach ($pubbedStoryList as $pubbedStory) {
                                ?>
                         <div>
                           <a href="<?php echo get_permalink($pubbedStory); ?>"><?php echo get_the_post_thumbnail($pubbedStory, 'full', array('class' => 'img-responsive')); ?></a>
                                <?php
                                if (get_field('use_short_headline', $pubbedStory) == 'yes' && get_field('homepage_headline', $pubbedStory) != '') {
                                    ?>
                               <h5><a href="<?php echo get_permalink($pubbedStory); ?>"><?php echo get_the_title($pubbedStory); ?></a></h5>
                                    <?php
                                } else {
                                    ?>
                           <h5><a href="<?php echo get_permalink($pubbedStory); ?>"><?php echo get_the_title($pubbedStory); ?></a></h5>
                                <?php } ?>
                         </div>
                                <?php
                            }
                        }
                        ?>
                   </div>
                 </div>
               </div>
                        <?php
                    }
                }
                ?>

             <!-- story tags -->
             <?php
                if (get_field('st_html')['tags'] != '' && get_field('st_html')['tags'] != 0) {
                    $args = array(
                               'post_type'   => 'storytags',
                               'post_status' => 'publish',
                               'p' => get_field('st_html')['tags'],
                               'posts_per_page' => 1
                              );

                    $storyTag = new WP_Query($args);
                    if ($storyTag->have_posts() ) {
                        echo '<div class="story_tag">';
                        while ( $storyTag->have_posts() ) {
                            $storyTag->the_post();
                            if (get_field('story_html_tag') != '') {
                                if (get_the_ID() == 147157) {
                                    echo '<div class="election-2020-story-tag">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                                } else if (get_the_ID() == 147157) {
                                    echo '<div class="audio-cn2go">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                                } else if (get_the_ID() == 170703) {
                                    echo '<div class="health-newsletter">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i><div><br>').'</div>';
                                } else {
                                    echo '<div class="regular">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                                }
                            }
                        }
                        echo '</div>';
                    }
                }
                wp_reset_query();
                ?>

             <div class="social_share last">
               <div class="social"><span><strong>Comparte el artículo:</strong></span> <div class="addthis_inline_share_toolbox"></div></div>
               <?php if (current_user_can('administrator')) { ?>
               <div class="report-typo"><a class="hollow button" href="#">Reporta un error</a></div>
               <?php } ?>
             </div>

           </article>

           <!-- author biography -->
           <?php

            if (have_rows('byline_info')) {
                while (have_rows('byline_info')) {
                    the_row();
                }
            }

            if (have_rows('byline_info')) {
                while (have_rows('byline_info')) {
                    the_row();

                    $staffID = get_sub_field('cn_staff');
                    $photogID = get_sub_field('cn_photographers');
                    $broadcastID = get_sub_field('cn_broadcast_reporters');
                    $dataVisualizerID = get_sub_field('cn_data_visualizer');

                    foreach ($staffID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = array(
                                 'post_type'   => 'students',
                                 'post_status' => 'publish',
                                 'p' => $val
                                );

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                                $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                                if (get_field('student_photo') != '') {
                                    echo '<div class="author_photo post">';
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                                    } else {
                                        echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                                    }
                                    echo '</div>';
                                }

                                echo '<div class="bio post">';
                                echo '<div class="name_container">';
                                if (get_the_title($val) != '') {
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<span class="name">'.get_the_title($val).'</span>';
                                    } else {
                                        echo '<span class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></span>';
                                    }
                                } else {
                                    echo '<span class="name">'.'No author name found.'.'</span>';
                                }

                                // show name pronunciation
                                if (get_field('pronunciation')) {
                                    echo '<span class="pronunciation">';
                                    ?>
                                    <?php if (get_field('audio_pronunciation') != '') { ?><a onclick="document.getElementById('pronunciation-audio-<?php echo $staffNameURLSafe; ?>').play()" class="pronunciation-audio-link"><i class="fas fa-volume-down"></i></a><?php 
                                    } ?> <?php echo get_field('pronunciation') ?></span>
                                    <?php
                                    echo '<audio id="pronunciation-audio-'.$staffNameURLSafe.'" src="'.get_field('audio_pronunciation').'">Your browser does not support the <code>audio</code> element.</audio>';
                                }

                                // show name pronoun
                                if (get_field('pronoun')) {
                                    echo '<span class="pronoun">('.get_field('pronoun').')</span>';
                                }

                                echo '</div>';

                                if (get_field('student_title') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets') ) {
                                    echo '<div class="author_social_links">';
                                    while ( have_rows('social_media_outlets') ) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                                <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'instagram') { ?>
                                <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'linkedin') { ?>
                                <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'tiktok') { ?>
                                <a href="https://www.tiktok.com/@<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                                <?php
                                            }
                                        }
                                    }
                                    echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }

                    // show broadcast
                    foreach ($broadcastID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = array(
                                  'post_type'   => 'students',
                                  'post_status' => 'publish',
                                  'p' => $val
                                 );

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                 $staffDetails->the_post();

                                 $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                                 $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                                if (get_field('student_photo') != '') {
                                    echo '<div class="author_photo post">';
                                    if ($staffNameURLSafe == 'staff') {
                                          echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                                    } else {
                                        echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                                    }
                                    echo '</div>';
                                }

                                echo '<div class="bio post">';
                                echo '<div class="name_container">';
                                if (get_the_title($val) != '') {
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<span class="name">'.get_the_title($val).'</span>';
                                    } else {
                                        echo '<span class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></span>';
                                    }
                                } else {
                                    echo '<span class="name">'.'No author name found.'.'</span>';
                                }

                                // show name pronunciation
                                if (get_field('pronunciation')) {
                                     echo '<span class="pronunciation">';
                                    ?>
                                     <?php if (get_field('audio_pronunciation') != '') { ?><a onclick="document.getElementById('pronunciation-audio-<?php echo $staffNameURLSafe; ?>').play()" class="pronunciation-audio-link"><i class="fas fa-volume-down"></i></a><?php 
                                     } ?> <?php echo get_field('pronunciation') ?></span>
                                       <?php
                                        echo '<audio id="pronunciation-audio-'.$staffNameURLSafe.'" src="'.get_field('audio_pronunciation').'">Your browser does not support the <code>audio</code> element.</audio>';
                                }

                                // show name pronoun
                                if (get_field('pronoun')) {
                                    echo '<span class="pronoun">('.get_field('pronoun').')</span>';
                                }

                                echo '</div>';

                                if (get_field('student_title') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets') ) {
                                    echo '<div class="author_social_links">';
                                    while ( have_rows('social_media_outlets') ) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                 <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                                 <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'instagram') { ?>
                                 <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'linkedin') { ?>
                                 <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'tiktok') { ?>
                                 <a href="https://www.tiktok.com/@<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                                      <?php
                                            }
                                        }
                                    }
                                    echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }

                    // show photogs
                    foreach ($photogID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = array(
                                  'post_type'   => 'students',
                                  'post_status' => 'publish',
                                  'p' => $val
                                 );

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                 $staffDetails->the_post();

                                 $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                                 $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                                if (get_field('student_photo') != '') {
                                    echo '<div class="author_photo post">';
                                    if ($staffNameURLSafe == 'staff') {
                                          echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                                    } else {
                                        echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                                    }
                                    echo '</div>';
                                }

                                echo '<div class="bio post">';
                                echo '<div class="name_container">';
                                if (get_the_title($val) != '') {
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<span class="name">'.get_the_title($val).'</span>';
                                    } else {
                                        echo '<span class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></span>';
                                    }
                                } else {
                                    echo '<span class="name">'.'No author name found.'.'</span>';
                                }

                                // show name pronunciation
                                if (get_field('pronunciation')) {
                                     echo '<span class="pronunciation">';
                                    ?>
                                     <?php if (get_field('audio_pronunciation') != '') { ?><a onclick="document.getElementById('pronunciation-audio-<?php echo $staffNameURLSafe; ?>').play()" class="pronunciation-audio-link"><i class="fas fa-volume-down"></i></a><?php 
                                     } ?> <?php echo get_field('pronunciation') ?></span>
                                       <?php
                                        echo '<audio id="pronunciation-audio-'.$staffNameURLSafe.'" src="'.get_field('audio_pronunciation').'">Your browser does not support the <code>audio</code> element.</audio>';
                                }

                                // show name pronoun
                                if (get_field('pronoun')) {
                                    echo '<span class="pronoun">('.get_field('pronoun').')</span>';
                                }
                                echo '</div>';

                                if (get_field('student_title') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets') ) {
                                    echo '<div class="author_social_links">';
                                    while ( have_rows('social_media_outlets') ) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                 <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                                 <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'instagram') { ?>
                                 <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'linkedin') { ?>
                                 <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'tiktok') { ?>
                                 <a href="https://www.tiktok.com/@<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                                      <?php
                                            }
                                        }
                                    }
                                    echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }

                    // show data visualizers
                    foreach ($dataVisualizerID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = array(
                                   'post_type'   => 'students',
                                   'post_status' => 'publish',
                                   'p' => $val
                                  );

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                                $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                                if (get_field('student_photo') != '') {
                                    echo '<div class="author_photo post">';
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<img src="'.get_field('student_photo').'" class="cn-staff-bio-circular staff" alt="'.get_the_title($staffID).'" />';
                                    } else {
                                        echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank"><img src="'.get_field('student_photo').'" class="cn-staff-bio-circular" alt="'.get_the_title($staffID).'" /></a>';
                                    }
                                    echo '</div>';
                                }

                                echo '<div class="bio post">';
                                echo '<div class="name_container">';
                                if (get_the_title($val) != '') {
                                    if ($staffNameURLSafe == 'staff') {
                                        echo '<span class="name">'.get_the_title($val).'</span>';
                                    } else {
                                        echo '<span class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></span>';
                                    }
                                } else {
                                    echo '<span class="name">'.'No author name found.'.'</span>';
                                }

                                // show name pronunciation
                                if (get_field('pronunciation')) {
                                      echo '<span class="pronunciation">';
                                    ?>
                                      <?php if (get_field('audio_pronunciation') != '') { ?><a onclick="document.getElementById('pronunciation-audio-<?php echo $staffNameURLSafe; ?>').play()" class="pronunciation-audio-link"><i class="fas fa-volume-down"></i></a><?php 
                                      } ?> <?php echo get_field('pronunciation') ?></span>
                                    <?php
                                      echo '<audio id="pronunciation-audio-'.$staffNameURLSafe.'" src="'.get_field('audio_pronunciation').'">Your browser does not support the <code>audio</code> element.</audio>';
                                }

                                // show name pronoun
                                if (get_field('pronoun')) {
                                    echo '<span class="pronoun">('.get_field('pronoun').')</span>';
                                }

                                echo '</div>';

                                if (get_field('student_title') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                } else if (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets') ) {
                                    echo '<div class="author_social_links">';
                                    while ( have_rows('social_media_outlets') ) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                  <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'email') { ?>
                                  <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'instagram') { ?>
                                  <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'linkedin') { ?>
                                  <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <?php } else if (get_sub_field('social_media_type') == 'tiktok') { ?>
                                  <a href="https://www.tiktok.com/@<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
                                                     <?php
                                            }
                                        }
                                    }
                                    echo '</div>';
                                }
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        echo '</div>';
                    }
                }
            }
             wp_reset_query();
            ?>
         </div>

         <?php
            // hide sidebar
            if (get_field('hide_right_sidebar') != 'yes') {
                ?>
         <!-- right sidebar -->
         <div class="large-4 medium-12 small-12 cell sidebar">
                <?php dynamic_sidebar('Sidebar New Story Template - 2020'); ?>
                <?php
                 $args = array(
                 'post_type' => 'post',
                 'post_status' => 'publish',
                 'posts_per_page' => 8,
                 'category__in' => array( 22877 ),
                 );
                 $query = new WP_Query($args);
                    ?>

                <?php if ($query->have_posts() ) : ?>
               <aside id="latest-news-sidebar">
                 <h5>Latest News</h5>
                 <ul class="aside-latest-news">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                   <li>
                     <a href="<?php echo get_permalink(); ?>" target="_self">
                       <img class="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail'); ?>" alt="<?php echo get_the_title(); ?>" loading="lazy" decoding="async">
                       <h3><?php echo get_the_title(); ?></h3>
                       <time class="published" datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                     </a>
                   </li>
                    <?php endwhile; ?>
               </aside>
                <?php endif; ?>
         </div>
                <?php
            }
            ?>
       </div>
     </div>

<?php get_footer('noticias'); ?>
