<!-- Post page for CN -->
 <?php
  get_header('new2019');

 if (get_query_var('title') != '') {
   $audio_title_url = get_query_var('title');
   $clean_title = ucwords(str_replace('-', ' ', $audio_title_url));
  }

 if (get_the_ID() == '138082') {
     wp_redirect('https://cronkitenews.azpbs.org/story-removed/');
 } elseif (get_the_ID() == '140913') {
     wp_redirect('https://cronkitenews.azpbs.org/homeland-secrets/');
 }
 $currentPID = get_the_ID();
 ?>

     <!-- main body container -->
     <div id="main_container" class="grid-container single-story-post">
       <!-- story content -->
       <div class="grid-x grid-padding-x single-story-block">
         <div class="large-12 medium-12 small-12 cell">
           <!-- breadcrumbs -->
           <?php
          $categories = get_the_category();
           if (! empty($categories)) {
          ?>
             <nav aria-label="Cronkite News: Breadcrumbs" role="navigation">
               <ul class="breadcrumbs">
                 <li>
                  <?php
                     $catCount = count($categories);
                     $healthStory = false;
                     foreach ($categories as $key => $val) {
                         if ($categories[$key]->name != 'New 2020') {
                             if (strtolower($categories[$key]->name) == 'health') {
                                 $healthStory = true;
                             }
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
                <?php } ?>

           <h1 class="single-story-hdr"><?php the_title(); ?></h1>
           <!-- byline and date -->
           <div class="byline">
             <?php

             if (have_rows('byline_info')) {
                 while (have_rows('byline_info')) {
                     the_row();
                 }
             }

             if (get_the_ID() == 165700) {
                 $externalSites = ['arizona-pbs' => "https://www.azpbs.org",
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
                                    ];
             } elseif (get_the_ID() == 167042) {
                 $externalSites = ['arizona-pbs' => "https://www.azpbs.org",
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
                                     'fronteras' => "https://fronterasdesk.org/content/1696137/hermosillo-pedestrians-face-many-dangers-work-address-them-underway",
                                    ];
             } elseif (get_the_ID() == 168187) {
                 $externalSites = ['arizona-pbs' => "https://www.azpbs.org",
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
                                     'fronteras' => "https://fronterasdesk.org/content/1703038/women-and-conservation-sonoran-scientists-start-group-latin-american-women",
                                    ];
             } else {
                 $externalSites = ['abc15' => "https://www.abc15.com/",
                                     'arizona-pbs' => "https://www.azpbs.org",
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
                                     'News21' => "https://news21.com/",
                                     'PBS-SoCal' => "https://www.pbssocal.org/",
                                     'PolitiFact' => "https://www.politifact.com",
                                     'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                     'special-to-cronkite-news' => "",
                                     'stateline' => "https://stateline.org/",
                                     'source-new-mexico' => "https://sourcenm.com/",
                                     'The74' => "https://www.the74million.org/"
                                    ];
             }
             $externalAuthorCount = 1;
             $internalAuthorCount = 0;
             $commaSeparator = ',';
             $andSeparator = ' and ';
             $cnStaffCount = 0;
             $newCheck = 0;

             // bypass group not showing repeater field issue
             $groupFields = get_field('byline_info');
             if ($groupFields['external_authors_repeater'] != '') {
               $externalAuthorRepeater = $groupFields['external_authors_repeater'];
             } else {
               $externalAuthorRepeater = '';
             }

             $normalizeChars = [
               'Š'=>'S', 'š'=>'s', 'Ð'=>'Dj','Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A',
               'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I',
               'Ï'=>'I', 'Ñ'=>'N', 'Ń'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U',
               'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss','à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a',
               'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i',
               'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ń'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u',
               'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y', 'ƒ'=>'f',
               'ă'=>'a', 'î'=>'i', 'â'=>'a', 'ș'=>'s', 'ț'=>'t', 'Ă'=>'A', 'Î'=>'I', 'Â'=>'A', 'Ș'=>'S', 'Ț'=>'T',
             ];

             if (have_rows('byline_info')) {
                 $sepCounter = 0;
                 $staffID = array();
                 echo '<span class="author_name">';
                 while (have_rows('byline_info')) {
                     the_row();
                     $staffID = get_sub_field('cn_staff');
                     $cnStaffCount = count((array)$staffID);

                     if ($staffID != '') {
                       foreach ($staffID as $key => $val) {
                           $args = [
                                  'post_type'   => 'students',
                                  'post_status' => 'publish',
                                  'p' => $val,
                                ];

                           $staffDetails = new WP_Query($args);
                           if ($staffDetails->have_posts()) {
                               while ($staffDetails->have_posts()) {
                                   $staffDetails->the_post();
                                   $sepCounter++;

                                   $staffNameURLSafe = str_replace("’", "", str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val))))));
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
                     }
                     if ($cnStaffCount > 0 && $staffID != '') {
                         if (get_sub_field('cn_project') != '') {
                             $finalOutlet = str_replace('At', 'at', str_replace('Asu', 'ASU', str_replace('The', 'the', str_replace('And', 'and', str_replace('Pbs', 'PBS', str_replace(' For ', ' for ', ucwords(str_replace('-', ' ', get_sub_field('cn_project')))))))));
                             echo '/'.$finalOutlet.'</span>';
                         } else {
                             echo '/Cronkite News</span>';
                         }
                     }
                 }

                 if (is_countable($externalAuthorRepeater) && count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
                     $extStaffCount = count($externalAuthorRepeater);
                     if ($groupFields['cn_staff'] != '') {
                         echo ' and ';
                     }
                     $sepCounter = 0;
                     foreach ($externalAuthorRepeater as $key => $val) {
                         $sepCounter++;
                         echo $val['external_authors'];
                         if ($val['author_title_site'] != '' || $val['author_title_site'] != 'other') {
                             if (array_key_exists($val['author_title_site'], $externalSites) == true) {
                                 if ($val['author_title_site'] == 'abc15') {
                                     echo '/<a href="'.$externalSites[$val['author_title_site']].'" target="_blank">'.strtoupper(ucwords(str_replace('-', ' ', $val['author_title_site']))).'</a>';
                                 } else {
                                     echo '/<a href="'.$externalSites[$val['author_title_site']].'" target="_blank">'.ucwords(str_replace('-', ' ', $val['author_title_site'])).'</a>';
                                 }
                             } else {
                                 //echo '/'.str_replace('Pbs', 'PBS', str_replace('For', 'for', ucwords(str_replace('-', ' ', $val['author_title_site']))));
                                 echo '/'.str_replace('At', 'at', str_replace('Asu', 'ASU', str_replace('The', 'the', str_replace('And', 'and', str_replace('Pbs', 'PBS', str_replace(' For ', ' for ', ucwords(str_replace('-', ' ', $val['author_title_site']))))))));
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

           <?php if (get_field('hide_right_sidebar') == 'yes') {
               $hideSidebarClass = "photo-essay";
           } else {
               $hideSidebarClass = '';
           } ?>

           <div class="date-social <?php echo $hideSidebarClass; ?>">
             <div class="pub_date">
               <time datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
               <?php if (get_field('updated_date_and_time') != '') { ?>
                  | <span class="article_updated">Updated:</span> <time datetime="<?php echo get_field('updated_date_and_time'); ?>"><?php echo get_field('updated_date_and_time'); ?></time>
               <?php } ?>
             </div>

             <div class="social_share">
              <ul class="share-buttons">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u=&quote=" target="_blank" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><i class="fa-brands fa-square-facebook" aria-hidden="true"></i><span class="sr-only">Share on Facebook</span></a></li>
                <!--<li><a href="http://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="fa-brands fa-linkedin" aria-hidden="true"></i><span class="sr-only">Share on LinkedIn</span></a></li>-->
                <li><a href="http://www.reddit.com/submit?url=&title=" target="_blank" title="Submit to Reddit" onclick="window.open('http://www.reddit.com/submit?url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><i class="fa-brands fa-square-reddit" aria-hidden="true"></i><span class="sr-only">Submit to Reddit</span></a></li>
                <li><a href="https://twitter.com/intent/tweet?source=&text=:%20" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20' + encodeURIComponent(document.URL)); return false;"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i><span class="sr-only">Tweet</span></a></li>
                <li><a href="mailto:?subject=&body=:%20" target="_blank" title="Send email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"><i class="fa-solid fa-envelope" aria-hidden="true"></i><span class="sr-only">Send email</span></a></li>
              </ul>
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
                function getYoutubeID($isvid)
                {
                    $videoBaseLink = 'https://www.youtube.com/embed/';
                    $breakQuery = parse_url($isvid, PHP_URL_QUERY);
                    if (isset($breakQuery)) {
                        $videoID = explode('=', $breakQuery);
                        $finalVideoURL = $videoBaseLink.$videoID[1];
                    } else {
                        $finalVideoURL = $isvid;
                    }
                    return $finalVideoURL;
                }

                if (get_field('video_url') != '') {
                    $isvid = get_field('video_url', false, false);
                } else {
                    $isvid = get_field('video_file', false, false);
                }

                if ($isvid) { // if we have a video load the video instead of the carousel
                    $host = parse_url($isvid);
                    $isjpg = false;

                    if ($host['host'] == 'www.youtube.com' || $host['host'] == 'youtu.be' || $host['host'] == 'www.youtu.be' || $host['host'] == 'youtube.com') {
                        $embedVideoURL = getYoutubeID($isvid);
                        echo '<div id="video-holder">';
                        echo '<div class="video-wrap">';
                        echo '<div class="video">';
                        echo '<div class="close-video"><i class="fas fa-times"></i></div>';
                        echo '<div class="plyr__video-embed responsive-embed widescreen" id="player">';
                        echo '<iframe
                           src="'.$embedVideoURL.'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                           allowfullscreen
                           allowtransparency
                           allow="autoplay"
                           ></iframe>';
                        echo '</div>';
                        echo '<div class="asset-caption">'.strip_tags(get_field('video_caption'), '<a>').'</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div id="video-holder">';
                        echo get_field('video_file', false, false);
                        echo '<div class="asset-caption">'.strip_tags(get_field('video_caption'), '<a>').'</div>';
                        echo '</div>';
                    }
                } elseif (have_rows('video-carousel-content') && get_field('video-carousel') == 'yes') {
                    ?>
                    <div id="story-photo" class="story-photos">
                       <?php
                         while (have_rows('video-carousel-content')) {
                             the_row();
                             $videoCount = count(get_field('video-carousel-content'));
                             $videoURL = get_sub_field('video-url');
                             $videoCaption = get_sub_field('credits');
                             $embedVideoURL = getYoutubeID($videoURL);
                        ?>
                          <div>
                       <?php
                             echo '<div id="video-holder">';
                             echo '<div class="video-wrap">';
                             echo '<div class="video">';
                             echo '<div class="close-video"><i class="fas fa-times"></i></div>';
                             echo '<div class="plyr__video-embed responsive-embed widescreen" id="player">';
                             echo '<iframe
                      src="'.$embedVideoURL.'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                      allowfullscreen
                      allowtransparency
                      allow="autoplay"
                      ></iframe>';
                             echo '</div>';
                             echo '<div class="asset-caption">'.strip_tags($videoCaption, '<a>').'</div>';
                             echo '</div>';
                             echo '</div>';
                             echo '</div>';
                          ?>
                          </div>
                       <?php } ?>
                    </div>
                <?php } elseif (have_rows('slider_images')) { ?>

                   <div id="story-photo" class="story-photos">
                      <?php
                        while (have_rows('slider_images')) {
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
                      <?php } else { ?>
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
                } elseif (get_field('before_after_slider')) {
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
             <?php
                // check if story is a translation by ChatGPT
                if (get_field('original-content') == 'no' && get_field('chatgpt_translation') == 'yes') {
             ?>
                <div class="callout secondary roboto" style="margin-bottom:50px;max-width:800px;border:none;box-shadow: 0px 3px 15px rgba(0, 0, 0, 0.2);">
                  <div class="grid-x align-middle">
                    <div class="cell small-12">
                      <p><strong>EDITOR'S NOTE:</strong> This story was translated from English to Spanish using <a href="https://chat.openai.com/" rel="noopener" target="_blank">ChatGPT</a>. A Cronkite News editor reviewed the translation. Find the original story <a href="<?php echo get_field('original_story_link'); ?>" rel="noopener" target="_blank">here</a>. See any errors? Please let us know. Contact <a href="mailto:julio.cisneros@asu.edu" rel="noopener" target="_blank">julio.cisneros@asu.edu</a>.</p>
                      <hr />
                      <p><strong>NOTA DEL EDITOR:</strong> Este reportaje fue traducido del inglés al español usando <a href="https://chat.openai.com/" rel="noopener" target="_blank">ChatGPT</a>. Un editor de Cronkite News revisó la traducción. Encuentra el reportaje original <a href="<?php echo get_field('original_story_link'); ?>" rel="noopener" target="_blank">aquí</a>. ¿Ves algún error? Por favor, déjanoslo saber. Contacta a <a href="mailto:julio.cisneros@asu.edu" rel="noopener" target="_blank">julio.cisneros@asu.edu</a>.</p>
                    </div>
                  </div>
                </div>
            <?php
                }

                // candidate Profiles
                if (get_field('candidate-profiles') == 'yes') {
                  if( have_rows('candidate-details') ) {
                    while( have_rows('candidate-details') ) {
                      the_row();
            ?>
                    <div class="candidate-profiles callout secondary">
                    <div class="grid-x align-middle">
                      <div class="cell small-8 divider">
                        <ul>
                         <li><strong>Candidate name:</strong> <?php echo get_sub_field('candidate-name'); ?></li>
                         <?php if (get_sub_field('political-affiliation') != '') { ?>
                         <li><strong>Political affiliation:</strong> <?php echo get_sub_field('political-affiliation'); ?></li>
                         <?php } ?>
                         <?php if (get_sub_field('position-sought') != '') { ?>
                         <li><strong>Position sought:</strong> <?php echo get_sub_field('position-sought'); ?></li>
                         <?php } ?>
                         <?php if (get_sub_field('candidate-age') != '') { ?>
                         <li><strong>Age:</strong> <?php echo get_sub_field('candidate-age'); ?></li>
                         <?php } ?>
                         <?php if (get_sub_field('career') != '') { ?>
                         <li><strong>Career:</strong> <?php echo get_sub_field('career'); ?></li>
                         <?php } ?>
                         <?php if (get_sub_field('candidate-website') != '') { ?>
                         <li><strong>Website:</strong> <a href="<?php echo get_sub_field('candidate-website'); ?>" target="_blank" rel="noopener"><?php echo get_sub_field('candidate-website'); ?></a></li>
                         <?php } ?>
                        </ul>
                      </div>
                      <div class="cell small-4"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2024/09/cn-election-2024.svg" /></div>
                    </div>
                    </div>
              <?php
                    }
                  }
                }

               $compareDate = strtotime('Mar 21, 2023');
               $postDate = strtotime(get_the_date());
               if ($postDate >= $compareDate) {
                   $storyContent = wpautop(get_the_content());
                   function getVideoUrlsFromString($storyContent){
                       $regex = '/<(?:[^\'">=]*|=\'[^\']*\'|="[^"]*"|=[^\'"][^\s>]*)*>|((?:[\w-]+:\/\/?|www[.])[^\s()<>]+(?:\([\w\d]+\)|(?:[^[:punct:]\s]|\/)))/ims';
                       $storyContent = preg_replace_callback(
                           $regex,
                           function ($matches) {
                               if (array_key_exists(1, $matches)) {
                                   $ytLinks = array();
                                   $patternURL = '~(?:https?://)?(?:www.)?(?:youtube.com|youtu.be)/(?:watch\?v=)?([^\s]+)~';
                                   preg_match_all($patternURL, $matches[1], $ytLinks);
                                   if ($ytLinks[1][0] != '') {
                                       return "<style>.embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style><div class='embed-container'><iframe src='https://www.youtube.com/embed/".strip_tags($ytLinks[1][0])."' frameborder='0' allowfullscreen></iframe></div>";
                                   } else {
                                       return $matches[0];
                                   }
                               }
                               return $matches[0];
                           },
                           $storyContent
                       );

                       $storyContent = str_replace('<p><style>.embed-container', '<style>.embed-container', $storyContent);
                       $storyContent = str_replace('</iframe></div></p>', '</iframe></div>', $storyContent);

                       return $storyContent;
                   }
                   $finalStoryContent = getVideoUrlsFromString($storyContent);
                   echo $finalStoryContent = apply_filters('the_content', $finalStoryContent);
               } else {
                   the_content();
               }

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
                           <a href="<?php echo get_permalink($upcomingStory['posted-link']); ?>"><?php echo get_the_post_thumbnail($upcomingStory['posted-link'], 'full', ['class' => 'img-responsive']); ?></a>
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
         <?php } else { ?>
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
                           <a href="<?php echo get_permalink($pubbedStory); ?>"><?php echo get_the_post_thumbnail($pubbedStory, 'full', ['class' => 'img-responsive']); ?></a>
                           <?php
                           if (get_field('use_short_headline', $pubbedStory) == 'yes' && get_field('homepage_headline', $pubbedStory) != '') {
                               ?>
                      <h5><a href="<?php echo get_permalink($pubbedStory); ?>"><?php echo get_field('homepage_headline', $pubbedStory); ?></a></h5>
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

             <?php
                // show fact box
                if (get_field('fact-box') == 'yes' && get_field('fact-box-code') != '') {
                    echo get_field('fact-box-code');
                }
               ?>

             <!-- story tags -->
             <?php
                if (get_field('st_html')['tags'] != '' && get_field('st_html')['tags'] != 0) {
                    $args = [
                               'post_type'   => 'storytags',
                               'post_status' => 'publish',
                               'p' => get_field('st_html')['tags'],
                               'posts_per_page' => 1,
                              ];

                    $storyTag = new WP_Query($args);
                    if ($storyTag->have_posts()) {
                        echo '<div class="story_tag">';
                        while ($storyTag->have_posts()) {
                            $storyTag->the_post();
                            if (get_field('story_html_tag') != '' || get_field('story_tag_img') != '') {
                                if ($healthStory == true) {
                                    echo '<!--HERE HEALTH-->';
                                    echo '<div class="health-newsletter">'.strip_tags(get_field('story_html_tag', 170703), '<em><img><a><i><div><br>').'</div>';
                                } else {
                                    echo '<!--ID'.get_the_ID().'-->';
                                    if (get_the_ID() == 147157) {
                                        echo '<div class="election-2020-story-tag">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                                    } elseif (get_the_ID() == 147157) {
                                        echo '<div class="audio-cn2go">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                                    } elseif (get_the_ID() == 170703) {
                                        echo '<div class="health-newsletter">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i><div><br>').'</div>';
                                    } elseif (get_the_ID() == 198806) {
                                        echo '<div class="election-2022">'.get_field('story_html_tag').'</div>';
                                    } elseif (get_the_ID() == 236841) {
                                        echo '<div class="election-2024"><a href="'.get_field('story_tag_link').'"><img src="'.get_field('story_tag_img').'" alt="Election 2024" /></a></div>';
                                    } else {
                                        echo '<div class="regular">'.strip_tags(get_field('story_html_tag'), '<em><img><a><i>').'</div>';
                                    }
                                }
                            }
                        }
                        echo '</div>';
                    }
                }
                wp_reset_query();
             ?>

           </article>
           <?php if (current_user_can('administrator')) { ?>
           <?php } ?>
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

                    $staffID = array();
                    $photogID = array();
                    $broadcastID = array();
                    $dataVisualizerID = array();

                    $staffID = get_sub_field('cn_staff');
                    $photogID = get_sub_field('cn_photographers');
                    $broadcastID = get_sub_field('cn_broadcast_reporters');
                    $dataVisualizerID = get_sub_field('cn_data_visualizer');

                    if (!empty($staffID)) {
                      foreach ($staffID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = [
                                 'post_type'   => 'students',
                                 'post_status' => 'publish',
                                 'p' => $val,
                                ];

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("’", "", str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val))))));
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
                                } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets')) {
                                    echo '<div class="author_social_links">';
                                    while (have_rows('social_media_outlets')) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                                <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                                <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                                <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'portfolio') { ?>
                                <a href="<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-solid fa-globe"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'tiktok') { ?>
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

                    // show broadcast
                    if (!empty($broadcastID)) {
                      foreach ($broadcastID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = [
                                  'post_type'   => 'students',
                                  'post_status' => 'publish',
                                  'p' => $val,
                                 ];

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("’", "", str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val))))));
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
                                } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets')) {
                                    echo '<div class="author_social_links">';
                                    while (have_rows('social_media_outlets')) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                 <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                                 <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                                 <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                                 <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                             <?php } elseif (get_sub_field('social_media_type') == 'portfolio') { ?>
                                    <a href="<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-solid fa-globe"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'tiktok') { ?>
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

                    // show photogs
                    if (!empty($photogID)) {
                      foreach ($photogID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = [
                                  'post_type'   => 'students',
                                  'post_status' => 'publish',
                                  'p' => $val,
                                 ];

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("’", "", str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val))))));
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
                                } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets')) {
                                    echo '<div class="author_social_links">';
                                    while (have_rows('social_media_outlets')) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                 <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                                 <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                                 <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                                 <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                             <?php } elseif (get_sub_field('social_media_type') == 'portfolio') { ?>
                                    <a href="<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-solid fa-globe"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'tiktok') { ?>
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

                    // show data visualizers
                    if (!empty($dataVisualizerID)) {
                      foreach ($dataVisualizerID as $key => $val) {
                        echo '<div class="author_bio post-holder">';
                        $args = [
                                   'post_type'   => 'students',
                                   'post_status' => 'publish',
                                   'p' => $val,
                                  ];

                        $staffDetails = new WP_Query($args);
                        if ($staffDetails->have_posts()) {

                            while ($staffDetails->have_posts()) {
                                $staffDetails->the_post();

                                $staffNameURLSafe = str_replace("’", "", str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val))))));
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
                                } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                    echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                }

                                if (get_field('biography') != '') {
                                    echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                } else {

                                }

                                echo '<div class="links-container">';

                                if (have_rows('social_media_outlets')) {
                                    echo '<div class="author_social_links">';
                                    while (have_rows('social_media_outlets')) {
                                        the_row();
                                        if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                            if (get_sub_field('social_media_type') == 'twitter') {
                                                ?>
                                  <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                                  <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                                  <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                                  <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'portfolio') { ?>
                                   <a href="<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fa-solid fa-globe"></i></a>
                                            <?php } elseif (get_sub_field('social_media_type') == 'tiktok') { ?>
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
              $args = [
              'post_type' => 'post',
              'post_status' => 'publish',
              'posts_per_page' => 8,
              'category__not_in' => [ 22877 ],
              ];
             $query = new WP_Query($args);
             if ($query->have_posts()) :
            ?>
               <aside id="latest-news-sidebar">
                 <h5>Latest News</h5>
                 <ul class="aside-latest-news">
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                   <li>
                     <a href="<?php echo get_permalink(); ?>" target="_self">
                       <img class="" src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail'); ?>" alt="<?php echo get_the_title(); ?>" loading="lazy" decoding="async">
                       <?php
                         if (get_field('use_short_headline', get_the_ID()) == 'yes' && get_field('homepage_headline', get_the_ID()) != '') {
                             $title = get_field('homepage_headline', get_the_ID());
                         } else {
                             $title = get_the_title(get_the_ID());
                         }
                       ?>
                       <h3><?php echo $title; ?></h3>
                       <time class="published" datetime="<?php echo ap_date(); ?>"><?php echo ap_date(); ?></time>
                     </a>
                   </li>
                    <?php endwhile; ?>
               </aside>
              <?php endif; ?>
         </div>
         <?php } ?>
       </div>
     </div>

<?php get_footer('new2020'); ?>
