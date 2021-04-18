<?php

if ( !function_exists( 'kendall_elated_header_top_bar_styles' ) ) {
	/**
	 * Generates styles for header top bar
	 */
	function kendall_elated_header_top_bar_styles() {

		if ( kendall_elated_options()->getOptionValue( 'top_bar_height' ) !== '' ) {
			echo kendall_elated_dynamic_css( '.eltd-top-bar', array( 'height' => kendall_elated_options()->getOptionValue( 'top_bar_height' ) . 'px' ) );
			echo kendall_elated_dynamic_css( '.eltd-top-bar .eltd-logo-wrapper a', array( 'max-height' => kendall_elated_options()->getOptionValue( 'top_bar_height' ) . 'px' ) );
		}

		if ( kendall_elated_options()->getOptionValue( 'top_bar_in_grid' ) == 'yes' ) {
			$top_bar_grid_selector = '.eltd-top-bar .eltd-grid .eltd-vertical-align-containers';
			$top_bar_grid_styles   = array();
			if ( kendall_elated_options()->getOptionValue( 'top_bar_grid_background_color' ) !== '' ) {
				$grid_background_color        = kendall_elated_options()->getOptionValue( 'top_bar_grid_background_color' );
				$grid_background_transparency = 1;

				if ( kendall_elated_options()->getOptionValue( 'top_bar_grid_background_transparency' ) ) {
					$grid_background_transparency = kendall_elated_options()->getOptionValue( 'top_bar_grid_background_transparency' );
				}

				$grid_background_color                   = kendall_elated_rgba_color( $grid_background_color, $grid_background_transparency );
				$top_bar_grid_styles['background-color'] = $grid_background_color;
			}

			echo kendall_elated_dynamic_css( $top_bar_grid_selector, $top_bar_grid_styles );
		}

		$background_color = kendall_elated_options()->getOptionValue( 'top_bar_background_color' );
		$top_bar_styles   = array();
		if ( $background_color !== '' ) {
			$background_transparency = 1;
			if ( kendall_elated_options()->getOptionValue( 'top_bar_background_transparency' ) !== '' ) {
				$background_transparency = kendall_elated_options()->getOptionValue( 'top_bar_background_transparency' );
			}

			$background_color                   = kendall_elated_rgba_color( $background_color, $background_transparency );
			$top_bar_styles['background-color'] = $background_color;
		}

		echo kendall_elated_dynamic_css( '.eltd-top-bar', $top_bar_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_header_top_bar_styles' );
}

if ( !function_exists( 'kendall_elated_header_standard_menu_area_styles' ) ) {
	/**
	 * Generates styles for header standard menu
	 */
	function kendall_elated_header_standard_menu_area_styles() {

		$menu_area_header_standard_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_standard' ) !== '' ) {
			$menu_area_background_color        = kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_standard' );
			$menu_area_background_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_standard' ) !== '' ) {
				$menu_area_background_transparency = kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_standard' );
			}

			$menu_area_header_standard_styles['background-color'] = kendall_elated_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		}

		if ( kendall_elated_options()->getOptionValue( 'menu_area_height_header_standard' ) !== '' ) {
			$max_height = intval( kendall_elated_filter_px( kendall_elated_options()->getOptionValue( 'menu_area_height_header_standard' ) ) * 0.9 ) . 'px';
			echo kendall_elated_dynamic_css( '.eltd-header-standard .eltd-page-header .eltd-logo-wrapper a', array( 'max-height' => $max_height ) );

			$menu_area_header_standard_styles['height'] = kendall_elated_filter_px( kendall_elated_options()->getOptionValue( 'menu_area_height_header_standard' ) ) . 'px';

		}

		echo kendall_elated_dynamic_css( '.eltd-header-standard .eltd-page-header .eltd-menu-area', $menu_area_header_standard_styles );

		$menu_area_grid_header_standard_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'menu_area_in_grid_header_standard' ) == 'yes' && kendall_elated_options()->getOptionValue( 'menu_area_grid_background_color_header_standard' ) !== '' ) {
			$menu_area_grid_background_color        = kendall_elated_options()->getOptionValue( 'menu_area_grid_background_color_header_standard' );
			$menu_area_grid_background_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'menu_area_grid_background_transparency_header_standard' ) !== '' ) {
				$menu_area_grid_background_transparency = kendall_elated_options()->getOptionValue( 'menu_area_grid_background_transparency_header_standard' );
			}

			$menu_area_grid_header_standard_styles['background-color'] = kendall_elated_rgba_color( $menu_area_grid_background_color, $menu_area_grid_background_transparency );
		}

		echo kendall_elated_dynamic_css( '.eltd-header-standard .eltd-page-header .eltd-menu-area .eltd-grid .eltd-vertical-align-containers', $menu_area_grid_header_standard_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_header_standard_menu_area_styles' );
}

if ( !function_exists( 'kendall_elated_header_divided_menu_area_styles' ) ) {
	/**
	 * Generates styles for header standard menu
	 */
	function kendall_elated_header_divided_menu_area_styles() {

		$menu_area_header_divided_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_divided' ) !== '' ) {
			$menu_area_background_color        = kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_divided' );
			$menu_area_background_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_divided' ) !== '' ) {
				$menu_area_background_transparency = kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_divided' );
			}

			$menu_area_header_divided_styles['background-color'] = kendall_elated_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		}

		if ( kendall_elated_options()->getOptionValue( 'menu_area_height_header_divided' ) !== '' ) {
			$max_height = intval( kendall_elated_filter_px( kendall_elated_options()->getOptionValue( 'menu_area_height_header_divided' ) ) * 0.9 ) . 'px';
			echo kendall_elated_dynamic_css( '.eltd-header-divided .eltd-page-header .eltd-logo-wrapper a', array( 'max-height' => $max_height ) );

			$menu_area_header_divided_styles['height'] = kendall_elated_filter_px( kendall_elated_options()->getOptionValue( 'menu_area_height_header_divided' ) ) . 'px';

		}

		echo kendall_elated_dynamic_css( '.eltd-header-divided .eltd-page-header .eltd-menu-area', $menu_area_header_divided_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_header_divided_menu_area_styles' );
}

if ( !function_exists( 'kendall_elated_header_dual_menu_area_style' ) ) {
	/**
	 * Generates styles for header dual menu
	 */
	function kendall_elated_header_dual_menu_area_style() {
		$menu_area_header_dual_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_dual' ) !== '' ) {
			$menu_area_background_color        = kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_dual' );
			$menu_area_background_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_dual' ) !== '' ) {
				$menu_area_background_transparency = kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_dual' );
			}

			$menu_area_header_dual_styles['background-color'] = kendall_elated_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		}

		if ( kendall_elated_options()->getOptionValue( 'menu_area_height_header_dual' ) !== '' ) {

			$menu_area_header_dual_styles['height'] = kendall_elated_filter_px( kendall_elated_options()->getOptionValue( 'menu_area_height_header_dual' ) ) . 'px';

		}

		echo kendall_elated_dynamic_css( '.eltd-header-dual .eltd-page-header .eltd-menu-area', $menu_area_header_dual_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_header_dual_menu_area_style' );
}

if( !function_exists('kendall_elated_header_dual_logo_area_styles')){

	function kendall_elated_header_dual_logo_area_styles(){
		$logo_area_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_dual' ) !== '' ) {
			$menu_area_background_color        = kendall_elated_options()->getOptionValue( 'menu_area_background_color_header_dual' );
			$menu_area_background_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_dual' ) !== '' ) {
				$menu_area_background_transparency = kendall_elated_options()->getOptionValue( 'menu_area_background_transparency_header_dual' );
			}

			$logo_area_styles['background-color'] = kendall_elated_rgba_color( $menu_area_background_color, $menu_area_background_transparency );
		}

		if(kendall_elated_options()->getOptionValue('logo_area_height_header_dual') !== '') {
			$logo_area_styles['height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('logo_area_height_header_dual')).'px';
		}

		$logo_area_selector = '.eltd-header-dual .eltd-page-header .eltd-logo-area';
		echo kendall_elated_dynamic_css($logo_area_selector, $logo_area_styles);

		$logo_area_link_styles = array();
		if(kendall_elated_options()->getOptionValue('logo_area_height_header_dual') !== '') {
			$logo_area_link_styles['max-height'] = kendall_elated_filter_px(kendall_elated_options()->getOptionValue('logo_area_height_header_dual'), $logo_area_link_styles) * 0.9 .'px';
		}

		$logo_area_link_selector = '.eltd-header-dual .eltd-page-header .eltd-logo-area .eltd-logo-wrapper a';
		echo kendall_elated_dynamic_css($logo_area_link_selector, $logo_area_link_styles);
	}
	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_header_dual_logo_area_styles' );
}

if ( !function_exists( 'kendall_elated_vertical_menu_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function kendall_elated_vertical_menu_styles() {

		$vertical_header_styles = array();

		$vertical_header_selectors = array(
			'.eltd-header-vertical .eltd-vertical-area-background'
		);

		if ( kendall_elated_options()->getOptionValue( 'vertical_header_background_color' ) !== '' ) {
			$vertical_header_styles['background-color'] = kendall_elated_options()->getOptionValue( 'vertical_header_background_color' );
		}

		if ( kendall_elated_options()->getOptionValue( 'vertical_header_transparency' ) !== '' ) {
			$vertical_header_styles['opacity'] = kendall_elated_options()->getOptionValue( 'vertical_header_transparency' );
		}

		if ( kendall_elated_options()->getOptionValue( 'vertical_header_background_image' ) !== '' ) {
			$vertical_header_styles['background-image'] = 'url(' . kendall_elated_options()->getOptionValue( 'vertical_header_background_image' ) . ')';
		}


		echo kendall_elated_dynamic_css( $vertical_header_selectors, $vertical_header_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_vertical_menu_styles' );
}

if ( !function_exists( 'kendall_elated_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function kendall_elated_sticky_header_styles() {

		if ( kendall_elated_options()->getOptionValue( 'sticky_header_in_grid' ) == 'yes' && kendall_elated_options()->getOptionValue( 'sticky_header_grid_background_color' ) !== '' ) {
			$sticky_header_grid_background_color        = kendall_elated_options()->getOptionValue( 'sticky_header_grid_background_color' );
			$sticky_header_grid_background_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'sticky_header_grid_transparency' ) !== '' ) {
				$sticky_header_grid_background_transparency = kendall_elated_options()->getOptionValue( 'sticky_header_grid_transparency' );
			}

			echo kendall_elated_dynamic_css( '.eltd-page-header .eltd-sticky-header .eltd-grid .eltd-vertical-align-containers', array( 'background-color' => kendall_elated_rgba_color( $sticky_header_grid_background_color, $sticky_header_grid_background_transparency ) ) );
		}

		if ( kendall_elated_options()->getOptionValue( 'sticky_header_background_color' ) !== '' ) {

			$sticky_header_background_color              = kendall_elated_options()->getOptionValue( 'sticky_header_background_color' );
			$sticky_header_background_color_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'sticky_header_transparency' ) !== '' ) {
				$sticky_header_background_color_transparency = kendall_elated_options()->getOptionValue( 'sticky_header_transparency' );
			}

			echo kendall_elated_dynamic_css( '.eltd-page-header .eltd-sticky-header .eltd-sticky-holder', array( 'background-color' => kendall_elated_rgba_color( $sticky_header_background_color, $sticky_header_background_color_transparency ) ) );
		}

		if ( kendall_elated_options()->getOptionValue( 'sticky_header_height' ) !== '' ) {
			$max_height = intval( kendall_elated_filter_px( kendall_elated_options()->getOptionValue( 'sticky_header_height' ) ) * 0.9 ) . 'px';

			echo kendall_elated_dynamic_css( '.eltd-page-header .eltd-sticky-header', array( 'height' => kendall_elated_options()->getOptionValue( 'sticky_header_height' ) . 'px' ) );
			echo kendall_elated_dynamic_css( '.eltd-page-header .eltd-sticky-header .eltd-logo-wrapper a', array( 'max-height' => $max_height ) );
		}

		$sticky_menu_item_styles = array();
		if ( kendall_elated_options()->getOptionValue( 'sticky_color' ) !== '' ) {
			$sticky_menu_item_styles['color'] = kendall_elated_options()->getOptionValue( 'sticky_color' );
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_google_fonts' ) !== '-1' ) {
			$sticky_menu_item_styles['font-family'] = kendall_elated_get_formatted_font_family( kendall_elated_options()->getOptionValue( 'sticky_google_fonts' ) );
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_fontsize' ) !== '' ) {
			$sticky_menu_item_styles['font-size'] = kendall_elated_options()->getOptionValue( 'sticky_fontsize' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_lineheight' ) !== '' ) {
			$sticky_menu_item_styles['line-height'] = kendall_elated_options()->getOptionValue( 'sticky_lineheight' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_texttransform' ) !== '' ) {
			$sticky_menu_item_styles['text-transform'] = kendall_elated_options()->getOptionValue( 'sticky_texttransform' );
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_fontstyle' ) !== '' ) {
			$sticky_menu_item_styles['font-style'] = kendall_elated_options()->getOptionValue( 'sticky_fontstyle' );
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_fontweight' ) !== '' ) {
			$sticky_menu_item_styles['font-weight'] = kendall_elated_options()->getOptionValue( 'sticky_fontweight' );
		}
		if ( kendall_elated_options()->getOptionValue( 'sticky_letterspacing' ) !== '' ) {
			$sticky_menu_item_styles['letter-spacing'] = kendall_elated_options()->getOptionValue( 'sticky_letterspacing' ) . 'px';
		}

		$sticky_menu_item_selector = array(
			'.eltd-main-menu.eltd-sticky-nav > ul > li > a'
		);

		echo kendall_elated_dynamic_css( $sticky_menu_item_selector, $sticky_menu_item_styles );

		$sticky_menu_item_hover_styles = array();
		if ( kendall_elated_options()->getOptionValue( 'sticky_hovercolor' ) !== '' ) {
			$sticky_menu_item_hover_styles['color'] = kendall_elated_options()->getOptionValue( 'sticky_hovercolor' );
		}

		$sticky_menu_item_hover_selector = array(
			'.eltd-main-menu.eltd-sticky-nav > ul > li:hover > a',
			'.eltd-main-menu.eltd-sticky-nav > ul > li.eltd-active-item:hover > a',
			'body:not(.eltd-menu-item-first-level-bg-color) .eltd-main-menu.eltd-sticky-nav > ul > li:hover > a',
			'body:not(.eltd-menu-item-first-level-bg-color) .eltd-main-menu.eltd-sticky-nav > ul > li.eltd-active-item:hover > a'
		);

		echo kendall_elated_dynamic_css( $sticky_menu_item_hover_selector, $sticky_menu_item_hover_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_sticky_header_styles' );
}

if ( !function_exists( 'kendall_elated_fixed_header_styles' ) ) {
	/**
	 * Generates styles for fixed haeder
	 */
	function kendall_elated_fixed_header_styles() {

		if ( kendall_elated_options()->getOptionValue( 'fixed_header_grid_background_color' ) !== '' ) {

			$fixed_header_grid_background_color              = kendall_elated_options()->getOptionValue( 'fixed_header_grid_background_color' );
			$fixed_header_grid_background_color_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'fixed_header_grid_transparency' ) !== '' ) {
				$fixed_header_grid_background_color_transparency = kendall_elated_options()->getOptionValue( 'fixed_header_grid_transparency' );
			}

			echo kendall_elated_dynamic_css( '.eltd-header-type1 .eltd-fixed-wrapper.fixed .eltd-grid .eltd-vertical-align-containers,
                                    .eltd-header-type3 .eltd-fixed-wrapper.fixed .eltd-grid .eltd-vertical-align-containers',
				array( 'background-color' => kendall_elated_rgba_color( $fixed_header_grid_background_color, $fixed_header_grid_background_color_transparency ) ) );
		}

		if ( kendall_elated_options()->getOptionValue( 'fixed_header_background_color' ) !== '' ) {

			$fixed_header_background_color              = kendall_elated_options()->getOptionValue( 'fixed_header_background_color' );
			$fixed_header_background_color_transparency = 1;

			if ( kendall_elated_options()->getOptionValue( 'fixed_header_transparency' ) !== '' ) {
				$fixed_header_background_color_transparency = kendall_elated_options()->getOptionValue( 'fixed_header_transparency' );
			}

			echo kendall_elated_dynamic_css( '.eltd-header-type1 .eltd-fixed-wrapper.fixed .eltd-menu-area,
                                    .eltd-header-type3 .eltd-fixed-wrapper.fixed .eltd-menu-area',
				array( 'background-color' => kendall_elated_rgba_color( $fixed_header_background_color, $fixed_header_background_color_transparency ) ) );
		}

	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_fixed_header_styles' );
}

if ( !function_exists( 'kendall_elated_vertical_main_menu_styles' ) ) {
	/**
	 * Generates styles for vertical main main menu
	 */
	function kendall_elated_vertical_main_menu_styles() {
		$dropdown_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'vertical_dropdown_background_color' ) !== '' ) {
			$dropdown_styles['background-color'] = kendall_elated_options()->getOptionValue( 'vertical_dropdown_background_color' );
		}

		$dropdown_selector = array(
			'.eltd-header-vertical .eltd-vertical-dropdown-float .menu-item .second',
			'.eltd-header-vertical .eltd-vertical-dropdown-float .second .inner ul ul'
		);

		echo kendall_elated_dynamic_css( $dropdown_selector, $dropdown_styles );

		$fist_level_styles       = array();
		$fist_level_hover_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_color' ) !== '' ) {
			$fist_level_styles['color'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_color' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_google_fonts' ) !== '-1' ) {
			$fist_level_styles['font-family'] = kendall_elated_get_formatted_font_family( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_google_fonts' ) );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_fontsize' ) !== '' ) {
			$fist_level_styles['font-size'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_fontsize' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_lineheight' ) !== '' ) {
			$fist_level_styles['line-height'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_lineheight' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_texttransform' ) !== '' ) {
			$fist_level_styles['text-transform'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_texttransform' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_fontstyle' ) !== '' ) {
			$fist_level_styles['font-style'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_fontstyle' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_fontweight' ) !== '' ) {
			$fist_level_styles['font-weight'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_fontweight' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_letter_spacing' ) !== '' ) {
			$fist_level_styles['letter-spacing'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_letter_spacing' ) . 'px';
		}

		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_1st_hover_color' ) !== '' ) {
			$fist_level_hover_styles['color'] = kendall_elated_options()->getOptionValue( 'vertical_menu_1st_hover_color' );
		}

		$first_level_selector       = array(
			'.eltd-header-vertical .eltd-vertical-menu > ul > li > a'
		);
		$first_level_hover_selector = array(
			'.eltd-header-vertical .eltd-vertical-menu > ul > li > a:hover',
			'.eltd-header-vertical .eltd-vertical-menu > ul > li > a.eltd-active-item'
		);

		echo kendall_elated_dynamic_css( $first_level_selector, $fist_level_styles );
		echo kendall_elated_dynamic_css( $first_level_hover_selector, $fist_level_hover_styles );

		$second_level_styles       = array();
		$second_level_hover_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_color' ) !== '' ) {
			$second_level_styles['color'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_color' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_google_fonts' ) !== '-1' ) {
			$second_level_styles['font-family'] = kendall_elated_get_formatted_font_family( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_google_fonts' ) );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_fontsize' ) !== '' ) {
			$second_level_styles['font-size'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_fontsize' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_lineheight' ) !== '' ) {
			$second_level_styles['line-height'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_lineheight' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_texttransform' ) !== '' ) {
			$second_level_styles['text-transform'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_texttransform' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_fontstyle' ) !== '' ) {
			$second_level_styles['font-style'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_fontstyle' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_fontweight' ) !== '' ) {
			$second_level_styles['font-weight'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_fontweight' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_letter_spacing' ) !== '' ) {
			$second_level_styles['letter-spacing'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_letter_spacing' ) . 'px';
		}

		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_hover_color' ) !== '' ) {
			$second_level_hover_styles['color'] = kendall_elated_options()->getOptionValue( 'vertical_menu_2nd_hover_color' );
		}

		$second_level_selector = array(
			'.eltd-header-vertical .eltd-vertical-menu .second .inner > ul > li > a'
		);

		$second_level_hover_selector = array(
			'.eltd-header-vertical .eltd-vertical-menu .second .inner > ul > li > a:hover',
			'.eltd-header-vertical .eltd-vertical-menu .second .inner > ul > li > a.eltd-active-item'
		);

		echo kendall_elated_dynamic_css( $second_level_selector, $second_level_styles );
		echo kendall_elated_dynamic_css( $second_level_hover_selector, $second_level_hover_styles );

		$third_level_styles       = array();
		$third_level_hover_styles = array();

		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_color' ) !== '' ) {
			$third_level_styles['color'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_color' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_google_fonts' ) !== '-1' ) {
			$third_level_styles['font-family'] = kendall_elated_get_formatted_font_family( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_google_fonts' ) );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_fontsize' ) !== '' ) {
			$third_level_styles['font-size'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_fontsize' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_lineheight' ) !== '' ) {
			$third_level_styles['line-height'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_lineheight' ) . 'px';
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_texttransform' ) !== '' ) {
			$third_level_styles['text-transform'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_texttransform' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_fontstyle' ) !== '' ) {
			$third_level_styles['font-style'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_fontstyle' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_fontweight' ) !== '' ) {
			$third_level_styles['font-weight'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_fontweight' );
		}
		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_letter_spacing' ) !== '' ) {
			$third_level_styles['letter-spacing'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_letter_spacing' ) . 'px';
		}

		if ( kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_hover_color' ) !== '' ) {
			$third_level_hover_styles['color'] = kendall_elated_options()->getOptionValue( 'vertical_menu_3rd_hover_color' );
		}

		$third_level_selector = array(
			'.eltd-header-vertical .eltd-vertical-menu .second .inner ul li ul li a'
		);

		$third_level_hover_selector = array(
			'.eltd-header-vertical .eltd-vertical-menu .second .inner ul li ul li a:hover',
			'.eltd-header-vertical .eltd-vertical-menu .second .inner ul li ul li a.eltd-active-item'
		);

		echo kendall_elated_dynamic_css( $third_level_selector, $third_level_styles );
		echo kendall_elated_dynamic_css( $third_level_hover_selector, $third_level_hover_styles );
	}

	add_action( 'kendall_elated_style_dynamic', 'kendall_elated_vertical_main_menu_styles' );
}