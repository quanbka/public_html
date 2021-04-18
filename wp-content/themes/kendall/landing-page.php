<?php
/*
Template Name: Landing Page
*/
$kendall_elated_sidebar = kendall_elated_sidebar_layout();

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <?php
        /**
         * kendall_elated_header_meta hook
         *
         * @see kendall_elated_header_meta() - hooked with 10
         * @see eltd_user_scalable_meta() - hooked with 10
         */
        do_action('kendall_elated_header_meta');
        ?>

        <?php wp_head(); ?>
    </head>

<body <?php body_class(); ?>>

<?php 
if (kendall_elated_options()->getOptionValue('smooth_page_transitions') == "yes") {
	$kendall_elated_ajax_class = 'eltd-mimic-ajax';
?>
<div class="eltd-smooth-transition-loader <?php echo esc_attr($kendall_elated_ajax_class); ?>">
    <div class="eltd-st-loader">
        <div class="eltd-st-loader1">
            <?php kendall_elated_loading_spinners(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="eltd-wrapper">
	<div class="eltd-wrapper-inner">
		<div class="eltd-content">
            <div class="eltd-content-inner">
				<?php get_template_part( 'title' ); ?>
				<?php get_template_part('slider');?>
				<div class="eltd-full-width">
					<div class="eltd-full-width-inner">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(($kendall_elated_sidebar == 'default')||($kendall_elated_sidebar == '')) : ?>
								<?php the_content(); ?>
								<?php do_action('kendall_elated_page_after_content'); ?>
							<?php elseif($kendall_elated_sidebar == 'sidebar-33-right' || $kendall_elated_sidebar == 'sidebar-25-right'): ?>
								<div <?php echo kendall_elated_sidebar_columns_class(); ?>>
									<div class="eltd-column1 eltd-content-left-from-sidebar">
										<div class="eltd-column-inner">
											<?php the_content(); ?>
											<?php do_action('kendall_elated_page_after_content'); ?>
										</div>
									</div>
									<div class="eltd-column2">
										<?php get_sidebar(); ?>
									</div>
								</div>
							<?php elseif($kendall_elated_sidebar == 'sidebar-33-left' || $kendall_elated_sidebar == 'sidebar-25-left'): ?>
								<div <?php echo kendall_elated_sidebar_columns_class(); ?>>
									<div class="eltd-column1">
										<?php get_sidebar(); ?>
									</div>
									<div class="eltd-column2 eltd-content-right-from-sidebar">
										<div class="eltd-column-inner">
											<?php the_content(); ?>
											<?php do_action('kendall_elated_page_after_content'); ?>
										</div>
									</div>
								</div>
							<?php endif; ?>
						<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?>
</body>
</html>