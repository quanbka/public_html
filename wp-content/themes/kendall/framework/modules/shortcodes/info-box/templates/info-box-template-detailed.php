<div <?php kendall_elated_class_attribute($holder_classes); ?>>
	<div class="eltd-info-box-inner">
		<div class="eltd-ib-front-holder">
			<div class="eltd-ib-front-holder-inner">
				<div class="eltd-ib-top-holder">
					<?php if($show_icon) : ?>
						<div class="eltd-ib-icon-holder">
							<?php echo kendall_elated_icon_collections()->renderIcon($icon, $icon_pack, array(
								'icon_attributes' => array(
									'style' => $icon_styles
								)
							)); ?>
						</div>
					<?php endif; ?>

					<?php if(!empty($title)) : ?>
						<div class="eltd-ib-title-holder">
							<h3 class="eltd-ib-title">
								<?php echo esc_html($title); ?>
							</h3>
						</div>
					<?php endif; ?>
				</div>

				<div class="eltd-ib-bottom-holder">
					<?php if(!empty($text)) : ?>
						<div class="eltd-ib-text-holder">
							<p><?php echo esc_html($text); ?></p>
						</div>
					<?php endif; ?>

					<?php if(is_array($button_params) && count($button_params)) : ?>
						<div class="eltd-ib-button-holder">
							<?php echo kendall_elated_get_button_html($button_params); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
		<?php if($interactivity == 'yes') { ?>
			<a  href="<?php echo esc_url($button_link) ?>" target="<?php echo esc_attr($button_target) ?>">
		<?php } ?>
		<div class="eltd-ib-overlay" <?php kendall_elated_inline_style($holder_styles); ?>></div>
		<?php if($interactivity == 'yes') { ?>
			</a>
		<?php } ?>
	</div>
</div>