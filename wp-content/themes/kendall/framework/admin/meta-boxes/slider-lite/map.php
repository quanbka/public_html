<?php

if(!function_exists('kendall_elated_slider_lite_meta_box_map')) {

    function kendall_elated_slider_lite_meta_box_map() {

        $slider_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('slides_lite'),
                'title' => esc_html__('Slide Background Image', 'kendall'),
                'name' => 'eltd_slides_lite_image_settings'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_image',
                'type'        => 'image',
                'label'       => esc_html__('Slide Image', 'kendall'),
                'description' => esc_html__('Choose background image', 'kendall'),
                'parent'      => $slider_meta_box
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_overlay_image',
                'type'        => 'image',
                'label'       => esc_html__('Overlay Image', 'kendall'),
                'description' => esc_html__('Choose overlay image (pattern) for background image', 'kendall'),
                'parent'      => $slider_meta_box
            )
        );


        //Slide Elements

        $elements_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('slides_lite'),
                'title' => esc_html__('Slide Elements', 'kendall'),
                'name' => 'eltd_slides_lite_elements'
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_lite_elements_title',
                'title' => esc_html__('Slide Title', 'kendall'),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'eltd_slides_lite_elements_title_text',
                'label' => esc_html__('Title Text', 'kendall'),
                'description' => ''
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'eltd_slides_lite_elements_title_width',
                'label' => esc_html__('Relative Width (%)', 'kendall'),
                'description' => esc_html__('How much of the entire content width is occupied by the title. Defaults to 100.', 'kendall'),
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_lite_elements_subtitle',
                'title' => esc_html__('Slide Subtitle', 'kendall'),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'eltd_slides_lite_elements_subtitle_text',
                'label' => esc_html__('Subtitle Text', 'kendall'),
                'description' => ''
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'eltd_slides_lite_elements_subtitle_width',
                'label' => esc_html__('Relative Width (%)', 'kendall'),
                'description' => esc_html__('How much of the entire content width is occupied by the subtitle. Defaults to 100.', 'kendall'),
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_lite_elements_buttons',
                'title' => esc_html__('Slide Buttons', 'kendall'),
            )
        );

        $button_1_group = kendall_elated_add_admin_group(array(
            'title' => esc_html__('Button 1', 'kendall'),
            'description' => '',
            'name' => 'eltd_slides_lite_elements_button_1',
            'parent' => $elements_meta_box
        ));

        $row1 = kendall_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $button_1_group
        ));

        $button_1_text = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_button_1_text',
                'type'        => 'textsimple',
                'label'       => esc_html__('Button Text', 'kendall'),
                'parent'      => $row1
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_button_1_link',
                'type'        => 'textsimple',
                'label'       => esc_html__('Link', 'kendall'),
                'parent'      => $row1
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_button_1_target',
                'type'        => 'selectsimple',
                'label'       => esc_html__('Target', 'kendall'),
                'parent'      => $row1,
                'options'     => array(
                    '_self' => esc_html__('Self', 'kendall'),
                    '_blank' => esc_html__('Blank', 'kendall'),
                )
            )
        );

        $button_2_group = kendall_elated_add_admin_group(array(
            'title' => esc_html__('Button 2', 'kendall'),
            'description' => '',
            'name' => 'eltd_slides_lite_elements_button_2',
            'parent' => $elements_meta_box
        ));

        $row1 = kendall_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $button_2_group
        ));

        $button_1_text = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_button_2_text',
                'type'        => 'textsimple',
                'label'       => esc_html__('Button Text', 'kendall'),
                'parent'      => $row1
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_button_2_link',
                'type'        => 'textsimple',
                'label'       => esc_html__('Link', 'kendall'),
                'parent'      => $row1
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_button_2_target',
                'type'        => 'selectsimple',
                'label'       => esc_html__('Target', 'kendall'),
                'parent'      => $row1,
                'options'     => array(
                    '_self' => esc_html__('Self', 'kendall'),
                    '_blank' => esc_html__('Blank', 'kendall'),
                )
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_lite_elements_layout_animation',
                'title' => esc_html__('Layout and Animation', 'kendall'),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_content_in_grid',
                'type'        => 'yesno',
                'label'       => esc_html__('Keep Content in Grid?', 'kendall'),
                'description' => esc_html__('Whether to make the content width the same as that of the grid.', 'kendall'),
                'parent'      => $elements_meta_box,
                'default_value' => 'yes',
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltd_eltd_slides_lite_elements_content_width_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $content_width = kendall_elated_add_admin_container(array(
            'name' => 'eltd_slides_lite_elements_content_width_container',
            'parent' => $elements_meta_box,
            'hidden_property' => 'eltd_slides_lite_elements_content_in_grid',
            'hidden_value' => 'yes'
        ));

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $content_width,
                'type' => 'text',
                'name' => 'eltd_slides_lite_elements_content_width',
                'label' => esc_html__('Content Width (%)', 'kendall'),
                'description' => esc_html__('How much of the slide width the content takes.', 'kendall'),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_hor_align',
                'type'        => 'select',
                'label'       => esc_html__('Horizontal Alignment', 'kendall'),
                'description' => esc_html__('Applies to horizontal alignment of all slide elements.', 'kendall'),
                'parent'      => $elements_meta_box,
                'default_value' => 'center',
                'options'       => array(
                    'left' => esc_html__('Left', 'kendall'),
                    'center' => esc_html__('Center', 'kendall'),
                    'right' => esc_html__('Right', 'kendall'),
                )
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_ver_align',
                'type'        => 'select',
                'label'       => esc_html__('Vertical Alignment', 'kendall'),
                'description' => esc_html__('Choose whether the elements are vertically aligned from the top of the slide or the bottom of the header.', 'kendall'),
                'parent'      => $elements_meta_box,
                'default_value' => 'top_of_slide',
                'options'       => array(
                    'top_of_slide' => esc_html__('Top of the Slide', 'kendall'),
                    'bottom_of_header' => esc_html__('Bottom of the Header', 'kendall')
                )
            )
        );

        $animation_group = kendall_elated_add_admin_group(array(
            'title' => esc_html__('Animation', 'kendall'),
            'description' => esc_html__('Choose the type of animation and the order in which the elements appear.', 'kendall'),
            'name' => 'eltd_slides_lite_elements_animation',
            'parent' => $elements_meta_box
        ));

        $row1 = kendall_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $animation_group
        ));

        $animation_type = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_animation_type',
                'type'        => 'selectsimple',
                'label'       => esc_html__('Type', 'kendall'),
                'parent'      => $row1,
                'default_value' => "fade",
                'options' => array(
                    "none" => esc_html__("No Animation", 'kendall'),
                    "flip" => esc_html__("Flip", 'kendall'),
                    "spin" => esc_html__("Spin", 'kendall'),
                    "fade" => esc_html__("Fade In", 'kendall'),
                    "from_bottom" => esc_html__("Fly In From Bottom", 'kendall'),
                    "from_top" => esc_html__("Fly In From Top", 'kendall'),
                    "from_left" => esc_html__("Fly In From Left", 'kendall'),
                    "from_right" => esc_html__("Fly In From Right", 'kendall')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "none" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "flip" => "",
                        "spin" => "",
                        "fade" => "",
                        "from_bottom" => "",
                        "from_top" => "",
                        "from_left" => "",
                        "from_right" => ""
                    ),
                    "show" => array(
                        "none" => "",
                        "flip" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "spin" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "fade" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "from_bottom" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "from_top" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "from_left" => "#eltd_eltd_slides_lite_elements_animation_order",
                        "from_right" => "#eltd_eltd_slides_lite_elements_animation_order"
                    )
                )
            )
        );

        $animation_order = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slides_lite_elements_animation_order',
                'type'        => 'selectsimple',
                'label'       => esc_html__('Order', 'kendall'),
                'parent'      => $row1,
                'default_value' => "one_by_one",
                'options' => array(
                    "one_by_one" => esc_html__("One by One", 'kendall'),
                    "all_at_once" => esc_html__("All at Once", 'kendall')
                ),
                'hidden_property' => 'eltd_slides_lite_elements_animation_type',
                'hidden_values' => array('none')
            )
        );


            //Slide Behaviour

        $behaviours_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('slides_lite'),
                'title' => esc_html__('Header Behavior', 'kendall'),
                'name' => 'eltd_slides_lite_behaviour_settings'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $behaviours_meta_box,
                'type' => 'selectblank',
                'name' => 'eltd_slides_lite_header_style',
                'default_value' => '',
                'label' => esc_html__('Header Style', 'kendall'),
                'description' => esc_html__('Header style will be applied when this slide is in focus','kendall'),
                'options' => array(
                    "light" => esc_html__("Light", 'kendall'),
                    "dark" => esc_html__("Dark", 'kendall')
                )
            )
        );

    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_slider_lite_meta_box_map');
}