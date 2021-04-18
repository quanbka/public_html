<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="eltd-post-content" style="background-image: url(' <?php echo esc_url($params['link_image'][0]); ?> ')">

		<div class="eltd-post-text">

			<div class="eltd-post-mark">
				<span class="icon_link_alt eltd-link-quote-mark eltd-link-mark"></span>
			</div>

			<div class="eltd-post-info eltd-top-section">
				<?php kendall_elated_post_info(array(
					'date' => 'yes',
					'category' => 'yes'
				)) ?>
			</div>

			<h3 class="eltd-post-title entry-title" >
					<?php the_title(); ?>
			</h3>
            <?php kendall_elated_post_info(array(
                'author' => 'yes'
            ));
            ?>

            <div class="eltd-post-info eltd-bottom-section clearfix">

				<div class="eltd-left-section">
					<?php kendall_elated_post_info(array(
                        'share' => 'yes',
					)) ?>
				</div>

				<div class="eltd-right-section">
					<?php kendall_elated_post_info(array(
						'comments' => 'yes'
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