<?php

if ( ! function_exists('kendall_elated_page_options_map') ) {

    function kendall_elated_page_options_map() {

        kendall_elated_add_admin_page(
            array(
                'slug'  => '_page_page',
                'title' => esc_html__('Page', 'kendall'),
                'icon'  => 'fa fa-institution'
            )
        );

        $custom_sidebars = kendall_elated_get_custom_sidebars();

        $panel_sidebar = kendall_elated_add_admin_panel(
            array(
                'page'  => '_page_page',
                'name'  => 'panel_sidebar',
                'title' => esc_html__('Design Style', 'kendall'),
            )
        );

        kendall_elated_add_admin_field(array(
            'name'        => 'page_sidebar_layout',
            'type'        => 'select',
            'label'       => esc_html__('Sidebar Layout', 'kendall'),
            'description' => esc_html__('Choose a sidebar layout for pages', 'kendall'),
            'default_value' => 'default',
            'parent'      => $panel_sidebar,
            'options'     => array(
                'default'			=> esc_html__('No Sidebar', 'kendall'),
                'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'kendall'),
                'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'kendall'),
                'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'kendall'),
                'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'kendall'),
            )
        ));


        if(count($custom_sidebars) > 0) {
            kendall_elated_add_admin_field(array(
                'name' => 'page_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'kendall'),
                'description' => esc_html__('Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'kendall'),
                'parent' => $panel_sidebar,
                'options' => $custom_sidebars
            ));
        }

        kendall_elated_add_admin_field(array(
            'name'        => 'page_show_comments',
            'type'        => 'yesno',
            'label'       => esc_html__('Show Comments', 'kendall'),
            'description' => esc_html__('Enabling this option will show comments on your page', 'kendall'),
            'default_value' => 'yes',
            'parent'      => $panel_sidebar
        ));

    }

    add_action( 'kendall_elated_options_map', 'kendall_elated_page_options_map', 9);

}