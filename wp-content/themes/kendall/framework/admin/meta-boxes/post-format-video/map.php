<?php

/*** Video Post Format ***/


if(!function_exists('kendall_elated_video_meta_box_map')) {

	function kendall_elated_video_meta_box_map() {

		$video_post_format_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Video Post Format', 'kendall'),
				'name' 	=> 'post_format_video_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_video_type_meta',
				'type'        => 'select',
				'label'       => esc_html__('Video Type', 'kendall'),
				'description' => esc_html__('Choose video type', 'kendall'),
				'parent'      => $video_post_format_meta_box,
				'default_value' => 'youtube',
				'options'     => array(
					'youtube' => esc_html__('Youtube', 'kendall'),
					'vimeo' => esc_html__('Vimeo', 'kendall'),
					'self' => esc_html__('Self Hosted', 'kendall'),
				),
				'args' => array(
					'dependence' => true,
					'hide' => array(
						'youtube' => '#eltd_eltd_video_self_hosted_container',
						'vimeo' => '#eltd_eltd_video_self_hosted_container',
						'self' => '#eltd_eltd_video_embedded_container'
					),
					'show' => array(
						'youtube' => '#eltd_eltd_video_embedded_container',
						'vimeo' => '#eltd_eltd_video_embedded_container',
						'self' => '#eltd_eltd_video_self_hosted_container')
				)
			)
		);

		$eltd_video_embedded_container = kendall_elated_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name' => 'eltd_video_embedded_container',
				'hidden_property' => 'eltd_video_type_meta',
				'hidden_value' => 'self'
			)
		);

		$eltd_video_self_hosted_container = kendall_elated_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name' => 'eltd_video_self_hosted_container',
				'hidden_property' => 'eltd_video_type_meta',
				'hidden_values' => array('youtube', 'vimeo')
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_id_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video ID', 'kendall'),
				'description' => esc_html__('Enter Video ID', 'kendall'),
				'parent'      => $eltd_video_embedded_container
			)
		);


		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__('Video Image', 'kendall'),
				'description' => esc_html__('Upload video image', 'kendall'),
				'parent'      => $eltd_video_self_hosted_container,

			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_webm_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video WEBM', 'kendall'),
				'description' => esc_html__('Enter video URL for WEBM format', 'kendall'),
				'parent'      => $eltd_video_self_hosted_container,

			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_mp4_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video MP4', 'kendall'),
				'description' => esc_html__('Enter video URL for MP4 format', 'kendall'),
				'parent'      => $eltd_video_self_hosted_container,

			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_video_ogv_link_meta',
				'type'        => 'text',
				'label'       => esc_html__('Video OGV', 'kendall'),
				'description' => esc_html__('Enter video URL for OGV format', 'kendall'),
				'parent'      => $eltd_video_self_hosted_container,

			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_video_meta_box_map');
}