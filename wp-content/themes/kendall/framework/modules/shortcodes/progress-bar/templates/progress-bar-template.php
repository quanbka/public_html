<div class="eltd-progress-bar">
	<h5 class="eltd-progress-title-holder clearfix <?php echo esc_attr($skin_class) ?>">
		<span class="eltd-progress-title"><?php echo esc_attr($title)?></span>
		<span class="eltd-progress-number-wrapper <?php echo esc_attr($percentage_classes)?> " >
			<span class="eltd-progress-number <?php echo esc_attr($skin_class) ?>">
				<span class="eltd-percent">0</span>	
				<?php if($percentage_type == 'floating' ){ ?>
					<span class="eltd-down-arrow"></span>
				<?php }?>
			</span>
		</span>
	</h5>
	<div class="eltd-progress-content-outer ">
		<div data-percentage=<?php echo esc_attr($percent)?> class="eltd-progress-content" ></div>	
	</div>
</div>	