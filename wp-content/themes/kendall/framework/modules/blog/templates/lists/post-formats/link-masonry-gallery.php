<?php $params = array(	'title_tag' => 'h3');?>

<article id="post-<?php the_ID(); ?>" <?php post_class($masonry_gallery_class); ?>>

	<div class="eltd-post-image-holder" <?php echo kendall_elated_get_inline_style($background_image_style) ?>>
		<a href="<?php echo get_the_permalink(); ?>"></a>
	</div>

	<div class="eltd-post-text-holder">
		<div class="eltd-post-text-holder-inner">
			<div class="eltd-post-text">

				<div class="eltd-post-text-inner">
					<div class="eltd-post-info eltd-top-section">
						<?php kendall_elated_post_info(array(
							'date' => 'yes',
							'category' => 'yes'
						)) ?>
					</div>

					<div class="eltd-link-icon-post-mark eltd-icon-post-mark">
						<span class="icon_link_alt eltd-link-quote-mark eltd-link-mark"></span>
					</div>

					<?php
						kendall_elated_get_module_template_part('templates/lists/parts/title', 'blog', '', $params);
					?>
				</div>

			</div>
		</div>
	</div>

</article>