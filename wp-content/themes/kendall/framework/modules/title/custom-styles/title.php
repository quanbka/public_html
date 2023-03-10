<?php

if (!function_exists('kendall_elated_title_area_typography_style')) {

    function kendall_elated_title_area_typography_style(){

        $title_styles = array();

        if(kendall_elated_options()->getOptionValue('page_title_color') !== '') {
            $title_styles['color'] = kendall_elated_options()->getOptionValue('page_title_color');
        }
        if(kendall_elated_options()->getOptionValue('page_title_google_fonts') !== '-1') {
            $title_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('page_title_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('page_title_fontsize') !== '') {
            $title_styles['font-size'] = kendall_elated_options()->getOptionValue('page_title_fontsize').'px';
        }
        if(kendall_elated_options()->getOptionValue('page_title_lineheight') !== '') {
            $title_styles['line-height'] = kendall_elated_options()->getOptionValue('page_title_lineheight').'px';
        }
        if(kendall_elated_options()->getOptionValue('page_title_texttransform') !== '') {
            $title_styles['text-transform'] = kendall_elated_options()->getOptionValue('page_title_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('page_title_fontstyle') !== '') {
            $title_styles['font-style'] = kendall_elated_options()->getOptionValue('page_title_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('page_title_fontweight') !== '') {
            $title_styles['font-weight'] = kendall_elated_options()->getOptionValue('page_title_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('page_title_letter_spacing') !== '') {
            $title_styles['letter-spacing'] = kendall_elated_options()->getOptionValue('page_title_letter_spacing').'px';
        }

        $title_selector = array(
            '.eltd-title .eltd-title-holder h1'
        );

        echo kendall_elated_dynamic_css($title_selector, $title_styles);


        $subtitle_styles = array();

        if(kendall_elated_options()->getOptionValue('page_subtitle_color') !== '') {
            $subtitle_styles['color'] = kendall_elated_options()->getOptionValue('page_subtitle_color');
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_google_fonts') !== '-1') {
            $subtitle_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('page_subtitle_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_fontsize') !== '') {
            $subtitle_styles['font-size'] = kendall_elated_options()->getOptionValue('page_subtitle_fontsize').'px';
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_lineheight') !== '') {
            $subtitle_styles['line-height'] = kendall_elated_options()->getOptionValue('page_subtitle_lineheight').'px';
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_texttransform') !== '') {
            $subtitle_styles['text-transform'] = kendall_elated_options()->getOptionValue('page_subtitle_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_fontstyle') !== '') {
            $subtitle_styles['font-style'] = kendall_elated_options()->getOptionValue('page_subtitle_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_fontweight') !== '') {
            $subtitle_styles['font-weight'] = kendall_elated_options()->getOptionValue('page_subtitle_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('page_subtitle_letter_spacing') !== '') {
            $subtitle_styles['letter-spacing'] = kendall_elated_options()->getOptionValue('page_subtitle_letter_spacing').'px';
        }

        $subtitle_selector = array(
            '.eltd-title .eltd-title-holder .eltd-subtitle'
        );

        echo kendall_elated_dynamic_css($subtitle_selector, $subtitle_styles);


        $breadcrumb_styles = array();

        if(kendall_elated_options()->getOptionValue('page_breadcrumb_color') !== '') {
            $breadcrumb_styles['color'] = kendall_elated_options()->getOptionValue('page_breadcrumb_color');
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_google_fonts') !== '-1') {
            $breadcrumb_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('page_breadcrumb_google_fonts'));
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_fontsize') !== '') {
            $breadcrumb_styles['font-size'] = kendall_elated_options()->getOptionValue('page_breadcrumb_fontsize').'px';
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_lineheight') !== '') {
            $breadcrumb_styles['line-height'] = kendall_elated_options()->getOptionValue('page_breadcrumb_lineheight').'px';
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_texttransform') !== '') {
            $breadcrumb_styles['text-transform'] = kendall_elated_options()->getOptionValue('page_breadcrumb_texttransform');
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_fontstyle') !== '') {
            $breadcrumb_styles['font-style'] = kendall_elated_options()->getOptionValue('page_breadcrumb_fontstyle');
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_fontweight') !== '') {
            $breadcrumb_styles['font-weight'] = kendall_elated_options()->getOptionValue('page_breadcrumb_fontweight');
        }
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_letter_spacing') !== '') {
            $breadcrumb_styles['letter-spacing'] = kendall_elated_options()->getOptionValue('page_breadcrumb_letter_spacing').'px';
        }

        $breadcrumb_selector = array(
            '.eltd-title .eltd-title-holder .eltd-breadcrumbs a, .eltd-title .eltd-title-holder .eltd-breadcrumbs span'
        );

        echo kendall_elated_dynamic_css($breadcrumb_selector, $breadcrumb_styles);

        $breadcrumb_selector_styles = array();
        if(kendall_elated_options()->getOptionValue('page_breadcrumb_hovercolor') !== '') {
            $breadcrumb_selector_styles['color'] = kendall_elated_options()->getOptionValue('page_breadcrumb_hovercolor');
        }

        $breadcrumb_hover_selector = array(
            '.eltd-title .eltd-title-holder .eltd-breadcrumbs a:hover'
        );

        echo kendall_elated_dynamic_css($breadcrumb_hover_selector, $breadcrumb_selector_styles);

    }

    add_action('kendall_elated_style_dynamic', 'kendall_elated_title_area_typography_style');

}


