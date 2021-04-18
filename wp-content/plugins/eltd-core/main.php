<?php
/*
Plugin Name: Elated Core - shared on wplocker.com
Description: Plugin that adds all post types needed by our theme
Author: Elated Themes
Version: 1.1
*/

require_once 'load.php';

use ElatedCore\CPT;
use ElatedCore\Lib;

add_action('after_setup_theme', array(CPT\PostTypesRegister::getInstance(), 'register'));

Lib\ShortcodeLoader::getInstance()->load();

if(!function_exists('eltd_core_activation')) {
    /**
     * Triggers when plugin is activated. It calls flush_rewrite_rules
     * and defines eltd_core_on_activate action
     */
    function eltd_core_activation() {
        do_action('eltd_core_on_activate');

        ElatedCore\CPT\PostTypesRegister::getInstance()->register();
        flush_rewrite_rules();
    }

    register_activation_hook(__FILE__, 'eltd_core_activation');
}

if(!function_exists('eltd_core_text_domain')) {
    /**
     * Loads plugin text domain so it can be used in translation
     */
    function eltd_core_text_domain() {
        load_plugin_textdomain('eltd_core', false, ELATED_CORE_REL_PATH.'/languages');
    }

    add_action('plugins_loaded', 'eltd_core_text_domain');
}

if(!function_exists('eltd_core_kendall_theme_menu')) {
    /**
     * Function that generates admin menu for options page.
     * It generates one admin page per options page.
     */
    function eltd_core_kendall_theme_menu() {
        if (eltd_core_theme_installed()) {

            global $kendall_elated_Framework;
            kendall_elated_init_theme_options();

            $page_hook_suffix = add_menu_page(
                esc_html__('Elated Options','eltd_core'),                   // The value used to populate the browser's title bar when the menu page is active
                esc_html__('Elated Options', 'eltd_core'),                  // The text of the menu in the administrator's sidebar
                'administrator',                  // What roles are able to access the menu
                'kendall_elated_theme_menu',                // The ID used to bind submenu items to this menu
                array($kendall_elated_Framework->getSkin(), 'renderOptions'), // The callback function used to render this menu
                $kendall_elated_Framework->getSkin()->getMenuIcon('options'),             // Icon For menu Item
                $kendall_elated_Framework->getSkin()->getMenuItemPosition('options')            // Position
            );

            foreach ($kendall_elated_Framework->eltdOptions->adminPages as $key=>$value ) {
                $slug = "";

                if (!empty($value->slug)) {
                    $slug = "_tab".$value->slug;
                }

                $subpage_hook_suffix = add_submenu_page(
                    'kendall_elated_theme_menu',
                    esc_html__('Elated Options - ','eltd_core').$value->title,   // The value used to populate the browser's title bar when the menu page is active
                    $value->title,                   // The text of the menu in the administrator's sidebar
                    'administrator',                  // What roles are able to access the menu
                    'kendall_elated_theme_menu'.$slug,                // The ID used to bind submenu items to this menu
                    array($kendall_elated_Framework->getSkin(), 'renderOptions')
                );

                add_action('admin_print_scripts-'.$subpage_hook_suffix, 'kendall_elated_enqueue_admin_scripts');
                add_action('admin_print_styles-'.$subpage_hook_suffix, 'kendall_elated_enqueue_admin_styles');
            };

            add_action('admin_print_scripts-'.$page_hook_suffix, 'kendall_elated_enqueue_admin_scripts');
            add_action('admin_print_styles-'.$page_hook_suffix, 'kendall_elated_enqueue_admin_styles');

        }
    }

    add_action( 'admin_menu', 'eltd_core_kendall_theme_menu');
}


if(!function_exists('eltd_core_kendall_theme_setup')) {

    function eltd_core_kendall_theme_setup() {
        add_filter('widget_text', 'do_shortcode');
    }

    add_action('after_setup_theme', 'eltd_core_kendall_theme_setup');
}