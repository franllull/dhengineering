<?php

/*-----------------------------------------------------------------------------------*/
/*	Include Option Tree
/*-----------------------------------------------------------------------------------*/

add_filter( 'ot_theme_mode', '__return_true' );

load_template( trailingslashit( get_template_directory() ) . 'lib/framework/option-tree/ot-loader.php' );
load_template( trailingslashit( get_template_directory() ) . 'lib/framework/ot-config.php' );

?>