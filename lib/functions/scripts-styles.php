<?php

/*-----------------------------------------------------------------------------------*/
/*	Scripts & Styles
/*-----------------------------------------------------------------------------------*/

add_action( 'wp_enqueue_scripts', 'ss_scripts_and_styles', 1 );

function ss_scripts_and_styles() {
	
	// Registering
	wp_register_script( 'modernizr', THEME_JS . '/modernizr.2.7.1.min.js', null, THEME_VERSION, false );
	wp_register_script( 'plugins', THEME_JS . '/plugins.js', array( 'jquery' ), THEME_VERSION, true );
	wp_register_script( 'custom', THEME_JS . '/custom.js', array( 'jquery', 'plugins'), THEME_VERSION, true );

	wp_register_style( 'bootstrap-grid', THEME_CSS . '/bootstrap.css', null, THEME_VERSION, 'screen' );
	wp_register_style( 'stylesheet', get_stylesheet_directory_uri() . '/style.css', null, THEME_VERSION, 'screen' );
	wp_register_style( 'plugins', THEME_CSS . '/plugins.css', null, THEME_VERSION, 'screen' );
	wp_register_style( 'icomoon-ultimate', THEME_CSS . '/icomoon.ultimate.css', null, THEME_VERSION, 'screen' );

	// Enqueuing
	$protocol = is_ssl() ? 'https' : 'http';
	wp_enqueue_style( 'google-font-sintony', "$protocol://fonts.googleapis.com/css?family=Sintony:400,700" );
	wp_enqueue_style( 'bootstrap-grid' );
	wp_enqueue_style( 'plugins' );
	wp_enqueue_style( 'stylesheet' );
	wp_enqueue_style( 'icomoon-ultimate' );
	
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'plugins' );
	wp_enqueue_script( 'custom' );

	if ( is_singular() ) {
		wp_enqueue_script( "comment-reply" );
	}

	// Localizing
	global $ss_prefix;

	$one_page_scroll_speed = ot_get_option( 'one_page_scroll_speed', '600' );
	$sticky_header_switch =  ot_get_option( 'sticky_header_switch', 'on' );
	$animation_on_mobile_switch =  ot_get_option( 'animation_on_mobile_switch', 'off' );

	$ss_data = array(
		'home_url' => home_url(),
		'one_page_scroll_speed' => $one_page_scroll_speed,
		'sticky_header_switch' => $sticky_header_switch,
		'animation_on_mobile_switch' => $animation_on_mobile_switch,
	);
	wp_localize_script( 'custom', 'ss_data', $ss_data );

}

add_action( 'admin_enqueue_scripts', 'ss_admin_scripts_and_styles' );

function ss_admin_scripts_and_styles($hook) {

	wp_register_style( 'custom-admin', THEME_CSS . '/custom.admin.css', null, THEME_VERSION, 'screen' );
	wp_enqueue_style( 'custom-admin' );

	// if( 'post.php' == $hook || 'post-new.php' == $hook ) {
		wp_register_script( 'custom-admin', THEME_JS . '/custom.admin.js', array( 'jquery' ), THEME_VERSION, false );
		wp_enqueue_script( 'custom-admin' );
	// }

}

?>