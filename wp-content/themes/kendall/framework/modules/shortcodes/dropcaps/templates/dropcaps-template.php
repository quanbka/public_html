<?php
/**
 * Dropcaps shortcode template
 */
?>

<span class="eltd-dropcaps <?php echo esc_attr($dropcaps_class);?>" <?php kendall_elated_inline_style($dropcaps_style);?>>
	<?php echo esc_html($letter);?>
</span>