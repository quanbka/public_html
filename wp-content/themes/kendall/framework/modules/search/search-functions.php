<?php

if( !function_exists('kendall_elated_search_body_class') ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function kendall_elated_search_body_class($classes) {

		if ( is_active_widget( false, false, 'eltd_search_opener' ) ) {

			$classes[] = 'eltd-fullscreen-search eltd-search-fade';

		}
		return $classes;

	}

	add_filter('body_class', 'kendall_elated_search_body_class');
}

if ( ! function_exists('kendall_elated_get_search') ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function kendall_elated_get_search() {

		if ( kendall_elated_active_widget( false, false, 'eltd_search_opener' ) ) {

			$search_type = kendall_elated_options()->getOptionValue('search_type');

			if ($search_type == 'search-covers-header') {
				kendall_elated_set_position_for_covering_search();
				return;
			} 

			kendall_elated_load_search_template();

		}
	}

}

if ( ! function_exists('kendall_elated_set_position_for_covering_search') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function kendall_elated_set_position_for_covering_search() {

		$containing_sidebar = kendall_elated_active_widget( false, false, 'eltd_search_opener' );

		foreach ($containing_sidebar as $sidebar) {

			if ( strpos( $sidebar, 'top-bar' ) !== false ) {
				add_action( 'kendall_elated_after_header_top_html_open', 'kendall_elated_load_search_template');
			} else if ( strpos( $sidebar, 'main-menu' ) !== false ) {
				add_action( 'kendall_elated_after_header_menu_area_html_open', 'kendall_elated_load_search_template');
			} else if ( strpos( $sidebar, 'mobile-logo' ) !== false ) {
				add_action( 'kendall_elated_after_mobile_header_html_open', 'kendall_elated_load_search_template');
			} else if ( strpos( $sidebar, 'logo' ) !== false ) {
				add_action( 'kendall_elated_after_header_logo_area_html_open', 'kendall_elated_load_search_template');
			} else if ( strpos( $sidebar, 'sticky' ) !== false ) {
				add_action( 'kendall_elated_after_sticky_menu_html_open', 'kendall_elated_load_search_template');
			}

		}

	}

}

if ( ! function_exists('kendall_elated_set_search_position_in_menu') ) {
	/**
	 * Finds part of header where search template will be loaded
	 */
	function kendall_elated_set_search_position_in_menu( $type ) {

		add_action( 'kendall_elated_after_header_menu_area_html_open', 'kendall_elated_load_search_template');
		if ( $type == 'search-slides-from-header-bottom' ) {
			add_action( 'kendall_elated_after_sticky_menu_html_open', 'kendall_elated_load_search_template');
		}

	}
}

if ( ! function_exists('kendall_elated_set_search_position_mobile') ) {
	/**
	 * Hooks search template to mobile header
	 */
	function kendall_elated_set_search_position_mobile() {

		add_action( 'kendall_elated_after_mobile_header_html_open', 'kendall_elated_load_search_template');

	}

}

if ( ! function_exists('kendall_elated_load_search_template') ) {
	/**
	 * Loads HTML template with parameters
	 */
	function kendall_elated_load_search_template() {

		$search_type = 'fullscreen-search';

		$search_icon = '';
		$search_icon_close = '';
		if ( kendall_elated_options()->getOptionValue('search_icon_pack') !== '' ) {
			$search_icon = kendall_elated_icon_collections()->getSearchIcon( kendall_elated_options()->getOptionValue('search_icon_pack'), true );
			$search_icon_close = kendall_elated_icon_collections()->getSearchClose( kendall_elated_options()->getOptionValue('search_icon_pack'), true );
		}

		$parameters = array(
			'search_in_grid'		=> kendall_elated_options()->getOptionValue('search_in_grid') == 'yes' ? true : false,
			'search_icon'			=> $search_icon,
			'search_icon_close'		=> $search_icon_close
		);

		kendall_elated_get_module_template_part( 'templates/types/'.$search_type, 'search', '', $parameters );

	}

}