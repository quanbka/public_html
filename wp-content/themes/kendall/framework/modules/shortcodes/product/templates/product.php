<div class="eltd-product">
	<?php
	$product = kendall_elated_woocommerce_global_product();
	?>
	<h2 class="eltd-product-title">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
	</h2>
	<div class="eltd-product-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<div class="eltd-product-price">
		<?php print $product->get_price_html(); ?>
	</div>
	<?php if ( ! $product->is_in_stock() ) { ?>
		<span class="eltd-product-out-of-stock">
			<?php esc_html_e( 'Out of Stock', 'kendall' ); ?>
		</span>
	<?php }
	if ( has_post_thumbnail() ) { ?>
		<div class="eltd-product-image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'kendall_elated_product_image' ); ?>
			</a>
		</div>
	<?php } ?>
	<div class="eltd-product-add-to-cart-holder">
		<?php
		echo apply_filters( 'woocommerce_loop_add_to_cart_link',
			sprintf( '<a rel="nofollow" href="%s" data-quantity="%s" data-product_id="%s" data-product_sku="%s" class="%s">%s</a>',
				esc_url( $product->add_to_cart_url() ),
				esc_attr( isset( $quantity ) ? $quantity : 1 ),
				esc_attr( $product->id ),
				esc_attr( $product->get_sku() ),
				esc_attr( isset( $class ) ? $class : 'button' ),
				esc_html( $product->add_to_cart_text() )
			),
			$product );
		?>
	</div>
</div>