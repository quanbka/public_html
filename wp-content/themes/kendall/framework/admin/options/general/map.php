<?php

if ( ! function_exists('kendall_elated_general_options_map') ) {
    /**
     * General options page
     */
    function kendall_elated_general_options_map() {

        kendall_elated_add_admin_page(
            array(
                'slug'  => '',
                'title' => esc_html__('General', 'kendall'),
                'icon'  => 'fa fa-institution'
            )
        );

        $panel_design_style = kendall_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_design_style',
                'title' => esc_html__('Design Style', 'kendall')
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'google_fonts',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Google Font Family', 'kendall'),
                'description'   => esc_html__('Choose a default Google font for your site', 'kendall'),
                'parent' => $panel_design_style
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'additional_google_fonts',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Additional Google Fonts', 'kendall'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_additional_google_fonts_container"
                )
            )
        );

        $additional_google_fonts_container = kendall_elated_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'additional_google_fonts_container',
                'hidden_property'   => 'additional_google_fonts',
                'hidden_value'      => 'no'
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font1',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'kendall'),
                'description'   => esc_html__('Choose additional Google font for your site', 'kendall'),
                'parent'        => $additional_google_fonts_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font2',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'kendall'),
                'description'   => esc_html__('Choose additional Google font for your site', 'kendall'),
                'parent'        => $additional_google_fonts_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font3',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'kendall'),
                'description'   => esc_html__('Choose additional Google font for your site', 'kendall'),
                'parent'        => $additional_google_fonts_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font4',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'kendall'),
                'description'   => esc_html__('Choose additional Google font for your site', 'kendall'),
                'parent'        => $additional_google_fonts_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'additional_google_font5',
                'type'          => 'font',
                'default_value' => '-1',
                'label'         => esc_html__('Font Family', 'kendall'),
                'description'   => esc_html__('Choose additional Google font for your site', 'kendall'),
                'parent'        => $additional_google_fonts_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name' => 'google_font_weight',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Style & Weight', 'kendall'),
                'description' => esc_html__('Choose a default Google font weights for your site. Impact on page load time', 'kendall'),
                'parent' => $panel_design_style,
                'options' => array(
                    '100'       => esc_html__('100 Thin', 'kendall'),
                    '100italic' => esc_html__('100 Thin Italic', 'kendall'),
                    '200'       => esc_html__('200 Extra-Light', 'kendall'),
                    '200italic' => esc_html__('200 Extra-Light Italic', 'kendall'),
                    '300'       => esc_html__('300 Light', 'kendall'),
                    '300italic' => esc_html__('300 Light Italic', 'kendall'),
                    '400'       => esc_html__('400 Regular', 'kendall'),
                    '400italic' => esc_html__('400 Regular Italic', 'kendall'),
                    '500'       => esc_html__('500 Medium', 'kendall'),
                    '500italic' => esc_html__('500 Medium Italic', 'kendall'),
                    '600'       => esc_html__('600 Semi-Bold', 'kendall'),
                    '600italic' => esc_html__('600 Semi-Bold Italic', 'kendall'),
                    '700'       => esc_html__('700 Bold', 'kendall'),
                    '700italic' => esc_html__('700 Bold Italic', 'kendall'),
                    '800'       => esc_html__('800 Extra-Bold', 'kendall'),
                    '800italic' => esc_html__('800 Extra-Bold Italic', 'kendall'),
                    '900'       => esc_html__('900 Ultra-Bold', 'kendall'),
                    '900italic' => esc_html__('900 Ultra-Bold Italic', 'kendall')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name' => 'google_font_subset',
                'type' => 'checkboxgroup',
                'default_value' => '',
                'label' => esc_html__('Google Fonts Subset', 'kendall'),
                'description' => esc_html__('Choose a default Google font subsets for your site', 'kendall'),
                'parent' => $panel_design_style,
                'options' => array(
                    'latin' => esc_html__('Latin', 'kendall'),
                    'latin-ext' => esc_html__('Latin Extended', 'kendall'),
                    'cyrillic' => esc_html__('Cyrillic', 'kendall'),
                    'cyrillic-ext' => esc_html__('Cyrillic Extended', 'kendall'),
                    'greek' => esc_html__('Greek', 'kendall'),
                    'greek-ext' => esc_html__('Greek Extended', 'kendall'),
                    'vietnamese' => esc_html__('Vietnamese', 'kendall')
                ),
                'args' => array(
                    'enable_empty_checkbox' => true,
                    'inline_checkbox_class' => true
                )
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'first_color',
                'type'          => 'color',
                'label'         => esc_html__('First Main Color', 'kendall'),
                'description'   => esc_html__('Choose the most dominant theme color. Default color is #dda43d', 'kendall'),
                'parent'        => $panel_design_style
            )
        );
        kendall_elated_add_admin_field(
            array(
                'name'          => 'second_color',
                'type'          => 'color',
                'label'         => esc_html__('Second Main Color', 'kendall'),
                'description'   => esc_html__('Choose the second dominant theme color. Default color is #f6c478', 'kendall'),
                'parent'        => $panel_design_style
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'page_background_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'kendall'),
                'description'   => esc_html__('Choose the background color for page content. Default color is #ffffff', 'kendall'),
                'parent'        => $panel_design_style
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'main_style',
                'type'          => 'select',
                'default_value' => 'style1',
                'label'         => esc_html__('Theme Main Style', 'kendall'),
                'description'   => esc_html__('Choose theme main style', 'kendall'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    'style1'   => esc_html__('Default Style', 'kendall'),
                    'style2'   => esc_html__('Style with Open Sans Font', 'kendall'),
                    'style3'   => esc_html__('Style with Covered By Your Grace Font', 'kendall')
                )
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'selection_color',
                'type'          => 'color',
                'label'         => esc_html__('Text Selection Color', 'kendall'),
                'description'   => esc_html__('Choose the color users see when selecting text', 'kendall'),
                'parent'        => $panel_design_style
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'boxed',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Boxed Layout', 'kendall'),
                'description'   => '',
                'parent'        => $panel_design_style,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_boxed_container"
                )
            )
        );

        $boxed_container = kendall_elated_add_admin_container(
            array(
                'parent'            => $panel_design_style,
                'name'              => 'boxed_container',
                'hidden_property'   => 'boxed',
                'hidden_value'      => 'no'
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'page_background_color_in_box',
                'type'          => 'color',
                'label'         => esc_html__('Page Background Color', 'kendall'),
                'description'   => esc_html__('Choose the page background color outside box.', 'kendall'),
                'parent'        => $boxed_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'boxed_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Image', 'kendall'),
                'description'   => esc_html__('Choose an image to be displayed in background', 'kendall'),
                'parent'        => $boxed_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'boxed_pattern_background_image',
                'type'          => 'image',
                'label'         => esc_html__('Background Pattern', 'kendall'),
                'description'   => esc_html__('Choose an image to be used as background pattern', 'kendall'),
                'parent'        => $boxed_container
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'boxed_background_image_attachment',
                'type'          => 'select',
                'default_value' => 'fixed',
                'label'         => esc_html__('Background Image Attachment', 'kendall'),
                'description'   => esc_html__('Choose background image attachment', 'kendall'),
                'parent'        => $boxed_container,
                'options'       => array(
                    'fixed'     => esc_html__('Fixed', 'kendall'),
                    'scroll'    => esc_html__('Scroll', 'kendall')
                )
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'initial_content_width',
                'type'          => 'select',
                'default_value' => 'grid-1200',
                'label'         => esc_html__('Initial Width of Content', 'kendall'),
                'description'   => esc_html__('Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'kendall'),
                'parent'        => $panel_design_style,
                'options'       => array(
                    ""          => esc_html__("1100px", 'kendall'),
                    "grid-1300" => esc_html__("1300px", 'kendall'),
                    "grid-1200" => esc_html__("1200px - default", 'kendall'),
                    "grid-1000" => esc_html__("1000px", 'kendall'),
                    "grid-800"  => esc_html__("800px", 'kendall')
                )
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'preload_pattern_image',
                'type'          => 'image',
                'label'         => esc_html__('Preload Pattern Image', 'kendall'),
                'description'   => esc_html__('Choose preload pattern image to be displayed until images are loaded ', 'kendall'),
                'parent'        => $panel_design_style
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name' => 'element_appear_amount',
                'type' => 'text',
                'label' => esc_html__('Element Appearance', 'kendall'),
                //'description' => esc_html__('For animated elements, set distance (related to browser bottom) to start the animation', 'kendall'),
                'parent' => $panel_design_style,
                'args' => array(
                    'col_width' => 2,
                    'suffix' => 'px'
                )
            )
        );

        $panel_settings = kendall_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_settings',
                'title' => esc_html__('Settings', 'kendall')
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'smooth_scroll',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Scroll', 'kendall'),
                'description'   => esc_html__('Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'kendall'),
                'parent'        => $panel_settings
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'smooth_page_transitions',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Smooth Page Transitions', 'kendall'),
                'description'   => esc_html__('Enabling this option will perform a smooth transition between pages when clicking on links.', 'kendall'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_page_transitions_container, #eltd_smooth_pt_preloader_text, #eltd_smooth_pt_spinner_logo"
                )
            )
        );

        $page_transitions_container = kendall_elated_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'page_transitions_container',
                'hidden_property'   => 'smooth_page_transitions',
                'hidden_value'      => 'no'
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'smooth_pt_bgnd_color',
                'type'          => 'color',
                'label'         => esc_html__('Page Loader Background Color', 'kendall'),
                'parent'        => $page_transitions_container
            )
        );

        $group_pt_spinner_animation = kendall_elated_add_admin_group(array(
            'name'          => 'group_pt_spinner_animation',
            'title'         => esc_html__('Loader Style', 'kendall'),
            'description'   => esc_html__('Define styles for loader spinner animation', 'kendall'),
            'parent'        => $page_transitions_container
        ));

        $row_pt_spinner_animation = kendall_elated_add_admin_row(array(
            'name'      => 'row_pt_spinner_animation',
            'parent'    => $group_pt_spinner_animation
        ));

        kendall_elated_add_admin_field(array(
            'type'          => 'selectsimple',
            'name'          => 'smooth_pt_spinner_type',
            'default_value' => '',
            'label'         => esc_html__('Spinner Type', 'kendall'),
            'parent'        => $row_pt_spinner_animation,
            'options'       => array(
                "logo" => esc_html__("Logo", 'kendall'),
                "square" => esc_html__("Square", 'kendall'),
                "pulse" => esc_html__("Pulse", 'kendall'),
                "double_pulse" => esc_html__("Double Pulse", 'kendall'),
                "cube" => esc_html__("Cube", 'kendall'),
                "rotating_cubes" => esc_html__("Rotating Cubes", 'kendall'),
                "stripes" => esc_html__("Stripes", 'kendall'),
                "wave" => esc_html__("Wave", 'kendall'),
                "two_rotating_circles" => esc_html__("2 Rotating Circles", 'kendall'),
                "five_rotating_circles" => esc_html__("5 Rotating Circles", 'kendall'),
                "atom" => esc_html__("Atom", 'kendall'),
                "clock" => esc_html__("Clock", 'kendall'),
                "mitosis" => esc_html__("Mitosis", 'kendall'),
                "lines" => esc_html__("Lines", 'kendall'),
                "fussion" => esc_html__("Fussion", 'kendall'),
                "wave_circles" => esc_html__("Wave Circles", 'kendall'),
                "pulse_circles" => esc_html__("Pulse Circles", 'kendall')
            ),
            'args'          => array(
                "dependence"  => true,
                'show'        => array(
                    "logo"                  => "#eltd_logo_params_container",
                    "square"                => "#eltd_smooth_pt_spinner_color",
                    "pulse"                 => "#eltd_smooth_pt_spinner_color",
                    "double_pulse"          => "#eltd_smooth_pt_spinner_color",
                    "cube"                  => "#eltd_smooth_pt_spinner_color",
                    "rotating_cubes"        => "#eltd_smooth_pt_spinner_color",
                    "stripes"               => "#eltd_smooth_pt_spinner_color",
                    "wave"                  => "#eltd_smooth_pt_spinner_color",
                    "two_rotating_circles"  => "#eltd_smooth_pt_spinner_color",
                    "five_rotating_circles" => "#eltd_smooth_pt_spinner_color",
                    "atom"                  => "#eltd_smooth_pt_spinner_color",
                    "clock"                 => "#eltd_smooth_pt_spinner_color",
                    "mitosis"               => "#eltd_smooth_pt_spinner_color",
                    "lines"                 => "#eltd_smooth_pt_spinner_color",
                    "fussion"               => "#eltd_smooth_pt_spinner_color",
                    "wave_circles"          => "#eltd_smooth_pt_spinner_color",
                    "pulse_circles"         => "#eltd_smooth_pt_spinner_color"
                ),
                'hide'        => array(
                    "logo"                  => "#eltd_smooth_pt_spinner_color",
                    "square"                => "#eltd_logo_params_container",
                    "pulse"                 => "#eltd_logo_params_container",
                    "double_pulse"          => "#eltd_logo_params_container",
                    "cube"                  => "#eltd_logo_params_container",
                    "rotating_cubes"        => "#eltd_logo_params_container",
                    "stripes"               => "#eltd_logo_params_container",
                    "wave"                  => "#eltd_logo_params_container",
                    "two_rotating_circles"  => "#eltd_logo_params_container",
                    "five_rotating_circles" => "#eltd_logo_params_container",
                    "atom"                  => "#eltd_logo_params_container",
                    "clock"                 => "#eltd_logo_params_container",
                    "mitosis"               => "#eltd_logo_params_container",
                    "lines"                 => "#eltd_logo_params_container",
                    "fussion"               => "#eltd_logo_params_container",
                    "wave_circles"          => "#eltd_logo_params_container",
                    "pulse_circles"         => "#eltd_logo_params_container"
                )
            )
        ));

        $logo_params_container = kendall_elated_add_admin_container(
            array(
                'parent'            => $page_transitions_container,
                'name'              => 'logo_params_container',
                'hidden_property'   => 'smooth_pt_preloader_text, smooth_pt_spinner_logo',
                'hidden_value'      => 'no'
            )
        );

        kendall_elated_add_admin_field(array(
                'name'          => 'smooth_pt_spinner_logo',
                'type'          => 'image',
                'label'         => esc_html__('Preloader Logo', 'kendall'),
                'description'   => esc_html__('Choose preloader logo to be displayed until the page is loaded', 'kendall'),
                'parent'        => $logo_params_container
            )
        );

        kendall_elated_add_admin_field(array(
            'type'          => 'text',
            'name'          => 'smooth_pt_preloader_text',
            'default_value' => '',
            'label'         => esc_html__('Preloader Text', 'kendall'),
            'parent'        => $logo_params_container,
            'args'          => array(
                'col_width' => 2
            )
        ));

        kendall_elated_add_admin_field(array(
            'type'          => 'colorsimple',
            'name'          => 'smooth_pt_spinner_color',
            'default_value' => '',
            'label'         => esc_html__('Spinner Color', 'kendall'),
            'parent'        => $row_pt_spinner_animation,
        ));

        kendall_elated_add_admin_field(
            array(
                'name'          => 'show_back_button',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Show "Back To Top Button"', 'kendall'),
                'description'   => esc_html__('Enabling this option will display a Back to Top button on every page', 'kendall'),
                'parent'        => $panel_settings
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'enable_paspartu',
                'type'          => 'yesno',
                'default_value' => 'no',
                'label'         => esc_html__('Passepartout', 'kendall'),
                'description'   => esc_html__('Enabling this option will display passepartout around site content', 'kendall'),
                'parent'        => $panel_settings,
                'args'          => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_paspartu_container"
                )
            )
        );

        $paspartu_container = kendall_elated_add_admin_container(
            array(
                'parent'            => $panel_settings,
                'name'              => 'paspartu_container',
                'hidden_property'   => 'enable_paspartu',
                'hidden_value'      => 'no'
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'paspartu_color',
                'type'          => 'color',
                'default_value' => '',
                'label'         => esc_html__('Passepartout Color', 'kendall'),
                'description'   => esc_html__('Choose passepartout color.Default value is #fff', 'kendall'),
                'parent'        => $paspartu_container,
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'paspartu_size',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__('Passepartout Size', 'kendall'),
                'description'   => esc_html__('Enter size amount for passepartout.Default value is 10px', 'kendall'),
                'parent'        => $paspartu_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );
        kendall_elated_add_meta_box_field(
            array(
                'name'          => 'paspartu_mobile_size',
                'type'          => 'text',
                'default_value' => '',
                'label'         => esc_html__('Passepartout Size on Mobile Devices', 'kendall'),
                'description'   => esc_html__('Enter size amount for passepartout on mobile devices. Default value is 10px', 'kendall'),
                'parent'        => $paspartu_container,
                'args' => array(
                    'col_width' => 3
                )
            )
        );


        kendall_elated_add_admin_field(
            array(
                'name'          => 'responsiveness',
                'type'          => 'yesno',
                'default_value' => 'yes',
                'label'         => esc_html__('Responsiveness', 'kendall'),
                'description'   => esc_html__('Enabling this option will make all pages responsive', 'kendall'),
                'parent'        => $panel_settings
            )
        );

        $panel_custom_code = kendall_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_custom_code',
                'title' => esc_html__('Custom Code', 'kendall'),
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'custom_css',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom CSS', 'kendall'),
                'description'   => esc_html__('Enter your custom CSS here', 'kendall'),
                'parent'        => $panel_custom_code
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'          => 'custom_js',
                'type'          => 'textarea',
                'label'         => esc_html__('Custom JS', 'kendall'),
                'description'   => esc_html__('Enter your custom Javascript here', 'kendall'),
                'parent'        => $panel_custom_code
            )
        );


        $panel_google_api = kendall_elated_add_admin_panel(
            array(
                'page'  => '',
                'name'  => 'panel_google_api',
                'title' => esc_html__('Google API', 'kendall')
            )
        );

        kendall_elated_add_admin_field(
            array(
                'name'        => 'google_maps_api_key',
                'type'        => 'text',
                'label'       => esc_html__('Google Maps Api Key', 'kendall'),
                'description' => esc_html__('Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation. Temporarily you can use "AIzaSyAidINa74sv7bt7Y3vqjKjM7m0PgJN1bhk"','kendall'),
                'parent'      => $panel_google_api
            )
        );
    }

    add_action( 'kendall_elated_options_map', 'kendall_elated_general_options_map', 5);

}