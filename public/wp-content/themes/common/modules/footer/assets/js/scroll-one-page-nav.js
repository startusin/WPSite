(function ($) {
    'use strict'
    jQuery(document).ready(function () { 
		//On Scroll Functionality
		$(window).scroll( () => {
			var windowTop = $(window).scrollTop();
			windowTop > 100 ? $('#menu ul').css('top','100px') : $('#menu ul').css('top','100px');
		});
	
	//Click Logo To Scroll To Top
	$('#logo').on('click', () => {
		$('html,body').animate({
			scrollTop: 0
		},500);
	});
	
	//Smooth Scrolling Using Navigation Menu
	$('a[href*="#"]').on('click', function(e){
		$('html,body').animate({
			scrollTop: $($(this).attr('href')).offset().top - 100
		},500);
		e.preventDefault();
	});
	
	//Toggle Menu
	$('#menu-toggle').on('click', () => {
		$('#menu-toggle').toggleClass('closeMenu');
		$('#menu ul').toggleClass('showMenu');
		
		$('#menu li').on('click', () => {
			$('#menu ul').removeClass('showMenu');
			$('#menu-toggle').removeClass('closeMenu');
		});
	});
	
		var navChildren = $("#menu li").children();
		var aArray = [];
		for (var i = 0; i < navChildren.length; i++) {
			var aChild = navChildren[i];
			var ahref = $(aChild).attr('href');
			aArray.push(ahref);
		}
		$(window).scroll(function() {
			var windowPos = $(window).scrollTop();
			var windowHeight = $(window).height();
			var docHeight = $(document).height();
			for (var i = 0; i < aArray.length; i++) {
				var theID = aArray[i];
				var secPosition = $(theID).offset().top;
				secPosition = secPosition - 135;
				var divHeight = $(theID).height();
				divHeight = divHeight + 90;
				if (windowPos >= secPosition && windowPos < (secPosition + divHeight)) {
					$("a[href='" + theID + "']").parent().addClass("active");
				} else {
					$("a[href='" + theID + "']").parent().removeClass("active");
				}
			}
		});
    
	
	})

})(jQuery);