<div <?php kendall_elated_class_attribute( $holder_classes ); ?>>
	<a href="<?php echo esc_url( $title_link ); ?>">

		<?php if ( ! empty( $title ) ) : ?>
			<div class="eltd-ib-top-holder">
				<h2 class="eltd-ib-title">
					<?php echo esc_html( $title ); ?>
				</h2>
			</div>
		<?php endif; ?>

	</a>

	<div class="eltd-ib-overlay" <?php kendall_elated_inline_style( $holder_styles ); ?>></div>
</div>