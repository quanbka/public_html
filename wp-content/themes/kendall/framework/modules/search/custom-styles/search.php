<?php

if (!function_exists('kendall_elated_search_covers_header_style')) {

	function kendall_elated_search_covers_header_style()
	{

		if (kendall_elated_options()->getOptionValue('search_height') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-header-bottom.eltd-animated .eltd-form-holder-outer, .eltd-search-slide-header-bottom .eltd-form-holder-outer, .eltd-search-slide-header-bottom', array(
				'height' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_height')) . 'px'
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_covers_header_style');

}

if (!function_exists('kendall_elated_search_opener_icon_size')) {

	function kendall_elated_search_opener_icon_size()
	{

		if (kendall_elated_options()->getOptionValue('header_search_icon_size')) {
			echo kendall_elated_dynamic_css('.eltd-search-opener', array(
				'font-size' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('header_search_icon_size')) . 'px'
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_opener_icon_size');

}

if (!function_exists('kendall_elated_search_opener_icon_colors')) {

	function kendall_elated_search_opener_icon_colors()
	{

		if (kendall_elated_options()->getOptionValue('header_search_icon_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-opener', array(
				'color' => kendall_elated_options()->getOptionValue('header_search_icon_color')
			));
		}

		if (kendall_elated_options()->getOptionValue('header_search_icon_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-opener:hover', array(
				'color' => kendall_elated_options()->getOptionValue('header_search_icon_hover_color')
			));
		}

		if (kendall_elated_options()->getOptionValue('header_light_search_icon_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-light-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-search-opener,
			.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-search-opener,
			.eltd-light-header .eltd-top-bar .eltd-search-opener', array(
				'color' => kendall_elated_options()->getOptionValue('header_light_search_icon_color') . ' !important'
			));
		}

		if (kendall_elated_options()->getOptionValue('header_light_search_icon_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-light-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-search-opener:hover,
			.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-search-opener:hover,
			.eltd-light-header .eltd-top-bar .eltd-search-opener:hover', array(
				'color' => kendall_elated_options()->getOptionValue('header_light_search_icon_hover_color') . ' !important'
			));
		}

		if (kendall_elated_options()->getOptionValue('header_dark_search_icon_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-dark-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-search-opener,
			.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-search-opener,
			.eltd-dark-header .eltd-top-bar .eltd-search-opener', array(
				'color' => kendall_elated_options()->getOptionValue('header_dark_search_icon_color') . ' !important'
			));
		}
		if (kendall_elated_options()->getOptionValue('header_dark_search_icon_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-dark-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-search-opener:hover,
			.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-search-opener:hover,
			.eltd-dark-header .eltd-top-bar .eltd-search-opener:hover', array(
				'color' => kendall_elated_options()->getOptionValue('header_dark_search_icon_hover_color') . ' !important'
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_opener_icon_colors');

}

if (!function_exists('kendall_elated_search_opener_icon_background_colors')) {

	function kendall_elated_search_opener_icon_background_colors()
	{

		if (kendall_elated_options()->getOptionValue('search_icon_background_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-opener', array(
				'background-color' => kendall_elated_options()->getOptionValue('search_icon_background_color')
			));
		}

		if (kendall_elated_options()->getOptionValue('search_icon_background_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-opener:hover', array(
				'background-color' => kendall_elated_options()->getOptionValue('search_icon_background_hover_color')
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_opener_icon_background_colors');
}

if (!function_exists('kendall_elated_search_opener_text_styles')) {

	function kendall_elated_search_opener_text_styles()
	{
		$text_styles = array();

		if (kendall_elated_options()->getOptionValue('search_icon_text_color') !== '') {
			$text_styles['color'] = kendall_elated_options()->getOptionValue('search_icon_text_color');
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_fontsize') !== '') {
			$text_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_icon_text_fontsize')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_lineheight') !== '') {
			$text_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_icon_text_lineheight')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_texttransform') !== '') {
			$text_styles['text-transform'] = kendall_elated_options()->getOptionValue('search_icon_text_texttransform');
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('search_icon_text_google_fonts')) . ', sans-serif';
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_fontstyle') !== '') {
			$text_styles['font-style'] = kendall_elated_options()->getOptionValue('search_icon_text_fontstyle');
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_fontweight') !== '') {
			$text_styles['font-weight'] = kendall_elated_options()->getOptionValue('search_icon_text_fontweight');
		}

		if (!empty($text_styles)) {
			echo kendall_elated_dynamic_css('.eltd-search-icon-text', $text_styles);
		}
		if (kendall_elated_options()->getOptionValue('search_icon_text_color_hover') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-opener:hover .eltd-search-icon-text', array(
				'color' => kendall_elated_options()->getOptionValue('search_icon_text_color_hover')
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_opener_text_styles');
}

if (!function_exists('kendall_elated_search_opener_spacing')) {

	function kendall_elated_search_opener_spacing()
	{
		$spacing_styles = array();

		if (kendall_elated_options()->getOptionValue('search_padding_left') !== '') {
			$spacing_styles['padding-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_padding_left')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_padding_right') !== '') {
			$spacing_styles['padding-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_padding_right')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_margin_left') !== '') {
			$spacing_styles['margin-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_margin_left')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_margin_right') !== '') {
			$spacing_styles['margin-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_margin_right')) . 'px';
		}

		if (!empty($spacing_styles)) {
			echo kendall_elated_dynamic_css('.eltd-search-opener', $spacing_styles);
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_opener_spacing');
}

if (!function_exists('kendall_elated_search_bar_background')) {

	function kendall_elated_search_bar_background()
	{

		if (kendall_elated_options()->getOptionValue('search_background_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-header-bottom, .eltd-search-cover, .eltd-search-fade .eltd-fullscreen-search-holder .eltd-fullscreen-search-table, .eltd-fullscreen-search-overlay, .eltd-search-slide-window-top, .eltd-search-slide-window-top input[type="text"]', array(
				'background-color' => kendall_elated_options()->getOptionValue('search_background_color')
			));
		}
	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_bar_background');
}

if (!function_exists('kendall_elated_search_text_styles')) {

	function kendall_elated_search_text_styles()
	{
		$text_styles = array();

		if (kendall_elated_options()->getOptionValue('search_text_color') !== '') {
			$text_styles['color'] = kendall_elated_options()->getOptionValue('search_text_color');
		}
		if (kendall_elated_options()->getOptionValue('search_text_fontsize') !== '') {
			$text_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_text_fontsize')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_text_texttransform') !== '') {
			$text_styles['text-transform'] = kendall_elated_options()->getOptionValue('search_text_texttransform');
		}
		if (kendall_elated_options()->getOptionValue('search_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('search_text_google_fonts')) . ', sans-serif';
		}
		if (kendall_elated_options()->getOptionValue('search_text_fontstyle') !== '') {
			$text_styles['font-style'] = kendall_elated_options()->getOptionValue('search_text_fontstyle');
		}
		if (kendall_elated_options()->getOptionValue('search_text_fontweight') !== '') {
			$text_styles['font-weight'] = kendall_elated_options()->getOptionValue('search_text_fontweight');
		}
		if (kendall_elated_options()->getOptionValue('search_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo kendall_elated_dynamic_css('.eltd-search-slide-header-bottom input[type="text"], .eltd-search-cover input[type="text"], .eltd-fullscreen-search-holder .eltd-search-field, .eltd-search-slide-window-top input[type="text"]', $text_styles);
		}
		if (kendall_elated_options()->getOptionValue('search_text_disabled_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-header-bottom.eltd-disabled input[type="text"]::-webkit-input-placeholder, .eltd-search-slide-header-bottom.eltd-disabled input[type="text"]::-moz-input-placeholder', array(
				'color' => kendall_elated_options()->getOptionValue('search_text_disabled_color')
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_text_styles');
}

if (!function_exists('kendall_elated_search_label_styles')) {

	function kendall_elated_search_label_styles()
	{
		$text_styles = array();

		if (kendall_elated_options()->getOptionValue('search_label_text_color') !== '') {
			$text_styles['color'] = kendall_elated_options()->getOptionValue('search_label_text_color');
		}
		if (kendall_elated_options()->getOptionValue('search_label_text_fontsize') !== '') {
			$text_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_label_text_fontsize')) . 'px';
		}
		if (kendall_elated_options()->getOptionValue('search_label_text_texttransform') !== '') {
			$text_styles['text-transform'] = kendall_elated_options()->getOptionValue('search_label_text_texttransform');
		}
		if (kendall_elated_options()->getOptionValue('search_label_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('search_label_text_google_fonts')) . ', sans-serif';
		}
		if (kendall_elated_options()->getOptionValue('search_label_text_fontstyle') !== '') {
			$text_styles['font-style'] = kendall_elated_options()->getOptionValue('search_label_text_fontstyle');
		}
		if (kendall_elated_options()->getOptionValue('search_label_text_fontweight') !== '') {
			$text_styles['font-weight'] = kendall_elated_options()->getOptionValue('search_label_text_fontweight');
		}
		if (kendall_elated_options()->getOptionValue('search_label_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_label_text_letterspacing')) . 'px';
		}

		if (!empty($text_styles)) {
			echo kendall_elated_dynamic_css('.eltd-fullscreen-search-holder .eltd-search-label', $text_styles);
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_label_styles');
}

if (!function_exists('kendall_elated_search_icon_styles')) {

	function kendall_elated_search_icon_styles()
	{

		if (kendall_elated_options()->getOptionValue('search_icon_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-window-top > i, .eltd-search-slide-header-bottom .eltd-search-submit i, .eltd-fullscreen-search-holder .eltd-search-submit', array(
				'color' => kendall_elated_options()->getOptionValue('search_icon_color')
			));
		}
		if (kendall_elated_options()->getOptionValue('search_icon_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-window-top > i:hover, .eltd-search-slide-header-bottom .eltd-search-submit i:hover, .eltd-fullscreen-search-holder .eltd-search-submit:hover', array(
				'color' => kendall_elated_options()->getOptionValue('search_icon_hover_color')
			));
		}
		if (kendall_elated_options()->getOptionValue('search_icon_disabled_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-header-bottom.eltd-disabled .eltd-search-submit i, .eltd-search-slide-header-bottom.eltd-disabled .eltd-search-submit i:hover', array(
				'color' => kendall_elated_options()->getOptionValue('search_icon_disabled_color')
			));
		}
		if (kendall_elated_options()->getOptionValue('search_icon_size') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-window-top > i, .eltd-search-slide-header-bottom .eltd-search-submit i, .eltd-fullscreen-search-holder .eltd-search-submit', array(
				'font-size' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_icon_size')) . 'px'
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_icon_styles');
}

if (!function_exists('kendall_elated_search_close_icon_styles')) {

	function kendall_elated_search_close_icon_styles()
	{

		if (kendall_elated_options()->getOptionValue('search_close_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-window-top .eltd-search-close i, .eltd-search-cover .eltd-search-close i, .eltd-fullscreen-search-close i', array(
				'color' => kendall_elated_options()->getOptionValue('search_close_color')
			));
		}
		if (kendall_elated_options()->getOptionValue('search_close_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-window-top .eltd-search-close i:hover, .eltd-search-cover .eltd-search-close i:hover, .eltd-fullscreen-search-close i:hover', array(
				'color' => kendall_elated_options()->getOptionValue('search_close_hover_color')
			));
		}
		if (kendall_elated_options()->getOptionValue('search_close_size') !== '') {
			echo kendall_elated_dynamic_css('.eltd-search-slide-window-top .eltd-search-close i, .eltd-search-cover .eltd-search-close i, .eltd-fullscreen-search-close i', array(
				'font-size' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('search_close_size')) . 'px'
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_search_close_icon_styles');
}

?>
