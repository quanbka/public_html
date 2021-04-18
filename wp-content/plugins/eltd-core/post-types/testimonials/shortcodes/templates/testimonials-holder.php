<div class="eltd-testimonials-holder clearfix">
	<div class="eltd-testimonials <?php echo esc_attr($holder_classes) ?>"  <?php echo kendall_elated_get_inline_attrs( $data_attr ); ?>>
		<?php if ( $query->have_posts() ) {

			while( $query->have_posts() ){

				$query->the_post();
				$params['current_id'] = get_the_ID();
				$params['icon']       = $this_object->getIconHtml(get_the_ID());
				$params['author']     = get_post_meta( get_the_ID(), 'eltd_testimonial_author', true );
				$params['text']       = get_post_meta( get_the_ID(), 'eltd_testimonial_text', true );

				$params['image_style']  = $this_object->getFeaturedImageStyle(get_the_ID());
				$params['position']   = get_post_meta( get_the_ID(), 'eltd_testimonial_author_position', true );
				if ( has_post_thumbnail() ) {
					$params['image'] = get_the_post_thumbnail();
				} else {
					$params['image'] = false;
				}

				echo eltd_core_get_shortcode_module_template_part( 'testimonials', 'testimonials-'.$type, '', $params );
			}
			wp_reset_postdata();
		}else { ?>
			<p><?php echo esc_html__('Sorry, no posts matched your criteria.', 'eltd_core') ?></p>
		<?php }	?>
	</div>
</div>