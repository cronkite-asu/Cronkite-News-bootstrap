<?php
/**
 * Footer
 */
?>

  <a id="back-to-top"><i class="fas fa-chevron-circle-up"></i></a>

  <!-- footer -->
  <footer class="grid-container full-width">
    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-3 cell">
          <h6>Who we are</h6>
          <p>Cronkite News is produced by the <a href="https://cronkite.asu.edu/" target="_blank">Walter Cronkite School of Journalism and Mass Communication</a> at <a href="https://www.asu.edu/" target="_blank">Arizona State University</a>.</p>
          <p>Find a staff list and description of our beats <a href="https://cronkitenews.azpbs.org/about-us/" target="_blank">here</a>.</p>
          <p><a href="https://www.asu.edu/privacy/" target="_blank">Privacy statement</a></p>
        </div>

        <div class="large-3 cell">
          <h6>What we do</h6>
          <p><a href="https://cronkitenews.azpbs.org/what-we-do/" target="_blank">Learn more</a> about what we do and how to find our content on our broadcast, digital and social media platforms.</p>
          <h6>Use our content</h6>
          <p>Find out how your news organization can use <a href="https://cronkitenews.azpbs.org/use-our-content/" target="_blank">Cronkite News content</a>.</p>
        </div>

        <div class="large-3 cell">
          <h6>Get in touch</h6>
          <p><a href="https://cronkitenews.azpbs.org/daily-newsletter-signup/" target="_blank">Sign up</a> for daily headlines.</p>
          <p>555 N. Central Ave. Phoenix, AZ, 85004</p>
          <p>602.496.5050</p>
          <p><a href="mailto:cronkitenews@asu.edu">cronkitenews@asu.edu</a></p>
          <br />
          <h6>Follow</h6>
          <a href="https://twitter.com/cronkitenews" target="_blank"><i class="fab fa-twitter"></i></a> <a href="https://www.facebook.com/cronkitenewsazpbs" target="_blank"><i class="fab fa-facebook-square"></i></a> <a href="https://www.instagram.com/cronkitenews/" target="_blank"><i class="fab fa-instagram"></i></a> <a href="https://www.youtube.com/user/cronkitenewswatch" target="_blank"><i class="fab fa-youtube"></i></a>
        </div>

        <div class="large-3 cell">
          <h6>Read more</h6>
          <ul class="no-bullet">
            <li><a href="https://cronkitenoticias.azpbs.org/" target="_blank">Cronkite Noticias</a></li>
            <li><a href="http://news21.com/" target="_blank">Carnegie-Knight News21</a></li>
            <li><a href="/category/special-reports/">Special Reports</a></li>
            <li><a href="/rss-feed">RSS</a></li>
          </ul>
        </div>

        <div class="large-12 cell">
          <p class="copyright">&copy; <?php echo date('Y'); ?> Cronkite News. All rights reserved. <a href="https://creativecommons.org/licenses/by-sa/3.0/" target="_blank">Creative Commons</a></p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Add This Social Sharing -->
  <?php if (is_single()) { ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555a00cd1124129e" async="async"></script>
  <?php } elseif (!is_page('impeachment-sentiment')) { ?>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-555a00cd1124129e" async="async"></script>
  <?php } ?>

  <!-- scripts -->
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/jquery.js"></script>

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

  <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/what-input.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/foundation.js"></script>

  <!-- Greensock -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollToPlugin.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js"></script>

  <script src="<?php bloginfo('template_directory'); ?>/assets/js/app.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/slick/slick.min.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/smooth-scroll/dist/smooth-scroll.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/assets/js/vendor/plyr-master/dist/plyr.js"></script>

  <?php
    $settings = get_field('longform-settings', get_the_ID());
    if (isset($settings['scripts-file']) && $settings['scripts-file'] != '') {
  ?>
    <script src="<?php echo $settings['scripts-file']; ?>"></script>
  <?php } ?>

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
    jQuery('.search-box img').click(function() {

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


    jQuery(document).ready(function() {

      $(window).scroll(function () {
          $(window).scrollTop() > 1600 ? ($("#back-to-top").addClass("show")) : ($("#back-to-top").removeClass("show"));
      }),
      $("#back-to-top").on("click", function (e) {
          e.preventDefault(), $("html, body").animate({ scrollTop: 0 }, "300");
      });

      gsap.registerPlugin(ScrollTrigger);

      ScrollTrigger.create({
        trigger: ".invisible-chapters",
        start: "top top",
        end: "+=1400px",
        pin: true
      });

      gsap.to(".invisible-chapters h1", {
        scrollTrigger: {
          trigger: ".invisible-chapters",
          start: "top top",
          end: "+=800",
          scrub: true
        },
        opacity: 0
      });


      // star wars
      TweenMax.set(".star-wars .scene2", {autoAlpha:0});
      TweenMax.set(".star-wars .scene3 .crawl", {autoAlpha:0});

      ScrollTrigger.create({
        trigger: ".star-wars",
        start: "top top",
        end: "+=2200px",
        pin: true
      });

      gsap.to(".star-wars .scene1", {
        scrollTrigger: {
          trigger: ".star-wars",
          start: "top top",
          end: "+=1000",
          scrub: true
        },
        opacity: 0,
        onComplete: function() {
            TweenMax.set(".star-wars .scene2", {autoAlpha:1});
            TweenMax.set(".star-wars .scroll-down", {autoAlpha:0});

            gsap.to(".star-wars .scene2 .star-wars-headline", {
              scrollTrigger: {
                trigger: ".star-wars .scene2",
                start: "20% top",
                end: "+=700",
                scrub: true,
                onLeaveBack: () => {
                  TweenMax.set(".star-wars .scene2", {autoAlpha:0});
                }
              },
              scale: 0,
              onComplete: function () {
                TweenMax.set(".star-wars .scene3 .crawl", {autoAlpha:1});

                gsap.to(".star-wars .scene3 .crawl", {
                  scrollTrigger: {
                    trigger: ".star-wars .scene3",
                    start: "20% top",
                    end: "+=500",
                    scrub: true,
                    onLeaveBack: () => {
                      TweenMax.set(".star-wars .scene3 .crawl", {autoAlpha:0});
                    }
                  },
                  top: -2600,
                  opacity: 1
                });
              }
            });
          }
        });

        // long form intro slider
        jQuery('.intro-slider').slick({
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
      const player = new Plyr('#player', { quality });
      const audioPlayer1 = new Plyr('#player-tenecia-phillips', { quality });
      const audioPlayer2 = new Plyr('#player-ali-nervis', { quality });

      const audioPlayer3 = new Plyr('#mexican-wolf1', { quality });
      const audioPlayer4 = new Plyr('#mexican-wolf2', { quality });
      const audioPlayer5 = new Plyr('#mexican-wolf3', { quality });
      const audioPlayer6 = new Plyr('#mexican-wolf4', { quality });

      const audioPlayer7 = new Plyr('#arizon-focus-player1', { quality });

      const audioPlayer8 = new Plyr('#player-yvette-syverson', { quality });
      const audioPlayer9 = new Plyr('#player-steve-harmon', { quality });

      jQuery('#play-audio').on( "click", function() {
        $(this).addClass('hide');
        $('#pause-audio').removeClass('hide');
        $('#pause-audio').show();
        audioPlayer7.play();
      });

      jQuery('#pause-audio').on( "click", function() {
        $(this).addClass('hide');
        $('#play-audio').removeClass('hide');
        $('#play-audio').show();
        audioPlayer7.pause();
      });


      jQuery(".play-btn").on( "click", function() {
        jQuery('.movie-poster-overlay').hide();
        player.play();
      });

      var scroll = new SmoothScroll('a[href*="#"]');

      var $window = jQuery(window);
      var $videoWrap = jQuery('.video-wrap');
      var $video = jQuery('.video');
      var videoHeight = $video.outerHeight();
      var userClosed = false;


      if (jQuery('.video-wrap').length) {
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

        jQuery('.close-video').click(function() {
          userClosed = true;
          $videoWrap.height('auto');
          $video.removeClass('stuck');
        });
      }

      // show author bio on sidebar
      $window.on('scroll',  function() {
        var windowScrollTop = $window.scrollTop();

        if ((windowScrollTop >= 500)) {
          jQuery('.sidebar-staff').fadeIn("slow");
        } else {
          jQuery('.sidebar-staff').fadeOut("slow");
        }
      });

      jQuery('.story-photos').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000
      });

      jQuery('.story-slideshow').slick({
        infinite: true,
        dots: false,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 6000
      });

      jQuery('.in-this-series').slick({
        slidesToShow: 3,
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

      jQuery('.headshot-slider').slick({
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

      jQuery('.dropdown-el').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('expanded');
        $('#'+$(e.target).attr('for')).prop('checked',true);
      });
      jQuery(document).click(function() {
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

      var $window = jQuery(window);

      function checkWidth() {
          var windowsize = $window.width();
          if (windowsize > 800) {
              jQuery(window).scroll(function (event) {
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
      jQuery(window).resize(checkWidth);
    });
  </script>

</body>
</html>
