<div class="eltd-testimonial-content">
	<?php if ( $icon !== '' ) { ?>
		<div class="eltd-testimonials-icon">
			<div class="eltd-testimonials-icon-inner">
				<?php print $icon; ?>
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