<?php

/*** Link Post Format ***/

if(!function_exists('kendall_elated_link_meta_box_map')) {

	function kendall_elated_link_meta_box_map() {

		$link_post_format_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array('post'),
				'title' => esc_html__('Link Post Format', 'kendall'),
				'name' => 'post_format_link_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'kendall'),
				'description' => esc_html__('Enter link', 'kendall'),
				'parent'      => $link_post_format_meta_box
			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_link_meta_box_map');
}