<?php

if ( ! function_exists('kendall_elated_header_options_map') ) {

	function kendall_elated_header_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_header_page',
				'title' => esc_html__('Header', 'kendall'),
				'icon' => 'fa fa-header'
			)
		);

		$panel_header = kendall_elated_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header',
				'title' => esc_html__('Header', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'radiogroup',
				'name' => 'header_type',
				'default_value' => 'header-standard',
				'label' => esc_html__('Choose Header Type', 'kendall'),
				'description' => esc_html__('Select the type of header you would like to use', 'kendall'),
				'options' => array(
					'header-standard' => array(
						'image' => ELATED_ASSETS_ROOT . '/img/header-standard.png'
					),
					'header-dual' => array(
						'image' => ELATED_ASSETS_ROOT . '/img/header-divided.png'
					),
					'header-divided' => array(
						'image' => ELATED_ASSETS_ROOT . '/img/header-divided.png'
					),
                    'header-full-screen' => array(
	                    'image' => ELATED_ASSETS_ROOT . '/img/header-vertical.png'
                    ),
		            'header-vertical' => array(
						'image' => ELATED_ASSETS_ROOT . '/img/header-vertical.png'
					)
				),
				'args' => array(
					'use_images' => true,
					'hide_labels' => true,
					'dependence' => true,
					'show' => array(
						'header-standard' => '#eltd_panel_header_standard,#eltd_header_behaviour,#eltd_panel_fixed_header,#eltd_panel_sticky_header,#eltd_panel_main_menu',
						'header-divided' => '#eltd_panel_header_divided,#eltd_header_behaviour,#eltd_panel_fixed_header,#eltd_panel_sticky_header,#eltd_panel_main_menu',
						'header-dual' => '#eltd_panel_header_dual,#eltd_header_behaviour,#eltd_panel_fixed_header,#eltd_panel_sticky_header,#eltd_panel_main_menu',
						'header-full-screen' => '#eltd_panel_header_full_screen,#eltd_header_behaviour,#eltd_panel_fixed_header,#eltd_panel_sticky_header,#eltd_panel_main_menu',
                        'header-vertical' => '#eltd_panel_header_vertical,#eltd_panel_vertical_main_menu',
					),
					'hide' => array(
						'header-standard' => '#eltd_panel_header_vertical,#eltd_panel_vertical_main_menu,#eltd_panel_header_divided,#eltd_panel_header_dual,eltd_panel_header_full_screen',
						'header-divided' => '#eltd_panel_header_vertical,#eltd_panel_vertical_main_menu,#eltd_panel_header_standard,#eltd_panel_header_dual,eltd_panel_header_full_screen',
						'header-dual' => '#eltd_panel_header_vertical,#eltd_panel_vertical_main_menu,#eltd_panel_header_standard,#eltd_panel_header_divided,eltd_panel_header_full_screen',
						'header-full-screen' => '#eltd_panel_header_vertical,#eltd_panel_vertical_main_menu,#eltd_panel_header_standard,#eltd_panel_header_divided,eltd_panel_header_dual',
                        'header-vertical' => '#eltd_panel_header_dual,#eltd_panel_header_standard,#eltd_header_behaviour,#eltd_panel_fixed_header,#eltd_panel_sticky_header,#eltd_panel_main_menu,#eltd_panel_header_divided,#eltd_panel_header_full_screen',
					)
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_behaviour',
				'default_value' => 'sticky-header-on-scroll-up',
				'label' => esc_html__('Choose Header behaviour', 'kendall'),
				'description' => esc_html__('Select the behaviour of header when you scroll down to page', 'kendall'),
				'options' => array(
					'sticky-header-on-scroll-up' => 'Sticky on scrol up',
					'sticky-header-on-scroll-down-up' => 'Sticky on scrol up/down',
					'fixed-on-scroll' => 'Fixed on scroll'
				),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array('header-vertical'),
				'args' => array(
					'dependence' => true,
					'show' => array(
						'sticky-header-on-scroll-up' => '#eltd_panel_sticky_header',
						'sticky-header-on-scroll-down-up' => '#eltd_panel_sticky_header',
						'fixed-on-scroll' => '#eltd_panel_fixed_header'
					),
					'hide' => array(
						'sticky-header-on-scroll-up' => '#eltd_panel_fixed_header',
						'sticky-header-on-scroll-down-up' => '#eltd_panel_fixed_header',
						'fixed-on-scroll' => '#eltd_panel_sticky_header',
					)
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'top_bar',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Top Bar', 'kendall'),
				'description' => esc_html__('Enabling this option will show top bar area', 'kendall'),
				'parent' => $panel_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_top_bar_container"
				)
			)
		);

		$top_bar_container = kendall_elated_add_admin_container(array(
			'name' => 'top_bar_container',
			'parent' => $panel_header,
			'hidden_property' => 'top_bar',
			'hidden_value' => 'no'
		));

		kendall_elated_add_admin_field(
			array(
				'parent' => $top_bar_container,
				'type' => 'select',
				'name' => 'top_bar_layout',
				'default_value' => 'three-columns',
				'label' => esc_html__('Choose top bar layout', 'kendall'),
				'description' => esc_html__('Select the layout for top bar', 'kendall'),
				'options' => array(
					'two-columns' => esc_html__('Two columns', 'kendall'),
					'three-columns' => esc_html__('Three columns', 'kendall'),
				),
				'args' => array(
					"dependence" => true,
					"hide" => array(
						"two-columns" => "#eltd_top_bar_layout_container",
						"three-columns" => ""
					),
					"show" => array(
						"two-columns" => "",
						"three-columns" => "#eltd_top_bar_layout_container"
					)
				)
			)
		);

		$top_bar_layout_container = kendall_elated_add_admin_container(array(
			'name' => 'top_bar_layout_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_layout',
			'hidden_value' => '',
			'hidden_values' => array("two-columns"),
		));

		kendall_elated_add_admin_field(
			array(
				'parent' => $top_bar_layout_container,
				'type' => 'select',
				'name' => 'top_bar_column_widths',
				'default_value' => '30-30-30',
				'label' => esc_html__('Choose column widths', 'kendall'),
				'description' => '',
				'options' => array(
					'30-30-30' => '33% - 33% - 33%',
					'25-50-25' => '25% - 50% - 25%'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'top_bar_in_grid',
				'type' => 'yesno',
				'default_value' => 'yes',
				'label' => esc_html__('Top Bar in grid', 'kendall'),
				'description' => esc_html__('Set top bar content to be in grid', 'kendall'),
				'parent' => $top_bar_container,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_top_bar_in_grid_container"
				)
			)
		);

		$top_bar_in_grid_container = kendall_elated_add_admin_container(array(
			'name' => 'top_bar_in_grid_container',
			'parent' => $top_bar_container,
			'hidden_property' => 'top_bar_in_grid',
			'hidden_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name' => 'top_bar_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'kendall'),
			'description' => esc_html__('Set grid background color for top bar', 'kendall'),
			'parent' => $top_bar_in_grid_container
		));

		kendall_elated_add_admin_field(array(
			'name' => 'top_bar_grid_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Grid Background Transparency', 'kendall'),
			'description' => esc_html__('Set grid background transparency for top bar', 'kendall'),
			'parent' => $top_bar_in_grid_container,
			'args' => array('col_width' => 3)
		));

		kendall_elated_add_admin_field(array(
			'name' => 'top_bar_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'kendall'),
			'description' => esc_html__('Set background color for top bar', 'kendall'),
			'parent' => $top_bar_container
		));

		kendall_elated_add_admin_field(array(
			'name' => 'top_bar_background_transparency',
			'type' => 'text',
			'label' => esc_html__('Background Transparency', 'kendall'),
			'description' => esc_html__('Set background transparency for top bar', 'kendall'),
			'parent' => $top_bar_container,
			'args' => array('col_width' => 3)
		));

		kendall_elated_add_admin_field(array(
			'name' => 'top_bar_height',
			'type' => 'text',
			'label' => esc_html__('Top bar height', 'kendall'),
			'description' => esc_html__('Enter top bar height (Default is 40px)', 'kendall'),
			'parent' => $top_bar_container,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'select',
				'name' => 'header_style',
				'default_value' => '',
				'label' => esc_html__('Header Skin', 'kendall'),
				'description' => esc_html__('Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'kendall'),
				'options' => array(
					'' => '',
					'light-header' => esc_html__('Light', 'kendall'),
					'dark-header' => esc_html__('Dark', 'kendall'),
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header,
				'type' => 'yesno',
				'name' => 'enable_header_style_on_scroll',
				'default_value' => 'no',
				'label' => esc_html__('Enable Header Style on Scroll', 'kendall'),
				'description' => esc_html__('Enabling this option, header will change style depending on row settings for dark/light style', 'kendall'),
			)
		);


		$panel_header_standard = kendall_elated_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_standard',
				'title' => esc_html__('Header Standard', 'kendall'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-divided',
                    'header-vertical',
					'header-dual',
					'header-full-screen'
				)
			)
		);

		kendall_elated_add_admin_section_title(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_title',
				'title' => esc_html__('Menu Area', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'yesno',
				'name' => 'menu_area_in_grid_header_standard',
				'default_value' => 'no',
				'label' => esc_html__('Header in grid', 'kendall'),
				'description' => esc_html__('Set header content to be in grid', 'kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_menu_area_in_grid_header_standard_container'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'select',
				'name' => 'header_standard_align',
				'default_value' => 'center',
				'label' => esc_html__('Menu area alignment','kendall'),
				'description' => '',
				'options' => array(
					'center' => esc_html__('Center' , 'kendall'),
					'left' => esc_html__('Left' , 'kendall'),
					'right' => esc_html__('Right' , 'kendall'),
				),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$menu_area_in_grid_header_standard_container = kendall_elated_add_admin_container(
			array(
				'parent' => $panel_header_standard,
				'name' => 'menu_area_in_grid_header_standard_container',
				'hidden_property' => 'menu_area_in_grid_header_standard',
				'hidden_value' => 'no'
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'color',
				'name' => 'menu_area_grid_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid Background color', 'kendall'),
				'description' => esc_html__('Set grid background color for header area', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $menu_area_in_grid_header_standard_container,
				'type' => 'text',
				'name' => 'menu_area_grid_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Grid background transparency', 'kendall'),
				'description' => esc_html__('Set grid background transparency for header', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background color', 'kendall'),
				'description' => esc_html__('Set background color for header', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_standard',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'kendall'),
				'description' => esc_html__('Set background transparency for header', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_standard,
				'type' => 'text',
				'name' => 'menu_area_height_header_standard',
				'default_value' => '',
				'label' => esc_html__('Height', 'kendall'),
				'description' => esc_html__('Enter header height (default is 85px)', 'kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_divided = kendall_elated_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_divided',
				'title' => esc_html__('Header Divided', 'kendall'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-vertical',
					'header-dual',
					'header-full-screen'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_divided,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_divided',
				'default_value' => '',
				'label' => esc_html__('Background color', 'kendall'),
				'description' => esc_html__('Set background color for header', 'kendall')
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_divided,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_divided',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'kendall'),
				'description' => esc_html__('Set background transparency for header', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_divided,
				'type' => 'text',
				'name' => 'menu_area_height_header_divided',
				'default_value' => '',
				'label' => esc_html__('Height', 'kendall'),
				'description' => esc_html__('Enter header height (default is 85px)', 'kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_dual = kendall_elated_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_dual',
				'title' => esc_html__('Dual Header','kendall'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-divided',
					'header-standard',
					'header-vertical',
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_dual,
				'type' => 'color',
				'name' => 'menu_area_background_color_header_dual',
				'default_value' => '',
				'label' => esc_html__('Background color', 'kendall'),
				'description' => esc_html__('Set background color for header', 'kendall')
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_dual,
				'type' => 'text',
				'name' => 'menu_area_background_transparency_header_dual',
				'default_value' => '',
				'label' => esc_html__('Background transparency', 'kendall'),
				'description' => esc_html__('Set background transparency for header', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_section_title(
			array(
				'parent' => $panel_header_dual,
				'name' => 'logo_area_title',
				'title' => esc_html__('Logo Area','kendall')
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_dual,
				'type' => 'text',
				'name' => 'logo_area_height_header_dual',
				'default_value' => '',
				'label' =>esc_html__( 'Height','kendall'),
				'description' => esc_html__('Enter logo area height (default is 240px)','kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_section_title(
			array(
				'parent' => $panel_header_dual,
				'name' => 'menu_area_title',
				'title' =>esc_html__( 'Menu Area','kendall')
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_dual,
				'type' => 'text',
				'name' => 'menu_area_height_header_dual',
				'default_value' => '',
				'label' =>esc_html__( 'Height','kendall'),
				'description' => esc_html__('Enter menu area height (default is 50px)','kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);

		$panel_header_full_screen = kendall_elated_add_admin_panel(
			array(
				'page' => '_header_page',
				'name' => 'panel_header_full_screen',
				'title' => esc_html__('Header Full Screen','kendall'),
				'hidden_property' => 'header_type',
				'hidden_value' => '',
				'hidden_values' => array(
					'header-standard',
					'header-dual',
					'header-divided',
					'header-vertical'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_header_full_screen,
				'type' => 'text',
				'name' => 'menu_area_height_header_full_screen',
				'default_value' => '',
				'label' => esc_html__('Height','kendall'),
				'description' => esc_html__('Enter header height (default is 78)','kendall'),
				'args' => array(
					'col_width' => 3,
					'suffix' => 'px'
				)
			)
		);


        $panel_header_vertical = kendall_elated_add_admin_panel(
            array(
                'page' => '_header_page',
                'name' => 'panel_header_vertical',
                'title' => esc_html__('Header Vertical', 'kendall'),
                'hidden_property' => 'header_type',
                'hidden_value' => '',
                'hidden_values' => array(
                    'header-standard',
	                'header-divided',
                    'header-dual',
                    'header-full-screen'
                )
            )
        );

            kendall_elated_add_admin_field(array(
                'name' => 'vertical_header_background_color',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'kendall'),
                'description' => esc_html__('Set background color for vertical menu', 'kendall'),
                'parent' => $panel_header_vertical
            ));

            kendall_elated_add_admin_field(array(
                'name' => 'vertical_header_transparency',
                'type' => 'text',
                'label' => esc_html__('Transparency', 'kendall'),
                'description' => esc_html__('Enter transparency for vertical menu (value from 0 to 1)', 'kendall'),
                'parent' => $panel_header_vertical,
                'args' => array(
                    'col_width' => 1
                )
            ));

            kendall_elated_add_admin_field(
                array(
                    'name' => 'vertical_header_background_image',
                    'type' => 'image',
                    'default_value' => '',
                    'label' => esc_html__('Background Image', 'kendall'),
                    'description' => esc_html__('Set background image for vertical menu', 'kendall'),
                    'parent' => $panel_header_vertical
                )
            );

		$panel_sticky_header = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Sticky Header', 'kendall'),
				'name' => 'panel_sticky_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array(
					'fixed-on-scroll'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'scroll_amount_for_sticky',
				'type' => 'text',
				'label' => esc_html__('Scroll Amount for Sticky', 'kendall'),
				'description' => esc_html__('Enter scroll amount for Sticky Menu to appear (deafult is header height)', 'kendall'),
				'parent' => $panel_sticky_header,
				'args' => array(
					'col_width' => 2,
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'name' => 'sticky_header_in_grid',
				'type' => 'yesno',
				'default_value' => 'no',
				'label' => esc_html__('Sticky Header in grid', 'kendall'),
				'description' => esc_html__('Set sticky header content to be in grid', 'kendall'),
				'parent' => $panel_sticky_header,
				'args' => array(
					"dependence" => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#eltd_sticky_header_in_grid_container"
				)
			)
		);

		$sticky_header_in_grid_container = kendall_elated_add_admin_container(array(
			'name' => 'sticky_header_in_grid_container',
			'parent' => $panel_sticky_header,
			'hidden_property' => 'sticky_header_in_grid',
			'hidden_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_header_grid_background_color',
			'type' => 'color',
			'label' => esc_html__('Grid Background Color', 'kendall'),
			'description' => esc_html__('Set grid background color for sticky header', 'kendall'),
			'parent' => $sticky_header_in_grid_container
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_header_grid_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Grid Transparency', 'kendall'),
			'description' => esc_html__('Enter transparency for sticky header grid (value from 0 to 1)', 'kendall'),
			'parent' => $sticky_header_in_grid_container,
			'args' => array(
				'col_width' => 1
			)
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_header_background_color',
			'type' => 'color',
			'label' => esc_html__('Background Color', 'kendall'),
			'description' => esc_html__('Set background color for sticky header', 'kendall'),
			'parent' => $panel_sticky_header
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Transparency', 'kendall'),
			'description' => esc_html__('Enter transparency for sticky header (value from 0 to 1)', 'kendall'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 1
			)
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_header_height',
			'type' => 'text',
			'label' => esc_html__('Sticky Header Height', 'kendall'),
			'description' => esc_html__('Enter height for sticky header (default is 60px)', 'kendall'),
			'parent' => $panel_sticky_header,
			'args' => array(
				'col_width' => 2,
				'suffix' => 'px'
			)
		));

		$group_sticky_header_menu = kendall_elated_add_admin_group(array(
			'title' => esc_html__('Sticky Header Menu', 'kendall'),
			'name' => 'group_sticky_header_menu',
			'parent' => $panel_sticky_header,
			'description' => esc_html__('Define styles for sticky menu items', 'kendall'),
		));

		$row1_sticky_header_menu = kendall_elated_add_admin_row(array(
			'name' => 'row1',
			'parent' => $group_sticky_header_menu
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_color',
			'type' => 'colorsimple',
			'label' => esc_html__('Text Color', 'kendall'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		kendall_elated_add_admin_field(array(
			'name' => 'sticky_hovercolor',
			'type' => 'colorsimple',
			'label' => esc_html__('Hover/Active color', 'kendall'),
			'description' => '',
			'parent' => $row1_sticky_header_menu
		));

		$row2_sticky_header_menu = kendall_elated_add_admin_row(array(
			'name' => 'row2',
			'parent' => $group_sticky_header_menu
		));

		kendall_elated_add_admin_field(
			array(
				'name' => 'sticky_google_fonts',
				'type' => 'fontsimple',
				'label' => esc_html__('Font Family', 'kendall'),
				'default_value' => '-1',
				'parent' => $row2_sticky_header_menu,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_fontsize',
				'label' => esc_html__('Font Size', 'kendall'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_lineheight',
				'label' => esc_html__('Line height', 'kendall'),
				'default_value' => '',
				'parent' => $row2_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_texttransform',
				'label' => esc_html__('Text transform', 'kendall'),
				'default_value' => '',
				'options' => kendall_elated_get_text_transform_array(),
				'parent' => $row2_sticky_header_menu
			)
		);

		$row3_sticky_header_menu = kendall_elated_add_admin_row(array(
			'name' => 'row3',
			'parent' => $group_sticky_header_menu
		));

		kendall_elated_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontstyle',
				'default_value' => '',
				'label' => esc_html__('Font Style', 'kendall'),
				'options' => kendall_elated_get_font_style_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'selectblanksimple',
				'name' => 'sticky_fontweight',
				'default_value' => '',
				'label' => esc_html__('Font Weight', 'kendall'),
				'options' => kendall_elated_get_font_weight_array(),
				'parent' => $row3_sticky_header_menu
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'textsimple',
				'name' => 'sticky_letterspacing',
				'label' => esc_html__('Letter Spacing', 'kendall'),
				'default_value' => '',
				'parent' => $row3_sticky_header_menu,
				'args' => array(
					'suffix' => 'px'
				)
			)
		);

		$panel_fixed_header = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Fixed Header', 'kendall'),
				'name' => 'panel_fixed_header',
				'page' => '_header_page',
				'hidden_property' => 'header_behaviour',
				'hidden_values' => array('sticky-header-on-scroll-up', 'sticky-header-on-scroll-down-up')
			)
		);

		kendall_elated_add_admin_field(array(
			'name' => 'fixed_header_grid_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Grid Background Color', 'kendall'),
			'description' => esc_html__('Set grid background color for fixed header', 'kendall'),
			'parent' => $panel_fixed_header
		));

		kendall_elated_add_admin_field(array(
			'name' => 'fixed_header_grid_transparency',
			'type' => 'text',
			'default_value' => '',
			'label' => esc_html__('Header Transparency Grid', 'kendall'),
			'description' => esc_html__('Enter transparency for fixed header grid (value from 0 to 1)', 'kendall'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));

		kendall_elated_add_admin_field(array(
			'name' => 'fixed_header_background_color',
			'type' => 'color',
			'default_value' => '',
			'label' => esc_html__('Background Color', 'kendall'),
			'description' => esc_html__('Set background color for fixed header', 'kendall'),
			'parent' => $panel_fixed_header
		));

		kendall_elated_add_admin_field(array(
			'name' => 'fixed_header_transparency',
			'type' => 'text',
			'label' => esc_html__('Header Transparency', 'kendall'),
			'description' => esc_html__('Enter transparency for fixed header (value from 0 to 1)', 'kendall'),
			'parent' => $panel_fixed_header,
			'args' => array(
				'col_width' => 1
			)
		));


		$panel_main_menu = kendall_elated_add_admin_panel(
			array(
				'title' => esc_html__('Main Menu', 'kendall'),
				'name' => 'panel_main_menu',
				'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array('header-vertical')
			)
		);

		kendall_elated_add_admin_section_title(
			array(
				'parent' => $panel_main_menu,
				'name' => 'main_menu_area_title',
				'title' => esc_html__('Main Menu General Settings', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $panel_main_menu,
				'type' => 'select',
				'name' => 'menu_dropdown_appearance',
				'default_value' => 'default',
				'label' => esc_html__('Main Dropdown Menu Appearance', 'kendall'),
				'description' => esc_html__('Choose appearance for dropdown menu', 'kendall'),
				'options' => array(
					'dropdown-default' => esc_html__('Default', 'kendall'),
					'dropdown-slide-from-bottom' => esc_html__('Slide From Bottom', 'kendall'),
					'dropdown-slide-from-top' => esc_html__('Slide From Top', 'kendall'),
					'dropdown-animate-height' => esc_html__('Animate Height', 'kendall'),
					'dropdown-slide-from-left' => esc_html__('Slide From Left', 'kendall'),
				)
			)
		);

        $panel_vertical_main_menu = kendall_elated_add_admin_panel(
            array(
                'title' => esc_html__('Vertical Main Menu', 'kendall'),
                'name' => 'panel_vertical_main_menu',
                'page' => '_header_page',
                'hidden_property' => 'header_type',
                'hidden_values' => array(
	                'header-standard',
	                'header-divided',
                )
            )
        );

        $drop_down_group = kendall_elated_add_admin_group(
            array(
                'parent' => $panel_vertical_main_menu,
                'name' => 'vertical_drop_down_group',
                'title' => esc_html__('Main Dropdown Menu', 'kendall'),
                'description' => esc_html__('Set a style for dropdown menu', 'kendall'),
            )
        );

        $vertical_drop_down_row1 = kendall_elated_add_admin_row(
            array(
                'parent' => $drop_down_group,
                'name' => 'eltd_drop_down_row1',
            )
        );

        kendall_elated_add_admin_field(
            array(
                'parent' => $vertical_drop_down_row1,
                'type' => 'colorsimple',
                'name' => 'vertical_dropdown_background_color',
                'default_value' => '',
                'label' => esc_html__('Background Color', 'kendall')
            )
        );

        $group_vertical_first_level = kendall_elated_add_admin_group(array(
            'name'			=> 'group_vertical_first_level',
            'title'			=> esc_html__('1st level', 'kendall'),
            'description'	=> esc_html__('Define styles for 1st level menu', 'kendall'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_first_level_1 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_1',
                'parent'	=> $group_vertical_first_level
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'kendall'),
                'parent'		=> $row_vertical_first_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_1st_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'kendall'),
                'parent'		=> $row_vertical_first_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_1
            ));

            $row_vertical_first_level_2 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_2',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'kendall'),
                'options'		=> kendall_elated_get_text_transform_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_1st_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'kendall'),
                'parent'		=> $row_vertical_first_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'kendall'),
                'options'		=> kendall_elated_get_font_style_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_1st_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'kendall'),
                'options'		=> kendall_elated_get_font_weight_array(),
                'parent'		=> $row_vertical_first_level_2
            ));

            $row_vertical_first_level_3 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_first_level_3',
                'parent'	=> $group_vertical_first_level,
                'next'		=> true
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_1st_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_first_level_3
            ));

        $group_vertical_second_level = kendall_elated_add_admin_group(array(
            'name'			=> 'group_vertical_second_level',
            'title'			=> esc_html__('2nd level', 'kendall'),
            'description'	=> esc_html__('Define styles for 2nd level menu', 'kendall'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_second_level_1 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_1',
                'parent'	=> $group_vertical_second_level
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'kendall'),
                'parent'		=> $row_vertical_second_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_2nd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'kendall'),
                'parent'		=> $row_vertical_second_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_1
            ));

            $row_vertical_second_level_2 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_2',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'kendall'),
                'options'		=> kendall_elated_get_text_transform_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_2nd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'kendall'),
                'parent'		=> $row_vertical_second_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'kendall'),
                'options'		=> kendall_elated_get_font_style_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_2nd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'kendall'),
                'options'		=> kendall_elated_get_font_weight_array(),
                'parent'		=> $row_vertical_second_level_2
            ));

            $row_vertical_second_level_3 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_second_level_3',
                'parent'	=> $group_vertical_second_level,
                'next'		=> true
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_2nd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_second_level_3
            ));

        $group_vertical_third_level = kendall_elated_add_admin_group(array(
            'name'			=> 'group_vertical_third_level',
            'title'			=> esc_html__('3rd level', 'kendall'),
            'description'	=> esc_html__('Define styles for 3rd level menu', 'kendall'),
            'parent'		=> $panel_vertical_main_menu
        ));

            $row_vertical_third_level_1 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_1',
                'parent'	=> $group_vertical_third_level
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Color', 'kendall'),
                'parent'		=> $row_vertical_third_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'colorsimple',
                'name'			=> 'vertical_menu_3rd_hover_color',
                'default_value'	=> '',
                'label'			=> esc_html__('Hover/Active Color', 'kendall'),
                'parent'		=> $row_vertical_third_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_fontsize',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Size', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_lineheight',
                'default_value'	=> '',
                'label'			=> esc_html__('Line Height', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_1
            ));

            $row_vertical_third_level_2 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_2',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_texttransform',
                'default_value'	=> '',
                'label'			=> esc_html__('Text Transform', 'kendall'),
                'options'		=> kendall_elated_get_text_transform_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'fontsimple',
                'name'			=> 'vertical_menu_3rd_google_fonts',
                'default_value'	=> '-1',
                'label'			=> esc_html__('Font Family', 'kendall'),
                'parent'		=> $row_vertical_third_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontstyle',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Style', 'kendall'),
                'options'		=> kendall_elated_get_font_style_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'selectblanksimple',
                'name'			=> 'vertical_menu_3rd_fontweight',
                'default_value'	=> '',
                'label'			=> esc_html__('Font Weight', 'kendall'),
                'options'		=> kendall_elated_get_font_weight_array(),
                'parent'		=> $row_vertical_third_level_2
            ));

            $row_vertical_third_level_3 = kendall_elated_add_admin_row(array(
                'name'		=> 'row_vertical_third_level_3',
                'parent'	=> $group_vertical_third_level,
                'next'		=> true
            ));

            kendall_elated_add_admin_field(array(
                'type'			=> 'textsimple',
                'name'			=> 'vertical_menu_3rd_letter_spacing',
                'default_value'	=> '',
                'label'			=> esc_html__('Letter Spacing', 'kendall'),
                'args'			=> array(
                    'suffix'	=> 'px'
                ),
                'parent'		=> $row_vertical_third_level_3
            ));
	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_header_options_map', 7);

}