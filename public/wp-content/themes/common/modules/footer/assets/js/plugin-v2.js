(function ($) {
    'use strict'
    jQuery(document).ready(function () { 
		// init Isotope
		var $grid = $('.portfolio-mix-item').isotope({
			itemSelector: '.mix',
		});
		
		// filter items on button click
		$('.filter-button-group').on( 'click', 'button', function() {
		  var filterValue = $(this).attr('data-filter');
		  $grid.isotope({ filter: filterValue });
		});
		
		//for menu active class
		$('.button-group button').on('click', function(event) {
			$(this).siblings('.active').removeClass('active');
			$(this).addClass('active');
			event.preventDefault();
		});
		
		//Team carousel
		$('.teamCarousel').owlCarousel({
			loop:true,
			margin:20,
			autoplay: 5000,
			navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsiveClass:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:2,
					nav:true
				},
				1000:{
					items:3,
					nav:true, 
				},
				1200:{
					items:3,
					nav:true, 
				}
				
				
			}
		});	
		//LatestPost carousel	
		$('.latestPost').owlCarousel({
			loop:false,
			dots: false,
			margin:20,
			autoplay: 5000,
			navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsiveClass:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:2,
					nav:true
				},
				1000:{
					items:3,
					nav:true,
				},
				1200:{
					items:3,
					nav:true,

				}
			}
		});
		//banner carousel
		$('.banner-slider').owlCarousel({
			loop: true,
			dots: false,
			autoplay: 3000,
            items:1,
            nav: false
		});
		//client-says carousel  
		$('.client-says-v2').owlCarousel({
			loop:true,
			margin:20,
			autoplay: 5000,
			dots: false,
			navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
			responsiveClass:false,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:2,
					nav:true
				},
				1000:{
					items:3,
					nav:true, 
				},
				1200:{
					items:3,
					nav:true, 
				}
				
				
			}
		});	 		
	
	})
	 
})(jQuery);