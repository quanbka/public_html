<?php
/**
 * Woocommerce helper functions
 */

if ( ! function_exists( 'kendall_elated_woocommerce_body_class' ) ) {
	/**
	 * Function that adds class on body for Woocommerce
	 *
	 * @param $classes
	 *
	 * @return array
	 */
	function kendall_elated_woocommerce_body_class( $classes ) {
		if ( kendall_elated_is_woocommerce_page() ) {
			$classes[] = 'eltd-woocommerce-page';
			if ( is_singular( 'product' ) ) {
				$classes[] = 'eltd-woocommerce-single-page';
			}
		}

		return $classes;
	}

	add_filter( 'body_class', 'kendall_elated_woocommerce_body_class' );

}

if ( ! function_exists( 'kendall_elated_woocommerce_columns_class' ) ) {
	/**
	 * Function that adds number of columns class to header tag
	 *
	 * @param array array of classes from main filter
	 *
	 * @return array array of classes with added bottom header appearance class
	 */
	function kendall_elated_woocommerce_columns_class( $classes ) {

		if ( in_array( 'woocommerce', $classes ) ) {

			$products_list_number = kendall_elated_options()->getOptionValue( 'eltd_woo_product_list_columns' );
			$classes[]            = $products_list_number;

		}

		return $classes;
	}

	add_filter( 'body_class', 'kendall_elated_woocommerce_columns_class' );
}

if ( ! function_exists( 'kendall_elated_is_woocommerce_page' ) ) {
	/**
	 * Function that checks if current page is woocommerce shop, product or product taxonomy
	 * @return bool
	 *
	 * @see is_woocommerce()
	 */
	function kendall_elated_is_woocommerce_page() {
		if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) {
			return is_woocommerce();
		} elseif ( function_exists( 'is_cart' ) && is_cart() ) {
			return is_cart();
		} elseif ( function_exists( 'is_checkout' ) && is_checkout() ) {
			return is_checkout();
		} elseif ( function_exists( 'is_account_page' ) && is_account_page() ) {
			return is_account_page();
		} elseif ( function_exists( 'yith_wcwl_is_wishlist_page' ) && yith_wcwl_is_wishlist_page() ) {
			return yith_wcwl_is_wishlist_page();
		}
	}
}

if ( ! function_exists( 'kendall_elated_is_woocommerce_shop' ) ) {
	/**
	 * Function that checks if current page is shop or product page
	 * @return bool
	 *
	 * @see is_shop()
	 */
	function kendall_elated_is_woocommerce_shop() {
		return function_exists( 'is_shop' ) && ( is_shop() || is_product() );
	}
}

if ( ! function_exists( 'kendall_elated_get_woo_shop_page_id' ) ) {
	/**
	 * Function that returns shop page id that is set in WooCommerce settings page
	 * @return int id of shop page
	 */
	function kendall_elated_get_woo_shop_page_id() {
		if ( kendall_elated_is_woocommerce_installed() ) {
			return get_option( 'woocommerce_shop_page_id' );
		}
	}
}

if ( ! function_exists( 'kendall_elated_is_product_category' ) ) {
	function kendall_elated_is_product_category() {
		return function_exists( 'is_product_category' ) && is_product_category();
	}
}

if ( ! function_exists( 'kendall_elated_load_woo_assets' ) ) {
	/**
	 * Function that checks whether WooCommerce assets needs to be loaded.
	 *
	 * @see kendall_elated_is_woocommerce_page()
	 * @see kendall_elated_has_woocommerce_shortcode()
	 * @see kendall_elated_has_woocommerce_widgets()
	 * @return bool
	 */

	function kendall_elated_load_woo_assets() {
		return kendall_elated_is_woocommerce_installed() && ( kendall_elated_is_woocommerce_page() ||
		                                                          kendall_elated_has_woocommerce_shortcode() || kendall_elated_has_woocommerce_widgets() );
	}
}

if ( ! function_exists( 'kendall_elated_has_woocommerce_shortcode' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function kendall_elated_has_woocommerce_shortcode() {
		$woocommerce_shortcodes = array(
			'woocommerce_order_tracking',
			'add_to_cart',
			'product',
			'products',
			'product_categories',
			'product_category',
			'recent_products',
			'featured_products',
			'woocommerce_messages',
			'woocommerce_cart',
			'woocommerce_checkout',
			'woocommerce_my_account',
			'woocommerce_edit_address',
			'woocommerce_change_password',
			'woocommerce_view_order',
			'woocommerce_pay',
			'woocommerce_thankyou',
			'eltd_product_list'
		);

		foreach ( $woocommerce_shortcodes as $woocommerce_shortcode ) {
			$has_shortcode = kendall_elated_has_shortcode( $woocommerce_shortcode );

			if ( $has_shortcode ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'kendall_elated_has_woocommerce_widgets' ) ) {
	/**
	 * Function that checks if current page has at least one of WooCommerce shortcodes added
	 * @return bool
	 */
	function kendall_elated_has_woocommerce_widgets() {
		$widgets_array = array(
			'eltd_woocommerce_dropdown_cart',
			'woocommerce_widget_cart',
			'woocommerce_layered_nav',
			'woocommerce_layered_nav_filters',
			'woocommerce_price_filter',
			'woocommerce_product_categories',
			'woocommerce_product_search',
			'woocommerce_product_tag_cloud',
			'woocommerce_products',
			'woocommerce_recent_reviews',
			'woocommerce_recently_viewed_products',
			'woocommerce_top_rated_products'
		);

		foreach ( $widgets_array as $widget ) {
			$active_widget = is_active_widget( false, false, $widget );

			if ( $active_widget ) {
				return true;
			}
		}

		return false;
	}
}

if ( ! function_exists( 'kendall_elated_get_woocommerce_pages' ) ) {
	/**
	 * Function that returns all url woocommerce pages
	 * @return array array of WooCommerce pages
	 *
	 * @version 0.1
	 */
	function kendall_elated_get_woocommerce_pages() {
		$woo_pages_array = array();

		if ( kendall_elated_is_woocommerce_installed() ) {
			if ( get_option( 'woocommerce_shop_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( 'woocommerce_shop_page_id' ) );
			}
			if ( get_option( 'woocommerce_cart_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( 'woocommerce_cart_page_id' ) );
			}
			if ( get_option( 'woocommerce_checkout_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( 'woocommerce_checkout_page_id' ) );
			}
			if ( get_option( 'woocommerce_pay_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_pay_page_id ' ) );
			}
			if ( get_option( 'woocommerce_thanks_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_thanks_page_id ' ) );
			}
			if ( get_option( 'woocommerce_myaccount_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_myaccount_page_id ' ) );
			}
			if ( get_option( 'woocommerce_edit_address_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_edit_address_page_id ' ) );
			}
			if ( get_option( 'woocommerce_view_order_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_view_order_page_id ' ) );
			}
			if ( get_option( 'woocommerce_terms_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' woocommerce_terms_page_id ' ) );
			}
			if ( get_option( 'woocommerce_terms_page_id' ) != '' ) {
				$woo_pages_array[] = get_permalink( get_option( ' yith_wcwl_wishlist_page_id ' ) );
			}

			$woo_products = get_posts( array(
				'post_type'      => 'product',
				'post_status'    => 'publish',
				'posts_per_page' => '-1'
			) );

			foreach ( $woo_products as $product ) {
				$woo_pages_array[] = get_permalink( $product->ID );
			}
		}

		return $woo_pages_array;
	}

}

if(!function_exists('kendall_elated_get_woocommerce_sidebar')) {
    /**
     * Return Sidebar
     *
     * @return string
     */
    function kendall_elated_get_woocommerce_sidebar() {

        $id = kendall_elated_get_page_id();

        $sidebar = "sidebar";

        if (get_post_meta($id, 'eltd_custom_sidebar_meta', true) != '') {
            $sidebar = get_post_meta($id, 'eltd_custom_sidebar_meta', true);
        } else {
          if (kendall_elated_options()->getOptionValue('product_custom_sidebar') != '') {
                $sidebar = esc_attr(kendall_elated_options()->getOptionValue('product_custom_sidebar'));
            }

        }

        return $sidebar;
    }
}



if ( ! function_exists( 'kendall_elated_woocommerce_share' ) ) {
	/**
	 * Function that social share for product page
	 * Return array array of WooCommerce pages
	 */
	function kendall_elated_woocommerce_share() {
		if ( kendall_elated_is_woocommerce_installed() ) {

			if ( kendall_elated_options()->getOptionValue( 'enable_social_share' ) == 'yes' && kendall_elated_options()->getOptionValue( 'enable_social_share_on_product' ) == 'yes' ) {
				echo kendall_elated_get_social_share_html( array(
					'type' => 'list'
				) );
			}
		}
	}

}

if ( ! function_exists( 'kendall_elated_woocommerce_pagination' ) ) {
	/**
	 * Override Woocommerce Pagination arrows
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	function kendall_elated_woocommerce_pagination( $args ) {

		$args['prev_text'] = '&#x34;';
		$args['next_text'] = '&#x35;';

		return $args;

	}

	add_filter( 'woocommerce_pagination_args', 'kendall_elated_woocommerce_pagination' );

}

if ( ! function_exists( 'kendall_elated_woocommerce_global_product' ) ) {
	/**
	 * Return Global Product Variable
	 *
	 * @return WC_Product
	 */
	function kendall_elated_woocommerce_global_product() {

		global $product;

		return $product;

	}

}