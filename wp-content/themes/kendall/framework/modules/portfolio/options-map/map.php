<?php

if ( ! function_exists('kendall_elated_portfolio_options_map') ) {

	function kendall_elated_portfolio_options_map() {

		kendall_elated_add_admin_page(array(
			'slug'  => '_portfolio',
			'title' => esc_html__('Portfolio', 'kendall'),
			'icon'  => 'fa fa-camera-retro'
		));

		$panel = kendall_elated_add_admin_panel(array(
			'title' => esc_html__('Portfolio Single', 'kendall'),
			'name'  => 'panel_portfolio_single',
			'page'  => '_portfolio'
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'portfolio_single_template',
			'type'        => 'select',
			'label'       => esc_html__('Portfolio Type', 'kendall'),
			'default_value'	=> 'small-images',
			'description' => esc_html__('Choose a default type for Single Project pages', 'kendall'),
			'parent'      => $panel,
			'options'     => array(
				'small-images' => esc_html__('Portfolio small images', 'kendall'),
				'small-slider' => esc_html__('Portfolio small slider', 'kendall'),
				'big-images' => esc_html__('Portfolio big images', 'kendall'),
				'big-slider' => esc_html__('Portfolio big slider', 'kendall'),
				'custom' => esc_html__('Portfolio custom', 'kendall'),
				'full-width-custom' => esc_html__('Portfolio full width custom', 'kendall'),
				'gallery' => esc_html__('Portfolio gallery', 'kendall'),
				'masonry'   => esc_html__('Portfolio masonry', 'kendall'),
				'masonry-wide'   => esc_html__('Portfolio masonry wide', 'kendall'),
			)
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_padding_meta',
			'type'          => 'text',
			'label'         => esc_html__('Padding on Portfolio Single Pages', 'kendall'),
			'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'kendall'),
			'parent'        => $panel,
			'default_value' => ''
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_images',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Images', 'kendall'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for projects with images.', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_lightbox_videos',
			'type'          => 'yesno',
			'label'         => esc_html__('Lightbox for Videos', 'kendall'),
			'description'   => esc_html__('Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects.', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_categories',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Categories', 'kendall'),
			'description'   => esc_html__('Enabling this option will disable category meta description on Single Projects.', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_date',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Date', 'kendall'),
			'description'   => esc_html__('Enabling this option will disable date meta on Single Projects.', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'kendall'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_sticky_sidebar',
			'type'          => 'yesno',
			'label'         => esc_html__('Sticky Side Text', 'kendall'),
			'description'   => esc_html__('Enabling this option will make side text sticky on Single Project pages', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'yes'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'portfolio_single_hide_pagination',
			'type'          => 'yesno',
			'label'         => esc_html__('Hide Pagination', 'kendall'),
			'description'   => esc_html__('Enabling this option will turn off portfolio pagination functionality.', 'kendall'),
			'parent'        => $panel,
			'default_value' => 'no',
			'args' => array(
				'dependence' => true,
				'dependence_hide_on_yes' => '#eltd_navigate_same_category_container'
			)
		));

		$container_navigate_category = kendall_elated_add_admin_container(array(
			'name'            => 'navigate_same_category_container',
			'parent'          => $panel,
			'hidden_property' => 'portfolio_single_hide_pagination',
			'hidden_value'    => 'yes'
		));

		kendall_elated_add_admin_field(array(
			'name'            => 'portfolio_single_nav_same_category',
			'type'            => 'yesno',
			'label'           => esc_html__('Enable Pagination Through Same Category', 'kendall'),
			'description'     => esc_html__('Enabling this option will make portfolio pagination sort through current category.', 'kendall'),
			'parent'          => $container_navigate_category,
			'default_value'   => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'portfolio_single_numb_columns',
			'type'        => 'select',
			'label'       => esc_html__('Number of Columns', 'kendall'),
			'default_value' => 'three-columns',
			'description' => esc_html__('Enter the number of columns for Portfolio Gallery type', 'kendall'),
			'parent'      => $panel,
			'options'     => array(
				'two-columns' => esc_html__('2 columns', 'kendall'),
				'three-columns' => esc_html__('3 columns', 'kendall'),
				'four-columns' => esc_html__('4 columns', 'kendall'),
			)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'portfolio_single_slug',
			'type'        => 'text',
			'label'       => esc_html__('Portfolio Single Slug', 'kendall'),
			'description' => esc_html__('Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'kendall'),
			'parent'      => $panel,
			'args'        => array(
				'col_width' => 3
			)
		));

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_portfolio_options_map', 19);

}