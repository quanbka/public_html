<?php

if(!function_exists('kendall_elated_button_typography_styles')) {
    /**
     * Typography styles for all button types
     */
    function kendall_elated_button_typography_styles() {
        $selector = '.eltd-btn';
        $styles = array();

        $font_family = kendall_elated_options()->getOptionValue('button_font_family');
        if(kendall_elated_is_font_option_valid($font_family)) {
            $styles['font-family'] = kendall_elated_get_font_option_val($font_family);
        }

        $text_transform = kendall_elated_options()->getOptionValue('button_text_transform');
        if(!empty($text_transform)) {
            $styles['text-transform'] = $text_transform;
        }

        $font_style = kendall_elated_options()->getOptionValue('button_font_style');
        if(!empty($font_style)) {
            $styles['font-style'] = $font_style;
        }

        $letter_spacing = kendall_elated_options()->getOptionValue('button_letter_spacing');
        if($letter_spacing !== '') {
            $styles['letter-spacing'] = kendall_elated_filter_px($letter_spacing).'px';
        }

        $font_weight = kendall_elated_options()->getOptionValue('button_font_weight');
        if(!empty($font_weight)) {
            $styles['font-weight'] = $font_weight;
        }

        echo kendall_elated_dynamic_css($selector, $styles);
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_button_typography_styles');
}

if(!function_exists('kendall_elated_button_outline_styles')) {
    /**
     * Generate styles for outline button
     */
    function kendall_elated_button_outline_styles() {
        //outline styles
        $outline_styles   = array();
        $outline_selector = '.eltd-btn.eltd-btn-outline';

        if(kendall_elated_options()->getOptionValue('btn_outline_text_color')) {
            $outline_styles['color'] = kendall_elated_options()->getOptionValue('btn_outline_text_color');
        }

        if(kendall_elated_options()->getOptionValue('btn_outline_border_color')) {
            $outline_styles['border-color'] = kendall_elated_options()->getOptionValue('btn_outline_border_color');
        }

        echo kendall_elated_dynamic_css($outline_selector, $outline_styles);

        //outline hover styles
        if(kendall_elated_options()->getOptionValue('btn_outline_hover_text_color')) {
            echo kendall_elated_dynamic_css(
                '.eltd-btn.eltd-btn-outline:not(.eltd-btn-custom-hover-color):hover',
                array('color' => kendall_elated_options()->getOptionValue('btn_outline_hover_text_color').'!important')
            );
        }

        if(kendall_elated_options()->getOptionValue('btn_outline_hover_bg_color')) {
            echo kendall_elated_dynamic_css(
                '.eltd-btn.eltd-btn-outline:not(.eltd-btn-custom-hover-bg):hover',
                array('background-color' => kendall_elated_options()->getOptionValue('btn_outline_hover_bg_color').'!important')
            );
        }

        if(kendall_elated_options()->getOptionValue('btn_outline_hover_border_color')) {
            echo kendall_elated_dynamic_css(
                '.eltd-btn.eltd-btn-outline:not(.eltd-btn-custom-border-hover):hover',
                array('border-color' => kendall_elated_options()->getOptionValue('btn_outline_hover_border_color').'!important')
            );
        }
    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_button_outline_styles');
}

if(!function_exists('kendall_elated_button_solid_styles')) {
    /**
     * Generate styles for solid type buttons
     */
    function kendall_elated_button_solid_styles() {
        //solid styles
        $solid_selector = '.eltd-btn.eltd-btn-solid';
        $solid_styles = array();

        if(kendall_elated_options()->getOptionValue('btn_solid_text_color')) {
            $solid_styles['color'] = kendall_elated_options()->getOptionValue('btn_solid_text_color');
        }

        if(kendall_elated_options()->getOptionValue('btn_solid_border_color')) {
            $solid_styles['border-color'] = kendall_elated_options()->getOptionValue('btn_solid_border_color');
        }

        if(kendall_elated_options()->getOptionValue('btn_solid_start_bg_color') && kendall_elated_options()->getOptionValue('btn_solid_end_bg_color')) {

          $solid_styles['background'] ='linear-gradient(to right,'.kendall_elated_options()->getOptionValue('btn_solid_start_bg_color').' 0,'.kendall_elated_options()->getOptionValue('btn_solid_end_bg_color').' 50%,'.kendall_elated_options()->getOptionValue('btn_solid_start_bg_color').' 100%)';
            $solid_styles['background-size']='200% 200%';
        }

        echo kendall_elated_dynamic_css($solid_selector, $solid_styles);

        //solid hover styles
        if(kendall_elated_options()->getOptionValue('btn_solid_hover_text_color')) {
            echo kendall_elated_dynamic_css(
                '.eltd-btn.eltd-btn-solid:not(.eltd-btn-custom-hover-color):hover',
                array('color' => kendall_elated_options()->getOptionValue('btn_solid_hover_text_color').'!important')
            );
        }

        if(kendall_elated_options()->getOptionValue('btn_solid_hover_bg_color') ) {
            echo kendall_elated_dynamic_css(
                '.eltd-btn.eltd-btn-solid:not(.eltd-btn-gradient_hover):hover',
                array('background' => kendall_elated_options()->getOptionValue('btn_solid_hover_bg_color'))
            );
        }

    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_button_solid_styles');
}