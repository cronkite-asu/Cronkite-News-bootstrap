<?php
/**
 * Header
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> dir="ltr">
  <head>

    <?php
    // get the category for GA
    $post = get_post();
$categories = get_the_category($post -> ID);
$output = '';

if (! empty($categories)) {
    foreach ($categories as $category) {

        if ($output == '') {
            if ($category->name == "Borderlands") {
                //$output = "ga('set', 'Borderlands', '"  . esc_html( $category->name ) . "');";
                //$output = "ga('set', 'contentGroup1', 'Borderlands');";
                $output = "gtag('set', {'contentGroup1': 'Borderlands'});";
            }
            if ($category->name == "Sustainability") {
                //$output = "ga('set', 'contentGroup2', 'Sustainability');";
                $output = "gtag('set', {'contentGroup2': 'Sustainability'});";
            }
            if ($category->name == "Education") {
                //$output = "ga('set', 'contentGroup3', 'Education');";
                $output = "gtag('set', {'contentGroup3': 'Education'});";
            }
            if ($category->name == "Consumer") {
                //$output = "ga('set', 'contentGroup4', 'Consumer');";
                $output = "gtag('set', {'contentGroup4': 'Consumer'});";
            }
            if ($category->name == "Future") {
                $output = "ga('set', 'contentGroup5', 'Future');";
            }
        }
    }
}

?>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CSKTFTYNJ0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-CSKTFTYNJ0'); </script>

    <!-- Google Optimize -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KJHZKHH"></script>

    <!-- Chartbeat Analytics  -->
    <script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>
    <script src="<?php bloginfo('template_directory');?>/js/jquery-3.2.1.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#216CB7">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Add Favicon -->
    <link type="image/png" href="<?php echo get_field('favicon', 'options'); ?>" rel="icon">
    <link type="image/png" href="<?php echo get_field('favicon', 'options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php echo get_field('favicon', 'options'); ?>"  rel="apple-touch-icon">


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0f0514404d.js" crossorigin="anonymous"></script>

    <?php
  $settings = get_field('page-settings', get_the_ID());

if ($settings && $settings['text-color'] != '') {
    $textColor = $settings['text-color'];
}
?>

    <!-- NEW NAV - 12/12/19 -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/foundation.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link href="<?php bloginfo('template_directory');?>/assets/css/hamburgers.css" rel="stylesheet">
    <link href="<?php bloginfo('template_directory');?>/assets/css/all.min.css" rel="stylesheet"> <!--load all styles -->
    <link href="<?php bloginfo('template_directory');?>/assets/css/print.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/css/tooltipster.bundle.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/js/vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/js/vendor/slick/slick-theme.css">
    <link href="<?php bloginfo('template_directory');?>/assets/css/nav.css" rel="stylesheet">
    <?php if (is_page(18) || is_single() || is_category() || is_page('people') || is_search() || is_page(158103) || is_page(122187) || is_page(83139) || is_page(83161) || is_page(1131) || is_page(175279)) {?>
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/single-story-post.css">
    <?php } ?>

    <!-- sports page -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/sports.css">
    <link href="<?php bloginfo('template_directory');?>/assets/css/footer.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/js/vendor/plyr-master/dist/plyr.css" />
    <style type='text/css'>
        body.admin-bar {margin-top:32px !important}
        @media screen and (max-width: 782px) {
            body.admin-bar { margin-top:0px !important }
        }
        @media screen and (max-width: 600px) {
            body.admin-bar { margin-top:0px !important }
            html #wpadminbar{ margin-top: -46px; }
        }
    </style>
</head>

<body>

    <!-- reading progress container -->
    <div class="progress-container">
      <div class="progress-bar" id="progressBar"></div>
    </div>

    <!-- start header -->
        <nav class="cn_navigation" role="navigation" aria-label="Cronkite News - Navigation">

      <!-- navigation container -->
      <div class="main_nav_container">
        <!-- main navigation -->
        <div class="main_nav">
          <!-- logo -->
          <div class="logo">
            <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory');?>/assets/img/cronkite-news.svg" alt="Cronkite News" title="Cronkite News" /></a>
          </div>
          <!-- main navigation -->
          <div class="nav_links">

            <!-- top navigation -->
            <ul class="top_links">
              <li>
                <div class="search-box">
                  <form method="get" class="navbar-form search" id="searchform" action="https://cronkitenews.azpbs.org/">
                    <input type="text" placeholder="Search" name="s" autocomplete="off" />
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/search.svg" width="16" height="16" />
                  </form>
                </div>
              </li>
              <?php
              $args = [
                  'menu' => 'Header Nav - 2019',
                  'container'     => false,
                  'items_wrap'    => '%3$s',
                  'depth'         => 1,
                  'fallback_cb'   => false,
                  'menu_id'             => '',
                  'menu_class'        => '',
                  ];
              wp_nav_menu($args);
              ?>
            </ul>
          </div>
          <!-- hamburger icon -->
          <div class="nav-hamburger animated slideInRight">
            <button class="hamburger hamburger--collapse" type="button">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </button>
          </div>
        </div>
      </div>
      <!-- verticals navigation -->
      <div id="sub_nav" class="sub_nav drop-shadow animated slideInDown">
        <ul>
          <li class="misc_links_m">
            <form method="get" class="navbar-form search" id="searchform" action="https://cronkitenews.azpbs.org/">
              <input type="text" placeholder="Search" name="s" autocomplete="off" />
              <img src="<?php bloginfo('template_directory'); ?>/assets/img/search.svg" width="16" height="16" />
            </form>
          </li>
          <?php
            $args = [
            'menu' => 'Subnav - 2019',
            'container'     => false,
            'items_wrap'    => '%3$s',
            'depth'         => 1,
            'fallback_cb'   => false,
            'menu_id'             => '',
            'menu_class'        => '',
            ];
wp_nav_menu($args);
?>
          <li class="top_links_m"><a href="https://cronkitenews.azpbs.org/sports/">Sports</a></li>
                    <li class="top_links_m"><a href="https://cronkitenews.azpbs.org/sitenewscast/">Newscast</a></li>
          <li class="top_links_m"><a href="https://cronkitenews.azpbs.org/audio/">Audio</a></li>
          <li class="top_links_m last"><a href="https://cronkitenews.azpbs.org/daily-newsletter-signup/">Subscribe</a></li>
          <li class="misc_links_m first"><a href="https://cronkitenews.azpbs.org/about-us/">About</a></li>
          <li class="misc_links_m"><a href="https://cronkitenews.azpbs.org/what-we-do/" target="_blank">What we do</a></li>
          <li class="misc_links_m"><a href="https://www.azpbs.org/" target="_blank">Arizona PBS</a></li>
          <li class="misc_links_m"><a href="https://cronkite.asu.edu/" target="_blank">Walter Cronkite School of Journalism<br />and Mass Communication</a></li>
          <li class="social_links_m"><a href="https://twitter.com/cronkitenews" target="_blank"><i class="fab fa-twitter"></i></a> <a href="https://www.facebook.com/cronkitenewsazpbs" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="https://www.instagram.com/cronkitenews/" target="_blank"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/user/cronkitenewswatch" target="_blank"><i class="fab fa-youtube"></i></a></li>
          <li class="copyright_m">&copy; <?php echo date('Y'); ?> Cronkite News. All rights reserved. Creative Commons.</li>
        </ul>
      </div>
    </nav>

    <!-- end start -->
