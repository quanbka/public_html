<?php

if(!function_exists('kendall_elated_title_meta_box_map')) {

    function kendall_elated_title_meta_box_map() {

        $title_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Title', 'kendall'),
                'name' => 'title_meta'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_show_title_area_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Show Title Area', 'kendall'),
                'description' => esc_html__('Disabling this option will turn off page title area', 'kendall'),
                'parent' => $title_meta_box,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'kendall'),
                    'yes' => esc_html__('Yes', 'kendall')
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "#eltd_eltd_show_title_area_meta_container",
                        "yes" => ""
                    ),
                    "show" => array(
                        "" => "#eltd_eltd_show_title_area_meta_container",
                        "no" => "",
                        "yes" => "#eltd_eltd_show_title_area_meta_container"
                    )
                )
            )
        );

        $show_title_area_meta_container = kendall_elated_add_admin_container(
            array(
                'parent' => $title_meta_box,
                'name' => 'eltd_show_title_area_meta_container',
                'hidden_property' => 'eltd_show_title_area_meta',
                'hidden_value' => 'no'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_type_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Area Type', 'kendall'),
                'description' => esc_html__('Choose title type', 'kendall'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'standard' => esc_html__('Standard', 'kendall'),
                    'breadcrumb' => esc_html__('Breadcrumb', 'kendall'),
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "standard" => "",
                        "standard" => "",
                        "breadcrumb" => "#eltd_eltd_title_area_type_meta_container"
                    ),
                    "show" => array(
                        "" => "#eltd_eltd_title_area_type_meta_container",
                        "standard" => "#eltd_eltd_title_area_type_meta_container",
                        "breadcrumb" => ""
                    )
                )
            )
        );

        $title_area_type_meta_container = kendall_elated_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'eltd_title_area_type_meta_container',
                'hidden_property' => 'eltd_title_area_type_meta',
                'hidden_value' => '',
                'hidden_values' => array('breadcrumb'),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_enable_breadcrumbs_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Enable Breadcrumbs', 'kendall'),
                'description' => esc_html__('This option will display Breadcrumbs in Title Area', 'kendall'),
                'parent' => $title_area_type_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'kendall'),
                    'yes' => esc_html__('Yes', 'kendall'),
                ),
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_animation_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Animations', 'kendall'),
                'description' => esc_html__('Choose an animation for Title Area', 'kendall'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No Animation', 'kendall'),
                    'right-left' => esc_html__('Text right to left', 'kendall'),
                    'left-right' => esc_html__('Text left to right', 'kendall')
                )
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_vertial_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Vertical Alignment', 'kendall'),
                'description' => esc_html__('Specify title vertical alignment', 'kendall'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'header_bottom' => esc_html__('From Bottom of Header', 'kendall'),
                    'window_top' => esc_html__('From Window Top', 'kendall'),
                )
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_size_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Title Size', 'kendall'),
                'description' => esc_html__('Specify title size', 'kendall'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'small' => esc_html__('Small', 'kendall'),
                    'medium' => esc_html__('Medium', 'kendall'),
                    'large' => esc_html__('Large', 'kendall'),
                )
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_content_alignment_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Horizontal Alignment', 'kendall'),
                'description' => esc_html__('Specify title horizontal alignment', 'kendall'),
                'parent' => $show_title_area_meta_container,
                'options' => array(
                    '' => '',
                    'left' => esc_html__('Left', 'kendall'),
                    'center' => esc_html__('Center', 'kendall'),
                    'right' => esc_html__('Right', 'kendall')
                )
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_text_color_meta',
                'type' => 'color',
                'label' => esc_html__('Title Color', 'kendall'),
                'description' => esc_html__('Choose a color for title text', 'kendall'),
                'parent' => $show_title_area_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_breadcrumb_color_meta',
                'type' => 'color',
                'label' => esc_html__('Breadcrumb Color', 'kendall'),
                'description' => esc_html__('Choose a color for breadcrumb text', 'kendall'),
                'parent' => $show_title_area_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_background_color_meta',
                'type' => 'color',
                'label' => esc_html__('Background Color', 'kendall'),
                'description' => esc_html__('Choose a background color for Title Area', 'kendall'),
                'parent' => $show_title_area_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_hide_background_image_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Hide Background Image', 'kendall'),
                'description' => esc_html__('Enable this option to hide background image in Title Area', 'kendall'),
                'parent' => $show_title_area_meta_container,
                'args' => array(
                    "dependence" => true,
                    "dependence_hide_on_yes" => "#eltd_eltd_hide_background_image_meta_container",
                    "dependence_show_on_yes" => ""
                )
            )
        );

        $hide_background_image_meta_container = kendall_elated_add_admin_container(
            array(
                'parent' => $show_title_area_meta_container,
                'name' => 'eltd_hide_background_image_meta_container',
                'hidden_property' => 'eltd_hide_background_image_meta',
                'hidden_value' => 'yes'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_background_image_meta',
                'type' => 'image',
                'label' => esc_html__('Background Image', 'kendall'),
                'description' => esc_html__('Choose an Image for Title Area', 'kendall'),
                'parent' => $hide_background_image_meta_container
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_background_image_responsive_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Responsive Image', 'kendall'),
                'description' => esc_html__('Enabling this option will make Title background image responsive', 'kendall'),
                'parent' => $hide_background_image_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'kendall'),
                    'yes' => esc_html__('Yes', 'kendall'),
                ),
                'args' => array(
                    "dependence" => true,
                    "hide" => array(
                        "" => "",
                        "no" => "",
                        "yes" => "#eltd_eltd_title_area_background_image_responsive_meta_container, #eltd_eltd_title_area_height_meta"
                    ),
                    "show" => array(
                        "" => "#eltd_eltd_title_area_background_image_responsive_meta_container, #eltd_eltd_title_area_height_meta",
                        "no" => "#eltd_eltd_title_area_background_image_responsive_meta_container, #eltd_eltd_title_area_height_meta",
                        "yes" => ""
                    )
                )
            )
        );

        $title_area_background_image_responsive_meta_container = kendall_elated_add_admin_container(
            array(
                'parent' => $hide_background_image_meta_container,
                'name' => 'eltd_title_area_background_image_responsive_meta_container',
                'hidden_property' => 'eltd_title_area_background_image_responsive_meta',
                'hidden_value' => 'yes'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_title_area_background_image_parallax_meta',
                'type' => 'select',
                'default_value' => '',
                'label' => esc_html__('Background Image in Parallax', 'kendall'),
                'description' => esc_html__('Enabling this option will make Title background image parallax', 'kendall'),
                'parent' => $title_area_background_image_responsive_meta_container,
                'options' => array(
                    '' => '',
                    'no' => esc_html__('No', 'kendall'),
                    'yes' => esc_html__( 'Yes', 'kendall'),
                    'yes_zoom' => esc_html__('Yes, with zoom out', 'kendall'),
                )
            )
        );

        kendall_elated_add_meta_box_field(array(
            'name' => 'eltd_title_area_height_meta',
            'type' => 'text',
            'label' => esc_html__('Height', 'kendall'),
            'description' => esc_html__('Set a height for Title Area', 'kendall'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 2,
                'suffix' => 'px'
            )
        ));

        kendall_elated_add_meta_box_field(array(
            'name' => 'eltd_title_area_subtitle_meta',
            'type' => 'text',
            'default_value' => '',
            'label' => esc_html__('Subtitle Text', 'kendall'),
            'description' => esc_html__('Enter your subtitle text', 'kendall'),
            'parent' => $show_title_area_meta_container,
            'args' => array(
                'col_width' => 6
            )
        ));

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_subtitle_color_meta',
                'type' => 'color',
                'label' => esc_html__('Subtitle Color', 'kendall'),
                'description' => esc_html__('Choose a color for subtitle text', 'kendall'),
                'parent' => $show_title_area_meta_container
            )
        );

    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_title_meta_box_map');
}