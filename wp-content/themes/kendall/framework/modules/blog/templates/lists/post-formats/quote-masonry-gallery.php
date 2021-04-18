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

					<div class="eltd-quote-icon-post-mark eltd-icon-post-mark">
						<span class="icon_quotations eltd-link-quote-mark"></span>
					</div>

					<h4 class="eltd-post-title entry-title" >
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<?php echo esc_html($quote_text); ?>
						</a>
					</h4>

					<h3 class="eltd-quote-author"><?php the_title(); ?></h3>

				</div>

			</div>
		</div>
	</div>

</article>