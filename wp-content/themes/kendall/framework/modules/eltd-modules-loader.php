<?php

if(!function_exists('kendall_elated_load_modules')) {
    /**
     * Loades all modules by going through all folders that are placed directly in modules folder
     * and loads load.php file in each. Hooks to kendall_elated_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function kendall_elated_load_modules() {
        foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/modules/*/load.php') as $module_load) {
            include_once $module_load;
        }
    }

    add_action('kendall_elated_before_options_map', 'kendall_elated_load_modules');
}

if(!function_exists('kendall_elated_load_shortcode_interface')) {

    function kendall_elated_load_shortcode_interface() {

        include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/shortcodes/lib/shortcode-interface.php';

    }

    add_action('kendall_elated_before_options_map', 'kendall_elated_load_shortcode_interface');

}

if(!function_exists('kendall_elated_load_shortcodes')) {
    /**
     * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
     * and loads load.php file in each. Hooks to kendall_elated_after_options_map action
     *
     * @see http://php.net/manual/en/function.glob.php
     */
    function kendall_elated_load_shortcodes() {
        foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/modules/shortcodes/*/load.php') as $shortcode_load) {
            include_once $shortcode_load;
        }

        do_action('kendall_elated_shortcode_loader');
    }

    add_action('kendall_elated_before_options_map', 'kendall_elated_load_shortcodes');
}

if(!function_exists('kendall_elated_load_widget_class')) {
	 /**
     * Loades widget class file. 
     *
     */
	function kendall_elated_load_widget_class(){
		include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/widgets/lib/widget-class.php';
	} 
	
	add_action('kendall_elated_before_options_map', 'kendall_elated_load_widget_class');
}

if(!function_exists('kendall_elated_load_widgets')) {
    /**
     * Loades all widgets by going through all folders that are placed directly in widgets folder
     * and loads load.php file in each. Hooks to kendall_elated_after_options_map action
     */
    function kendall_elated_load_widgets() {
		
        foreach(glob(ELATED_FRAMEWORK_ROOT_DIR.'/modules/widgets/*/load.php') as $widget_load) {
            include_once $widget_load;
        }

        include_once ELATED_FRAMEWORK_MODULES_ROOT_DIR.'/widgets/lib/widget-loader.php';
    }

    add_action('kendall_elated_before_options_map', 'kendall_elated_load_widgets');
}