<?php

if ( ! function_exists('kendall_elated_search_options_map') ) {

	function kendall_elated_search_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_search_page',
				'title' => esc_html__('Search', 'kendall'),
				'icon' => 'fa fa-search'
			)
		);

		$search_panel = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Search', 'kendall'),
				'name' => 'search',
				'page' => '_search_page'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'select',
				'name'			=> 'search_icon_pack',
				'default_value'	=> 'font_elegant',
				'label'			=> esc_html__('Search Icon Pack', 'kendall'),
				'description'	=> esc_html__('Choose icon pack for search icon', 'kendall'),
				'options'		=> kendall_elated_icon_collections()->getIconCollectionsExclude(array('linea_icons', 'simple_line_icons', 'dripicons'))
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'search_in_grid',
				'default_value'	=> 'yes',
				'label'			=> esc_html__('Search area in grid', 'kendall'),
				'description'	=> esc_html__('Set search area to be in grid', 'kendall')
			)
		);

		kendall_elated_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'initial_header_icon_title',
				'title'		=> esc_html__('Initial Search Icon in Header', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'text',
				'name'			=> 'header_search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'kendall'),
				'description'	=> esc_html__('Set size for icon', 'kendall'),
				'args'			=> array(
					'col_width' => 3,
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_color_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Colors', 'kendall'),
				'description'	=> esc_html__('Define color style for icon', 'kendall'),
				'name'		=> 'search_icon_color_group'
			)
		);

		$search_icon_color_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'	=> $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_color',
				'label'		=> esc_html__('Color', 'kendall'),
			)
		);
		kendall_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_search_icon_hover_color',
				'label'		=> esc_html__('Hover Color', 'kendall'),
			)
		);
		kendall_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_color',
				'label'		=> esc_html__('Light Header Icon Color', 'kendall'),
			)
		);
		kendall_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row,
				'type'		=> 'colorsimple',
				'name'		=> 'header_light_search_icon_hover_color',
				'label'		=> esc_html__('Light Header Icon Hover Color', 'kendall'),
			)
		);

		$search_icon_color_row2 = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_color_group,
				'name'		=> 'search_icon_color_row2',
				'next'		=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_color',
				'label'		=> esc_html__('Dark Header Icon Color', 'kendall'),
			)
		);
		kendall_elated_add_admin_field(
			array(
				'parent' => $search_icon_color_row2,
				'type'		=> 'colorsimple',
				'name'		=> 'header_dark_search_icon_hover_color',
				'label'		=> esc_html__('Dark Header Icon Hover Color', 'kendall'),
			)
		);


		$search_icon_background_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Background Style', 'kendall'),
				'description'	=> esc_html__('Define background style for icon', 'kendall'),
				'name'		=> 'search_icon_background_group'
			)
		);

		$search_icon_background_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_background_group,
				'name'		=> 'search_icon_background_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_background_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_background_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Hover Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'yesno',
				'name'			=> 'enable_search_icon_text',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Enable Search Icon Text', 'kendall'),
				'description'	=> esc_html__("Enable this option to show 'Search' text next to search icon in header", 'kendall'),
				'args'			=> array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_enable_search_icon_text_container'
				)
			)
		);

		$enable_search_icon_text_container = kendall_elated_add_admin_container(
			array(
				'parent'			=> $search_panel,
				'name'				=> 'enable_search_icon_text_container',
				'hidden_property'	=> 'enable_search_icon_text',
				'hidden_value'		=> 'no'
			)
		);

		$enable_search_icon_text_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $enable_search_icon_text_container,
				'title'		=> esc_html__('Search Icon Text', 'kendall'),
				'name'		=> 'enable_search_icon_text_group',
				'description'	=> esc_html__('Define Style for Search Icon Text', 'kendall')
			)
		);

		$enable_search_icon_text_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color',
				'label'			=> esc_html__('Text Color', 'kendall'),
				'default_value'	=> ''
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_text_color_hover',
				'label'			=> esc_html__('Text Hover Color', 'kendall'),
				'default_value'	=> ''
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_fontsize',
				'label'			=> esc_html__('Font Size', 'kendall'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_lineheight',
				'label'			=> esc_html__('Line Height', 'kendall'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$enable_search_icon_text_row2 = kendall_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row2',
				'next'		=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_texttransform',
				'label'			=> esc_html__('Text Transform', 'kendall'),
				'default_value'	=> '',
				'options'		=> kendall_elated_get_text_transform_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_icon_text_google_fonts',
				'label'			=> esc_html__('Font Family', 'kendall'),
				'default_value'	=> '-1',
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontstyle',
				'label'			=> esc_html__('Font Style', 'kendall'),
				'default_value'	=> '',
				'options'		=> kendall_elated_get_font_style_array(),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_icon_text_fontweight',
				'label'			=> esc_html__('Font Weight', 'kendall'),
				'default_value'	=> '',
				'options'		=> kendall_elated_get_font_weight_array(),
			)
		);

		$enable_search_icon_text_row3 = kendall_elated_add_admin_row(
			array(
				'parent'	=> $enable_search_icon_text_group,
				'name'		=> 'enable_search_icon_text_row3',
				'next'		=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $enable_search_icon_text_row3,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_text_letterspacing',
				'label'			=> esc_html__('Letter Spacing', 'kendall'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_spacing_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Icon Spacing', 'kendall'),
				'description'	=> esc_html__('Define padding and margins for Search icon', 'kendall'),
				'name'		=> 'search_icon_spacing_group'
			)
		);

		$search_icon_spacing_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_spacing_group,
				'name'		=> 'search_icon_spacing_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Left', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_padding_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Padding Right', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_left',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Left', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_spacing_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_margin_right',
				'default_value'	=> '',
				'label'			=> esc_html__('Margin Right', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		kendall_elated_add_admin_section_title(
			array(
				'parent' 	=> $search_panel,
				'name'		=> 'search_form_title',
				'title'		=> esc_html__('Search Bar', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_panel,
				'type'			=> 'color',
				'name'			=> 'search_background_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Background Color', 'kendall'),
				'description'	=> esc_html__('Choose a background color for Select search bar', 'kendall')
			)
		);

		$search_input_text_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Input Text', 'kendall'),
				'description'	=> esc_html__('Define style for search text', 'kendall'),
				'name'		=> 'search_input_text_group'
			)
		);

		$search_input_text_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_text_disabled_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Disabled Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'kendall'),
				'args'			=> array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'kendall'),
				'options'		=> kendall_elated_get_text_transform_array()
			)
		);

		$search_input_text_row2 = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_input_text_group,
				'name'		=> 'search_input_text_row2'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'kendall'),
				'options'		=> kendall_elated_get_font_style_array(),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'kendall'),
				'options'		=> kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_input_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_label_text_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Label Text', 'kendall'),
				'description'	=> esc_html__('Define style for search label text', 'kendall'),
				'name'		=> 'search_label_text_group'
			)
		);

		$search_label_text_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_label_text_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_fontsize',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Size', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_texttransform',
				'default_value'	=> '',
				'label'			=> esc_html__('Text Transform', 'kendall'),
				'options'		=> kendall_elated_get_text_transform_array()
			)
		);

		$search_label_text_row2 = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_label_text_group,
				'name'		=> 'search_label_text_row2',
				'next'		=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'fontsimple',
				'name'			=> 'search_label_text_google_fonts',
				'default_value'	=> '-1',
				'label'			=> esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontstyle',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Style', 'kendall'),
				'options'		=> kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'selectblanksimple',
				'name'			=> 'search_label_text_fontweight',
				'default_value'	=> '',
				'label'			=> esc_html__('Font Weight', 'kendall'),
				'options'		=> kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_label_text_row2,
				'type'			=> 'textsimple',
				'name'			=> 'search_label_text_letterspacing',
				'default_value'	=> '',
				'label'			=> esc_html__('Letter Spacing', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_icon_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Icon', 'kendall'),
				'description'	=> esc_html__('Define style for search icon', 'kendall'),
				'name'		=> 'search_icon_group'
			)
		);

		$search_icon_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_hover_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Hover Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_icon_disabled_color',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Disabled Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_icon_size',
				'default_value'	=> '',
				'label'			=> esc_html__('Icon Size', 'kendall'),
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_close_icon_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Close', 'kendall'),
				'description'	=> esc_html__('Define style for search close icon', 'kendall'),
				'name'		=> 'search_close_icon_group'
			)
		);

		$search_close_icon_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_close_icon_group,
				'name'		=> 'search_icon_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_color',
				'label'			=> esc_html__('Icon Color', 'kendall'),
				'default_value'	=> ''
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_close_hover_color',
				'label'			=> esc_html__('Icon Hover Color', 'kendall'),
				'default_value'	=> ''
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_close_icon_row,
				'type'			=> 'textsimple',
				'name'			=> 'search_close_size',
				'label'			=> esc_html__('Icon Size', 'kendall'),
				'default_value'	=> '',
				'args'			=> array(
					'suffix'	=> 'px'
				)
			)
		);

		$search_bottom_border_group = kendall_elated_add_admin_group(
			array(
				'parent'	=> $search_panel,
				'title'		=> esc_html__('Search Bottom Border', 'kendall'),
				'description'	=> esc_html__('Define style for Search text input bottom border (for Fullscreen search type)', 'kendall'),
				'name'		=> 'search_bottom_border_group'
			)
		);

		$search_bottom_border_row = kendall_elated_add_admin_row(
			array(
				'parent'	=> $search_bottom_border_group,
				'name'		=> 'search_icon_row'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_color',
				'label'			=> esc_html__('Border Color', 'kendall'),
				'default_value'	=> ''
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent'		=> $search_bottom_border_row,
				'type'			=> 'colorsimple',
				'name'			=> 'search_border_focus_color',
				'label'			=> esc_html__('Border Focus Color', 'kendall'),
				'default_value'	=> ''
			)
		);

	}

	add_action('kendall_elated_options_map', 'kendall_elated_search_options_map', 12);

}