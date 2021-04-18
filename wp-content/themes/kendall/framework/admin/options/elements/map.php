<?php

if ( ! function_exists('kendall_elated_load_elements_map') ) {
	/**
	 * Add Elements option page for shortcodes
	 */
	function kendall_elated_load_elements_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_elements_page',
				'title' => esc_html__('Elements', 'kendall'),
				'icon' => 'fa fa-header'
			)
		);

		do_action( 'kendall_elated_options_elements_map' );

	}

	add_action('kendall_elated_options_map', 'kendall_elated_load_elements_map',17);

}