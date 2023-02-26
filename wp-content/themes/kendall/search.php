<?php
$kendall_elated_sidebar = kendall_elated_sidebar_layout();
get_header();
$kendall_elated_blog_page_range = kendall_elated_get_blog_page_range();
$kendall_elated_max_number_of_pages = kendall_elated_get_max_number_of_pages();

if ( get_query_var('paged') ) { $kendall_elated_paged = get_query_var('paged'); }
elseif ( get_query_var('page') ) { $kendall_elated_paged = get_query_var('page'); }
else { $kendall_elated_paged = 1; }
?>
<?php kendall_elated_get_title(); ?>
	<div class="eltd-container">

		<?php do_action('kendall_elated_after_container_open'); ?>
		<div class="eltd-container-inner clearfix">

		<?php if(($kendall_elated_sidebar == 'default') || ($kendall_elated_sidebar == '')) { ?>

			<div class="eltd-blog-holder eltd-blog-type-standard">
				<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="eltd-post-content">
							<div class="eltd-post-text">
								<div class="eltd-post-text-inner">
									<?php kendall_elated_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
									<?php $kendall_elated_my_excerpt = get_the_excerpt();
									if ($kendall_elated_my_excerpt !== '') { ?>
										<p class="eltd-post-excerpt"><?php echo do_shortcode($kendall_elated_my_excerpt); ?></p>
									<?php }

									$kendall_elated_args_pages = array(
										'before'           => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
										'after'            => '</div></div>',
										'link_before'      => '<span>',
										'link_after'       => '</span>',
										'pagelink'         => '%'
									);

									wp_link_pages($kendall_elated_args_pages);
									kendall_elated_read_more_button();?>

									<div class="eltd-post-info eltd-bottom-section clearfix">

										<div class="eltd-left-section">
											<?php kendall_elated_post_info(array(
												'author' => 'yes'
											)) ?>
										</div>

										<div class="eltd-right-section">
											<?php kendall_elated_post_info(array(
												'comments' => 'yes',
												'share' => 'yes',
											)) ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
					<?php
					if(kendall_elated_options()->getOptionValue('pagination') == 'yes') {
						kendall_elated_pagination($kendall_elated_max_number_of_pages, $kendall_elated_blog_page_range, $kendall_elated_paged);
					}
					?>
				<?php else: ?>
					<div class="entry">
						<h2><?php esc_html_e('No posts were found.', 'kendall'); ?></h2>
						<div class="eltd-search-form clearfix">
							<?php get_search_form( true ); ?>
						</div>
						<p><?php esc_html_e('Here you can try another time.', 'kendall'); ?></p>
					</div>
				<?php endif; ?>
				<?php do_action('kendall_elated_before_container_close'); ?>
			</div>

		<?php }

		elseif($kendall_elated_sidebar == 'sidebar-33-right' || $kendall_elated_sidebar == 'sidebar-25-right'){?>

			<div <?php echo kendall_elated_sidebar_columns_class(); ?>>
				<div class="eltd-column1 eltd-content-left-from-sidebar">
					<div class="eltd-column-inner">
						<div class="eltd-blog-holder eltd-blog-type-standard">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="eltd-post-content">
										<div class="eltd-post-text">
											<div class="eltd-post-text-inner">
												<?php kendall_elated_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
												<?php $kendall_elated_my_excerpt = get_the_excerpt();
												if ($kendall_elated_my_excerpt !== '') { ?>
													<p class="eltd-post-excerpt"><?php echo do_shortcode($kendall_elated_my_excerpt); ?></p>
												<?php }

												$kendall_elated_args_pages = array(
													'before'           => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
													'after'            => '</div></div>',
													'link_before'      => '<span>',
													'link_after'       => '</span>',
													'pagelink'         => '%'
												);

												wp_link_pages($kendall_elated_args_pages);
												kendall_elated_read_more_button();?>

												<div class="eltd-post-info eltd-bottom-section clearfix">

													<div class="eltd-left-section">
														<?php kendall_elated_post_info(array(
															'author' => 'yes'
														)) ?>
													</div>

													<div class="eltd-right-section">
														<?php kendall_elated_post_info(array(
															'comments' => 'yes',
															'share' => 'yes',
														)) ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</article>
							<?php endwhile; ?>
								<?php
								if(kendall_elated_options()->getOptionValue('pagination') == 'yes') {
									kendall_elated_pagination($kendall_elated_max_number_of_pages, $kendall_elated_blog_page_range, $kendall_elated_paged);
								}
								?>
							<?php else: ?>
								<div class="entry">
									<h2><?php esc_html_e('No posts were found.', 'kendall'); ?></h2>
									<div class="eltd-search-form clearfix">
										<?php get_search_form( true ); ?>
									</div>
									<p><?php esc_html_e('Here you can try another time.', 'kendall'); ?></p>
								</div>
							<?php endif; ?>
							<?php do_action('kendall_elated_before_container_close'); ?>
						</div>
					</div>
				</div>
				<div class="eltd-column2">
					<?php get_sidebar(); ?>
				</div>
			</div>

		<?php }

		elseif($kendall_elated_sidebar == 'sidebar-33-left' || $kendall_elated_sidebar == 'sidebar-25-left'){?>
			<div <?php echo kendall_elated_sidebar_columns_class(); ?>>
				<div class="eltd-column1">
					<?php get_sidebar(); ?>
				</div>
				<div class="eltd-column2 eltd-content-right-from-sidebar">
					<div class="eltd-column-inner">
						<div class="eltd-blog-holder eltd-blog-type-standard">
							<?php if(have_posts()) : while ( have_posts() ) : the_post(); ?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="eltd-post-content">
										<div class="eltd-post-text">
											<div class="eltd-post-text-inner">
												<?php kendall_elated_get_module_template_part('templates/lists/parts/title', 'blog'); ?>
												<?php $kendall_elated_my_excerpt = get_the_excerpt();
												if ($kendall_elated_my_excerpt !== '') { ?>
													<p class="eltd-post-excerpt"><?php echo do_shortcode($kendall_elated_my_excerpt); ?></p>
												<?php }

												$kendall_elated_args_pages = array(
													'before'           => '<div class="eltd-single-links-pages"><div class="eltd-single-links-pages-inner">',
													'after'            => '</div></div>',
													'link_before'      => '<span>',
													'link_after'       => '</span>',
													'pagelink'         => '%'
												);

												wp_link_pages($kendall_elated_args_pages);
												kendall_elated_read_more_button();?>

												<div class="eltd-post-info eltd-bottom-section clearfix">

													<div class="eltd-left-section">
														<?php kendall_elated_post_info(array(
															'author' => 'yes'
														)) ?>
													</div>

													<div class="eltd-right-section">
														<?php kendall_elated_post_info(array(
															'comments' => 'yes',
															'share' => 'yes',
														)) ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</article>
							<?php endwhile; ?>
								<?php
								if(kendall_elated_options()->getOptionValue('pagination') == 'yes') {
									kendall_elated_pagination($kendall_elated_max_number_of_pages, $kendall_elated_blog_page_range, $kendall_elated_paged);
								}
								?>
							<?php else: ?>
								<div class="entry">
									<h2><?php esc_html_e('No posts were found.', 'kendall'); ?></h2>
									<div class="eltd-search-form clearfix">
										<?php get_search_form( true ); ?>
									</div>
									<p><?php esc_html_e('Here you can try another time.', 'kendall'); ?></p>
								</div>
							<?php endif; ?>
							<?php do_action('kendall_elated_before_container_close'); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>


		</div>
		<?php do_action('kendall_elated_before_container_close'); ?>
	</div>
<?php get_footer(); ?>