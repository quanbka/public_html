<?php
namespace KendallElated\Modules\Shortcodes\ProductList;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class ProductList
 */
class ProductList implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'eltd_product_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );


		//Portfolio category filter
		add_filter( 'vc_autocomplete_eltd_product_list_category_callback', array(
			&$this,
			'productCategoryAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio category render
		add_filter( 'vc_autocomplete_eltd_product_list_category_render', array(
			&$this,
			'productCategoryAutocompleteRender',
		), 10, 1 ); // Get suggestion(find). Must return an array

	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name'                      => esc_html__( 'Elated Product List', 'kendall' ),
			'base'                      => $this->base,
			'category'                  => esc_html__( 'by ELATED','kendall' ),
			'icon'                      => 'icon-wpb-product extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type' => 'textfield',
					'param_name' => 'products_per_page',
					'heading' =>esc_html__(  'Products per Page','kendall' ),
					'description' => '',
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'column_number',
					'heading' =>esc_html__(  'Column Number','kendall' ),
					'value' => array(
						esc_html__( 'Two','kendall' ) => '2',
						esc_html__( 'Three','kendall' ) => '3',
						esc_html__( 	'Four','kendall' ) => '4',
						esc_html__( 	'Five','kendall' ) => '5',
						esc_html__( 	'Six','kendall' ) => '6',
					),
					'save_always'  => true,
					'description' => '',
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'order_by',
					'heading' => esc_html__( 'Order by','kendall' ),
					'value' => array(
			esc_html__( 'Date','kendall' ) => 'date',
			esc_html__( 'Author','kendall' ) => 'author',
			esc_html__( 'Title','kendall' ) => 'title'
					),
					'save_always'  => true,
					'description' => '',
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'order',
					'heading' =>esc_html__(  'Order','kendall' ),
					'value' => array(
			esc_html__( 'Asc','kendall' ) => 'asc',
			esc_html__( 'Desc' ,'kendall' )=> 'desc'
					),
					'save_always'  => true,
					'description' => '',
					'admin_label' => true
				),
				array(
					'type'        => 'autocomplete',
					'heading'     => esc_html__( 'One-Category Product List','kendall' ),
					'param_name'  => 'category',
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'param_name' => 'enable_filter',
					'heading' => esc_html__( 'Enable Filter','kendall' ),
					'value'   => array(
						esc_html__( 'No','kendall' ) => 'no',
						esc_html__( 'Yes' ,'kendall' )=> 'yes'
					),
					'description' => '',
					'admin_label' => true
				)
			)
		) );

	}

	public function render( $atts, $content = null ) {

		$args = array(
			'products_per_page' => '-1',
			'column_number'     => '4',
			'enable_filter'     => '',
			'order_by'          => '',
			'order'             => '',
			'category'          => ''
		);

		$params = shortcode_atts( $args, $atts );
		extract($params);
		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'posts_per_page'      => $products_per_page,
			'order_by'            => $order_by,
			'order'               => $order,
			'ignore_sticky_posts' => true
		);

		if(!empty($category)){
			$args['product_cat'] = $category;
		}

		$query = new \WP_Query( $args );

		$classes = $this->getHolderClasses($params);
		$filter_params['filter_categories'] = $this->getFilterCategories($params);


		$html = '<div class="eltd-product-list-holder woocommerce '.esc_attr($classes).'">';

		if($enable_filter == 'yes'){
			$html .= kendall_elated_get_shortcode_module_template_part( 'templates/product-list-filter', 'product-list', '', $filter_params );
		}

		if ( $query->have_posts() ) {
			$html .= '<ul class="eltd-product-list-items products clearfix">';

			while ( $query->have_posts() ) {
				$query->the_post();

				$html .= kendall_elated_get_shortcode_module_template_part( 'templates/product-list', 'product-list');

			}
            wp_reset_postdata();
			$html .= '</ul>';
		} else {

			$html .= esc_html__( 'No products found', 'kendall' );

		}
		$html .= '</div>'; //close eltd-product-list-holder

		return $html;
	}

	/**
	 * Generate Column Number css class
	 *
	 * @param $params
	 * @return string
	 */
	private function getHolderClasses($params){

		$class = array();

		if(!empty($params['column_number'])){

			$class[] = 'columns-'.$params['column_number'];

		}

		if(!empty($params['enable_filter']) && $params['enable_filter'] == 'yes'){
			$class[] = 'eltd-product-list-with-filter';
		}

		return implode(' ', $class);

	}

	/**
	 * Generates filter categories array
	 *
	 * @param $params
	 *
	 *
	 *
	 *
	 * * @return array
	 */
	public function getFilterCategories( $params ) {

		$cat_id       = 0;
		$top_category = '';

		if ( ! empty( $params['category'] ) ) {

			$top_category = get_term_by( 'slug', $params['category'], 'product_cat' );
			if ( isset( $top_category->term_id ) ) {
				$cat_id = $top_category->term_id;
			}

		}

		$args = array(
			'taxonomy' => 'product_cat',
			'child_of' => $cat_id
		);

		$filter_categories = get_terms( $args );

		return $filter_categories;

	}

	/**
	 * Filter product categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function productCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS product_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'product_cat' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['product_category_title'] ) > 0 ) ? esc_html__( 'Category', 'kendall' ) . ': ' . $value['product_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find product by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function productCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get product category
			$product_category = get_term_by( 'slug', $query, 'product_cat' );
			if ( is_object( $product_category ) ) {

				$product_category_slug = $product_category->slug;
				$product_category_title = $product_category->name;

				$product_category_title_display = '';
				if ( ! empty( $product_category_title ) ) {
					$product_category_title_display = esc_html__( 'Category', 'kendall' ) . ': ' . $product_category_title;
				}

				$data          = array();
				$data['value'] = $product_category_slug;
				$data['label'] = $product_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
}