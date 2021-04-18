<?php

if(!function_exists('kendall_elated_sidebar_meta_box_map')) {

	function kendall_elated_sidebar_meta_box_map() {

		$custom_sidebars = kendall_elated_get_custom_sidebars();

		$sidebar_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array('page', 'portfolio-item', 'post'),
				'title' => esc_html__('Sidebar', 'kendall'),
				'name' => 'sidebar_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_sidebar_meta',
				'type'        => 'select',
				'label'       => esc_html__('Layout', 'kendall'),
				'description' => esc_html__('Choose the sidebar layout', 'kendall'),
				'parent'      => $sidebar_meta_box,
				'options'     => array(
					''			=> 'Default',
					'no-sidebar'		=> esc_html__('No Sidebar', 'kendall'),
					'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'kendall'),
					'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'kendall'),
					'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'kendall'),
					'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'kendall')
				)
			)
		);

		if(count($custom_sidebars) > 0) {
			kendall_elated_add_meta_box_field(array(
				'name' => 'eltd_custom_sidebar_meta',
				'type' => 'selectblank',
				'label' => esc_html__('Choose Widget Area in Sidebar', 'kendall'),
				'description' => esc_html__('Choose Custom Widget area to display in Sidebar"', 'kendall'),
				'parent' => $sidebar_meta_box,
				'options' => $custom_sidebars
			));
		}


	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_sidebar_meta_box_map');
}