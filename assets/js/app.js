

window.onscroll = function() {progressIndicator()};

function progressIndicator() {
  if($("#progressBar").length) {
    var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    var scrolled = (winScroll / height) * 100;
    document.getElementById("progressBar").style.width = scrolled + "%";
  }
}

// olympics countdown
if($("#olympics-countdown").length) {
  var deadline = new Date("july 26, 2024 10:30:00").getTime();
  var x = setInterval(function() {

  var now = new Date().getTime();
  var t = deadline - now;
  var days = Math.floor(t / (1000 * 60 * 60 * 24));
  var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
  var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((t % (1000 * 60)) / 1000);
  document.getElementById("day").innerHTML =days ;
  document.getElementById("hour").innerHTML =hours;
  document.getElementById("minute").innerHTML = minutes;
  document.getElementById("second").innerHTML =seconds;
  if (t < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "GAME DAY";
    document.getElementById("day").innerHTML ='0';
    document.getElementById("hour").innerHTML ='0';
    document.getElementById("minute").innerHTML ='0' ;
    document.getElementById("second").innerHTML = '0'; }
  }, 1000);
}

/*var e = $("#back-to-top"),
$(window).scroll(function () {
    $(window).scrollTop() > 400 ? e.addClass("show") : e.removeClass("show");
}),
e.on("click", function (o) {
  o.preventDefault(), $("html, body").animate({ scrollTop: 0 }, "300");
});*/
