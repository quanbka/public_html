<?php

class KendallElatedWoocommerceDropdownCart extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'eltd_woocommerce_dropdown_cart', // Base ID
			esc_html__('Elated Woocommerce Dropdown Cart','kendall'), // Name
			array( 'description' => esc_html__( 'Elated Woocommerce Dropdown Cart', 'kendall' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		extract( $args );
		global $woocommerce;

		$cart_products_number = $woocommerce->cart->get_cart_contents_count();

		print $before_widget; ?>
		<div class="eltd-shopping-cart-widget">
			<div class="eltd-shopping-cart">
				<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
					<i class="icon-handbag icons"></i>
					<span class="eltd-shopping-cart-number">
						<?php echo esc_html( $cart_products_number ); ?>
					</span>
				</a>
			</div>
			<div class="eltd-shopping-cart-dropdown">
				<ul>
					<?php if ( ! $woocommerce->cart->is_empty() ) {
						foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
							$product    = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $product && $product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_name  = apply_filters( 'woocommerce_cart_item_name', $product->get_title(), $cart_item, $cart_item_key );
								$product_image = apply_filters( 'woocommerce_cart_item_thumbnail', $product->get_image(), $cart_item, $cart_item_key );
								$product_price = apply_filters( 'woocommerce_cart_item_price', $woocommerce->cart->get_product_price( $product ), $cart_item, $cart_item_key );

								?>
								<li class="eltd-shopping-cart-item">
									<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="eltd-shopping-cart-remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'kendall' ),
										esc_attr( $product_id ),
										esc_attr( $product->get_sku() )
									), $cart_item_key );
									?>
									<div class="eltd-shopping-cart-item-image">
										<?php echo str_replace( array(
											'http:',
											'https:'
										), '', $product_image ); ?>
									</div>
									<div class="eltd-shopping-cart-item-details">
										<h6>
											<?php if ( ! $product->is_visible() ) {
												echo esc_html( $product_name );
											} else { ?>
												<a href="<?php echo esc_url( $product->get_permalink( $cart_item ) ); ?>">
													<?php echo esc_html( $product_name ); ?>
												</a>
											<?php } ?>
										</h6>
										<div class="eltd-shopping-cart-price">
											<?php print $product_price; ?>
										</div>
										<div class="eltd-shopping-cart-quantity">
											<?php echo esc_html__( 'Quantity:', 'kendall' ) . ' ' . $cart_item['quantity']; ?>
										</div>
									</div>
								</li>
								<?php
							}
						}
					} else {
						?>
						<li class="eltd-empty-cart">
							<?php esc_html_e( 'No products in the cart.', 'kendall' ); ?>
						</li>
						<?php
					} ?>
				</ul>
				<?php if ( ! $woocommerce->cart->is_empty() ) : ?>
					<div class="eltd-shopping-cart-footer">

						<p class="eltd-shopping-cart-total"><?php esc_html_e( 'Subtotal', 'kendall' ); ?>
							: <?php print $woocommerce->cart->get_cart_subtotal(); ?></p>

						<div class="eltd-shopping-cart-buttons clearfix">
							<?php
							echo kendall_elated_get_button_html( array(
								'link'                   => wc_get_cart_url(),
								'text'                   => esc_html__( 'View Cart', 'kendall' ),
								'custom_class'           => 'button wc-forward',
								'type'                   => 'solid',
								'hover_color'            => '#444',
								'hover_background_color' => '#ebebeb',
								'hover_border_color'     => '#ebebeb',
							) );
							?>
							<?php
							echo kendall_elated_get_button_html( array(
								'link'                   => wc_get_checkout_url(),
								'text'                   => esc_html__( 'Checkout', 'kendall' ),
								'custom_class'           => 'button checkout wc-forward',
								'type'                   => 'solid',
								'hover_color'            => '#444',
								'hover_background_color' => '#ebebeb',
								'hover_border_color'     => '#ebebeb',
							) );
							?>
						</div>

					</div>

				<?php endif; ?>
			</div>
		</div>
		<?php
		print $after_widget;
	}

}

if ( ! function_exists( 'kendall_elated_register_woocommerce_cart_widget' ) ) {

	function kendall_elated_register_woocommerce_cart_widget() {

		register_widget( 'KendallElatedWoocommerceDropdownCart' );

	}

}

add_action( 'widgets_init', 'kendall_elated_register_woocommerce_cart_widget' );

if ( ! function_exists( 'kendall_elated_woocommerce_dropdown_cart_ajax' ) ) {

	function kendall_elated_woocommerce_dropdown_cart_ajax( $fragments ) {
		global $woocommerce;
		$cart_products_number = $woocommerce->cart->get_cart_contents_count();

		ob_start();
		?>
		<div class="eltd-shopping-cart-widget">
			<div class="eltd-shopping-cart">
				<a href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>">
					<i class="icon-handbag icons"></i>
					<span class="eltd-shopping-cart-number">
						<?php echo esc_html( $cart_products_number ); ?>
					</span>
				</a>
			</div>
			<div class="eltd-shopping-cart-dropdown">
				<ul>
					<?php if ( ! $woocommerce->cart->is_empty() ) {
						foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) {
							$product    = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
							$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

							if ( $product && $product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
								$product_name  = apply_filters( 'woocommerce_cart_item_name', $product->get_title(), $cart_item, $cart_item_key );
								$product_image = apply_filters( 'woocommerce_cart_item_thumbnail', $product->get_image(), $cart_item, $cart_item_key );
								$product_price = apply_filters( 'woocommerce_cart_item_price', $woocommerce->cart->get_product_price( $product ), $cart_item, $cart_item_key );

								?>
								<li class="eltd-shopping-cart-item">
									<?php
									echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
										'<a href="%s" class="eltd-shopping-cart-remove" title="%s" data-product_id="%s" data-product_sku="%s">&times;</a>',
										esc_url( $woocommerce->cart->get_remove_url( $cart_item_key ) ),
										esc_html__( 'Remove this item', 'kendall' ),
										esc_attr( $product_id ),
										esc_attr( $product->get_sku() )
									), $cart_item_key );
									?>
									<div class="eltd-shopping-cart-item-image">
										<?php echo str_replace( array(
											'http:',
											'https:'
										), '', $product_image ); ?>
									</div>
									<div class="eltd-shopping-cart-item-details">
										<h6>
											<?php if ( ! $product->is_visible() ) {
												echo esc_html( $product_name );
											} else { ?>
												<a href="<?php echo esc_url( $product->get_permalink( $cart_item ) ); ?>">
													<?php echo esc_html( $product_name ); ?>
												</a>
											<?php } ?>
										</h6>
										<div class="eltd-shopping-cart-price">
											<?php print $product_price; ?>
										</div>
										<div class="eltd-shopping-cart-quantity">
											<?php echo esc_html__( 'Quantity:', 'kendall' ) . ' ' . $cart_item['quantity']; ?>
										</div>
									</div>
								</li>
								<?php
							}
						}
					} else {
						?>
						<li class="eltd-empty-cart">
							<?php esc_html_e( 'No products in the cart.', 'kendall' ); ?>
						</li>
						<?php
					} ?>
				</ul>
				<?php if ( ! $woocommerce->cart->is_empty() ) : ?>
					<div class="eltd-shopping-cart-footer">

						<p class="eltd-shopping-cart-total"><?php esc_html_e( 'Subtotal', 'kendall' ); ?>
							: <?php print $woocommerce->cart->get_cart_subtotal(); ?></p>

						<div class="eltd-shopping-cart-buttons clearfix">
							<?php
							echo kendall_elated_get_button_html( array(
								'link'                   => wc_get_cart_url(),
								'text'                   => esc_html__( 'View Cart', 'kendall' ),
								'custom_class'           => 'button wc-forward',
								'type'                   => 'solid',
								'hover_color'            => '#444',
								'hover_background_color' => '#ebebeb',
								'hover_border_color'     => '#ebebeb',
							) );
							?>
							<?php
							echo kendall_elated_get_button_html( array(
								'link'                   => wc_get_checkout_url(),
								'text'                   => esc_html__( 'Checkout', 'kendall' ),
								'custom_class'           => 'button checkout wc-forward',
								'type'                   => 'solid',
								'hover_color'            => '#444',
								'hover_background_color' => '#ebebeb',
								'hover_border_color'     => '#ebebeb',
							) );
							?>
						</div>

					</div>

				<?php endif; ?>
			</div>
		</div>
		<?php
		$fragments['div.eltd-shopping-cart-widget'] = ob_get_clean();

		return $fragments;
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'kendall_elated_woocommerce_dropdown_cart_ajax' );

}

?>