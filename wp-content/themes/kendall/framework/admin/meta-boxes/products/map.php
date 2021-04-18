<?php
if(!function_exists('kendall_elated_product_meta_box_map')) {

	function kendall_elated_product_meta_box_map() {

		$product_meta_box = kendall_elated_add_meta_box(
			array(
				'scope' => array('product'),
				'title' => esc_html__('Product', 'kendall'),
				'name' => 'product_meta'
			)
		);

		kendall_elated_add_meta_box_field(
			array(
				'name' => 'eltd_product_subtitle_meta',
				'type' => 'text',
				'default_value' => '',
				'label' => esc_html__('Product Subtitle', 'kendall'),
				'description' => esc_html__('Insert product subtitle', 'kendall'),
				'parent' => $product_meta_box
			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_product_meta_box_map');
}