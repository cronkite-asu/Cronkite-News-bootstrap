<?php
$settings = get_field('longform-settings');
if ($settings['header'] == 'longform') {
    get_header('new-long-form');
} else {
    get_header('new-long-form-regular');
}
?>

<?php
  $publishDate = ap_date();

function generateByline($currPostID, $currIntro, $publishDate, $style)
{
    ?>
    <div class="grid-container text-content first <?php echo $style; ?>">
      <div class="grid-x grid-padding-x">
        <div class="large-8 medium-8 small-12 cell story-credits-date">
          <span class="byline">
            <?php
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
                                         'PBS-SoCal' => "https://www.pbssocal.org/",
                                         'PolitiFact' => "https://www.politifact.com",
                                         'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                         'special-to-cronkite-news' => "",
                                        ];
    $externalAuthorCount = 1;
    $internalAuthorCount = 0;
    $commaSeparator = ',';
    $andSeparator = ' and ';
    $cnStaffCount = 0;
    $newCheck = 0;

    // bypass group not showing repeater field issue
    $groupFields = get_field('byline_info');
    $externalAuthorRepeater = $groupFields['external_authors_repeater'];

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
        //echo '<!--HERE BYLINE NEW-->';
        echo '<span class="author_name">By ';
        while (have_rows('byline_info')) {
            the_row();
            $staffID = get_sub_field('cn_staff');
            $cnStaffCount = count((array)$staffID);

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

                        $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));
                        $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

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
                    echo '/'.str_replace('Pbs', 'PBS', str_replace(' For ', ' for ', ucwords(str_replace('-', ' ', get_sub_field('cn_project'))))).'</span>';
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
                        echo '/<a href="'.$externalSites[$val['author_title_site']].'" target="_blank">'.ucwords(str_replace('-', ' ', $val['author_title_site'])).'</a>';
                    } else {
                        echo '/'.str_replace('For', 'for', ucwords(str_replace('-', ' ', $val['author_title_site'])));
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
    ?>
          </span>
          <?php wp_reset_postdata(); ?>
          <span class="pubdate">
            <time datetime="<?php echo $publishDate; ?>"><?php echo $publishDate; ?></time>
            <?php if (get_field('updated_date_and_time') != '') { ?>
               | <span class="article_updated">Updated:</span> <time datetime="<?php echo get_field('updated_date_and_time'); ?>"><?php echo get_field('updated_date_and_time'); ?></time>
            <?php } ?>
            <?php wp_reset_postdata(); ?>
          </span>
        </div>
        <div class="large-4 medium-4 small-12 cell story-credits-date medium-text-right text-left">
          <ul class="top_social">
            <li><a href="https://twitter.com/intent/tweet?url=<?php echo get_permalink($currPostID); ?>&text=<?php echo urlencode(strip_tags($currIntro)); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($currPostID); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
<?php
}


if (have_rows('blocks')) {
    while (have_rows('blocks')) {
        the_row();
        if (get_row_layout() == 'intro-split') {
            $intro = get_sub_field('intro_summary');
            ?>
  <div id="intro" class="grid-container full">
    <div class="grid-x grid-padding-x">
      <div class="large-6 medium-6 small-12 cell intro-text">
        <?php if (get_sub_field('headline') != '') { ?>
          <h1><?php echo get_sub_field('headline'); ?></h1>
          <?php echo get_sub_field('intro_summary'); ?>
        <?php } else { ?>
          <?php echo get_sub_field('intro_summary'); ?>
        <?php } ?>
      </div>
      <div class="large-6 medium-6 small-12 cell background-img" <?php echo 'style="background:url('.get_sub_field('photo').')"';?>>
        <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
      </div>
    </div>
  </div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>

<?php
        } elseif (get_row_layout() == 'intro-split-code') {
            ?>
  <div id="intro" class="grid-container full">
    <div class="grid-x grid-padding-x">
      <div class="large-6 medium-12 small-12 cell intro-text">
        <?php if (get_sub_field('headline') != '') { ?>
          <h1><?php echo get_sub_field('headline'); ?></h1>
          <?php echo get_sub_field('intro_summary'); ?>
        <?php } else { ?>
          <?php echo get_sub_field('intro_summary'); ?>
        <?php } ?>

        <?php
                      $audioSettings = get_sub_field('audio');
            if ($audioSettings['audio-file'] != '') {
                ?>
        <div class="audio-holder in-content">
          <div class="player-btn">

            <svg version="1.1" id="play-audio" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 viewBox="0 0 75 75" style="enable-background:new 0 0 75 75;" xml:space="preserve">
            <style type="text/css">
            	.st0{fill:#FFCE00;}
            	.st1{fill:#FFFFFF;}
            </style>
            <g>
            	<g>
            		<g>
            			<path class="st0" d="M71.26,43.43l-0.18,0.96l-3.18-0.61l0.18-0.96L71.26,43.43z"/>
            			<path class="st0" d="M69.3,46.96l-0.29,0.93l-2.03-0.63l0.29-0.93L69.3,46.96z"/>
            			<path class="st0" d="M69.03,51.01l-0.4,0.89l-2.96-1.31l0.4-0.89L69.03,51.01z"/>
            			<path class="st0" d="M68.61,55.37l-0.5,0.84l-4.14-2.45l0.5-0.84L68.61,55.37z"/>
            			<path class="st0" d="M65.09,57.9l-0.59,0.78l-2.58-1.96l0.59-0.78L65.09,57.9z"/>
            			<path class="st0" d="M61.78,60.14l-0.68,0.71l-1.53-1.47l0.68-0.71L61.78,60.14z"/>
            			<path class="st0" d="M59.7,63.66l-0.75,0.62l-2.06-2.5l0.75-0.62L59.7,63.66z"/>
            			<path class="st0" d="M57.38,67.37l-0.82,0.53l-2.61-4.04l0.82-0.53L57.38,67.37z"/>
            			<path class="st0" d="M53.12,68.05l-0.88,0.43l-1.43-2.9l0.88-0.43L53.12,68.05z"/>
            			<path class="st0" d="M49.12,68.6l-0.92,0.33l-0.72-2l0.92-0.33L49.12,68.6z"/>
            			<path class="st0" d="M45.73,70.81l-0.95,0.22l-0.73-3.15L45,67.65L45.73,70.81z"/>
            			<path class="st0" d="M41.99,73.1l-0.97,0.11l-0.53-4.78l0.97-0.11L41.99,73.1z"/>
            			<path class="st0" d="M37.86,71.79l-0.98-0.01l0.02-3.24l0.98,0.01L37.86,71.79z"/>
            			<path class="st0" d="M34.03,70.49l-0.97-0.12l0.26-2.11l0.97,0.12L34.03,70.49z"/>
            			<path class="st0" d="M30,70.95l-0.95-0.23l0.76-3.15l0.95,0.23L30,70.95z"/>
            			<path class="st0" d="M25.67,71.34L24.75,71l1.66-4.52l0.92,0.34L25.67,71.34z"/>
            			<path class="st0" d="M22.54,68.33l-0.87-0.44L23.13,65L24,65.44L22.54,68.33z"/>
            			<path class="st0" d="M19.71,65.47l-0.82-0.54l1.17-1.77l0.82,0.54L19.71,65.47z"/>
            			<path class="st0" d="M15.89,64.06l-0.75-0.63l2.09-2.48l0.75,0.63L15.89,64.06z"/>
            			<path class="st0" d="M11.83,62.46l-0.67-0.71l3.5-3.29l0.67,0.71L11.83,62.46z"/>
            			<path class="st0" d="M10.4,58.39L9.82,57.6l2.6-1.93L13,56.46L10.4,58.39z"/>
            			<path class="st0" d="M9.13,54.55L8.64,53.7l1.84-1.06l0.49,0.85L9.13,54.55z"/>
            			<path class="st0" d="M6.34,51.59l-0.39-0.9l2.97-1.29l0.39,0.9L6.34,51.59z"/>
            			<path class="st0" d="M3.43,48.36l-0.28-0.94l4.61-1.39l0.28,0.94L3.43,48.36z"/>
            			<path class="st0" d="M3.96,44.07l-0.17-0.96l3.19-0.57l0.17,0.96L3.96,44.07z"/>
            			<path class="st0" d="M4.54,40.06l-0.06-0.98l2.12-0.13l0.06,0.98L4.54,40.06z"/>
            			<path class="st0" d="M3.37,36.17l0.06-0.98l3.23,0.18L6.6,36.35L3.37,36.17z"/>
            			<path class="st0" d="M2.21,32.04l0.15-0.97l4.75,0.75l-0.15,0.97L2.21,32.04z"/>
            			<path class="st0" d="M4.61,28.37l0.28-0.94l3.11,0.91l-0.28,0.94L4.61,28.37z"/>
            			<path class="st0" d="M6.91,25.05l0.38-0.9l1.96,0.83l-0.38,0.9L6.91,25.05z"/>
            			<path class="st0" d="M7.61,21.03l0.49-0.85l2.81,1.61l-0.49,0.85L7.61,21.03z"/>
            			<path class="st0" d="M8.45,16.75l0.58-0.79l3.87,2.85l-0.58,0.79L8.45,16.75z"/>
            			<path class="st0" d="M12.2,14.61l0.67-0.71l2.37,2.21l-0.67,0.71L12.2,14.61z"/>
            			<path class="st0" d="M15.76,12.67l0.75-0.63l1.38,1.62l-0.75,0.63L15.76,12.67z"/>
            			<path class="st0" d="M18.16,9.4l0.81-0.54l1.8,2.69l-0.81,0.54L18.16,9.4z"/>
            			<path class="st0" d="M20.82,5.96l0.87-0.45l2.19,4.28l-0.87,0.45L20.82,5.96z"/>
            			<path class="st0" d="M25.13,5.7l0.92-0.34l1.13,3.03l-0.92,0.34L25.13,5.7z"/>
            			<path class="st0" d="M29.17,5.55l0.95-0.23l0.51,2.07l-0.95,0.23L29.17,5.55z"/>
            			<path class="st0" d="M32.77,3.7l0.97-0.12l0.41,3.21l-0.97,0.12L32.77,3.7z"/>
            			<path class="st0" d="M36.72,1.8L37.7,1.8l0.04,4.81l-0.98,0.01L36.72,1.8z"/>
            			<path class="st0" d="M40.7,3.52l0.97,0.1l-0.35,3.22l-0.97-0.1L40.7,3.52z"/>
            			<path class="st0" d="M44.36,5.19l0.95,0.21l-0.47,2.08L43.9,7.27L44.36,5.19z"/>
            			<path class="st0" d="M48.44,5.15l0.92,0.32l-1.07,3.06L47.37,8.2L48.44,5.15z"/>
            			<path class="st0" d="M52.78,5.19l0.88,0.43l-2.1,4.33l-0.88-0.43L52.78,5.19z"/>
            			<path class="st0" d="M55.59,8.5l0.82,0.53l-1.75,2.73l-0.82-0.53L55.59,8.5z"/>
            			<path class="st0" d="M58.11,11.63l0.76,0.62l-1.35,1.65l-0.76-0.62L58.11,11.63z"/>
            			<path class="st0" d="M61.77,13.42l0.68,0.7l-2.33,2.25l-0.68-0.7L61.77,13.42z"/>
            			<path class="st0" d="M65.64,15.41l0.59,0.78l-3.82,2.93l-0.6-0.78L65.64,15.41z"/>
            			<path class="st0" d="M66.68,19.65l0.5,0.84l-2.78,1.66l-0.5-0.84L66.68,19.65z"/>
            			<path class="st0" d="M67.55,23.58l0.4,0.89l-1.94,0.87l-0.4-0.89L67.55,23.58z"/>
            			<path class="st0" d="M70.02,26.79l0.29,0.93l-3.08,0.98l-0.29-0.93L70.02,26.79z"/>
            			<path class="st0" d="M72.6,30.33l0.18,0.96l-4.72,0.91l-0.19-0.96L72.6,30.33z"/>
            			<path class="st0" d="M71.63,34.53l0.07,0.98l-3.23,0.24l-0.07-0.98L71.63,34.53z"/>
            			<path class="st0" d="M70.62,39.06l-0.06,0.98l-2.12-0.13l0.06-0.98L70.62,39.06z"/>
            		</g>
            		<g>
            			<circle class="st0" cx="37.5" cy="37.5" r="27.5"/>
            		</g>
            		<path class="st1" d="M31.43,29.72v16.56c0,1.16,1.41,1.84,2.46,1.2l13.37-8.28c0.89-0.55,0.89-1.85,0-2.4l-13.37-8.28
            			C32.85,27.87,31.43,28.56,31.43,29.72z"/>
            	</g>
            </g>
            </svg>

            <svg version="1.1" id="pause-audio" class="hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 viewBox="0 0 75 75" style="enable-background:new 0 0 75 75;" xml:space="preserve">
            <style type="text/css">
            	.st0{fill:#FFCE00;}
            	.st1{fill-rule:evenodd;clip-rule:evenodd;fill:#FFFFFF;}
            </style>
            <g>
            	<path class="st0" d="M71.26,43.43l-0.18,0.96l-3.18-0.61l0.18-0.96L71.26,43.43z"/>
            	<path class="st0" d="M69.3,46.96l-0.29,0.93l-2.03-0.63l0.29-0.93L69.3,46.96z"/>
            	<path class="st0" d="M69.03,51.01l-0.4,0.89l-2.96-1.31l0.4-0.89L69.03,51.01z"/>
            	<path class="st0" d="M68.61,55.37l-0.5,0.84l-4.14-2.45l0.5-0.84L68.61,55.37z"/>
            	<path class="st0" d="M65.09,57.9l-0.59,0.78l-2.58-1.96l0.59-0.78L65.09,57.9z"/>
            	<path class="st0" d="M61.78,60.14l-0.68,0.71l-1.53-1.47l0.68-0.71L61.78,60.14z"/>
            	<path class="st0" d="M59.7,63.66l-0.75,0.62l-2.06-2.5l0.75-0.62L59.7,63.66z"/>
            	<path class="st0" d="M57.38,67.37l-0.82,0.53l-2.61-4.04l0.82-0.53L57.38,67.37z"/>
            	<path class="st0" d="M53.12,68.05l-0.88,0.43l-1.43-2.9l0.88-0.43L53.12,68.05z"/>
            	<path class="st0" d="M49.12,68.6l-0.92,0.33l-0.72-2l0.92-0.33L49.12,68.6z"/>
            	<path class="st0" d="M45.73,70.81l-0.95,0.22l-0.73-3.15L45,67.65L45.73,70.81z"/>
            	<path class="st0" d="M41.99,73.1l-0.97,0.11l-0.53-4.78l0.97-0.11L41.99,73.1z"/>
            	<path class="st0" d="M37.86,71.79l-0.98-0.01l0.02-3.24l0.98,0.01L37.86,71.79z"/>
            	<path class="st0" d="M34.03,70.49l-0.97-0.12l0.26-2.11l0.97,0.12L34.03,70.49z"/>
            	<path class="st0" d="M30,70.95l-0.95-0.23l0.76-3.15l0.95,0.23L30,70.95z"/>
            	<path class="st0" d="M25.67,71.34L24.75,71l1.66-4.52l0.92,0.34L25.67,71.34z"/>
            	<path class="st0" d="M22.54,68.33l-0.87-0.44L23.13,65L24,65.44L22.54,68.33z"/>
            	<path class="st0" d="M19.71,65.47l-0.82-0.54l1.17-1.77l0.82,0.54L19.71,65.47z"/>
            	<path class="st0" d="M15.89,64.06l-0.75-0.63l2.09-2.48l0.75,0.63L15.89,64.06z"/>
            	<path class="st0" d="M11.83,62.46l-0.67-0.71l3.5-3.29l0.67,0.71L11.83,62.46z"/>
            	<path class="st0" d="M10.4,58.39L9.82,57.6l2.6-1.93L13,56.46L10.4,58.39z"/>
            	<path class="st0" d="M9.13,54.55L8.64,53.7l1.84-1.06l0.49,0.85L9.13,54.55z"/>
            	<path class="st0" d="M6.34,51.59l-0.39-0.9l2.97-1.29l0.39,0.9L6.34,51.59z"/>
            	<path class="st0" d="M3.43,48.36l-0.28-0.94l4.61-1.39l0.28,0.94L3.43,48.36z"/>
            	<path class="st0" d="M3.96,44.07l-0.17-0.96l3.19-0.57l0.17,0.96L3.96,44.07z"/>
            	<path class="st0" d="M4.54,40.06l-0.06-0.98l2.12-0.13l0.06,0.98L4.54,40.06z"/>
            	<path class="st0" d="M3.37,36.17l0.06-0.98l3.23,0.18L6.6,36.35L3.37,36.17z"/>
            	<path class="st0" d="M2.21,32.04l0.15-0.97l4.75,0.75l-0.15,0.97L2.21,32.04z"/>
            	<path class="st0" d="M4.61,28.37l0.28-0.94L8,28.34l-0.28,0.94L4.61,28.37z"/>
            	<path class="st0" d="M6.91,25.05l0.38-0.9l1.96,0.83l-0.38,0.9L6.91,25.05z"/>
            	<path class="st0" d="M7.61,21.03l0.49-0.85l2.81,1.61l-0.49,0.85L7.61,21.03z"/>
            	<path class="st0" d="M8.45,16.75l0.58-0.79l3.87,2.85l-0.58,0.79L8.45,16.75z"/>
            	<path class="st0" d="M12.2,14.61l0.67-0.71l2.37,2.21l-0.67,0.71L12.2,14.61z"/>
            	<path class="st0" d="M15.76,12.67l0.75-0.63l1.38,1.62l-0.75,0.63L15.76,12.67z"/>
            	<path class="st0" d="M18.16,9.4l0.81-0.54l1.8,2.69l-0.81,0.54L18.16,9.4z"/>
            	<path class="st0" d="M20.82,5.96l0.87-0.45l2.19,4.28l-0.87,0.45L20.82,5.96z"/>
            	<path class="st0" d="M25.13,5.7l0.92-0.34l1.13,3.03l-0.92,0.34L25.13,5.7z"/>
            	<path class="st0" d="M29.17,5.55l0.95-0.23l0.51,2.07l-0.95,0.23L29.17,5.55z"/>
            	<path class="st0" d="M32.77,3.7l0.97-0.12l0.41,3.21l-0.97,0.12L32.77,3.7z"/>
            	<path class="st0" d="M36.72,1.8h0.98l0.04,4.81l-0.98,0.01L36.72,1.8z"/>
            	<path class="st0" d="M40.7,3.52l0.97,0.1l-0.35,3.22l-0.97-0.1L40.7,3.52z"/>
            	<path class="st0" d="M44.36,5.19l0.95,0.21l-0.47,2.08L43.9,7.27L44.36,5.19z"/>
            	<path class="st0" d="M48.44,5.15l0.92,0.32l-1.07,3.06L47.37,8.2L48.44,5.15z"/>
            	<path class="st0" d="M52.78,5.19l0.88,0.43l-2.1,4.33l-0.88-0.43L52.78,5.19z"/>
            	<path class="st0" d="M55.59,8.5l0.82,0.53l-1.75,2.73l-0.82-0.53L55.59,8.5z"/>
            	<path class="st0" d="M58.11,11.63l0.76,0.62l-1.35,1.65l-0.76-0.62L58.11,11.63z"/>
            	<path class="st0" d="M61.77,13.42l0.68,0.7l-2.33,2.25l-0.68-0.7L61.77,13.42z"/>
            	<path class="st0" d="M65.64,15.41l0.59,0.78l-3.82,2.93l-0.6-0.78L65.64,15.41z"/>
            	<path class="st0" d="M66.68,19.65l0.5,0.84l-2.78,1.66l-0.5-0.84L66.68,19.65z"/>
            	<path class="st0" d="M67.55,23.58l0.4,0.89l-1.94,0.87l-0.4-0.89L67.55,23.58z"/>
            	<path class="st0" d="M70.02,26.79l0.29,0.93l-3.08,0.98l-0.29-0.93L70.02,26.79z"/>
            	<path class="st0" d="M72.6,30.33l0.18,0.96l-4.72,0.91l-0.19-0.96L72.6,30.33z"/>
            	<path class="st0" d="M71.63,34.53l0.07,0.98l-3.23,0.24l-0.07-0.98L71.63,34.53z"/>
            	<path class="st0" d="M70.62,39.06l-0.06,0.98l-2.12-0.13l0.06-0.98L70.62,39.06z"/>
            	<circle class="st0" cx="37.5" cy="37.5" r="27.5"/>
            </g>
            <g>
            	<path class="st1" d="M30.47,44.89l0-14.88c0-0.63,0.51-1.14,1.14-1.14l2.71,0c0.63,0,1.14,0.51,1.14,1.14l0,14.88
            		c0,0.63-0.51,1.14-1.14,1.14l-2.71,0C30.98,46.03,30.47,45.52,30.47,44.89z"/>
            	<path class="st1" d="M30.47,44.89l0-14.88c0-0.63,0.51-1.14,1.14-1.14l2.71,0c0.63,0,1.14,0.51,1.14,1.14l0,14.88
            		c0,0.63-0.51,1.14-1.14,1.14l-2.71,0C30.98,46.03,30.47,45.52,30.47,44.89z"/>
            </g>
            <g>
            	<path class="st1" d="M39.86,44.89l0-14.88c0-0.63,0.51-1.14,1.14-1.14l2.71,0c0.63,0,1.14,0.51,1.14,1.14l0,14.88
            		c0,0.63-0.51,1.14-1.14,1.14l-2.71,0C40.37,46.03,39.86,45.52,39.86,44.89z"/>
            	<path class="st1" d="M39.86,44.89l0-14.88c0-0.63,0.51-1.14,1.14-1.14l2.71,0c0.63,0,1.14,0.51,1.14,1.14l0,14.88
            		c0,0.63-0.51,1.14-1.14,1.14l-2.71,0C40.37,46.03,39.86,45.52,39.86,44.89z"/>
            </g>
            </svg>

          </div>
          <div class="title-player-holder">
            <div class="audio-title"><p><?php echo $audioSettings['headline']; ?></p></div>
            <div class="audio-player">
              <audio id="arizon-focus-player1" controls>
                <source src="<?php echo $audioSettings['audio-file']; ?>" type="audio/mp3" />
              </audio>
            </div>
          </div>
        </div>
        <?php } ?>

      </div>
      <div class="large-6 medium-12 small-12 cell background-img" <?php echo 'style="background:url('.get_sub_field('photo').')"';?>>
        <?php echo get_sub_field('code-block'); ?>
        <?php if (get_sub_field('credits') != '') { ?>
        <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
        <?php } ?>
      </div>
    </div>
  </div>
  <?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>

<?php
        } elseif (get_row_layout() == 'fullscreen-video') {
            ?>
<div id="fullscreen-video" class="grid-container full <?php echo get_sub_field('custom-class'); ?>">
  <div class="grid-x grid-padding-x">

    <?php
                  if (get_sub_field('activate-mobile') == 'yes') {
                      $mobileVideoLargeClass = 'show-for-medium';
                      $mobileVideoSmallClass = 'show-for-small-only';
                  } else {
                      $mobileVideoLargeClass = '';
                      $mobileVideoSmallClass = 'hide-for-small-only';
                  }
            ?>

    <!-- video on medium and large screen -->
    <div class="large-12 medium-12 small-12 cell video-holder text-center <?php echo $mobileVideoLargeClass; ?>">
      <div class="large-12 medium-12 small-12 cell intro-text absolute text-center">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 class="absolute-text"><?php echo strip_tags(get_sub_field('headline'), '<em><span>'); ?>
            <?php if (get_sub_field('intro_summary') != '') { ?>
            <p><?php echo strip_tags(get_sub_field('intro_summary'), '<em><span>'); ?></p>
            <?php } ?>
          </h1>
        <?php } ?>
        <?php //echo get_sub_field('intro_summary');?>
      </div>
      <video autoplay muted playsinline crossorigin loop>
        <source src="<?php echo get_sub_field('video-url'); ?>" type="video/mp4" />
      </video>
    </div>

    <!-- video on medium and large screen -->
    <div class="large-12 medium-12 small-12 cell video-holder text-center <?php echo $mobileVideoSmallClass; ?>">
      <div class="large-12 medium-12 small-12 cell intro-text text-center">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1><?php echo strip_tags(get_sub_field('headline'), '<em><span>'); ?>
            <?php if (get_sub_field('intro_summary') != '') { ?>
            <p><?php echo strip_tags(get_sub_field('intro_summary'), '<em><span>'); ?></p>
            <?php } ?>
          </h1>
        <?php } ?>
        <?php //echo get_sub_field('intro_summary');?>
      </div>
      <video autoplay muted playsinline crossorigin loop>
        <source src="<?php echo get_sub_field('video-url'); ?>" type="video/mp4" />
      </video>
    </div>

    <div class="large-12 medium-12 small-12 cell text-center">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>

<?php
        } elseif (get_row_layout() == 'intro-animated-bg') {
            $bgSettings = get_sub_field('background');
            if ($bgSettings != '') {
                $styleSettings = 'style="background-image:url('.$bgSettings['image'].');"';
            } else {
                $styleSettings = '';
            }
            ?>
<div id="intro-animated-bg" class="grid-container full" <?php //echo $styleSettings;?>>
  <div class="bg"></div>
  <div class="grid-x grid-margin-x headline">
    <div class="large-12 medium-12 small-12 cell text-center">
      <?php if (get_sub_field('headline') == '') { ?>
        <h1><?php echo get_the_title(); ?></h1>
      <?php } else { ?>
        <h1><?php echo get_sub_field('headline'); ?></h1>
      <?php } ?>
    </div>
  </div>
  <div class="grid-x grid-margin-x owl-mosiac">
    <div class="large-12 medium-12 small-12 cell text-center">
      <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
    </div>
  </div>
</div>
<div class="grid-container full intro-caption">
  <div class="grid-x grid-margin-x">
    <div class="large-12 medium-12 small-12 cell text-right <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>


<?php
        } elseif (get_row_layout() == 'intro-head-photo-overlay') {
            ?>
<div id="intro-head-photo-overlay" class="grid-container full">
  <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-small-only">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>
  </div>
  <div class="grid-x grid-padding-x">
    <?php
            // check photo and select credit width
            /*[$width, $height, $type, $attr] = getimagesize(get_sub_field('photo'));
            if ($width == 1200) {
                $introPhotoWidth = 'photo-credit-width-1200';
            } else {
                $introPhotoWidth = 'photo-credit-width-1800';
            }*/

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            }
            ?>

    <div class="large-12 medium-12 small-12 cell text-center main-photo <?php echo $photoStyle; ?>">
      <?php if (get_sub_field('filter') != 'no') { ?>
        <div class="filter overlay-color"></div>
      <?php } ?>
      <div class="large-12 medium-12 small-12 cell intro-text absolute text-center show-for-medium">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
          <?php if (get_sub_field('intro_summary') != '') {
              echo get_sub_field('intro_summary');
          } ?>
        <?php } ?>
      </div>
      <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>


<?php
        } elseif (get_row_layout() == 'intro-photo-story-headline') {
            ?>
<div id="intro-photo-gallery-overlay" class="grid-container full">
  <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-small-only">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>
  </div>
  <div class="grid-x grid-padding-x">
    <?php
            // check photo and select credit width
            /*[$width, $height, $type, $attr] = getimagesize(get_sub_field('photo'));
            if ($width == 1200) {
                $introPhotoWidth = 'photo-credit-width-1200';
            } else {
                $introPhotoWidth = 'photo-credit-width-1800';
            }*/

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            }

            $photoURL = get_sub_field('photo');
            $credits = get_sub_field('credits');
            ?>

    <div class="large-12 medium-12 small-12 cell main-photo <?php echo $photoStyle; ?>">
      <div class=" intro-text absolute show-for-medium">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
        <?php } ?>
        <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <img src="<?php echo $photoURL; ?>" alt="<?php echo strip_tags($credits); ?>" title="<?php echo strip_tags($credits); ?>" />
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo $credits; ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, 'author-open'); ?>

<?php
        } elseif (get_row_layout() == 'intro-head-photo') {
            $intro = get_sub_field('intro_summary');
            ?>
<div id="intro-head-photo" class="grid-container full">
  <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-small-only">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>
  </div>
  <div class="grid-x grid-padding-x">
    <?php
        // check photo and select credit width
        list($width, $height, $type, $attr) = getimagesize(get_sub_field('photo'));
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

    <div class="large-12 medium-12 small-12 cell text-center main-photo <?php echo $photoStyle; ?>">
      <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-medium">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
        <?php } ?>
        <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>


<?php
        } elseif (get_row_layout() == 'intro-image-head-photo') {
            $intro = get_sub_field('intro_summary');
            ?>
<div id="intro-head-photo" class="grid-container full">
  <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-small-only">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1 style="display:none;" class="absolute-text"><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1 style="display:none;" class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>

    <?php if (get_sub_field('image_headline') != '') { ?>
      <img src="<?php echo get_sub_field('image_headline'); ?>" title="<?php echo get_sub_field('headline'); ?>" alt="<?php echo get_sub_field('headline'); ?>" />
    <?php } ?>
  </div>
  <div class="grid-x grid-padding-x">
    <?php
            // check photo and select credit width
            /*[$width, $height, $type, $attr] = getimagesize(get_sub_field('photo'));
            if ($width == 1200) {
                $introPhotoWidth = 'photo-credit-width-1200';
            } else {
                $introPhotoWidth = 'photo-credit-width-1800';
            }*/

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            }
            ?>

    <div class="large-12 medium-12 small-12 cell text-center main-photo <?php echo $photoStyle; ?>">
      <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-medium">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 style="display:none;" class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 style="display:none;" class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
        <?php } ?>

        <?php if (get_sub_field('image_headline') != '') { ?>
          <img src="<?php echo get_sub_field('image_headline'); ?>" title="<?php echo get_sub_field('headline'); ?>" alt="<?php echo get_sub_field('headline'); ?>" />
        <?php } ?>

        <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <img src="<?php echo get_sub_field('photo'); ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>
<?php
  } elseif (get_row_layout() == 'intro-head-slider') {
    $intro = get_sub_field('intro_summary');
?>
<div id="intro-head-slider" class="grid-container">
  <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-small-only">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>
  </div>
  <div class="grid-x grid-padding-x">
    <?php
      // check photo style
      if (get_sub_field('photo_size') == 'photo-style-e2e') {
          $photoStyle = get_sub_field('photo_size');
      } else {
          $photoStyle = get_sub_field('photo_size');
      }
    ?>
    <div class="large-12 medium-12 small-12 cell text-center main-photo <?php echo $photoStyle; ?>">
      <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-medium">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
        <?php } ?>
        <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <?php $sliderPhotos = get_sub_field('photo', get_the_ID()); ?>
      <?php if ($sliderPhotos) { ?>
        <div class="intro-slider">
        <?php foreach ($sliderPhotos as $photoID) { ?>
          <div>
            <?php echo wp_get_attachment_image($photoID, 'full'); ?>
            <div class="asset-caption">
              <p><?php echo wp_get_attachment_caption($photoID); ?></p>
            </div>
          </div>
        <?php } ?>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>


<?php
        } elseif (get_row_layout() == 'intro-code-only') {
            $intro = get_sub_field('intro_summary');
            $sectionClass = get_sub_field('class');
            ?>
<div class="grid-container full <?php echo $sectionClass; ?>">
  <div class="large-12 medium-12 small-12 cell intro-text text-center">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>

    <?php
                  if (get_sub_field('code') != '') {
                      echo get_sub_field('code');
                  }
            ?>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>


<?php
        } elseif (get_row_layout() == 'intro-head-video') {
            $intro = get_sub_field('intro_summary');
            ?>
<div id="intro-head-photo" class="grid-container">
  <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-small-only">
    <?php if (get_sub_field('headline') == '') { ?>
      <h1><?php echo get_the_title(); ?></h1>
    <?php } else { ?>
      <h1><?php echo get_sub_field('headline'); ?></h1>
    <?php } ?>
  </div>
  <div class="grid-x grid-padding-x">
    <div class="large-12 medium-12 small-12 cell text-center main-photo">
      <div class="large-12 medium-12 small-12 cell intro-text text-center show-for-medium">
        <?php if (get_sub_field('headline') == '') { ?>
          <h1 class="absolute-text"><?php echo get_the_title(); ?></h1>
        <?php } else { ?>
          <h1 class="absolute-text"><?php echo get_sub_field('headline'); ?></h1>
        <?php } ?>
        <?php echo get_sub_field('intro_summary'); ?>
      </div>
      <?php
                    if (get_sub_field('video') != '') {
                        echo get_sub_field('video');
                    }
            ?>
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>

<?php
        } elseif (get_row_layout() == 'intro-fadeout-protrait-images') {
            $intro = get_sub_field('intro_summary');
            ?>

<div id="intro-head-photo" class="grid-container full">
  <div class="grid-x grid-padding-x">
    <?php
            // check photo and select credit width
            /*list[$width, $height, $type, $attr] = getimagesize(get_sub_field('photo'));
            if ($width == 1200) {
                $introPhotoWidth = 'photo-credit-width-1200';
            } else {
                $introPhotoWidth = 'photo-credit-width-1800';
            }*/

            // check photo style
            if (get_sub_field('photo_size') == 'photo-style-e2e') {
                $photoStyle = get_sub_field('photo_size');
            } else {
                $photoStyle = get_sub_field('photo_size');
            }
            ?>

    <div class="large-12 medium-12 small-12 cell text-center <?php echo $photoStyle; ?>">
      <?php if (have_rows('photos')) { ?>
        <?php $counter = 0; ?>
        <?php while (have_rows('photos')) {
            the_row(); ?>
          <img src="<?php echo get_sub_field('photo'); ?>" class="img-<?php echo $counter++; ?>" alt="<?php echo strip_tags(get_sub_field('credits')); ?>" title="<?php echo strip_tags(get_sub_field('credits')); ?>" />
        <?php } ?>
      <?php } ?>
    </div>
    <div class="large-12 medium-12 small-12 cell text-center <?php echo $introPhotoWidth; ?>">
      <span class="photo-credit"><?php echo get_sub_field('credits'); ?></span>
    </div>

    <div class="large-12 medium-12 small-12 cell intro-text text-center">
      <?php if (get_sub_field('headline') == '') { ?>
        <h1><?php echo get_the_title(); ?></h1>
      <?php } else { ?>
        <h1><?php echo get_sub_field('headline'); ?></h1>
      <?php } ?>
      <?php echo get_sub_field('intro_summary'); ?>
    </div>
  </div>
</div>
<?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>

<?php
        } elseif (get_row_layout() == 'series-intro') {
            ?>

  <div class="grid-container text-content series-intro">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <?php echo get_sub_field('content');	?>
      </div>
    </div>
  </div>

<?php
        } elseif (get_row_layout() == 'pull_quote') {
            ?>

  <div class="grid-container pullquote">
    <div class="grid-x grid-margin-x">
      <div class="large-12 cell">
        <div class="quote"><?php echo get_sub_field('quote'); ?></div>
        <div class="credentials"><p>– <span><?php echo get_sub_field('name'); ?></span><?php if (get_sub_field('credentials') != '') { ?>, <span><?php echo get_sub_field('credentials'); ?></span><?php } ?></p></div>
      </div>
    </div>
  </div>

<?php
        } elseif (get_row_layout() == 'text-block') {

            $textBlockSettings = get_sub_field('settings');
            if ($textBlockSettings['regular'] == 'size') {
                $textWidth = '';
            } else {
                $textWidth = 'full';
            }
            ?>

  <div class="grid-container text-content <?php echo $textWidth; ?>">
    <div class="grid-x grid-padding-x">
      <div class="large-12 cell">
        <?php echo get_sub_field('content');	?>
      </div>
    </div>
  </div>

<?php
        } elseif (get_row_layout() == 'video-embed') {

            $settings = get_sub_field('video-content-settings');
            if ($settings['width'] == 'large-width') {
                $videoWidth = 'large-video';
                $color = '#656159';
            } else {
                $videoWidth = '';
                $color = '';
            }
            ?>
<?php if ($color != '') { ?>
  <div class="large-video-bg-color" style="background: <?php echo $color; ?>">
<?php } ?>
  <div class="grid-container video-content <?php echo $videoWidth; ?>">
    <div class="grid-x grid-padding-x">
      <?php
                    if ($settings['video-player'] == 'regular-embed' || $settings['video-player'] == '') {
                        ?>

      <?php
                    } else {
                        ?>
      <div class="large-12 cell">
        <h4 class="text-center"><?php echo get_sub_field('video-title'); ?></h4>
      </div>
      <?php } ?>

      <div class="large-12 cell">
        <?php
                            if ($settings['video-player'] == 'regular-embed' || $settings['video-player'] == '') {
                                echo get_sub_field('embed');
                            } else {
                                ?>
        <div class="movie-poster-overlay">
          <div class="play-btn"><i class="fas fa-play-circle"></i></div>
          <video autoplay muted playsinline crossorigin loop>
            <source src="<?php echo get_sub_field('poster-image-video'); ?>" type="video/mp4" />
          </video>
        </div>

        <?php
                                    echo '<div class="plyr__video-embed responsive-embed widescreen" id="player">';
                                //echo '<iframe width="800" height="500" src="'.$vidlink.'?rel=0" frameborder="0" gesture="media" allowfullscreen></iframe>';
                                echo '<iframe
                src="'.get_sub_field('embed').'?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                allowfullscreen
                allowtransparency
                allow="autoplay"
            ></iframe>';
                                echo '</div>';
                            }

            ?>

      </div>
      <?php
            if ($settings['video-player'] != 'regular-embed' || $settings['video-player'] != '') {
                ?>
        <div class="large-12 cell">
          <?php echo '<div class="wp-caption-text"><p>'.strip_tags(get_sub_field('caption'), '<a>').'</p></div>'; ?>
        </div>
      <?php
            }
            ?>
    </div>
  </div>
<?php if ($color != '') { ?>
  </div>
<?php } ?>

<?php
        } elseif (get_row_layout() == 'single-photo-block') {

            $settings = get_sub_field('single-photo-settings');
            if ($settings['width'] == 'large-width') {
                $photoWidth = 'large-photo';
            } else {
                $photoWidth = '';
            }

            if ($settings['no_shadow'] == 'yes') {
                $removeShadow = 'class="no-shadow"';
            } else {
                $removeShadow = '';
            }
            ?>

    <div class="grid-container photo-content single <?php echo $photoWidth; ?>">
      <div class="grid-x grid-padding-x">

        <?php
                            $captionCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row();
                    ?>
  						<div class="large-12 medium-12 small-12 cell text-center">
  						    <img src="<?php echo get_sub_field('photo'); ?>" <?php echo $removeShadow; ?>  />
  			<?php
                                    if (get_sub_field('caption') != '') {
                                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                            $combinedCaption = '<strong>Left:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Center:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Right:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        }
                                        $captionCounter++;
                                    }
                    ?>
  						</div>
  			<?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                }
                ?>
        <div class="large-12 cell">
          <?php echo '<div class="wp-caption-text"><p>'.$combinedCaption.'</p></div>'; ?>
        </div>
        <?php } ?>
      </div>
    </div>


<?php
        } elseif (get_row_layout() == 'single-photo-block-full-width') {

            $settings = get_sub_field('single-photo-full-width-settings');
            if ($settings['width'] == 'large-width') {
                $photoWidth = 'large-photo';
            } else {
                $photoWidth = '';
            }

            if ($settings['no_shadow'] == 'yes') {
                $removeShadow = 'class="no-shadow"';
            } else {
                $removeShadow = '';
            }
            ?>

    <div class="grid-container photo-content full single <?php echo $photoWidth; ?>">
      <div class="grid-x grid-padding-x">

        <?php
                            $captionCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row();
                    ?>
  						<div class="large-12 medium-12 small-12 cell text-center">
  						    <img src="<?php echo get_sub_field('photo'); ?>" <?php echo $removeShadow; ?>  />
  			<?php
                                    if (get_sub_field('caption') != '') {
                                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                            $combinedCaption = '<strong>Left:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Center:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Right:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        }
                                        $captionCounter++;
                                    }
                    ?>
  						</div>
  			<?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                }
                ?>
        <div class="large-12 cell">
          <?php echo '<div class="wp-caption-text"><p>'.$combinedCaption.'</p></div>'; ?>
        </div>
        <?php } ?>
      </div>
    </div>


<?php
  } elseif (get_row_layout() == 'single-photo-block-pinned-full-width') {

      $settings = get_sub_field('single-photo-full-width-settings');
      if ($settings['width'] == 'large-width') {
          $photoWidth = 'large-photo';
      } else {
          $photoWidth = '';
      }

      if ($settings['no_shadow'] == 'yes') {
          $removeShadow = 'class="no-shadow"';
      } else {
          $removeShadow = '';
      }

      if ($settings['block_id'] != '') {
          $blockID = $settings['block_id'];
      } else {
          $blockID = '';
      }
?>
        <div class="grid-container photo-content full single <?php echo $photoWidth; ?> <?php echo $blockID; ?>">
          <div class="grid-x grid-padding-x">
            <?php
                $captionCounter = 0;
                if (have_rows('photos')) {
                    while (have_rows('photos')) {
                        the_row();
            ?>
      						<div class="large-12 medium-12 small-12 cell text-center">
      						    <img src="<?php echo get_sub_field('photo'); ?>" <?php echo $removeShadow; ?>  />
                      <?php if (get_sub_field('caption') != '') { ?>
                        <div class="pinned-overlay-text">
                          <?php echo '<p>'.get_sub_field('caption').'</p>'; ?>
                        </div>
                      <?php } ?>
      						</div>
      			<?php } ?>
            <?php } ?>
          </div>
        </div>


<?php
        } elseif (get_row_layout() == 'photo-slideshow') {

            $settings = get_sub_field('slideshow-settings');
            if ($settings['width'] == 'large-width') {
                $photoWidth = 'large-photo';
            } else {
                $photoWidth = '';
            }
            ?>

    <div class="grid-container photo-content single <?php echo $photoWidth; ?>">
      <div class="grid-x grid-padding-x">
        <div class="large-12 medium-12 small-12 cell">
        <?php
                            $captionCounter = 0;
            if (have_rows('photos')) {
                ?>
          <div id="story-slideshow" class="story-slideshow">
        <?php
                                while (have_rows('photos')) {
                                    the_row();
                                    ?>
                <div>
                  <img src="<?php echo get_sub_field('photo'); ?>" />
                  <div class="wp-caption-text"><?php echo get_sub_field('caption'); ?></div>
                </div>
  			<?php } ?>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>


<?php
        } elseif (get_row_layout() == 'fullscreen-slideshow') {
            ?>

        <div class="grid-container fullscreen-photo-content">
          <div class="grid-x grid-padding-x">
            <div class="large-12 medium-12 small-12 cell">
            <?php
                                  $captionCounter = 0;
            if (have_rows('photos')) {
                ?>
              <div class="fullscreen-slideshow">
                <?php while (have_rows('photos')) {
                    the_row(); ?>
                <div>
                  <img src="<?php echo get_sub_field('photo'); ?>" />
                </div>
      			    <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>


<?php
        } elseif (get_row_layout() == 'table-photo-content') {

            $settings = get_sub_field('photo-content-sxs-settings');
            if ($settings['order'] == 'photo-left') {
                $position = 'photo-left';
            } else {
                $position = 'photo-right';
            }
            ?>

    <div class="grid-container sidexside-content">
      <div class="grid-x grid-padding-x align-middle">
        <?php if ($settings['order'] == 'photo-left') { ?>
          <div class="large-6 small-12 cell text-center">
            <img src="<?php echo get_sub_field('photo');	?>" />
          </div>
          <div class="large-6 small-12 cell align-self-stretch content-bg">
            <?php echo get_sub_field('content');	?>
          </div>
        <?php } else { ?>
          <div class="large-6 small-12 cell align-self-stretch content-bg">
            <?php echo get_sub_field('content');	?>
          </div>
          <div class="large-6 small-12 cell text-center">
            <img src="<?php echo get_sub_field('photo');	?>" />
          </div>
        <?php } ?>
      </div>
    </div>



<?php
        } elseif (get_row_layout() == 'photo-text-sxs') {

            $settings = get_sub_field('photo-text-sxs-settings');
            if ($settings['photo-position'] == 'photo-left') {
                $position = 'photo-left';
            } else {
                $position = 'photo-right';
            }
            ?>

    <div class="grid-container photo-gallery-content-sxs full">
      <div class="grid-x grid-padding-x align-middle">
        <?php if ($settings['photo-position'] == 'photo-left') { ?>
          <div class="large-10 small-12 cell text-center">
            <img src="<?php echo get_sub_field('photo');	?>" />
          </div>
          <div class="large-2 small-12 cell align-self-stretch">
            <?php echo get_sub_field('content');	?>
          </div>
        <?php } else { ?>
          <div class="large-2 small-12 cell align-self-stretch">
            <?php echo get_sub_field('content');	?>
          </div>
          <div class="large-10 small-12 cell text-center">
            <img src="<?php echo get_sub_field('photo');	?>" />
          </div>
        <?php } ?>
      </div>
    </div>



<?php
        } elseif (get_row_layout() == 'data-viz-2up-content') {
            ?>

    <div class="grid-container" style="padding:25px 0;">
      <div class="grid-x grid-padding-x align-middle">

          <div class="large-6 small-12 cell text-center">
            <?php echo get_sub_field('data-viz-left');	?>
          </div>
          <div class="large-6 small-12 cell text-center">
            <?php echo get_sub_field('data-viz-right');	?>
          </div>

      </div>
    </div>

<?php
        } elseif (get_row_layout() == 'pure-code-block') {
            ?>

    <div class="grid-container full show-for-medium">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <?php echo get_sub_field('code');	?>
        </div>
      </div>
    </div>

    <div class="grid-container full show-for-small-only">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <?php echo get_sub_field('mobile_code');	?>
        </div>
      </div>
    </div>

    <?php if (is_single(166978)) { ?>
    <?php generateByline(get_the_ID(), $intro, $publishDate, ''); ?>
    <?php } ?>
<?php
        } elseif (get_row_layout() == 'charts-doc') {

            if (get_sub_field('chart-width') == 'full-width') {
                $fullWidth = 'full';
            } else {
                $fullWidth = '';
            }

            if (get_sub_field('embed-code-mobile') != '') {
                $visibilityMobile = 'show-for-small-only';
                $visibilityDesktop = 'show-for-medium';
            } else {
                $visibilityMobile = '';
                $visibilityDesktop = '';
            }
            ?>

    <div class="grid-container text-content charts-doc <?php echo $fullWidth; ?> desktop <?php echo $visibilityDesktop; ?>">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <?php echo get_sub_field('embed-code');	?>
        </div>

        <?php if (get_sub_field('credits') != '') { ?>
        <div class="large-12 cell credits">
          <?php echo '<div class="wp-caption-text">'.get_sub_field('credits').'</div>'; ?>
        </div>
        <?php } ?>
      </div>
    </div>

    <?php if (get_sub_field('embed-code-mobile') != '') { ?>
    <div class="grid-container text-content charts-doc <?php echo $fullWidth; ?> <?php echo $visibilityMobile; ?>">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <?php echo get_sub_field('embed-code-mobile');	?>
        </div>

        <?php if (get_sub_field('credits') != '') { ?>
        <div class="large-12 cell credits">
          <?php echo '<div class="wp-caption-text">'.get_sub_field('credits').'</div>'; ?>
        </div>
        <?php } ?>
      </div>
    </div>
    <?php } ?>

<?php
        } elseif (get_row_layout() == '2up-photos-block') {

            $settings = get_sub_field('2up-settings');

            if ($settings['no_shadow'] == 'yes') {
                $removeShadow = 'class="no-shadow"';
            } else {
                $removeShadow = '';
            }

            ?>

    <div class="grid-container photo-content">
      <div class="grid-x grid-padding-x">

        <?php
                            $captionCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row();
                    ?>
  						<div class="large-6 medium-6 small-12 cell">
  						        <img src="<?php echo get_sub_field('photo'); ?>" <?php echo $removeShadow; ?>  />
  			<?php
                                    if (get_sub_field('caption') != '') {
                                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                            $combinedCaption = '<strong>Left:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Right:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                        }
                                        $captionCounter++;
                                    }
                    ?>
  						</div>
              <?php if (get_sub_field('caption') != '') { ?>
              <div class="large-12 cell show-for-small-only">
                <?php echo '<div class="wp-caption-text">'.get_sub_field('caption').'</div>'; ?>
              </div>
              <?php } ?>
  			<?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                }
                ?>
        <div class="large-12 cell show-for-medium">
          <?php echo '<div class="wp-caption-text"><p>'.$combinedCaption.'</p></div>'; ?>
        </div>
        <?php } ?>
      </div>
    </div>

<?php
        } elseif (get_row_layout() == '3up-photos-block') {

            $settings = get_sub_field('3up-settings');
            if ($settings['full-width-no-padding'] == 'yes') {
                $fullWidth = 'full';
            } else {
                $fullWidth = '';
            }

            if ($settings['no_shadows'] == 'no') {
                $removeShadow = 'class="no-shadow"';
            } else {
                $removeShadow = '';
            }
            ?>

  <div class="grid-container photo-content <?php echo $fullWidth; ?>">
    <div class="grid-x grid-padding-x">

      <?php
                            $captionCounter = 0;
            $photoCounter = 0;
            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row();
                    $photoCounter++;
                }
            }

            if (have_rows('photos')) {
                while (have_rows('photos')) {
                    the_row();
                    if ($photoCounter >= 4) {
                        ?>
						<div class="large-3 medium-3 small-12 cell">
      <?php
                    } else {
                        ?>
						<div class="large-4 medium-4 small-12 cell">
      <?php
                    }
                    ?>
						        <img src="<?php echo get_sub_field('photo'); ?>" <?php echo $removeShadow; ?>  />
			<?php
                          if ($photoCounter >= 4) {
                              if (get_sub_field('caption') != '') {
                                  if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                      $combinedCaption = '<strong>From left:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                  } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                                      $combinedCaption .= strip_tags(get_sub_field('caption'), '<a><span>');
                                  } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                                      $combinedCaption .= strip_tags(get_sub_field('caption'), '<a><span>');
                                  } elseif ($captionCounter == 3 && get_sub_field('caption') != '') {
                                      $combinedCaption .= strip_tags(get_sub_field('caption'), '<a><span>');
                                  }
                                  $captionCounter++;
                              }
                          } else {
                              if (get_sub_field('caption') != '') {
                                  if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                      $combinedCaption = '<strong>Left:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                  } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                                      $combinedCaption .= ' <strong>Center:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                  } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                                      $combinedCaption .= ' <strong>Right:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                  } elseif ($captionCounter == 3 && get_sub_field('caption') != '') {
                                      $combinedCaption .= ' <strong>Right:</strong> '. strip_tags(get_sub_field('caption'), '<a><span>');
                                  }
                                  $captionCounter++;
                              }
                          }
                    ?>
						</div>
			<?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                }
                ?>
      <div class="large-12 cell">
        <?php echo '<div class="wp-caption-text"><p>'.$combinedCaption.'</p></div>'; ?>
      </div>
      <?php } ?>
    </div>
  </div>


<?php
        } elseif (get_row_layout() == 'content-above-photo-audio') {
            ?>

    <div id="profile-audio" class="grid-container">
      <div class="grid-x grid-padding-x">

        <div class="large-12 medium-12 small-12 cell">
          <?php echo get_sub_field('content');	?>
        </div>

        <?php
                            $audioCounter = 0;
            if (have_rows('photo-group')) {
                while (have_rows('photo-group')) {
                    the_row();
                    ?>
  						<div class="large-4 medium-4 small-12 cell">
                <div class="profiles">
    						  <img src="<?php echo get_sub_field('photo'); ?>"  />
                  <div class="audio"><a onclick="document.getElementById('audio-<?php echo $audioCounter; ?>').play()"><i class="fas fa-volume-down"></i></a></div>
                  <?php
                            echo '<audio id="audio-'.$audioCounter.'" src="'.get_sub_field('audio').'">Your browser does not support the <code>audio</code> element.</audio>';
                    ?>
                </div>
                <div class="profile-content">
                  <?php echo get_sub_field('content'); ?>
                </div>
  						</div>
  			<?php
            $audioCounter++;
                }
            }
            ?>
      </div>
    </div>


<?php
        } elseif (get_row_layout() == 'large-photo-2-verticals') {
            ?>

    <div class="grid-container large-photo-verticals">
      <div class="grid-x grid-padding-x align-middle">

        <div class="large-4 medium-4 small-12 cell">
          <?php echo get_sub_field('large-photo');	?>
        </div>

        <div class="large-4 medium-4 small-12 cell">
        <?php
                            $captionCounter = 0;
            if (have_rows('vertical-photos')) {
                while (have_rows('vertical-photos')) {
                    the_row();
                    ?>
              <div class="grid-x grid-padding-x">
                <div class="large-12 medium-12 small-6 cell">
  						        <img src="<?php echo get_sub_field('photo'); ?>"  />
  			<?php
                                    if (get_sub_field('caption') != '') {
                                        if ($captionCounter == 0 && get_sub_field('caption') != '') {
                                            $combinedCaption = '<strong>Left:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        } elseif ($captionCounter == 1 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Center:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        } elseif ($captionCounter == 2 && get_sub_field('caption') != '') {
                                            $combinedCaption .= ' <strong>Right:</strong> '. strip_tags(get_sub_field('caption'), '<a>');
                                        }
                                        $captionCounter++;
                                    }
                    ?>
  						</div>
  			<?php
                }

                if ($captionCounter == 1) {
                    $combinedCaption = str_replace('<strong>Left:</strong>', '', $combinedCaption);
                }
                ?>
          </div>
        </div>
        <div class="large-12 cell">
          <?php echo '<div class="wp-caption-text"><p>'.$combinedCaption.'</p></div>'; ?>
        </div>
        <?php } ?>
      </div>
    </div>

<?php
        }
    }
}
?>

<?php if (get_the_ID() == 144755) { ?>
  <div id="full-section-bg" class="grid-container full">
    <div class="grid-x grid-padding-x white-on-black">
      <div class="large-12 cell">
        <h3 style="color:#fff;">WE 22</h3>
      </div>
      <div class="large-12 medium-12 small-12 cell text-center" style="max-width:45rem;">
        <ul>
          <li>Jean Boyd</li>
          <li>Alonzo Jones</li>
          <li>Javonie Small</li>
          <li>Tyree Owens</li>
          <li>John Ellis</li>
          <li>Dr. Herb Martin</li>
          <li>Antonio Pierce</li>
          <li>Michael Elliott</li>
          <li>Chad Adams</li>
          <li>Marcus Castro-Walker</li>
          <li>Prentice Gill</li>
          <li>Derek Hagan</li>
          <li>Chris Hawkins</li>
          <li>Anthony Garnett</li>
          <li>Dion Miller</li>
          <li>Markus Alleyne</li>
          <li>Kevin Miniefield</li>
          <li>Courtney Skipper</li>
          <li>Rashon Burno</li>
          <li>Denzel Burrell</li>
          <li>Scottie Graham</li>
          <li class="last">Daniel Marshall</li>
        </ul>
      </div>
    </div>
  </div>
<?php } ?>

<?php
 // in this series settings
 $inthisseriesSettings = get_field('in-this-series-stories');
if ($inthisseriesSettings['show'] == 'yes') {
    if ($inthisseriesSettings['story-status'] == 'coming-soon') {
        if ($inthisseriesSettings['title'] != '') {
            $seriesTitle = ': '.$inthisseriesSettings['title'];
        } else {
            $seriesTitle;
        }
        ?>
  <!-- in this series -->
  <div class="grid-container text-content">
    <div class="grid-x grid-padding-x series-block">
      <div class="large-12 medium-12 small-12 cell">
        <h4>In this series<?php echo $seriesTitle; ?></h4>
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
  </div>
<?php
    } else {
        ?>
  <!-- in this series -->
  <div class="grid-container text-content">
  <div class="grid-x grid-padding-x series-block">
    <div class="large-12 medium-12 small-12 cell">
      <h4>In this series<?php echo $seriesTitle; ?></h4>
      <div class="in-this-series">
        <?php
                  $pubbedStoryList = $inthisseriesSettings['stories'];
        if ($pubbedStoryList != '') {
            foreach ($pubbedStoryList as $pubbedStory) {
                ?>
            <div>
              <a href="<?php echo get_permalink($upcomingStory['posted-link']); ?>"><?php echo get_the_post_thumbnail($pubbedStory, 'full', ['class' => 'img-responsive']); ?></a>
              <?php
                        if (get_field('use_short_headline', $upcomingStory['posted-link']) == 'yes' && get_field('homepage_headline', $upcomingStory['posted-link']) != '') {
                            ?>
                  <h5><?php echo get_field('homepage_headline', $upcomingStory['posted-link']); ?></h5>
              <?php
                        } else {
                            ?>
              <h5><a href="<?php echo get_permalink($upcomingStory['posted-link']); ?>"><?php echo get_the_title($upcomingStory['posted-link']); ?></a></h5>
              <?php } ?>
            </div>
        <?php
            }
        }
        ?>
      </div>
    </div>
  </div>
</div>
<?php
    }
}
?>

        <?php

          if (have_rows('byline_info')) {
              while (have_rows('byline_info')) {
                  the_row();
              }
          }

          if (have_rows('byline_info')) {
              ?>
        <div class="grid-container text-content author">
          <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
              <!-- author biography -->
        <?php
                  while (have_rows('byline_info')) {
                      the_row();

                      $staffID = get_sub_field('cn_staff');
                      $photogID = get_sub_field('cn_photographers');
                      $broadcastID = get_sub_field('cn_broadcast_reporters');
                      $dataVisualizerID = get_sub_field('cn_data_visualizer');

                      foreach ($staffID as $key => $val) {
                          echo '<div class="author_bio">';
                          $args = [
                                        'post_type'   => 'students',
                                        'post_status' => 'publish',
                                        'p' => $val,
                                       ];

                          $staffDetails = new WP_Query($args);
                          if ($staffDetails->have_posts()) {

                              while ($staffDetails->have_posts()) {
                                  $staffDetails->the_post();

                                  $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

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

                                  if (get_the_title($val) != '') {
                                      if ($staffNameURLSafe == 'staff') {
                                          echo '<p class="name">'.get_the_title($val).'</p>';
                                      } else {
                                          echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></p>';
                                      }
                                  } else {
                                      echo '<p class="name">'.'No author name found.'.'</p>';
                                  }

                                  if (get_field('student_title') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                  } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                  }

                                  if (get_field('biography') != '') {
                                      echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                  } else {

                                  }

                                  if (have_rows('social_media_outlets')) {
                                      echo '<div class="author_social_links">';
                                      while (have_rows('social_media_outlets')) {
                                          the_row();
                                          if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                              if (get_sub_field('social_media_type') == 'twitter') {
                                                  ?>
                             <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                     <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                             <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                     <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                             <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                     <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                             <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                   <?php
                     }
                                          }
                                      }
                                      echo '</div>';
                                  }
                                  echo '</div>';
                              }
                          }
                          echo '</div>';
                      }

                      // show broadcast
                      foreach ($broadcastID as $key => $val) {
                          echo '<div class="author_bio">';
                          $args = [
                                        'post_type'   => 'students',
                                        'post_status' => 'publish',
                                        'p' => $val,
                                       ];

                          $staffDetails = new WP_Query($args);
                          if ($staffDetails->have_posts()) {

                              while ($staffDetails->have_posts()) {
                                  $staffDetails->the_post();

                                  $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

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

                                  if (get_the_title($val) != '') {
                                      if ($staffNameURLSafe == 'staff') {
                                          echo '<p class="name">'.get_the_title($val).'</p>';
                                      } else {
                                          echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></p>';
                                      }
                                  } else {
                                      echo '<p class="name">'.'No author name found.'.'</p>';
                                  }

                                  if (get_field('student_title') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                  } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                  }

                                  if (get_field('biography') != '') {
                                      echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                  } else {

                                  }

                                  if (have_rows('social_media_outlets')) {
                                      echo '<div class="author_social_links">';
                                      while (have_rows('social_media_outlets')) {
                                          the_row();
                                          if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                              if (get_sub_field('social_media_type') == 'twitter') {
                                                  ?>
                              <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                      <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                              <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                      <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                              <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                      <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                              <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <?php
                      }
                                          }
                                      }
                                      echo '</div>';
                                  }
                                  echo '</div>';
                              }
                          }
                          echo '</div>';
                      }


                      // show photogs
                      foreach ($photogID as $key => $val) {
                          echo '<div class="author_bio">';
                          $args = [
                                        'post_type'   => 'students',
                                        'post_status' => 'publish',
                                        'p' => $val,
                                       ];

                          $staffDetails = new WP_Query($args);
                          if ($staffDetails->have_posts()) {

                              while ($staffDetails->have_posts()) {
                                  $staffDetails->the_post();

                                  $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

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

                                  if (get_the_title($val) != '') {
                                      echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></p>';
                                  } else {
                                      echo '<p class="name">'.'No author name found.'.'</p>';
                                  }

                                  if (get_field('student_title') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                  } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                  }

                                  if (get_field('biography') != '') {
                                      echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                  } else {

                                  }

                                  if (have_rows('social_media_outlets')) {
                                      echo '<div class="author_social_links">';
                                      while (have_rows('social_media_outlets')) {
                                          the_row();
                                          if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                              if (get_sub_field('social_media_type') == 'twitter') {
                                                  ?>
                              <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                      <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                              <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                      <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                              <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                      <?php } elseif (get_sub_field('social_media_type') == 'linkedin') { ?>
                              <a href="https://www.linkedin.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <?php
                      }
                                          }
                                      }
                                      echo '</div>';
                                  }
                                  echo '</div>';
                              }
                          }
                          echo '</div>';
                      }

                      // show data viz
                      foreach ($dataVisualizerID as $key => $val) {
                          echo '<div class="author_bio">';
                          $args = [
                                        'post_type'   => 'students',
                                        'post_status' => 'publish',
                                        'p' => $val,
                                       ];

                          $staffDetails = new WP_Query($args);
                          if ($staffDetails->have_posts()) {

                              while ($staffDetails->have_posts()) {
                                  $staffDetails->the_post();

                                  $staffNameURLSafe = str_replace("&#8217;", "", str_replace('.', '', str_replace(' ', '-', strtolower(get_the_title($val)))));

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

                                  if (get_the_title($val) != '') {
                                      echo '<p class="name"><a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/" target="_blank">'.get_the_title($val).'</a></p>';
                                  } else {
                                      echo '<p class="name">'.'No author name found.'.'</p>';
                                  }

                                  if (get_field('student_title') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('student_title'))).'</span>';
                                  } elseif (get_field('team') != '' || get_field('role') != '' || get_field('bureau') != '') {
                                      echo '<span class="team-title post">'.ucwords(str_replace('-', ' ', get_field('team'))).' '.ucwords(str_replace('-', ' ', get_field('role'))).', '.str_replace('Washington Dc', 'Washington, D.C.', ucwords(str_replace('-', ' ', get_field('bureau')))).'</span>';
                                  }

                                  if (get_field('biography') != '') {
                                      echo '<span class="member-bio post">'.get_field('biography').'</span>';
                                  } else {

                                  }

                                  if (have_rows('social_media_outlets')) {
                                      echo '<div class="author_social_links">';
                                      while (have_rows('social_media_outlets')) {
                                          the_row();
                                          if (get_sub_field('social_media_type') != '' && get_sub_field('social_media_handle') != '') {
                                              if (get_sub_field('social_media_type') == 'twitter') {
                                                  ?>
                               <a href="https://www.twitter.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                       <?php } elseif (get_sub_field('social_media_type') == 'email') { ?>
                               <a href="mailto:<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fas fa-envelope"></i></a>
                       <?php } elseif (get_sub_field('social_media_type') == 'instagram') { ?>
                               <a href="https://www.instagram.com/<?php echo get_sub_field('social_media_handle'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                     <?php
                       }
                                          }
                                      }
                                      echo '</div>';
                                  }
                                  echo '</div>';
                              }
                          }
                          echo '</div>';
                      }
                  }
              ?>
           </div>
         </div>
       </div>
       <?php
          }
          wp_reset_query();
?>

<?php get_footer('new2020-longform'); ?>
