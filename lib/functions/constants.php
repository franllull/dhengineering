<?php

/*-----------------------------------------------------------------------------------*/
/*	Define fundemental constants
/*-----------------------------------------------------------------------------------*/

$ss_theme = wp_get_theme();
define( 'THEME', get_template_directory_uri() );
define( 'THEME_IMAGES', THEME . '/images' );
define( 'THEME_CSS', THEME . '/css' );
define( 'THEME_JS', THEME . '/js' );
define( 'THEME_FONTS', THEME . '/fonts' );
define( 'THEME_LANG', THEME . '/languages' );
define( 'THEME_DIR', get_template_directory() );
define( 'THEME_IMAGES_DIR', THEME_DIR . '/images' );
define( 'THEME_CSS_DIR', THEME_DIR . '/css' );
define( 'THEME_JS_DIR', THEME_DIR . '/js' );
define( 'THEME_FONTS_DIR', THEME_DIR . '/fonts' );
define( 'THEME_LANG_DIR', THEME_DIR . '/languages' );
define( 'THEME_VERSION', $ss_theme->get('Version') );


?>