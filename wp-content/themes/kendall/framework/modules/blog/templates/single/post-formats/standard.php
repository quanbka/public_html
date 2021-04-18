<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if(has_post_thumbnail()){?>
		<div class="eltd-post-image-holder">
			<?php kendall_elated_get_module_template_part('templates/single/parts/image', 'blog'); ?>
		</div>
	<?php } ?>

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

		wp_link_pages(array(
			'before'           => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
			'after'            => '</div></div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'pagelink'         => '%'
		));

		?>
		<div class="eltd-blog-tags-info-holder">

			<?php if( has_tag()){
				kendall_elated_get_module_template_part('templates/single/parts/tags', 'blog');
			} ?>

			<div class="eltd-post-info clearfix">

				<?php kendall_elated_post_info(array(
					'share' => 'yes',
					'comments' => 'yes'
				)) ?>

			</div>
		</div>

	</div>
</article>