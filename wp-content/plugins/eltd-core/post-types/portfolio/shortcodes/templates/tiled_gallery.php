<?php // This line is needed for mixItUp gutter ?>
<article class="eltd-portfolio-item mix <?php echo esc_attr($categories)?>" >

	<a class ="eltd-portfolio-link" href="<?php echo esc_url($item_link); ?>"></a>

	<div class = "eltd-item-image-holder" <?php kendall_elated_inline_style($item_style); ?>>
		<?php
			echo get_the_post_thumbnail(get_the_ID(),$thumb_size);
		?>
	</div>

	<div class="eltd-item-text-overlay">
		<div class="eltd-item-text-overlay-inner">
			<div class="eltd-item-text-holder">

				<<?php echo esc_attr($title_tag)?> class="eltd-item-title">
					<?php echo esc_attr(get_the_title()); ?>
				</<?php echo esc_attr($title_tag)?>>	
				<?php
					echo $category_html;
				?>

			</div>
		</div>	
	</div>

</article>
<?php // This line is needed for mixItUp gutter ?>