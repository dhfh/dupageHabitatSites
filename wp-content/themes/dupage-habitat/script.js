jQuery(document).ready(function($) {
	$( "#dphfh-page-tabs" ).tabs();
	
//	$(".menu-container").each(function(){
//		var outerWidth = $(this).parent().width();
//		var innerWidth = $(this).find('a').length * 240;
//		$(this).css('width',innerWidth+'px');
//		adjust_for_scrolling($(this), innerWidth, outerWidth);
//	});
//	$(window).resize(function() {
//		$(".menu-container").each(function(){
//			var outerWidth = $(this).parent().width();
//			var innerWidth = $(this).find('a').length * 240;
//			adjust_for_scrolling($(this), innerWidth, outerWidth);
//		});
//	});
});

function adjust_for_scrolling(slider, innerWidth, outerWidth) {
	if (innerWidth > outerWidth) {
		makeScrollable(slider.parent(),slider);
//		slider.find('a:first-child').css({
//			'padding-left':'00px'
//		});
//		slider.find('a:last-child').css({
//			'padding-right':'00px'
//		});
	}
	else {
		slider.css('display','inline');
		widthDiff = outerWidth - innerWidth;
		slider.find('a:first-child').css({
			'padding-left':widthDiff/2+'px'
		});
	}
}

function makeScrollable($outer, $inner){
    var extra           = 800;
    //Get menu width
    var divWidth = $outer.width();
    //Remove scrollbars
    $outer.css({
        overflow: 'hidden'
    });
	$inner.css({
        display: 'block'
    });
    //Find last image in container
    var lastElem = $inner.find('a:last');
    $outer.scrollLeft(0);
    //When user move mouse over menu
    $outer.unbind('mousemove').bind('mousemove',function(e){
        var containerWidth = lastElem[0].offsetLeft + lastElem.outerWidth() + 2*extra;
        var left = (e.pageX - $outer.offset().left) * (containerWidth-divWidth) / divWidth - extra;
        $outer.scrollLeft(left);
    });
}