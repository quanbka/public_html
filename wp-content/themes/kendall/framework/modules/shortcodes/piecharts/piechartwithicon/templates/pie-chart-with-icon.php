<div class="eltd-pie-chart-with-icon-holder <?php echo esc_attr($skin); ?>">
	<div class="eltd-percentage-with-icon" <?php echo kendall_elated_get_inline_attrs($pie_chart_data); ?>>
		<?php print $icon; ?>
	</div>
	<div class="eltd-pie-chart-text" <?php kendall_elated_inline_style($pie_chart_style)?>>
		<h5 class="eltd-pie-title">
			<?php echo esc_html($title); ?>
		</h5>
		<p><?php echo esc_html($text); ?></p>
	</div>
</div>