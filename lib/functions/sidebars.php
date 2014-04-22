<?php

/*-----------------------------------------------------------------------------------*/
/*	Register Sidebars
/*-----------------------------------------------------------------------------------*/

if ( function_exists('register_sidebar') ) {	


	/*--------------------------------------------------*/
	/*	Primary Sidebar
	/*--------------------------------------------------*/
	
	register_sidebar(array(
		'name' => __('Primary Sidebar','spnoy' ),
		'id'   => 'primary-sidebar',
		'description'   => __( 'These are widgets for the Primary Sidebar.','spnoy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));


	/*--------------------------------------------------*/
	/*	Footer Sidebar
	/*--------------------------------------------------*/
	
	register_sidebar(array(
		'name' => __('Footer Sidebar','spnoy' ),
		'id'   => 'footer-sidebar',
		'description'   => __( 'These are widgets for the Footer Sidebar.','spnoy' ),
		'before_widget' => '<div id="%1$s" class="col-sm-4 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>'
	));

	
	/*--------------------------------------------------*/
	/*	Second Sidebar
	/*--------------------------------------------------*/
	
	register_sidebar(array(
		'name' => __('Second Sidebar','spnoy' ),
		'id'   => 'second-sidebar',
		'description'   => __( 'These are widgets for the Second Sidebar.','spnoy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	/*--------------------------------------------------*/
	/*	Third Sidebar
	/*--------------------------------------------------*/
	
	register_sidebar(array(
		'name' => __('Third Sidebar','spnoy' ),
		'id'   => 'third-sidebar',
		'description'   => __( 'These are widgets for the Third Sidebar.','spnoy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	/*--------------------------------------------------*/
	/*	Fourth Sidebar
	/*--------------------------------------------------*/
	
	register_sidebar(array(
		'name' => __('Fourth Sidebar','spnoy' ),
		'id'   => 'fourth-sidebar',
		'description'   => __( 'These are widgets for the Fourth Sidebar.','spnoy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

	/*--------------------------------------------------*/
	/*	Fifth Sidebar
	/*--------------------------------------------------*/
	
	register_sidebar(array(
		'name' => __('Fifth Sidebar','spnoy' ),
		'id'   => 'fifth-sidebar',
		'description'   => __( 'These are widgets for the Fifth Sidebar.','spnoy' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>'
	));

}

?>