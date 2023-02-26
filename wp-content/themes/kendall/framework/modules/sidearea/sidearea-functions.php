<?php
if (!function_exists('kendall_elated_register_side_area_sidebar')) {
	/**
	 * Register side area sidebar
	 */
	function kendall_elated_register_side_area_sidebar() {

		register_sidebar(array(
			'name' => esc_html__('Side Area', 'kendall'),
			'id' => 'sidearea', //TODO Change name of sidebar
			'description' => esc_html__('Side Area', 'kendall'),
			'before_widget' => '<div id="%1$s" class="widget eltd-sidearea-widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h5 class="eltd-sidearea-widget-title">',
			'after_title' => '</h5>'
		));

	}

	add_action('widgets_init', 'kendall_elated_register_side_area_sidebar');

}

if(!function_exists('kendall_elated_side_menu_body_class')) {
    /**
     * Function that adds body classes for different side menu styles
     *
     * @param $classes array original array of body classes
     *
     * @return array modified array of classes
     */
    function kendall_elated_side_menu_body_class($classes) {

		if (is_active_widget( false, false, 'eltd_side_area_opener' )) {

			$classes[] = 'eltd-enable-sidemenu-area-opener';

			if (kendall_elated_options()->getOptionValue('side_area_type')) {
				$classes[] = 'eltd-' . kendall_elated_options()->getOptionValue('side_area_type');

				if (kendall_elated_options()->getOptionValue('side_area_type') === 'side-menu-slide-with-content') {

					$classes[] = 'eltd-' . kendall_elated_options()->getOptionValue('side_area_slide_with_content_width');

				}
			}
		}

		return $classes;

    }

    add_filter('body_class', 'kendall_elated_side_menu_body_class');
}


if(!function_exists('kendall_elated_get_side_area')) {
	/**
	 * Loads side area HTML
	 */
	function kendall_elated_get_side_area() {

		if (is_active_widget( false, false, 'eltd_side_area_opener' )) {

			$parameters = array(
				'show_side_area_title' => kendall_elated_options()->getOptionValue('side_area_title') !== '' ? true : false, //Dont show title if empty
			);

			kendall_elated_get_module_template_part('templates/sidearea', 'sidearea', '', $parameters);

		}

	}

}

if (!function_exists('kendall_elated_get_side_area_title')) {
	/**
	 * Loads side area title HTML
	 */
	function kendall_elated_get_side_area_title() {

		$parameters = array(
			'side_area_title' => kendall_elated_options()->getOptionValue('side_area_title')
		);

		kendall_elated_get_module_template_part('templates/parts/title', 'sidearea', '', $parameters);

	}

}

if(!function_exists('kendall_elated_get_side_menu_icon_html')) {
    /**
     * Function that outputs html for side area icon opener.
     * @return string generated html
     */
    function kendall_elated_get_side_menu_icon_html() {

        $icon_html = '';

		if (kendall_elated_options()->getOptionValue('side_area_button_icon_pack') !== '') {
			$icon_pack = kendall_elated_options()->getOptionValue('side_area_button_icon_pack');

			$icons = kendall_elated_icon_collections()->getIconCollection($icon_pack);
			$icon_options_field = 'side_area_icon_' . $icons->param;

			if (kendall_elated_options()->getOptionValue($icon_options_field) !== '') {

				$icon = kendall_elated_options()->getOptionValue($icon_options_field);
				$icon_html = kendall_elated_icon_collections()->renderIcon($icon, $icon_pack);

			}

		}

        return $icon_html;
    }
}