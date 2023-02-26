<?php kendall_elated_get_module_template_part('templates/lists/parts/filter', 'blog'); ?>

<div class="<?php echo esc_attr($blog_classes)?>"  <?php echo esc_attr($blog_data_params) ?>>

	<div class="eltd-blog-masonry-grid-sizer"></div>
	<div class="eltd-blog-masonry-grid-gutter"></div>

	<?php
	if($blog_query->have_posts()) : while ( $blog_query->have_posts() ) : $blog_query->the_post();
		kendall_elated_get_post_format_html($blog_type);
	endwhile;
	wp_reset_postdata();
	else:
		kendall_elated_get_module_template_part('templates/parts/no-posts', 'blog');
	endif;
	?>

</div>
<?php
if(kendall_elated_options()->getOptionValue('pagination') == 'yes') {
	kendall_elated_pagination($blog_query->max_num_pages, $blog_page_range, $paged, $blog_type);
}