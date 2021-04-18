<?php

if ( ! function_exists('kendall_elated_sidearea_options_map') ) {

	function kendall_elated_sidearea_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_side_area_page',
				'title' => esc_html__('Side Area', 'kendall'),
				'icon' => 'fa fa-bars'
			)
		);

		$side_area_panel = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Side Area', 'kendall'),
				'name' => 'side_area',
				'page' => '_side_area_page'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_type',
				'default_value' => 'side-menu-slide-from-right',
				'label' => esc_html__('Side Area Type', 'kendall'),
				'description' => esc_html__('Choose a type of Side Area', 'kendall'),
				'options' => array(
					'side-menu-slide-from-right' => 'Slide from Right Over Content',
					'side-menu-slide-with-content' => 'Slide from Right With Content',
					'side-area-uncovered-from-content' => 'Side Area Uncovered from Content'
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'side-menu-slide-from-right' => '#eltd_side_area_slide_with_content_container',
						'side-menu-slide-with-content' => '#eltd_side_area_width_container',
						'side-area-uncovered-from-content' => '#eltd_side_area_width_container, #eltd_side_area_slide_with_content_container'
					),
					'show' => array(
						'side-menu-slide-from-right' => '#eltd_side_area_width_container',
						'side-menu-slide-with-content' => '#eltd_side_area_slide_with_content_container',
						'side-area-uncovered-from-content' => ''
					)
				)
			)
		);

		$side_area_width_container = kendall_elated_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_width_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-with-content',
					'side-area-uncovered-from-content'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_width',
				'default_value' => '',
				'label' => esc_html__('Side Area Width', 'kendall'),
				'description' => esc_html__('Enter a width for Side Area (in percentages, enter more than 30)', 'kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => '%'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'color',
				'name' => 'side_area_content_overlay_color',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for a content overlay', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_width_container,
				'type' => 'text',
				'name' => 'side_area_content_overlay_opacity',
				'default_value' => '',
				'label' => esc_html__('Content Overlay Background Transparency', 'kendall'),
				'description' => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		$side_area_slide_with_content_container = kendall_elated_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_slide_with_content_container',
				'hidden_property' => 'side_area_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'side-menu-slide-from-right',
					'side-area-uncovered-from-content'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_slide_with_content_container,
				'type' => 'select',
				'name' => 'side_area_slide_with_content_width',
				'default_value' => 'width-470',
				'label' => esc_html__('Side Area Width', 'kendall'),
				'description' => esc_html__('Choose width for Side Area', 'kendall'),
				'options' => array(
					'width-270' => '270px',
					'width-370' => '370px',
					'width-470' => '470px'
				)
			)
		);

//init icon pack hide and show array. It will be populated dinamically from collections array
		$side_area_icon_pack_hide_array = array();
		$side_area_icon_pack_show_array = array();

//do we have some collection added in collections array?
		if (is_array(kendall_elated_icon_collections()->iconCollections) && count(kendall_elated_icon_collections()->iconCollections)) {
			//get collections params array. It will contain values of 'param' property for each collection
			$side_area_icon_collections_params = kendall_elated_icon_collections()->getIconCollectionsParams();

			//foreach collection generate hide and show array
			foreach (kendall_elated_icon_collections()->iconCollections as $dep_collection_key => $dep_collection_object) {
				$side_area_icon_pack_hide_array[$dep_collection_key] = '';

				//we need to include only current collection in show string as it is the only one that needs to show
				$side_area_icon_pack_show_array[$dep_collection_key] = '#eltd_side_area_icon_' . $dep_collection_object->param . '_container';

				//for all collections param generate hide string
				foreach ($side_area_icon_collections_params as $side_area_icon_collections_param) {
					//we don't need to include current one, because it needs to be shown, not hidden
					if ($side_area_icon_collections_param !== $dep_collection_object->param) {
						$side_area_icon_pack_hide_array[$dep_collection_key] .= '#eltd_side_area_icon_' . $side_area_icon_collections_param . '_container,';
					}
				}

				//remove remaining ',' character
				$side_area_icon_pack_hide_array[$dep_collection_key] = rtrim($side_area_icon_pack_hide_array[$dep_collection_key], ',');
			}

		}

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_button_icon_pack',
				'default_value' => 'font_elegant',
				'label' => esc_html__('Side Area Button Icon Pack', 'kendall'),
				'description' => esc_html__('Choose icon pack for side area button', 'kendall'),
				'options' => kendall_elated_icon_collections()->getIconCollections(),
				'args' => array(
					'dependence' => true,
					'hide' => $side_area_icon_pack_hide_array,
					'show' => $side_area_icon_pack_show_array
				)
			)
		);

		if (is_array(kendall_elated_icon_collections()->iconCollections) && count(kendall_elated_icon_collections()->iconCollections)) {
			//foreach icon collection we need to generate separate container that will have dependency set
			//it will have one field inside with icons dropdown
			foreach (kendall_elated_icon_collections()->iconCollections as $collection_key => $collection_object) {
				$icons_array = $collection_object->getIconsArray();

				//get icon collection keys (keys from collections array, e.g 'font_awesome', 'font_elegant' etc.)
				$icon_collections_keys = kendall_elated_icon_collections()->getIconCollectionsKeys();

				//unset current one, because it doesn't have to be included in dependency that hides icon container
				unset($icon_collections_keys[array_search($collection_key, $icon_collections_keys)]);

				$side_area_icon_hide_values = $icon_collections_keys;

				$side_area_icon_container = kendall_elated_add_admin_container(
					array(
						'parent' => $side_area_panel,
						'name' => 'side_area_icon_' . $collection_object->param . '_container',
						'hidden_property' => 'side_area_button_icon_pack',
						'hidden_value' => '',
						'hidden_values' => $side_area_icon_hide_values
					)
				);

				kendall_elated_add_admin_field(
					array(
						'parent' => $side_area_icon_container,
						'type' => 'select',
						'name' => 'side_area_icon_' . $collection_object->param,
						'default_value' => 'ion-navicon',
						'label' => esc_html__('Side Area Icon', 'kendall'),
						'description' => esc_html__('Choose Side Area Icon', 'kendall'),
						'options' => $icons_array,
					)
				);

			}

		}

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_icon_font_size',
				'default_value' => '',
				'label' => esc_html__('Side Area Icon Size', 'kendall'),
				'description' => esc_html__('Choose a size for Side Area (px)', 'kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_predefined_icon_size',
				'default_value' => 'normal',
				'label' => esc_html__('Predefined Side Area Icon Size', 'kendall'),
				'description' => esc_html__('Choose predefined size for Side Area icons', 'kendall'),
				'options' => array(
					'normal' => esc_html__('Normal', 'kendall'),
					'medium' => esc_html__('Medium', 'kendall'),
					'large' => esc_html__('Large', 'kendall'),
				),
			)
		);

		$side_area_icon_style_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_style_group',
				'title' => esc_html__('Side Area Icon Style', 'kendall'),
				'description' => esc_html__('Define styles for Side Area icon', 'kendall'),
			)
		);

		$side_area_icon_style_row1 = kendall_elated_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row1'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_color',
				'default_value' => '',
				'label' => esc_html__('Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'kendall'),
			)
		);

		$side_area_icon_style_row2 = kendall_elated_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row2',
				'next'			=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type' => 'colorsimple',
				'name' => 'side_area_light_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Light Menu Icon Hover Color', 'kendall'),
			)
		);

		$side_area_icon_style_row3 = kendall_elated_add_admin_row(
			array(
				'parent'		=> $side_area_icon_style_group,
				'name'			=> 'side_area_icon_style_row3',
				'next'			=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row3,
				'type' => 'colorsimple',
				'name' => 'side_area_dark_icon_hover_color',
				'default_value' => '',
				'label' => esc_html__('Dark Menu Icon Hover Color', 'kendall'),
			)
		);

		$icon_spacing_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'icon_spacing_group',
				'title' => esc_html__('Side Area Icon Spacing', 'kendall'),
				'description' => esc_html__('Define padding and margin for side area icon', 'kendall'),
			)
		);

		$icon_spacing_row = kendall_elated_add_admin_row(
			array(
				'parent'		=> $icon_spacing_group,
				'name'			=> 'icon_spancing_row',
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $icon_spacing_row,
				'type' => 'textsimple',
				'name' => 'side_area_icon_padding_left',
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
				'name' => 'side_area_icon_padding_right',
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
				'name' => 'side_area_icon_margin_left',
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
				'name' => 'side_area_icon_margin_right',
				'default_value' => '',
				'label' => esc_html__('Margin Right', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_icon_border_yesno',
				'default_value' => 'no',
				'label' => esc_html__('Icon Border', 'kendall'),
				'descritption' => esc_html__('Enable border around icon', 'kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_side_area_icon_border_container'
				)
			)
		);

		$side_area_icon_border_container = kendall_elated_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_icon_border_container',
				'hidden_property' => 'side_area_icon_border_yesno',
				'hidden_value' => 'no'
			)
		);

		$border_style_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_icon_border_container,
				'name' => 'border_style_group',
				'title' => esc_html__('Border Style', 'kendall'),
				'description' => esc_html__('Define styling for border around icon', 'kendall'),
			)
		);

		$border_style_row_1 = kendall_elated_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_1',
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_color',
				'default_value' => '',
				'label' => esc_html__('Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $border_style_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_icon_border_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'kendall'),
			)
		);

		$border_style_row_2 = kendall_elated_add_admin_row(
			array(
				'parent'		=> $border_style_group,
				'name'			=> 'border_style_row_2',
				'next'			=> true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_width',
				'default_value' => '',
				'label' => esc_html__('Width', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_icon_border_radius',
				'default_value' => '',
				'label' => esc_html__('Radius', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $border_style_row_2,
				'type' => 'selectsimple',
				'name' => 'side_area_icon_border_style',
				'default_value' => '',
				'label' => esc_html__('Style', 'kendall'),
				'options' => array(
					'solid' => esc_html__('Solid', 'kendall'),
					'dashed' => esc_html__('Dashed', 'kendall'),
					'dotted' => esc_html__('Dotted', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'selectblank',
				'name' => 'side_area_aligment',
				'default_value' => '',
				'label' => esc_html__('Text Aligment', 'kendall'),
				'description' => esc_html__('Choose text aligment for side area', 'kendall'),
				'options' => array(
					'center' => esc_html__('Center', 'kendall'),
					'left' => esc_html__('Left', 'kendall'),
					'right' => esc_html__('Right', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_title',
				'default_value' => '',
				'label' => esc_html__('Side Area Title', 'kendall'),
				'description' => esc_html__('Enter a title to appear in Side Area', 'kendall'),
				'args' => array(
					'col_width' => 3,
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'color',
				'name' => 'side_area_background_color',
				'default_value' => '',
				'label' => esc_html__('Background Color', 'kendall'),
				'description' => esc_html__('Choose a background color for Side Area', 'kendall'),
			)
		);

		$padding_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'padding_group',
				'title' => esc_html__('Padding', 'kendall'),
				'description' => esc_html__('Define padding for Side Area', 'kendall'),
			)
		);

		$padding_row = kendall_elated_add_admin_row(
			array(
				'parent' => $padding_group,
				'name' => 'padding_row',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_top',
				'default_value' => '',
				'label' => esc_html__('Top Padding', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_right',
				'default_value' => '',
				'label' => esc_html__('Right Padding', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_bottom',
				'default_value' => '',
				'label' => esc_html__('Bottom Padding', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $padding_row,
				'type' => 'textsimple',
				'name' => 'side_area_padding_left',
				'default_value' => '',
				'label' => esc_html__('Left Padding', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'select',
				'name' => 'side_area_close_icon',
				'default_value' => 'light',
				'label' => esc_html__('Close Icon Style', 'kendall'),
				'description' => esc_html__('Choose a type of close icon', 'kendall'),
				'options' => array(
					'light' => esc_html__('Light', 'kendall'),
					'dark' => esc_html__('Dark', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'text',
				'name' => 'side_area_close_icon_size',
				'default_value' => '',
				'label' => esc_html__('Close Icon Size', 'kendall'),
				'description' => esc_html__('Define close icon size', 'kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$title_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'title_group',
				'title' => esc_html__('Title', 'kendall'),
				'description' => esc_html__('Define Style for Side Area title', 'kendall'),
			)
		);

		$title_row_1 = kendall_elated_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_1',
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_title_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_title_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'kendall'),
				'options' => kendall_elated_get_text_transform_array()
			)
		);

		$title_row_2 = kendall_elated_add_admin_row(
			array(
				'parent' => $title_group,
				'name' => 'title_row_2',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_title_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_title_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $title_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_title_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);


		$text_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'text_group',
				'title' => esc_html__('Text', 'kendall'),
				'description' => esc_html__('Define Style for Side Area text', 'kendall'),
			)
		);

		$text_row_1 = kendall_elated_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_1',
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'colorsimple',
				'name' => 'side_area_text_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_fontsize',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'textsimple',
				'name' => 'side_area_text_lineheight',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_1,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_texttransform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'kendall'),
				'options' => kendall_elated_get_text_transform_array()
			)
		);

		$text_row_2 = kendall_elated_add_admin_row(
			array(
				'parent' => $text_group,
				'name' => 'text_row_2',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'fontsimple',
				'name' => 'side_area_text_google_fonts',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'selectblanksimple',
				'name' => 'side_area_text_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $text_row_2,
				'type' => 'textsimple',
				'name' => 'side_area_text_letterspacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_group = kendall_elated_add_admin_group(
			array(
				'parent' => $side_area_panel,
				'name' => 'widget_links_group',
				'title' => esc_html__('Link Style', 'kendall'),
				'description' => esc_html__('Define styles for Side Area widget links', 'kendall'),
			)
		);

		$widget_links_row_1 = kendall_elated_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_1',
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_color',
				'default_value' => '',
				'label' => esc_html__('Text Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_font_size',
				'default_value' => '',
				'label' => esc_html__('Font Size', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'textsimple',
				'name' => 'sidearea_link_line_height',
				'default_value' => '',
				'label' => esc_html__('Line Height', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_1,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_text_transform',
				'default_value' => '',
				'label' => esc_html__('Text Transform', 'kendall'),
				'options' => kendall_elated_get_text_transform_array()
			)
		);

		$widget_links_row_2 = kendall_elated_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_2',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'fontsimple',
				'name' => 'sidearea_link_font_family',
				'default_value' => '-1',
				'label' => esc_html__('Font Family', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_style',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'selectblanksimple',
				'name' => 'sidearea_link_font_weight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array()
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_2,
				'type' => 'textsimple',
				'name' => 'sidearea_link_letter_spacing',
				'default_value' => '',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$widget_links_row_3 = kendall_elated_add_admin_row(
			array(
				'parent' => $widget_links_group,
				'name' => 'widget_links_row_3',
				'next' => true
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $widget_links_row_3,
				'type' => 'colorsimple',
				'name' => 'sidearea_link_hover_color',
				'default_value' => '',
				'label' => esc_html__('Hover Color', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_panel,
				'type' => 'yesno',
				'name' => 'side_area_enable_bottom_border',
				'default_value' => 'no',
				'label' => esc_html__('Border Bottom on Elements', 'kendall'),
				'description' => esc_html__('Enable border bottom on elements in side area', 'kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_side_area_bottom_border_container'
				)
			)
		);

		$side_area_bottom_border_container = kendall_elated_add_admin_container(
			array(
				'parent' => $side_area_panel,
				'name' => 'side_area_bottom_border_container',
				'hidden_property' => 'side_area_enable_bottom_border',
				'hidden_value' => 'no'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $side_area_bottom_border_container,
				'type' => 'color',
				'name' => 'side_area_bottom_border_color',
				'default_value' => '',
				'label' => esc_html__('Border Bottom Color', 'kendall'),
				'description' => esc_html__('Choose color for border bottom on elements in sidearea', 'kendall'),
			)
		);

	}

	add_action('kendall_elated_options_map', 'kendall_elated_sidearea_options_map', 13);

}