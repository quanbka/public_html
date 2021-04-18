<?php

if (!function_exists('kendall_elated_fullscreen_menu_general_styles')) {

	function kendall_elated_fullscreen_menu_general_styles()
	{
		$fullscreen_menu_background_color = '';
		if (kendall_elated_options()->getOptionValue('fullscreen_alignment') !== '') {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu ul li, .eltd-fullscreen-above-menu-widget-holder, .eltd-fullscreen-below-menu-widget-holder', array(
				'text-align' => kendall_elated_options()->getOptionValue('fullscreen_alignment')
			));
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_background_color') !== '') {
			$fullscreen_menu_background_color = kendall_elated_hex2rgb(kendall_elated_options()->getOptionValue('fullscreen_menu_background_color'));
			if (kendall_elated_options()->getOptionValue('fullscreen_menu_background_transparency') !== '') {
				$fullscreen_menu_background_transparency = kendall_elated_options()->getOptionValue('fullscreen_menu_background_transparency');
			} else {
				$fullscreen_menu_background_transparency = 0.9;
			}
		}

		if ($fullscreen_menu_background_color !== '') {
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-holder', array(
				'background-color' => 'rgba(' . $fullscreen_menu_background_color[0] . ',' . $fullscreen_menu_background_color[1] . ',' . $fullscreen_menu_background_color[2] . ',' . $fullscreen_menu_background_transparency . ')'
			));
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_background_image') !== '') {
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-holder', array(
				'background-image' => 'url(' . kendall_elated_options()->getOptionValue('fullscreen_menu_background_image') . ')',
				'background-position' => 'center 0',
				'background-repeat' => 'no-repeat'
			));
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_pattern_image') !== '') {
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-holder', array(
				'background-image' => 'url(' . kendall_elated_options()->getOptionValue('fullscreen_menu_pattern_image') . ')',
				'background-repeat' => 'repeat',
				'background-position' => '0 0'
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_fullscreen_menu_general_styles');

}

if (!function_exists('kendall_elated_fullscreen_menu_first_level_style')) {

	function kendall_elated_fullscreen_menu_first_level_style()
	{

		$first_menu_style = array();

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_color') !== '') {
			$first_menu_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_color');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_google_fonts') !== '-1') {
			$first_menu_style['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('fullscreen_menu_google_fonts')) . ',sans-serif';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontsize') !== '') {
			$first_menu_style['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_fontsize')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_lineheight') !== '') {
			$first_menu_style['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_lineheight')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontstyle') !== '') {
			$first_menu_style['font-style'] = kendall_elated_options()->getOptionValue('fullscreen_menu_fontstyle');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontweight') !== '') {
			$first_menu_style['font-weight'] = kendall_elated_options()->getOptionValue('fullscreen_menu_fontweight');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_letterspacing') !== '') {
			$first_menu_style['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_letterspacing')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_texttransform') !== '') {
			$first_menu_style['text-transform'] = kendall_elated_options()->getOptionValue('fullscreen_menu_texttransform');
		}

		if (!empty($first_menu_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu > ul > li > a, nav.eltd-fullscreen-menu > ul > li > h6', $first_menu_style);
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener.opened .eltd-line:after, .eltd-fullscreen-menu-opener.opened .eltd-line:before', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_color')
			));
		}

		$first_menu_hover_style = array();

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_hover_color') !== '') {
			$first_menu_hover_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_hover_color');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_hover_background_color') !== '') {
			$first_menu_hover_style['background-color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_hover_background_color');
		}

		if (!empty($first_menu_hover_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu > ul > li > a:hover, nav.eltd-fullscreen-menu > ul > li > h6:hover', $first_menu_hover_style);
		}

		$first_menu_active_style = array();

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_active_color') !== '') {
			$first_menu_active_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_active_color');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_active_background_color') !== '') {
			$first_menu_active_style['background-color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_active_background_color');
		}

		if (!empty($first_menu_active_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu > ul > li > a.current', $first_menu_active_style);
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_fullscreen_menu_first_level_style');

}

if (!function_exists('kendall_elated_fullscreen_menu_second_level_style')) {

	function kendall_elated_fullscreen_menu_second_level_style()
	{
		$second_menu_style = array();
		if (kendall_elated_options()->getOptionValue('fullscreen_menu_color_2nd') !== '') {
			$second_menu_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_color_2nd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_google_fonts_2nd') !== '-1') {
			$second_menu_style['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('fullscreen_menu_google_fonts_2nd')) . ',sans-serif';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontsize_2nd') !== '') {
			$second_menu_style['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_fontsize_2nd')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_lineheight_2nd') !== '') {
			$second_menu_style['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_lineheight_2nd')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontstyle_2nd') !== '') {
			$second_menu_style['font-style'] = kendall_elated_options()->getOptionValue('fullscreen_menu_fontstyle_2nd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontweight_2nd') !== '') {
			$second_menu_style['font-weight'] = kendall_elated_options()->getOptionValue('fullscreen_menu_fontweight_2nd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_letterspacing_2nd') !== '') {
			$second_menu_style['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_letterspacing_2nd')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_texttransform_2nd') !== '') {
			$second_menu_style['text-transform'] = kendall_elated_options()->getOptionValue('fullscreen_menu_texttransform_2nd');
		}

		if (!empty($second_menu_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu ul li ul li a, nav.eltd-fullscreen-menu ul li ul li h6', $second_menu_style);
		}

		$second_menu_hover_style = array();

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_hover_color_2nd') !== '') {
			$second_menu_hover_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_hover_color_2nd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd') !== '') {
			$second_menu_hover_style['background-color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_hover_background_color_2nd');
		}

		if (!empty($second_menu_hover_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu ul li ul li a:hover, nav.eltd-fullscreen-menu ul li ul li h6:hover', $second_menu_hover_style);
		}
	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_fullscreen_menu_second_level_style');

}

if (!function_exists('kendall_elated_fullscreen_menu_third_level_style')) {

	function kendall_elated_fullscreen_menu_third_level_style()
	{
		$third_menu_style = array();
		if (kendall_elated_options()->getOptionValue('fullscreen_menu_color_3rd') !== '') {
			$third_menu_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_color_3rd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_google_fonts_3rd') !== '-1') {
			$third_menu_style['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('fullscreen_menu_google_fonts_3rd')) . ',sans-serif';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontsize_3rd') !== '') {
			$third_menu_style['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_fontsize_3rd')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_lineheight_3rd') !== '') {
			$third_menu_style['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_lineheight_3rd')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontstyle_3rd') !== '') {
			$third_menu_style['font-style'] = kendall_elated_options()->getOptionValue('fullscreen_menu_fontstyle_3rd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_fontweight_3rd') !== '') {
			$third_menu_style['font-weight'] = kendall_elated_options()->getOptionValue('fullscreen_menu_fontweight_3rd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_letterspacing_3rd') !== '') {
			$third_menu_style['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_letterspacing_3rd')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_texttransform_3rd') !== '') {
			$third_menu_style['text-transform'] = kendall_elated_options()->getOptionValue('fullscreen_menu_texttransform_3rd');
		}

		if (!empty($third_menu_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu ul li ul li ul li a', $third_menu_style);
		}

		$third_menu_hover_style = array();

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_hover_color_3rd') !== '') {
			$third_menu_hover_style['color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_hover_color_3rd');
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd') !== '') {
			$third_menu_hover_style['background-color'] = kendall_elated_options()->getOptionValue('fullscreen_menu_hover_background_color_3rd');
		}

		if (!empty($third_menu_hover_style)) {
			echo kendall_elated_dynamic_css('nav.eltd-fullscreen-menu ul li ul li ul li a:hover', $third_menu_hover_style);
		}
	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_fullscreen_menu_third_level_style');

}

if (!function_exists('kendall_elated_fullscreen_menu_icon_styles')) {

	function kendall_elated_fullscreen_menu_icon_styles()
	{

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener .eltd-line', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_icon_color')
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_hover_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener:hover .eltd-line', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_icon_hover_color')
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_light_icon_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-light-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-fullscreen-menu-opener:not(.opened) .eltd-line,
			.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-fullscreen-menu-opener:not(.opened) .eltd-line,
			.eltd-light-header .eltd-top-bar .eltd-fullscreen-menu-opener:not(.opened) .eltd-line', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_light_icon_color') . ' !important'
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-light-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-fullscreen-menu-opener:not(.opened):hover .eltd-line,
			.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-fullscreen-menu-opener:not(.opened):hover .eltd-line,
			.eltd-light-header .eltd-top-bar .eltd-fullscreen-menu-opener:not(.opened):hover .eltd-line', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_light_icon_hover_color') . ' !important'
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_dark_icon_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-dark-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-fullscreen-menu-opener:not(.opened) .eltd-line,
			.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-fullscreen-menu-opener:not(.opened) .eltd-line,
			.eltd-dark-header .eltd-top-bar .eltd-fullscreen-menu-opener:not(.opened) .eltd-line', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_dark_icon_color') . ' !important'
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-dark-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-fullscreen-menu-opener:not(.opened):hover .eltd-line,
			.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-fullscreen-menu-opener:not(.opened):hover .eltd-line,
			.eltd-dark-header .eltd-top-bar .eltd-fullscreen-menu-opener:not(.opened):hover .eltd-line', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_dark_icon_hover_color') . ' !important'
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_background_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener', array(
				'-webkit-backface-visibility' => 'hidden',
				'display' => 'inline-block'
			));
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener.normal', array(
				'padding' => '10px 15px',
			));
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener.medium', array(
				'padding' => '10px 13px',
			));
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener.large', array(
				'padding' => '15px',
			));
			echo kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener:not(.opened)', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_icon_background_color')
			));

		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_background_hover_color') !== '') {

			kendall_elated_dynamic_css('.eltd-fullscreen-menu-opener.normal:not(.opened):hover, .eltd-fullscreen-menu-opener.medium:not(.opened):hover, .eltd-fullscreen-menu-opener.large:not(.opened):hover', array(
				'background-color' => kendall_elated_options()->getOptionValue('fullscreen_menu_icon_background_hover_color')
			));

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_fullscreen_menu_icon_styles');

}

if (!function_exists('kendall_elated_fullscreen_menu_icon_spacing')) {

	function kendall_elated_fullscreen_menu_icon_spacing()
	{

		$fullscreen_menu_icon_spacing = array();

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_padding_left') !== '') {
			$fullscreen_menu_icon_spacing['padding-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_icon_padding_left')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_padding_right') !== '') {
			$fullscreen_menu_icon_spacing['padding-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_icon_padding_right')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_margin_left') !== '') {
			$fullscreen_menu_icon_spacing['margin-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_icon_margin_left')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('fullscreen_menu_icon_margin_right') !== '') {
			$fullscreen_menu_icon_spacing['margin-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('fullscreen_menu_icon_margin_right')) . 'px';
		}

		if (!empty($fullscreen_menu_icon_spacing)) {
			echo kendall_elated_dynamic_css('a.eltd-fullscreen-menu-opener', $fullscreen_menu_icon_spacing);
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_fullscreen_menu_icon_spacing');

}