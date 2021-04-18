<?php
/**
 * The template for displaying product widget entries
 * @see    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product; ?>

<li>
	<div class="eltd-woocommerce-widget-product-image">
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"
		   title="<?php echo esc_attr( $product->get_title() ); ?>">
			<?php print $product->get_image(); ?>
		</a>
	</div>
	<div class="eltd-woocommerce-widget-product-details">
		<h5 class="product-title"><a
				href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php print $product->get_title(); ?></a></h5>
		<?php if ( ! empty( $show_rating ) ) {
			print $product->get_rating_html();
		}
		?>
	</div>
	<div class="eltd-woocommerce-widget-product-price">
		<?php print $product->get_price_html(); ?>
	</div>
</li>
