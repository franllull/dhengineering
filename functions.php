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


//registering underfoot
function register_my_menu() {
  register_nav_menu('underfoot',__( 'Under Footer' ));
}
add_action( 'init', 'register_my_menu' );


?>
