<?php
/**
 * Header
 */
?>

<!doctype html>
<html class="no-js" <?php language_attributes(); ?> dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Add Favicon -->
    <link type="image/png" href="<?php echo get_field('favicon', 'options'); ?>" rel="icon">
    <link type="image/png" href="<?php echo get_field('favicon', 'options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php echo get_field('favicon', 'options'); ?>"  rel="apple-touch-icon">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-CSKTFTYNJ0"></script> <script> window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date()); gtag('config', 'G-CSKTFTYNJ0'); </script>

    <!-- Google Optimize -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KJHZKHH"></script>

    <!-- Chartbeat Analytics  -->
    <script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>
    <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.2.1.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/0f0514404d.js" crossorigin="anonymous"></script>
    <!-- AMP Analytics -->
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>

    <!-- FB App Configuration for Comment Moderation   -->
        <script>
            window.fbAsyncInit = function() {
            FB.init({
                appId      : '511732915827177',
                xfbml      : true,
                version    : 'v2.11'
                });
                FB.AppEvents.logPageView();
            };

            (function(d, s, id){
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {return;}
                js = d.createElement(s); js.id = id;
                js.src = "https://connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

    <meta property="fb:app_id" content="511732915827177" />

        <!-- FB instant articles -->
        <meta property="fb:pages" content="305166330794" />

    <?php wp_head(); ?>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://kit.fontawesome.com/d3e0178cac.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/js/vendor/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/js/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">

    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/long-form/foundation.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/app.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/single-story-post.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/long-form/long-form-base.css">
    <link href="<?php bloginfo('template_directory'); ?>/assets/css/nav.css" rel="stylesheet">

    <?php if (is_single(162517)) { ?>
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/fullscreen-gallery/covid-gallery.css">
    <?php } else { ?>
      <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/assets/css/fullscreen-gallery/app.css">
    <?php } ?>

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

  <body <?php body_class(); ?>>

    <!-- main navigation -->
    <nav>
      <div class="logo">
        <a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/assets/img/cn-logo-white.svg" alt="Cronkite News" title="Cronkite News" /></a>
      </div>
    </nav>
