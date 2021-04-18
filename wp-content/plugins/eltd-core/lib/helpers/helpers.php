<?php

if(!function_exists('eltd_core_version_class')) {
    /**
     * Adds plugins version class to body
     * @param $classes
     * @return array
     */
    function eltd_core_version_class($classes) {
        $classes[] = 'eltd-core-'.ELATED_CORE_VERSION;

        return $classes;
    }

    add_filter('body_class', 'eltd_core_version_class');
}

if(!function_exists('eltd_core_theme_installed')) {
    /**
     * Checks whether theme is installed or not
     * @return bool
     */
    function eltd_core_theme_installed() {
        return defined('ELATED_ROOT');
    }
}

if (!function_exists('eltd_core_get_carousel_slider_array')){
    /**
     * Function that returns associative array of carousels,
     * where key is term slug and value is term name
     * @return array
     */
    function eltd_core_get_carousel_slider_array() {
        $carousels_array = array();
	    $args = array(
		    'taxonomy' => 'carousels_category'
	    );
	    $terms = get_terms($args);

        if (is_array($terms) && count($terms)) {
            $carousels_array[''] = '';
            foreach ($terms as $term) {
                $carousels_array[$term->slug] = $term->name;
            }
        }

        return $carousels_array;
    }
}

if(!function_exists('eltd_core_get_carousel_slider_array_vc')) {
    /**
     * Function that returns array of carousels formatted for Visual Composer
     *
     * @return array array of carousels where key is term title and value is term slug
     *
     * @see eltd_core_get_carousel_slider_array
     */
    function eltd_core_get_carousel_slider_array_vc() {
        return array_flip(eltd_core_get_carousel_slider_array());
    }
}

if(!function_exists('eltd_core_get_shortcode_module_template_part')) {
	/**
	 * Loads module template part.
	 *
	 * @param string $shortcode name of the shortcode folder
	 * @param string $template name of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return string
	 */
	function eltd_core_get_shortcode_module_template_part($shortcode,$template, $slug = '', $params = array()) {

		//HTML Content from template
		$html = '';
		$template_path = ELATED_CORE_CPT_PATH.'/'.$shortcode.'/shortcodes/templates';

		$temp = $template_path.'/'.$template;
		if(is_array($params) && count($params)) {
			extract($params);
		}

		$template = '';

		if($temp !== '') {
			if($slug !== '') {
				$template = "{$temp}-{$slug}.php";
			}
			$template = $temp.'.php';
		}
		if($template) {
			ob_start();
			include($template);
			$html = ob_get_clean();
		}

		return $html;
	}
}

if(!function_exists('eltd_core_init_shortcode_loader')) {
	function eltd_core_init_shortcode_loader() {

		include_once 'shortcode-loader.php';
	}

	add_action('kendall_elated_shortcode_loader', 'eltd_core_init_shortcode_loader');
}

/**
 * Function that checks if url exists
 *
 * @param $url string url to check
 *
 * @return bool
 */
function kendall_elated_url_exists($url) {
	$url = str_replace("http://", "", $url);
	if(strstr($url, "/")) {
		$url    = explode("/", $url, 2);
		$url[1] = "/".$url[1];
	} else {
		$url = array($url, "/");
	}

	$fh = fsockopen($url[0], 80);
	if($fh) {
		fputs($fh, "GET ".$url[1]." HTTP/1.1\nHost:".$url[0]."\n\n");
		if(fread($fh, 22) == "HTTP/1.1 404 Not Found") {
			return false;
		} else {
			return true;
		}

	} else {
		return false;
	}
}

if(!function_exists('eltd_core_set_portfolio_ajax_url')){
	/**
     * load themes ajax functionality
     *
     */
	function eltd_core_set_portfolio_ajax_url() {
		echo '<script type="application/javascript">var eltdCoreAjaxUrl = "'.admin_url('admin-ajax.php').'"</script>';
	}
	add_action('wp_enqueue_scripts', 'eltd_core_set_portfolio_ajax_url');

}
/**
	 * Loads more function for portfolio.
	 *
	 */
if(!function_exists('eltd_core_portfolio_ajax_load_more')){

	function eltd_core_portfolio_ajax_load_more(){

	$return_obj = array();
	$shortcode_params = array();
	$activeFilterCat = '';
	if (!empty($_POST['type'])) {
        $shortcode_params['type'] = $_POST['type'];
    }
	if (!empty($_POST['columns'])) {
        $shortcode_params['columns'] = $_POST['columns'];
    }
	if (!empty($_POST['gridSize'])) {
        $shortcode_params['gridSize'] = $_POST['gridSize'];
    }
	if (!empty($_POST['orderBy'])) {
        $shortcode_params['order_by'] = $_POST['orderBy'];
    }
	if (!empty($_POST['order'])) {
        $shortcode_params['order'] = $_POST['order'];
    }
	if (!empty($_POST['number'])) {
        $shortcode_params['number'] = $_POST['number'];
    }
	if (!empty($_POST['imageSize'])) {
        $shortcode_params['image_size'] = $_POST['imageSize'];
    }
	if (!empty($_POST['filter'])) {
        $shortcode_params['filter'] = $_POST['filter'];
    }
	if (!empty($_POST['filterOrderBy'])) {
        $shortcode_params['filter_order_by'] = $_POST['filterOrderBy'];
    }
	if (!empty($_POST['category'])) {
        $shortcode_params['category'] = $_POST['category'];
    }
	if (!empty($_POST['selectedProjectes'])) {
        $shortcode_params['selected_projects'] = $_POST['selectedProjectes'];
    }
	if (!empty($_POST['showLoadMore'])) {
        $shortcode_params['show_load_more'] = $_POST['showLoadMore'];
    }
	if (!empty($_POST['titleTag'])) {
        $shortcode_params['title_tag'] = $_POST['titleTag'];
    }
	if (!empty($_POST['nextPage'])) {
        $shortcode_params['next_page'] = $_POST['nextPage'];
    }
	if (!empty($_POST['activeFilterCat'])) {
        $shortcode_params['active_filter_cat'] = $_POST['activeFilterCat'];
    }

	$html = '';

	$port_list = new \ElatedCore\CPT\Portfolio\Shortcodes\PortfolioList();
	$query_array = $port_list->getQueryArray($shortcode_params);
	$query_results = new \WP_Query($query_array);

	if($query_results->have_posts()):
		while ( $query_results->have_posts() ) : $query_results->the_post();

			$shortcode_params['current_id'] = get_the_ID();
			$shortcode_params['image_style']   = $port_list->getItemImageStyle(get_the_ID());
			$shortcode_params['thumb_size'] = $port_list->getImageSize($shortcode_params);
			$shortcode_params['like_icon_html'] = $port_list->getLikeIconHtml($shortcode_params);
			$shortcode_params['category_html'] = $port_list->getItemCategoriesHtml($shortcode_params);
			$shortcode_params['categories'] = $port_list->getItemCategories($shortcode_params);
            $shortcode_params['article_masonry_size'] = $port_list->getMasonrySize($shortcode_params);
            $shortcode_params['item_link'] = $port_list->getItemLink($shortcode_params);

			$html .= eltd_core_get_shortcode_module_template_part('portfolio',$shortcode_params['type'], '', $shortcode_params);

		endwhile;

	wp_reset_postdata();
	else:
		$html .= '<p>'.esc_html__('Sorry, no posts matched your criteria.', 'eltd_core') .'</p>';
	endif;

	$return_obj = array(
		'html' => $html,
	);


	echo json_encode($return_obj); exit;
}
}


add_action('wp_ajax_nopriv_eltd_core_portfolio_ajax_load_more', 'eltd_core_portfolio_ajax_load_more');
add_action( 'wp_ajax_eltd_core_portfolio_ajax_load_more', 'eltd_core_portfolio_ajax_load_more' );

if(!function_exists('eltd_core_porftolio_standard_pagination_html')){
	/**
	 * Generate html for portfolio standard pagination
	 *
	 */
	function eltd_core_porftolio_standard_pagination_html($max_pages){

		$html = '';
		$html .= '<div class="eltd-pagination eltd-ptf-standard-pag-holder">';
		$html .= '<ul>';

		$html .= '<li class="eltd-pagination-prev">';
		$html .= '<span class="arrow_carrot-left eltd-pagination-icon"></span>';
		$html .= '</li>';
		for($i = 1; $i<= $max_pages; $i++){
			$html .= '<li data-current-page = '.$i.'>';
			$html .= '<span>'.esc_html($i).'</span>';
			$html .= '</li>';
		}
		$html .= '<li class="eltd-pagination-next">';
		$html .= '<span class="arrow_carrot-right eltd-pagination-icon"></span>';
		$html .= '</li>';

		$html .= '<ul>';
		$html .= '</div>';

		return $html;
	}

}

/**
 * Edit Yith Wishlist options
 */
function kendall_elated_wishlist_admin_options( $options ) {

	if ( isset( $options['general_settings']) && isset($options['general_settings']['add_to_wishlist_position']) ) {

		$positions = $options['general_settings']['add_to_wishlist_position']['options'];
		$custom_positions = array(
			'title' => esc_html__( 'After Product Title', 'eltd_core' )
		);
		$positions = array_merge( $custom_positions, $positions );
		$options['general_settings']['add_to_wishlist_position']['options'] = $positions;

		$options['general_settings']['add_to_wishlist_text']['default'] = esc_html__( 'Like', 'eltd_core' );
		$options['general_settings']['browse_wishlist_text']['default'] = esc_html__( 'Liked', 'eltd_core' );

		return $options;

	}

}
add_filter( 'yith_wcwl_admin_options', 'kendall_elated_wishlist_admin_options', 10, 1 );

function kendall_elated_add_to_wishlist_position( $positions ) {

	if ( eltd_core_theme_installed() ) {
		//Priority 100, after share
		$positions['title'] = array( 'hook' => 'woocommerce_share', 'priority' => 100 );
	}

	return $positions;

}
add_filter('yith_wcwl_positions', 'kendall_elated_add_to_wishlist_position' );


if(!function_exists('eltd_core_add_user_custom_fields')){
	function eltd_core_add_user_custom_fields($user_contact) {

		/**
		 * Function that add custom user fields
		 **/
		$user_contact['facebook']		= esc_html__( 'Facebook', 'kendall');
		$user_contact['twitter']		= esc_html__( 'Twitter', 'kendall');
		$user_contact['googleplus']		= esc_html__( 'Google Plus', 'kendall' );
		$user_contact['instagram']		= esc_html__( 'Instagram', 'kendall' );

		return $user_contact;

	}

	add_filter( 'user_contactmethods', 'eltd_core_add_user_custom_fields' );
}