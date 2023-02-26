<?php

/*** Post Format ***/

if(!function_exists('kendall_elated_blog_posts_meta_box_map')) {

	function kendall_elated_blog_posts_meta_box_map() {

		$blog_post_format_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Masonry Gallery Type', 'kendall'),
				'name' 	=> 'post_format_general_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_masonry_gallery_type_meta',
				'type'        => 'select',
				'label'       => esc_html__('Masonry Gallery Type', 'kendall'),
				'description' => esc_html__('Choose masonry gallery type', 'kendall'),
				'parent'      => $blog_post_format_meta_box,
				'default_value' => 'default',
				'options'     => array(
					'default' => esc_html__('Default', 'kendall'),
					'large_height_width' => esc_html__('Large Height/Width', 'kendall'),
					'large_width' => esc_html__('Large Width', 'kendall'),
					'large_height' => esc_html__('Large Height', 'kendall')
				)
			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_blog_posts_meta_box_map');
}