$(document).foundation(),$(document).ready(function(){
  //TweenMax.set(".first-scroll-section .scene2", {autoAlpha:0});

  ScrollTrigger.create({
    trigger: ".first-scroll-section",
    start: "top top",
    end: "+=1600px",
    pin: true
  });

  gsap.to(".first-scroll-section .pinned-overlay-text", {
    scrollTrigger: {
      trigger: ".first-scroll-section",
      start: "top top",
      end: "+=800",
      scrub: true
    },
    opacity: 0
  });

  ScrollTrigger.create({
    trigger: ".second-scroll-section",
    start: "top top",
    end: "+=1600px",
    pin: true
  });

  gsap.to(".second-scroll-section .pinned-overlay-text", {
    scrollTrigger: {
      trigger: ".second-scroll-section",
      start: "top top",
      end: "+=800",
      scrub: true
    },
    opacity: 0
  });

});
