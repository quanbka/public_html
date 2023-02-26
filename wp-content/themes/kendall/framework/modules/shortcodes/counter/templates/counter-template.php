<?php
/**
 * Counter shortcode template
 */
?>
<div
	class="eltd-counter-holder <?php echo esc_attr( $position ); ?>" <?php echo kendall_elated_get_inline_style( $counter_holder_styles ); ?>>
	<?php if ( $with_icon == 'yes' ) { ?>

			<?php if(!empty($custom_icon)) { ?>
				<div class="eltd-counter-custom-icon"><?php echo wp_get_attachment_image($custom_icon, 'full'); ?></div>
			<?php }
			else { ?>
				<div class="eltd-counter-icon" <?php echo kendall_elated_get_inline_style( $icon_style ); ?>>
					<?php print $icon; ?>
				</div>
			<?php } ?>
	<?php } ?>
	<span
		class="eltd-counter <?php echo esc_attr( $type ) ?>" <?php echo kendall_elated_get_inline_style( $counter_styles ); ?>>
		<?php echo esc_attr( $digit ); ?>
	</span>
	<h5 class="eltd-counter-title" <?php echo kendall_elated_get_inline_style( $title_style ); ?>>
		<?php echo esc_html( $title ); ?>
	</h5>
	<?php if ( $text != "" ) { ?>
		<p class="eltd-counter-text" <?php echo kendall_elated_get_inline_style( $text_style ); ?>><?php echo esc_html( $text ); ?></p>
	<?php } ?>

</div>