<?php


/*-----------------------------------------------------------------------------------*/
/*	Custom Trim function
/*-----------------------------------------------------------------------------------*/

function ss_trim_char( $string, $len = 30, $append = '...' ) {
	return ( strlen( $string ) > $len ) ?
		substr( $string, 0, $len - strlen( $append ) ) . $append :
		$string;
}

/*-----------------------------------------------------------------------------------*/
/*  Get The Slug by ID
/*-----------------------------------------------------------------------------------*/

function ss_get_slug( $id ) {
	if ( $id==null ) $id=$post->ID;
	$post_data = get_post( $id, ARRAY_A );
	$slug = $post_data['post_name'];
	return $slug;
}


/*-----------------------------------------------------------------------------------*/
/*  Get Parent URL by ID
/*-----------------------------------------------------------------------------------*/

function ss_get_parent_url( $child_id ) {
	$child = get_post( $child_id );
	$parentId = $child->post_parent;
	$linkToParent = get_permalink( $parentId );
	return $linkToParent;
}

/*-----------------------------------------------------------------------------------*/
/*  Get Parent ID
/*-----------------------------------------------------------------------------------*/

function ss_get_parent_id( $child_id ) {
	$child = get_post( $child_id );
	$parentId = $child->post_parent;
	return $parentId;
}


/*-----------------------------------------------------------------------------------*/
/*  Get Home Page Based On It's Template
/*-----------------------------------------------------------------------------------*/

function ss_get_home_ids() {

	$args = array(
		'post_type'  => 'page',
		'meta_key'   => '_wp_page_template',
		'meta_value' => 'template-home.php'
	);

	$home_pages = get_posts( $args );
	$home_pages_ids = array();

	if ( !empty( $home_pages ) ) {
		foreach ( $home_pages as $home_page ) {
			array_push( $home_pages_ids, $home_page->ID );
		}
		return $home_pages_ids;
	} else {
		return $home_pages_ids;  // Return empty array
	}

}


/*-----------------------------------------------------------------------------------*/
/*  Get Front Page URL based on Home template
/*-----------------------------------------------------------------------------------*/

function get_home_front_page_url() {

	$front_page_ID = get_option( 'page_on_front' );
	$front_page_template = get_post_meta( $front_page_ID, '_wp_page_template', true );
	if ( $front_page_template === 'template-home.php' ) { // If front page uses Home template
		return get_permalink( $front_page_ID ); // retrun url of front page
	} else {
		return false;
	}

}


/*-----------------------------------------------------------------------------------*/
/*	Convert hexdec color string to rgb(a) string
/*-----------------------------------------------------------------------------------*/

function ss_hex2rgba( $color, $opacity = false ) {

	$default = 'rgb(0,0,0)';

	//Return default if no color provided
	if ( empty( $color ) )
		return $default;

	//Sanitize $color if "#" is provided
	if ( $color[0] == '#' ) {
		$color = substr( $color, 1 );
	}

	//Check if color has 6 or 3 characters and get values
	if ( strlen( $color ) == 6 ) {
		$hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
	} elseif ( strlen( $colour ) == 3 ) {
		$hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
	} else {
		return $default;
	}

	//Convert hexadec to rgb
	$rgb =  array_map( 'hexdec', $hex );

	//Check if opacity is set(rgba or rgb)
	if ( $opacity ) {
		if ( abs( $opacity ) > 1 )
			$opacity = 1.0;
		$output = 'rgba('.implode( ",", $rgb ).','.$opacity.')';
	} else {
		$output = 'rgb('.implode( ",", $rgb ).')';
	}

	//Return rgb(a) color string
	return $output;
}


/*-----------------------------------------------------------------------------------*/
/*	Pagination Function
/*-----------------------------------------------------------------------------------*/

function ss_pagination( $pages = '', $align = 'center', $range = 2 ) {
	$showitems = ( $range * 2 )+1;

	global $paged;
	if ( empty( $paged ) ) $paged = 1;

	if ( $pages == '' ) {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if ( !$pages ) {
			$pages = 1;
		}
	}

	if ( 1 != $pages ) {
		echo "<div class='ss-pagination' style='text-align:" . $align . ";' >";
		if ( $paged > 2 && $paged > $range+1 && $showitems < $pages ) echo "<a href='".get_pagenum_link( 1 )."'>&laquo;</a>";
		if ( $paged > 1 && $showitems < $pages ) echo "<a href='".get_pagenum_link( $paged - 1 )."'>&lsaquo;</a>";

		for ( $i=1; $i <= $pages; $i++ ) {
			if ( 1 != $pages &&( !( $i >= $paged+$range+1 || $i <= $paged-$range-1 ) || $pages <= $showitems ) ) {
				echo ( $paged == $i )? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link( $i )."' class='inactive' >".$i."</a>";
			}
		}

		if ( $paged < $pages && $showitems < $pages ) echo "<a href='".get_pagenum_link( $paged + 1 )."'>&rsaquo;</a>";
		if ( $paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages ) echo "<a href='".get_pagenum_link( $pages )."'>&raquo;</a>";
		echo "</div>\n";
	}
}


/*-----------------------------------------------------------------------------------*/
/*	Breadcrumbs Function
/*-----------------------------------------------------------------------------------*/

function ss_breadcrumbs() {
	global $post;

	$blog_page_title = get_the_title( get_queried_object_id() );

	echo '<ul class="theme-breadcrumbs">';

	if ( !is_front_page() ) {
		echo '<li><a href="';
		echo home_url();
		echo '">'.__( 'Home', 'spnoy' );
		echo "</a></li>";
	}

	$params['link_none'] = '';
	$separator = '';

	if ( is_category() && !is_singular( 'portfolio' ) ) {
		$category = get_the_category();
		$ID = $category[0]->cat_ID;
		echo is_wp_error( $cat_parents = get_category_parents( $ID, TRUE, '', FALSE ) ) ? '' : '<li>'.$cat_parents.'</li>';
	}

	if ( is_singular( 'portfolio' ) ) {
		echo get_the_term_list( $post->ID, 'portfolio-category', '<li>', '&nbsp;/&nbsp;&nbsp;', '</li>' );
		echo '<li>'.get_the_title().'</li>';
	}

	if ( is_tax( 'portfolio-category' ) ) {
		echo '<li>'.get_query_var( 'portfolio-category' ).'</li>';
	}

	if ( is_home() ) { echo '<li>'.$blog_page_title.'</li>'; }
	if ( is_page() && !is_front_page() ) {
		$parents = array();
		$parent_id = $post->post_parent;
		while ( $parent_id ) :
			$page = get_page( $parent_id );
		if ( $params["link_none"] )
			$parents[]  = get_the_title( $page->ID );
		else
			$parents[]  = '<li><a href="' . get_permalink( $page->ID ) . '" title="' . get_the_title( $page->ID ) . '">' . get_the_title( $page->ID ) . '</a></li>' . $separator;
		$parent_id  = $page->post_parent;
		endwhile;
		$parents = array_reverse( $parents );
		echo join( ' ', $parents );
		echo '<li>'.get_the_title().'</li>';
	}
	if ( is_single() && !is_singular( 'portfolio' ) ) {
		$categories_1 = get_the_category( $post->ID );
		if ( $categories_1 ):
			foreach ( $categories_1 as $cat_1 ):
				$cat_1_ids[] = $cat_1->term_id;
			endforeach;
		$cat_1_line = implode( ',', $cat_1_ids );
		endif;
		$categories = get_categories( array(
				'include' => $cat_1_line,
				'orderby' => 'id'
			) );
		if ( $categories ) :
			foreach ( $categories as $cat ) :
				$cats[] = '<li><a href="' . get_category_link( $cat->term_id ) . '" title="' . $cat->name . '">' . $cat->name . '</a></li>';
			endforeach;
		echo join( ' ', $cats );
		endif;
		echo '<li>'.get_the_title().'</li>';
	}
	if ( is_tag() ) { echo '<li>'."Tag: ".single_tag_title( '', FALSE ).'</li>'; }
	if ( is_404() ) { echo '<li>'.__( "404 - Page not Found", 'spnoy' ).'</li>'; }
	if ( is_search() ) { echo '<li>'.__( "Search", 'spnoy' ).'</li>'; }
	if ( is_year() ) { echo '<li>'.get_the_time( get_option( 'date_format' ) ).'</li>'; }
	if ( is_month() ) { echo '<li>'.get_the_time( get_option( 'date_format' ) ).'</li>'; }
	if ( is_day() ) { echo '<li>'.get_the_time( get_option( 'date_format' ) ).'</li>'; }

	echo "</ul>";
}

?>
