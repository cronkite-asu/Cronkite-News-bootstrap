<?php
/**
 * Footer
 */
?>

  <?php if(current_user_can('administrator')) { ?>
  <!-- back to top -->
  <a id="back-to-top">
    <i class="fa-solid fa-circle-chevron-up"></i>
  </a>

  <!-- social icons -->
  <div id="social-icons-desktop" class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_vertical_style show-for-medium" data-a2a-scroll-show="0,0" style="bottom:30px; left:30px;">
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_linkedin"></a>
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
  </div>
  <div id="social-icons-mobile" class="a2a_kit a2a_kit_size_32 a2a_floating_style a2a_default_style show-for-small-only" data-a2a-scroll-show="100,100" style="bottom:0px; left:50%; transform:translateX(-50%);">
      <a class="a2a_button_facebook"></a>
      <a class="a2a_button_twitter"></a>
      <a class="a2a_button_linkedin"></a>
      <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
  </div>
  <script>
    var a2a_config = a2a_config || {};
    a2a_config.track_links = 'ga';
    a2a_config.icon_color = "#dadada,white";
    a2a_config.color_link_text_hover = "646464";
  </script>
  <?php } ?>

  <!-- footer -->
  <div id="footer">
    <footer class="grid-container full-width">
      <div class="grid-x grid-padding-x">
        <div class="large-3 medium-3 small-6 cell">
          <h6>Who we are</h6>
          <p>Cronkite News is produced by the <a href="https://cronkite.asu.edu/" target="_blank">Walter Cronkite School of Journalism and Mass Communication</a> at <a href="https://www.asu.edu/" target="_blank">Arizona State University</a>.</p>
          <p>Staff members are listed <a href="https://cronkitenews.azpbs.org/about-us/" target="_blank">here</a>.</p>
        </div>

        <div class="large-3 medium-3 small-6 cell">
          <h6>What we do</h6>
          <p><a href="https://cronkitenews.azpbs.org/what-we-do/" target="_blank">Learn more</a> about what we do and how to find our content on our broadcast, digital and social media platforms.</p>
          <h6 class="inside">Use our content</h6>
          <p>Find out how your news organization can use <a href="https://cronkitenews.azpbs.org/use-our-content/" target="_blank">Cronkite News content</a>.</p>
        </div>

        <div class="large-3 medium-3 small-6 cell">
          <h6>Get in touch</h6>
          <p><a href="https://cronkitenews.azpbs.org/daily-newsletter-signup/" target="_blank">Sign up</a> for daily headlines.</p>
          <p>555 N. Central Ave. Phoenix, AZ, 85004</p>
          <p>602.496.5050</p>
          <p><a href="mailto:cronkitenews@asu.edu">cronkitenews@asu.edu</a></p>
        </div>

        <div class="large-3 medium-3 small-6 cell">
          <h6>Read more</h6>
          <ul class="no-bullet">
            <li><a href="https://cronkitenoticias.azpbs.org/" target="_blank">Cronkite Noticias</a></li>
            <li><a href="http://news21.com/" target="_blank">Carnegie-Knight News21</a></li>
            <li><a href="/category/special-reports/">Special Reports</a></li>
            <li><a href="/rss-feed">RSS</a></li>
            <li><a href="/weather">Weather</a></li>
          </ul>
        </div>
      </div>
      <div class="grid-x grid-margin-x copyright-section">
        <div class="large-4 cell">
          <p class="copyright">&copy; <?php echo date('Y'); ?> Cronkite News. All rights reserved.</p>
        </div>
        <div class="large-4 medium-4 small-12 cell">
          <p><a href="https://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons</a> <a href="https://www.asu.edu/privacy/" target="_blank">Privacy statement</a></p>
        </div>
        <div class="large-4 medium-4 small-12 cell text-right">
          <ul class="social-links no-bullet">
            <li><a href="https://twitter.com/cronkitenews" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="https://www.instagram.com/cronkitenews/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="https://www.facebook.com/cronkitenewsazpbs" target="_blank"><i class="fab fa-facebook"></i></a></li>
            <li><a href="https://www.youtube.com/user/cronkitenewswatch" target="_blank"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>

  <!-- Add This Social Sharing -->
  <?php if (is_single()) { ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555a00cd1124129e" async="async"></script>
  <?php } elseif (!is_page('impeachment-sentiment')) { ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555a00cd1124129e" async="async"></script>
  <?php } ?>

  <!-- scripts -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <?php wp_footer(); ?>
  <script type='text/javascript'>
      var _sf_async_config={};
      /** CONFIGURATION START **/
      _sf_async_config.uid = 60481;
      _sf_async_config.domain = 'cronkitenews.azpbs.org';
      _sf_async_config.useCanonical = true;
      _sf_async_config.sections = 'Change this to your Section name';  //CHANGE THIS
      _sf_async_config.authors = 'Change this to your Author name';    //CHANGE THIS
      /** CONFIGURATION END **/
      (function(){
        function loadChartbeat() {
          window._sf_endpt=(new Date()).getTime();
          var e = document.createElement('script');
          e.setAttribute('language', 'javascript');
          e.setAttribute('type', 'text/javascript');
          e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
          document.body.appendChild(e);
        }
        var oldonload = window.onload;
        window.onload = (typeof window.onload != 'function') ?
           loadChartbeat : function() { oldonload(); loadChartbeat(); };
      })();
  </script>

  <!-- Twitter universal website tag code -->
  <script>
  !function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
  },s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
  a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
  // Insert Twitter Pixel ID and Standard Event data below
  twq('init','nyyg8');
  twq('track','PageView');
  </script>
  <!-- End Twitter universal website tag code -->

  <!-- AlertMe website tag code -->
  <script>
  //(function (d) { var src = 'https://app.alertme.news/build/'; var publisher = '100'; var head = d.getElementsByTagName('head')[0]; var script = d.createElement('script'); script.type = 'text/javascript'; script.src = src + 'button.js'; head.appendChild(script); script.onload = function () { AlertMeGlobalVariableNamespace.run(src, publisher); } })(document);
  </script>
  <!-- End AlertMe website tag code -->

  <script src="<?php bloginfo('template_directory');?>/assets/js/vendor/what-input.js"></script>
  <script src="<?php bloginfo('template_directory');?>/assets/js/vendor/foundation.js"></script>
  <script async src="https://static.addtoany.com/menu/page.js"></script>
  <script src="<?php bloginfo('template_directory');?>/assets/js/app.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory');?>/assets/js/vendor/smooth-scroll/dist/smooth-scroll.js"></script>
  <script src="<?php bloginfo('template_directory');?>/assets/js/vendor/plyr-master/dist/plyr.js"></script>
  <script src="<?php bloginfo('template_directory');?>/assets/js/vendor/before-after/js/jquery.event.move.js"></script>
  <script src="<?php bloginfo('template_directory');?>/assets/js/vendor/before-after/js/jquery.twentytwenty.js"></script>

  <script>
  /**
   * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
   *
   * @private
   * @author Todd Motto
   * @link https://github.com/toddmotto/foreach
   * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
   * @callback requestCallback      callback   - Callback function for each iteration.
   * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
   * @returns {}
   */
    var forEach=function(t,o,r){if ("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

    var hamburgers = document.querySelectorAll(".hamburger");
    if (hamburgers.length > 0) {
      forEach(hamburgers, function(hamburger) {
        hamburger.addEventListener("click", function() {
          this.classList.toggle("is-active");
        }, false);
      });
    }

    // Search: expand on click
    $('.search-box img').click(function() {
      $('#searchform input[type=text]').blur(function() {
        if ($.trim(this.value).length > 0) {
          $("#searchform").submit();
        } else {
        }
      });

      if ($('.search-box input.onSearchIconClick').length) {
        $('.search-box input').removeClass('onSearchIconClick');
      } else {
        $('.search-box input').addClass('onSearchIconClick');
      }
    });


    $(document).ready(function() {

      // video player
      const controls = [
              'play-large', // The large play button in the center
              'restart', // Restart playback
              'rewind', // Rewind by the seek time (default 10 seconds)
              'play', // Play/pause playback
              'fast-forward', // Fast forward by the seek time (default 10 seconds)
              'progress', // The progress bar and scrubber for playback and buffering
              'current-time', // The current time of playback
              'duration', // The full duration of the media
              'mute', // Toggle mute
              'volume', // Volume control
              'captions', // Toggle captions
              'settings', // Settings menu
              'pip', // Picture-in-picture (currently Safari only)
              'airplay', // Airplay (currently Safari only)
              'download', // Show a download button with a link to either the current source or a custom URL you specify in your options
              'fullscreen' // Toggle fullscreen
          ];
      const quality = { default: 576, options: [4320, 2880, 2160, 1440, 1080, 720, 576, 480, 360, 240] };
      const controlsHome = ['play-large'];
      const player = new Plyr('#player', { quality });
      const playerHome = new Plyr('#player-home', { controlsHome });
      const player1 = new Plyr('#youth-suicide-player', { quality });
      const mainAudioPlayer = new Plyr('#main-audio-player', {});
      const storyAudioPlayer = new Plyr('#story-audio-player', {});

      var scroll = new SmoothScroll('a[href*="#"]');

      var $window = $(window);
      var $videoWrap = $('.video-wrap');
      var $video = $('.video');
      var videoHeight = $video.outerHeight();
      var userClosed = false;


      if ($('.video-wrap').length) {
        $window.on('scroll',  function() {
          var windowScrollTop = $window.scrollTop();
          var videoBottom = videoHeight + $videoWrap.offset().top;

          if ((windowScrollTop > videoBottom) && userClosed == false) {
            $videoWrap.height(videoHeight);
            $video.addClass('stuck');
          } else {
            $videoWrap.height('auto');
            $video.removeClass('stuck');
          }
        });

        $('.close-video').click(function() {
          userClosed = true;
          $videoWrap.height('auto');
          $video.removeClass('stuck');
        });
      }

      // before and after photo slider
      $(window).on('load', function() {
        $('.before-after-photos .photos').twentytwenty();
      });

      // show author bio on sidebar
      $window.on('scroll',  function() {
        var windowScrollTop = $window.scrollTop();

        if ((windowScrollTop >= 500)) {
          $('.sidebar-staff').fadeIn("slow");
        } else {
          $('.sidebar-staff').fadeOut("slow");
        }
      });

      $('.story-photos').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000
      });

      $('.homepage-slider').slick({
        infinite: true,
        dots: true,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true
      });

      $('.homepage-special-projects').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
      });

      // sports featured photos
      $('.sports-featured-photos').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        responsive: [
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
      });

      // homepage featured photos
      $('.news-featured-photos').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: true,
        cssEase: 'linear',
        responsive: [
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
      });

      $('.media-literacy-slideshow').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: true,
        responsive: [
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
      });

      $('.audio-featured-stories').slick({
        infinite: true,
        dots: true,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
      });

      $('.story-slideshow').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000
      });

      $('.in-this-series').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        dots: false,
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });

      $('.headshot-slider').slick({
        infinite: true,
        slidesToShow: 11,
        slidesToScroll: 1,
        dots: false,
        centerMode: false,
        centerPadding: '60px',
        autoplay: false,
        autoplaySpeed: 3000,
        responsive: [
          {
            breakpoint: 1048,
            settings: {
              slidesToShow: 5,
              slidesToScroll: 3,
              infinite: true,
              dots: false
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1
            }
          }
          // You can unslick at a given breakpoint now by adding:
          // settings: "unslick"
          // instead of a settings object
        ]
      });

      $('.featured-health-stories').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
           {
             breakpoint: 768,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           },
           {
             breakpoint: 480,
             settings: {
               slidesToShow: 1,
               slidesToScroll: 1
             }
           }
         ]
      });

      // audio player sticky
      $(window).scroll(function(){
        var sticky = $('.audio-player-container'),
            scroll = $(window).scrollTop();

        if (scroll >= 222) {
          sticky.addClass('fixed');
        } else {
          sticky.removeClass('fixed');
        }
      });

      // audio page player
      $('.audio-plyr').click(function () {
        console.log($(this).data("link"));
        console.log($(this).data("title"));
        $('#main-audio-player').attr("src", $(this).data("link"));
        $('.current-audio-title').text($(this).data("title"));
        mainAudioPlayer.play();
      });

      jQuery('.hamburger').click(function() {
              if (jQuery('.hamburger.is-active').length) {
                  jQuery('#sub_nav').addClass('open').removeClass('close');
                  jQuery('.sub_nav').removeClass('slideOutUp').addClass('slideInDown');
                  jQuery('.sub_nav').css("display", "block");
              } else {
                  jQuery('#sub_nav').addClass('close').removeClass('open');
                  jQuery('.sub_nav').removeClass('slideInDown').addClass('slideOutUp');
          jQuery('.sub_nav').css("display", "none");
              }
          });

      $('.dropdown-el').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#'+$(e.target).attr('for')).prop('checked',true);
      });
      $(document).click(function() {
        $('.dropdown-el').removeClass('expanded');
      });

      function BackgroundNode({node, loadedClassName}) {
      let src = node.getAttribute('data-background-image-url');
      let show = (onComplete) => {
        requestAnimationFrame(() => {
          node.style.backgroundImage = `url(${src})`
          node.classList.add(loadedClassName);
          onComplete();
        })
      }

      return {
        node,

        // onComplete is called after the image is done loading.
        load: (onComplete) => {
          let img = new Image();
          img.onload = show(onComplete);
          img.src = src;
        }
      }
    }

    let defaultOptions = {
      selector: '[data-background-image-url]',
      loadedClassName: 'loaded'
    }

    function BackgroundLazyLoader({selector, loadedClassName} = defaultOptions) {
      let nodes = [].slice.apply(document.querySelectorAll(selector))
        .map(node => new BackgroundNode({node, loadedClassName}));

      let callback = (entries, observer) => {
        entries.forEach(({target, isIntersecting}) => {
          if (!isIntersecting) {
            return;
          }

          let obj = nodes.find(it => it.node.isSameNode(target));

          if (obj) {
            obj.load(() => {
              // Unobserve the node:
              observer.unobserve(target);
              // Remove this node from our list:
              nodes = nodes.filter(n => !n.node.isSameNode(target));

              // If there are no remaining unloaded nodes,
              // disconnect the observer since we don't need it anymore.
              if (!nodes.length) {
                observer.disconnect();
              }
            });
          }
        })
      };

      let observer = new IntersectionObserver(callback);
      nodes.forEach(node => observer.observe(node.node));
    };
    BackgroundLazyLoader();

      var $window = $(window);

      function checkWidth() {
          var windowsize = $window.width();
          if (windowsize > 800) {
              $(window).scroll(function (event) {
                  var scroll = $(window).scrollTop();
                  if (scroll >= 250) {
                    $('#sub_nav').removeClass('slideInDown').addClass('slideOutUp');
                  } else if (scroll < 250) {
                    $('#sub_nav').removeClass('slideOutUp').addClass('slideInDown');
                  }
              });
          }
      }
      // Execute on load
      checkWidth();
      // Bind event listener
      $(window).resize(checkWidth);
    });
  </script>

</body>
</html>
