<?php
/**
 * Template Name: Sustainability Custom Feed
 * Creation: June 20, 2022
 */

header('Content-Type: ' . feed_content_type('rss2') . '; charset=' . get_option('blog_charset'), true);
$more = 1;

$publishDate = ap_date();

function generateByline($currPostID, $currIntro, $publishDate)
{
    ?>

            <?php
              $externalSites = array('boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                     'colorado-public-radio' => "https://www.cpr.org/",
                                     'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                     'elemental-reports' => "https://www.elementalreports.com/",
                                     'globalsport-matters' => "https://www.globalsportmatters.com/",
                                     'howard-center-for-investigative-journalism' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                     'KJZZ' => "https://www.kjzz.org",
                                     'KPCC' => "https://www.scpr.org/",
                                     'KUNC' => "https://www.kunc.org/",
                                     'KUER' => "https://www.kunc.org/post/one-got-away-look-glen-canyon-40-years-after-it-was-filled#stream/0",
                                     'LAIST' => "https://laist.com/",
                                     'PBS-SoCal' => "https://www.pbssocal.org/",
                                     'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                     'special-to-cronkite-news' => ""
                                    );
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
        //echo '<!--HERE BYLINE NEW-->';
        echo '<span class="author_name">By ';
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

                        $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));
                        $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                        echo '<a href="https://cronkitenews.azpbs.org/people/'.$staffNameURLSafe.'/">'.get_the_title($val).'</a>';
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
                echo '/Cronkite News</span>';
            }
        }
        //wp_reset_query();

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
            <?php wp_reset_postdata(); ?>
    <?php
}


echo '<?xml version="1.0" encoding="' . get_option('blog_charset') . '"?' . '>';

/**
 * Fires between the xml and rss tags in a feed.
 *
 * @since 4.0.0
 *
 * @param string $context Type of feed. Possible values include 'rss2', 'rss2-comments',
 *                        'rdf', 'atom', and 'atom-comments'.
 */
do_action('rss_tag_pre', 'rss2');
?>
<rss version="2.0"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"
    xmlns:wfw="http://wellformedweb.org/CommentAPI/"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:atom="http://www.w3.org/2005/Atom"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
    <?php
    /**
     * Fires at the end of the RSS root to add namespaces.
     *
     * @since 2.0.0
     */
    do_action('rss2_ns');
?>
>

    <channel>
        <title><?php wp_title_rss(); ?></title>
        <atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
        <link><?php bloginfo_rss('url'); ?></link>
        <description><?php bloginfo_rss('description'); ?></description>
        <lastBuildDate><?php echo get_feed_build_date('r'); ?></lastBuildDate>
        <language><?php bloginfo_rss('language'); ?></language>
        <sy:updatePeriod>
        <?php
    $duration = 'hourly';

/**
 * Filters how often to update the RSS feed.
 *
 * @since 2.1.0
 *
 * @param string $duration The update period. Accepts 'hourly', 'daily', 'weekly', 'monthly',
 *                         'yearly'. Default 'hourly'.
 */
echo apply_filters('rss_update_period', $duration);
?>
        </sy:updatePeriod>
        <sy:updateFrequency>
        <?php
$frequency = '1';

/**
 * Filters the RSS update frequency.
 *
 * @since 2.1.0
 *
 * @param string $frequency An integer passed as a string representing the frequency
 *                          of RSS updates within the update period. Default '1'.
 */
echo apply_filters('rss_update_frequency', $frequency);
?>
        </sy:updateFrequency>
        <?php
  /**
   * Fires at the end of the RSS2 Feed Header.
   *
   * @since 2.0.0
   */
  do_action('rss2_head');

$args = array(
'post_type' => 'post',
'post_status' => 'publish',
'posts_per_page' => 10,
'cat' => 10
//'category__not_in' => array( 11 ),
);
$query = new WP_Query($args);
while ($query->have_posts()) {
    $query->the_post();
    ?>
            <item>
                <title><?php the_title_rss(); ?></title>
                <link><?php the_permalink_rss(); ?></link>

                <dc:creator><![CDATA[<?php the_author(); ?>]]></dc:creator>
                <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_post_time('Y-m-d H:i:s', true), false); ?></pubDate>
            <?php the_category_rss('rss2'); ?>
                <guid isPermaLink="false"><?php the_guid(); ?></guid>

                <description><![CDATA[<?php echo get_field('story_tease', get_the_ID()); ?>]]></description>

            <?php if (get_comments_number() || comments_open()) : ?>
                    <wfw:commentRss><?php echo esc_url(get_post_comments_feed_link(null, 'rss2')); ?></wfw:commentRss>
                    <slash:comments><?php echo get_comments_number(); ?></slash:comments>
            <?php endif; ?>

            <?php rss_enclosure(); ?>

            <?php
    /**
     * Fires at the end of each RSS2 feed item.
     *
     * @since 2.0.0
     */
    do_action('rss2_item');
    ?>
            </item>
            <?php
}
?>
    </channel>
</rss>
