<?php

if(!function_exists('kendall_elated_button_map')) {
    function kendall_elated_button_map() {
        $panel = kendall_elated_add_admin_panel(array(
            'title' => esc_html__('Button','kendall'),
            'name'  => 'panel_button',
            'page'  => '_elements_page'
        ));

        //Typography options
        kendall_elated_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' =>esc_html__( 'Typography','kendall'),
            'parent' => $panel
        ));

        $typography_group = kendall_elated_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Typography','kendall'),
            'description' => esc_html__('Setup typography for all button types','kendall'),
            'parent' => $panel
        ));

        $typography_row = kendall_elated_add_admin_row(array(
            'name' => 'typography_row',
            'next' => true,
            'parent' => $typography_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'fontsimple',
            'name'          => 'button_font_family',
            'default_value' => '',
            'label'         => esc_html__('Font Family','kendall'),
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_text_transform',
            'default_value' => '',
            'label'         =>esc_html__( 'Text Transform','kendall'),
            'options'       => kendall_elated_get_text_transform_array()
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'button_font_style',
            'default_value' => '',
            'label'         => esc_html__('Font Style','kendall'),
            'options'       => kendall_elated_get_font_style_array()
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'button_letter_spacing',
            'default_value' => '',
            'label'         => esc_html__('Letter Spacing','kendall'),
            'args'          => array(
                'suffix' => 'px'
            )
        ));

        $typography_row2 = kendall_elated_add_admin_row(array(
            'name' => 'typography_row2',
            'next' => true,
            'parent' => $typography_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row2,
            'type'          => 'selectsimple',
            'name'          => 'button_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight','kendall'),
            'options'       => kendall_elated_get_font_weight_array()
        ));

        //Outline type options
        kendall_elated_add_admin_section_title(array(
            'name' => 'type_section_title',
            'title' =>esc_html__( 'Types','kendall'),
            'parent' => $panel
        ));

        $outline_group = kendall_elated_add_admin_group(array(
            'name' => 'outline_group',
            'title' =>esc_html__( 'Outline Type','kendall'),
            'description' => esc_html__('Setup outline button type','kendall'),
            'parent' => $panel
        ));

        $outline_row = kendall_elated_add_admin_row(array(
            'name' => 'outline_row',
            'next' => true,
            'parent' => $outline_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','kendall'),
            'description'   => ''
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','kendall'),
            'description'   => ''
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_bg_color',
            'default_value' => '',
            'label'         => esc_html__('Hover Background Color','kendall'),
            'description'   => ''
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $outline_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','kendall'),
            'description'   => ''
        ));

        $outline_row2 = kendall_elated_add_admin_row(array(
            'name' => 'outline_row2',
            'next' => true,
            'parent' => $outline_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $outline_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_outline_hover_border_color',
            'default_value' => '',
            'label'         =>esc_html__( 'Hover Border Color','kendall'),
            'description'   => ''
        ));

        //Solid type options
        $solid_group = kendall_elated_add_admin_group(array(
            'name' => 'solid_group',
            'title' =>esc_html__( 'Solid Type','kendall'),
            'description' =>esc_html__( 'Setup solid button type','kendall'),
            'parent' => $panel
        ));

        $solid_row = kendall_elated_add_admin_row(array(
            'name' => 'solid_row',
            'next' => true,
            'parent' => $solid_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Color','kendall'),
            'description'   => ''
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_text_color',
            'default_value' => '',
            'label'         => esc_html__('Text Hover Color','kendall'),
            'description'   => ''
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_start_bg_color',
            'default_value' => '',
            'label'         =>esc_html__( 'Start Background Color','kendall'),
            'description'   => ''
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $solid_row,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_end_bg_color',
            'default_value' => '',
            'label'         =>esc_html__( 'End Background Color','kendall'),
            'description'   => ''
        ));

        $solid_row2 = kendall_elated_add_admin_row(array(
            'name' => 'solid_row2',
            'next' => true,
            'parent' => $solid_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $solid_row2,
            'type'          => 'colorsimple',
            'name'          => 'btn_solid_hover_bg_color',
            'default_value' => '',
            'label'         =>esc_html__( 'Hover Background Color','kendall'),
            'description'   => ''
        ));
        
    }

    add_action('kendall_elated_options_elements_map', 'kendall_elated_button_map');
}