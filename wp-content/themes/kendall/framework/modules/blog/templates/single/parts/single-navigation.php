<?php
if(isset($post_id)){
	$id = $post_id;
}else{
	$id = get_the_ID();
}

if(kendall_elated_options()->getOptionValue('blog_single_navigation') == 'yes'){

	$prev_post = get_previous_post($id);
	$next_post = get_next_post($id);
	$navigation_blog_through_category = kendall_elated_options()->getOptionValue('blog_navigation_through_same_category');

	?>
	<div class="eltd-blog-single-navigation">
		<div class="eltd-blog-single-navigation-inner clearfix">
			<?php if(get_previous_post($id) != ""){ ?>
				<div class="eltd-blog-single-prev-holder">

					<?php if(has_post_thumbnail($prev_post->ID)){
						$prev_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post->ID), 'large');
						?>
						<div class="eltd-blog-single-prev" style="background-image: url(' <?php echo kendall_elated_kses_img($prev_post_image[0]); ?> ')">
							<?php

							if($navigation_blog_through_category == 'yes'){
								previous_post_link('%link',$prev_post_image[0], true,'','category');
							} else {
								previous_post_link('%link');
							}

							?>
						</div>
					<?php } ?>

					<div class = "eltd-blog-single-prev-info">

						<div class="eltd-blog-navigation-info-holder clearfix">
							<h5 class="eltd-blog-single-nav-title">
								<a href="<?php echo get_permalink($prev_post->ID)?>">
									<?php echo esc_attr(get_the_title($prev_post->ID))?>
								</a>
							</h5>
						</div>

						<a href ="<?php echo get_permalink($prev_post->ID)?>" >
							<span class = "eltd-blog-navigation-info">
								<?php esc_html_e( 'Previous post', 'kendall' )?>
							</span>
						</a>

					</div>

				</div>
			<?php } ?>
			<?php if(get_next_post($id) != ""){ ?>
				<div class="eltd-blog-single-next-holder">
					<div class = "eltd-blog-single-next-info clearfix">
						<div class="eltd-blog-navigation-info-holder clearfix">

							<h5 class="eltd-blog-single-nav-title">
								<a href="<?php echo get_permalink($next_post->ID)?>" class="eltd-blog-single-nav-title">
									<?php echo esc_attr(get_the_title($next_post->ID))?>
								</a>
							</h5>

						</div>
						<a href ="<?php echo get_permalink($next_post->ID)?>" >
							<span class ="eltd-blog-navigation-info">
								<?php esc_html_e( 'Next post', 'kendall' )?>
							</span>
						</a>
					</div>
					<?php if(has_post_thumbnail($next_post->ID)){

						$next_post_image = wp_get_attachment_image_src(get_post_thumbnail_id($next_post->ID), 'large');
						?>
						<div class="eltd-blog-single-next" style="background-image: url(' <?php echo kendall_elated_kses_img($next_post_image[0]); ?> ')">
							<?php

							if($navigation_blog_through_category == 'yes'){
								next_post_link('%link',$next_post_image[0], true,'','category');
							} else {
								next_post_link('%link');
							}
							?>
						</div>
					<?php } ?>
				</div>

			<?php } ?>
		</div>
	</div>
<?php } ?>