<?php
if(!function_exists('kendall_elated_content_bottom_meta_box_map')) {

	function kendall_elated_content_bottom_meta_box_map() {

		$content_bottom_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('Content Bottom', 'kendall'),
				'name' => 'content_bottom_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_enable_content_bottom_area_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Enable Content Bottom Area', 'kendall'),
				'description' => esc_html__('This option will enable Content Bottom area on pages', 'kendall'),
				'parent' => $content_bottom_meta_box,
				'options' => array(
					'no' => esc_html__('No', 'kendall'),
					'yes' => esc_html__('Yes', 'kendall'),
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'' => '#eltd_eltd_show_content_bottom_meta_container',
						'no' => '#eltd_eltd_show_content_bottom_meta_container'
					),
					'show' => array(
						'yes' => '#eltd_eltd_show_content_bottom_meta_container'
					)
				)
			)
		);

		$show_content_bottom_meta_container = kendall_elated_add_admin_container(
			array(
				'parent' => $content_bottom_meta_box,
				'name' => 'eltd_show_content_bottom_meta_container',
				'hidden_property' => 'eltd_enable_content_bottom_area_meta',
				'hidden_value' => '',
				'hidden_values' => array('','no')
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_content_bottom_sidebar_custom_display_meta',
				'type' => 'selectblank',
				'default_value' => '',
				'label' => esc_html__('Sidebar to Display', 'kendall'),
				'description' => esc_html__('Choose a Content Bottom sidebar to display', 'kendall'),
				'options' => kendall_elated_get_custom_sidebars(),
				'parent' => $show_content_bottom_meta_container
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'type' => 'selectblank',
				'name' => 'eltd_content_bottom_in_grid_meta',
				'default_value' => '',
				'label' => esc_html__('Display in Grid', 'kendall'),
				'description' => esc_html__('Enabling this option will place Content Bottom in grid', 'kendall'),
				'options' => array(
					'no' => esc_html__('No', 'kendall'),
					'yes' => esc_html__('Yes', 'kendall'),
				),
				'parent' => $show_content_bottom_meta_container
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'type' => 'color',
				'name' => 'eltd_content_bottom_background_color_meta',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for Content Bottom area', 'kendall'),
				'parent' => $show_content_bottom_meta_container
			)
		);
	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_content_bottom_meta_box_map');
}