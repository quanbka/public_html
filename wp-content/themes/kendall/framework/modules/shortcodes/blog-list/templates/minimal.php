<li class="eltd-blog-list-item">
	<?php
	if(has_post_thumbnail(get_the_ID())){ ?>
		<div class="eltd-item-image">

			<a href="<?php echo esc_url(get_permalink()) ?>">
				<?php
				echo get_the_post_thumbnail(get_the_ID(), array(74, 74));
				?>
			</a>

		</div>
	<?php } ?>

	<div class="eltd-item-text-holder">

		<div class="eltd-item-info-section">
			<?php kendall_elated_post_info(array(
				'date' => 'yes',
			)) ?>
		</div>

		<h3 class="eltd-item-title" <?php echo kendall_elated_inline_style($title_style); ?>>
			<a href="<?php echo esc_url(get_permalink()) ?>" >
				<?php echo esc_attr(get_the_title()) ?>
			</a>
		</h3>

	</div>

</li>
