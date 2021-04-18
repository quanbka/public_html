<div class="eltd-testimonial-content">
	<?php if ( $image_style !== '' ) { ?>
		<div class="eltd-testimonials-image">
			<div class="eltd-testimonials-image-inner" <?php echo kendall_elated_get_inline_style($image_style); ?>>
			</div>
		</div>
	<?php } ?>
	<div class="eltd-testimonials-text">
		<p><?php echo trim( $text ) ?></p>
	</div>
	<div class="eltd-testimonials-author">
		<h5><?php echo esc_attr( $author ) ?></h5>
	</div>
</div>