<?php

/*-----------------------------------------------------------------------------------*/
/*	 Include Exclusive Widgets Properly
/*-----------------------------------------------------------------------------------*/

add_action('after_setup_theme', 'ss_load_widgets');

function ss_load_widgets() {

	if ( !class_exists('widget_ss_latest_portfolio') ) {
		include_once( get_template_directory() . '/lib/widgets/latest-portfolio.php' );	
	}

}

?>