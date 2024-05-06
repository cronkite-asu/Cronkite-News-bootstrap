$(document).foundation(),$(document).ready(function(){
  TweenMax.set(".first-scroll-section .scene2", {autoAlpha:0});
  TweenMax.set(".first-scroll-section .scroll-down", {autoAlpha:0});

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

  /*gsap.to(".haiti-dr .scene1 .map", {
    scrollTrigger: {
      trigger: ".haiti-dr",
      start: "top top",
      end: "+=1000",
      scrub: true
    },
    opacity: 0,
    onComplete: function() {
        TweenMax.set(".haiti-dr .scene2", {autoAlpha:1});
        gsap.to(".haiti-dr .scene2", {
          scrollTrigger: {
            trigger: ".haiti-dr .scene2",
            start: "20% top",
            end: "+=700",
            scrub: true,
            onLeaveBack: () => {
              TweenMax.set(".haiti-dr .scene2", {autoAlpha:0});
            }
          },
          top: -2600,
          opacity: 1
        });
      }
  });*/
});

/*function a() {
    o.width() > 800 &&
        ($(".first-scroll-section").length &&
            (function o() {
                gsap.registerPlugin(ScrollTrigger),
                    TweenMax.set(".first-scroll-section .scroll-images .image-2", { autoAlpha: 0 }),
                    TweenMax.set(".first-scroll-section .scroll-images .image-3", { autoAlpha: 0 }),
                    TweenMax.set(".first-scroll-section .scroll-images .image-4", { autoAlpha: 0 }),
                    TweenMax.set(".first-scroll-section .scroll-images .image-5", { autoAlpha: 0 });
                let e = document.querySelector(".first-scroll-section .scroll-text-div"),
                    s = document.querySelector(".first-scroll-section .scroll-text"),
                    l = e.offsetHeight,
                    i = s.offsetHeight,
                    t = l - i,
                    a = gsap
                        .timeline()
                        .fromTo(".first-scroll-section .scroll-images .image-1", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 })
                        .fromTo(".first-scroll-section .scroll-images .image-1", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".first-scroll-section .scroll-images .image-2", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<")
                        .fromTo(".first-scroll-section .scroll-images .image-2", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".first-scroll-section .scroll-images .image-3", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<")
                        .fromTo(".first-scroll-section .scroll-images .image-3", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".first-scroll-section .scroll-images .image-4", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<")
                        .fromTo(".first-scroll-section .scroll-images .image-4", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".first-scroll-section .scroll-images .image-5", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<");
                a.fromTo(e, { y: 0 }, { y: -(1.25 * t), duration: 50, ease: "power3.inOut" }, 0),
                    ScrollTrigger.create({ trigger: ".first-scroll-section", start: "top 15%", end: "+=3500px", pin: !0, pinSpacing: !0, scrub: !0, force3D: !0, animation: a }),
                    window.addEventListener("resize", function () {
                        (l = e.offsetHeight), (i = s.offsetHeight);
                    });
            })(),
        $(".second-scroll-section").length &&
            (function o() {
                gsap.registerPlugin(ScrollTrigger),
                    TweenMax.set(".second-scroll-section .scroll-images .image-2", { autoAlpha: 0 }),
                    TweenMax.set(".second-scroll-section .scroll-images .image-3", { autoAlpha: 0 }),
                    TweenMax.set(".second-scroll-section .scroll-images .image-4", { autoAlpha: 0 }),
                    TweenMax.set(".second-scroll-section .scroll-images .image-5", { autoAlpha: 0 });
                let e = document.querySelector(".second-scroll-section .scroll-text-div"),
                    s = document.querySelector(".second-scroll-section .scroll-text"),
                    l = e.offsetHeight,
                    i = s.offsetHeight,
                    t = l - i,
                    a = gsap
                        .timeline()
                        .fromTo(".second-scroll-section .scroll-images .image-1", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 })
                        .fromTo(".second-scroll-section .scroll-images .image-1", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".second-scroll-section .scroll-images .image-2", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<")
                        .fromTo(".second-scroll-section .scroll-images .image-2", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".second-scroll-section .scroll-images .image-3", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<")
                        .fromTo(".second-scroll-section .scroll-images .image-3", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".second-scroll-section .scroll-images .image-4", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<")
                        .fromTo(".second-scroll-section .scroll-images .image-4", { autoAlpha: 1 }, { autoAlpha: 0, duration: 5 }, "+=5")
                        .fromTo(".second-scroll-section .scroll-images .image-5", { autoAlpha: 0 }, { autoAlpha: 1, duration: 5 }, "<");
                a.fromTo(e, { y: 0 }, { y: -(1.25 * t), duration: 50, ease: "power3.inOut" }, 0),
                    ScrollTrigger.create({ trigger: ".second-scroll-section", start: "top 15%", end: "+=3500px", pin: !0, pinSpacing: !0, scrub: !0, force3D: !0, animation: a }),
                    window.addEventListener("resize", function () {
                        (l = e.offsetHeight), (i = s.offsetHeight);
                    });
            })()
}*/
