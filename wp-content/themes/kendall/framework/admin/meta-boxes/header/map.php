<?php

if(!function_exists('kendall_elated_header_meta_box_map')) {

	function kendall_elated_header_meta_box_map() {

		$header_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array( 'page', 'portfolio-item', 'post' ),
				'title' => esc_html__('Header', 'kendall'),
				'name'  => 'header_meta'
			)
		);
        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_logo_image_meta',
                'type' => 'image',
                'default_value' => "",
                'label' => esc_html__('Logo Image', 'kendall'),
                'description' => esc_html__('Choose a custom logo image for this page ', 'kendall'),
                'parent' => $header_meta_box
            )
        );

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Header Type', 'kendall'),
				'description'   => esc_html__('Select the type of header you would like to use', 'kendall'),
				'parent'        => $header_meta_box,
				'options'       => array(
					''                => '',
					'header-standard' => esc_html__('Header Standard', 'kendall'),
					'header-divided'  => esc_html__('Header Divided', 'kendall'),
					'header-dual' => esc_html__('Header Dual', 'kendall'),
					'header-full-screen' => esc_html__('Header Full Screen', 'kendall'),
					'header-vertical' => esc_html__('Header Vertical', 'kendall'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						'header-standard' => '',
						'header-divided'  => '#eltd_eltd_header_in_grid_meta_container',
						'header-vertical' => '#eltd_eltd_header_in_grid_meta_container',
						''  => '#eltd_eltd_header_in_grid_meta_container',
					),
					"show" => array(
						'header-standard' => '#eltd_eltd_header_in_grid_meta_container',
						'header-divided'  => '',
						'header-vertical' => ''
					)
				)
			)
		);

		$header_in_grid_meta_container = kendall_elated_add_admin_container(
			array(
				'parent' => $header_meta_box,
				'name' => 'eltd_header_in_grid_meta_container',
				'hidden_property' => 'eltd_header_type_meta',
				'hidden_value' => '',
				'hidden_values' => array('header-divided','header-vertical','')
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_menu_area_in_grid_header_standard_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Header in grid', 'kendall'),
				'description'   => esc_html__('Set header content to be in grid', 'kendall'),
				'parent'        => $header_in_grid_meta_container,
				'options'       => array(
					''    => '',
					'yes' => esc_html__('Yes', 'kendall'),
					'no'  => esc_html__('No', 'kendall'),
				)
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__('Header Skin', 'kendall'),
				'description'   => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'kendall'),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => '',
					'light-header' => esc_html__('Light', 'kendall'),
					'dark-header'  => esc_html__('Dark', 'kendall'),
				)
			)
		);


		kendall_elated_add_meta_box_field(
			array(
				'parent'        => $header_meta_box,
				'type'          => 'select',
				'name'          => 'eltd_enable_header_style_on_scroll_meta',
				'default_value' => '',
				'label'         => esc_html__('Enable Header Style on Scroll', 'kendall'),
				'description'   => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'kendall'),
				'options'       => array(
					''    => '',
					'no'  => esc_html__('No', 'kendall'),
					'yes' => esc_html__('Yes', 'kendall'),
				)
			)
		);
		//Header Standard Options
		kendall_elated_add_admin_section_title(
			array(
				'parent' => $header_meta_box,
				'name' => 'eltd_header_standard_meta_title',
				'title' => esc_html__('Header Standard Options','kendall')
			)
		);
		kendall_elated_add_meta_box_field(
			array(
				'parent' => $header_meta_box,
				'type' => 'selectblank',
				'name' => 'eltd_header_standard_align_meta',
				'default_value' => '',
				'label' => esc_html__('Header Standard Menu area alignment','kendall'),
				'options' => array(
					'' => '',
					'center' => esc_html__('Center' , 'kendall'),
					'left' => esc_html__('Left' , 'kendall'),
					'right' => esc_html__('Right' , 'kendall'),
				),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_color_header_standard_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for header area', 'kendall'),
				'parent'      => $header_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_transparency_header_standard_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'kendall'),
				'description' => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'kendall'),
				'parent'      => $header_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		//Header Divided Options
		kendall_elated_add_admin_section_title(
			array(
				'parent' => $header_meta_box,
				'name' => 'eltd_header_divided_meta_title',
				'title' => esc_html__('Header Divided Options','kendall')
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_color_header_divided_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for header area', 'kendall'),
				'parent'      => $header_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_transparency_header_divided_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'kendall'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'kendall'),
				'parent'      => $header_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		//Header Dual Options
		kendall_elated_add_admin_section_title(
			array(
				'parent' => $header_meta_box,
				'name' => 'eltd_header_dual_meta_title',
				'title' => esc_html__('Header Dual Options','kendall')
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_color_header_dual_meta',
				'type'        => 'color',
				'label'       => esc_html__('Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for header area', 'kendall'),
				'parent'      => $header_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_background_transparency_header_dual_meta',
				'type'        => 'text',
				'label'       => esc_html__('Transparency', 'kendall'),
				'description' => esc_html__('Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'kendall'),
				'parent'      => $header_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_menu_area_height_header_dual_meta',
				'type'        => 'text',
				'label'       => esc_html__('Menu Area Height', 'kendall'),
				'parent'      => $header_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);
		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_logo_area_height_header_dual_meta',
				'type'        => 'text',
				'label'       => esc_html__('Logo Area Height', 'kendall'),
				'parent'      => $header_meta_box,
				'args'        => array(
					'col_width' => 2
				)
			)
		);


		//Header Vertical Options
		kendall_elated_add_admin_section_title(
			array(
				'parent' => $header_meta_box,
				'name' => 'eltd_header_vertical_meta_title',
				'title' => esc_html__('Header Vertical Options','kendall')
			)
		);

		kendall_elated_add_meta_box_field( array(
			'name'        => 'eltd_vertical_header_background_color_meta',
			'type'        => 'color',
			'label'       => esc_html__('Background Color', 'kendall'),
			'description' => esc_html__('Set background color for vertical menu', 'kendall'),
			'parent'      => $header_meta_box
		) );

		kendall_elated_add_meta_box_field( array(
			'name'        => 'eltd_vertical_header_transparency_meta',
			'type'        => 'text',
			'label'       => esc_html__('Transparency', 'kendall'),
			'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'kendall'),
			'parent'      => $header_meta_box,
			'args'        => array(
				'col_width' => 1
			)
		) );

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__('Background Image', 'kendall'),
				'description'   => esc_html__('Set background image for vertical menu', 'kendall'),
				'parent'        => $header_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__('Disable Background Image', 'kendall'),
				'description'   => esc_html__('Enabling this option will hide background image in Vertical Menu', 'kendall'),
				'parent'        => $header_meta_box
			)
		);


		kendall_elated_add_meta_box_field(
			array(
				'name'            => 'eltd_scroll_amount_for_sticky_meta',
				'type'            => 'text',
				'label'           => esc_html__('Scroll amount for sticky header appearance', 'kendall'),
				'description'     => esc_html__('Define scroll amount for sticky header appearance', 'kendall'),
				'parent'          => $header_meta_box,
				'args'            => array(
					'col_width' => 2,
					'suffix'    => 'px'
				),
				'hidden_property' => 'eltd_header_behaviour',
				'hidden_values'   => array( "sticky-header-on-scroll-up", "fixed-on-scroll" )
			)
		);
	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_header_meta_box_map');
}