<?php

/*-----------------------------------------------------------------------------------*/
/*	Custom Colors
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_head', 'ss_custom_colors' );

function ss_custom_colors() { 
	
	$style = '';
	$accent_color_1 =  ot_get_option( 'accent_color_1' );
	$accent_color_2 =  ot_get_option( 'accent_color_2' );
	$text_color =  ot_get_option( 'text_color' );
	$link_color =  ot_get_option( 'link_color' );
	$link_hover_color =  ot_get_option( 'link_hover_color' );
	$background_color =  ot_get_option( 'background_color' );
	$main_menu_color =  ot_get_option( 'main_menu_color' );
	$main_menu_hover_color =  ot_get_option( 'main_menu_hover_color' );
	$main_menu_bg_color =  ot_get_option( 'main_menu_bg_color' );
	$field_color =  ot_get_option( 'field_color' );
	$field_placeholder_color =  ot_get_option( 'field_placeholder_color' );
	$field_bg_color =  ot_get_option( 'field_bg_color' );
	
	$style .= '<style type="text/css" media="screen" >';

		// General
		$style .= 'body { background-color: ' . $background_color . '; }';
		$style .= 'body { color: ' . $text_color . '; }';
		$style .= 'a { color: ' . $text_color . '; }';
		$style .= 'a:hover { color: ' . $accent_color_2 . '; }';
		$style .= '.ss-typography p a { color: ' . $link_color . '; }';
		$style .= '.ss-typography p a:hover { color: ' . $link_hover_color . '; }';
		$style .= '* { outline-color: ' . $accent_color_2 . '; }';

		// Accent color 1
		$style .= '.section-content-container, .page-content-container { color: ' . $accent_color_1 . '; }';
		$style .= '.theme-breadcrumbs { color: ' . $accent_color_1 . '; }';
		$style .= '.theme-breadcrumbs li a { color: ' . $accent_color_1 . '; }';
		$style .= '.theme-breadcrumbs li a { color: ' . $accent_color_1 . '; }';
		// $style .= '.portfolio-button-group label { color: ' . $accent_color_1 . '; }';
		$style .= '.portfolio-button-group .radio-input-checked { border-color: ' . $accent_color_1 . '; }';
		$style .= '.portfolio-button-group .radio-input-checked { background-color: ' . $accent_color_1 . '; }';
		$style .= '.portfolio-single-1 a { color: ' . $accent_color_1 . '; }';
		// $style .= '.widget a, .sidebar span { color: ' . $accent_color_1 . '; }';
		$style .= '.search-box .search-box-text { color: ' . $accent_color_1 . '; }';
		$style .= '.search-box .search-box-submit:hover { color: ' . $accent_color_1 . '; }';
		$style .= '.tagcloud a { color: ' . $accent_color_1 . ' !important; }';
		$style .= '.tagcloud a:hover { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.tagcloud a:hover { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.widget_archive a { color: ' . $accent_color_1 . ' !important; }';
		$style .= '.widget_archive a:hover { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.widget_archive a:hover { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.blog-item a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.entry-nav a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.comment a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.comment-form #respond-inputs input { color: ' . $accent_color_1 . ' ; }';
		$style .= '.comment-form #comment-text textarea { color: ' . $accent_color_1 . ' ; }';
		$style .= '.form-submit #submit { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-pagination a, .ss-pagination span { color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-pagination span { border-color: ' . $accent_color_1 . ' !important; }';
		$style .= '.ss-pagination span { background-color: ' . $accent_color_1 . ' !important; }';
		$style .= '.not-found { color: ' . $accent_color_1 . ' ; }';
		$style .= '.not-found-404 { border-color: ' . $accent_color_1 . ' ; }';
		$style .= 'input, textarea, select { color: ' . $accent_color_1 . ' ; }';
		$style .= 'input[type="submit"], input[type="button"], input[type="reset"] { background-color: ' . $accent_color_1 . ' ; }';

		// Accent color 2
		$style .= '.theme-breadcrumbs li:last-child { color: ' . $accent_color_2 . ' ; }';
		$style .= '.theme-breadcrumbs li a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-mobile-menu > ul > li a:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.portfolio-button-group label:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.portfolio-button-group label:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.portfolio-single-1 a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.main-footer .footer .social-icon ul a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.widget a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.widget.widget-menu ul li a:hover span { color: ' . $accent_color_2 . ' ; }';
		$style .= '.blog-item a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.entry-nav a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.comment a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.moderation { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.form-submit #submit:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.logged-in-as a { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-pagination a:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-pagination a:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= 'input[type="submit"]:hover, input[type="button"]:hover, input[type="reset"]:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.portfolio-item-overlay { background-color: ' . ss_hex2rgba($accent_color_2, 0.75) . ' ; }';

		// Text color
		$style .= '.ss-mobile-menu > ul > li a { color: ' . $text_color . ' ; }';
		$style .= '.portfolio-item a { color: ' . $text_color . ' ; }';
		$style .= '.portfolio-item a:hover { color: ' . $text_color . ' ; }';
		$style .= '.portfolio-featured-item-image a:hover { color: ' . $text_color . ' ; }';
		$style .= '.main-footer { color: ' . $text_color . ' ; }';
		$style .= '.widget_latest_portfolio .item-buttons a, .widget_latest_portfolio .item-buttons span { color: ' . $text_color . ' ; }';
		$style .= '.widget_latest_portfolio .item-buttons a:hover, .widget_latest_portfolio .item-buttons a:hover span { color: ' . $text_color . ' ; }';
		$style .= '.tagcloud a { background-color: ' . $text_color . ' ; }';
		$style .= '.tagcloud a:hover { color: ' . $text_color . ' !important; }';
		$style .= '.widget_archive a { background-color: ' . $text_color . ' ; }';
		$style .= '.widget_archive a:hover { color: ' . $text_color . ' !important; }';
		$style .= '.moderation { color: ' . $text_color . ' ; }';
		$style .= '.form-submit #submit { color: ' . $text_color . ' ; }';
		$style .= '.form-submit #submit:hover { color: ' . $text_color . ' ; }';
		$style .= '.ss-pagination a:hover { color: ' . $text_color . ' ; }';
		$style .= '.ss-pagination span { color: ' . $text_color . ' !important; }';

		// Main Menu
		$style .= '.main-navigation a { color: ' . $main_menu_color . ' ; }';
		$style .= '.main-navigation a:hover { color: ' . $main_menu_hover_color . ' ; }';
		$style .= '.main-header.ss-sticky.ss-on-scroll { background-color: ' . ss_hex2rgba($main_menu_bg_color, 0.8) . ' ; }';
		$style .= '.main-header .header ul li .sub-menu { background-color: ' . ss_hex2rgba($main_menu_bg_color, 0.9) . ' ; }';
		$style .= '.main-header.ss-sticky.ss-on-scroll .header ul li .sub-menu { background-color: ' . ss_hex2rgba($main_menu_bg_color, 0.8) . ' ; }';  // Different opacity when on scroll
		$style .= '.main-navigation > li > .sub-menu:after { border-color: transparent transparent ' . ss_hex2rgba($main_menu_bg_color, 0.9) . ' transparent; }';
		
		// Form Fields
		$style .= 'input, textarea, select { color: ' . $field_color . ' ; }';
		$style .= 'input, textarea, select { background-color: ' . $field_bg_color . ' ; }';
		$style .= 'input::-webkit-input-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'input:-moz-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'input::-moz-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'input:-ms-input-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'textarea::-webkit-input-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'textarea:-moz-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'textarea::-moz-placeholder { color: ' . $field_placeholder_color . ' ; }';
		$style .= 'textarea:-ms-input-placeholder { color: ' . $field_placeholder_color . ' ; }';


		// Shortcodes
		  // Accent Color 1
		$style .= '.service-slider ul li { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-next-services, .ss-prev-services, .ss-next-clients, .ss-prev-clients { color: ' . $accent_color_1 . ' ; }';
		$style .= '.service-slider-icon { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.service-slider-icon { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.service-slider-item:hover .service-slider-icon { color: ' . $accent_color_1 . ' ; }';
		$style .= '.service-slider-icon a:hover { color: ' . $accent_color_1 . ' ; }';
		$style .= '.service-slider-item h2 a { color: ' . $accent_color_1 . ' ; }';
		$style .= 'a.pricing-col-button{ background: ' . $accent_color_1 . ' ; }';
		$style .= '.pricing-col-featured .pricing-col-header .pricing-col-header-title { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.nivan-icon { color: ' . $accent_color_1 . ' ; }';
		$style .= '.blog-teaser-content { color: ' . $accent_color_1 . ' ; }';
		$style .= '.accordion-item a, .toggle-item a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.tab-container a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.tab-container .tabs li a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.tab-container.borderless .tabs li a { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.tab-container.borderless .tabs li a { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.nivan-button.default { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.nivan-button.default { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-next-iconbox, .ss-prev-iconbox, .ss-next-clients, .ss-prev-clients { color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-iconbox-icon { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-iconbox-icon { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-iconbox-inner:hover .ss-iconbox-icon { color: ' . $accent_color_1 . ' !important; }';
		$style .= '.ss-iconbox-icon a:hover { color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-iconbox-inner h1 a, .ss-iconbox-inner h2 a, .ss-iconbox-inner h3 a, .ss-iconbox-inner h4 a, .ss-iconbox-inner h5 a, .ss-iconbox-inner h6 a { color: ' . $accent_color_1 . ' ; }';
		$style .= '.ss-iconbox-item.transparent .ss-iconbox-inner .ss-iconbox-icon { color: ' . $accent_color_1 . ' !important; }';
		$style .= '.social-icon-item { color: ' . $accent_color_1 . ' ; }';
		$style .= '.social-icon-item.sii-border { border-color: ' . $accent_color_1 . ' ; }';
		$style .= '.social-icon-item.sii-box { background-color: ' . $accent_color_1 . ' ; }';
		$style .= '.social-icon-item.sii-box { border-color: ' . $accent_color_1 . ' ; }';

		  // Accent Color 2
		$style .= '.ss-tile.has-layout-2 .ss-tile-content-title a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-services-arrows > a:hover, .ss-clients-arrows > a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.service-slider-item:hover h2 a { color: ' . $accent_color_2 . ' ; }';
		$style .= 'a.pricing-col-button:hover { background: ' . $accent_color_2 . ' ; }';
		$style .= '.team-member-overlay { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.timeline-blog .timeline-entry-content > h2 a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.timeline-blog .timeline-entry-meta a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= 'a.timeline-loadmore:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= 'a.timeline-loadmore.timeline-loadmore-active { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-testimonial-header span { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-testimonial-skills { color: ' . $accent_color_2 . ' ; }';
		$style .= 'a.ss-next-testimonial:hover, a.ss-prev-testimonial:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.blog-teaser-content a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.accordion-item a:hover, .toggle-item a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.accordion-container .accordion-item .accordion-item-header:hover, .toggle-container .toggle-item .toggle-item-header:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.accordion-item-header.ui-accordion-header-active, .toggle-item-header.ui-toggle-header-active { color: ' . $accent_color_2 . ' ; }';
		$style .= '.accordion-item-header.current { color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container .tabs li a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container .tabs a.current { color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container.borderless .tabs a.current { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container.borderless .tabs a.current { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container.borderless .tabs li a:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.tab-container.borderless .tabs li a:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.nivan-button.default:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.nivan-button.default:hover { background: ' . $accent_color_2 . ' ; }';
		$style .= '.nivan-button.gray.outline:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.nivan-button.gray.outline:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-iconbox-arrows > a:hover, .ss-clients-arrows > a:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-iconbox-inner:hover h1 a, .ss-iconbox-inner:hover h2 a, .ss-iconbox-inner:hover h3 a, .ss-iconbox-inner:hover h4 a, .ss-iconbox-inner:hover h5 a, .ss-iconbox-inner:hover h6 a { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-iconbox-item.transparent .ss-iconbox-inner:hover .ss-iconbox-icon { color: ' . $accent_color_2 . ' !important; }';
		$style .= '.social-icon-item:hover { color: ' . $accent_color_2 . ' ; }';
		$style .= '.social-icon-item.sii-border:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.social-icon-item.sii-box:hover { border-color: ' . $accent_color_2 . ' ; }';
		$style .= '.social-icon-item.sii-box:hover { background-color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-highlight { color: ' . $accent_color_2 . ' ; }';
		$style .= '.ss-highlight:hover { color: ' . ss_hex2rgba($accent_color_2, 0.5) . ' ; }';

		  // Text Color
		$style .= '.service-slider-icon { color: ' . $text_color . ' ; }';
		$style .= '.service-slider-item:hover .service-slider-icon { background-color: ' . $text_color . ' ; }';
		$style .= 'a.pricing-col-button { color: ' . $text_color . ' ; }';
		$style .= 'a.pricing-col-button:hover { color: ' . $text_color . ' ; }';
		$style .= '.pricing-col-featured .pricing-col-header .pricing-col-header-title { color: ' . $text_color . ' ; }';
		$style .= '.team-member-overlay { color: ' . $text_color . ' ; }';
		$style .= '.team-social-icon li a { color: ' . $text_color . ' ; }';
		$style .= '.team-social-icon li a:hover { color: ' . $text_color . ' ; }';
		$style .= '.ss-lightbox-single a { color: ' . $text_color . ' ; }';
		$style .= '.ss-lightbox-single a:hover { color: ' . $text_color . ' ; }';
		$style .= '.tab-container .tabs li a { background-color: ' . $text_color . ' ; }';
		$style .= '.tab-container .tabs a.current { background-color: ' . $text_color . ' ; }';
		$style .= '.tab-container.borderless .tabs li a { color: ' . $text_color . ' ; }';
		$style .= '.tab-container.borderless .tabs a.current { color: ' . $text_color . ' ; }';
		$style .= '.tab-container.borderless .tabs li a:hover { color: ' . $text_color . ' ; }';
		$style .= '.nivan-button.default { color: ' . $text_color . ' ; }';
		$style .= '.ss-iconbox-icon { color: ' . $text_color . ' !important; }';
		$style .= '.ss-iconbox-inner:hover .ss-iconbox-icon { background-color: ' . $text_color . ' ; }';
		$style .= '.social-icon-item.sii-box { color: ' . $text_color . ' ; }';

	$style .= '</style>';

	echo $style;

}



/*-----------------------------------------------------------------------------------*/
/*	Echo Custom Codes and Tracking Code
/*-----------------------------------------------------------------------------------*/

add_action( 'after_setup_theme', 'ss_init_custom_codes' );

function ss_init_custom_codes() {

	add_action( 'wp_head', 'ss_custom_css', 1000 );
	function ss_custom_css() { 
		$html = '';
		$custom_css = ot_get_option( 'custom_css', '' );
		if ( !empty($custom_css) ):
			$html .= '<style type="text/css">';
				$html .= $custom_css;
			$html .= '</style>';
			echo $html;
		endif;
	}

	add_action( 'wp_footer', 'ss_custom_js', 1000 );
	function ss_custom_js() { 
		$html = '';
		$custom_js = ot_get_option( 'custom_js', '' );
		if ( !empty($custom_js) ):
			$html .= '<script type="text/javascript">';
				$html .= $custom_js;
			$html .= '</script>';
			echo $html;
		endif;
	}

	add_action( 'wp_head', 'ss_custom_codes_head', 1100 );
	function ss_custom_codes_head() { 
		$html = '';
		$before_head = ot_get_option( 'before_head', '' );
		if ( !empty($before_head) ):
			$html .= $before_head;
			echo $html;
		endif;
	}

	add_action( 'wp_footer', 'ss_custom_codes_body', 1100 );
	function ss_custom_codes_body() { 
		$html = '';
		$before_body = ot_get_option( 'before_body', '' );
		if ( !empty($before_body) ):
			$html .= $before_body;
			echo $html;
		endif;

	}

	add_action( 'wp_head', 'ss_tracking_code', 1000 );
	function ss_tracking_code() { 
		$html = '';
		$tracking_code = ot_get_option( 'tracking_code', '' );
		if ( !empty($tracking_code) ):
			$html .= $tracking_code;
			echo $html;
		endif;
	}

}


// add_action( 'wp_head', 'spnoy_page_custom_css', 1001 );
// function spnoy_page_custom_css() { 

// 	global $prefix;
// 	$custom_css = rwmb_meta("{$prefix}page_custom_css");
// 	$html = '';
// 	if ( !empty($custom_css) ):
// 		$html .= '<style type="text/css">';
// 			$html .= $custom_css;
// 		$html .= '</style>';
// 		echo $html;
// 	endif;

// }

// add_action( 'wp_footer', 'spnoy_page_custom_js', 1002 );
// function spnoy_page_custom_js() { 

// 	global $prefix;
// 	$custom_js = rwmb_meta("{$prefix}page_custom_js");
// 	$html = '';
// 	if ( !empty($custom_js) ):
// 		$html .= '<script type="text/javascript">';
// 			$html .= $custom_js;
// 		$html .= '</script>';
// 		echo $html;
// 	endif;

// }


?>