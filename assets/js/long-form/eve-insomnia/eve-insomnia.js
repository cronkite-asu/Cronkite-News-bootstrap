$('.eve-insomnia').slick({
  infinite: true,
  dots: false,
  centerMode: false,
  autoplay: false,
  arrows: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  prevArrow: '<button type="button" class="slick-prev pull-left"><img src="https://cronkitenews.azpbs.org/wp-content/uploads/2023/05/left-arrow.png"></button>',
  nextArrow: '<button type="button" class="slick-next pull-right"><<img src="https://cronkitenews.azpbs.org/wp-content/uploads/2023/05/right-arrow.png"></button>',
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
