<?php

if ( ! function_exists('kendall_elated_social_options_map') ) {

	function kendall_elated_social_options_map() {

		kendall_elated_add_admin_page(
			array(
				'slug'  => '_social_page',
				'title' => esc_html__('Social Networks', 'kendall'),
				'icon'  => 'fa fa-share-alt'
			)
		);

		/**
		 * Enable Social Share
		 */
		$panel_social_share = kendall_elated_add_admin_panel(array(
			'page'  => '_social_page',
			'name'  => 'panel_social_share',
			'title' => esc_html__('Enable Social Share', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Social Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow social share on networks of your choice', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_panel_social_networks, #eltd_panel_show_social_share_on'
			),
			'parent'		=> $panel_social_share
		));

		$panel_show_social_share_on = kendall_elated_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'  			=> 'panel_show_social_share_on',
			'title' 			=> esc_html__('Show Social Share On', 'kendall'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_post',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Posts', 'kendall'),
			'description'	=> esc_html__('Show Social Share on Blog Posts', 'kendall'),
			'parent'		=> $panel_show_social_share_on
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_page',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Pages', 'kendall'),
			'description'	=> esc_html__('Show Social Share on Pages', 'kendall'),
			'parent'		=> $panel_show_social_share_on
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_attachment',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Media', 'kendall'),
			'description'	=> esc_html__('Show Social Share for Images and Videos', 'kendall'),
			'parent'		=> $panel_show_social_share_on
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_social_share_on_portfolio-item',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Portfolio Item', 'kendall'),
			'description'	=> esc_html__('Show Social Share for Portfolio Items', 'kendall'),
			'parent'		=> $panel_show_social_share_on
		));

		if(kendall_elated_is_woocommerce_installed()){
			kendall_elated_add_admin_field(array(
				'type'			=> 'yesno',
				'name'			=> 'enable_social_share_on_product',
				'default_value'	=> 'no',
				'label'			=> esc_html__('Product', 'kendall'),
				'description'	=> esc_html__('Show Social Share for Product Items', 'kendall'),
				'parent'		=> $panel_show_social_share_on
			));
		}

		/**
		 * Social Share Networks
		 */
		$panel_social_networks = kendall_elated_add_admin_panel(array(
			'page'  			=> '_social_page',
			'name'				=> 'panel_social_networks',
			'title'				=> esc_html__('Social Networks', 'kendall'),
			'hidden_property'	=> 'enable_social_share',
			'hidden_value'		=> 'no'
		));

		/**
		 * Facebook
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'facebook_title',
			'title'		=> esc_html__('Share on Facebook', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_facebook_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Facebook', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_facebook_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_facebook_share_container = kendall_elated_add_admin_container(array(
			'name'		=> 'enable_facebook_share_container',
			'hidden_property'	=> 'enable_facebook_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'facebook_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_facebook_share_container
		));

		/**
		 * Twitter
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'twitter_title',
			'title'		=> esc_html__('Share on Twitter', 'kendall')
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_twitter_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Twitter', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_twitter_share_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_twitter_share_container = kendall_elated_add_admin_container(array(
			'name'		=> 'enable_twitter_share_container',
			'hidden_property'	=> 'enable_twitter_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'twitter_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_twitter_share_container
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'text',
			'name'			=> 'twitter_via',
			'default_value'	=> '',
			'label'			=> esc_html__('Via', 'kendall'),
			'parent'		=> $enable_twitter_share_container
		));

		/**
		 * Google Plus
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'google_plus_title',
			'title'		=> esc_html__('Share on Google Plus', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_google_plus_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Google Plus', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_google_plus_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_google_plus_container = kendall_elated_add_admin_container(array(
			'name'		=> 'enable_google_plus_container',
			'hidden_property'	=> 'enable_google_plus_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'google_plus_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_google_plus_container
		));

		/**
		 * Linked In
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'linkedin_title',
			'title'		=> esc_html__('Share on LinkedIn', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_linkedin_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via LinkedIn', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_linkedin_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_linkedin_container = kendall_elated_add_admin_container(array(
			'name'		=> 'enable_linkedin_container',
			'hidden_property'	=> 'enable_linkedin_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'linkedin_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_linkedin_container
		));

		/**
		 * Tumblr
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'tumblr_title',
			'title'		=> esc_html__('Share on Tumblr', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_tumblr_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Tumblr', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_tumblr_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_tumblr_container = kendall_elated_add_admin_container(array(
			'name'		=> 'enable_tumblr_container',
			'hidden_property'	=> 'enable_tumblr_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'tumblr_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_tumblr_container
		));

		/**
		 * Pinterest
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'pinterest_title',
			'title'		=> esc_html__('Share on Pinterest', 'kendall')
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_pinterest_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via Pinterest', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_pinterest_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_pinterest_container = kendall_elated_add_admin_container(array(
			'name'				=> 'enable_pinterest_container',
			'hidden_property'	=> 'enable_pinterest_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'pinterest_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_pinterest_container
		));

		/**
		 * VK
		 */
		kendall_elated_add_admin_section_title(array(
			'parent'	=> $panel_social_networks,
			'name'		=> 'vk_title',
			'title'		=> esc_html__('Share on VK', 'kendall'),
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'yesno',
			'name'			=> 'enable_vk_share',
			'default_value'	=> 'no',
			'label'			=> esc_html__('Enable Share', 'kendall'),
			'description'	=> esc_html__('Enabling this option will allow sharing via VK', 'kendall'),
			'args'			=> array(
				'dependence' => true,
				'dependence_hide_on_yes' => '',
				'dependence_show_on_yes' => '#eltd_enable_vk_container'
			),
			'parent'		=> $panel_social_networks
		));

		$enable_vk_container = kendall_elated_add_admin_container(array(
			'name'				=> 'enable_vk_container',
			'hidden_property'	=> 'enable_vk_share',
			'hidden_value'		=> 'no',
			'parent'			=> $panel_social_networks
		));

		kendall_elated_add_admin_field(array(
			'type'			=> 'image',
			'name'			=> 'vk_icon',
			'default_value'	=> '',
			'label'			=> esc_html__('Upload Icon', 'kendall'),
			'parent'		=> $enable_vk_container
		));

		if(defined('ELATED_TWITTER_FEED_VERSION')) {
            $twitter_panel = kendall_elated_add_admin_panel(array(
                'title' => esc_html__('Twitter', 'kendall'),
                'name'  => 'panel_twitter',
                'page'  => '_social_page'
            ));

            kendall_elated_add_admin_twitter_button(array(
                'name'   => 'twitter_button',
                'parent' => $twitter_panel
            ));
        }

        if(defined('ELATED_INSTAGRAM_FEED_VERSION')) {
            $instagram_panel = kendall_elated_add_admin_panel(array(
                'title' => esc_html__('Instagram', 'kendall'),
                'name'  => 'panel_instagram',
                'page'  => '_social_page'
            ));

            kendall_elated_add_admin_instagram_button(array(
                'name'   => 'instagram_button',
                'parent' => $instagram_panel
            ));
        }
	}

	add_action( 'kendall_elated_options_map', 'kendall_elated_social_options_map', 20);
}