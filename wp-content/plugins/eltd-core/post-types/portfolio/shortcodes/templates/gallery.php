<?php // This line is needed for mixItUp gutter ?>
<article class="eltd-portfolio-item <?php echo esc_attr($categories)?>" >
	<div class="eltd-article-inner-holder" <?php kendall_elated_inline_style($item_style); ?>>

		<a class ="eltd-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>

		<div class = "eltd-item-image-holder" >
			<?php
			echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
			?>
			<div class="eltd-item-text-overlay">
				<div class="eltd-item-text-overlay-inner">
					<div class="eltd-item-text-holder">

						<<?php echo esc_attr($title_tag)?> class="eltd-item-title">
						<?php echo esc_attr(get_the_title()); ?>
					</<?php echo esc_attr($title_tag)?>>

					<?php
					echo $category_html;
					?>

					<?php if($show_excerpt_on_hover == 'yes') : ?>
						<div class="eltd-item-excerpt">
							<?php the_excerpt(); ?>
						</div>
					<?php endif; ?>

					</div>
				</div>
			</div>
		</div>

	</div>
</article>
<?php // This line is needed for mixItUp gutter ?>