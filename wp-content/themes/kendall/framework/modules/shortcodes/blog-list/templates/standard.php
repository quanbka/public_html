<li class="eltd-blog-list-item clearfix">

		<?php if(has_post_thumbnail()){ ?>
			<div class="eltd-item-image">

				<a href="<?php echo esc_url(get_permalink()) ?>">
					<?php
					echo get_the_post_thumbnail(get_the_ID(), $thumb_image_size);
					?>
				</a>

			</div>
		<?php } ?>

		<div class="eltd-item-text-holder">

			<div class="eltd-item-info-section eltd-small-info-section">
				<?php kendall_elated_post_info(array(
					'date' => 'yes',
					'category' => 'yes'
				)) ?>
			</div>

			<h3 class="eltd-item-title" <?php echo kendall_elated_inline_style($title_style); ?>>
				<a href="<?php echo esc_url(get_permalink()) ?>" >
					<?php echo esc_attr(get_the_title()) ?>
				</a>
			</h3>

			<?php if ($text_length != '0') {
				$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>
				<p class="eltd-excerpt"><?php echo esc_html($excerpt)?>...</p>
			<?php } ?>

			<div class="eltd-item-info-section eltd-small-info-section">
				<?php kendall_elated_post_info(array(
					'comments' => 'yes'
				)) ?>
			</div>

	</div>
</li>