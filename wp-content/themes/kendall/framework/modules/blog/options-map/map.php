<?php

if ( ! function_exists('kendall_elated_blog_options_map') ) {

	function kendall_elated_blog_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug' => '_blog_page',
				'title' => esc_html__('Blog', 'kendall'),
				'icon' => 'fa fa-files-o'
			)
		);

		/**
		 * Blog Lists
		 */

		$custom_sidebars = kendall_elated_get_custom_sidebars();

		$panel_blog_lists = kendall_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_lists',
				'title' => esc_html__('Blog Lists', 'kendall')
			)
		);

		kendall_elated_add_admin_field(array(
			'name'        => 'blog_list_type',
			'type'        => 'select',
			'label'       => esc_html__('Blog Layout for Archive Pages', 'kendall'),
			'description' => esc_html__('Choose a default blog layout', 'kendall'),
			'default_value' => 'standard',
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'standard'				=> esc_html__('Blog: Standard', 'kendall'),
				'masonry' 				=> esc_html__('Blog: Masonry', 'kendall'),
				'masonry-full-width' 	=> esc_html__('Blog: Masonry Full Width', 'kendall'),
				'masonry-gallery' 	    => esc_html__('Blog: Masonry Gallery', 'kendall'),
				'masonry-gallery-full-width' => esc_html__('Blog: Masonry Gallery Full Width', 'kendall'),
				'standard-whole-post' 	=> esc_html__('Blog: Standard Whole Post', 'kendall')
			)
		));

		kendall_elated_add_admin_field(array(
			'name'        => 'archive_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Archive and Category Sidebar', 'kendall'),
			'description' => esc_html__('Choose a sidebar layout for archived Blog Post Lists and Category Blog Lists', 'kendall'),
			'parent'      => $panel_blog_lists,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'kendall'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'kendall'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'kendall'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'kendall'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'kendall'),
			)
		));


		if(count($custom_sidebars) > 0) {
			kendall_elated_add_admin_field(array(
				'name' => 'blog_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'kendall'),
				'description' => esc_html__('Choose a sidebar to display on Blog Post Lists and Category Blog Lists. Default sidebar is "Sidebar Page"', 'kendall'),
				'parent' => $panel_blog_lists,
				'options' => kendall_elated_get_custom_sidebars()
			));
		}

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'pagination',
				'default_value' => 'yes',
				'label' => esc_html__('Pagination', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display pagination links on bottom of Blog Post List', 'kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_pagination_container'
				)
			)
		);

		$pagination_container = kendall_elated_add_admin_container(
			array(
				'name' => 'eltd_pagination_container',
				'hidden_property' => 'pagination',
				'hidden_value' => 'no',
				'parent' => $panel_blog_lists,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'parent' => $pagination_container,
				'type' => 'text',
				'name' => 'blog_page_range',
				'default_value' => '',
				'label' => esc_html__('Pagination Range limit', 'kendall'),
				'description' => esc_html__('Enter a number that will limit pagination to a certain range of links', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'selectblank',
				'name' => 'pagination_type',
				'default_value' => 'standard_pagination',
				'label' => esc_html__('Pagination Type', 'kendall'),
				'parent' => $pagination_container,
				'description' => esc_html__('Choose Pagination Type', 'kendall'),
				'options' => array(
					'standard_paginaton' => esc_html__('Standard Pagination', 'kendall'),
					'load_more_pagination' => esc_html__('Load More', 'kendall'),
				),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'masonry_filter',
				'default_value' => 'no',
				'label' => esc_html__('Masonry Filter', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enabling this option will display category filter on Masonry and Masonry Full Width Templates', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		kendall_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Number of Words in Excerpt', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		kendall_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'standard_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Standard Type Number of Words in Excerpt', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		kendall_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Type Number of Words in Excerpt', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		kendall_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_full_width_number_of_chars',
				'default_value' => '',
				'label' => esc_html__('Masonry Full Width Type Number of Words in Excerpt', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);
		kendall_elated_add_admin_field(
			array(
				'type' => 'text',
				'name' => 'masonry_gallery_number_of_chars',
				'default_value' => '30',
				'label' => esc_html__('Masonry Gallery Type Number of Words in Excerpt', 'kendall'),
				'parent' => $panel_blog_lists,
				'description' => esc_html__('Enter a number of words in excerpt (article summary)', 'kendall'),
				'args' => array(
					'col_width' => 3
				)
			)
		);

		/**
		 * Blog Single
		 */
		$panel_blog_single = kendall_elated_add_admin_panel(
			array(
				'page' => '_blog_page',
				'name' => 'panel_blog_single',
				'title' => esc_html__('Blog Single', 'kendall'),
			)
		);

		kendall_elated_add_admin_field(array(
			'name'          => 'blog_single_padding_meta',
			'type'          => 'text',
			'label'         => esc_html__('Padding on Single Pages', 'kendall'),
			'description'   => esc_html__('Insert padding in format 10px 10px 10px 10px', 'kendall'),
			'parent'        => $panel_blog_single,
			'default_value' => ''
		));


		kendall_elated_add_admin_field(array(
			'name'        => 'blog_single_sidebar_layout',
			'type'        => 'select',
			'label'       => esc_html__('Sidebar Layout', 'kendall'),
			'description' => esc_html__('Choose a sidebar layout for Blog Single pages', 'kendall'),
			'parent'      => $panel_blog_single,
			'options'     => array(
				'default'			=> esc_html__('No Sidebar', 'kendall'),
				'sidebar-33-right'	=> esc_html__('Sidebar 1/3 Right', 'kendall'),
				'sidebar-25-right' 	=> esc_html__('Sidebar 1/4 Right', 'kendall'),
				'sidebar-33-left' 	=> esc_html__('Sidebar 1/3 Left', 'kendall'),
				'sidebar-25-left' 	=> esc_html__('Sidebar 1/4 Left', 'kendall')
			),
			'default_value'	=> 'default'
		));


		if(count($custom_sidebars) > 0) {
			kendall_elated_add_admin_field(array(
				'name' => 'blog_single_custom_sidebar',
				'type' => 'selectblank',
				'label' => esc_html__('Sidebar to Display', 'kendall'),
				'description' => esc_html__('Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'kendall'),
				'parent' => $panel_blog_single,
				'options' => kendall_elated_get_custom_sidebars()
			));
		}

		kendall_elated_add_admin_field(array(
			'name'          => 'blog_single_title_in_title_area',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Post Title in Title Area', 'kendall'),
			'description'   => esc_html__('Enabling this option will show post title in title area on single post pages', 'kendall'),
			'parent'        => $panel_blog_single,
			'default_value' => 'no'
		));

		kendall_elated_add_admin_field(array(
			'name'          => 'blog_single_comments',
			'type'          => 'yesno',
			'label'         => esc_html__('Show Comments', 'kendall'),
			'description'   => esc_html__('Enabling this option will show comments on your page.', 'kendall'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		kendall_elated_add_admin_field(array(
			'name'			=> 'blog_single_related_posts',
			'type'			=> 'yesno',
			'label'			=> esc_html__('Show Related Posts', 'kendall'),
			'description'   => esc_html__('Enabling this option will show related posts on your single post.', 'kendall'),
			'parent'        => $panel_blog_single,
			'default_value' => 'yes'
		));

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_single_navigation',
				'default_value' => 'yes',
				'label' => esc_html__('Enable Prev/Next Single Post Navigation Links', 'kendall'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enable navigation links through the blog posts (left and right arrows will appear)', 'kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_blog_single_navigation_container'
				)
			)
		);

		$blog_single_navigation_container = kendall_elated_add_admin_container(
			array(
				'name' => 'eltd_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'       => esc_html__('Enable Navigation Only in Current Category', 'kendall'),
				'description' => esc_html__('Limit your navigation only through current category', 'kendall'),
				'parent'      => $blog_single_navigation_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type' => 'yesno',
				'name' => 'blog_author_info',
				'default_value' => 'yes',
				'label' => esc_html__('Show Author Info Box', 'kendall'),
				'parent' => $panel_blog_single,
				'description' => esc_html__('Enabling this option will display author name and descriptions on Blog Single pages', 'kendall'),
				'args' => array(
					'dependence' => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#eltd_eltd_blog_single_author_info_container'
				)
			)
		);

		$blog_single_author_info_container = kendall_elated_add_admin_container(
			array(
				'name' => 'eltd_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value' => 'no',
				'parent' => $panel_blog_single,
			)
		);

		kendall_elated_add_admin_field(
			array(
				'type'        => 'yesno',
				'name' => 'blog_author_info_email',
				'default_value' => 'no',
				'label'       => esc_html__('Show Author Email', 'kendall'),
				'description' => esc_html__('Enabling this option will show author email', 'kendall'),
				'parent'      => $blog_single_author_info_container,
				'args' => array(
					'col_width' => 3
				)
			)
		);

	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_blog_options_map', 18);

}