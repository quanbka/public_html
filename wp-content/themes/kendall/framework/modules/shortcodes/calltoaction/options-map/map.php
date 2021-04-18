<?php

if ( ! function_exists('kendall_elated_call_to_action_options_map') ) {
	/**
	 * Add Call to Action options to elements page
	 */
	function kendall_elated_call_to_action_options_map() {

		$panel_call_to_action = kendall_elated_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_call_to_action',
				'title' => esc_html__('Call To Action','kendall' )
			)
		);

	}

	add_action( 'kendall_elated_options_elements_map', 'kendall_elated_call_to_action_options_map');

}