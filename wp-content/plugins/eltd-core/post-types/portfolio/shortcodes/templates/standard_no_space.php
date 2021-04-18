<?php // This line is needed for mixItUp gutter ?>
	<article class="eltd-portfolio-item mix <?php echo esc_attr( $categories ) ?>">

		<?php if ( has_post_thumbnail( get_the_ID() ) ) { ?>

			<div class="eltd-item-image-holder" <?php kendall_elated_inline_style($item_style); ?>>

				<a href="<?php echo esc_url( $item_link ); ?>">
					<?php
					echo get_the_post_thumbnail( get_the_ID(), $thumb_size );
					?>
				</a>

			</div>

		<?php } ?>

		<div class="eltd-item-text-holder">

			<<?php echo esc_attr( $title_tag ) ?> class="eltd-item-title">

			<a href="<?php echo esc_url( $item_link ); ?>">
				<?php echo esc_attr( get_the_title() ); ?>
			</a>

		</<?php echo esc_attr( $title_tag ) ?>>

		<?php if ( $show_excerpt == 'yes' ) { ?>

			<p class="eltd-ptf-excerpt">
				<?php echo get_the_excerpt(); ?>
			</p>

		<?php } ?>

		<?php
		if ( $category_html !== '' || $like_icon_html !== '' ) {
			?>

			<div class="eltd-ptf-category-like-holder clearfix">
				<?php
				if ( $category_html !== '' ) {
					print $category_html;
				}
				if ( $like_icon_html !== '' ) {
					print $like_icon_html;
				}
				?>
			</div>

		<?php }

		?>

		</div>

	</article>
<?php // This line is needed for mixItUp gutter ?>