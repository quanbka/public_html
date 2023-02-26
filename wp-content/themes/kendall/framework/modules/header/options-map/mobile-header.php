<?php

if ( ! function_exists('kendall_elated_mobile_header_options_map') ) {

	function kendall_elated_mobile_header_options_map() {

		$panel_mobile_header = kendall_elated_add_admin_panel(array(
			'title' => esc_html__('Mobile header', 'kendall'),
			'name'  => 'panel_mobile_header',
			'page'  => '_header_page'
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_header_height',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Header Height', 'kendall'),
			'description' => esc_html__('Enter height for mobile header in pixels', 'kendall'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_header_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Header Background Color', 'kendall'),
			'description' => esc_html__('Choose color for mobile header', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_menu_background_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Background Color', 'kendall'),
			'description' => esc_html__('Choose color for mobile menu', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_menu_separator_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Menu Item Separator Color', 'kendall'),
			'description' => esc_html__('Choose color for mobile menu horizontal separators', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_logo_height',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Header', 'kendall'),
			'description' => esc_html__('Define logo height for screen size smaller than 1000px', 'kendall'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_logo_height_phones',
			'type'        => 'text',
			'label'       => esc_html__('Logo Height For Mobile Devices', 'kendall'),
			'description' => esc_html__('Define logo height for screen size smaller than 480px', 'kendall'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		kendall_elated_add_admin_section_title(array(
			'parent' => $panel_mobile_header,
			'name'   => 'mobile_header_fonts_title',
			'title'  => esc_html__('Typography', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_text_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Text Color', 'kendall'),
			'description' => esc_html__('Define color for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_text_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Navigation Hover/Active Color', 'kendall'),
			'description' => esc_html__('Define hover/active color for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_font_family',
			'type'        => 'font',
			'label'       => esc_html__('Navigation Font Family', 'kendall'),
			'description' => esc_html__('Define font family for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_font_size',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Font Size', 'kendall'),
			'description' => esc_html__('Define font size for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_line_height',
			'type'        => 'text',
			'label'       => esc_html__('Navigation Line Height', 'kendall'),
			'description' => esc_html__('Define line height for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header,
			'args'        => array(
				'col_width' => 3,
				'suffix'    => 'px'
			)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_text_transform',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Text Transform', 'kendall'),
			'description' => esc_html__('Define text transform for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header,
			'options'     => kendall_elated_get_text_transform_array(true)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_font_style',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Style', 'kendall'),
			'description' => esc_html__('Define font style for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header,
			'options'     => kendall_elated_get_font_style_array(true)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_font_weight',
			'type'        => 'select',
			'label'       => esc_html__('Navigation Font Weight', 'kendall'),
			'description' => esc_html__('Define font weight for mobile navigation text', 'kendall'),
			'parent'      => $panel_mobile_header,
			'options'     => kendall_elated_get_font_weight_array(true)
		));

		kendall_elated_add_admin_section_title(array(
			'name' => 'mobile_opener_panel',
			'parent' => $panel_mobile_header,
			'title' => esc_html__('Mobile Menu Opener', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_icon_pack',
			'type'        => 'select',
			'label'       => esc_html__('Mobile Navigation Icon Pack', 'kendall'),
			'default_value' => 'font_awesome',
			'description' => esc_html__('Choose icon pack for mobile navigation icon', 'kendall'),
			'parent'      => $panel_mobile_header,
			'options'     => kendall_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons'))
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_icon_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Color', 'kendall'),
			'description' => esc_html__('Choose color for icon header', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_icon_hover_color',
			'type'        => 'color',
			'label'       => esc_html__('Mobile Navigation Icon Hover Color', 'kendall'),
			'description' => esc_html__('Choose hover color for mobile navigation icon ', 'kendall'),
			'parent'      => $panel_mobile_header
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'mobile_icon_size',
			'type'        => 'text',
			'label'       => esc_html__('Mobile Navigation Icon size', 'kendall'),
			'description' => esc_html__('Choose size for mobile navigation icon ', 'kendall'),
			'parent'      => $panel_mobile_header,
			'args' => array(
				'col_width' => 3,
				'suffix' => 'px'
			)
		));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_mobile_header_options_map');

}