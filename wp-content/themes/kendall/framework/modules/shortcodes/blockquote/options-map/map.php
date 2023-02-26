<?php

if ( ! function_exists('kendall_elated_blockquote_options_map') ) {
	/**
	 * Add Blockquote options to elements page
	 */
	function kendall_elated_blockquote_options_map() {

		$panel_blockquote = kendall_elated_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_blockquote',
				'title' => esc_html__('Blockquote','kendall'),
			)
		);

	}

	add_action( 'kendall_elated_options_elements_map', 'kendall_elated_blockquote_options_map');

}