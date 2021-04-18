<<?php echo esc_attr($title_tag)?> class="clearfix eltd-title-holder">
	<span class="eltd-accordion-mark eltd-left-mark">
		<span class="eltd-accordion-mark-icon">
			<span class="icon_plus"></span>
			<span class="icon_minus-06"></span>
		</span>
	</span>
	<span class="eltd-tab-title">
		<span class="eltd-tab-title-inner">
			<?php echo esc_attr($title)?>
		</span>
	</span>
</<?php echo esc_attr($title_tag)?>>
<div class="eltd-accordion-content" <?php echo kendall_elated_get_inline_style($content_style) ?>>
	<div class="eltd-accordion-content-inner">
		<?php echo do_shortcode($content); ?>
	</div>
</div>