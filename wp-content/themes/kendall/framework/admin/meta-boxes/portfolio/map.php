<?php

if(!function_exists('kendall_elated_portfolio_meta_box_map')) {

	function kendall_elated_portfolio_meta_box_map() {

		$eltd_pages = array();
		$pages = get_pages();
		global $kendall_elated_Framework;
		foreach($pages as $page) {
			$eltd_pages[$page->ID] = $page->post_title;
		}

		//Portfolio Images

		$eltdPortfolioImages = new KendallElatedMetaBox('portfolio-item', esc_html__('Portfolio Images (multiple upload)', 'kendall'), '', '', 'portfolio_images');
		$kendall_elated_Framework->eltdMetaBoxes->addMetaBox('portfolio_images',$eltdPortfolioImages);

		$eltd_portfolio_image_gallery = new KendallElatedMultipleImages('eltd_portfolio-image-gallery', esc_html__('Portfolio Images', 'kendall'), esc_html__('Choose your portfolio images', 'kendall'));
		$eltdPortfolioImages->addChild('eltd_portfolio-image-gallery',$eltd_portfolio_image_gallery);

		//Portfolio Images/Videos 2

		$eltdPortfolioImagesVideos2 = new KendallElatedMetaBox('portfolio-item', esc_html__('Portfolio Images/Videos (single upload)', 'kendall'));
		$kendall_elated_Framework->eltdMetaBoxes->addMetaBox('portfolio_images_videos2',$eltdPortfolioImagesVideos2);

		$eltd_portfolio_images_videos2 = new KendallElatedImagesVideosFramework(esc_html__('Portfolio Images/Videos 2', 'kendall'), esc_html__('ThisIsDescription', 'kendall'));
		$eltdPortfolioImagesVideos2->addChild('eltd_portfolio_images_videos2',$eltd_portfolio_images_videos2);

		//Portfolio Additional Sidebar Items

		$eltdAdditionalSidebarItems = kendall_elated_add_meta_box(
			array(
				'scope' => array('portfolio-item'),
				'title' => esc_html__('Additional Portfolio Sidebar Items', 'kendall'),
				'name' => 'portfolio_properties'
			)
		);

		$eltd_portfolio_properties = kendall_elated_add_options_framework(
			array(
				'label' => esc_html__('Portfolio Properties', 'kendall'),
				'name' => 'eltd_portfolio_properties',
				'parent' => $eltdAdditionalSidebarItems
			)
		);

	}

	add_action('kendall_elated_meta_boxes_map', 'kendall_elated_portfolio_meta_box_map');
}