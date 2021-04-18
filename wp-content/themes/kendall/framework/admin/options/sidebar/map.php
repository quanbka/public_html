<?php

if ( ! function_exists('kendall_elated_sidebar_options_map') ) {

	function kendall_elated_sidebar_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__('Sidebar', 'kendall'),
				'icon'  => 'fa fa-bars'
			)
		);

		$panel_widgets = kendall_elated_add_admin_panel(
			array(
				'page'  => '_sidebar_page',
				'name'  => 'panel_widgets',
				'title' => esc_html__('Widgets', 'kendall'),
			)
		);

		/**
		 * Navigation style
		 */
		kendall_elated_add_admin_field(array(
			'type'			=> 'color',
			'name'			=> 'sidebar_background_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Sidebar Background Color', 'kendall'),
			'description'	=> esc_html__('Choose background color for sidebar', 'kendall'),
			'parent'		=> $panel_widgets
		));

		$group_sidebar_padding = kendall_elated_add_admin_group(array(
			'name'		=> 'group_sidebar_padding',
			'title'		=> esc_html__('Padding', 'kendall'),
			'parent'	=> $panel_widgets
		));

		$row_sidebar_padding = kendall_elated_add_admin_row(array(
			'name'		=> 'row_sidebar_padding',
			'parent'	=> $group_sidebar_padding
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_top',
			'default_value'	=> '',
			'label'			=> esc_html__('Top Padding', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_right',
			'default_value'	=> '',
			'label'			=> esc_html__('Right Padding', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_bottom',
			'default_value'	=> '',
			'label'			=> esc_html__('Bottom Padding', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'sidebar_padding_left',
			'default_value'	=> '',
			'label'			=> esc_html__('Left Padding', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_sidebar_padding
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'select',
			'name'			=> 'sidebar_alignment',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Alignment', 'kendall'),
			'description'	=> esc_html__('Choose text aligment', 'kendall'),
			'options'		=> array(
				'left' => esc_html__('Left', 'kendall'),
				'center' => esc_html__('Center', 'kendall'),
				'right' => esc_html__('Right', 'kendall'),
			),
			'parent'		=> $panel_widgets
		));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_sidebar_options_map', 11);

}