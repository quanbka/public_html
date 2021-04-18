<?php

//Slider

if(!function_exists('kendall_elated_slider_meta_box_map')) {

    function kendall_elated_slider_meta_box_map() {

        $slider_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Background', 'kendall'),
                'name' => 'slides_type'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'          => 'eltd_slide_background_type',
                'type'          => 'select',
                'default_value' => 'image',
                'label'         => esc_html__('Slide Background Type', 'kendall'),
                'description'   => esc_html__('Do you want to upload an image or video?', 'kendall'),
                'parent'        => $slider_meta_box,
                'options'       => array(
                    "image" => esc_html__("Image", 'kendall'),
                    "video" => esc_html__("Video", 'kendall')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "image" => "#eltd_eltd_slides_video_settings",
                        "video" => "#eltd_eltd_slides_image_settings"
                    ),
                    "show" => array(
                        "image" => "#eltd_eltd_slides_image_settings",
                        "video" => "#eltd_eltd_slides_video_settings"
                    )
                )
            )
        );


//Slide Image

        $image_meta_container = kendall_elated_add_admin_container(
            array(
                'name' => 'eltd_slides_image_settings',
                'parent' => $slider_meta_box,
                'hidden_property' => 'eltd_slide_background_type',
                'hidden_values' => array('video')
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_image',
                'type'        => 'image',
                'label'       => esc_html__('Slide Image', 'kendall'),
                'description' => esc_html__('Choose background image', 'kendall'),
                'parent'      => $image_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_overlay_image',
                'type'        => 'image',
                'label'       => esc_html__('Overlay Image', 'kendall'),
                'description' => esc_html__('Choose overlay image (pattern) for background image', 'kendall'),
                'parent'      => $image_meta_container
            )
        );


//Slide Video

        $video_meta_container = kendall_elated_add_admin_container(
            array(
                'name' => 'eltd_slides_video_settings',
                'parent' => $slider_meta_box,
                'hidden_property' => 'eltd_slide_background_type',
                'hidden_values' => array('image')
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_video_webm',
                'type'        => 'text',
                'label'       => esc_html__('Video - webm', 'kendall'),
                'description' => esc_html__('Path to the webm file that you have previously uploaded in Media Section', 'kendall'),
                'parent'      => $video_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_video_mp4',
                'type'        => 'text',
                'label'       => esc_html__('Video - mp4', 'kendall'),
                'description' => esc_html__('Path to the mp4 file that you have previously uploaded in Media Section', 'kendall'),
                'parent'      => $video_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_video_ogv',
                'type'        => 'text',
                'label'       => esc_html__('Video - ogv', 'kendall'),
                'description' => esc_html__('Path to the ogv file that you have previously uploaded in Media Section', 'kendall'),
                'parent'      => $video_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_video_image',
                'type'        => 'image',
                'label'       => esc_html__('Video Preview Image', 'kendall'),
                'description' => esc_html__('Choose background image that will be visible until video is loaded. This image will be shown on touch devices too.', 'kendall'),
                'parent'      => $video_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_slide_video_overlay',
                'type' => 'yesempty',
                'default_value' => '',
                'label' => esc_html__('Video Overlay Image', 'kendall'),
                'description' => esc_html__('Do you want to have a overlay image on video?', 'kendall'),
                'parent' => $video_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_eltd_slide_video_overlay_container"
                )
            )
        );

        $slide_video_overlay_container = kendall_elated_add_admin_container(array(
            'name' => 'eltd_slide_video_overlay_container',
            'parent' => $video_meta_container,
            'hidden_property' => 'eltd_slide_video_overlay',
            'hidden_values' => array('','no')
        ));

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_video_overlay_image',
                'type'        => 'image',
                'label'       => esc_html__('Overlay Image', 'kendall'),
                'description' => esc_html__('Choose overlay image (pattern) for background video.', 'kendall'),
                'parent'      => $slide_video_overlay_container
            )
        );


//Slide Elements

        $elements_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Elements', 'kendall'),
                'name' => 'eltd_slides_elements'
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_elements_frame',
                'title' => esc_html__('Elements Holder Frame', 'kendall'),
            )
        );

        kendall_elated_add_slide_holder_frame_scheme(
            array(
                'parent' => $elements_meta_box
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_elements_alignment',
                'type'        => 'select',
                'label'       => esc_html__('Elements Alignment', 'kendall'),
                'description' => esc_html__('How elements are aligned with respect to the Holder Frame', 'kendall'),
                'parent'      => $elements_meta_box,
                'default_value' => 'center',
                'options' => array(
                    "center" => esc_html__("Center", 'kendall'),
                    "left" => esc_html__("Left", 'kendall'),
                    "right" => esc_html__("Right", 'kendall'),
                    "custom" => esc_html__("Custom", 'kendall')
                ),
                'args'        => array(
                    "dependence" => true,
                    "hide" => array(
                        "center" => "#eltd_eltd_slide_holder_frame_height",
                        "left" => "#eltd_eltd_slide_holder_frame_height",
                        "right" => "#eltd_eltd_slide_holder_frame_height",
                        "custom" => ""
                    ),
                    "show" => array(
                        "center" => "",
                        "left" => "",
                        "right" => "",
                        "custom" => "#eltd_eltd_slide_holder_frame_height"
                    )
                )
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_in_grid',
                'type'        => 'select',
                'label'       => esc_html__('Holder Frame in Grid?', 'kendall'),
                'description' => esc_html__('Whether to keep the holder frame width the same as that of the grid.', 'kendall'),
                'parent'      => $elements_meta_box,
                'default_value' => 'no',
                'options' => array(
                    "yes" => esc_html__("Yes", 'kendall'),
                    "no" => esc_html__("No", 'kendall'),
                ),
                'args'        => array(
                    "dependence" => true,
                    "hide" => array(
                        "yes" => "#eltd_eltd_slide_holder_frame_width, #eltd_eltd_holder_frame_responsive_container",
                        "no" => ""
                    ),
                    "show" => array(
                        "yes" => "",
                        "no" => "#eltd_eltd_slide_holder_frame_width, #eltd_eltd_holder_frame_responsive_container"
                    )
                )
            )
        );

        $holder_frame = kendall_elated_add_admin_group(array(
            'title' => esc_html__('Holder Frame Properties', 'kendall'),
            'description' => esc_html__('The frame is always positioned centrally on the slide. All elements are positioned and sized relatively to the holder frame. Refer to the scheme above.', 'kendall'),
            'name' => 'eltd_holder_frame',
            'parent' => $elements_meta_box
        ));

        $row1 = kendall_elated_add_admin_row(array(
            'name' => 'row1',
            'parent' => $holder_frame
        ));

        $holder_frame_width = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_width',
                'type'        => 'textsimple',
                'label'       => esc_html__('Relative width (C/A*100)', 'kendall'),
                'parent'      => $row1,
                'hidden_property' => 'eltd_slide_holder_frame_in_grid',
                'hidden_values' => array('yes')
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_height',
                'type'        => 'textsimple',
                'label'       => esc_html__('Height to width ratio (D/C*100)', 'kendall'),
                'parent'      => $row1,
                'hidden_property' => 'eltd_slide_holder_elements_alignment',
                'hidden_values' => array('center', 'left', 'right')
            )
        );

        $holder_frame_responsive_container = kendall_elated_add_admin_container(array(
            'name' => 'eltd_holder_frame_responsive_container',
            'parent' => $elements_meta_box,
            'hidden_property' => 'eltd_slide_holder_frame_in_grid',
            'hidden_values' => array('yes')
        ));

        $holder_frame_responsive = kendall_elated_add_admin_group(array(
            'title' => esc_html__('Responsive Relative Width', 'kendall'),
            'description' => esc_html__('Enter different relative widths of the holder frame for each responsive stage. Leave blank to have the frame width scale proportionally to the screen size.', 'kendall'),
            'name' => 'eltd_holder_frame_responsive',
            'parent' => $holder_frame_responsive_container
        ));

        $screen_widths_holder_frame = array(
            // These values must match those in eltd.layout.inc, slider.php and shortcodes.js
            "mobile" => 600,
            "tabletp" => 800,
            "tabletl" => 1024,
            "laptop" => 1440
        );

        $row2 = kendall_elated_add_admin_row(array(
            'name' => 'row2',
            'parent' => $holder_frame_responsive
        ));

        $holder_frame_width = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_width_mobile',
                'type'        => 'textsimple',
                'label'       => esc_html__('Mobile - up to ','kendall').esc_attr($screen_widths_holder_frame["mobile"]).'px',
                'parent'      => $row2
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_width_tablet_p',
                'type'        => 'textsimple',
                'label'       => esc_html__('Tablet - Portrait ','kendall') .(esc_attr($screen_widths_holder_frame["mobile"]+1)).'px - '.esc_attr($screen_widths_holder_frame["tabletp"]).'px',
                'parent'      => $row2
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_width_tablet_l',
                'type'        => 'textsimple',
                'label'       => esc_html__('Tablet - Landscape ', 'kendall').(esc_attr($screen_widths_holder_frame["tabletp"]+1)).'px - '.esc_attr($screen_widths_holder_frame["tabletl"]).'px',
                'parent'      => $row2
            )
        );

        $row3 = kendall_elated_add_admin_row(array(
            'name' => 'row3',
            'parent' => $holder_frame_responsive
        ));

        $holder_frame_width = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_width_laptop',
                'type'        => 'textsimple',
                'label'       => esc_html__('Laptop ','kendall') .(esc_attr($screen_widths_holder_frame["tabletl"]+1)).'px - '.esc_attr($screen_widths_holder_frame["laptop"]).'px',
                'parent'      => $row3
            )
        );

        $holder_frame_height = kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_slide_holder_frame_width_desktop',
                'type'        => 'textsimple',
                'label'       => esc_html__('Desktop above ','kendall').esc_attr($screen_widths_holder_frame["laptop"]).'px',
                'parent'      => $row3
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'text',
                'name' => 'eltd_slide_elements_default_width',
                'label' => esc_html__('Default Screen Width in px (A)', 'kendall'),
                'description' => esc_html__('All elements marked as responsive scale at the ratio of the actual screen width to this screen width. Default is 1920px.', 'kendall')
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $elements_meta_box,
                'type' => 'select',
                'name' => 'eltd_slide_elements_default_animation',
                'default_value' => 'none',
                'label' => esc_html__('Default Elements Animation', 'kendall'),
                'description' => esc_html__('This animation will be applied to all elements except those with their own animation settings.', 'kendall'),
                'options' => array(
                    "none" => esc_html__("No Animation", 'kendall'),
                    "flip" => esc_html__("Flip", 'kendall'),
                    "spin" => esc_html__("Spin", 'kendall'),
                    "fade" => esc_html__("Fade In", 'kendall'),
                    "from_bottom" => esc_html__("Fly In From Bottom", 'kendall'),
                    "from_top" => esc_html__("Fly In From Top", 'kendall'),
                    "from_left" => esc_html__("Fly In From Left", 'kendall'),
                    "from_right" => esc_html__("Fly In From Right", 'kendall')
                )
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_elements_list',
                'title' => esc_html__('Elements', 'kendall'),
            )
        );

        $slide_elements = kendall_elated_add_slide_elements_framework(
            array(
                'parent' => $elements_meta_box,
                'name' => 'eltd_slides_elements_holder'
            )
        );

//Slide Behaviour

        $behaviours_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('slides'),
                'title' => esc_html__('Slide Behaviours', 'kendall'),
                'name' => 'eltd_slides_behaviour_settings'
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $behaviours_meta_box,
                'name' => 'eltd_header_styling_title',
                'title' => esc_html__('Header', 'kendall')
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $behaviours_meta_box,
                'type' => 'selectblank',
                'name' => 'eltd_slide_header_style',
                'default_value' => '',
                'label' => esc_html__('Header Style', 'kendall'),
                'description' => esc_html__('Header style will be applied when this slide is in focus', 'kendall'),
                'options' => array(
                    "light" => esc_html__("Light", 'kendall'),
                    "dark" => esc_html__("Dark", 'kendall'),
                )
            )
        );

        kendall_elated_add_admin_section_title(
            array(
                'parent' => $behaviours_meta_box,
                'name' => 'eltd_image_animation_title',
                'title' => esc_html__('Slide Image Animation', 'kendall'),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_enable_image_animation',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Enable Image Animation', 'kendall'),
                'description' => esc_html__('Enabling this option will turn on a motion animation on the slide image', 'kendall'),
                'parent' => $behaviours_meta_box,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "",
                    "dependence_show_on_yes" => "#eltd_eltd_enable_image_animation_container"
                )
            )
        );

        $enable_image_animation_container = kendall_elated_add_admin_container(array(
            'name' => 'eltd_enable_image_animation_container',
            'parent' => $behaviours_meta_box,
            'hidden_property' => 'eltd_enable_image_animation',
            'hidden_value' => 'no'
        ));

        kendall_elated_add_meta_box_field(
            array(
                'parent' => $enable_image_animation_container,
                'type' => 'select',
                'name' => 'eltd_enable_image_animation_type',
                'default_value' => esc_html__('zoom_center', 'kendall'),
                'label' => esc_html__('Animation Type', 'kendall'),
                'options' => array(
                    "zoom_center" => esc_html__("Zoom In Center", 'kendall'),
                    "zoom_top_left" => esc_html__("Zoom In to Top Left", 'kendall'),
                    "zoom_top_right" => esc_html__("Zoom In to Top Right", 'kendall'),
                    "zoom_bottom_left" => esc_html__("Zoom In to Bottom Left", 'kendall'),
                    "zoom_bottom_right" => esc_html__("Zoom In to Bottom Right", 'kendall')
                )
            )
        );

    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_slider_meta_box_map');
}