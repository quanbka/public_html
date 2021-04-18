<div <?php kendall_elated_class_attribute($pricing_table_classes)?>>
	<div class="eltd-price-table-inner">
		<ul>
			<li class="eltd-table-title">
				<h5><?php echo esc_html($title) ?></h5>
			</li>
			<li class="eltd-table-price">
				<div class="eltd-price-holder">
					<sup class="eltd-value"><?php echo esc_attr($currency) ?></sup>
					<span class="eltd-price"><?php echo esc_attr($price)?></span>
				</div>
				<div>
					<p class="eltd-mark"><?php echo esc_attr($price_period)?></p>
				</div>
			</li>

			<li class="eltd-table-content">
				<?php
					echo do_shortcode($content);
				?>
			</li>
			<?php 
			if($show_button == "yes" && $button_text !== ''){ ?>
				<li class="eltd-table-button">
					<?php echo kendall_elated_get_button_html(array(
						'link' => $link,
						'text' => $button_text,
						'type' => 'solid',
						'hover_color' => '#fff'
					)); ?>
				</li>				
			<?php } ?>
		</ul>
	</div>
</div>