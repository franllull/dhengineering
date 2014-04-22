<?php

/**
 * Initialize the meta boxes. 
 */
add_action( 'admin_init', 'ot_custom_meta_boxes' );

function ot_custom_meta_boxes() {

	$my_meta_box = array(
		'id'        => 'prcing_table_options',
		'title'     => 'Pricing Table Options',
		'desc'      => '',
		'pages'     => array( 'pricing-table' ),
		'context'   => 'normal',
		'priority'  => 'high',
		'fields'    => array(

			array(
		        'label'       => __( 'Pricing Table Name', 'spnoy_admin' ),
		        'desc'        => __( 'This <b>unique</b> name will be used in shortcode to show your Prcing Table.', 'spnoy_admin' ),
		        'id'          => 'pricing_table_name',
		        'type'        => 'text',
		    ),
			array(
				'id'          => 'pricing_table',
				'label'       => __( 'Plans', 'spnoy_admin' ),
				'desc'        => __( 'Use the button on the left side to create a new plan for your pricing table.', 'spnoy_admin' ),
				'std'         => '',
				'type'        => 'list-item',
				'section'     => 'option_types',
				'rows'        => '',
				'post_type'   => '',
				'taxonomy'    => '',
				'min_max_step'=> '',
				'class'       => '',
				'condition'   => '',
				'operator'    => 'and',
				'settings'    => array( 
					array(
				        'label'       => __( 'Price', 'spnoy_admin' ),
				        'id'          => 'price',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Price Unit', 'spnoy_admin' ),
				        'id'          => 'price_unit',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Price Subtitle', 'spnoy_admin' ),
				        'id'          => 'price_subtitle',
				        'type'        => 'textarea',
				        'rows'        => '2',
				    ),
				    array(
				        'label'       => __( 'Row 1', 'spnoy_admin' ),
				        'id'          => 'row_1',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 2', 'spnoy_admin' ),
				        'id'          => 'row_2',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 3', 'spnoy_admin' ),
				        'id'          => 'row_3',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 4', 'spnoy_admin' ),
				        'id'          => 'row_4',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 5', 'spnoy_admin' ),
				        'id'          => 'row_5',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 6', 'spnoy_admin' ),
				        'id'          => 'row_6',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 7', 'spnoy_admin' ),
				        'id'          => 'row_7',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 8', 'spnoy_admin' ),
				        'id'          => 'row_8',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 9', 'spnoy_admin' ),
				        'id'          => 'row_9',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Row 10', 'spnoy_admin' ),
				        'id'          => 'row_10',
				        'type'        => 'text',
				    ),
				    array(
				        'label'       => __( 'Show Button', 'spnoy_admin' ),
				        'id'          => 'button_switch',
				        'type'        => 'on-off',
				        'std'         => 'off',
				    ),
				    array(
				        'label'       => __( 'Button Text', 'spnoy_admin' ),
				        'id'          => 'button_text',
				        'type'        => 'text',
				        'condition'   => 'button_switch:is(on)',
				    ),
				    array(
				        'label'       => __( 'Button Link', 'spnoy_admin' ),
				        'id'          => 'button_link',
				        'type'        => 'text',
				        'std'         => '#',
				        'condition'   => 'button_switch:is(on)',
				    ),
				    array(
				        'label'       => __( 'Featured', 'spnoy_admin' ),
				        'id'          => 'featured_switch',
				        'type'        => 'on-off',
				        'std'         => 'off',
				    ),

				)
			),
		)
	);

	ot_register_meta_box( $my_meta_box );

}

?>