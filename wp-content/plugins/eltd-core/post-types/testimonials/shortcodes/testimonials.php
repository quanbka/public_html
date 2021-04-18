<?php

namespace ElatedCore\CPT\Testimonials\Shortcodes;


use ElatedCore\Lib;

/**
 * Class Testimonials
 * @package ElatedCore\CPT\Testimonials\Shortcodes
 */
class Testimonials implements Lib\ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_testimonials';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Portfolio category filter
		add_filter( 'vc_autocomplete_eltd_testimonials_category_callback', array(
			&$this,
			'testimonialsCategoryAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio category render
		add_filter( 'vc_autocomplete_eltd_testimonials_category_render', array(
			&$this,
			'testimonialsCategoryAutocompleteRender',
		), 10, 1 ); // Get suggestion(find). Must return an array
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 *
	 * @see vc_map()
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map( array(
				'name'                      => esc_html__('Testimonials','eltd_core'),
				'base'                      => $this->base,
				'category'                  => esc_html__('by ELATED','eltd_core'),
				'icon'                      => 'icon-wpb-testimonials extended-custom-icon',
				'allowed_container_element' => 'vc_row',
				'params'                    => array(
					array(
						'type'        => 'autocomplete',
						'admin_label' => true,
						'heading'     => esc_html__('Category','eltd_core'),
						'param_name'  => 'category',
						'description' => esc_html__('Category Slug (leave empty for all)','eltd_core')
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => esc_html__('Number','eltd_core'),
						'param_name'  => 'number',
						'value'       => '',
						'description' => esc_html__('Number of Testimonials','eltd_core')
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__('Type','eltd_core'),
						'param_name'  => 'type',
						'value'       => array(
							esc_html__('With Icon','eltd_core') => 'with-icon',
							esc_html__('With Image on Top','eltd_core') => 'with-image',
							esc_html__('Standard','eltd_core')  => 'standard',
							esc_html__('Cards','eltd_core')     => 'cards',
						),
						'save_always' => true,
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__('Skin','eltd_core'),
						'param_name'  => 'skin',
						'value'       => array(
							esc_html__('Standard','eltd_core') => '',
							esc_html__('Light','eltd_core')    => 'light',
							esc_html__('Dark' ,'eltd_core')   => 'dark',
						),
						'save_always' => true
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__('Carousel Items','eltd_core'),
						'param_name'  => 'carousel_items',
						'value'       => array(
							'3' => '3',
							'4' => '4',
							'5' => '5',
						),
						'description' =>esc_html__( 'Insert Number of Carousel Items (Default 3)','eltd_core'),
						'dependency'  => array(
							'element' => 'type',
							'value'   => array(
								'cards',
								'standard'
							)
						)
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     =>esc_html__( 'Show in two rows?','eltd_core'),
						'param_name'  => 'two_rows',
						'value'       => array(
							esc_html__('No','eltd_core')  => 'no',
							esc_html__('Yes','eltd_core') => 'yes'
						),
						'save_always' => true,
						'dependency'  => array(
							'element' => 'type',
							'value'   => array(
								'cards',
								'standard'
							)
						)
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     =>esc_html__( 'Navigation','eltd_core'),
						'param_name'  => 'navigation',
						'value'       => array(
							esc_html__('No','eltd_core')  => 'no',
							esc_html__(	'Yes','eltd_core') => 'yes'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     =>esc_html__( 'Pagination','eltd_core'),
						'param_name'  => 'pagination',
						'value'       => array(
							esc_html__('No','eltd_core')  => 'no',
							esc_html__('Yes','eltd_core') => 'yes'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => esc_html__('Autoplay speed','eltd_core'),
						'param_name'  => 'autoplay_speed',
						'value'       => '',
					)
				)
			) );
		}
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {

		$args   = array(
			'number'         => '-1',
			'category'       => '',
			'type'           => 'with_icon',
			'skin'           => '',
			'carousel_items' => '3',
			'two_rows'       => 'no',
			'navigation'     => 'no',
			'pagination'     => 'no',
			'autoplay_speed' => ''
		);
		$params = shortcode_atts( $args, $atts );

		extract( $params );

		$query_args = $this->getQueryParams( $params );
		$query = new \WP_Query( $query_args );
		$params['query'] = $query;
		$params['this_object'] = $this;
		$params['data_attr']  = $this->getDataParams( $params );
		$params['holder_classes'] = $this->getHolderClasses($params);

		$html = eltd_core_get_shortcode_module_template_part( 'testimonials', 'testimonials-holder', '', $params );
		return $html;
	}

	private function getHolderClasses($params){
		$classes = array();
		if(isset($params['type']) && $params['type'] !== ''){
			$classes[] = 'eltd-'.$params['type'];
		}
		if(isset($params['skin']) && $params['skin'] !== ''){
			$classes[] = $params['skin'];
		}

		return implode(' ',$classes);

	}

	/**
	 * Generates testimonial data attribute array
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getDataParams( $params ) {

		$data_attr = array();

		if ( $params['carousel_items'] !== '' ) {
			$data_attr['data-items'] = $params['carousel_items'];
		}
		if ( $params['autoplay_speed'] !== '' ) {
			$data_attr['data-autoplay-speed'] = $params['autoplay_speed'];
		}
		if ( $params['navigation'] !== '' ) {
			$data_attr['data-navigation'] = $params['navigation'];
		}
		if ( $params['pagination'] !== '' ) {
			$data_attr['data-pagination'] = $params['pagination'];
		}

		return $data_attr;

	}

	/**
	 * Generates testimonials query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getQueryParams( $params ) {

		$args = array(
			'post_type'      => 'testimonials',
			'orderby'        => 'date',
			'order'          => 'DESC',
			'posts_per_page' => $params['number']
		);

		if ( $params['category'] != '' ) {
			$args['testimonials_category'] = $params['category'];
		}

		return $args;
	}


	/**
	 * Generates testimonials icon html
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getIconHtml($id) {

		$icon_pack  = get_post_meta( $id, 'testimonial_icon_pack', true );
		$icons      = kendall_elated_icon_collections()->getIconCollection( $icon_pack );
		$icon_field = 'testimonial_icon_' . $icons->param;
		$icon       = get_post_meta( $id , $icon_field, true );

		$icon_html = '';
		if ( $icon !== '' ) {
			$icon_html = kendall_elated_icon_collections()->renderIcon( $icon, $icon_pack );
		}

		return $icon_html;


	}

	public function getFeaturedImageStyle($id){
		$post_thumbnail_style= '';

		$post_thumbnail_id = get_post_thumbnail_id($id);
		$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );

		if($post_thumbnail_url !==''){
			$post_thumbnail_style = 'background-image: url('.esc_url($post_thumbnail_url).')';
		}
		return $post_thumbnail_style;

	}

	/**
	 * Filter testimonial categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function testimonialsCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_testimonial_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'testimonials_category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_testimonial_title'] ) > 0 ) ? esc_html__( 'Category', 'eltd_core' ) . ': ' . $value['portfolio_testimonial_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find testimonials by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function testimonialsCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get testimonial category
			$testimonial_category = get_term_by( 'slug', $query, 'testimonials_category' );
			if ( is_object( $testimonial_category ) ) {

				$testimonial_category_slug = $testimonial_category->slug;
				$testimonial_category_title = $testimonial_category->name;

				$testimonial_category_title_display = '';
				if ( ! empty( $testimonial_category_title ) ) {
					$testimonial_category_title_display = esc_html__( 'Category', 'eltd_core' ) . ': ' . $testimonial_category_title;
				}

				$data          = array();
				$data['value'] = $testimonial_category_slug;
				$data['label'] = $testimonial_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

}