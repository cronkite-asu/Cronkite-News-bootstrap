$(document).ready(function() {

var $window = jQuery(window);

function checkWidthScrollTrigger() {
    var windowsize = $window.width();
    console.log (windowsize);
    if (windowsize > 800) {

      console.log('BIOSPHERE!!! enter');

      gsap.registerPlugin(ScrollTrigger);
      {
        const process = document.querySelector('.process');
        if ((typeof(process) != 'undefined' && process != null)) {
          let sections = gsap.utils.toArray('.process__item');
          gsap.to(sections, {
            xPercent: -100 * (sections.length - 1),
            ease: "none",
            scrollTrigger: {
              trigger: process,
              markers: false,
              scrub: 1,
              pin: true,
              snap: 1 / (sections.length - 1),
              end: () => "+=" + document.querySelector(".process").offsetWidth
            },
          });
        }
      }
    }
}
// Execute on load
checkWidthScrollTrigger();
// Bind event listener
jQuery(window).resize(checkWidthScrollTrigger);

});
