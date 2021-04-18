<div class="eltd-elements-holder-item <?php echo esc_attr($elements_holder_item_class); ?>" <?php echo kendall_elated_get_inline_attrs($elements_holder_item_data); ?> <?php echo kendall_elated_get_inline_style($elements_holder_item_style); ?>>
	<div class="eltd-elements-holder-item-inner">
		<div class="eltd-elements-holder-item-content <?php echo esc_attr($elements_holder_item_content_class); ?>" <?php echo kendall_elated_get_inline_style($elements_holder_item_content_style); ?>>
			<?php echo do_shortcode($content); ?>
		</div>
	</div>
</div>