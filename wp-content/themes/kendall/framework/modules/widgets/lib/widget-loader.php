<?php

if (!function_exists('kendall_elated_register_widgets')) {

	function kendall_elated_register_widgets() {

		$widgets = array(
			'KendallElatedFullScreenMenuOpener',
			'KendallElatedLatestPosts',
			'KendallElatedSearchOpener',
			'KendallElatedSideAreaOpener',
			'KendallElatedStickySidebar',
			'KendallElatedSocialIconWidget',
			'KendallElatedSeparatorWidget'
		);

		foreach ($widgets as $widget) {
			register_widget($widget);
		}
	}
}

add_action('widgets_init', 'kendall_elated_register_widgets');