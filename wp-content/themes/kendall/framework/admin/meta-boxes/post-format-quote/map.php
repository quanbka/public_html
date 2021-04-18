<?php

/*** Quote Post Format ***/

if(!function_exists('kendall_elated_quote_meta_box_map')) {

	function kendall_elated_quote_meta_box_map() {

		$quote_post_format_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' =>	array('post'),
				'title' => esc_html__('Quote Post Format', 'kendall'),
				'name' 	=> 'post_format_quote_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name'        => 'eltd_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__('Quote Text', 'kendall'),
				'description' => esc_html__('Enter Quote text', 'kendall'),
				'parent'      => $quote_post_format_meta_box,

			)
		);


	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_quote_meta_box_map');
}