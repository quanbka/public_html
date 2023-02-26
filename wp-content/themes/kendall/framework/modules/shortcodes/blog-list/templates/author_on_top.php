<li class="eltd-blog-list-item clearfix">

	<?php kendall_elated_post_info(array(
		'author' => 'yes'
	)); ?>

	<div class="eltd-item-text-holder">

		<h4 class="eltd-item-title" <?php echo kendall_elated_inline_style($title_style); ?>>

			<a href="<?php echo esc_url(get_permalink()) ?>" >
				<?php echo esc_attr(get_the_title()) ?>
			</a>

		</h4>

		<?php if ($text_length != '0') {

			$excerpt = ($text_length > 0) ? substr(get_the_excerpt(), 0, intval($text_length)) : get_the_excerpt(); ?>

			<p class="eltd-excerpt">
				<?php echo esc_html($excerpt)?>...
			</p>

		<?php } ?>

		<div class="eltd-item-info-section eltd-small-info-section">
			<?php kendall_elated_post_info(array(
				'date' => 'yes',
				'category' => 'yes',
				'comments' => 'yes'
			)) ?>
		</div>

	</div>

</li>
