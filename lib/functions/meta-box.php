<?php

/*-----------------------------------------------------------------------------------*/
/*	 Include Meta-Box Plugin Properly
/*-----------------------------------------------------------------------------------*/

if ( !defined('RWMB_URL') && !defined('RWMB_DIR') ) {
	define( 'RWMB_URL', trailingslashit( get_template_directory_uri() . '/lib/includes/meta-box' ) );
	define( 'RWMB_DIR', trailingslashit( get_template_directory() . '/lib/includes/meta-box' ) );
}

require_once RWMB_DIR . 'meta-box.php';


/*-----------------------------------------------------------------------------------*/
/*	Defining Meta Boxes
/*-----------------------------------------------------------------------------------*/

$ss_prefix = 'ss_';
global $meta_boxes;
$meta_boxes = array();


/*------------------------------------------------------
	Post Formats
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'post_format_options',
	'title' => 'Post Format Options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'             =>  __( 'Post Gallery', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}post_gallery",
			'type'             => 'image_advanced',
			'max_file_uploads' => 9999,
		),
		array(
			'name'  => __( 'URL', 'spnoy_admin' ),
			'id'    => "{$ss_prefix}post_link",
			'desc'  => '',
			'type'  => 'text',
			'std'   => '',
		),
		array(
			'name'  => __( 'Quote Source', 'spnoy_admin' ),
			'id'    => "{$ss_prefix}post_quote_source",
			'desc'  => '',
			'type'  => 'text',
			'std'   => '',
		),
		array(
			'name'  => __( 'Quote Content', 'spnoy_admin' ),
			'id'    => "{$ss_prefix}post_quote_content",
			'desc'  => '',
			'type'  => 'text',
			'std'   => '',
		),
		array(
			'name'  => __( 'Audio', 'spnoy_admin' ),
			'id'    => "{$ss_prefix}post_audio",
			'desc'  => __( 'Audio URL (Soundcloud, ...)', 'spnoy_admin' ),
			'type'  => 'text',
			'std'   => '',
		),
		array(
			'name'  => __( 'Video', 'spnoy_admin' ),
			'id'    => "{$ss_prefix}post_video",
			'desc'  => __( 'Video URL (Youtube, Vimeo, ...)', 'spnoy_admin' ),
			'type'  => 'text',
			'std'   => '',
		)

	)
);


/*------------------------------------------------------
	Post Masonry Options
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'mosonry_options',
	'title' => 'Layout Options',
	'pages' => array( 'post' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'id'       => "{$ss_prefix}post_layout",
			'name'     => __( 'Post Single Layout', 'spnoy_admin' ),
			'type'     => 'image_select',
			'options'  => array(
				'sidebar'  => THEME_IMAGES . '/admin/meta-box/layout-1.gif',
				'fullwidth' => THEME_IMAGES . '/admin/meta-box/layout-2.gif',
			),
			'multiple' => false,
			'std'         => 'sidebar'
		),
		array(
			'name'     => __( 'Masonry Mix 3 Columns', 'spnoy_admin' ),
			'id'       => "{$ss_prefix}masonry_mix_3col_size",
			'type'     => 'select',
			'options'  => array(
				'one-three' => __( 'One Third', 'spnoy_admin' ),
				'two-three' => __( 'Two Third', 'spnoy_admin' ),
			),
			'desc'  => __( "Set the blog post size for 'Masonry Mix 3 Columns' template.", 'spnoy_admin' ),
			'multiple'    => false,
			'std'         => 'one-three'
		),
		array(
			'name'     => __( 'Masonry Mix 4 Columns', 'spnoy_admin' ),
			'id'       => "{$ss_prefix}masonry_mix_4col_size",
			'type'     => 'select',
			'options'  => array(
				'one-four' => __( 'One Fourth', 'spnoy_admin' ),
				'two-four' => __( 'Two Fourth', 'spnoy_admin' ),
			),
			'desc'  => __( "Set the blog post size for 'Masonry Mix 4 Columns' template.", 'spnoy_admin' ),
			'multiple'    => false,
			'std'         => 'one-four'
		),

	)
);


/*------------------------------------------------------
	Page Options
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'page_options',
	'title' => 'Page Options',
	'pages' => array( 'page', 'post', 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'    => __( 'Page Header', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}page_header_switch",
			'desc'  => __( 'Show/Hide Page Header.', 'spnoy_admin' ),
			'type'    => 'radio',
			'options' => array(
				'1' => 'Show',
				'0' => 'Hide',
			),
			'std'   => '1'
		),
		array(
			'name'    => __( 'Page Header Effect', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}page_header_effect_switch",
			'desc'  => __( 'Enable/Disable Effect on page header.<br><b>Note:</b> This will only work on the Homepage.', 'spnoy_admin' ),
			'type'    => 'radio',
			'options' => array(
				'1' => 'Enable',
				'0' => 'Disable',
			),
			'std'   => '1'
		),
		array(
			'name'    => __( 'Breadcrumbs', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}breadcrumbs_switch",
			'desc'  => __( 'Show/Hide Breadcrumbs.', 'spnoy_admin' ),
			'type'    => 'radio',
			'options' => array(
				'1' => 'Show',
				'0' => 'Hide',
			),
			'std'   => '1'
		),
		array(
			'name'             =>  __( 'Page Title', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}page_title",
			'type'             => 'text'
		),

	)
);


/*------------------------------------------------------
	Blog Options
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'blog_page_options',
	'title' => 'Blog Options',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'             =>  __( 'Posts Per Page', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}blog_per_page",
			'type'             => 'number',
			'min'	=> 1,
			'step'	=> 1,
			'std'   => '10'
		),
		array(
            'name'    => __( 'Categories not to show', 'spnoy_admin' ),
            'id'      => "{$ss_prefix}blog_page_categories_not",
            'desc'  => __( "Select the categories you wish not to dispaly on this blog page.", 'spnoy_admin' ),
            'type'    => 'taxonomy',
            'options' => array(
                'taxonomy' => 'category',
                'type' => 'checkbox_list'
            )
        ),

	),
	'only_on'    => array(
		'template'	=>	array(
							'template-blog-classic-sidebar.php',
							'template-blog-classic-fullwidth.php',
							'template-blog-grid-2col.php',
							'template-blog-grid-3col.php',
							'template-blog-grid-4col.php',
							'template-blog-grid-2col-sidebar.php',
							'template-blog-masonry-2col-sidebar.php',
							'template-blog-masonry-2col.php',
							'template-blog-masonry-3col.php',
							'template-blog-masonry-4col.php',
							'template-blog-compact-sidebar.php',
							'template-blog-compact-fullwidth.php',
							'template-blog-masonry-mix-3col.php',
							'template-blog-masonry-mix-4col.php',
						)
	)
);


/*------------------------------------------------------
	Portfolio Page Options
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'portfolio_page_options',
	'title' => 'Portfolio Options',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'    => __( 'Filter Bar', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}portfolio_filter_bar",
			'desc'  => __( 'Show/Hide Portfolio filter bar.<br/><b>Note: This will only works on the templates that supprots Filter Bar.</b>', 'spnoy_admin' ),
			'type'    => 'radio',
			'options' => array(
				'1' => 'Show',
				'0' => 'Hide',
			),
			'std'   => '1'
		),
		array(
			'name'             =>  __( 'Posts Per Page', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}portfolio_per_page",
			'type'             => 'number',
			'min'	=> 1,
			'step'	=> 1,
			'std'   => '10'
		),
		array(
            'name'    => __( 'Categories not to show', 'spnoy_admin' ),
            'id'      => "{$ss_prefix}portfolio_page_categories_not",
            'desc'  => __( "Select the categories you wish not to dispaly on this portfolio page.", 'spnoy_admin' ),
            'type'    => 'taxonomy',
            'options' => array(
                'taxonomy' => 'portfolio-category',
                'type' => 'checkbox_list'
            )
        ),

	),
	'only_on'    => array(
		'template'	=>	array(
							'template-portfolio-2col.php',
							'template-portfolio-3col.php',
							'template-portfolio-4col.php',
							'template-portfolio-2col-nogutter.php',
							'template-portfolio-3col-nogutter.php',
							'template-portfolio-4col-nogutter.php',
							'template-portfolio-5col-nogutter.php',
							'template-portfolio-3col-full.php',
							'template-portfolio-4col-full.php',
							'template-portfolio-5col-full.php',
						)
	)
);


/*------------------------------------------------------
	Portfolio Featured Video
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'featured_video',
	'title' =>  __( 'Featured Video', 'spnoy_admin' ),
	'pages' => array( 'portfolio' ),
	'context' => 'side',
	'priority' => 'low',
	'fields' => array(

		array(
			'name'  => '',
			'id'    => "{$ss_prefix}portfolio_video",
			'desc'  => 'ex. http://vimeo.com/64473966',
			'type'  => 'text',
			'std'   => ''
		)

	)
);


/*------------------------------------------------------
	Portfolio Post Options
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'portfolio_post_options',
	'title' =>  __( 'Portfolio Options', 'spnoy_admin' ),
	'pages' => array( 'portfolio' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'type' => 'heading',
			'name' => __( 'General', 'spnoy_admin' ),
			'id'   => 'fake_id',
		),
		array(
			'name'  => __( 'Link to', 'spnoy_admin' ),
			'id'    => "{$ss_prefix}portfolio_link",
			'desc'  => __( "Link your Portfolio to another web address.", 'spnoy_admin' ),
			'type'  => 'text',
			'std'   => ''
		),
		array(
			'type' => 'heading',
			'name' => __( 'Portfolio Single', 'spnoy_admin' ),
			'id'   => 'fake_id',
		),
		array(
			'id'       => "{$ss_prefix}portfolio_layout",
			'name'     => __( 'Layout', 'spnoy_admin' ),
			'type'     => 'image_select',
			'options'  => array(
				'layout-two-third'  => THEME_IMAGES . '/admin/meta-box/layout-1.gif',
				'layout-fullwidth' => THEME_IMAGES . '/admin/meta-box/layout-2.gif',
			),
			'multiple' => false,
			'std'         => 'layout-two-third'
		),
		array(
			'name'             =>  __( 'Gallery', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}portfolio_gallery",
			'type'             => 'image_advanced',
			'max_file_uploads' => 9999,
		),
		array(
			'type' => 'heading',
			'name' => __( 'Additional Info', 'spnoy_admin' ),
			'id'   => 'fake_id',
		),
		array(
			'name'             =>  __( 'Title', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}additional_info_title",
			'type'             => 'text',
			'std'             => 'MORE INFO',
		),
		array(
			'name'             =>  __( 'List Items', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}additional_info_items",
			'type'             => 'text',
			'std'             => '',
			'clone'             => true,
			'desc'  => 'Use  " : "  to separate title and text.',
		),
		array(
			'type' => 'heading',
			'name' => __( 'Spnoy Mosaic Gallery', 'spnoy_admin' ),
			'id'   => 'fake_id',
		),
		array(
			'id'       => "{$ss_prefix}tiles_gallery_layout",
			'name'     => __( 'Layout', 'spnoy_admin' ),
			'type'     => 'image_select',
			'options'  => array(
				'layout-1'  => THEME_IMAGES . '/admin/meta-box/tile-layout-1.gif',
				'layout-2' => THEME_IMAGES . '/admin/meta-box/tile-layout-2.gif',
				'layout-3' => THEME_IMAGES . '/admin/meta-box/tile-layout-3.gif',
				'layout-4' => THEME_IMAGES . '/admin/meta-box/tile-layout-4.gif',
			),
			'multiple' => false,
			'std'         => 'layout-1'
		),
		array(
			'name'             =>  __( 'Thumbnail', 'spnoy_admin' ),
			'id'               => "{$ss_prefix}portfolio_thumbnail",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1,
		),
		array(
			'name'             =>  __( 'Caption', 'spnoy_admin' ),
			'desc'	=> __( "Enter the mosaic's caption, leave it empty to disable.", 'spnoy_admin' ),
			'id'               => "{$ss_prefix}tiles_gallery_caption",
			'type'             => 'textarea',
			'std'             => '',
		),
		array(
			'name' => __( 'Caption color', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}tiles_gallery_caption_color",
			'type' => 'color',
			'std'	=> '#ffffff',
		),
		array(
			'name' 	 =>  __( 'Hover', 'spnoy_admin' ),
			'desc'	=> __( "Enter the mosaic's hover description, leave it empty to disable.", 'spnoy_admin' ),
			'id'   	 => "{$ss_prefix}tiles_gallery_hover",
			'type' 	 => 'textarea',
			'std'	=> '',
		),
		array(
			'name' => __( 'Always on hover', 'spnoy_admin' ),
			'desc'	=> __( 'Enable/Disable Always on hover state.', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}tiles_gallery_always_hover",
			'type' => 'checkbox',
			'std'  => 0,
		),
		array(
			'name' => __( 'Readmore', 'spnoy_admin' ),
			'desc'	=> __( 'Enable/Disable Readmore link.', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}tiles_gallery_readmore",
			'type' => 'checkbox',
			'std'  => 0,
		),
		array(
			'name' => __( 'Complete Link', 'spnoy_admin' ),
			'desc'	=> __( 'Enable/Disable Whether you want your mosaic to be comepletly as a link or not.<br><b>Note:</b> Readmore or Compelete Link can not be enabled at the same time together.', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}tiles_gallery_complete_link",
			'type' => 'checkbox',
			'std'  => 0,
		),
		array(
			'name' => __( 'Background color', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}tiles_gallery_bg_color",
			'type' => 'color',
			'std'	=> '#303030',
		),
		array(
			'name' => __( 'Text color', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}tiles_gallery_text_color",
			'type' => 'color',
			'std'	=> '#ffffff',
		),

	)
);


/*------------------------------------------------------
	Full Width Page Options
-------------------------------------------------------*/

$meta_boxes[] = array(

	'id' => 'fullwidth_post_options',
	'title' =>  __( 'Related Options', 'spnoy_admin' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'    => __( 'Background Color', 'spnoy_admin' ),
			'desc'	=> __( 'Select the page background color.', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}fullwidth_background_color",
			'type'    => 'color',
			'std'   => '#ffffff'
		),
		array(
			'name'    => __( 'Text Color', 'spnoy_admin' ),
			'desc'	=> __( 'Select the page text color.', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}fullwidth_text_color",
			'type'    => 'color',
			'std'   => '#2d343e'
		),
		array(
			'name'    => __( 'Background Image', 'spnoy_admin' ),
			'desc'	=> __( 'Select the page background image. <br/> Note: This option ignores selected background color.', 'spnoy_admin' ),
			'id'      => "{$ss_prefix}fullwidth_background_image",
			'type'             => 'image_advanced',
			'max_file_uploads' => 1
		),
		array(
			'name' => __( 'Repeatable Background Image', 'spnoy_admin' ),
			'desc'	=> __( 'Select whether you want your background image to be repeatable or not.', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}fullwidth_background_image_repeatable",
			'type' => 'checkbox',
			'std'  => 0,
		),
		array(
			'name' => __( 'Parallax Effect', 'spnoy_admin' ),
			'desc'	=> __( 'Enable Parallax Effect for your background image.<br/><b>Note: Do not use this effect on long pages or with images with low height.</b>', 'spnoy_admin' ),
			'id'   => "{$ss_prefix}fullwidth_parallax_effect",
			'type' => 'checkbox',
			'std'  => 0,
		),
		array(
			'type' => 'heading',
			'name' => __( "Home's section spacing", 'spnoy_admin' ),
			'id'   => 'fake_id',
		),
		array(
			'name'    => __( 'Inner Space from top', 'spnoy' ),
			'id'      => "{$ss_prefix}fullwidth_space_from_top",
			'desc'  => __( "Section's inner space from top. (px)", 'spnoy' ),
			'type'    => 'text',
			'std'   => '60'
		),
		array(
			'name'    => __( 'Inner Space from bottom', 'spnoy' ),
			'id'      => "{$ss_prefix}fullwidth_space_from_bottom",
			'desc'  => __( "Section's inner space from bottom. (px)", 'spnoy' ),
			'type'    => 'text',
			'std'   => '60'
		),
		array(
			'name'    => __( 'Outer Space from top', 'spnoy' ),
			'id'      => "{$ss_prefix}fullwidth_outer_space_from_top",
			'desc'  => __( "Section's Outer space from top. (px)<br>Handy for deeper level of customization.", 'spnoy' ),
			'type'    => 'text',
			'std'   => '0'
		),
		array(
			'name'    => __( 'Outer Space from bottom', 'spnoy' ),
			'id'      => "{$ss_prefix}fullwidth_outer_space_from_bottom",
			'desc'  => __( "Section's Outer space from bottom. (px)<br>Handy for deeper level of customization.", 'spnoy' ),
			'type'    => 'text',
			'std'   => '0'
		),

	),
	'only_on'    => array(
		'template' => array( 'template-fullwidth.php', 'template-fullscreen.php' )
	)
);


/*------------------------------------------------------
	Sidebars
-------------------------------------------------------*/

$ss_registered_sidebars = array();
foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
    $ss_registered_sidebars[ $sidebar['id'] ] = $sidebar['name'];
}
$meta_boxes[] = array(

	'id' => 'sidebars',
	'title' =>  __( 'Sidebars', 'spnoy_admin' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name'     => __( 'Select a sidebar', 'spnoy_admin' ),
			'id'       => "{$ss_prefix}sidebars",
			'type'     => 'select',
			'desc'  =>  __( 'Select the sidebar you wish to display on this page.<br/><b>This will only work on the pages that support Sidebar.</b>', 'spnoy_admin' ),
			'options'  => $ss_registered_sidebars,
			'std'         => 'primary-sidebar',
		)

	)

);



/*-----------------------------------------------------------------------------------*/
/*	Regestring Meta Boxes
/*-----------------------------------------------------------------------------------*/

function ss_register_meta_boxes() {
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box ) {
		if ( isset( $meta_box['only_on'] ) && ! rw_maybe_include( $meta_box['only_on'] ) ) {
				continue;
			}
		new RW_Meta_Box( $meta_box );
	}
}

add_action( 'admin_init', 'ss_register_meta_boxes' );


/**
 * Check if meta boxes is included
 *
 * @return bool
 */
function rw_maybe_include( $conditions ) {
	// Include in back-end only
	if ( ! defined( 'WP_ADMIN' ) || ! WP_ADMIN ) {
		return false;
	}

	// Always include for ajax
	if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
		return true;
	}

	if ( isset( $_GET['post'] ) ) {
		$post_id = $_GET['post'];
	}
	elseif ( isset( $_POST['post_ID'] ) ) {
		$post_id = $_POST['post_ID'];
	}
	else {
		$post_id = false;
	}

	$post_id = (int) $post_id;
	$post    = get_post( $post_id );

	foreach ( $conditions as $cond => $v ) {
		// Catch non-arrays too
		if ( ! is_array( $v ) ) {
			$v = array( $v );
		}

		switch ( $cond ) {
			case 'id':
				if ( in_array( $post_id, $v ) ) {
					return true;
				}
			break;
			case 'parent':
				$post_parent = $post->post_parent;
				if ( in_array( $post_parent, $v ) ) {
					return true;
				}
			break;
			case 'slug':
				$post_slug = $post->post_name;
				if ( in_array( $post_slug, $v ) ) {
					return true;
				}
			break;
			case 'template':
				$template = get_post_meta( $post_id, '_wp_page_template', true );
				if ( in_array( $template, $v ) ) {
					return true;
				}
			break;
		}
	}

	// If no condition matched
	return false;
}