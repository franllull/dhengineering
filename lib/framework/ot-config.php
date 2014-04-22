<?php

/**
 * Show Settings Pages
 */
add_filter( 'ot_show_pages', '__return_false' );


add_action( 'admin_init', 'custom_theme_options', 1 );

function custom_theme_options() {

	$social_icons = array(

		array(
			'value'       => '',
			'label'       => __( '-- Choose One --', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'twitter',
			'label'       => __( 'twitter', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'facebook',
			'label'       => __( 'facebook', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'google-plus',
			'label'       => __( 'Google Plus', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'flickr',
			'label'       => __( 'flickr', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'picassa',
			'label'       => __( 'picassa', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'dribbble',
			'label'       => __( 'dribbble', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'feed2',
			'label'       => __( 'feed', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'soundcloud',
			'label'       => __( 'sound-cloud', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'instagram',
			'label'       => __( 'instagram', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'reddit',
			'label'       => __( 'reddit', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'envelope3',
			'label'       => __( 'email', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'tumblr',
			'label'       => __( 'tumblr', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'linkedin',
			'label'       => __( 'linkedin', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'deviantart',
			'label'       => __( 'deviantart', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'pinterest',
			'label'       => __( 'pinterest', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'youtube',
			'label'       => __( 'youtube', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'vimeo3',
			'label'       => __( 'vimeo', 'spnoy_admin' ),
			'src'         => ''
		),

	);

	$sharing_buttons = array(

		array(
			'value'       => 'facebook',
			'label'       => __( 'Facebook', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'twitter',
			'label'       => __( 'Twitter', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'gplus',
			'label'       => __( 'Google Plus', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'reddit',
			'label'       => __( 'Reddit', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'linkedin',
			'label'       => __( 'Linkedin', 'spnoy_admin' ),
			'src'         => ''
		),
		array(
			'value'       => 'email',
			'label'       => __( 'Email', 'spnoy_admin' ),
			'src'         => ''
		),

	);

	$saved_settings = get_option( 'option_tree_settings', array() );

	$custom_settings = array(

		/*-----------------------------------------------------------------------------------*/
		/*  HELP TAB
		/*-----------------------------------------------------------------------------------*/

		// 'contextual_help' => array(
		//  'content'       => array(
		//   array(
		//    'id'        => 'general_help',
		//    'title'     => 'General',
		//    'content'   => '<p>Help content goes here!</p>'
		//   )
		//  ),
		//  'sidebar'       => '<p>Sidebar content goes here!</p>',
		// ),


		/*-----------------------------------------------------------------------------------*/
		/*  SECTIONS TAB
		/*-----------------------------------------------------------------------------------*/

		'sections'  => array(
			array(
				'id'          => 'general',
				'title'       => 'General'
			),
			array(
				'id'          => 'header',
				'title'       => 'Header'
			),
			array(
				'id'          => 'footer',
				'title'       => 'Footer'
			),
			array(
				'id'          => 'styling',
				'title'       => 'Styling'
			),
			array(
				'id'          => 'sharing',
				'title'       => 'Sharing'
			),
			array(
				'id'          => 'portfolio',
				'title'       => 'Portfolio'
			),
			array(
				'id'          => 'blog',
				'title'       => 'Blog'
			),
			array(
				'id'          => 'custom_codes',
				'title'       => 'Custom Codes'
			),
		),

		'settings'  => array(


			/*-----------------------------------------------------------------------------------*/
			/*  GENERAL
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'general_heading',
				'label'        => '',
				'desc'         => '<div class="ss-ot-heading">' . __( 'General', 'spnoy_admin' ) . '</div>',
				'type'         => 'textblock',
				'section'      => 'general',
			),
			array(
				'id'           => 'responsive_switch',
				'label'        => __( 'Responsive (Tablets/Phones)', 'spnoy_admin' ),
				'desc'         =>  __( '<b>Note:</b> Disabling respinsive will only work on actual devices not on desktop computers.', 'spnoy_admin' ),
				'std'          => 'on',
				'type'         => 'on-off',
				'section'      => 'general',
				'condition'    => '',
				'operator'     => 'and'
			),
			array(
				'id'           => 'pages_comments_switch',
				'label'        => __( 'Allow comments on pages', 'spnoy_admin' ),
				'desc'         =>  __( 'Show/Hide comments on pages.<br/><b>Note:</b> Page specific settings get overwritten.', 'spnoy_admin' ),
				'std'          => 'on',
				'type'         => 'on-off',
				'section'      => 'general',
				'condition'    => '',
				'operator'     => 'and'
			),
			array(
				'id'           => 'animation_on_mobile_switch',
				'label'        => __( 'Animation on mobile devices (Tablets/Phones)', 'spnoy_admin' ),
				'desc'         =>  __( "<b>Note:</b> It's highly recommended that you disable animation on mobile devices due to the performance issues that may result device's browser to crash.", 'spnoy_admin' ),
				'std'          => 'off',
				'type'         => 'on-off',
				'section'      => 'general',
				'condition'    => '',
				'operator'     => 'and'
			),
			array(
				'id'           => 'one_page_scroll_speed',
				'label'        => __( 'Navigation Scroll Speed', 'spnoy_admin' ),
				'desc'         =>  __( "Enter scroll speed of one page navigation in milliseconds.", 'spnoy_admin' ),
				'std'          => '600',
				'type'         => 'text',
				'section'      => 'general',
			),
			array(
				'id'           => 'image_quality',
				'label'        => __( 'WordPress JPEG Image Compression', 'spnoy_admin' ),
				'desc'         =>  __( 'Increase or Decrease WordPress JPEG Image Compression. (Higher = Better Image Quality) (Default: 90)<br/><br/>This will only apply to thumbnails and images generated after you have changed this number. If you want this to apply to existing images and thumbnails, you should use a plugin like <a target="_blank" href="http://wordpress.org/plugins/regenerate-thumbnails/">"Regenerate Thumbnails"</a>', 'spnoy_admin' ),
				'std'          => '90',
				'type'         => 'numeric-slider',
				'section'      => 'general',
				'min_max_step' => '50,100,5',
			),
			array(
				'id'           => 'favicons_heading',
				'label'        => '',
				'desc'         => '<div class="ss-ot-heading">' . __( 'Fav Icons', 'spnoy_admin' ) . '</div>',
				'type'         => 'textblock',
				'section'      => 'general',
			),
			array(
				'id'           => 'favicon_16',
				'label'        => __( 'Favicon (16x16)', 'spnoy_admin' ),
				'desc'         =>  __( 'Upload your Favicon<br>(16x16px ico/png - use <a href="http://www.favicon.cc/" target="_blank">"favicon.cc"</a> to make sure it\'s fully compatible)', 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'general',
			),
			array(
				'id'           => 'favicon_57',
				'label'        => __( 'Apple iPhone Icon Upload (57x57)', 'spnoy_admin' ),
				'desc'         =>  __( 'Upload your Apple iPhone Icon (57px57px png)', 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'general',
			),
			array(
				'id'           => 'favicon_114',
				'label'        => __( 'Apple iPhone Retina Icon Upload (114x114)', 'spnoy_admin' ),
				'desc'         =>  __( 'Upload your Apple iPhone Retina Icon (114px114px png)', 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'general',
			),
			array(
				'id'           => 'favicon_72',
				'label'        => __( 'Apple iPad Icon Upload (72x72)', 'spnoy_admin' ),
				'desc'         =>  __( 'Upload your Apple iPad Icon (72px72px png)', 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'general',
			),
			array(
				'id'           => 'favicon_144',
				'label'        => __( 'Apple iPad Retina Icon Upload (144x144)', 'spnoy_admin' ),
				'desc'         =>  __( 'Upload your Apple iPad Retina (144px144px png)', 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'general',
			),


			/*-----------------------------------------------------------------------------------*/
			/*  HEADER
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'logo',
				'label'        => __( 'Logo', 'spnoy_admin' ),
				'desc'         =>  __( 'Upload your logo here.', 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'header',
			),
			array(
				'id'           => 'logo_svg',
				'label'        => __( 'Logo (.svg) - Optional', 'spnoy_admin' ),
				'desc'         =>  __( "Upload your logo for (HiDPI) displays in SVG format.<br><br><b>Note:</b> Your SVG logo should have the same name as your normal logo, For example if your logo is 'website-logo.png' your svg logo should be 'website-logo.svg'.", 'spnoy_admin' ),
				'type'         => 'upload',
				'section'      => 'header',
			),
			array(
				'id'           => 'sticky_header_switch',
				'label'        => __( 'Sticky Header', 'spnoy_admin' ),
				'desc'         =>  __( 'Enable/Disable Sticky Header.', 'spnoy_admin' ),
				'std'          => 'on',
				'type'         => 'on-off',
				'section'      => 'header',
				'condition'    => '',
				'operator'     => 'and'
			),


			/*-----------------------------------------------------------------------------------*/
			/*  Footer
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'footer_text',
				'label'        => __( 'Footer Text', 'spnoy_admin' ),
				'desc'         => __( 'Enter your footer text here.', 'spnoy_admin' ),
				'std'          => '',
				'type'         => 'textarea-simple',
				'section'      => 'footer',
				'rows'         => '5',
			),
			array(
				'id'           => 'footer_social_icons',
				'label'        => __( 'Social Icons', 'spnoy_admin' ),
				'type'         => 'list-item',
				'section'      => 'footer',
				'settings'     => array(

					array(
						'id'          => 'link',
						'label'       => __( 'Link', 'spnoy_admin' ),
						'desc'        => '',
						'std'         => '',
						'type'        => 'text',
					),
					array(
						'id'          => 'type',
						'label'       => __( 'Type', 'spnoy_admin' ),
						'std'         => '',
						'type'        => 'select',
						'choices'     => $social_icons
					),

				),
			),


			/*-----------------------------------------------------------------------------------*/
			/*  Styling
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'styling_heading',
				'label'        => '',
				'desc'         => '<div class="ss-ot-heading">' . __( 'General', 'spnoy_admin' ) . '</div>',
				'type'         => 'textblock',
				'section'      => 'styling',
			),
			array(
				'id'           => 'accent_color_1',
				'label'        => __( 'Accent Color 1', 'spnoy_admin' ),
				'std'          => '#133939',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'accent_color_2',
				'label'        => __( 'Accent Color 2', 'spnoy_admin' ),
				'std'          => '#00b688',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'text_color',
				'label'        => __( 'Text Color', 'spnoy_admin' ),
				'std'          => '#ffffff',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'link_color',
				'label'        => __( 'Link Color', 'spnoy_admin' ),
				'std'          => '#00b688',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'link_hover_color',
				'label'        => __( 'Link Hover Color', 'spnoy_admin' ),
				'std'          => '#133939',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'background_color',
				'label'        => __( 'Background Color', 'spnoy_admin' ),
				'std'          => '#133939',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'main_menu_heading',
				'label'        => '',
				'desc'         => '<div class="ss-ot-heading">' . __( 'Main Menu', 'spnoy_admin' ) . '</div>',
				'type'         => 'textblock',
				'section'      => 'styling',
			),
			array(
				'id'           => 'main_menu_color',
				'label'        => __( 'Main Menu Text Color', 'spnoy_admin' ),
				'std'          => '#ffffff',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'main_menu_hover_color',
				'label'        => __( 'Main Menu Hover Color', 'spnoy_admin' ),
				'std'          => '#00b688',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'main_menu_bg_color',
				'label'        => __( 'Main Menu Background Color', 'spnoy_admin' ),
				'std'          => '#133939',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'form_heading',
				'label'        => '',
				'desc'         => '<div class="ss-ot-heading">' . __( 'Form Fields', 'spnoy_admin' ) . '</div>',
				'type'         => 'textblock',
				'section'      => 'styling',
			),
			array(
				'id'           => 'field_color',
				'label'        => __( 'Field Text Color', 'spnoy_admin' ),
				'std'          => '#133939',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'field_placeholder_color',
				'label'        => __( 'Field Placeholder Color', 'spnoy_admin' ),
				'std'          => '#c4cdcd',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),
			array(
				'id'           => 'field_bg_color',
				'label'        => __( 'Field Background Color', 'spnoy_admin' ),
				'std'          => '#ffffff',
				'type'         => 'colorpicker',
				'section'      => 'styling',
			),



			/*-----------------------------------------------------------------------------------*/
			/*  Sharing
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'portfolio_sharing_switch',
				'label'        => __( 'Portfolio Sharing', 'spnoy_admin' ),
				'desc'         =>  __( 'Show/Hide Sharing buttons on portfolio single pages.', 'spnoy_admin' ),
				'std'          => 'off',
				'type'         => 'on-off',
				'section'      => 'sharing',
			),
			array(
				'id'          => 'portfolio_sharing_buttons',
				'label'       => '',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'sharing',
				'condition'   => 'portfolio_sharing_switch:is(on)',
				'operator'    => 'and',
				'choices'     => $sharing_buttons
			),
			array(
				'id'           => 'blog_sharing_switch',
				'label'        => __( 'Blog Sharing', 'spnoy_admin' ),
				'desc'         =>  __( 'Show/Hide Sharing buttons on blog single pages.', 'spnoy_admin' ),
				'std'          => 'off',
				'type'         => 'on-off',
				'section'      => 'sharing',
			),
			array(
				'id'          => 'blog_sharing_buttons',
				'label'       => '',
				'std'         => '',
				'type'        => 'checkbox',
				'section'     => 'sharing',
				'condition'   => 'blog_sharing_switch:is(on)',
				'operator'    => 'and',
				'choices'     => $sharing_buttons
			),


			/*-----------------------------------------------------------------------------------*/
			/*  Portfolio
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'portfolio_url_slug',
				'label'        => __( 'Portfolio URL Slug', 'spnoy_admin' ),
				'desc'         => __( 'By changing this option you can change the "portfolio" slug in your URL.<br><br><b>Don\'t change this unless you know what you\'re doing.</b>', 'spnoy_admin' ),
				'std'          => 'portfolio',
				'type'         => 'text',
				'section'      => 'portfolio',
			),
			array(
				'id'           => 'portfolio_comments_switch',
				'label'        => __( 'Comments', 'spnoy_admin' ),
				'desc'         =>  __( "Note: If enable, Make sure the discussion filed is checked when you're adding/editing your Portfolio post.", 'spnoy_admin' ),
				'std'          => 'off',
				'type'         => 'on-off',
				'section'      => 'portfolio',
			),
			array(
				'id'           => 'portfolio_related_switch',
				'label'        => __( 'Related Portfolios', 'spnoy_admin' ),
				'desc'         =>  __( "Enable/Disable Related Projects in portfolio single post.", 'spnoy_admin' ),
				'std'          => 'on',
				'type'         => 'on-off',
				'section'      => 'portfolio',
			),


			/*-----------------------------------------------------------------------------------*/
			/*  Blog
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'blog_readmore_swith',
				'label'        => __( 'Readmore', 'spnoy_admin' ),
				'desc'         =>  __( "Show/Hide Readmore link on blog pages.", 'spnoy_admin' ),
				'std'          => 'on',
				'type'         => 'on-off',
				'section'      => 'blog',
			),
			array(
				'id'           => 'blog_new_tab_switch',
				'label'        => __( 'Open in New Tab', 'spnoy_admin' ),
				'desc'         =>  __( 'Enable/Disable target="_blank" on Blog Posts.<br><br><b>Note:</b> For providing a better user experiance for your visitors it is recommended to turn this option off.', 'spnoy_admin' ),
				'std'          => 'off',
				'type'         => 'on-off',
				'section'      => 'blog',
			),
			

			/*-----------------------------------------------------------------------------------*/
			/*  Custom Codes
			/*-----------------------------------------------------------------------------------*/

			array(
				'id'           => 'tracking_code',
				'label'        => __( 'Tracking Code', 'spnoy_admin' ),
				'desc'         => __( 'Place your Google Analytics Code (or other) here.<br><br><b>Note:</b> Place Your tracking code should contain a script tag, Because your code would be injected directly without any changes.', 'spnoy_admin' ),
				'type'         => 'textarea-simple',
				'section'      => 'custom_codes',
				'rows'         => '5',
			),
			array(
				'id'           => 'custom_css',
				'label'        => __( 'Custom CSS', 'spnoy_admin' ),
				'desc'         => __( 'Place your custom styling here, Useful for customzing the theme.<br><br><b>Note:</b> Your codes would be placed in a style tag.', 'spnoy_admin' ),
				'type'         => 'css',
				'section'      => 'custom_codes',
				'rows'         => '5',
			),
			array(
				'id'           => 'custom_js',
				'label'        => __( 'Custom JS', 'spnoy_admin' ),
				'desc'         => __( 'Place your custom JavaScript codes here, Useful for customzing the theme.<br><br><b>Note:</b> Your codes would be placed in a script tag.', 'spnoy_admin' ),
				'type'         => 'textarea-simple',
				'section'      => 'custom_codes',
				'rows'         => '5',
			),
			array(
				'id'           => 'before_head',
				'label'        => __( 'Before &lt;/head&gt; tag', 'spnoy_admin' ),
				'desc'         => __( 'Place your custom codes here, Useful for customzing the theme.<br><br><b>Note:</b> Your codes would be injected directly without any changes.', 'spnoy_admin' ),
				'type'         => 'textarea-simple',
				'section'      => 'custom_codes',
				'rows'         => '5',
			),
			array(
				'id'           => 'before_body',
				'label'        => __( 'Before &lt;/body&gt; tag', 'spnoy_admin' ),
				'desc'         => __( 'Place your custom codes here, Useful for customzing the theme.<br><br><b>Note:</b> Your codes would be injected directly without any changes.', 'spnoy_admin' ),
				'type'         => 'textarea-simple',
				'section'      => 'custom_codes',
				'rows'         => '5',
			),

		),

	);

	/* settings are not the same update the DB */
	if ( $saved_settings !== $custom_settings ) {
		update_option( 'option_tree_settings', $custom_settings );
	}



}

?>
