<?php
/**
 * Woocommerce configuration file
 */

// Adds theme support for woocommerce
add_theme_support('woocommerce');

//Disable the default WooCommerce stylesheet.
if ( version_compare( WOOCOMMERCE_VERSION, "2.1" ) >= 0 ) {
	add_filter( 'woocommerce_enqueue_styles', '__return_false' );
} else {
	define( 'WOOCOMMERCE_USE_CSS', false );
}

if (!function_exists('kendall_elated_woocommerce_content')){
	/**
	 * Output WooCommerce content.
	 *
	 * This function is only used in the optional 'woocommerce.php' template
	 * which people can add to their themes to add basic woocommerce support
	 * without hooks or modifying core templates.
	 *
	 * @access public
	 * @return void
	 */
	function kendall_elated_woocommerce_content() {

		if ( is_singular( 'product' ) ) {

			while ( have_posts() ) : the_post();

				wc_get_template_part( 'content', 'single-product' );

			endwhile;

		} else {

			if ( have_posts() ) :

				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				woocommerce_product_subcategories();

				while ( have_posts() ) : the_post();

					wc_get_template_part( 'content', 'product' );

				endwhile; // end of the loop.

				woocommerce_product_loop_end();

				do_action('woocommerce_after_shop_loop');

			elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) :

				wc_get_template( 'loop/no-products-found.php' );

			endif;

		}
	}
}

/**
 * Define number of products per page
 */
add_filter('loop_shop_per_page', 'kendall_elated_woocommerce_products_per_page', 20);

/**
 * Set number of related products
 */
add_filter( 'woocommerce_output_related_products_args', 'kendall_elated_woocommerce_related_products_args');

/**
 * Change order of result count and catalog ordering
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 30 );

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 20 );


/**
 * PRODUCT LIST
 *
 * override product list loop title
 */
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
add_action( 'woocommerce_shop_loop_item_title', 'kendall_elated_woocommerce_template_loop_product_title', 10 );

/**
 * move price after title
 */
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price' );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_price' );

/**
 * Remove Link from whole product item
 */
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open' , 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

/**
 * move add to cart button in image overlay
 */
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
add_action( 'kendall_elated_woocommerce_product_overlay', 'woocommerce_template_loop_add_to_cart' );

/**
 * Override Product List Loop Add To Cart
 */
add_filter('woocommerce_loop_add_to_cart_link', 'kendall_elated_woocommerce_loop_add_to_cart_link');

/**
 * Single Product Title template override
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'kendall_elated_woocommerce_template_single_title', 5 );


//Add social share (default woocommerce_share)
add_action('woocommerce_single_product_summary', 'kendall_elated_woocommerce_share', 45);
/**
 * Single Product Sale Flash and Out of Stock Position
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' );
add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash');

add_action( 'woocommerce_before_shop_loop_item_title', 'kendall_elated_woocommerce_out_of_stock' );
add_action( 'woocommerce_product_thumbnails', 'kendall_elated_woocommerce_out_of_stock' );

/**
 * Single Product Share
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 6 );

/**
 * Product Subtitle
 */
add_action( 'woocommerce_single_product_summary', 'kendall_elated_woocommerce_template_single_subtitledo_shortcode', 6 );

/**
 * Single Product override tabs position
 */
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60);



//Sale flash template override
add_filter( 'woocommerce_sale_flash', 'kendall_elated_woocommerce_sale_flash');

//Override Checkout Fields
add_filter('woocommerce_checkout_fields', 'kendall_elated_custom_override_checkout_fields');

//Set Woocommerce button style
//Simple and grouped products
add_action('kendall_elated_woocommerce_add_to_cart_button', 'kendall_elated_get_woocommerce_add_to_cart_button');

//External product
add_action('kendall_elated_woocommerce_add_to_cart_button_external', 'kendall_elated_get_woocommerce_add_to_cart_button_external');

//Variable product
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );
add_action( 'woocommerce_single_variation', 'kendall_elated_woocommerce_single_variation_add_to_cart_button', 20 );

//Apply Coupon Button
add_action('kendall_elated_woocommerce_apply_coupon_button', 'kendall_elated_get_woocommerce_apply_coupon_button');

//Update Cart
add_action('kendall_elated_woocommerce_update_cart_button', 'kendall_elated_get_woocommerce_update_cart_button');

//Proceed To Checkout Button
remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
add_action( 'woocommerce_proceed_to_checkout', 'kendall_elated_woocommerce_button_proceed_to_checkout', 20 );

//Update Totals Button, Shipping Calculator
add_action('kendall_elated_woocommerce_update_totals_button', 'kendall_elated_get_woocommerce_update_totals_button');

//Pay For Order Button, Checkout page
add_filter('woocommerce_pay_order_button_html', 'kendall_elated_woocommerce_pay_order_button_html');

//Place Order Button, Checkout page
add_filter('woocommerce_order_button_html', 'kendall_elated_woocommerce_order_button_html');

//Gravatar image size for reviews
remove_action( 'woocommerce_review_before', 'woocommerce_review_display_gravatar', 10 );
add_action( 'woocommerce_review_before', 'kendall_elated_woocommerce_review_display_gravatar', 10 );