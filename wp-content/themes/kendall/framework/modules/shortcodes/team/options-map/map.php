<?php

if ( ! function_exists('kendall_elated_team_options_map') ) {
	/**
	 * Add Team options to elements page
	 */
	function kendall_elated_team_options_map() {

		$panel_team = kendall_elated_add_admin_panel(
			array(
				'page' => '_elements_page',
				'name' => 'panel_team',
				'title' =>esc_html__( 'Team','kendall')
			)
		);

	}

	add_action( 'kendall_elated_options_elements_map', 'kendall_elated_team_options_map');

}