<?php

if ( ! function_exists('kendall_elated_footer_options_map') ) {
	/**
	 * Add footer options
	 */
	function kendall_elated_footer_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_footer_page',
				'title' => esc_html__('Footer', 'kendall'),
				'icon' => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Footer', 'kendall'),
				'name' => 'footer',
				'page' => '_footer_page'
			)
		);
		kendall_elated_add_admin_field(
			array(
				'type' => 'image',
				'name' => 'footer_background_image',
				'default_value' => '',
				'label' => esc_html__('Footer Background Image','kendall'),
				'description' => '',
				'parent' => $footer_panel
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'uncovering_footer',
				'default_value' => 'no',
				'label' => esc_html__('Uncovering Footer','kendall'),
				'description' => esc_html__('Enabling this option will make Footer gradually appear on scroll','kendall'),
				'parent' => $footer_panel,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'footer_in_grid',
				'default_value' => 'yes',
				'label' => esc_html__('Footer in Grid','kendall'),
				'description' => esc_html__('Enabling this option will place Footer content in grid','kendall'),
				'parent' => $footer_panel,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_top',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Top','kendall'),
				'description' => esc_html__('Enabling this option will show Footer Top area','kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_show_footer_top_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_top_container = kendall_elated_add_admin_container(
			array(
				'name' => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns',
				'default_value' => '4',
				'label' => esc_html__('Footer Top Columns','kendall'),
				'description' => esc_html__('Choose number of columns for Footer Top area','kendall'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'5' => '3(25%+25%+50%)',
					'6' => '3(50%+25%+25%)',
					'4' => '4'
				),
				'parent' => $show_footer_top_container,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_top_columns_alignment',
				'default_value' => '',
				'label' => esc_html__('Footer Top Columns Alignment','kendall'),
				'description' => esc_html__('Text Alignment in Footer Columns','kendall'),
				'options' => array(
					'left' => esc_html__('Left','kendall'),
					'center' => esc_html__('Center','kendall'),
					'right' => esc_html__('Right','kendall'),
				),
				'parent' => $show_footer_top_container,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'show_footer_bottom',
				'default_value' => 'yes',
				'label' => esc_html__('Show Footer Bottom','kendall'),
				'description' => esc_html__('Enabling this option will show Footer Bottom area','kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_show_footer_bottom_container'
				),
				'parent' => $footer_panel,
			)
		);

		$show_footer_bottom_container = kendall_elated_add_admin_container(
			array(
				'name' => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value' => 'no',
				'parent' => $footer_panel
			)
		);


		kendall_elated_add_admin_field(
			array(
				'type' => 'select',
				'name' => 'footer_bottom_columns',
				'default_value' => '3',
				'label' => esc_html__('Footer Bottom Columns','kendall'),
				'description' => esc_html__('Choose number of columns for Footer Bottom area', 'kendall'),
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent' => $show_footer_bottom_container,
			)
		);

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_footer_options_map', 15);

}