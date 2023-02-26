<?php
/**
 * @see     https://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="woocommerce-product-search-field" class="search-field"
	       placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'kendall' ); ?>"
	       value="<?php echo get_search_query(); ?>" name="s"
	       title="<?php echo esc_attr_x( 'Search for:', 'label', 'kendall' ); ?>"/>
	<input type="submit" value="&#xe090;"/>
	<input type="hidden" name="post_type" value="product"/>
</form>
