<?php
	if(!function_exists('kendall_elated_layerslider_overrides')) {
		/**
		 * Disables Layer Slider auto update box
		 */
		function kendall_elated_layerslider_overrides() {
			$GLOBALS['lsAutoUpdateBox'] = false;
		}

		add_action('layerslider_ready', 'kendall_elated_layerslider_overrides');
	}
?>