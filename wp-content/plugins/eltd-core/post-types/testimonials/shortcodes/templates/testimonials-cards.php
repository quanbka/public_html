<div class="eltd-testimonial-content">
	<div class="eltd-testimonial-card">
		<div class="eltd-testimonials-text">
			<p><?php echo trim( $text ) ?></p>
		</div>
		<div class="eltd-testimonials-author">
			<?php if ( $image ) { ?>
				<div class="eltd-testimonials-author-image">
					<div class="eltd-testimonials-author-image-holder">
						<?php echo kendall_elated_kses_img( $image ); ?>
					</div>
				</div>
			<?php } ?>
			<div class="eltd-testimonials-author-details">
				<h5 class="eltd-author-title">
					<?php echo esc_attr( $author ) ?>
				</h5>
				<h6 class="eltd-author-position">
					<?php echo esc_html($position); ?>
				</h6>
			</div>
		</div>
	</div>
</div>