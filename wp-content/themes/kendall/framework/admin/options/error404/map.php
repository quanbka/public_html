<?php

if ( ! function_exists('kendall_elated_error_404_options_map') ) {

	function kendall_elated_error_404_options_map() {

		kendall_elated_add_admin_page(array(
			'slug' => '__404_error_page',
			'title' => esc_html__('404 Error Page', 'kendall'),
			'icon' => 'fa fa-exclamation-triangle'
		));

		$panel_404_options = kendall_elated_add_admin_panel(array(
			'page' => '__404_error_page',
			'name'	=> 'panel_404_options',
			'title'	=> esc_html__('404 Page Option', 'kendall')
		));

		kendall_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_title',
			'default_value' => '',
			'label' => esc_html__('Title', 'kendall'),
			'description' => esc_html__('Enter title for 404 page', 'kendall')
		));

		kendall_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_text',
			'default_value' => '',
			'label' => esc_html__('Text', 'kendall'),
			'description' => esc_html__('Enter text for 404 page', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'parent' => $panel_404_options,
			'type' => 'text',
			'name' => '404_back_to_home',
			'default_value' => '',
			'label' => esc_html__('Back to Home Button Label', 'kendall'),
			'description' => esc_html__('Enter label for "Back to Home" button', 'kendall')
		));
        kendall_elated_add_admin_field(array(
            'parent' => $panel_404_options,
            'type' => 'image',
            'name' => '404_background_image',
            'default_value' => '',
            'label' => esc_html__('Background Image', 'kendall'),
            'description' => esc_html__('Upload background image for 404 page', 'kendall')
        ));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_error_404_options_map', 21);

}