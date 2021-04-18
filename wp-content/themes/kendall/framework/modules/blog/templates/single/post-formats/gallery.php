<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="eltd-post-image-holder">
		<?php kendall_elated_get_module_template_part('templates/single/parts/gallery', 'blog'); ?>
	</div>

	<div class="eltd-post-text">

		<div class="eltd-post-info eltd-top-section">
			<?php kendall_elated_post_info(array(
				'date' => 'yes',
				'category' => 'yes'
			)) ?>
		</div>

		<?php
		kendall_elated_get_module_template_part('templates/single/parts/title', 'blog');
		the_content();
		$args_pages = array(
			'before'      => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
			'after'       => '</div></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '%'
		);

		wp_link_pages( $args_pages );
		?>
		<div class="eltd-blog-tags-info-holder">

			<?php do_action('kendall_elated_before_blog_article_closed_tag'); ?>

			<div class="eltd-post-info clearfix">

				<?php kendall_elated_post_info(array(
					'share' => 'yes',
					'comments' => 'yes'
				)) ?>

			</div>
		</div>
	</div>

</article>