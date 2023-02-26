<?php

if (!function_exists('kendall_elated_side_area_slide_from_right_type_style')) {

	function kendall_elated_side_area_slide_from_right_type_style()
	{

		if (kendall_elated_options()->getOptionValue('side_area_type') == 'side-menu-slide-from-right') {

			if (kendall_elated_options()->getOptionValue('side_area_width') !== '' && kendall_elated_options()->getOptionValue('side_area_width') >= 30) {
				echo kendall_elated_dynamic_css('.eltd-side-menu-slide-from-right .eltd-side-menu', array(
					'right' => '-'.kendall_elated_options()->getOptionValue('side_area_width') . '%',
					'width' => kendall_elated_options()->getOptionValue('side_area_width') . '%'
				));
			}

			if (kendall_elated_options()->getOptionValue('side_area_content_overlay_color') !== '') {

				echo kendall_elated_dynamic_css('.eltd-side-menu-slide-from-right .eltd-wrapper .eltd-cover', array(
					'background-color' => kendall_elated_options()->getOptionValue('side_area_content_overlay_color')
				));

			}
			if (kendall_elated_options()->getOptionValue('side_area_content_overlay_opacity') !== '') {

				echo kendall_elated_dynamic_css('.eltd-side-menu-slide-from-right.eltd-right-side-menu-opened .eltd-wrapper .eltd-cover', array(
					'opacity' => kendall_elated_options()->getOptionValue('side_area_content_overlay_opacity')
				));

			}
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_slide_from_right_type_style');

}

if (!function_exists('kendall_elated_side_area_icon_color_styles')) {

	function kendall_elated_side_area_icon_color_styles()
	{

		if (kendall_elated_options()->getOptionValue('side_area_icon_font_size') !== '') {

			echo kendall_elated_dynamic_css('a.eltd-side-menu-button-opener', array(
				'font-size' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_font_size')) . 'px'
			));

			if (kendall_elated_options()->getOptionValue('side_area_icon_font_size') > 30) {
				echo '@media only screen and (max-width: 480px) {
						a.eltd-side-menu-button-opener {
						font-size: 30px;
						}
					}';
			}

		}

		if (kendall_elated_options()->getOptionValue('side_area_icon_color') !== '') {

			echo kendall_elated_dynamic_css('a.eltd-side-menu-button-opener', array(
				'color' => kendall_elated_options()->getOptionValue('side_area_icon_color')
			));

		}
		if (kendall_elated_options()->getOptionValue('side_area_icon_hover_color') !== '') {

			echo kendall_elated_dynamic_css('a.eltd-side-menu-button-opener:hover', array(
				'color' => kendall_elated_options()->getOptionValue('side_area_icon_hover_color')
			));

		}
		if (kendall_elated_options()->getOptionValue('side_area_light_icon_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-light-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-side-menu-button-opener,
			.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-side-menu-button-opener,
			.eltd-light-header .eltd-top-bar .eltd-side-menu-button-opener', array(
				'color' => kendall_elated_options()->getOptionValue('side_area_light_icon_color') . ' !important'
			));

		}
		if (kendall_elated_options()->getOptionValue('side_area_light_icon_hover_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-light-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-side-menu-button-opener:hover,
			.eltd-light-header.eltd-header-style-on-scroll .eltd-page-header .eltd-side-menu-button-opener:hover,
			.eltd-light-header .eltd-top-bar .eltd-side-menu-button-opener:hover', array(
				'color' => kendall_elated_options()->getOptionValue('side_area_light_icon_hover_color') . ' !important'
			));

		}
		if (kendall_elated_options()->getOptionValue('side_area_dark_icon_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-dark-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-side-menu-button-opener,
			.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-side-menu-button-opener,
			.eltd-dark-header .eltd-top-bar .eltd-side-menu-button-opener', array(
				'color' => kendall_elated_options()->getOptionValue('side_area_dark_icon_color') . ' !important'
			));

		}
		if (kendall_elated_options()->getOptionValue('side_area_dark_icon_hover_color') !== '') {

			echo kendall_elated_dynamic_css('.eltd-dark-header .eltd-page-header > div:not(.eltd-sticky-header) .eltd-side-menu-button-opener:hover,
			.eltd-dark-header.eltd-header-style-on-scroll .eltd-page-header .eltd-side-menu-button-opener:hover,
			.eltd-dark-header .eltd-top-bar .eltd-side-menu-button-opener:hover', array(
				'color' => kendall_elated_options()->getOptionValue('side_area_dark_icon_hover_color') . ' !important'
			));

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_icon_color_styles');

}

if (!function_exists('kendall_elated_side_area_icon_spacing_styles')) {

	function kendall_elated_side_area_icon_spacing_styles()
	{
		$icon_spacing = array();

		if (kendall_elated_options()->getOptionValue('side_area_icon_padding_left') !== '') {
			$icon_spacing['padding-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_padding_left')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_icon_padding_right') !== '') {
			$icon_spacing['padding-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_padding_right')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_icon_margin_left') !== '') {
			$icon_spacing['margin-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_margin_left')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_icon_margin_right') !== '') {
			$icon_spacing['margin-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_margin_right')) . 'px';
		}

		if (!empty($icon_spacing)) {

			echo kendall_elated_dynamic_css('a.eltd-side-menu-button-opener', $icon_spacing);

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_icon_spacing_styles');
}

if (!function_exists('kendall_elated_side_area_icon_border_styles')) {

	function kendall_elated_side_area_icon_border_styles()
	{
		if (kendall_elated_options()->getOptionValue('side_area_icon_border_yesno') == 'yes') {

			$side_area_icon_border = array();

			if (kendall_elated_options()->getOptionValue('side_area_icon_border_color') !== '') {
				$side_area_icon_border['border-color'] = kendall_elated_options()->getOptionValue('side_area_icon_border_color');
			}

			if (kendall_elated_options()->getOptionValue('side_area_icon_border_width') !== '') {
				$side_area_icon_border['border-width'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_border_width')) . 'px';
			} else {
				$side_area_icon_border['border-width'] = '1px';
			}

			if (kendall_elated_options()->getOptionValue('side_area_icon_border_radius') !== '') {
				$side_area_icon_border['border-radius'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_icon_border_radius')) . 'px';
			}

			if (kendall_elated_options()->getOptionValue('side_area_icon_border_style') !== '') {
				$side_area_icon_border['border-style'] = kendall_elated_options()->getOptionValue('side_area_icon_border_style');
			} else {
				$side_area_icon_border['border-style'] = 'solid';
			}

			if (!empty($side_area_icon_border)) {
				$side_area_icon_border['-webkit-transition'] = 'all 0.15s ease-out';
				$side_area_icon_border['transition'] = 'all 0.15s ease-out';
				echo kendall_elated_dynamic_css('a.eltd-side-menu-button-opener', $side_area_icon_border);
			}

			if (kendall_elated_options()->getOptionValue('side_area_icon_border_hover_color') !== '') {
				$side_area_icon_border_hover['border-color'] = kendall_elated_options()->getOptionValue('side_area_icon_border_hover_color');
                echo kendall_elated_dynamic_css('a.eltd-side-menu-button-opener:hover', $side_area_icon_border_hover);
			}


		}
	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_icon_border_styles');

}

if (!function_exists('kendall_elated_side_area_alignment')) {

	function kendall_elated_side_area_alignment()
	{

		if (kendall_elated_options()->getOptionValue('side_area_aligment')) {

			echo kendall_elated_dynamic_css('.eltd-side-menu-slide-from-right .eltd-side-menu, .eltd-side-menu-slide-with-content .eltd-side-menu, .eltd-side-area-uncovered-from-content .eltd-side-menu', array(
				'text-align' => kendall_elated_options()->getOptionValue('side_area_aligment')
			));

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_alignment');

}

if (!function_exists('kendall_elated_side_area_styles')) {

	function kendall_elated_side_area_styles()
	{

		$side_area_styles = array();

		if (kendall_elated_options()->getOptionValue('side_area_background_color') !== '') {
			$side_area_styles['background-color'] = kendall_elated_options()->getOptionValue('side_area_background_color');
		}

		if (kendall_elated_options()->getOptionValue('side_area_padding_top') !== '') {
			$side_area_styles['padding-top'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_padding_top')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_padding_right') !== '') {
			$side_area_styles['padding-right'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_padding_right')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_padding_bottom') !== '') {
			$side_area_styles['padding-bottom'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_padding_bottom')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_padding_left') !== '') {
			$side_area_styles['padding-left'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_padding_left')) . 'px';
		}

		if (!empty($side_area_styles)) {
			echo kendall_elated_dynamic_css('.eltd-side-menu, .eltd-side-area-uncovered-from-content .eltd-side-menu, .eltd-side-menu-slide-from-right .eltd-side-menu', $side_area_styles);
		}

		if (kendall_elated_options()->getOptionValue('side_area_close_icon') == 'dark') {
			echo kendall_elated_dynamic_css('.eltd-side-menu a.eltd-close-side-menu span, .eltd-side-menu a.eltd-close-side-menu i', array(
				'color' => '#000000'
			));
		}

		if (kendall_elated_options()->getOptionValue('side_area_close_icon_size') !== '') {
			echo kendall_elated_dynamic_css('.eltd-side-menu a.eltd-close-side-menu', array(
				'height' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'padding' => 0,
			));
			echo kendall_elated_dynamic_css('.eltd-side-menu a.eltd-close-side-menu span, .eltd-side-menu a.eltd-close-side-menu i', array(
				'font-size' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'height' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'width' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
				'line-height' => kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_close_icon_size')) . 'px',
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_styles');

}

if (!function_exists('kendall_elated_side_area_title_styles')) {

	function kendall_elated_side_area_title_styles()
	{

		$title_styles = array();

		if (kendall_elated_options()->getOptionValue('side_area_title_color') !== '') {
			$title_styles['color'] = kendall_elated_options()->getOptionValue('side_area_title_color');
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_fontsize') !== '') {
			$title_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_title_fontsize')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_lineheight') !== '') {
			$title_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_title_lineheight')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_texttransform') !== '') {
			$title_styles['text-transform'] = kendall_elated_options()->getOptionValue('side_area_title_texttransform');
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_google_fonts') !== '-1') {
			$title_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('side_area_title_google_fonts')) . ', sans-serif';
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_fontstyle') !== '') {
			$title_styles['font-style'] = kendall_elated_options()->getOptionValue('side_area_title_fontstyle');
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_fontweight') !== '') {
			$title_styles['font-weight'] = kendall_elated_options()->getOptionValue('side_area_title_fontweight');
		}

		if (kendall_elated_options()->getOptionValue('side_area_title_letterspacing') !== '') {
			$title_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_title_letterspacing')) . 'px';
		}

		if (!empty($title_styles)) {

			echo kendall_elated_dynamic_css('.eltd-side-menu-title h4, .eltd-side-menu-title h5', $title_styles);

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_title_styles');

}

if (!function_exists('kendall_elated_side_area_text_styles')) {

	function kendall_elated_side_area_text_styles()
	{
		$text_styles = array();

		if (kendall_elated_options()->getOptionValue('side_area_text_google_fonts') !== '-1') {
			$text_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('side_area_text_google_fonts')) . ', sans-serif';
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_fontsize') !== '') {
			$text_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_text_fontsize')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_lineheight') !== '') {
			$text_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_text_lineheight')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_letterspacing') !== '') {
			$text_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('side_area_text_letterspacing')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_fontweight') !== '') {
			$text_styles['font-weight'] = kendall_elated_options()->getOptionValue('side_area_text_fontweight');
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_fontstyle') !== '') {
			$text_styles['font-style'] = kendall_elated_options()->getOptionValue('side_area_text_fontstyle');
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_texttransform') !== '') {
			$text_styles['text-transform'] = kendall_elated_options()->getOptionValue('side_area_text_texttransform');
		}

		if (kendall_elated_options()->getOptionValue('side_area_text_color') !== '') {
			$text_styles['color'] = kendall_elated_options()->getOptionValue('side_area_text_color');
		}

		if (!empty($text_styles)) {

			echo kendall_elated_dynamic_css('.eltd-side-menu .widget, .eltd-side-menu .widget.widget_search form, .eltd-side-menu .widget.widget_search form input[type="text"], .eltd-side-menu .widget.widget_search form input[type="submit"], .eltd-side-menu .widget h6, .eltd-side-menu .widget h6 a, .eltd-side-menu .widget p, .eltd-side-menu .widget li a, .eltd-side-menu .widget.widget_rss li a.rsswidget, .eltd-side-menu #wp-calendar caption,.eltd-side-menu .widget li, .eltd-side-menu h3, .eltd-side-menu .widget.widget_archive select, .eltd-side-menu .widget.widget_categories select, .eltd-side-menu .widget.widget_text select, .eltd-side-menu .widget.widget_search form input[type="submit"], .eltd-side-menu #wp-calendar th, .eltd-side-menu #wp-calendar td, .eltd-side-menu .eltd_social_icon_holder i.simple_social', $text_styles);

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_text_styles');

}

if (!function_exists('kendall_elated_side_area_link_styles')) {

	function kendall_elated_side_area_link_styles()
	{
		$link_styles = array();

		if (kendall_elated_options()->getOptionValue('sidearea_link_font_family') !== '-1') {
			$link_styles['font-family'] = kendall_elated_get_formatted_font_family(kendall_elated_options()->getOptionValue('sidearea_link_font_family')) . ',sans-serif';
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_font_size') !== '') {
			$link_styles['font-size'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('sidearea_link_font_size')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_line_height') !== '') {
			$link_styles['line-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('sidearea_link_line_height')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_letter_spacing') !== '') {
			$link_styles['letter-spacing'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('sidearea_link_letter_spacing')) . 'px';
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_font_weight') !== '') {
			$link_styles['font-weight'] = kendall_elated_options()->getOptionValue('sidearea_link_font_weight');
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_font_style') !== '') {
			$link_styles['font-style'] = kendall_elated_options()->getOptionValue('sidearea_link_font_style');
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_text_transform') !== '') {
			$link_styles['text-transform'] = kendall_elated_options()->getOptionValue('sidearea_link_text_transform');
		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_color') !== '') {
			$link_styles['color'] = kendall_elated_options()->getOptionValue('sidearea_link_color');
		}

		if (!empty($link_styles)) {

			echo kendall_elated_dynamic_css('.eltd-side-menu .widget li a, .eltd-side-menu .widget a:not(.qbutton)', $link_styles);

		}

		if (kendall_elated_options()->getOptionValue('sidearea_link_hover_color') !== '') {
			echo kendall_elated_dynamic_css('.eltd-side-menu .widget a:hover, .eltd-side-menu .widget.widget_archive li:hover, .eltd-side-menu .widget.widget_categories li:hover,  .eltd-side-menu .widget_rss li a.rsswidget:hover', array(
				'color' => kendall_elated_options()->getOptionValue('sidearea_link_hover_color')
			));
		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_link_styles');

}

if (!function_exists('kendall_elated_side_area_border_styles')) {

	function kendall_elated_side_area_border_styles()
	{

		if (kendall_elated_options()->getOptionValue('side_area_enable_bottom_border') == 'yes') {

			if (kendall_elated_options()->getOptionValue('side_area_bottom_border_color') !== '') {

				echo kendall_elated_dynamic_css('.eltd-side-menu .widget', array(
					'border-bottom' => '1px solid ' . kendall_elated_options()->getOptionValue('side_area_bottom_border_color'),
					'margin-bottom' => '10px',
					'padding-bottom' => '10px',
				));

			}

		}

	}

	add_action('kendall_elated_style_dynamic', 'kendall_elated_side_area_border_styles');

}