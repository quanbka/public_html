<?php
/**
 * Video Button shortcode template
 */
?>

<div class="eltd-video-button">
	<a class="eltd-video-button-play" href="<?php echo esc_url($video_link); ?>" data-rel="prettyPhoto" <?php echo kendall_elated_inline_style($button_style);?> <?php echo kendall_elated_get_inline_attrs($button_data);?>>
		<span class="eltd-video-button-wrapper">
			<?php echo kendall_elated_icon_collections()->renderIcon( 'ion-ios-play', 'ion_icons' ); ?>
		</span>
	</a>
	<?php if ($title !== ''){?>
		<<?php echo esc_attr($title_tag);?> class="eltd-video-button-title">
			<?php echo esc_html($title); ?>
		</<?php echo esc_attr($title_tag);?>>
	<?php } ?>
</div>