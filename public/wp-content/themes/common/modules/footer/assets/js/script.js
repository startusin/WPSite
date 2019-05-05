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

	$('#select_all_categorys').click(function (e) {
		if ($(this).data('selected')) {
            $(this).html('Select All');
            $(this).data('selected', false);

            $('#f_category input[type=checkbox]').each(function(){
                $(this).attr('checked', false);
            });
		} else {
            $(this).html('Unselect All');
            $(this).data('selected', true);

            $('#f_category input[type=checkbox]').each(function(){
                $(this).attr('checked', true);
            });
		}

		e.preventDefault();
    });

	$('#select_all_policies').click(function (e) {
        if ($(this).data('selected')) {
            $(this).html('Select All');
            $(this).data('selected', false);

            $('#f_policy input[type=checkbox]').each(function(){
                $(this).attr('checked', false);
            });
        } else {
            $(this).html('Unselect All');
            $(this).data('selected', true);

            $('#f_policy input[type=checkbox]').each(function(){
                $(this).attr('checked', true);
            });
        }

        e.preventDefault();
    });

    $('#f_date input[type=checkbox]').click(function (e) {
        $('#f_date input[type=checkbox]').attr('checked', false);
        $(this).attr('checked', true);
    });

    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
});



