<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="eltd-post-content"  style="background-image: url(' <?php echo esc_url($params['quote_image'][0]); ?> ')">

		<div class="eltd-post-text">
			<div class="eltd-post-mark">
				<span class="icon_quotations eltd-link-quote-mark"></span>
			</div>

			<div class="eltd-post-info eltd-top-section">
				<?php kendall_elated_post_info(array(
					'date' => 'yes',
					'category' => 'yes'
				)) ?>
			</div>

			<div class="eltd-quote-post-title">

				<h3 class="eltd-post-title entry-title" >
						<?php echo esc_html($quote_text); ?>
				</h3>

                <h5 class="eltd-quote-author">&mdash; <?php the_title(); ?></h5>
			</div>

			<div class="eltd-post-info eltd-bottom-section clearfix">

				<div class="eltd-left-section">
					<?php kendall_elated_post_info(array(
                        'share'    => 'yes'
					)) ?>
				</div>

				<div class="eltd-right-section">
					<?php kendall_elated_post_info(array(
						'comments' => 'yes',
					)) ?>
				</div>

			</div>


		</div>

	</div>

	<div class="eltd-blog-single-content">
		<?php
		the_content();
		do_action('kendall_elated_before_blog_article_closed_tag');
		?>
	</div>

</article>