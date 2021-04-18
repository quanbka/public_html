<?php
/*
Template Name: Blog: Masonry Gallery Full Width
*/
get_header();
kendall_elated_get_title();
get_template_part('slider'); ?>

	<div class="eltd-full-width">
		<div class="eltd-full-width-inner">
			<?php kendall_elated_get_blog('masonry-gallery-full-width'); ?>
		</div>
	</div>

<?php get_footer();