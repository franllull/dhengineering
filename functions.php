<?php

/*-------------------------------[ Functions Loader ]--------------------------------*/
/*	
/*	- The core for properly loading all the necessary functions based on order.
/*	- Note: do not delete or move this block of code.
/*
/*-----------------------------------------------------------------------------------*/

require_once "lib/functions/functions-loader.php";


/*-------------------------------[ Custom Functions ]--------------------------------*/
/*	
/*	- Place all of your custom functions/codes/snippets below.
/*
/*-----------------------------------------------------------------------------------*/

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<br /><a class="moretag" href="'. get_permalink($post->ID) . '"> Read on...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


//registering underfoot
function register_my_menu() {
  register_nav_menu('underfoot',__( 'Under Footer' ));
}
add_action( 'init', 'register_my_menu' );


?>
