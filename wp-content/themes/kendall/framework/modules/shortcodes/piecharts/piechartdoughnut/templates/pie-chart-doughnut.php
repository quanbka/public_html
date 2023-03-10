<div class="eltd-pie-chart-doughnut-holder">
	<div class="eltd-pie-chart-doughnut">
		<canvas id="pie<?php echo esc_attr($id); ?>" class="eltd-doughnut" height="<?php echo esc_html($height); ?>" width="<?php echo esc_html($width); ?>" <?php echo kendall_elated_get_inline_attrs($pie_chart_data)?>></canvas>
	</div>
	<div class="eltd-pie-legend">
		<ul>
			<?php foreach ($legend_data as $legend_data_item) { ?>
			<li>
				<div class="eltd-pie-color-holder" <?php kendall_elated_inline_style($legend_data_item['color'])?> ></div>
				<h5><?php echo esc_html($legend_data_item['legend']); ?></h5>
			<?php } ?>
			</li>
		</ul>
	</div>
</div>