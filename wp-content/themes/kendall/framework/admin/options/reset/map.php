<?php

if ( ! function_exists('kendall_elated_reset_options_map') ) {
	/**
	 * Reset options panel
	 */
	function kendall_elated_reset_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__('Reset', 'kendall'),
				'icon'  => 'fa fa-retweet'
			)
		);

		$panel_reset = kendall_elated_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__('Reset', 'kendall')
			)
		);

		kendall_elated_add_admin_field(array(
			'type'	=> 'yesno',
			'name'	=> 'reset_to_defaults',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Reset to Defaults', 'kendall'),
			'description'	=> esc_html__('This option will reset all Elated Options values to defaults', 'kendall'),
			'parent'		=> $panel_reset
		));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_reset_options_map', 100 );

}