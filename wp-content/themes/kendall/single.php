<?php
	get_header();
	if (have_posts()) :
	while (have_posts()) : the_post();
		kendall_elated_get_title();
		get_template_part('slider');
?>
	<div class="eltd-container">
		<?php do_action('kendall_elated_after_container_open'); ?>
		<div class="eltd-container-inner">
			<?php kendall_elated_get_blog_single(); ?>
		</div>
		<?php do_action('kendall_elated_before_container_close'); ?>
	</div>
<?php
	endwhile;
	endif;
	get_footer();