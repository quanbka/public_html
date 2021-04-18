<?php

if(!function_exists('kendall_elated_tabs_map')) {
    function kendall_elated_tabs_map() {
		
        $panel = kendall_elated_add_admin_panel(array(
            'title' => esc_html__('Tabs','kendall'),
            'name'  => 'panel_tabs',
            'page'  => '_elements_page'
        ));

        //Typography options
        kendall_elated_add_admin_section_title(array(
            'name' => 'typography_section_title',
            'title' => esc_html__('Tabs Navigation Typography',		'kendall'),
            'parent' => $panel
        ));

        $typography_group = kendall_elated_add_admin_group(array(
            'name' => 'typography_group',
            'title' => esc_html__('Tabs Navigation Typography','kendall'),
			'description' => esc_html__('Setup typography for tabs navigation','kendall'),
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
            'name'          => 'tabs_font_family',
            'default_value' => '',
            'label'         =>esc_html__( 'Font Family','kendall'),
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_text_transform',
            'default_value' => '',
            'label'         => esc_html__('Text Transform','kendall'),
            'options'       => kendall_elated_get_text_transform_array()
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'selectsimple',
            'name'          => 'tabs_font_style',
            'default_value' => '',
            'label'         =>esc_html__( 'Font Style','kendall'),
            'options'       => kendall_elated_get_font_style_array()
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $typography_row,
            'type'          => 'textsimple',
            'name'          => 'tabs_letter_spacing',
            'default_value' => '',
            'label'         =>esc_html__( 'Letter Spacing','kendall'),
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
            'name'          => 'tabs_font_weight',
            'default_value' => '',
            'label'         => esc_html__('Font Weight','kendall'),
            'options'       => kendall_elated_get_font_weight_array()
        ));
		
		//Initial Tab Color Styles
		
		kendall_elated_add_admin_section_title(array(
            'name' => 'tab_color_section_title',
            'title' => esc_html__('Tab Navigation Color Styles',	'kendall'),
            'parent' => $panel
        ));
		$tabs_color_group = kendall_elated_add_admin_group(array(
            'name' => 'tabs_color_group',
            'title' => esc_html__('Tab Navigation Color Styles','kendall'),
			'description' => esc_html__('Set color styles for tab navigation','kendall'),
            'parent' => $panel
        ));
		$tabs_color_row = kendall_elated_add_admin_row(array(
            'name' => 'tabs_color_row',
            'next' => true,
            'parent' => $tabs_color_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color',
            'default_value' => '',
            'label'         => esc_html__('Color','kendall')
        ));
		kendall_elated_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_back_color',
            'default_value' => '',
            'label'         => esc_html__('Background Color','kendall')
        ));
		kendall_elated_add_admin_field(array(
            'parent'        => $tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color',
            'default_value' => '',
            'label'         => esc_html__('Border Color','kendall')
        ));
		
		//Active Tab Color Styles
		
		$active_tabs_color_group = kendall_elated_add_admin_group(array(
            'name' => 'active_tabs_color_group',
            'title' => esc_html__('Active and Hover Navigation Color Styles','kendall'),
			'description' =>esc_html__( 'Set color styles for active and hover tabs','kendall'),
            'parent' => $panel
        ));
		$active_tabs_color_row = kendall_elated_add_admin_row(array(
            'name' => 'active_tabs_color_row',
            'next' => true,
            'parent' => $active_tabs_color_group
        ));

        kendall_elated_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_color_active',
            'default_value' => '',
            'label'         => esc_html__('Color','kendall')
        ));
		kendall_elated_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_back_color_active',
            'default_value' => '',
            'label'         => esc_html__('Background Color','kendall')
        ));
		kendall_elated_add_admin_field(array(
            'parent'        => $active_tabs_color_row,
            'type'          => 'colorsimple',
            'name'          => 'tabs_border_color_active',
            'default_value' => '',
            'label'         => esc_html__('Border Color','kendall')
        ));
        
    }

    add_action('kendall_elated_options_elements_map', 'kendall_elated_tabs_map');
}