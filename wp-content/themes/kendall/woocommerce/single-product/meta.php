<?php
/**
 * Single Product Meta
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

$cat_count = sizeof( get_the_terms( $post->ID, 'product_cat' ) );
$tag_count = sizeof( get_the_terms( $post->ID, 'product_tag' ) );

?>
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>

	<table class="eltd-woocommerce-meta-table">
		<tbody>

		<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

			<tr>
				<td class="eltd-woocommerce-meta-name">
					<?php esc_html_e( 'SKU', 'kendall' ); ?>
				</td>
				<td>
					<span class="sku"
					      itemprop="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'kendall' ); ?></span>
				</td>
			</tr>

		<?php endif; ?>

		<tr>
			<td class="eltd-woocommerce-meta-name">
				<?php echo _n( 'Category', 'Categories', $cat_count, 'kendall' ); ?>
			</td>
			<td>
				<?php print $product->get_categories( ', ' ); ?>
			</td>
		</tr>

		<tr>
			<td class="eltd-woocommerce-meta-name">
				<?php echo _n( 'Tag', 'Tags', $tag_count, 'kendall' ); ?>
			</td>
			<td>
				<?php print $product->get_tags( ', ' ); ?>
			</td>
		</tr>

		</tbody>
	</table>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>

</div>
