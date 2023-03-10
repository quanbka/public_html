<?php
/**
 * Pie Chart Basic Shortcode Template
 */
?>
<div class="eltd-pie-chart-holder <?php echo esc_attr($skin); ?>">
	<div class="eltd-percentage" <?php echo kendall_elated_get_inline_attrs($pie_chart_data); ?>>
		<?php if ($type_of_central_text == "title") { ?>
			<h5 class="eltd-pie-title">
				<?php echo esc_html($title); ?>
			</h5>
		<?php } else { ?>
			<span class="eltd-to-counter">
				<?php echo esc_html($percent ); ?>%
			</span>
		<?php } ?>
	</div>
	<div class="eltd-pie-chart-text" <?php kendall_elated_inline_style($pie_chart_style); ?>>
		<?php if ($type_of_central_text == "title") { ?>
			<span class="eltd-to-counter">
				<?php echo esc_html($percent ); ?>%
			</span>
		<?php } else { ?>
			<h5 class="eltd-pie-title">
				<?php echo esc_html($title); ?>
			</h5>
		<?php } ?>
		<p><?php echo esc_html($text); ?></p>
	</div>
</div>