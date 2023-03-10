<div class="eltd-pie-chart-pie-holder">
	<div class="eltd-pie-chart-pie">
		<canvas id="pie<?php echo esc_attr($id); ?>" class="eltd-pie" height="<?php echo esc_html($height); ?>" width="<?php echo esc_html($width); ?>" <?php echo kendall_elated_get_inline_attrs($pie_chart_data)?>></canvas>
	</div>
	<div class="eltd-pie-legend">
		<ul>
			<?php foreach ($legend_data as $legend_data_item) { ?>
			<li>
				<div class="eltd-pie-color-holder" <?php kendall_elated_inline_style($legend_data_item['color'])?> ></div>
				<p><?php echo esc_html($legend_data_item['legend']); ?></p>
				<?php } ?>
			</li>
		</ul>
	</div>
</div>