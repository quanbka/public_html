<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="eltd-post-content"
	     style="background-image: url(' <?php echo esc_url( $params['quote_image'][0] ); ?> ')">

		<div class="eltd-post-text">

			<div class="eltd-post-mark">
				<span class="icon_quotations eltd-link-quote-mark"></span>
			</div>

			<div class="eltd-post-info eltd-top-section">
				<?php kendall_elated_post_info( array(
					'date'     => 'yes',
					'category' => 'yes'
				) ) ?>
			</div>

			<div class="eltd-quote-post-title">

				<div class="eltd-post-title entry-title" >
					<?php if ( $quote_text !== '' ) { ?>
						<h3>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
								<?php echo esc_html( $quote_text ); ?>
							</a>
						</h3>
					<?php } ?>
				</div>

				<h5 class="eltd-quote-author">&mdash; <?php the_title(); ?></h5>
			</div>

			<div class="eltd-post-info eltd-bottom-section clearfix">

				<div class="eltd-left-section">
					<?php kendall_elated_post_info( array(
                        'share'    => 'yes',
					) ) ?>
				</div>

				<div class="eltd-right-section">
					<?php kendall_elated_post_info( array(
						'comments' => 'yes',
					) ) ?>
				</div>

			</div>


		</div>

	</div>

</article>