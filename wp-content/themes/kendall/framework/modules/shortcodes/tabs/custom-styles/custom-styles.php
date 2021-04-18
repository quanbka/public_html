<?php
if(!function_exists('kendall_elated_tabs_typography_styles')){
	function kendall_elated_tabs_typography_styles(){
		$selector = '.eltd-tabs .eltd-tabs-nav li a';
		$tabs_tipography_array = array();
		$font_family = kendall_elated_options()->getOptionValue('tabs_font_family');
		
		if(kendall_elated_is_font_option_valid($font_family)){
			$tabs_tipography_array['font-family'] = kendall_elated_get_font_option_val($font_family);
		}
		
		$text_transform = kendall_elated_options()->getOptionValue('tabs_text_transform');
        if(!empty($text_transform)) {
            $tabs_tipography_array['text-transform'] = $text_transform;
        }

        $font_style = kendall_elated_options()->getOptionValue('tabs_font_style');
        if(!empty($font_style)) {
            $tabs_tipography_array['font-style'] = $font_style;
        }

        $letter_spacing = kendall_elated_options()->getOptionValue('tabs_letter_spacing');
        if($letter_spacing !== '') {
            $tabs_tipography_array['letter-spacing'] = kendall_elated_filter_px($letter_spacing).'px';
        }

        $font_weight = kendall_elated_options()->getOptionValue('tabs_font_weight');
        if(!empty($font_weight)) {
            $tabs_tipography_array['font-weight'] = $font_weight;
        }

        echo kendall_elated_dynamic_css($selector, $tabs_tipography_array);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_tabs_typography_styles');
}

if(!function_exists('kendall_elated_tabs_inital_color_styles')){
	function kendall_elated_tabs_inital_color_styles(){
		$selector = '.eltd-tabs .eltd-tabs-nav li a';
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('tabs_color')) {
            $styles['color'] = kendall_elated_options()->getOptionValue('tabs_color');
        }
		if(kendall_elated_options()->getOptionValue('tabs_back_color')) {
            $styles['background-color'] = kendall_elated_options()->getOptionValue('tabs_back_color');
        }
		if(kendall_elated_options()->getOptionValue('tabs_border_color')) {
            $styles['border-color'] = kendall_elated_options()->getOptionValue('tabs_border_color');
        }
		
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_tabs_inital_color_styles');
}
if(!function_exists('kendall_elated_tabs_active_color_styles')){
	function kendall_elated_tabs_active_color_styles(){
		$selector = '.eltd-tabs .eltd-tabs-nav li.ui-state-active a, .eltd-tabs .eltd-tabs-nav li.ui-state-hover a';
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('tabs_color_active')) {
            $styles['color'] = kendall_elated_options()->getOptionValue('tabs_color_active');
        }
		if(kendall_elated_options()->getOptionValue('tabs_back_color_active')) {
            $styles['background-color'] = kendall_elated_options()->getOptionValue('tabs_back_color_active');
        }
		if(kendall_elated_options()->getOptionValue('tabs_border_color_active')) {
            $styles['border-color'] = kendall_elated_options()->getOptionValue('tabs_border_color_active');
        }
		
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_tabs_active_color_styles');
}