//declaring functions to be used on this page

//sizes the checked in members to be 1/3 of the page with some padding
function sizeResults() {
	var $results = $('.result')
	var wrapperWidth = $('.results-wrapper').width();
	var resultSize = ((wrapperWidth - 90) / 3)-3; //calculation is width minus all horizontal margins divided by 3. the 105 is 30(l&r margin of each result)*3, + 30 on either side of wrapper
	$results.width(resultSize);
	$results.height(resultSize);
}

function hideKeyboard() {
    document.activeElement.blur();
    $("input").blur();
};

// requestanimationframe disabled until we figure out ios stuff
/*(function() {
    var lastTime = 0;
    var vendors = ['ms', 'moz', 'webkit', 'o'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame = window[vendors[x]+'CancelAnimationFrame']
                                   || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
        };
}());*/

//handles the clicking of the hamburger menu


//function to animate the header out of view when scrolling down and back into view when scrolling up. needs to be replaced.
// function stickyHeader(){

// 	var $header = $('.nav-container');
// 	$(window).scroll(function(){

// 		var newScrollPosition = $(window).scrollTop();

// 		if (newScrollPosition > 150) {

// 			$header.css('transition', '.5s');
// 			var scrollDiff = Math.abs(newScrollPosition - scrollPosition);

// 			if (newScrollPosition > scrollPosition) {
// 				if (scrollDiff > 10){
// 					scrollPosition = newScrollPosition;
// 					$header.css('display','none');
// 					$header.css('top','-70px');
// 					setTimeout(function(){
// 						$header.css('position','fixed');
// 						$header.css('display','block');
// 					},10);
// 				}
// 			}

// 			else {
// 				if (scrollDiff > 25){
// 					scrollPosition = newScrollPosition
// 					$header.css('top','0px')
// 					setTimeout(function(){$header.css('position','fixed');},10);
// 				}
// 			}
// 		}

// 		else if (newScrollPosition == 0){
// 			$('.search-container').css('position','static')
// 			// $header.css('transition', '0s');
// 		}
// 	});
// }

// //initializing some global variables

// var scrollPosition = 0;

var Header = {

	init : function() {

		// requestAnimationFrame(Header.stickify);
		Header.stickify();

	},

	element : $(".nav-container"),

	previousDistance : 0,

	stickify : function() {

		$(window).scroll(function() {

			var distance = $(document).scrollTop();

			if(distance > 150) {

				if(distance > Header.previousDistance && distance > Header.previousDistance + 10) {

					Header.element.addClass('hidden');

				} else if (distance < Header.previousDistance && distance < Header.previousDistance + 10) {

					Header.element.removeClass('hidden');

				}

				Header.previousDistance = distance;

			} else if(distance > 0) {

				if(distance > Header.previousDistance) {

					Header.element.addClass('hidden');

				} else if (distance < Header.previousDistance) {

					Header.element.removeClass('hidden');

				}

				Header.previousDistance = distance;

			}

			// requestAnimationFrame(Header.stickify);

		});

	}

}
// ** header animations disabled until ios solution is found. **
//Header.init();

//calling functions

sizeResults();

// stickyHeader();
