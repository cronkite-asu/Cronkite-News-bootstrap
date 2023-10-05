<?php
/**
 * Template Name: Email  Feed
 * Updated: Mar 16, 2017 to support new home page
 */
// $ACCEPTHOST = 'cn2.niclindh.com';
$ACCEPTHOST = 'cronkitenews.azpbs.org';
//$ACCEPTHOST = 'cn.countzero.xyz';
$NEWSCASTURL = '//' . $ACCEPTHOST . '/sitenewscast';

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0"?><rss version="2.0">';
?>

<channel>
  <title>Cronkite News Service</title>
  <link>https://cronkitenews.azpbs.org/email-feed/</link>
  <description>Feed for consumption by MailChimp</description>
  <language>en-us</language>
  <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
  <lastBuildDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></lastBuildDate>
  <managingEditor>cronkitenews@asu.edu</managingEditor>

<?php
    // main story
    $home_main_story = get_field('main_story_settings', 24);
if ($home_main_story) {
    $counter = 0;
    foreach ($home_main_story as $main_story) {
        if ($counter < 1) {
            // retrieved author names
            $externalSites = array('boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                 'colorado-public-radio' => "https://www.cpr.org/",
                                 'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                 'elemental-reports' => "https://www.elementalreports.com/",
                                 'globalsport-matters' => "https://www.globalsportmatters.com/",
                                 'howard-center-for-investigation-reporting' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                 'KJZZ' => "https://www.kjzz.org",
                                 'KPCC' => "https://www.scpr.org/",
                                 'KUNC' => "https://www.kunc.org/",
                                 'LAIST' => "https://laist.com/",
                                 'News21' => "https://www.news21.com/",
                                 'PBS-SoCal' => "https://www.pbssocal.org/",
                                 'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                 'special-to-cronkite-news' => ""
                                );
            $externalAuthorCount = 1;
            $internalAuthorCount = 0;
            $commaSeparator = ',';
            $andSeparator = ' and ';
            $cnStaffTotalCounter = 0;
            $externalStaffTotalCounter = 0;
            $authorName = '';

            if (have_rows('byline_info', $main_story[0])) {
                while (have_rows('byline_info', $main_story[0])) {
                    the_row();
                    $staffID = get_sub_field('cn_staff');
                    if ($staffID == '') {
                        $cnStaffTotalCounter = 0;
                    } else {
                        $cnStaffTotalCounter = count($staffID);
                    }

                    if (have_rows('external_authors_repeater')) {
                        while (have_rows('external_authors_repeater')) {
                            the_row();
                            $externalStaffTotalCounter++;
                        }
                    }
                }
            }

            if ($cnStaffTotalCounter > 0) {
                if (have_rows('byline_info', $main_story[0])) {
                    $sepCounter = 0;
                    while (have_rows('byline_info', $main_story[0])) {
                        the_row();
                        $staffID = get_sub_field('cn_staff');
                        $cnStaffCount = count((array)$staffID);
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
                                    $authorName .= get_the_title($val);
                                    if ($sepCounter != $cnStaffCount) {
                                        if ($sepCounter == ($cnStaffCount - 1)) {
                                            $authorName .= $andSeparator.' ';
                                        } else {
                                            $authorName .= $commaSeparator.' ';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($externalStaffTotalCounter > 0) {

                if (have_rows('byline_info', $main_story[0])) {
                    $sepCounter = 0;
                    while (have_rows('byline_info', $main_story[0])) {
                        the_row();
                        if (have_rows('external_authors_repeater')) {
                            if ($cnStaffTotalCounter > 0) {
                                $authorName .= ' and ';
                            }
                            $sepCounter = 0;
                            while (have_rows('external_authors_repeater')) {
                                the_row();
                                $sepCounter++;
                                $authorName .= get_sub_field('external_authors');

                                if ($sepCounter != $externalStaffTotalCounter) {
                                    if ($sepCounter == ($externalStaffTotalCounter - 1)) {
                                        $authorName .= $andSeparator.' ';
                                    } else {
                                        $authorName .= $commaSeparator.' ';
                                    }
                                }
                            }
                        }
                    }
                }
            }
            wp_reset_query();

            echo '<item>';
            echo '<pubDate>' . mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false) . '</pubDate>';
            echo '<guid>' . get_permalink($main_story[0]) . '</guid>';
            echo '<title>' . get_the_title($main_story[0]) . '</title>';
            //Extract feature image, author, blurb
            $featureimage = wp_get_attachment_url(get_post_thumbnail_id($main_story[0]));

            $author = get_post_custom_values('post_author', $main_story[0]);
            $blurb = get_post_field('story_tease', $main_story[0]);
            echo '<description><![CDATA[';
            echo '<img src="'.$featureimage.'" width="800" />';
            echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . get_permalink($main_story[0]) . '">' . get_the_title($main_story[0]) . '</a></strong></h2>';
            echo '<div style="display:block;">By ' . $authorName . '</div>';
            echo '<p>'.$blurb.'</p>';
            echo '<br />]]></description>';
            echo '</item>';

            wp_reset_query();
        }
        $counter++;
    }
}

// Query home page for the custom fields we need for slider aside
$slideAsideList = get_field('slide_aside', 24);
if ($slideAsideList) {
    foreach ($slideAsideList as $slideAside) {
        $permalink = get_permalink($slideAside);

        // retrieved author names
        $externalSites = array('boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                               'colorado-public-radio' => "https://www.cpr.org/",
                               'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                               'elemental-reports' => "https://www.elementalreports.com/",
                               'globalsport-matters' => "https://www.globalsportmatters.com/",
                               'howard-center-for-investigation-reporting' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                               'KJZZ' => "https://www.kjzz.org",
                               'KPCC' => "https://www.scpr.org/",
                               'KUNC' => "https://www.kunc.org/",
                               'LAIST' => "https://laist.com/",
                               'News21' => "https://www.news21.com/",
                               'PBS-SoCal' => "https://www.pbssocal.org/",
                               'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                               'special-to-cronkite-news' => ""
                              );
        $externalAuthorCount = 1;
        $internalAuthorCount = 0;
        $commaSeparator = ',';
        $andSeparator = ' and ';
        $cnStaffTotalCounter = 0;
        $externalStaffTotalCounter = 0;
        $authorName = '';

        if (have_rows('byline_info', $slideAside)) {
            while (have_rows('byline_info', $slideAside)) {
                the_row();
                $staffID = get_sub_field('cn_staff');
                if ($staffID == '') {
                    $cnStaffTotalCounter = 0;
                } else {
                    $cnStaffTotalCounter = count($staffID);
                }

                if (have_rows('external_authors_repeater')) {
                    while (have_rows('external_authors_repeater')) {
                        the_row();
                        $externalStaffTotalCounter++;
                    }
                }
            }
        }

        if ($cnStaffTotalCounter > 0) {
            if (have_rows('byline_info', $slideAside)) {
                $sepCounter = 0;
                while (have_rows('byline_info', $slideAside)) {
                    the_row();
                    $staffID = get_sub_field('cn_staff');
                    $cnStaffCount = count((array)$staffID);
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
                                $authorName .= get_the_title($val);
                                if ($sepCounter != $cnStaffCount) {
                                    if ($sepCounter == ($cnStaffCount - 1)) {
                                        $authorName .= $andSeparator.' ';
                                    } else {
                                        $authorName .= $commaSeparator.' ';
                                    }
                                }
                            }
                        }
                    }
                }
            }
        } elseif ($externalStaffTotalCounter > 0) {

            if (have_rows('byline_info', $slideAside)) {
                $sepCounter = 0;
                while (have_rows('byline_info', $slideAside)) {
                    the_row();
                    if (have_rows('external_authors_repeater')) {
                        if ($cnStaffTotalCounter > 0) {
                            $authorName .= ' and ';
                        }
                        $sepCounter = 0;
                        while (have_rows('external_authors_repeater')) {
                            the_row();
                            $sepCounter++;
                            $authorName .= get_sub_field('external_authors');

                            if ($sepCounter != $externalStaffTotalCounter) {
                                if ($sepCounter == ($externalStaffTotalCounter - 1)) {
                                    $authorName .= $andSeparator.' ';
                                } else {
                                    $authorName .= $commaSeparator.' ';
                                }
                            }
                        }
                    }
                }
            }
        }
        wp_reset_query();

        $blurb = get_post_field('story_tease', $slideAside);
        $featureimage = wp_get_attachment_url(get_post_thumbnail_id($slideAside));
        echo '<item>';
        echo '<guid>' . get_permalink($slideAside) . '</guid>';
        echo '<title>' . get_the_title($slideAside) . '</title>';
        echo '<pubDate>'.mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false).'</pubDate>';
        echo '<description><![CDATA[';
        echo '<img src="'.$featureimage.'"  width="800"  />';
        echo '<br /><h2 style="text-decoration:underline;"><strong><a href="' . get_permalink($slideAside) . '">' . get_the_title($slideAside) . '</a></strong></h2>';
        echo '<div style="display:block;">By ' . $authorName . '</div>';
        echo '<p>'.$blurb.'</p>';
        echo '<br />]]></description>';
        echo '</item>';
    }
}
wp_reset_query();



// Get 2nd and 3rd story from verticals
$frontpage_id = get_option('page_on_front');

if (have_rows('area_works_box', $frontpage_id)) {
    //echo 'have rows';
    while (have_rows('area_works_box', $frontpage_id)) {
        the_row();
        // Declare variables below
        //$icon = get_sub_field('area_works_image');
        //$title = get_sub_field('area_works_title');
        //$text = get_sub_field('area_works_description');
        $thepostid = get_sub_field('area_works_link');
        //$customLinks = get_sub_field('custom_link');

        if (get_the_permalink($thepostid)) { // Only include stories that are on Cronkite News
            //$thepostid = url_to_postid($link);
            $link = get_the_permalink($thepostid);

            echo '<item>';
            echo '<pubDate>' . mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false) . '</pubDate>';
            echo '<guid>' . $link . '</guid>';
            echo '<title>' . get_the_title($thepostid) . '</title>';
            //Extract feature image, author, blurb
            $featureimage = get_the_post_thumbnail($thepostid, 'small', array('style' => 'width:40%; float:right;'));

            // retrieved author names
            $externalSites = array('boise-state-public-radio' => "https://www.boisestatepublicradio.org",
                                 'colorado-public-radio' => "https://www.cpr.org/",
                                 'cronkite-borderlands-project' => "https://cronkitenews.azpbs.org/category/borderlands/",
                                 'elemental-reports' => "https://www.elementalreports.com/",
                                 'globalsport-matters' => "https://www.globalsportmatters.com/",
                                 'howard-center-for-investigation-reporting' => "https://cronkite.asu.edu/real-world-experiences/howard-center-for-investigative-journalism",
                                 'KJZZ' => "https://www.kjzz.org",
                                 'KPCC' => "https://www.scpr.org/",
                                 'KUNC' => "https://www.kunc.org/",
                                 'LAIST' => "https://laist.com/",
                                 'News21' => "https://www.news21.com/",
                                 'PBS-SoCal' => "https://www.pbssocal.org/",
                                 'Rocky-Mountain-PBS' => "http://www.rmpbs.org/home/",
                                 'special-to-cronkite-news' => ""
                                );
            $externalAuthorCount = 1;
            $internalAuthorCount = 0;
            $commaSeparator = ',';
            $andSeparator = ' and ';
            $cnStaffTotalCounter = 0;
            $externalStaffTotalCounter = 0;
            $authorName = '';

            if (have_rows('byline_info', $thepostid)) {
                while (have_rows('byline_info', $thepostid)) {
                    the_row();
                    $staffID = get_sub_field('cn_staff');
                    if ($staffID == '') {
                        $cnStaffTotalCounter = 0;
                    } else {
                        $cnStaffTotalCounter = count($staffID);
                    }

                    if (have_rows('external_authors_repeater')) {
                        while (have_rows('external_authors_repeater')) {
                            the_row();
                            $externalStaffTotalCounter++;
                        }
                    }
                }
            }

            if ($cnStaffTotalCounter > 0) {
                if (have_rows('byline_info', $thepostid)) {
                    $sepCounter = 0;
                    while (have_rows('byline_info', $thepostid)) {
                        the_row();
                        $staffID = get_sub_field('cn_staff');
                        $cnStaffCount = count((array)$staffID);
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
                                    $authorName .= get_the_title($val);
                                    if ($sepCounter != $cnStaffCount) {
                                        if ($sepCounter == ($cnStaffCount - 1)) {
                                            $authorName .= $andSeparator.' ';
                                        } else {
                                            $authorName .= $commaSeparator.' ';
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } elseif ($externalStaffTotalCounter > 0) {

                if (have_rows('byline_info', $thepostid)) {
                    $sepCounter = 0;
                    while (have_rows('byline_info', $thepostid)) {
                        the_row();
                        if (have_rows('external_authors_repeater')) {
                            if ($cnStaffTotalCounter > 0) {
                                $authorName .= ' and ';
                            }
                            $sepCounter = 0;
                            while (have_rows('external_authors_repeater')) {
                                the_row();
                                $sepCounter++;
                                $authorName .= get_sub_field('external_authors');

                                if ($sepCounter != $externalStaffTotalCounter) {
                                    if ($sepCounter == ($externalStaffTotalCounter - 1)) {
                                        $authorName .= $andSeparator.' ';
                                    } else {
                                        $authorName .= $commaSeparator.' ';
                                    }
                                }
                            }
                        }
                    }
                }
            }
            wp_reset_query();

            $author = get_post_custom_values('post_author', $thepostid);
            $blurb = get_post_field('story_tease', $thepostid);
            echo '<description><![CDATA[';
            echo '<h2 style="text-decoration:underline;width:58%;display:block;float:left;"><strong><a href="' . $link . '">' . get_the_title($thepostid) . '</a></strong></h2>';
            echo $featureimage;
            echo '<div style="display:block;">By ' . $authorName . '</div>';
            echo '<p style="width:50%">' . $blurb . '</p>';
            echo '<br />]]></description>';
            echo '</item>';

        }
    }
}
wp_reset_query();


echo '<item>';
echo '<guid>https://cronkitenews.azpbs.org/sitenewscast/</guid>';
echo '<title>Latest Newscast</title>';
?>
                    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
        <?php
        echo '<description><![CDATA[';
echo '<a href="https://cronkitenews.azpbs.org/sitenewscast/" target="_blank"> <div style="width:100%; background-color:#234384; padding-top:1px; padding-bottom:1px; margin-bottom:20px;"><p style="text-align:center; color:#FFF; font-size:18px;"><strong> LATEST NEWSCAST </strong></p></div></a>' ;
echo '<h3><strong><a href="' . $link . '">' . $title . '</a></strong></h3>';
echo ']]></description>';
echo '</item>';

// Query home page for the custom fields we need
$latestNewsList = get_field('latest_news_stories', 24);
if ($latestNewsList) {
    $latestNewsCounter = 0;
    foreach ($latestNewsList as $latestNews) {
        if ($latestNewsCounter < 8) {
            $permalink = get_permalink($latestNews);

            echo '<item>';
            echo '<guid>' . $permalink . '</guid>';
            echo '<title>' . get_the_title($latestNews) . '</title>';
            ?>
                    <pubDate><?php echo mysql2date('D, d M Y H:i:s +0000', get_lastpostmodified('GMT'), false); ?></pubDate>
                    <?php

            echo '<description><![CDATA[';
            echo '<h3><strong><a href="' . $permalink . '">' . get_the_title($latestNews) . '</a></strong></h3>';
            echo ']]></description>';
            echo '</item>';
        }
    }
}
wp_reset_query();
?>
</channel>
</rss>
