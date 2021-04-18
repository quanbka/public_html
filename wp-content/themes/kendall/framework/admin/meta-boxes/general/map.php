<?php

if(!function_exists('kendall_elated_general_meta_box_map')) {

	function kendall_elated_general_meta_box_map() {

		$general_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('General', 'kendall'),
				'name' => 'general_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_boxed_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Boxed Layout', 'kendall'),
				'description' => esc_html__('Enable Boxed Layout', 'kendall'),
				'options' => array(
					'' => '',
					'no' => esc_html__('No','kendall'),
					'yes' => esc_html__('Yes','kendall')
				),
				'parent' => $general_meta_box
			)
		);


		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_page_background_color_meta',
				'type' => 'color',
				'default_value' => '',
				'label' => esc_html__('Page Background Color', 'kendall'),
				'description' => esc_html__('Choose background color for page content', 'kendall'),
				'parent' => $general_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_page_padding_meta',
				'type' => 'text',
				'default_value' => '',
				'label' => esc_html__('Page Padding', 'kendall'),
				'description' => esc_html__('Insert padding in format 10px 10px 10px 10px', 'kendall'),
				'parent' => $general_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_main_style_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Theme Main Style', 'kendall'),
				'description' => esc_html__('Choose theme main style', 'kendall'),
				'parent'      => $general_meta_box,
				'default_value' => '',
				'options'     => array(
					'style1'   => esc_html__('Default Style', 'kendall'),
					'style2'   => esc_html__('Style with Open Sans Font', 'kendall'),
					'style3'   => esc_html__('Style with Covered By Your Grace Font', 'kendall')
				)
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_page_slider_meta',
				'type' => 'text',
				'default_value' => '',
				'label' => esc_html__('Slider Shortcode', 'kendall'),
				'description' => esc_html__('Paste your slider shortcode here', 'kendall'),
				'parent' => $general_meta_box
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_enable_paspartu_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('Passepartout', 'kendall'),
				'description' => esc_html__('Enabling this option will display passepartout around site content', 'kendall'),
				'parent' => $general_meta_box,
				'options' => array(
					'' => '',
					'no' => esc_html__('No', 'kendall'),
					'yes' => esc_html__('Yes', 'kendall'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"" => "",
						"no" => "#eltd_eltd_paspartu_meta_container",
						"yes" => ""
					),
					"show" => array(
						"" => "#eltd_eltd_paspartu_meta_container",
						"no" => "",
						"yes" => "#eltd_eltd_paspartu_meta_container"
					)
				)
			)
		);

		$paspartu_meta_container = kendall_elated_add_admin_container(
			array(
				'parent' => $general_meta_box,
				'name' => 'eltd_paspartu_meta_container',
				'hidden_property' => 'eltd_enable_paspartu_meta',
				'hidden_value' => 'no'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_paspartu_color_meta',
				'type'          => 'color',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Color', 'kendall'),
				'description'   => esc_html__('Choose passepartout color.Default value is #fff', 'kendall'),
				'parent'        => $paspartu_meta_container,
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'          => 'eltd_paspartu_size_meta',
				'type'          => 'text',
				'default_value' => '',
				'label'         => esc_html__('Passepartout Size', 'kendall'),
				'description'   => esc_html__('Enter size amount for passepartout.Default value is 10px', 'kendall'),
				'parent'        => $paspartu_meta_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_page_comments_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__('Show Comments', 'kendall'),
				'description' => esc_html__('Enabling this option will show comments on your page', 'kendall'),
				'parent'      => $general_meta_box,
				'options'     => array(
					'yes' => esc_html__('Yes', 'kendall'),
					'no'  => esc_html__('No', 'kendall'),
				)
			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_general_meta_box_map');
}