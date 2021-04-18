<?php

if(!function_exists('kendall_elated_boxed_class')) {
    /**
     * Function that adds classes on body for boxed layout
     */
    function kendall_elated_boxed_class($classes) {

        //is boxed layout turned on?
        $boxed = kendall_elated_get_meta_field_intersect('boxed');
        if($boxed == 'yes' && kendall_elated_get_meta_field_intersect('header_type') !== 'header-vertical') {
            $classes[] = 'eltd-boxed';
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_boxed_class');
}

if(!function_exists('kendall_elated_theme_version_class')) {
    /**
     * Function that adds classes on body for version of theme
     */
    function kendall_elated_theme_version_class($classes) {
        $current_theme = wp_get_theme();

        //is child theme activated?
        if($current_theme->parent()) {
            //add child theme version
            $classes[] = strtolower($current_theme->get('Name')).'-child-ver-'.$current_theme->get('Version');

            //get parent theme
            $current_theme = $current_theme->parent();
        }

        if($current_theme->exists() && $current_theme->get('Version') != '') {
            $classes[] = strtolower($current_theme->get('Name')).'-ver-'.$current_theme->get('Version');
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_theme_version_class');
}

if(!function_exists('kendall_elated_smooth_scroll_class')) {
    /**
     * Function that adds classes on body for smooth scroll
     */
    function kendall_elated_smooth_scroll_class($classes) {

        //is smooth scroll enabled enabled?
        if(kendall_elated_options()->getOptionValue('smooth_scroll') == 'yes') {
            $classes[] = 'eltd-smooth-scroll';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_smooth_scroll_class');
}

if(!function_exists('kendall_elated_smooth_page_transitions_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function kendall_elated_smooth_page_transitions_class($classes) {

        if(kendall_elated_options()->getOptionValue('smooth_page_transitions') == 'yes') {
            $classes[] = 'eltd-smooth-page-transitions';
        } else {
            $classes[] = '';
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_smooth_page_transitions_class');
}

if(!function_exists('kendall_elated_smooth_ajax_class')) {
    /**
     * Function that adds classes on body for smooth page transitions
     */
    function kendall_elated_smooth_ajax_class($classes) {

        if(kendall_elated_options()->getOptionValue('smooth_page_transitions') !== '') {
            $classes[] = kendall_elated_options()->getOptionValue('smooth_page_transitions') === 'yes' ? 'eltd-mimic-ajax' : '';
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_smooth_ajax_class');
}

if(!function_exists('kendall_elated_content_initial_width_body_class')) {
    /**
     * Function that adds transparent content class to body.
     *
     * @param $classes array of body classes
     *
     * @return array with transparent content body class added
     */
    function kendall_elated_content_initial_width_body_class($classes) {

        if(kendall_elated_options()->getOptionValue('initial_content_width')) {
            $classes[] = 'eltd-'.kendall_elated_options()->getOptionValue('initial_content_width');
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_content_initial_width_body_class');
}

if(!function_exists('kendall_elated_set_blog_body_class')) {
    /**
     * Function that adds blog class to body if blog template, shortcodes or widgets are used on site.
     *
     * @param $classes array of body classes
     *
     * @return array with blog body class added
     */
    function kendall_elated_set_blog_body_class($classes) {

        if(kendall_elated_load_blog_assets()) {
            $classes[] = 'eltd-blog-installed';
        }

        return $classes;
    }

    add_filter('body_class', 'kendall_elated_set_blog_body_class');
}


if(!function_exists('kendall_elated_set_portfolio_single_info_follow_body_class')) {
    /**
     * Function that adds follow portfolio info class to body if sticky sidebar is enabled on portfolio single small images or small slider
     *
     * @param $classes array of body classes
     *
     * @return array with follow portfolio info class body class added
     */

    function kendall_elated_set_portfolio_single_info_follow_body_class($classes) {

        if(is_singular('portfolio-item')){
            if(kendall_elated_options()->getOptionValue('portfolio_single_sticky_sidebar') == 'yes'){
                $classes[] = 'eltd-follow-portfolio-info';
            }
        }


        return $classes;
    }

    add_filter('body_class', 'kendall_elated_set_portfolio_single_info_follow_body_class');
}

if(!function_exists('kendall_elated_set_main_style_body_class')){
    /**
     * Function that adds main style class to body
     *
     * @param $classes array of body classes
     *
     * @return array with main style class body class added
     */
    function kendall_elated_set_main_style_body_class($classes){

        switch(kendall_elated_get_meta_field_intersect('main_style')){

            case 'style2':
                $classes[] = 'eltd-main-style2';
                break;
            case 'style3':
                $classes[] = 'eltd-main-style3';
                break;
            default:
                $classes[]= 'eltd-main-style1';

        }

        return $classes;
    }
    add_filter('body_class', 'kendall_elated_set_main_style_body_class');
}

if(!function_exists('kendall_elated_set_paspartu_body_class')){
    /**
     * Function that adds paspartu class to body
     *
     * @param $classes array of body classes
     *
     * @return array with paspartu class body class added
     */
    function kendall_elated_set_paspartu_body_class($classes){

        $paspartu_flag = kendall_elated_get_meta_field_intersect('enable_paspartu');
        if($paspartu_flag === 'yes'){

            $classes[] = 'eltd-paspartu-enabled';

        }

        return $classes;
    }
    add_filter('body_class', 'kendall_elated_set_paspartu_body_class');
}