<?php 
if(!function_exists('kendall_elated_accordions_map')) {
    /**
     * Add Accordion options to elements panel
     */
   function kendall_elated_accordions_map() {
		
       $panel = kendall_elated_add_admin_panel(array(
           'title' => esc_html('Accordions','kendall'),
           'name'  => 'panel_accordions',
           'page'  => '_elements_page'
       ));

       //Typography options
       kendall_elated_add_admin_section_title(array(
           'name' => 'typography_section_title',
           'title' =>esc_html( 'Typography','kendall'),
           'parent' => $panel
       ));

       $typography_group = kendall_elated_add_admin_group(array(
           'name' => 'typography_group',
           'title' => esc_html('Typography','kendall'),
			'description' => esc_html('Setup typography for accordions navigation','kendall'),
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
           'name'          => 'accordions_font_family',
           'default_value' => '',
           'label'         => esc_html('Font Family','kendall'),
       ));

       kendall_elated_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_text_transform',
           'default_value' => '',
           'label'         => esc_html('Text Transform','kendall'),
           'options'       => kendall_elated_get_text_transform_array()
       ));

       kendall_elated_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'selectsimple',
           'name'          => 'accordions_font_style',
           'default_value' => '',
           'label'         => esc_html('Font Style','kendall'),
           'options'       => kendall_elated_get_font_style_array()
       ));

       kendall_elated_add_admin_field(array(
           'parent'        => $typography_row,
           'type'          => 'textsimple',
           'name'          => 'accordions_letter_spacing',
           'default_value' => '',
           'label'         =>esc_html( 'Letter Spacing','kendall'),
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
           'name'          => 'accordions_font_weight',
           'default_value' => '',
           'label'         => esc_html('Font Weight','kendall'),
           'options'       => kendall_elated_get_font_weight_array()
       ));
		
		//Initial Accordion Color Styles
		
		kendall_elated_add_admin_section_title(array(
           'name' => 'accordion_color_section_title',
           'title' =>esc_html( 'Basic Accordions Color Styles','kendall'),
           'parent' => $panel
       ));
		
		$accordions_color_group = kendall_elated_add_admin_group(array(
           'name' => 'accordions_color_group',
           'title' => esc_html('Accordion Color Styles','kendall'),
			'description' =>esc_html( 'Set color styles for accordion title','kendall'),
           'parent' => $panel
       ));
		$accordions_color_row = kendall_elated_add_admin_row(array(
           'name' => 'accordions_color_row',
           'next' => true,
           'parent' => $accordions_color_group
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color',
           'default_value' => '',
           'label'         => esc_html('Title Color','kendall')
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color',
           'default_value' => '',
           'label'         => esc_html('Icon Color','kendall'),
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color',
           'default_value' => '',
           'label'         => esc_html('Icon Background Color','kendall'),
       ));
		
		$active_accordions_color_group = kendall_elated_add_admin_group(array(
           'name' => 'active_accordions_color_group',
           'title' => esc_html('Active and Hover Accordion Color Styles','kendall'),
			'description' =>esc_html( 'Set color styles for active and hover accordions','kendall'),
           'parent' => $panel
       ));
		$active_accordions_color_row = kendall_elated_add_admin_row(array(
           'name' => 'active_accordions_color_row',
           'next' => true,
           'parent' => $active_accordions_color_group
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_title_color_active',
           'default_value' => '',
           'label'         => esc_html('Title Color','kendall'),
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_color_active',
           'default_value' => '',
           'label'         => esc_html('Icon Color','kendall'),
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $active_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'accordions_icon_back_color_active',
           'default_value' => '',
           'label'         => esc_html('Icon Background Color','kendall')
       ));
		
		//Boxed Accordion Color Styles
		
		kendall_elated_add_admin_section_title(array(
           'name' => 'boxed_accordion_color_section_title',
           'title' => esc_html('Boxed Accordion Title Color Styles','kendall'),
           'parent' => $panel
       ));
		$boxed_accordions_color_group = kendall_elated_add_admin_group(array(
           'name' => 'boxed_accordions_color_group',
           'title' =>esc_html( 'Boxed Accordion Title Color Styles','kendall'),
			'description' => esc_html('Set color styles for boxed accordion title','kendall'),
           'parent' => $panel
       ));
		$boxed_accordions_color_row = kendall_elated_add_admin_row(array(
           'name' => 'boxed_accordions_color_row',
           'next' => true,
           'parent' => $boxed_accordions_color_group
       ));

       kendall_elated_add_admin_field(array(
           'parent'        => $boxed_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'boxed_accordions_color',
           'default_value' => '',
           'label'         =>esc_html( 'Color','kendall'),
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $boxed_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'boxed_accordions_back_color',
           'default_value' => '',
           'label'         => esc_html('Background Color','kendall'),
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $boxed_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'boxed_accordions_border_color',
           'default_value' => '',
           'label'         =>esc_html( 'Border Color','kendall'),
       ));
		
		//Active Boxed Accordion Color Styles
		
      $active_boxed_accordions_color_group = kendall_elated_add_admin_group(array(
           'name' => 'active_boxed_accordions_color_group',
           'title' => esc_html('Active and Hover Title Color Styles','kendall'),
			'description' => esc_html('Set color styles for active and hover accordions','kendall'),
           'parent' => $panel
       ));
		$active_boxed_accordions_color_row = kendall_elated_add_admin_row(array(
           'name' => 'active_boxed_accordions_color_row',
           'next' => true,
           'parent' => $active_boxed_accordions_color_group
       ));

       kendall_elated_add_admin_field(array(
           'parent'        => $active_boxed_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'boxed_accordions_color_active',
           'default_value' => '',
           'label'         => esc_html('Color','kendall')
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $active_boxed_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'boxed_accordions_back_color_active',
           'default_value' => '',
           'label'         =>esc_html( 'Background Color','kendall')
       ));
		kendall_elated_add_admin_field(array(
           'parent'        => $active_boxed_accordions_color_row,
           'type'          => 'colorsimple',
           'name'          => 'boxed_accordions_border_color_active',
           'default_value' => '',
           'label'         => esc_html('Border Color','kendall')
       ));
       
   }
   add_action('kendall_elated_options_elements_map', 'kendall_elated_accordions_map');
}