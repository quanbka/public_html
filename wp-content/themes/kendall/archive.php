<?php
$kendall_elated_archive_pages_classes = kendall_elated_blog_archive_pages_classes(kendall_elated_get_default_blog_list());
?>
<?php get_header(); ?>
<?php kendall_elated_get_title(); ?>
<div class="<?php echo esc_attr($kendall_elated_archive_pages_classes['holder']); ?>">
<?php do_action('kendall_elated_after_container_open'); ?>
	<div class="<?php echo esc_attr($kendall_elated_archive_pages_classes['inner']); ?>">
		<?php
			kendall_elated_get_blog(kendall_elated_get_default_blog_list());
		?>
	</div>
<?php do_action('kendall_elated_before_container_close'); ?>
</div>
<?php get_footer(); ?>