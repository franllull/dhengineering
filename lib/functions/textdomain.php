<?php

/*-----------------------------------------------------------------------------------*/
/*	Translation
/*-----------------------------------------------------------------------------------*/

add_action('after_setup_theme', 'spnoy_textdomain');

function spnoy_textdomain() {
   load_theme_textdomain( 'spnoy', get_template_directory() . '/languages');
}

?>