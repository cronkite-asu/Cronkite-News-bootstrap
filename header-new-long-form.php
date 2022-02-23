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
	$categories = get_the_category ($post -> ID);
	$output = '';

	if ( ! empty( $categories ) ) {
		foreach( $categories as $category ) {

		if($output == '') {
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

		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-3145657-18"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());
			<?php //echo $output ?>
			gtag('config', 'UA-3145657-18');
		</script>

    <!-- Google Optimize -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-KJHZKHH"></script>

		<!-- Chartbeat Analytics  -->
		<script type='text/javascript'>var _sf_startpt=(new Date()).getTime()</script>
	  <script src="<?php bloginfo('template_directory');?>/js/jquery-3.2.1.min.js"></script>


		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Add Favicon -->
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>" rel="shortcut icon">
    <link type="image/png" href="<?php the_field('favicon','options'); ?>"  rel="apple-touch-icon">


    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/d3e0178cac.js" crossorigin="anonymous"></script>
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

		<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/long-form/foundation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Libre+Caslon+Text&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=News+Cycle:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&display=swap" rel="stylesheet">


		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
		<link href="<?php bloginfo('template_directory');?>/assets/css/hamburgers.css" rel="stylesheet">
		<link href="<?php bloginfo('template_directory');?>/assets/css/print.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/css/tooltipster.bundle.min.css" />
		<link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/js/vendor/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/assets/js/vendor/slick/slick-theme.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/single-story-post.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/css/long-form/long-form-base.css">
    <link href="<?php bloginfo('template_directory');?>/assets/css/nav.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php bloginfo('template_directory');?>/assets/js/vendor/plyr-master/dist/plyr.css" />

    <?php if (is_single()) { ?>
      <link href='https://cdn.knightlab.com/libs/soundcite/latest/css/player.css' rel='stylesheet' type='text/css'><script type='text/javascript' src='https://cdn.knightlab.com/libs/soundcite/latest/js/soundcite.min.js'></script>
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

    <!-- generate custom story settings -->
    <style tyle="text/css">
      <?php
        $settings = get_field('longform-settings', get_the_ID());
        if ($settings['background-color'] != '') {
          $bgColor = $settings['background-color'];
        }

        if ($settings['text-color'] != '') {
          $textColor = $settings['text-color'];
        }
      ?>
      body {
        background:<?php echo $bgColor; ?> !important;
      }
    </style>
    <?php if ($settings['stylesheet'] != '') { ?>
    <link rel="stylesheet" href="<?php echo $settings['stylesheet']; ?>" />
    <?php } ?>
</head>

<body <?php body_class(); ?>>
