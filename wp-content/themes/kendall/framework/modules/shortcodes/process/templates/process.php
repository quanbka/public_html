<div class="eltd-process">

	<div class="eltd-process-content-wrapper">
		<div class="eltd-process-content-holder">
			<?php if($link != '') { ?>
				<a class="eltd-process-link" href="<?php echo esc_url($link) ?>" target="<?php echo esc_attr($target) ?>"></a>
			<?php } ?>
			<?php if($background_image != '') { ?>
				<div class="eltd-process-bgrnd" <?php echo kendall_elated_get_inline_style($background_image_style)?>></div>
			<?php } ?>
			<div class="eltd-process-content-holder-inner">

				<?php if($type === 'process_icons'){ ?>

					<?php print $icon; ?>

				<?php } elseif($type === 'process_text'){ ?>
					<span class="eltd-process-inner-text">
					<?php echo esc_html($text_in_process, 'kendall') ?>
				</span>

				<?php } ?>

			</div>
		</div>
	</div>

	<div class="eltd-process-text-holder">
		<h5 class="eltd-process-title">
			<?php echo esc_html($title); ?>
		</h5>
		<p class="eltd-process-text">
			<?php echo esc_html($text); ?>
		</p>
	</div>


</div>