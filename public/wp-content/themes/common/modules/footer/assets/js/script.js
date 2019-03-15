jQuery( document ).ready(function( $ ) {
	"use strict"; // this function is executed in strict mode	
	 
	
	/* ------------------------------------------------------ */
	/*  1. SHRINK HEADER JS
	/* ------------------------------------------------------ */ 
	var shrinkHeader=1;
		$(window).scroll(function(){
		var scroll=getCurrentScroll();
			if(scroll>=shrinkHeader){
				$('.navigation').addClass('shrink');
			}
		else{
			$('.navigation').removeClass('shrink');}
	});
	function getCurrentScroll(){
		return window.pageYOffset;
	}
	
	var sections = $('section')
	  , nav = $('nav')
	  , nav_height = nav.outerHeight();

	$(window).on('scroll', function () {
		var cur_pos = $(this).scrollTop();
		sections.each(function() {
			var top = $(this).offset().top - nav_height,
				bottom = top + $(this).outerHeight();
			if (cur_pos >= top && cur_pos <= bottom) {
				nav.find('a').removeClass('active');
				sections.removeClass('active');
		  
				$(this).addClass('active');
				nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
			}
		});
	});
	/* --------------------------- */
	/*  2. MENU SMOOTH SCROLLING JS
	/* --------------------------- */ 
	$(function() {
         $('a[href*="#"]:not([data-toggle="tab"])').on('click', function() {
             if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                 var target = $(this.hash);
                 target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                 if (target.length) {
                     $('html, body').animate({
                         scrollTop: target.offset().top
                     }, 1000);
                     return false;
                 }
             }
         });
     });
	
	$('.contact-us-form').submit(function(e){
		var name = $(".name-fld", this).val();
		var email = $(".email-fld", this).val();
		var phone = $(".phone-fld", this).val();
		var message = $("#message", this).val();

		if (!name || !email) {
			alert('Please fill required fields (name, email)');
			return false;
		}

		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&message=' + message;
		   
		$.ajax({
		     type: "POST",
		     url: "sender.php",
		     data: dataString,
		     success: function() {
				 alert('Thank you! We will contact with you soon.');
		     }
		 });
		 
		 e.preventDefault();
	});

});	



