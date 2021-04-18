<?php

if (!function_exists('kendall_elated_register_footer_sidebar')) {

	function kendall_elated_register_footer_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Footer Column 1', 'kendall'),
			'id' => 'footer_column_1',
			'description' => esc_html__('Footer Column 1', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-1 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 2', 'kendall'),
			'id' => 'footer_column_2',
			'description' => esc_html__('Footer Column 2', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-2 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 3', 'kendall'),
			'id' => 'footer_column_3',
			'description' => esc_html__('Footer Column 3', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-3 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Column 4', 'kendall'),
			'id' => 'footer_column_4',
			'description' => esc_html__('Footer Column 4', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-column-4 %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom', 'kendall'),
			'id' => 'footer_text',
			'description' => esc_html__('Footer Bottom', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-text %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Left', 'kendall'),
			'id' => 'footer_bottom_left',
			'description' => esc_html__('Footer Bottom Left', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

		register_sidebar(array(
			'name' => esc_html__('Footer Bottom Right', 'kendall'),
			'id' => 'footer_bottom_right',
			'description' => esc_html__('Footer Bottom Right', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-footer-bottom-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-footer-widget-title">',
			'after_title' => '</h5>'
		));

	}

	add_action('widgets_init', 'kendall_elated_register_footer_sidebar');

}

if (!function_exists('kendall_elated_get_footer')) {
	/**
	 * Loads footer HTML
	 */
	function kendall_elated_get_footer() {

		$parameters = array();
		$id = kendall_elated_get_page_id();
		$parameters['footer_classes'] = kendall_elated_get_footer_classes($id);
		$parameters['display_footer_top'] = (kendall_elated_options()->getOptionValue('show_footer_top') == 'yes') ? true : false;
		$parameters['display_footer_bottom'] = (kendall_elated_options()->getOptionValue('show_footer_bottom') == 'yes') ? true : false;
		$parameters['footer_background_image'] =  kendall_elated_get_footer_background_image( $id );


		if(!is_active_sidebar('footer_column_1') && !is_active_sidebar('footer_column_2') && !is_active_sidebar('footer_column_3') && !is_active_sidebar('footer_column_4')) {
			$parameters['display_footer_top'] = false;
		}

		if(!is_active_sidebar('footer_bottom_left') && !is_active_sidebar('footer_text') && !is_active_sidebar('footer_bottom_right')) {
			$parameters['display_footer_bottom'] = false;
		}

		kendall_elated_get_module_template_part('templates/footer', 'footer', '', $parameters);

	}
	add_action('kendall_elated_get_footer_template', 'kendall_elated_get_footer');

}

if (!function_exists('kendall_elated_get_content_bottom_area')) {
	/**
	 * Loads content bottom area HTML with all needed parameters
	 */
	function kendall_elated_get_content_bottom_area() {

		$parameters = array();

		//Current page id
		$id = kendall_elated_get_page_id();

		//is content bottom area enabled for current page?
		$parameters['content_bottom_area'] = kendall_elated_get_meta_field_intersect('enable_content_bottom_area');
		if ($parameters['content_bottom_area'] == 'yes') {
			//Sidebar for content bottom area
			$parameters['content_bottom_area_sidebar'] = kendall_elated_get_meta_field_intersect('content_bottom_sidebar_custom_display');
			//Content bottom area in grid
			$parameters['content_bottom_area_in_grid'] = kendall_elated_get_meta_field_intersect('content_bottom_in_grid');
			//Content bottom area background color
			$parameters['content_bottom_background_color'] = 'background-color: '.kendall_elated_get_meta_field_intersect('content_bottom_background_color');
		}

		kendall_elated_get_module_template_part('templates/parts/content-bottom-area', 'footer', '', $parameters);

	}

}

if (!function_exists('kendall_elated_get_footer_top')) {
	/**
	 * Return footer top HTML
	 */
	function kendall_elated_get_footer_top($show_footer_top) {

		if($show_footer_top){
			$parameters = array();

			$parameters['footer_in_grid'] = (kendall_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
			$parameters['footer_top_classes'] = kendall_elated_footer_top_classes();
			$parameters['footer_top_columns'] = kendall_elated_options()->getOptionValue('footer_top_columns');

			kendall_elated_get_module_template_part('templates/parts/footer-top', 'footer', '', $parameters);
		}

	}
	
}

if (!function_exists('kendall_elated_get_footer_bottom')) {
	/**
	 * Return footer bottom HTML
	 */
	function kendall_elated_get_footer_bottom($show_footer_bottom) {

		if($show_footer_bottom){
			$parameters = array();

			$parameters['footer_bottom_border_in_grid'] = (kendall_elated_options()->getOptionValue('footer_bottom_border_in_grid') == 'yes') ? 'eltd-in-grid' : '';
			$parameters['footer_in_grid'] = (kendall_elated_options()->getOptionValue('footer_in_grid') == 'yes') ? true : false;
			$parameters['footer_bottom_columns'] = kendall_elated_options()->getOptionValue('footer_bottom_columns');

			kendall_elated_get_module_template_part('templates/parts/footer-bottom', 'footer', '', $parameters);
		}

	}

}

//Functions for loading sidebars

if (!function_exists('kendall_elated_get_footer_sidebar_25_25_50')) {

	function kendall_elated_get_footer_sidebar_25_25_50() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-three-columns-25-25-50', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_sidebar_50_25_25')) {

	function kendall_elated_get_footer_sidebar_50_25_25() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-three-columns-50-25-25', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_sidebar_four_columns')) {

	function kendall_elated_get_footer_sidebar_four_columns() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-four-columns', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_sidebar_three_columns')) {

	function kendall_elated_get_footer_sidebar_three_columns() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-three-columns', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_sidebar_two_columns')) {

	function kendall_elated_get_footer_sidebar_two_columns() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-two-columns', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_sidebar_one_column')) {

	function kendall_elated_get_footer_sidebar_one_column() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-one-column', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_bottom_sidebar_three_columns')) {

	function kendall_elated_get_footer_bottom_sidebar_three_columns() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-bottom-three-columns', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_bottom_sidebar_two_columns')) {

	function kendall_elated_get_footer_bottom_sidebar_two_columns() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-bottom-two-columns', 'footer');
	}

}

if (!function_exists('kendall_elated_get_footer_bottom_sidebar_one_column')) {

	function kendall_elated_get_footer_bottom_sidebar_one_column() {
		kendall_elated_get_module_template_part('templates/sidebars/sidebar-bottom-one-column', 'footer');
	}

}



