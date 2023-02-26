<?php

if(!function_exists('kendall_elated_register_sidebars')) {
    /**
     * Function that registers theme's sidebars
     */
    function kendall_elated_register_sidebars() {

        register_sidebar(array(
            'name' => esc_html__('Sidebar', 'kendall'),
            'id' => 'sidebar',
            'description' => esc_html__('Default Sidebar', 'kendall'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="eltd-widget-title">',
            'after_title' => '</h3>'
        ));

    }

    add_action('widgets_init', 'kendall_elated_register_sidebars');
}

if(!function_exists('kendall_elated_add_support_custom_sidebar')) {
    /**
     * Function that adds theme support for custom sidebars. It also creates KendallElatedSidebar object
     */
    function kendall_elated_add_support_custom_sidebar() {
        add_theme_support('KendallElatedSidebar');
        if (get_theme_support('KendallElatedSidebar')) new KendallElatedSidebar();
    }

    add_action('after_setup_theme', 'kendall_elated_add_support_custom_sidebar');
}
