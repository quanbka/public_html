<?php
if ( ! function_exists('kendall_elated_contact_form_map') ) {
	/**
	 * Map Contact Form 7 shortcode
	 * Hooks on vc_after_init action
	 */
	function kendall_elated_contact_form_map()
	{

		vc_add_param('contact-form-7', array(
			'type' => 'dropdown',
			'heading' => esc_html__('Style', 'kendall'),
			'param_name' => 'html_class',
			'value' => array(
				esc_html__('Default', 'kendall') => 'default',
				esc_html__('Custom Style 1', 'kendall') => 'cf7_custom_style_1',
				esc_html__('Custom Style 2' , 'kendall') => 'cf7_custom_style_2'
			),
			'description' => esc_html__('You can style each form element individually in Elated Options > Contact Form 7', 'kendall')
		));

	}
	add_action('vc_after_init', 'kendall_elated_contact_form_map');
}
?>