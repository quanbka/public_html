<?php 

if(!function_exists('kendall_elated_accordions_typography_styles')){
	function kendall_elated_accordions_typography_styles(){
		$selector = '.eltd-accordion-holder .eltd-title-holder';		
		$styles = array();
		
		$font_family = kendall_elated_options()->getOptionValue('accordions_font_family');
		if(kendall_elated_is_font_option_valid($font_family)){
			$styles['font-family'] = kendall_elated_get_font_option_val($font_family);
		}
		
		$text_transform = kendall_elated_options()->getOptionValue('accordions_text_transform');
       if(!empty($text_transform)) {
           $styles['text-transform'] = $text_transform;
       }

       $font_style = kendall_elated_options()->getOptionValue('accordions_font_style');
       if(!empty($font_style)) {
           $styles['font-style'] = $font_style;
       }

       $letter_spacing = kendall_elated_options()->getOptionValue('accordions_letter_spacing');
       if($letter_spacing !== '') {
           $styles['letter-spacing'] = kendall_elated_filter_px($letter_spacing).'px';
       }

       $font_weight = kendall_elated_options()->getOptionValue('accordions_font_weight');
       if(!empty($font_weight)) {
           $styles['font-weight'] = $font_weight;
       }

       echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_accordions_typography_styles');
}

if(!function_exists('kendall_elated_accordions_inital_title_color_styles')){
	function kendall_elated_accordions_inital_title_color_styles(){
		$selector = '.eltd-accordion-holder.eltd-initial .eltd-title-holder';
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('accordions_title_color')) {
           $styles['color'] = kendall_elated_options()->getOptionValue('accordions_title_color');
       }
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_accordions_inital_title_color_styles');
}

if(!function_exists('kendall_elated_accordions_active_title_color_styles')){
	
	function kendall_elated_accordions_active_title_color_styles(){
		$selector = array(
			'.eltd-accordion-holder.eltd-initial .eltd-title-holder.ui-state-active',
			'.eltd-accordion-holder.eltd-initial .eltd-title-holder.ui-state-hover'
		);
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('accordions_title_color_active')) {
           $styles['color'] = kendall_elated_options()->getOptionValue('accordions_title_color_active');
       }
		
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_accordions_active_title_color_styles');
}
if(!function_exists('kendall_elated_accordions_inital_icon_color_styles')){
	
	function kendall_elated_accordions_inital_icon_color_styles(){
		$selector = '.eltd-accordion-holder.eltd-initial .eltd-title-holder .eltd-accordion-mark';
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('accordions_icon_color')) {
           $styles['color'] = kendall_elated_options()->getOptionValue('accordions_icon_color');
       }
		if(kendall_elated_options()->getOptionValue('accordions_icon_back_color')) {
           $styles['background-color'] = kendall_elated_options()->getOptionValue('accordions_icon_back_color');
       }
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_accordions_inital_icon_color_styles');
}
if(!function_exists('kendall_elated_accordions_active_icon_color_styles')){
	
	function kendall_elated_accordions_active_icon_color_styles(){
		$selector = array(
			'.eltd-accordion-holder.eltd-initial .eltd-title-holder.ui-state-active  .eltd-accordion-mark',
			'.eltd-accordion-holder.eltd-initial .eltd-title-holder.ui-state-hover  .eltd-accordion-mark'
		);
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('accordions_icon_color_active')) {
           $styles['color'] = kendall_elated_options()->getOptionValue('accordions_icon_color_active');
       }
		if(kendall_elated_options()->getOptionValue('accordions_icon_back_color_active')) {
           $styles['background-color'] = kendall_elated_options()->getOptionValue('accordions_icon_back_color_active');
       }
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_accordions_active_icon_color_styles');
}

if(!function_exists('kendall_elated_boxed_accordions_inital_color_styles')){
	function kendall_elated_boxed_accordions_inital_color_styles(){
		$selector = '.eltd-accordion-holder.eltd-boxed .eltd-title-holder';
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('boxed_accordions_color')) {
           $styles['color'] = kendall_elated_options()->getOptionValue('boxed_accordions_color');
           echo kendall_elated_dynamic_css('.eltd-accordion-holder.eltd-boxed .eltd-title-holder .eltd-accordion-mark', array('color' => kendall_elated_options()->getOptionValue('boxed_accordions_color')));
       }
		if(kendall_elated_options()->getOptionValue('boxed_accordions_back_color')) {
           $styles['background-color'] = kendall_elated_options()->getOptionValue('boxed_accordions_back_color');
       }
		if(kendall_elated_options()->getOptionValue('boxed_accordions_border_color')) {
           $styles['border-color'] = kendall_elated_options()->getOptionValue('boxed_accordions_border_color');
       }
		
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_boxed_accordions_inital_color_styles');
}
if(!function_exists('kendall_elated_boxed_accordions_active_color_styles')){

	function kendall_elated_boxed_accordions_active_color_styles(){
		$selector = array(
			'.eltd-accordion-holder.eltd-boxed.ui-accordion .eltd-title-holder.ui-state-active',
			'.eltd-accordion-holder.eltd-boxed.ui-accordion .eltd-title-holder.ui-state-hover'
		);
		$selector_icons = array(
			'.eltd-accordion-holder.eltd-boxed .eltd-title-holder.ui-state-active .eltd-accordion-mark',
			'.eltd-accordion-holder.eltd-boxed .eltd-title-holder.ui-state-hover .eltd-accordion-mark'
		);
		$styles = array();
		
		if(kendall_elated_options()->getOptionValue('boxed_accordions_color_active')) {
           $styles['color'] = kendall_elated_options()->getOptionValue('boxed_accordions_color_active');
           echo kendall_elated_dynamic_css($selector_icons, array('color' => kendall_elated_options()->getOptionValue('boxed_accordions_color_active')));
       }
		if(kendall_elated_options()->getOptionValue('boxed_accordions_back_color_active')) {
           $styles['background-color'] = kendall_elated_options()->getOptionValue('boxed_accordions_back_color_active');
       }
		if(kendall_elated_options()->getOptionValue('boxed_accordions_border_color_active')) {
           $styles['border-color'] = kendall_elated_options()->getOptionValue('boxed_accordions_border_color_active');
       }
		
		echo kendall_elated_dynamic_css($selector, $styles);
	}
	add_action('kendall_elated_style_dynamic', 'kendall_elated_boxed_accordions_active_color_styles');
}