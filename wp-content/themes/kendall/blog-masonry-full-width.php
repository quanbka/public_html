<?php
	/*
	Template Name: Blog: Masonry Full Width
	*/
get_header();
kendall_elated_get_title();
get_template_part('slider'); ?>

	<div class="eltd-full-width">
		<div class="eltd-full-width-inner clearfix">
			<?php kendall_elated_get_blog('masonry-full-width'); ?>
		</div>
	</div>

<?php get_footer(); ?>