<?php

if(!function_exists('kendall_elated_title_classes')) {
    /**
     * Function that adds classes to title div.
     * All other functions are tied to it with add_filter function
     * @param array $classes array of classes
     */
    function kendall_elated_title_classes($classes = array()) {
        $classes = array();
        $classes = apply_filters('kendall_elated_title_classes', $classes);

        if(is_array($classes) && count($classes)) {
            echo implode(' ', $classes);
        }
    }
}

if(!function_exists('kendall_elated_title_type_class')) {
    /**
     * Function that adds class on title based on title type option
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function kendall_elated_title_type_class($classes) {

        $class = kendall_elated_get_meta_field_intersect( 'title_area_type' );
        $classes[] = 'eltd-'.$class.'-type';

        return $classes;

    }

    add_filter('kendall_elated_title_classes', 'kendall_elated_title_type_class');
}

if(!function_exists('kendall_elated_title_background_image_classes')) {
    function kendall_elated_title_background_image_classes($classes) {
        //init variables
        $id                         = kendall_elated_get_page_id();
        $is_image_parallax_array    = array('yes', 'yes_zoom');
        $show_title_img			    = true;

        //is responsive image is set for current page?
        $is_img_responsive = kendall_elated_get_meta_field_intersect( 'title_area_background_image_responsive' );

        //is title image chosen for current page?
        $title_img = kendall_elated_get_meta_field_intersect( 'title_area_background_image' );

        //is image set to be fixed for current page?
        $is_image_parallax = kendall_elated_get_meta_field_intersect( 'title_area_background_image_parallax' );

        //is title image hidden for current page?
        if(get_post_meta($id, "eltd_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set and visible?
        if($title_img !== '' && $show_title_img == true) {
            //is image not responsive and parallax title is set?
            $classes[] = 'eltd-preload-background';
            $classes[] = 'eltd-has-background';

            if($is_img_responsive == 'no' && in_array($is_image_parallax, $is_image_parallax_array)) {
                $classes[] = 'eltd-has-parallax-background';

                if($is_image_parallax == 'yes_zoom') {
                    $classes[] = 'eltd-zoom-out';
                }
            }

            //is image not responsive
            elseif($is_img_responsive == 'yes'){
                $classes[] = 'eltd-has-responsive-background';
            }
        }

        return $classes;
    }

    add_filter('kendall_elated_title_classes', 'kendall_elated_title_background_image_classes');
}

if(!function_exists('kendall_elated_title_content_alignment_class')) {
    /**
     * Function that adds class on title based on title content alignmnt option
     * Could be left, centered or right
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function kendall_elated_title_content_alignment_class($classes) {

        $title_content_alignment = kendall_elated_get_meta_field_intersect( 'title_area_content_alignment' );
        $classes[] = 'eltd-content-'.$title_content_alignment.'-alignment';

        return $classes;

    }

    add_filter('kendall_elated_title_classes', 'kendall_elated_title_content_alignment_class');
}

if(!function_exists('kendall_elated_title_animation_class')) {
    /**
     * Function that adds class on title based on title animation option
     * @param $classes original array of classes
     * @return array changed array of classes
     */
    function kendall_elated_title_animation_class($classes) {

        $title_animation = kendall_elated_get_meta_field_intersect( 'title_area_animation' );
        $classes[] = 'eltd-animation-'.$title_animation;

        return $classes;

    }

    add_filter('kendall_elated_title_classes', 'kendall_elated_title_animation_class');
}

if(!function_exists('kendall_elated_title_background_image_div_classes')) {
    function kendall_elated_title_background_image_div_classes($classes) {

        //init variables
        $id                         = kendall_elated_get_page_id();
        $show_title_img			    = true;

        //is responsive image is set for current page?
        $is_img_responsive = kendall_elated_get_meta_field_intersect( 'title_area_background_image_responsive' );

        //is title image chosen for current page?
        $title_img = kendall_elated_get_meta_field_intersect( 'title_area_background_image' );

        //is title image hidden for current page?
        if(get_post_meta($id, "eltd_hide_background_image_meta", true) == "yes") {
            $show_title_img = false;
        }

        //is title image set, visible and responsive?
        if($title_img !== '' && $show_title_img == true) {

            //is image responsive?
            if($is_img_responsive == 'yes') {
                $classes[] = 'eltd-title-image-responsive';
            }
            //is image not responsive?
            elseif($is_img_responsive == 'no') {
                $classes[] = 'eltd-title-image-not-responsive';
            }
        }

        return $classes;
    }

    add_filter('kendall_elated_title_classes', 'kendall_elated_title_background_image_div_classes');
}