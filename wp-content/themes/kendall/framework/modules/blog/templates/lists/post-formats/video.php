<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="eltd-post-image-holder">
		<?php kendall_elated_get_module_template_part('templates/parts/video', 'blog'); ?>
	</div>

	<div class="eltd-post-text">

		<div class="eltd-post-info eltd-top-section">
			<?php kendall_elated_post_info(array(
				'date' => 'yes',
				'category' => 'yes'
			)) ?>
		</div>

		<?php

		kendall_elated_get_module_template_part('templates/lists/parts/title', 'blog');
		kendall_elated_excerpt($excerpt_length);

		$args_pages = array(
			'before'           => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
			'after'            => '</div></div>',
			'link_before'      => '<span>',
			'link_after'       => '</span>',
			'pagelink'         => '%'
		);

		wp_link_pages($args_pages);?>

		<div class="eltd-post-info eltd-bottom-section clearfix">
			<?php kendall_elated_post_info(array(
				'comments' => 'yes'
			)) ?>
		</div>

	</div>
</article>