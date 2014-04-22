jQuery(function($){

	"use strict";

	/*------------------------------------------------------------------
		Passed Options From Admin Panel
	------------------------------------------------------------------*/

	var home_url = ss_data.home_url,
	sticky_header_switch = ss_data.sticky_header_switch,
	animation_on_mobile_switch = ss_data.animation_on_mobile_switch,
	one_page_scroll_speed = ss_data.one_page_scroll_speed;


	/*---------------------------------------------------------------------------------*/
	/*  Global Values
	/*---------------------------------------------------------------------------------*/

	var $window = $(window),
		$body = $('body'),
		viewport_width = $window.width(),
		viewport_height = $window.height(),
		$header = $('.main-header'),
		$logo = $('.logo'),
		$footer = $('.main-footer'),
	    is_homepage = $body.hasClass('ss-home'),
	    lightbox_gallery_mode = "1",
	    lightbox_close_button = "1",
	    lightbox_close_button_position = "true",
	    lightbox_align = "false",
	    mobile_menu_anim_speed = 600,
        $preloader = $('.theme-preloader'),
		is_mobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
        location_hash = "#";

	function update_viewport_vars() {
		viewport_width = $window.width();
		viewport_height = $window.height();
	}
	var _update_viewport_vars = _.throttle(update_viewport_vars, 100);
	$window.resize(_update_viewport_vars);

	var getCssFromClass = function (prop, fromClass) {
		var $inspector = $("<div>").css('display', 'none').addClass(fromClass);
		$body.append($inspector); // add to DOM, in order to read the CSS property
		try {
		    return $inspector.css(prop);
		} finally {
		    $inspector.remove(); // and remove from DOM
		}
	};

	var strToBool = function(string) {
		switch ( string.toLowerCase() ) {
			case "true": case "yes": case "on": case "1": return true;
			default: return false;
		}
	}


	/*---------------------------------------------------------------------------------*/
    /*	Paralalx Init
	/*---------------------------------------------------------------------------------*/

	if ( !is_mobile ) {
		var _skrollr = skrollr.init({
			forceHeight: false,
			mobileCheck: function() {
				return false;
			}
		});
	} else {
		var _skrollr = {
            refresh: function () {
                return;
            }
        }
	}


	/*---------------------------------------------------------------------------------*/
	/*	SVG Logo
	/*---------------------------------------------------------------------------------*/

	if ( Modernizr.svg && $logo.find('img').attr('data-svg') != "" ) {
		$logo.find('img').attr('src', function() {
			return $(this).attr('data-svg');
		});
	}


	/*---------------------------------------------------------------------------------*/
	/*	Main Menu
	/*---------------------------------------------------------------------------------*/

	var $main_nav_container = $('.main-navigation-container');
	var diff_height = parseInt(getCssFromClass('height', 'ss-header-diff'), 10);

	if ( $main_nav_container.outerWidth() > ($main_nav_container.parent().width()-$logo.outerWidth()) ) {
		$main_nav_container.hide();
		$('.ss-mobile-menu-button').show();
	}

	if ( $body.hasClass('ss-home') ) {

		$('#main-navigation').onePageNav({
			currentClass: 'current_page_item',
			changeHash: false,
			scrollSpeed: one_page_scroll_speed,
			scrollOffset: $header.height() - diff_height,
			scrollThreshold: 0.5,
			filter: ':not(.external)',
			easing: "easeInOutExpo",
		});

		var header_offset = $header.height() - diff_height;
		$('#main-navigation-mobile a').on('click',function (e) {
			if ( !$(this).hasClass('external') ) {
				e.preventDefault();
				$('#wrapper').trigger('click');
			    var target = this.hash,
			    $target = $(target);
				setTimeout( function() {
					$('html, body').stop().animate({
				        'scrollTop': $target.offset().top - header_offset
				    }, one_page_scroll_speed, 'easeInOutExpo');
				}, mobile_menu_anim_speed);
			}
		});

		// Animate scroll internal links
		//$('a[href^="#"]:not(.tab-anchor)').on('click', function (e) {
		//	if ( !($(this).closest('.main-header').length > 0) && !($(this).closest('.ss-mobile-menu').length > 0) ) {
		//		e.preventDefault();
		//	    var target = this.hash,
		//	    $target = $(target);
		//	    $('html, body').stop().animate({
		//	        'scrollTop': $target.offset().top
		//	    }, 900, 'easeOutExpo');
		//	}
		//});

	}

	// Center Sub Menu 
	$('#main-navigation').children('li').hover( function() {
		if ( $(this).children('ul').length > 0 ) {
			var li_width = $(this).outerWidth(false),
			sub = $(this).children('ul'),
			sub_width = sub.outerWidth(),
			point = null;
			if ( sub_width > li_width ) {
				point = (sub_width/2) - (li_width/2);
				sub.css('left',-point);
			} else {
				point = (li_width/2) - (sub_width/2);
				sub.css('left', point);
			}
		}
	});

	// Handle off-side submenus on narrow viewports
	$('#main-navigation .sub-menu .sub-menu').each( function() {
		var outerWidth = $(this).outerWidth(),
		offsetLeft = $(this).offset().left;
		if ( offsetLeft + outerWidth > viewport_width ) {
			var rightPos = $(this).css('left');
			$(this).addClass('sub-menu-left');
			$(this).css({
				left: "auto",
				right: rightPos,
			});
		}
	});

	function scrollToHashID() {
		if ( $body.hasClass('ss-home') ) {
			if ( document.location.hash ) {
				var page_url = window.location.href,
				hash = page_url.substring( page_url.lastIndexOf("#") + 1 );
				location_hash = hash;
				// window.location = '#';
			}
			// Animate scroll if a hash is set in the URL
			if ( $('section[id="' + location_hash + '"]' ).length > 0 ) {
				var top = $('section[id="' + location_hash + '"]' ).offset().top - header_offset;
				$("html, body").animate({ scrollTop: top } , 900, 'easeOutExpo');
				// window.location = window.location + location_hash;
			}
		}
	}

	scrollToHashID();


	/*---------------------------------------------------------------------------------*/
	/*	Mobile Menu
	/*---------------------------------------------------------------------------------*/

	// TweenLite.to( $('.ss-mobile-menu'), 0, { css: {  x: -$('.ss-mobile-menu').width() }, ease: Expo.easeOut });
	
	var mobile_menu = false;
	$('.ss-mobile-menu-button').click( function(e) {
		e.stopPropagation();
		e.preventDefault();
		mobile_menu = true;
		$('#wrapper').removeClass('ss-mobile-menu-active');
		$('.ss-mobile-menu').css({
			display: 'block',
		});
		$body.css('overflow', 'hidden');
		TweenLite.to( $('#wrapper'), mobile_menu_anim_speed/1000, { css: { x: $('.ss-mobile-menu').width() }, ease: Expo.easeOut });
	});

	$('#wrapper').click( function() {
		if (mobile_menu) {
			mobile_menu = false;
			$body.css('overflow', '');
			TweenLite.to( $('#wrapper'), mobile_menu_anim_speed/1000, { css: { x: 0 }, ease: Expo.easeOut, onComplete: function() {
				$('.ss-mobile-menu').css({
					display: 'none',
				});
				$('#wrapper').addClass('ss-mobile-menu-active');
			}});
		}
	});


    /*------------------------------------------------------------------*/
	/*	Sticky Header
	/*------------------------------------------------------------------*/
	
	function sticky_header_off() {
		if ( sticky_header_switch == "off" ) {  // If sticky header switch was off
			$header.addClass('ss-no-sticky');
			$body.addClass('ss-no-sticky-main-nav');
		} else {
			$header.addClass('ss-sticky');
			$body.addClass('ss-sticky-main-nav');
		}
	}
	sticky_header_off();

	function handle_sticky_header() {
		var window_scroll = $window.scrollTop(),
		sticky_point = 50;
		if ( !is_homepage ) {
			sticky_point = 1;
		}
		if ( window_scroll > sticky_point ) {
			$header.addClass('ss-on-scroll');
		} else {
			$header.removeClass('ss-on-scroll');
		}
	}
	var _handle_sticky_header = _.throttle(handle_sticky_header, 100);
	if ( sticky_header_switch == "on" ) {
		$window.scroll(_handle_sticky_header);
	}
	
   
    /*------------------------------------------------------------------*/
	/*	Portfolio Initialization
	/*------------------------------------------------------------------*/

	$('.portfolio-items-container').each(function () {

	    var portfolio_items_containers = $(this);
	    var portfolio_button_group;
	    if ($(this).prev().hasClass("portfolio-button-group")) {
	        portfolio_button_group = $(this).prev();
	    }
	    $(portfolio_items_containers).imagesLoaded().always(function (instance) {

	        // hover height for centering its content
	        $(portfolio_items_containers).find('.portfolio-item-overlay').css('height', function () {
	            return $(portfolio_items_containers).find('.inner-container').height();
	        });
	        var _portfolio_item_update = _.throttle(function () {
	            $(portfolio_items_containers).find('.portfolio-item-overlay').css('height', function () {
	                return $(portfolio_items_containers).find('.inner-container').height();
	            });
	        }, 100);
	        $window.resize(_portfolio_item_update);

            // Initialize Isotope + filtering
	        if ($(portfolio_items_containers).hasClass("filtering-on")) {
	            // Init Isotope + filtering
	            var $portfolio_items = $(portfolio_items_containers);
	            $portfolio_items.isotope({
	                itemSelector: '.portfolio-item',
	                layoutMode: 'fitRows',
	                columnWidth: '.grid-sizer',
	            });
	            // filter items on button click
	            $(portfolio_button_group).on('click', 'input', function (event) {
	                $(portfolio_button_group).find('.radio-input-checked').removeClass('radio-input-checked');
	                $(this).parent().addClass('radio-input-checked');
	                var filterValue = $(this).attr('value');
	                $portfolio_items.isotope({ filter: filterValue });
	                setTimeout( function() {
	                	// Update Parallax Positions
						_skrollr.refresh();
						// Update Waypoint Positions
						$.waypoints('refresh');
	                }, 500);  // Delay equal to isotope transition
	            });
	        } else {
	            // Init Isotope
	            var $portfolio_items = $(portfolio_items_containers);
	            $portfolio_items.isotope({
	                itemSelector: '.portfolio-item',
	                layoutMode: 'fitRows',
	                columnWidth: '.grid-sizer',
	            });
	        }

	        // Init magnificPopup on Portfolio
	        $(portfolio_items_containers).magnificPopup({
	            type: 'inline',
	            delegate: 'a.item-format',
	            gallery: {
	                enabled: Boolean(parseInt(lightbox_gallery_mode, 10))
	            },
	            removalDelay: 300,
	            showCloseBtn: Boolean(parseInt(lightbox_close_button, 10)),
	            closeBtnInside: (lightbox_close_button_position == 'true'),
	            alignTop: (lightbox_align == 'true'),
	            mainClass: 'mfp-fade'
	        });

	    });
	});


	/*-----------------------------------------------------------------*/
    /*	Lightbox Single
	/*-----------------------------------------------------------------*/

	$('.ss-lightbox-single').imagesLoaded().always(function (instance) {

	    $('.ss-lightbox-single-overlay').css('height', function () {
	        return $('.ss-lightbox-single').height();
	    });
	    var _portfolio_featured_item_update = _.throttle(function () {
	        $('.ss-lightbox-single-overlay').css('height', function () {
	            return $('.ss-lightbox-single').height();
	        });
	    }, 100);
	    $window.resize(_portfolio_featured_item_update);

	});

	$('.ss-lightbox-single').magnificPopup({
	    type: 'inline',
	    delegate: 'a.item-format',
	    gallery: {
	        enabled: false
	    },
	    removalDelay: 300,
	    showCloseBtn: Boolean(parseInt(lightbox_close_button, 10)),
	    closeBtnInside: (lightbox_close_button_position == 'true'),
	    alignTop: (lightbox_align == 'true'),
	    mainClass: 'mfp-fade'
	});


    /*-----------------------------------------------------------------*/
    /*	Royal Slider Initializing
    /*-----------------------------------------------------------------*/

	$(".royalSlider").royalSlider({
	    loop: true,
	    autoHeight: true,
	    autoScaleSlider: false,
	    imageScaleMode: 'none',
	    imageAlignCenter: false,
	    slidesSpacing: 0,
	    arrowsNav: true,
	    controlNavigation: false,
	    keyboardNavEnabled: true,
	    arrowsNavAutoHide: false,
	    sliderDrag: true,
	    updateSliderSize: true,
	    usePreloader: true,
	});
	

    /*------------------------------------------------------------------*/
	/*	Widget Portfolio
	/*------------------------------------------------------------------*/

	$('.widget_latest_portfolio').imagesLoaded().always(function (instance) {
	    // hover height for centering its content
	    $('.widget_latest_portfolio').find('.portfolio-item-overlay').css('height', function () {
	        return $('.widget_latest_portfolio ul li').find('.inner-container').height();
	    });
	    var _widget_latest_portfolio_update = _.throttle(function () {
	        $('.widget_latest_portfolio').find('.portfolio-item-overlay').css('height', function () {
	            return $('.widget_latest_portfolio ul li').find('.inner-container').height();
	        });
	    }, 100);
	    $window.resize(_widget_latest_portfolio_update);
	});


    /*---------------------------------------------------------------------------------*/
    /*	Init Blog Masonry
	/*---------------------------------------------------------------------------------*/

	if (typeof Masonry !== 'undefined') {
	    var blog_container = document.querySelector('.blog-container.masonry');
	    if (typeof (blog_container) != 'undefined' && blog_container != null) {
	        var imageLoader = imagesLoaded(blog_container);
	        imageLoader.on('always', function (instance) {
	            var $blog_container_masonry = $(blog_container);
	            $blog_container_masonry.isotope({
	                // options
	                itemSelector: '.blog-item',
	                layoutMode: 'masonry',
	                columnWidth: '.grid-sizer',
	            });
	        });
	    }
	    var blog_container_grid = document.querySelector('.blog-container.grid');
	    if (typeof (blog_container) != 'undefined' && blog_container_grid != null) {
	        var imageLoader = imagesLoaded(blog_container_grid);
	        imageLoader.on('always', function (instance) {
	            var $blog_container_grid = $(blog_container_grid);
	            $blog_container_grid.isotope({
	                // options
	                itemSelector: '.blog-item',
	                layoutMode: 'fitRows',
	                columnWidth: '.grid-sizer',
	            });

	        });
	    }

    }


	/*---------------------------------------------------------------------------------*/
    /*	Contact Form
	/*---------------------------------------------------------------------------------*/

	function contactForm1Init() {
		if ( viewport_width > 480 ) {
			$('.nivan-form-style-1 .wpcf7-form-control-wrap').children().css({
				width: function() {
					var containerWidth = $(this).parent().parent().width(),
						labelWidth = $(this).parent().siblings('label').width();
					return containerWidth - labelWidth;
				}
			});
		}
	}
	contactForm1Init();
	var _contactForm1Init = _.throttle(contactForm1Init, 100);
	$window.resize(_contactForm1Init);
	

	/*---------------------------------------------------------------------------------*/
    /*	Fixing & Polishing
	/*---------------------------------------------------------------------------------*/

	var widgetArchiveCount = $('.widget_archive').find('li').clone().children().remove().end().text();
	if ( widgetArchiveCount !== "" ) {
		$('.widget_archive').find('li').each( function() {
			var $children = $(this).children();
			$children.append(widgetArchiveCount);
			$(this).html($children);
		});
	}

	$body.fitVids();


	$window.load( function() {

		/*------------------------------------------------------------------*/
		/*	Set up heading lines
		/*------------------------------------------------------------------*/

		function initSectionHeading() {
			$('.section-heading-left-line,.section-heading-right-line').css({
				width: function() {
					var parent_width = $(this).parent().width();
					var heading_width = $(this).siblings('.section-heading').children('span').outerWidth(true);
					if ( heading_width > (parent_width - 60) ) {
						$(this).siblings('.section-heading').css('width', parent_width - 60);
					}
					heading_width = $(this).siblings('.section-heading').children('span').outerWidth(true);

					return ((parent_width - heading_width) / 2) - 20;
				}
			});
		}
		initSectionHeading();
		var _initSectionHeading = _.throttle( function() {
			initSectionHeading();
		}, 100);
		$window.resize(_initSectionHeading);

		// Update Parallax Positions
		_skrollr.refresh();

		// Update Waypoint Positions
		$.waypoints('refresh');

	});

});