<?php

if ( ! function_exists('kendall_elated_title_options_map') ) {

	function kendall_elated_title_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_title_page',
				'title' => esc_html__('Title', 'kendall'),
				'icon' => 'fa fa-list-alt'
			)
		);

		$panel_title = kendall_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title',
				'title' => esc_html__('Title Settings', 'kendall')
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'show_title_area',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Show Title Area', 'kendall'),
				'description' => esc_html__('This option will enable/disable Title Area', 'kendall'),
				'parent' => $panel_title,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_show_title_area_container"
				)
			)
		);

		$show_title_area_container = kendall_elated_add_admin_container(
			array(
				'parent' => $panel_title,
				'name' => 'show_title_area_container',
				'hidden_property' => 'show_title_area',
				'hidden_value' => 'no'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_type',
				'type' => 'select',
				'default_value' => 'standard',
				'label' => esc_html__('Title Area Type', 'kendall'),
				'description' => esc_html__('Choose title type', 'kendall'),
				'parent' => $show_title_area_container,
				'options' => array(
					'standard' => esc_html__('Standard', 'kendall'),
					'breadcrumb' => esc_html__('Breadcrumb', 'kendall')
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"standard" => "",
						"breadcrumb" => "#eltd_title_area_type_container"
					),
					"show" => array(
						"standard" => "#eltd_title_area_type_container",
						"breadcrumb" => ""
					)
				)
			)
		);

		$title_area_type_container = kendall_elated_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_type_container',
				'hidden_property' => 'title_area_type',
				'hidden_value' => '',
				'hidden_values' => array('breadcrumb'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_enable_breadcrumbs',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Enable Breadcrumbs', 'kendall'),
				'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'kendall'),
				'parent' => $title_area_type_container,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_animation',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Animations', 'kendall'),
				'description' => esc_html__('Choose an animation for Title Area', 'kendall'),
				'parent' => $show_title_area_container,
				'options' => array(
					'no' => esc_html__('No Animation', 'kendall'),
					'right-left' => esc_html__('Text right to left', 'kendall'),
					'left-right' => esc_html__('Text left to right', 'kendall')
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_vertial_alignment',
				'type' => 'select',
				'default_value' => 'header_bottom',
				'label' => esc_html__('Vertical Alignment', 'kendall'),
				'description' => esc_html__('Specify title vertical alignment', 'kendall'),
				'parent' => $show_title_area_container,
				'options' => array(
					'header_bottom' => esc_html__('From Bottom of Header', 'kendall'),
					'window_top' => esc_html__('From Window Top', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_size',
				'type' => 'select',
				'default_value' => 'small',
				'label' => esc_html__('Title Size', 'kendall'),
				'description' => esc_html__('Define title size', 'kendall'),
				'parent' => $show_title_area_container,
				'options' => array(
					'small' => esc_html__('Small', 'kendall'),
					'medium' => esc_html__('Medium', 'kendall'),
					'large' => esc_html__('Large', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_content_alignment',
				'type' => 'select',
				'default_value' => 'left',
				'label' => esc_html__('Horizontal Alignment', 'kendall'),
				'description' => esc_html__('Specify title horizontal alignment', 'kendall'),
				'parent' => $show_title_area_container,
				'options' => array(
					'left' => esc_html__('Left', 'kendall'),
					'center' => esc_html__('Center', 'kendall'),
					'right' => esc_html__('Right', 'kendall')
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_background_color',
				'type' => 'color',
				'label' => esc_html__('Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for Title Area', 'kendall'),
				'parent' => $show_title_area_container
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image',
				'type' => 'image',
				'label' => esc_html__('Background Image', 'kendall'),
				'description' => esc_html__('Choose an Image for Title Area', 'kendall'),
				'parent' => $show_title_area_container
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image_responsive',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Background Responsive Image', 'kendall'),
				'description' => esc_html__('Enabling this option will make Title background image responsive', 'kendall'),
				'parent' => $show_title_area_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "#eltd_title_area_background_image_responsive_container",
					"dependence_show_on_yes" => ""
				)
			)
		);

		$title_area_background_image_responsive_container = kendall_elated_add_admin_container(
			array(
				'parent' => $show_title_area_container,
				'name' => 'title_area_background_image_responsive_container',
				'hidden_property' => 'title_area_background_image_responsive',
				'hidden_value' => 'yes'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'title_area_background_image_parallax',
				'type' => 'select',
				'default_value' => 'no',
				'label' => esc_html__('Background Image in Parallax', 'kendall'),
				'description' => esc_html__('Enabling this option will make Title background image parallax', 'kendall'),
				'parent' => $title_area_background_image_responsive_container,
				'options' => array(
					'no' => esc_html__('No', 'kendall'),
					'yes' => esc_html__('Yes', 'kendall'),
					'yes_zoom' => esc_html__('Yes, with zoom out', 'kendall')
				)
			)
		);

		kendall_elated_add_admin_field(array(
			'name' => 'title_area_height',
			'type' => 'text',
			'label' => esc_html__('Height', 'kendall'),
			'description' => esc_html__('Set a height for Title Area', 'kendall'),
			'parent' => $title_area_background_image_responsive_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));


		$panel_typography = kendall_elated_add_admin_panel(
			array(
				'page' => '_title_page',
				'name' => 'panel_title_typography',
				'title' => esc_html__('Typography', 'kendall'),
			)
		);

		$group_page_title_styles = kendall_elated_add_admin_group(array(
			'name'			=> 'group_page_title_styles',
			'title'			=> esc_html__('Title', 'kendall'),
			'description'	=> esc_html__('Define styles for page title', 'kendall'),
			'parent'		=> $panel_typography
		));

		$row_page_title_styles_1 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_title_styles_1',
			'parent'	=> $group_page_title_styles
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_title_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'kendall'),
			'parent'		=> $row_page_title_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'kendall'),
			'options'		=> kendall_elated_get_text_transform_array(),
			'parent'		=> $row_page_title_styles_1
		));

		$row_page_title_styles_2 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_title_styles_2',
			'parent'	=> $group_page_title_styles,
			'next'		=> true
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_title_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'kendall'),
			'parent'		=> $row_page_title_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'kendall'),
			'options'		=> kendall_elated_get_font_style_array(),
			'parent'		=> $row_page_title_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_title_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'kendall'),
			'options'		=> kendall_elated_get_font_weight_array(),
			'parent'		=> $row_page_title_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_title_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_title_styles_2
		));

		$group_page_subtitle_styles = kendall_elated_add_admin_group(array(
			'name'			=> 'group_page_subtitle_styles',
			'title'			=> esc_html__('Subtitle', 'kendall'),
			'description'	=> esc_html__('Define styles for page subtitle', 'kendall'),
			'parent'		=> $panel_typography
		));

		$row_page_subtitle_styles_1 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_1',
			'parent'	=> $group_page_subtitle_styles
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_subtitle_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'kendall'),
			'parent'		=> $row_page_subtitle_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'kendall'),
			'options'		=> kendall_elated_get_text_transform_array(),
			'parent'		=> $row_page_subtitle_styles_1
		));

		$row_page_subtitle_styles_2 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_subtitle_styles_2',
			'parent'	=> $group_page_subtitle_styles,
			'next'		=> true
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_subtitle_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'kendall'),
			'parent'		=> $row_page_subtitle_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'kendall'),
			'options'		=> kendall_elated_get_font_style_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_subtitle_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'kendall'),
			'options'		=> kendall_elated_get_font_weight_array(),
			'parent'		=> $row_page_subtitle_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_subtitle_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_subtitle_styles_2
		));

		$group_page_breadcrumbs_styles = kendall_elated_add_admin_group(array(
			'name'			=> 'group_page_breadcrumbs_styles',
			'title'			=> esc_html__('Breadcrumbs', 'kendall'),
			'description'	=> esc_html__('Define styles for page breadcrumbs', 'kendall'),
			'parent'		=> $panel_typography
		));

		$row_page_breadcrumbs_styles_1 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_1',
			'parent'	=> $group_page_breadcrumbs_styles
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_color',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Color', 'kendall'),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_fontsize',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Size', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_lineheight',
			'default_value'	=> '',
			'label'			=> esc_html__('Line Height', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_texttransform',
			'default_value'	=> '',
			'label'			=> esc_html__('Text Transform', 'kendall'),
			'options'		=> kendall_elated_get_text_transform_array(),
			'parent'		=> $row_page_breadcrumbs_styles_1
		));

		$row_page_breadcrumbs_styles_2 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_2',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'fontsimple',
			'name'			=> 'page_breadcrumb_google_fonts',
			'default_value'	=> '-1',
			'label'			=> esc_html__('Font Family', 'kendall'),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontstyle',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Style', 'kendall'),
			'options'		=> kendall_elated_get_font_style_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'selectblanksimple',
			'name'			=> 'page_breadcrumb_fontweight',
			'default_value'	=> '',
			'label'			=> esc_html__('Font Weight', 'kendall'),
			'options'		=> kendall_elated_get_font_weight_array(),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'textsimple',
			'name'			=> 'page_breadcrumb_letter_spacing',
			'default_value'	=> '',
			'label'			=> esc_html__('Letter Spacing', 'kendall'),
			'args'			=> array(
				'suffix'	=> 'px'
			),
			'parent'		=> $row_page_breadcrumbs_styles_2
		));

		$row_page_breadcrumbs_styles_3 = kendall_elated_add_admin_row(array(
			'name'		=> 'row_page_breadcrumbs_styles_3',
			'parent'	=> $group_page_breadcrumbs_styles,
			'next'		=> true
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'colorsimple',
			'name'			=> 'page_breadcrumb_hovercolor',
			'default_value'	=> '',
			'label'			=> esc_html__('Hover/Active Color', 'kendall'),
			'parent'		=> $row_page_breadcrumbs_styles_3
		));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_title_options_map', 8);

}