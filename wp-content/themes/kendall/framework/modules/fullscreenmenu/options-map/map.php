<?php

if ( ! function_exists('kendall_elated_fullscreen_menu_options_map')) {

	function kendall_elated_fullscreen_menu_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_fullscreen_menu_page',
				'title' => esc_html__('Fullscreen Menu', 'kendall'),
				'icon' => 'fa fa-arrows-alt'
			)
		);

		$fullscreen_panel = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Fullscreen Menu', 'kendall'),
				'name' => 'fullscreen_menu',
				'page' => '_fullscreen_menu_page'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'select',
				'name' => 'fullscreen_menu_animation_style',
				'default_value' => 'fade-push-text-right',
				'label' => esc_html__('Fullscreen Menu Overlay Animation', 'kendall'),
				'description' => esc_html__('Choose animation type for fullscreen menu overlay', 'kendall'),
				'options' => array(
					'fade-push-text-right' => esc_html__('Fade Push Text Right', 'kendall'),
					'fade-push-text-top' => esc_html__('Fade Push Text Top', 'kendall'),
					'fade-text-scaledown' => esc_html__('Fade Text Scaledown', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_logo',
				'default_value' => '',
				'label' => esc_html__('Logo in Fullscreen Menu Overlay', 'kendall'),
				'description' => esc_html__('Place logo in top left corner of fullscreen menu overlay', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'yesno',
				'name' => 'fullscreen_in_grid',
				'default_value' => 'no',
				'label' => esc_html__('Fullscreen Menu in Grid', 'kendall'),
				'description' => esc_html__('Enabling this option will put fullscreen menu content in grid', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'selectblank',
				'name' => 'fullscreen_alignment',
				'default_value' => '',
				'label' => esc_html__('Fullscreen Menu Alignment', 'kendall'),
				'description' => esc_html__('Choose alignment for fullscreen menu content', 'kendall'),
				'options' => array(
					"left" => esc_html__("Left", 'kendall'),
					"center" => esc_html__("Center", 'kendall'),
					"right" => esc_html__("Right", 'kendall'),
				)
			)
		);

		$background_group = kendall_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'background_group',
				'title' => esc_html__('Background', 'kendall'),
				'description' => esc_html__('Select a background color and transparency for Fullscreen Menu (0 = fully transparent, 1 = opaque)', 'kendall'),

			)
		);

		$background_group_row = kendall_elated_add_admin_row(
			array(
				'parent' => $background_group,
				'name' => 'background_group_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $background_group_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_background_transparency',
				'default_value' => '',
				'label' => esc_html__('Transparency (values:0-1)', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_menu_background_image',
				'default_value' => '',
				'label' => esc_html__('Background Image', 'kendall'),
				'description' => esc_html__('Choose a background image for Fullscreen Menu background', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'image',
				'name' => 'fullscreen_menu_pattern_image',
				'default_value' => '',
				'label' => esc_html__('Pattern Background Image', 'kendall'),
				'description' => esc_html__('Choose a pattern image for Fullscreen Menu background', 'kendall'),
			)
		);

//1st level style group
		$first_level_style_group = kendall_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'first_level_style_group',
				'title' => esc_html__('1st Level Style', 'kendall'),
				'description' => esc_html__('Define styles for 1st level in Fullscreen Menu', 'kendall'),
			)
		);

		$first_level_style_row1 = kendall_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row1'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_color',
				'default_value' => '',
				'label' => esc_html__('Active Text Color', 'kendall'),
			)
		);

		$first_level_style_row2 = kendall_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row2'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_active_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Active Color', 'kendall'),
			)
		);

		$first_level_style_row3 = kendall_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row3'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$first_level_style_row4 = kendall_elated_add_admin_row(
			array(
				'parent' => $first_level_style_group,
				'name' => 'first_level_style_row4'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $first_level_style_row4,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'kendall'),
				'options' => kendall_elated_get_text_transform_array()
			)
		);

//2nd level style group
		$second_level_style_group = kendall_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'second_level_style_group',
				'title' => esc_html__('2nd Level Style', 'kendall'),
				'description' => 'Define styles for 2nd level in Fullscreen Menu'
			)
		);

		$second_level_style_row1 = kendall_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row1'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_2nd',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color', 'kendall'),
			)
		);

		$second_level_style_row2 = kendall_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_2nd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_2nd',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$second_level_style_row3 = kendall_elated_add_admin_row(
			array(
				'parent' => $second_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_2nd',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_2nd',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $second_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_2nd',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'kendall'),
				'options' => kendall_elated_get_text_transform_array()
			)
		);

		$third_level_style_group = kendall_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'third_level_style_group',
				'title' => esc_html__('3rd Level Style', 'kendall'),
				'description' => esc_html__('Define styles for 3rd level in Fullscreen Menu', 'kendall'),
			)
		);

		$third_level_style_row1 = kendall_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'third_level_style_row1'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Hover Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_hover_background_color_3rd',
				'default_value' => '',
				'label' => esc_html__('Background Hover Color', 'kendall'),
			)
		);

		$third_level_style_row2 = kendall_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row2'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'fontsimple',
				'name' => 'fullscreen_menu_google_fonts_3rd',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_fontsize_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row2,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_lineheight_3rd',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$third_level_style_row3 = kendall_elated_add_admin_row(
			array(
				'parent' => $third_level_style_group,
				'name' => 'second_level_style_row3'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontstyle_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_fontweight_3rd',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_letterspacing_3rd',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $third_level_style_row3,
				'type' => 'selectblanksimple',
				'name' => 'fullscreen_menu_texttransform_3rd',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'kendall'),
				'options' => kendall_elated_get_text_transform_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $fullscreen_panel,
				'type' => 'select',
				'name' => 'fullscreen_menu_icon_size',
				'label' => esc_html__('Fullscreen Menu Icon Size', 'kendall'),
				'description' => esc_html__('Choose predefined size for Fullscreen Menu icon', 'kendall'),
				'default_value' => 'normal',
				'options' => array(
					'normal' => esc_html__('Normal', 'kendall'),
					'medium' => esc_html__('Medium', 'kendall'),
					'large' => esc_html__('Large', 'kendall'),
				)

			)
		);

		$icon_colors_group = kendall_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'fullscreen_menu_icon_colors_group',
				'title' => esc_html__('Full Screen Menu Icon Style', 'kendall'),
				'description' => esc_html__('Define styles for Fullscreen Menu Icon', 'kendall'),
			)
		);

		$icon_colors_row1 = kendall_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row1'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_color',
				'label' => esc_html__('Color', 'kendall'),
			)
		);
		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row1,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_hover_color',
				'label' => esc_html__('Hover Color', 'kendall'),
			)
		);
		$icon_colors_row2 = kendall_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row2',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_color',
				'label' => esc_html__('Light Menu Icon Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row2,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_light_icon_hover_color',
				'label' => esc_html__('Light Menu Icon Hover Color', 'kendall'),
			)
		);

		$icon_colors_row3 = kendall_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row3',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_color',
				'label' => esc_html__('Dark Menu Icon Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row3,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_dark_icon_hover_color',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'kendall'),
			)
		);

		$icon_colors_row4 = kendall_elated_add_admin_row(
			array(
				'parent' => $icon_colors_group,
				'name' => 'icon_colors_row4',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_color',
				'label' => esc_html__('Background Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_colors_row4,
				'type' => 'colorsimple',
				'name' => 'fullscreen_menu_icon_background_hover_color',
				'label' => esc_html__('Background Hover Color', 'kendall'),
			)
		);

		$icon_spacing_group = kendall_elated_add_admin_group(
			array(
				'parent' => $fullscreen_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Full Screen Menu Icon Spacing', 'kendall'),
				'description' => esc_html__( 'Define padding and margin for full screen menu icon', 'kendall'),
			)
		);

		$icon_spacing_row = kendall_elated_add_admin_row(
			array(
				'parent' => $icon_spacing_group,
				'name' => 'icon_spacing_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_left',
				'default_value' => '',
				'label' => esc_html__('Padding Left', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_padding_right',
				'default_value' => '',
				'label' => esc_html__('Padding Right', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_left',
				'default_value' => '',
				'label' => esc_html__('Margin Left', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'fullscreen_menu_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

	}

	add_action('kendall_elated_options_map', 'kendall_elated_fullscreen_menu_options_map', 14);

}