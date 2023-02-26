<?php

if ( ! function_exists('kendall_elated_logo_options_map') ) {

	function kendall_elated_logo_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_logo_page',
				'title' => esc_html__('Logo', 'kendall'),
				'icon' => 'fa fa-coffee'
			)
		);

		$panel_logo = kendall_elated_add_admin_panel(
			array(
				'page' => '_logo_page',
				'name' => 'panel_logo',
				'title' => esc_html__('Logo', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_logo,
				'type' => 'yesno',
				'name' => 'hide_logo',
				'default_value' => 'no',
				'label' => esc_html__('Hide Logo', 'kendall'),
				'description' => esc_html__('Enabling this option will hide logo image', 'kendall'),
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#eltd_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$hide_logo_container = kendall_elated_add_admin_container(
			array(
				'parent' => $panel_logo,
				'name' => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value' => 'yes'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'logo_image',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Default', 'kendall'),
				'description' => esc_html__('Choose a default logo image to display ', 'kendall'),
				'parent' => $hide_logo_container
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'logo_image_dark',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Dark', 'kendall'),
				'description' => esc_html__('Choose a default logo image to display ', 'kendall'),
				'parent' => $hide_logo_container
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'logo_image_light',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo_white.png",
				'label' => esc_html__('Logo Image - Light', 'kendall'),
				'description' => esc_html__('Choose a default logo image to display ', 'kendall'),
				'parent' => $hide_logo_container
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'logo_image_sticky',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Sticky', 'kendall'),
				'description' => esc_html__('Choose a default logo image to display ', 'kendall'),
				'parent' => $hide_logo_container
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'logo_image_mobile',
				'type' => 'image',
				'default_value' => ELATED_ASSETS_ROOT."/img/logo.png",
				'label' => esc_html__('Logo Image - Mobile', 'kendall'),
				'description' => esc_html__('Choose a default logo image to display ', 'kendall'),
				'parent' => $hide_logo_container
			)
		);

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_logo_options_map', 6);

}