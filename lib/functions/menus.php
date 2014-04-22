<?php

/*-----------------------------------------------------------------------------------*/
/*	Register Nav Menu
/*-----------------------------------------------------------------------------------*/

function ss_register_menus() { 
	register_nav_menus(
		array(
			'primary-menu' => __('Main Navigation', 'spnoy')
		)
	);
}

add_action( 'init', 'ss_register_menus' );


/*-----------------------------------------------------------------------------------*/
/*	Add Slug to Menu Items for One Page Navigation
/*-----------------------------------------------------------------------------------*/

add_filter( 'walker_nav_menu_start_el', 'ss_one_page_nav_walker', 10, 4 );

function ss_one_page_nav_walker($output, $item, $depth, $args) {

	if ( !is_404() ) {

		if ( is_object($item) ) {  // Exectue only when it's in menu items

			$all_home_childs = array();  // Default value for template-home childrens
			$all_home_ids = ss_get_home_ids();  // Get template-home pages IDs
			$this_home = "";

			if ( in_array( get_the_id(), $all_home_ids) ) {  // If current page is a template-home page
				$this_home = get_the_id();
			}

			if ( !empty($all_home_ids) ) {  // If any home page was set

				foreach ( $all_home_ids as $home_child_id ) {
					$pages = get_posts( array(
				        'post_type' => 'page',
				        'posts_per_page' => -1,
				        'post_parent' => $home_child_id,
				    ));
					foreach ($pages as $child) {  // Get all Child Pages of All Home Pages
						array_push( $all_home_childs, $child->ID );
					}
				}
				
			}
			
			
			// If menu item's page is included in home page or menu item points to Homepage (frontpage)
			if ( in_array( $item->object_id , $all_home_childs ) || $item->url === get_home_front_page_url() ) {

				if ( $item->url === get_home_front_page_url() && !is_page_template('template-home.php') ) {  // Detect home menu item in other pages
					
					$url = home_url();
					$pattern = '/(?<=href\=")[^]]+?(?=")/';
					$output = preg_replace($pattern, $url, $output);
					
				} else {

					$prefix_url = ss_get_parent_url($item->object_id);
					$prefix_url = rtrim($prefix_url, '/');
					$url = $prefix_url . '#' . ss_get_slug($item->object_id);
					$pattern = '/(?<=href\=")[^]]+?(?=")/';
					$output = preg_replace($pattern, $url, $output);

					if ( ss_get_parent_id($item->object_id) != $this_home ) {
						$dom = new DOMDocument;
						$dom->encoding = 'utf-8';
						$dom->loadHTML( mb_convert_encoding($output, "HTML-ENTITIES", "UTF-8") );

						$dom->removeChild($dom->firstChild);  // Remove <!DOCTYPE 
						$dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild); // Remove <html><body></body></html> 

						$anchors = $dom->getElementsByTagName('a');
						foreach($anchors as $anchor) {
							$anchor->setAttribute('class', 'external');
						}

						$output = $dom->saveHTML();
					}
					
				}

			} else {  // If it's a normal link to other pages add a class to it

				$dom = new DOMDocument;
				$dom->encoding = 'utf-8';
				$dom->loadHTML( mb_convert_encoding($output, "HTML-ENTITIES", "UTF-8") );

				$dom->removeChild($dom->firstChild);  // Remove <!DOCTYPE 
				$dom->replaceChild($dom->firstChild->firstChild->firstChild, $dom->firstChild); // Remove <html><body></body></html> 

				$anchors = $dom->getElementsByTagName('a');
				foreach($anchors as $anchor) {
					$anchor->setAttribute('class', 'external');
				}

				$output = $dom->saveHTML();

			}

		}

	}
	
    return $output;
}

?>