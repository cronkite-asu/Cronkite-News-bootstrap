$(document).foundation(),$(document).ready(function(){
  // Initial state
  var scrollPos = 0;
  // adding scroll event
  window.addEventListener('scroll', function(){
    // detects new state and compares it with the new one
    if ((document.body.getBoundingClientRect()).top > scrollPos) {  		
      $("html, body").css({'cursor': 'url(https://cronkitenews.azpbs.org/wp-content/uploads/2024/05/bee-up-cursor-icon.png), default'});
  	} else {
      $("html, body").css({'cursor': 'url(https://cronkitenews.azpbs.org/wp-content/uploads/2024/05/bee-down-cursor-icon.png), default'});
    }
  	// saves the new position for iteration.
  	scrollPos = (document.body.getBoundingClientRect()).top;
  });
});
