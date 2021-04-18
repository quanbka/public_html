<?php if($query_results->max_num_pages>1){ ?>
	<div class="eltd-ptf-list-paging">
		<span class="eltd-ptf-list-load-more">
			<?php
				$first_color = '#cda964';
				if(kendall_elated_options()->getOptionValue('first_color') !== ''){
					$first_color = kendall_elated_options()->getOptionValue('first_color');
				}
				echo kendall_elated_get_button_html(array(
					'link' => 'javascript: void(0)',
					'text' => esc_html__('Show More', 'eltd_core'),
					//'text' => 'Show More',
					'type' => 'solid',
					'background_color' => $first_color,
					'hover_background_color' => '#444',
					'hover_border_color' => '#444',
					'color' => '#fff',
					'hover_color' => 'fff'
				));
			?>
		</span>
	</div>
<?php }