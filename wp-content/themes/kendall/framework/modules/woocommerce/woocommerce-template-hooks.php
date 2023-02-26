<?php

if ( ! function_exists( 'kendall_elated_woocommerce_products_per_page' ) ) {
	/**
	 * Function that sets number of products per page. Default is 12
	 * @return int number of products to be shown per page
	 */
	function kendall_elated_woocommerce_products_per_page() {

		$products_per_page = 12;

		if ( kendall_elated_options()->getOptionValue( 'eltd_woo_products_per_page' ) ) {
			$products_per_page = kendall_elated_options()->getOptionValue( 'eltd_woo_products_per_page' );
		}

		return $products_per_page;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_related_products_args' ) ) {
	/**
	 * Function that sets number of displayed related products. Hooks to woocommerce_output_related_products_args filter
	 *
	 * @param $args array array of args for the query
	 *
	 * @return mixed array of changed args
	 */
	function kendall_elated_woocommerce_related_products_args( $args ) {

		if ( kendall_elated_options()->getOptionValue( 'eltd_woo_product_list_columns' ) ) {

			$related = kendall_elated_options()->getOptionValue( 'eltd_woo_product_list_columns' );
			switch ( $related ) {
				case 'eltd-woocommerce-columns-4':
					$args['posts_per_page'] = 4;
					break;
				case 'eltd-woocommerce-columns-3':
					$args['posts_per_page'] = 3;
					break;
				default:
					$args['posts_per_page'] = 3;
			}

		} else {
			$args['posts_per_page'] = 3;
		}

		return $args;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_template_loop_product_title' ) ) {
	/**
	 * Function for overriding product title template in Product List Loop
	 */
	function kendall_elated_woocommerce_template_loop_product_title() {

		echo '<h3 class="eltd-product-list-product-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h3>';

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_template_single_title' ) ) {
	/**
	 * Function for overriding product title template in Single Product template
	 */
	function kendall_elated_woocommerce_template_single_title() {

		the_title( '<h3 class="eltd-single-product-title">', '</h3>' );

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_sale_flash' ) ) {
	/**
	 * Function for overriding Sale Flash Template
	 *
	 * @return string
	 */
	function kendall_elated_woocommerce_sale_flash() {

		return '<span class="eltd-onsale"><span class="eltd-onsale-inner">' . esc_html__( 'Sale', 'kendall' ) . '</span></span>';

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_out_of_stock' ) ) {
	/**
	 * Out of Stock notice
	 *
	 * @return string
	 */
	function kendall_elated_woocommerce_out_of_stock() {

		global $product;

		if ( ! $product->is_in_stock() ) {
			echo '<span class="eltd-out-of-stock"><span class="eltd-out-of-stock-inner">' . esc_html__( 'Sold', 'kendall' ) . '</span></span>';
		}

	}

}

if ( ! function_exists( 'kendall_elated_custom_override_checkout_fields' ) ) {
	/**
	 * Overrides placeholder values for checkout fields
	 *
	 * @param array all checkout fields
	 *
	 * @return array checkout fields with overriden values
	 */
	function kendall_elated_custom_override_checkout_fields( $fields ) {
		//billing fields
		$args_billing = array(
			'first_name' => esc_html__( 'First name', 'kendall' ),
			'last_name'  => esc_html__( 'Last name', 'kendall' ),
			'company'    => esc_html__( 'Company name', 'kendall' ),
			'address_1'  => esc_html__( 'Address', 'kendall' ),
			'email'      => esc_html__( 'Email', 'kendall' ),
			'phone'      => esc_html__( 'Phone', 'kendall' ),
			'postcode'   => esc_html__( 'Postcode / ZIP', 'kendall' ),
			'state'      => esc_html__( 'State / County', 'kendall' )
		);

		//shipping fields
		$args_shipping = array(
			'first_name' => esc_html__( 'First name', 'kendall' ),
			'last_name'  => esc_html__( 'Last name', 'kendall' ),
			'company'    => esc_html__( 'Company name', 'kendall' ),
			'address_1'  => esc_html__( 'Address', 'kendall' ),
			'postcode'   => esc_html__( 'Postcode / ZIP', 'kendall' )
		);

		//override billing placeholder values
		foreach ( $args_billing as $key => $value ) {
			$fields["billing"]["billing_{$key}"]["placeholder"] = $value;
		}

		//override shipping placeholder values
		foreach ( $args_shipping as $key => $value ) {
			$fields["shipping"]["shipping_{$key}"]["placeholder"] = $value;
		}

		return $fields;
	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_loop_add_to_cart_link' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on product list
	 * Uses HTML from eltd_button
	 *
	 * @return mixed|string
	 */
	function kendall_elated_woocommerce_loop_add_to_cart_link() {

		global $product;

		$button_url     = $product->add_to_cart_url();
		$button_classes = sprintf( '%s %s product_type_%s',
			$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
			$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
			esc_attr( $product->product_type )
		);
		$button_text    = $product->add_to_cart_text();


		$button_attrs   = array(
			'rel'              => 'nofollow',
			'data-product_id'  => esc_attr( $product->id ),
			'data-product_sku' => esc_attr( $product->get_sku() ),
			'data-quantity'    => esc_attr( isset( $quantity ) ? $quantity : 1 )
		);


		$add_to_cart_button = kendall_elated_get_button_html(
			array(
				'type'                   => 'solid',
				'link'                   => $button_url,
				'custom_class'           => $button_classes,
				'text'                   => $button_text,
				'hover_color'            => '#fff',
				'hover_background_color' => '#ebebeb',
				'hover_border_color'     => '#ebebeb',
				'custom_attrs'           => $button_attrs
			)
		);

		return $add_to_cart_button;

	}

}

if ( ! function_exists( 'kendall_elated_get_woocommerce_add_to_cart_button' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on simple and grouped product single template
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_get_woocommerce_add_to_cart_button() {

		global $product;

		$add_to_cart_button = kendall_elated_get_button_html(
			array(
				'custom_class'           => 'single_add_to_cart_button alt',
				'text'                   => $product->single_add_to_cart_text(),
				'html_type'              => 'button',
				'type'                   => 'solid',
				'hover_color'            => '#fff',
				'hover_background_color' => '#ebebeb',
				'hover_border_color'     => '#ebebeb',
			)
		);

		print $add_to_cart_button;

	}

}

if ( ! function_exists( 'kendall_elated_get_woocommerce_add_to_cart_button_external' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on external product single template
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_get_woocommerce_add_to_cart_button_external() {

		global $product;

		$add_to_cart_button = kendall_elated_get_button_html(
			array(
				'link'                   => $product->add_to_cart_url(),
				'custom_class'           => 'single_add_to_cart_button alt',
				'text'                   => $product->single_add_to_cart_text(),
				'type'                   => 'solid',
				'hover_color'            => '#fff',
				'hover_background_color' => '#ebebeb',
				'hover_border_color'     => '#ebebeb',
				'custom_attrs'           => array(
					'rel' => 'nofollow'
				)
			)
		);

		print $add_to_cart_button;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_single_variation_add_to_cart_button' ) ) {
	/**
	 * Function that overrides default woocommerce add to cart button on variable product single template
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_woocommerce_single_variation_add_to_cart_button() {
		global $product;

		$html = '<div class="variations_button">';
		woocommerce_quantity_input( array( 'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( $_POST['quantity'] ) : 1 ) );

		$button = kendall_elated_get_button_html( array(
			'html_type'              => 'button',
			'custom_class'           => 'single_add_to_cart_button alt',
			'type'                   => 'solid',
			'hover_color'            => '#fff',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'text'                   => $product->single_add_to_cart_text()
		) );

		$html .= $button;

		$html .= '<input type="hidden" name="add-to-cart" value="' . absint( $product->id ) . '" />';
		$html .= '<input type="hidden" name="product_id" value="' . absint( $product->id ) . '" />';
		$html .= '<input type="hidden" name="variation_id" class="variation_id" value="" />';
		$html .= '</div>';

		print $html;

	}

}

if ( ! function_exists( 'kendall_elated_get_woocommerce_apply_coupon_button' ) ) {
	/**
	 * Function that overrides default woocommerce apply coupon button
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_get_woocommerce_apply_coupon_button() {

		$coupon_button = kendall_elated_get_button_html( array(
			'html_type'              => 'input',
			'input_name'             => 'apply_coupon',
			'hover_color'            => '#444',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'type'                   => 'solid',
			'text'                   => esc_html__( 'Apply Coupon', 'kendall' )
		) );

		print $coupon_button;

	}

}

if ( ! function_exists( 'kendall_elated_get_woocommerce_update_cart_button' ) ) {
	/**
	 * Function that overrides default woocommerce update cart button
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_get_woocommerce_update_cart_button() {

		$update_cart_button = kendall_elated_get_button_html( array(
			'html_type'              => 'input',
			'input_name'             => 'update_cart',
			'hover_color'            => '#444',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'type'                   => 'solid',
			'text'                   => esc_html__( 'Update Cart', 'kendall' )
		) );

		print $update_cart_button;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_button_proceed_to_checkout' ) ) {
	/**
	 * Function that overrides default woocommerce proceed to checkout button
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_woocommerce_button_proceed_to_checkout() {

		$proceed_to_checkout_button = kendall_elated_get_button_html( array(
			'link'                   => WC()->cart->get_checkout_url(),
			'custom_class'           => 'checkout-button alt wc-forward',
			'hover_color'            => '#444',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'type'                   => 'solid',
			'text'                   => esc_html__( 'Proceed to Checkout', 'kendall' )
		) );

		print $proceed_to_checkout_button;

	}

}

if ( ! function_exists( 'kendall_elated_get_woocommerce_update_totals_button' ) ) {
	/**
	 * Function that overrides default woocommerce update totals button
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_get_woocommerce_update_totals_button() {

		$update_totals_button = kendall_elated_get_button_html( array(
			'html_type'              => 'button',
			'text'                   => esc_html__( 'Update Totals', 'kendall' ),
			'hover_color'            => '#444',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'type'                   => 'solid',
			'custom_attrs'           => array(
				'value' => 1,
				'name'  => 'calc_shipping'
			)
		) );

		print $update_totals_button;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_pay_order_button_html' ) ) {
	/**
	 * Function that overrides default woocommerce pay order button on checkout page
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_woocommerce_pay_order_button_html() {

		$pay_order_button_text = esc_html__( 'Pay for order', 'kendall' );

		$place_order_button = kendall_elated_get_button_html( array(
			'html_type'              => 'input',
			'custom_class'           => 'alt',
			'hover_color'            => '#444',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'type'                   => 'solid',
			'custom_attrs'           => array(
				'id'         => 'place_order',
				'data-value' => $pay_order_button_text
			),
			'text'                   => $pay_order_button_text,
		) );

		return $place_order_button;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_order_button_html' ) ) {
	/**
	 * Function that overrides default woocommerce place order button on checkout page
	 * Uses HTML from eltd_button
	 */
	function kendall_elated_woocommerce_order_button_html() {

		$pay_order_button_text = esc_html__( 'Place Order', 'kendall' );

		$place_order_button = kendall_elated_get_button_html( array(
			'html_type'              => 'input',
			'custom_class'           => 'alt',
			'hover_color'            => '#444',
			'hover_background_color' => '#ebebeb',
			'hover_border_color'     => '#ebebeb',
			'type'                   => 'solid',
			'custom_attrs'           => array(
				'id'         => 'place_order',
				'data-value' => $pay_order_button_text,
				'name'       => 'woocommerce_checkout_place_order'
			),
			'text'                   => $pay_order_button_text,
		) );

		return $place_order_button;

	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_template_single_subtitledo_shortcode' ) ) {

	function kendall_elated_woocommerce_template_single_subtitledo_shortcode() {

		$product_subtitle = get_post_meta( get_the_ID(), 'eltd_product_subtitle_meta', true );
		if ( $product_subtitle !== '' ) {
			echo '<p class="eltd-single-product-subtitle">' . $product_subtitle . '</p>';
		}

	}

}

if(!function_exists('kendall_elated_woocommerce_review_display_gravatar')){

	function kendall_elated_woocommerce_review_display_gravatar($comment){
		$html = '';
		$html .= '<div class="eltd-woocommerce-comment-image">';
		$html .= get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '60' ), '' );
		$html .= '</div>';
		print $html ;
	}

}