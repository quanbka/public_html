<?php

if ( ! function_exists('kendall_elated_pricing_table_options_map') ) {
	/**
	 * Add Pricing Table options to elements page
	 */
	function kendall_elated_pricing_table_options_map() {

		$panel_pricing_table = kendall_elated_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_pricing_table',
				'title' => esc_html__('Pricing Table','kendall')
			)
		);

	}

	add_action( 'kendall_elated_options_elements_map', 'kendall_elated_pricing_table_options_map');

}