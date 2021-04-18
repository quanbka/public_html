<div class="eltd-testimonial-content">
	<div class="eltd-testimonials-inner">
		<?php if ( $image ) { ?>
			<div class="eltd-testimonials-author-image">
				<?php echo kendall_elated_kses_img( $image ); ?>
			</div>
		<?php } ?>
		<div class="eltd-testimonials-details">
			<h5><?php echo esc_attr( $author ) ?></h5>
			<h6 class="author-position">
				<?php echo esc_html( $position ); ?>
			</h6>
			<p><?php echo trim( $text ) ?></p>
		</div>
	</div>
</div>