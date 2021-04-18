<div class="eltd-tabs <?php echo esc_attr($tab_class); ?>  <?php echo esc_attr($tab_style_class); ?> clearfix">
	<ul class="eltd-tabs-nav">
		<?php foreach ($tabs_titles as $tab_title) { ?>
			<li>
				<a href="#tab-<?php echo sanitize_title($tab_title)?>">
					<?php echo esc_attr($tab_title)?>
				</a>
			 </li>
		<?php } ?>
		<?php if($style == 'transparent') { ?>
			<li class="eltd-tab-line"></li>
		<?php } ?>
	</ul> 
	<?php echo do_shortcode($content); ?>
</div>