<?php

/*** Audio Post Format ***/

if(!function_exists('kendall_elated_audio_meta_box_map')) {

	function kendall_elated_audio_meta_box_map() {

		$audio_post_format_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Audio Post Format', 'kendall'),
				'name' 	=> 'post_format_audio_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Link', 'kendall'),
				'description' => esc_html__('Enter audion link', 'kendall'),
				'parent'      => $audio_post_format_meta_box,

			)
		);


	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_audio_meta_box_map');
}