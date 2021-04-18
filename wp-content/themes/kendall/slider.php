<?php
$kendall_elated_slider_shortcode = get_post_meta(kendall_elated_get_page_id(), 'eltd_page_slider_meta', true);
if (!empty($kendall_elated_slider_shortcode)) { ?>
	<div class="eltd-slider<?php echo strpos($kendall_elated_slider_shortcode, 'eltd_slider_lite') !== false ? '-lite' : ''; ?>">
		<div class="eltd-slider<?php echo strpos($kendall_elated_slider_shortcode, 'eltd_slider_lite') !== false ? '-lite' : ''; ?>-inner">
			<?php echo do_shortcode(wp_kses_post($kendall_elated_slider_shortcode)); // XSS OK ?>
		</div>
	</div>
<?php } ?>