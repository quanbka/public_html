<?php

if ( ! function_exists('kendall_elated_woocommerce_options_map') ) {

	/**
	 * Add Woocommerce options page
	 */
	function kendall_elated_woocommerce_options_map() {

        $custom_sidebars = kendall_elated_get_custom_sidebars();
		kendall_elated_add_admin_page(
			array(
				'slug' => '_woocommerce_page',
				'title' => esc_html__('Woocommerce', 'kendall'),
				'icon' => 'fa fa-shopping-cart'
			)
		);

		/**
		 * Product List Settings
		 */
		$panel_product_list = kendall_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_list',
				'title' => esc_html__('Product List', 'kendall')
			)
		);

		kendall_elated_add_admin_field(array(
			'name'        	=> 'eltd_woo_products_list_full_width',
			'type'        	=> 'yesno',
			'label'       	=> esc_html__('Enable Full Width Template', 'kendall'),
			'default_value'	=> 'no',
			'description' 	=> esc_html__('Enabling this option will enable full width template for shop page', 'kendall'),
			'parent'      	=> $panel_product_list,
		));

		kendall_elated_add_admin_field(array(
			'name'        	=> 'eltd_woo_product_list_columns',
			'type'        	=> 'select',
			'label'       	=> esc_html__('Product List Columns', 'kendall'),
			'default_value'	=> 'eltd-woocommerce-columns-3',
			'description' 	=> esc_html__('Choose number of columns for product listing and related products on single product', 'kendall'),
			'options'		=> array(
				'eltd-woocommerce-columns-3' => esc_html__('3 Columns (2 with sidebar)', 'kendall'),
				'eltd-woocommerce-columns-4' => esc_html__('4 Columns (3 with sidebar)', 'kendall')
			),
			'parent'      	=> $panel_product_list,
		));

		kendall_elated_add_admin_field(array(
			'name'        	=> 'eltd_woo_products_per_page',
			'type'        	=> 'text',
			'label'       	=> esc_html__('Number of products per page', 'kendall'),
			'default_value'	=> '',
			'description' 	=> esc_html__('Set number of products on shop page', 'kendall'),
			'parent'      	=> $panel_product_list,
			'args' 			=> array(
				'col_width' => 3
			)
		));

        if(count($custom_sidebars) > 0) {
            kendall_elated_add_admin_field(array(
                'name' => 'product_custom_sidebar',
                'type' => 'selectblank',
                'label' => esc_html__('Sidebar to Display', 'kendall'),
                'description' => esc_html__('Choose a sidebar to display on Category Product Lists. Default sidebar is "Sidebar Page"', 'kendall'),
                'parent' => $panel_product_list,
                'options' => kendall_elated_get_custom_sidebars()
            ));
        }

		/**
		 * Product Single Settings
		 */
		$panel_product_single = kendall_elated_add_admin_panel(
			array(
				'page' => '_woocommerce_page',
				'name' => 'panel_product_single',
				'title' => esc_html__('Product Single', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(array(
			'name'        	=> 'woo_product_single_padding_meta',
			'type'          => 'text',
			'label'         => esc_html__('Padding on Shop Single Pages', 'kendall'),
			'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'kendall'),
			'parent'        => $panel_product_single,
			'default_value' => ''
		));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_woocommerce_options_map', 24);

}