<?php
namespace KendallElated\Modules\Shortcodes\Product;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Message
 */
class Product implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'eltd_product';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Filters For autocomplete param:
		//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
		add_filter( 'vc_autocomplete_eltd_product_id_callback', array(
			&$this,
			'productIdAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array
		add_filter( 'vc_autocomplete_eltd_product_id_render', array(
			&$this,
			'productIdAutocompleteRender',
		), 10, 1 ); // Render exact product. Must return an array (label,value)
		//For param: ID default value filter
		add_filter( 'vc_form_fields_render_field_eltd_product_param_value', array(
			&$this,
			'productIdDefaultValue',
		), 10, 4 ); // Defines default value for param if not provided. Takes from other param value.
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
			'name'                      => esc_html__( 'Elated Product', 'kendall' ),
			'base'                      => $this->base,
			'category'                  => esc_html__( 'by ELATED','kendall' ),
			'icon'                      => 'icon-wpb-product extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'autocomplete',
					'heading'     => esc_html__( 'Select identificator', 'kendall' ),
					'param_name'  => 'id',
					'description' => esc_html__( 'Input product ID or product SKU or product title to see suggestions', 'kendall' ),
				),
				array(
					'type'       => 'hidden',
					// This will not show on render, but will be used when defining value for autocomplete
					'param_name' => 'sku',
				),
			)
		) );

	}

	public function render( $atts, $content = null ) {

		$args = array(
			'id' => ''
		);

		$params = shortcode_atts( $args, $atts );

		$args = array(
			'post_type'           => 'product',
			'post_status'         => 'publish',
			'post__in'            => array( $params['id'] ),
			'ignore_sticky_posts' => true
		);

		$query = new \WP_Query( $args );

		$html = '';

		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();

				$html .= kendall_elated_get_shortcode_module_template_part( 'templates/product', 'product' );

			}
            wp_reset_postdata();
		} else {

			$html .= esc_html__( 'No products found', 'kendall' );

		}

		return $html;
	}

	/**
	 * Suggester for autocomplete by id/name/title/sku
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return array - id's from products with title/sku.
	 */
	public function productIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$product_id      = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
					FROM {$wpdb->posts} AS a
					LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
					WHERE a.post_type = 'product' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )", $product_id > 0 ? $product_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];
				$data['label'] = esc_html__( 'Id', 'kendall' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'kendall' ) . ': ' . $value['title'] : '' ) . ( ( strlen( $value['sku'] ) > 0 ) ? ' - ' . esc_html__( 'Sku', 'kendall' ) . ': ' . $value['sku'] : '' );
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
	public function productIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get product
			$product_object = wc_get_product( (int) $query );
			if ( is_object( $product_object ) ) {
				$product_sku   = $product_object->get_sku();
				$product_title = $product_object->get_title();
				$product_id    = $product_object->id;

				$product_sku_display = '';
				if ( ! empty( $product_sku ) ) {
					$product_sku_display = ' - ' . esc_html__( 'Sku', 'kendall' ) . ': ' . $product_sku;
				}

				$product_title_display = '';
				if ( ! empty( $product_title ) ) {
					$product_title_display = ' - ' . esc_html__( 'Title', 'kendall' ) . ': ' . $product_title;
				}

				$product_id_display = esc_html__( 'Id', 'kendall' ) . ': ' . $product_id;

				$data          = array();
				$data['value'] = $product_id;
				$data['label'] = $product_id_display . $product_title_display . $product_sku_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Replace single product sku to id.
	 * @since 4.4
	 *
	 * @param $current_value
	 * @param $param_settings
	 * @param $map_settings
	 * @param $atts
	 *
	 * @return bool|string
	 */
	public function productIdDefaultValue( $current_value, $param_settings, $map_settings, $atts ) {
		$value = trim( $current_value );
		if ( strlen( trim( $current_value ) ) === 0 && isset( $atts['sku'] ) && strlen( $atts['sku'] ) > 0 ) {
			$value = $this->productIdDefaultValueFromSkuToId( $atts['sku'] );
		}

		return $value;
	}

	/**
	 * Return ID of product by provided SKU of product.
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool
	 */
	public function productIdDefaultValueFromSkuToId( $query ) {
		$result = $this->productIdAutocompleteSuggesterExactSku( $query );

		return isset( $result['value'] ) ? $result['value'] : false;
	}

	/**
	 * Find product by SKU
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function productIdAutocompleteSuggesterExactSku( $query ) {
		global $wpdb;
		$query        = trim( $query );
		$product_id   = $wpdb->get_var( $wpdb->prepare( "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key='_sku' AND meta_value='%s' LIMIT 1", stripslashes( $query ) ) );
		$product_data = get_post( $product_id );
		if ( 'product' !== $product_data->post_type ) {
			return '';
		}

		$product_object = wc_get_product( $product_data );
		if ( is_object( $product_object ) ) {

			$product_sku   = $product_object->get_sku();
			$product_title = $product_object->get_title();
			$product_id    = $product_object->id;

			$product_sku_display = '';
			if ( ! empty( $product_sku ) ) {
				$product_sku_display = ' - ' . esc_html__( 'Sku', 'kendall' ) . ': ' . $product_sku;
			}

			$product_title_display = '';
			if ( ! empty( $product_title ) ) {
				$product_title_display = ' - ' . esc_html__( 'Title', 'kendall' ) . ': ' . $product_title;
			}

			$product_id_display = esc_html__( 'Id', 'kendall' ) . ': ' . $product_id;

			$data          = array();
			$data['value'] = $product_id;
			$data['label'] = $product_id_display . $product_title_display . $product_sku_display;

			return ! empty( $data ) ? $data : false;
		}

		return false;
	}
}