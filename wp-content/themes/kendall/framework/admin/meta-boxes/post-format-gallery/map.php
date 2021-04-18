<?php

/*** Gallery Post Format ***/

if(!function_exists('kendall_elated_gallery_meta_box_map')) {

	function kendall_elated_gallery_meta_box_map() {

		$gallery_post_format_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Gallery Post Format', 'kendall'),
				'name' 	=> 'post_format_gallery_meta'
			)
		);

		kendall_elated_add_multiple_images_field(
			array(
				'name'        => 'eltd_post_gallery_images_meta',
				'label'       => esc_html__('Gallery Images', 'kendall'),
				'description' => esc_html__('Choose your gallery images', 'kendall'),
				'parent'      => $gallery_post_format_meta_box,
			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_gallery_meta_box_map');
}