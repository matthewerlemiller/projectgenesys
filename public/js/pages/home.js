//declaring functions to be used on this page

function sizeResults() {
	var $results = $('.result')
	var wrapperWidth = $('.results-wrapper').width();
	var resultSize = ((wrapperWidth - 90) / 3)-3; //calculation is width minus all horizontal margins divided by 3. the 105 is 30(l&r margin of each result)*3, + 30 on either side of wrapper
	$results.width(resultSize);
	$results.height(resultSize);
}

function stickyHeader(){

	var $header = $('.nav-container');
	$(window).scroll(function(){

		var newScrollPosition = $(window).scrollTop();

		if (newScrollPosition > 150) {

			$header.css('transition', '.5s');
			var scrollDiff = Math.abs(newScrollPosition - scrollPosition);

			if (newScrollPosition > scrollPosition) {
				if (scrollDiff > 10){
					scrollPosition = newScrollPosition;
					$header.css('display','none');
					$header.css('top','-70px');
					setTimeout(function(){
						$header.css('position','fixed');
						$header.css('display','block');
					},10);
				}
			}

			else {
				if (scrollDiff > 25){
					scrollPosition = newScrollPosition
					$header.css('top','0px')
					setTimeout(function(){$header.css('position','fixed');},10);
				}
			}
		}

		else if (newScrollPosition == 0){
			$('.search-container').css('position','static')
			// $header.css('transition', '0s');
		}d
	});
}

//initializing some variables

var scrollPosition = 0;


//calling functions

sizeResults();

stickyHeader();
