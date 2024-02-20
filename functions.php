<?php
/**
 * Functions
 */

// Enable shortcodes
require_once 'lib/shortcodes.php';

//  Add widget support shortcodes
add_filter('widget_text', 'do_shortcode');

// Custom Editor Style Support
add_editor_style();

// Support for Featured Images
add_theme_support('post-thumbnails');

// Custom Background
add_theme_support('custom-background', ['default-color' => 'fff']);

// Custom Header
add_theme_support(
    'custom-header',
    [
    'default-image' => get_template_directory_uri() . '/images/custom-logo.png',
    'height'        => '200',
    'flex-height'    => true,
    'uploads'       => true,
    'header-text'   => false,
    ]
);

// custom image sizes
add_image_size('related-story-photo', 400, 400);
add_image_size('awards_logo', 540, 304);
add_image_size('slider', 208, 180);
add_image_size('vertical-homepage-img', 385.33, 216.73);
add_image_size('audio-featured-singles', 212, 174, true);
add_image_size('single-post', 840, 560, true);

// Register Navigation Menu
register_nav_menus(
    [
    'header-menu' => 'Header Menu',
    'footer-menu' => 'Footer Menu',
    ]
);

/* Added: Sunday, Nov. 3rd, 2020 - Custom rss feed */
add_action('init', 'newRSSFeed');
function newRSSFeed() {
    add_feed('cronkitenewsfeed', 'newRSSFeedCallback');
}

/* This code seeks the template for your RSS feed */
function newRSSFeedCallback() {
    get_template_part('rss', 'cronkitenewsfeed'); // need to be in small case.
}

// get author for stories
function getStoryAuthors($getPID)
{
    $finalAuthors = '';
    $externalSites = ['boise-state-public-radio' => "https://www.boisestatepublicradio.org",
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
                         'special-to-cronkite-news' => "",
                        ];
    $externalAuthorCount = 1;
    $internalAuthorCount = 0;
    $commaSeparator = ',';
    $andSeparator = ' and ';
    $cnStaffCount = 0;
    $newCheck = 0;

    // bypass group not showing repeater field issue
    $groupFields = get_field('byline_info', $getPID);
    $externalAuthorRepeater = $groupFields['external_authors_repeater'] ?? "";

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

    if (have_rows('byline_info', $getPID)) {
        $sepCounter = 0;
        while (have_rows('byline_info', $getPID)) {
            the_row();
            $staffID = get_sub_field('cn_staff');

            if (is_countable($staffID)) {
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

                            $staffNameURLSafe = str_replace(' ', '-', strtolower(get_the_title($val)));
                            $staffNameURLSafe = strtr($staffNameURLSafe, $normalizeChars);

                            $finalAuthors .= get_the_title($val);
                            if ($sepCounter != $cnStaffCount) {
                                if ($sepCounter == ($cnStaffCount - 1)) {
                                    $finalAuthors .= $andSeparator.' ';
                                } else {
                                    $finalAuthors .=  $commaSeparator.' ';
                                }
                            }
                        }
                    }
                    $newCheck++;
                }
            }
        }


        if (is_countable($externalAuthorRepeater) && count($externalAuthorRepeater) > 0 && $externalAuthorRepeater != '') {
            $extStaffCount = count($externalAuthorRepeater);
            if ($groupFields['cn_staff'] != '') {
                $finalAuthors .= ' and ';
            }
            $sepCounter = 0;
            foreach ($externalAuthorRepeater as $key => $val) {
                $sepCounter++;
                $finalAuthors .= $val['external_authors'];

                if ($sepCounter != $extStaffCount) {
                    if ($sepCounter == ($extStaffCount - 1)) {
                        $finalAuthors .= $andSeparator.' ';
                    } else {
                        $finalAuthors .= $commaSeparator.' ';
                    }
                }
            }
            $newCheck++;
        }
    }

    if ($newCheck == 0 && get_field('post_author') != '') {
        //echo '<!--HERE BYLINE OLD-->';
        //echo '<span class="author_name">By ';
        if ($postAuthor = get_field('post_author')) {
            $finalAuthors .= $postAuthor;
        }
    }
    wp_reset_query();
    return $finalAuthors;
}

function hook_parselyJSON()
{
    if (is_page()) {
        $pageType = 'WebPage';
        $headline = get_the_title(get_the_ID());
        $storyURL = addcslashes(get_the_permalink(get_the_ID()), '/');
        $imgURL = '';
        ?>

    <!-- BEGIN Parsely JSON-LD -->
    <meta name="wp-parsely_version" id="wp-parsely_version" content="2.2"/>
    <script type="application/ld+json">
      {"@context":"http:\/\/schema.org","@type":"<?php echo $pageType; ?>","headline":"<?php echo $headline; ?>","url":"<?php echo $storyURL; ?>"}
    </script>

        <?php
    } elseif (is_single()) {
        $pageType = 'NewsArticle';
        $publisher = 'Cronkite News - Arizona PBS';
        $headline = html_entity_decode(get_the_title(get_the_ID()));
        $storyURL = addcslashes(get_the_permalink(get_the_ID()), '/');
        $dateCreated = '';
        $datePublished = get_the_time('c', get_the_ID());
        $datePublished = new DateTime($datePublished);
        $dateCreated = $datePublished->format(DateTime::ATOM);
        $dateModified = $dateCreated;

        // keywords
        $keywords = "";
        $rawKeywords = get_the_tags(get_the_ID());
        if ($rawKeywords) {
            foreach ($rawKeywords as $tag) {
                $keywords .= '"'.$tag->name.'",';
            }
        }
        $keywords = substr($keywords, 0, -1);

        // categories
        $rawCats = wp_get_post_categories(get_the_ID());
        foreach ($rawCats as $cid) {
            $cat = get_category($cid);
            if ($cat->name != 'New Long Form' || $cat->name != "Editor's Picks" || $cat->name != "Big Boy" || $cat->name != "Longform hero image slim") {
                $articleSection = $cat->name;
            }
        }

        // get authors
        $creators = "";
        $authors = "";
        $rawAuthors = str_replace(' and ', ',', getStoryAuthors(get_the_ID()));
        $splitAuthors = explode(',', $rawAuthors);
        foreach ($splitAuthors as $k => $v) {
            $creators .= '"'.trim($v).'",';
            $authors .= '{"@type":"Person","name":"'. trim($v) . '"},';
        }
        $creators = substr($creators, 0, -1);
        $authors = substr($authors, 0, -1);

        // get image url
        $imgURL = addcslashes(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'), '/');
        ?>
      <!-- BEGIN Parsely JSON-LD -->
        <script type="application/ld+json">
            {"@context":"http:\/\/schema.org",
        "@type":"<?php echo $pageType; ?>",
        "mainEntityOfPage":{"@type":"WebPage","@id":"<?php echo $storyURL; ?>"},
        "headline":"<?php echo $headline; ?>",
        "url":"<?php echo $storyURL; ?>",
        "thumbnailUrl":"<?php echo $imgURL; ?>",
        "image":{"@type":"ImageObject","url":"<?php echo $imgURL; ?>"},
        "dateCreated":"<?php echo $dateCreated; ?>",
        "datePublished":"<?php echo $dateCreated; ?>",
        "dateModified":"<?php echo $dateModified; ?>",
        "articleSection":"<?php echo $articleSection ?? ''; ?>",
        "author":[<?php echo $authors; ?>],
        "creator":[<?php echo $creators; ?>],
        "publisher":{"@type":"Organization","name":"<?php echo $publisher; ?>"},
        "keywords":[<?php echo $keywords; ?>]}
        </script>
        <?php
    }
}
add_action('wp_head', 'hook_parselyJSON');

function hook_parselyTrack()
{
    ?>
  <!-- START Parse.ly Include: Standard -->
  <script data-cfasync="false" id="parsely-cfg" data-parsely-site="cronkitenews.azpbs.org" src="//cdn.parsely.com/keys/cronkitenews.azpbs.org/p.js"></script>
  <!-- END Parse.ly Include: Standard -->
    <?php
}
add_action('wp_footer', 'hook_parselyTrack');

// Navigation Menu Adjustments

/* Add class to navigation sub-menu */
class bootstrap_navigation extends Walker_Nav_Menu
{

    public function start_lvl(&$output, $depth = 0, $args = [])
    {
        $output .= "\n<ul class=\"dropdown-menu\">\n";
    }

    public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
    {
        $item_html = '';
        parent::start_el($item_html, $item, $depth, $args);

        if ($item->is_dropdown && $depth === 0) {
            $item_html = str_replace('<a', '<a class="dropdown-toggle" data-toggle="dropdown"', $item_html);
            $item_html = str_replace('</a>', ' <b class="caret"></b></a>', $item_html);
        }
        $output .= $item_html;
    }

    public function display_element($element, &$children_elements, $max_depth, $depth = 0, $args = null, &$output = null)
    {
        if ($element->current) {
            $element->classes[] = 'active';
        }
        $element->is_dropdown = !empty($children_elements[$element->ID]);

        if ($element->is_dropdown) {
            if ($depth === 0) {
                $element->classes[] = 'dropdown';
            } elseif ($depth === 1) {
                // Extra level of dropdown menu,
                // as seen in http://twitter.github.com/bootstrap/components.html#dropdowns
                $element->classes[] = 'dropdown-submenu';
            }
        }
        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}

/* Display Pages In Navigation Menu */
if (!function_exists('bootstrap_menu')) {
    function bootstrap_menu()
    {
        $pages_args = [
        'sort_column' => 'menu_order, post_title',
        'menu_class'  => '',
        'include'     => '',
        'exclude'     => '',
        'echo'        => true,
        'show_home'   => false,
        'link_before' => '',
        'link_after'  => '',
        ];

        wp_page_menu($pages_args);
    }
}

// Create pagination
function bootstrap_pagination()
{
    global $wp_query;
    $big = 999999999;

    $links = paginate_links(
        [
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'prev_next' => true,
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'list',
        ]
    );

    $pagination = str_replace("<ul class='page-numbers'>", "<ul class='pagination text-center'>", $links);
    echo $pagination;
}

// Register Sidebars
/* Sidebar Right */
register_sidebar(
    [
    'id' => 'sidebar_right',
    'name' => __('Sidebar Right'),
    'description' => __('This sidebar is located on the right-hand side of each page.'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

/* Sidebar Archive */
register_sidebar(
    [
    'id' => 'sidebar_archive',
    'name' => __('Sidebar Archive'),
    'description' => __('This sidebar is located on the right-hand side of each page.'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

/* Sidebar Category */
register_sidebar(
    [
    'id' => 'sidebar_category',
    'name' => __('Sidebar Category'),
    'description' => __('This sidebar is located on the right-hand side of each page.'),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

register_sidebar(
    [
    'id' => 'sidebar_newscast',
    'name' => __('Sidebar Archive Newscast'),
    'description' => __(''),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

register_sidebar(
    [
    'id' => 'sidebar_new_story',
    'name' => __('Sidebar New Story Template - 2020'),
    'description' => __(''),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

register_sidebar(
    [
    'id' => 'sidebar_author',
    'name' => __('Sidebar Author - 2020'),
    'description' => __(''),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

register_sidebar(
    [
    'id' => 'sidebar_health_insider',
    'name' => __('Health Insider'),
    'description' => __(''),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

register_sidebar(
    [
    'id' => 'sidebar_noticias',
    'name' => __('Sidebar Noticias'),
    'description' => __(''),
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h5>',
    'after_title' => '</h5>',
    ]
);

// Remove #more anchor from posts
function remove_more_jump_link($link)
{
    $offset = strpos($link, '#more-');
    if ($offset) {
        $end = strpos($link, '"', $offset);
    }
    if ($end) {
        $link = substr_replace($link, '', $offset, $end-$offset);
    }
    return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Custom Post Excerpt
if (! function_exists('bootstrap_excerpt')) {
    function content($limit)
    {
        $content = explode(' ', get_the_content(), $limit);
        if (is_countable($content) && count($content)>=$limit) {
            array_pop($content);
            $content = implode(" ", $content).'...<a href="'. get_permalink($post->ID) . '" class="read_more">The Latest</a>';
        } else {
            $content = implode(" ", $content);
        }

        $content = preg_replace('/\[.+\]/', '', $content);
        $content = apply_filters('the_content', $content);
        $content = str_replace(']]>', ']]&gt;', $content);
        return $content;
    }
}

/*Disable Theme Updates # 3.0+*/
remove_action('load-update-core.php', 'wp_update_themes');
add_filter(
    'pre_site_transient_update_themes',
    function ($a) {
        return null;
    }
);
wp_clear_scheduled_hook('wp_update_themes');

// Disable wordpress jQuery
function modify_jquery()
{
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('init', 'modify_jquery');

/******************************************************************************************************************************
                Enqueue Scripts and Styles for Front-End
*******************************************************************************************************************************/
if (!is_admin()) {

    function bootstrap_scripts_and_styles()
    {
        if (!is_page('youth-suicide') && !is_page('impeachment-sentiment') && !is_single() && !is_search() && !is_page('about-us')) {
            // Load JavaScripts
            wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap.js', [ 'jquery' ], '5.3.0-alpha1', true);
            if (!is_single(132417)) {
                wp_enqueue_script('global', get_template_directory_uri() . '/js/global.js', null, null, true);
            }
            wp_enqueue_script('respond', get_template_directory_uri() . '/js/plugins/respond.js', null, '1.4.0', true);
            wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', null, '2.6.2', true);
            wp_enqueue_script('image-preloader', get_template_directory_uri() . '/js/plugins/image-preloader.js', null, null, true);

            wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/plugins/jquery.easing.1.3.js', [ 'jquery' ], '1.3', true);
            wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/js/plugins/jquery.isotope.js', [ 'jquery' ], '1.5.25', true);
            wp_enqueue_script('jquery-remodal', get_template_directory_uri() . '/js/plugins/jquery.remodal.js', [ 'jquery' ], null, true);
            wp_enqueue_script('jquery-scrolldepth', get_template_directory_uri() . '/js/plugins/jquery.scrolldepth.js', [ 'jquery' ], '0.9.1', true);

            wp_enqueue_script('wow', get_template_directory_uri() . '/js/plugins/wow.js', null, '0.1.6', true);
            wp_enqueue_script('slick', get_template_directory_uri() . '/js/plugins/slick.js', null, '1.4.1', true);
            wp_enqueue_script('owl-js', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, null, true);
            wp_enqueue_script('matchHeight', get_template_directory_uri() . '/js/plugins/jquery.matchHeight.js', null, '0.5.2', true);

            //Custom Scripts
            if (!is_single(132417)) {
                wp_enqueue_script('viewport', get_template_directory_uri() . '/js/plugins/viewport-units-buggyfill.js', null, '0.4.2', true);
                // wp_enqueue_script( 'google', get_template_directory_uri() . '/js/plugins/_google.maps.api.v3.js', null, null, true );
                wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/plugins/waypoints.js', null, '2.0.3', true);
                wp_enqueue_script('waypoints-sticky', get_template_directory_uri() . '/js/plugins/waypoints-sticky.js', null, '2.0.3', true);

                wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/plugins/bootstrap-hover-dropdown.min.js', null, null, true);
            }

            // Load Stylesheets
            //core
            wp_enqueue_style('normalize', get_template_directory_uri().'/css/core/normalize.css', null, '8.0.1');
            if (is_single(131130)) {

            } else {
                wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.css', null, '5.3.0-alpha1');
            }
            wp_enqueue_style('slick', get_template_directory_uri().'/css/plugins/slick.css', null, null);
            wp_enqueue_style('bootstrap-customizer', get_template_directory_uri().'/css/core/customizer.css', null, null);
            //plugins
            //wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/plugins/font-awesome.css', null, '4.2.0' );
            wp_enqueue_style('animate', get_template_directory_uri().'/css/plugins/animate.css', null, null);
            wp_enqueue_style('hover', get_template_directory_uri().'/css/plugins/hover.css', null, '1.0.8');
            wp_enqueue_style('owl', get_template_directory_uri().'/css/plugins/owl.carousel.css', null, '1.3.2');
            wp_enqueue_style('owl', get_template_directory_uri().'/css/plugins/owl.theme.default.css', null, 'null');
            wp_enqueue_style('owl-trans', get_template_directory_uri().'/css/plugins/owl.transitions.css', null, '1.3.2');
            wp_enqueue_style('remodal', get_template_directory_uri().'/css/plugins/jquery.remodal.css', null, null);

            //Custom Styles
            wp_enqueue_style('fontello', get_template_directory_uri().'/css/plugins/fontello.css', null, null);
        }
    }

    //$checkPeoplePage = explode('/', $_SERVER[REQUEST_URI]);
    $checkPeoplePage = explode('/', $_SERVER['REQUEST_URI']);

    if (!is_search() && !is_single() && isset($checkPeoplePage[1]) && $checkPeoplePage[1] != 'people' && $checkPeoplePage[1] != 'category') {
        add_action('wp_enqueue_scripts', 'bootstrap_scripts_and_styles');
    }

    function bootstrap_scripts_and_styles_old()
    {
        // Load JavaScripts
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/plugins/bootstrap.js', [ 'jquery' ], '5.3.0', true);
        wp_enqueue_script('global', get_template_directory_uri() . '/js/global.js', null, null, true);
        wp_enqueue_script('respond', get_template_directory_uri() . '/js/plugins/respond.js', null, '1.4.0', true);
        wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/plugins/modernizr.js', null, '2.6.2', true);
        wp_enqueue_script('image-preloader', get_template_directory_uri() . '/js/plugins/image-preloader.js', null, null, true);

        wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/plugins/jquery.easing.1.3.js', [ 'jquery' ], '1.3', true);
        wp_enqueue_script('jquery-isotope', get_template_directory_uri() . '/js/plugins/jquery.isotope.js', [ 'jquery' ], '1.5.25', true);
        wp_enqueue_script('jquery-remodal', get_template_directory_uri() . '/js/plugins/jquery.remodal.js', [ 'jquery' ], null, true);
        wp_enqueue_script('jquery-scrolldepth', get_template_directory_uri() . '/js/plugins/jquery.scrolldepth.js', [ 'jquery' ], '0.9.1', true);

        wp_enqueue_script('wow', get_template_directory_uri() . '/js/plugins/wow.js', null, '0.1.6', true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/js/plugins/slick.js', null, '1.4.1', true);
        wp_enqueue_script('owl-js', get_template_directory_uri() . '/js/plugins/owl.carousel.min.js', null, null, true);
        wp_enqueue_script('matchHeight', get_template_directory_uri() . '/js/plugins/jquery.matchHeight.js', null, '0.5.2', true);

        //Custom Scripts
        wp_enqueue_script('viewport', get_template_directory_uri() . '/js/plugins/viewport-units-buggyfill.js', null, '0.4.2', true);
        // wp_enqueue_script( 'google', get_template_directory_uri() . '/js/plugins/_google.maps.api.v3.js', null, null, true );
        wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/plugins/waypoints.js', null, '2.0.3', true);
        wp_enqueue_script('waypoints-sticky', get_template_directory_uri() . '/js/plugins/waypoints-sticky.js', null, '2.0.3', true);
        wp_enqueue_script('dropdown', get_template_directory_uri() . '/js/plugins/bootstrap-hover-dropdown.min.js', null, null, true);

        // Load Stylesheets
        //core
        wp_enqueue_style('normalize', get_template_directory_uri().'/css/core/normalize.css', null, '8.0.1');
        wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/plugins/bootstrap.css', null, '5.3.0');
        wp_enqueue_style('slick', get_template_directory_uri().'/css/plugins/slick.css', null, null);
        wp_enqueue_style('bootstrap-customizer', get_template_directory_uri().'/css/core/customizer.css', null, null);
        //plugins
        //wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/css/plugins/font-awesome.css', null, '4.2.0' );
        wp_enqueue_style('animate', get_template_directory_uri().'/css/plugins/animate.css', null, null);
        wp_enqueue_style('hover', get_template_directory_uri().'/css/plugins/hover.css', null, '1.0.8');
        wp_enqueue_style('owl', get_template_directory_uri().'/css/plugins/owl.carousel.css', null, '1.3.2');
        wp_enqueue_style('owl', get_template_directory_uri().'/css/plugins/owl.theme.default.css', null, 'null');
        wp_enqueue_style('owl-trans', get_template_directory_uri().'/css/plugins/owl.transitions.css', null, '1.3.2');
        wp_enqueue_style('remodal', get_template_directory_uri().'/css/plugins/jquery.remodal.css', null, null);

        //Custom Styles
        wp_enqueue_style('fontello', get_template_directory_uri().'/css/plugins/fontello.css', null, null);
    }

    if (is_single(114724)) {
        add_action('wp_enqueue_scripts', 'bootstrap_scripts_and_styles_old');
    }
}

// For ACF: Options add-on
add_filter('acf/options_page/settings', 'my_options_page_settings');
function my_options_page_settings($options)
{
    $options['title'] = __('Theme Settings');
    $options['pages'] = [
        __('Header'),
        __('Footer'),
        //__('Home Slider')
    ];
    return $options;
}

/***********************
 * PUT YOUR FUNCTIONS BELOW
********************************/

// Stick Admin Bar To The Top
if (!is_admin()) {
    add_action('get_header', 'my_filter_head');

    function my_filter_head()
    {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }

    function stick_admin_bar()
    {
        echo "
            <style type='text/css'>
                body.admin-bar {margin-top:32px !important}
                @media screen and (max-width: 782px) {
                    body.admin-bar { margin-top:46px !important }
                }
                @media screen and (max-width: 600px) {
                    body.admin-bar { margin-top:46px !important }
                    html #wpadminbar{ margin-top: -46px; }
                }
            </style>
            ";
    }

    add_action('admin_head', 'stick_admin_bar');
    add_action('wp_head', 'stick_admin_bar');
}

function admin_logo_custom_url()
{
    $site_url = get_bloginfo('url');
    return ($site_url);
}
add_filter('login_headerurl', 'admin_logo_custom_url');

function new_excerpt_more($more)
{
    return '.';
}
add_filter('excerpt_more', 'new_excerpt_more');

add_filter('mce_css', 'tuts_mcekit_editor_style');
function tuts_mcekit_editor_style($url)
{

    if (!empty($url)) {
        $url .= ',';
    }

    // Retrieves the plugin directory URL
    // Change the path here if using different directories
    $url .= trailingslashit(plugin_dir_url(__FILE__)) . '/editor-styles.css';
    return $url;
}

// Turn off visual editor for everything but sliders
add_filter('user_can_richedit', 'disable_visual_editor');
function disable_visual_editor()
{
    if ('slider' == get_post_type()) {
        return true;
    }
    return false;
}

// Make months AP style
function ap_date()
{
    if (get_the_time('m')=='01') :
        $apmonth = 'Jan. ';
    elseif (get_the_time('m')=='02') :
        $apmonth = 'Feb. ';
    elseif (get_the_time('m')=='08') :
        $apmonth = 'Aug. ';
    elseif (get_the_time('m')=='09') :
        $apmonth = 'Sept. ';
    elseif (get_the_time('m')=='10') :
        $apmonth = 'Oct. ';
    elseif (get_the_time('m')=='11') :
        $apmonth = 'Nov. ';
    elseif (get_the_time('m')=='12') :
        $apmonth = 'Dec. ';
    else:
        $apmonth = (get_the_time('F'));
    endif;
    //$thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    $thedate = $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    return $thedate;
}

// Make months AP style for audio/video
function ap_audio_video_date($postID)
{
    if (get_the_time('m', $postID) =='01') :
        $apmonth = 'Jan. ';
    elseif (get_the_time('m', $postID) == '02') :
        $apmonth = 'Feb. ';
    elseif (get_the_time('m', $postID) == '08') :
        $apmonth = 'Aug. ';
    elseif (get_the_time('m', $postID) == '09') :
        $apmonth = 'Sept. ';
    elseif (get_the_time('m', $postID) == '10') :
        $apmonth = 'Oct. ';
    elseif (get_the_time('m', $postID) == '11') :
        $apmonth = 'Nov. ';
    elseif (get_the_time('m', $postID) == '12') :
        $apmonth = 'Dec. ';
    else:
        $apmonth = (get_the_time('F', $postID));
    endif;
    //$thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    $thedate = $apmonth . ' ' . get_the_time('j', $postID) . ', ' . get_the_time('Y', $postID);
    return $thedate;
}

// Make months AP noticias style
function ap_noticias_date()
{
    if (get_the_time('m')=='01') :
        $apmonth = 'Enero ';
    elseif (get_the_time('m')=='02') :
        $apmonth = 'Feb. ';
    elseif (get_the_time('m')=='03') :
        $apmonth = 'Marzo ';
    elseif (get_the_time('m')=='04') :
        $apmonth = 'Abr. ';
    elseif (get_the_time('m')=='05') :
        $apmonth = 'May ';
    elseif (get_the_time('m')=='06') :
        $apmonth = 'Jun. ';
    elseif (get_the_time('m')=='07') :
        $apmonth = 'Jul. ';
    elseif (get_the_time('m')=='08') :
        $apmonth = 'Agosto ';
    elseif (get_the_time('m')=='09') :
        $apmonth = 'Set. ';
    elseif (get_the_time('m')=='10') :
        $apmonth = 'Oct. ';
    elseif (get_the_time('m')=='11') :
        $apmonth = 'Nov. ';
    elseif (get_the_time('m')=='12') :
        $apmonth = 'Dic. ';
    else:
        $apmonth = (get_the_time('F'));
    endif;
    //$thedate = get_the_time('l') . ', ' . $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    $thedate = $apmonth . ' ' . get_the_time('j') . ', ' . get_the_time('Y');
    return $thedate;
}

// Enable single category custom template. Currently for Big Boy template but others can be added
// To use: Create a category, then name the template file single-cat-slug.php
// From http://justintadlock.com/archives/2008/12/06/creating-single-post-templates-in-wordpress
define('SINGLE_PATH', TEMPLATEPATH . '/templates');
add_filter('single_template', 'my_single_template');
function my_single_template($single)
{
    global $wp_query, $post;
    foreach ((array)get_the_category() as $cat) :
        if (file_exists(SINGLE_PATH . '/single-cat-' . $cat->slug . '.php')) {
            return SINGLE_PATH . '/single-cat-' . $cat->slug . '.php';
        }
    endforeach;
    return $single;
}
// Remove auto generated feed links
function my_remove_feeds()
{
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
}
add_action('after_setup_theme', 'my_remove_feeds');

/*******************************************************************************/

// Move Yoast to bottom
function wpcover_move_yoast()
{
    return 'high';
}
add_filter('wpseo_metabox_prio', 'wpcover_move_yoast');

// Update author to reflect byline
function update_wpseo_meta_author_filter( $author_name, $presentation ){
  $externalAuthorCount = 1;
  $internalAuthorCount = 0;
  $commaSeparator = ',';
  $andSeparator = ' and ';
  $cnStaffTotalCounter = 0;
  $externalStaffTotalCounter = 0;
  $authorName = '';

  if (have_rows('byline_info', get_the_ID())) {
      while (have_rows('byline_info', get_the_ID())) {
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

  /*if ($cnStaffTotalCounter > 0) {
      if (have_rows('byline_info', get_the_ID())) {
          $sepCounter = 0;
          while (have_rows('byline_info', get_the_ID())) {
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

      if (have_rows('byline_info', get_the_ID())) {
          $sepCounter = 0;
          while (have_rows('byline_info', get_the_ID())) {
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
  }*/

  $author_name = $cnStaffTotalCounter;
  //$author_name = "Cronkite News";
	return $author_name;
}
add_filter( 'wpseo_meta_author', 'update_wpseo_meta_author_filter', 10, 2 );

// custom post type for students
function students_CPT()
{
    $cpt_students_labels = [
        'name'               => _x('Students', 'post type general name'),
        'singular_name'      => _x('Student', 'post type singular name'),
        'add_new'            => _x('Add New', 'Student'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a student'),
        'not_found'          => __('No student found'),
        'not_found_in_trash' => __('No student found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Students',
    ];
    $cpt_students_args = [
        'labels'        => $cpt_students_labels,
        'description'   => 'Display Student',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('students', $cpt_students_args);
}
add_action('init', 'students_CPT');

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(
        [
        'title'      => 'Student Settings',
        'parent'     => 'edit.php?post_type=students',
        'capability' => 'manage_options',
        ]
    );
}

// custom post type for staff
function staff_CPT()
{
    $cpt_staff_labels = [
        'name'               => _x('Staff', 'post type general name'),
        'singular_name'      => _x('Staff', 'post type singular name'),
        'add_new'            => _x('Add New', 'Staff'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a staff'),
        'not_found'          => __('No student found'),
        'not_found_in_trash' => __('No student found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Cronkite Staff',
    ];
    $cpt_staff_args = [
        'labels'        => $cpt_staff_labels,
        'description'   => 'Display Staff',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('cn_staff', $cpt_staff_args);
}
add_action('init', 'staff_CPT');


// custom tags for stories
function storytags_CPT()
{
    $storytags_labels = [
        'name'               => _x('Story Tags', 'post type general name'),
        'singular_name'      => _x('Story Tag', 'post type singular name'),
        'add_new'            => _x('Add New', 'Story Tag'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a story tag'),
        'not_found'          => __('No story tag found'),
        'not_found_in_trash' => __('No story tag found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Story Tags',
    ];
    $storytags_args = [
        'labels'        => $storytags_labels,
        'description'   => 'Display Story Tags',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('storytags', $storytags_args);
}
add_action('init', 'storytags_CPT');


// in this series
function inThisSeries_CPT()
{
    $inThisSeries_labels = [
        'name'               => _x('In This Series', 'post type general name'),
        'singular_name'      => _x('In This Series', 'post type singular name'),
        'add_new'            => _x('Add New', 'Series'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a series'),
        'not_found'          => __('No story tag found'),
        'not_found_in_trash' => __('No story tag found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'In This Series',
    ];
    $inThisSeries_args = [
        'labels'        => $inThisSeries_labels,
        'description'   => 'Display In This Series',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('inthisseries', $inThisSeries_args);
}
add_action('init', 'inThisSeries_CPT');


// custom post type for staff
function explore_CPT()
{
    $cpt_explore_labels = [
        'name'               => _x('Explores', 'post type general name'),
        'singular_name'      => _x('Explore', 'post type singular name'),
        'add_new'            => _x('Add New', 'Story'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a story'),
        'not_found'          => __('No student found'),
        'not_found_in_trash' => __('No student found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Explore Section',
    ];
    $cpt_explore_args = [
        'labels'        => $cpt_explore_labels,
        'description'   => 'Display Stories',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('explore_stories', $cpt_explore_args);
}
add_action('init', 'explore_CPT');


// custom post type for election2020
function election2020_CPT()
{
    $cpt_election2020_labels = [
        'name'               => _x('Election 2020', 'post type general name'),
        'singular_name'      => _x('Election 2020', 'post type singular name'),
        'add_new'            => _x('Add New', 'Election Post'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a Election Post'),
        'not_found'          => __('No posts found'),
        'not_found_in_trash' => __('No posts found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Election 2020',
    ];
    $cpt_election2020_args = [
        'labels'        => $cpt_election2020_labels,
        'description'   => 'All Posts',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('election2020', $cpt_election2020_args);
}
add_action('init', 'election2020_CPT');

if (function_exists('acf_add_options_sub_page')) {
    acf_add_options_sub_page(
        [
        'title'      => 'Election Homepage',
        'parent'     => 'edit.php?post_type=election2020',
        'capability' => 'manage_options',
        ]
    );
}

// custom post type for audio/video
function audioVideo_CPT()
{
    $cpt_audiovideo_labels = [
        'name'               => _x('Audio/Video', 'post type general name'),
        'singular_name'      => _x('Audio/Video', 'post type singular name'),
        'add_new'            => _x('Add New', 'Audio/Video'),
        'add_new_item'       => __('Add New'),
        'edit_item'          => __('Edit'),
        'new_item'           => __('New '),
        'all_items'          => __('All'),
        'view_item'          => __('View'),
        'search_items'       => __('Search for a audio/video'),
        'not_found'          => __('No student found'),
        'not_found_in_trash' => __('No student found in the Trash'),
        'parent_item_colon'  => '',
        'menu_name'          => 'Audio/Video',
    ];
    $cpt_audiovideo_args = [
        'labels'        => $cpt_audiovideo_labels,
        'description'   => 'Display Audio/Video',
        'public'        => true,
        'menu_icon'    => false,
        'menu_position' => 5,
        'has_archive'   => true,
        'hierarchical'  => true,
        'supports'      => [ 'title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ];
    register_post_type('audioVideoCPT', $cpt_audiovideo_args);
}
add_action('init', 'audioVideo_CPT');


function cn_search_query($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_search()) {
            $query->set('orderby', 'date');
        }
    }
}
add_action('pre_get_posts', 'cn_search_query');

function add_file_types_to_uploads($file_types)
{
    $new_filetypes = [];
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes);
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

add_action('init', 'custom_init_storytags');
function custom_init_storytags()
{
    remove_post_type_support('storytags', 'comments');
}

function audiovideoCPT_remove_wp_seo_meta_box()
{
    remove_meta_box('wpseo_meta', 'audioVideoCPT', 'normal');
}
add_action('add_meta_boxes', 'audiovideoCPT_remove_wp_seo_meta_box', 100);

/* URL rewrite rule for CN staff people page */
add_filter('query_vars', 'add_staff_name_var', 0, 1);
function add_staff_name_var($vars)
{
    $vars[] = 'staffname';
    return $vars;
}
add_rewrite_rule('^people/([^/]+)/?$', 'index.php?pagename=people&staffname=$matches[1]', 'top');

/* URL rewrite rule for Audio story page */
add_filter('query_vars', 'add_audio_story_var', 0, 1);
function add_audio_story_var($vars)
{
    $vars[] = 'audio_id';
    $vars[] = 'audio_title';
    return $vars;
}
add_rewrite_rule('^audio/story/([^/]+)/([^/]+)/?$', 'index.php?page_id=175279&audio_id=$matches[1]&audio_title=$matches[2]', 'top');

// change tags label to keywords
function change_tax_object_label()
{
    global $wp_taxonomies;
    $labels = &$wp_taxonomies['post_tag']->labels;
    $labels->name = __('Keywords', 'framework');
    $labels->singular_name = __('Keywords', 'framework');
    $labels->search_items = __('Search Keywords', 'framework');
    $labels->all_items = __('Keywords', 'framework');
    $labels->separate_items_with_commas = __('Separate Keywords with commas', 'framework');
    $labels->choose_from_most_used = __('Choose from the most used Keywords', 'framework');
    $labels->popular_items = __('Popular Keywords', 'framework');
    $labels->edit_item = __('Edit Keyword Name', 'framework');
    $labels->view_item = __('View Keyword Name', 'framework');
    $labels->update_item = __('Update Keyword Name', 'framework');
    $labels->add_new_item = __('Add Your Keyword Name', 'framework');
    $labels->new_item_name = __('Your New Keywords Name', 'framework');
}
add_action('init', 'change_tax_object_label');

?>
