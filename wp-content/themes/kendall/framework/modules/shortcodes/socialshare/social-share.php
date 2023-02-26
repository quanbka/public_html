<?php
namespace KendallElated\Modules\Shortcodes\SocialShare;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class SocialShare implements ShortcodeInterface {

	private $base;
	private $socialNetworks;

	function __construct() {
		$this->base = 'eltd_social_share';
		$this->socialNetworks = array(
			'facebook',
			'twitter',
			'google_plus',
			'linkedin',
			'tumblr',
			'pinterest',
			'vk'
		);
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function getSocialNetworks() {
		return $this->socialNetworks;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 */
	public function vcMap() {

		vc_map(array(
			'name' => esc_html__('Elated Social Share', 'kendall'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-social-share extended-custom-icon',
			'category' => esc_html__('by ELATED', 'kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Type', 'kendall'),
					'param_name' => 'type',
					'admin_label' => true,
					'description' => esc_html__('Choose type of Social Share', 'kendall'),
					'value' => array(
						esc_html__('List', 'kendall') => 'list',
						esc_html__('Dropdown', 'kendall') => 'dropdown'
					),
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Icons Type', 'kendall'),
					'param_name' => 'icon_type',
					'admin_label' => true,
					'description' => esc_html__('Choose type of Icons', 'kendall'),
					'value' => array(
						esc_html__('Normal', 'kendall') => 'normal',
						esc_html__('Circle', 'kendall') => 'circle'
					),
					'save_always' => true
				),
			)
		));
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'type'			=> 'list',
			'icon_type'		=> 'normal'
		);

		//Shortcode Parameters
		$params = shortcode_atts($args, $atts);

		//Is social share enabled
		$params['enable_social_share'] = (kendall_elated_options()->getOptionValue('enable_social_share') == 'yes') ? true : false;

		//Is social share enabled for post type
		$post_type = get_post_type();
		$params['enabled'] = (kendall_elated_options()->getOptionValue('enable_social_share_on_'.$post_type) == 'yes') ? true : false;

		//Social Networks Data
		if ( $params['type'] == 'list' ) {
			$params['networks'] = $this->getSocialNetworksParamsList($params);
		} else {
			$params['networks'] = $this->getSocialNetworksParamsDropdown($params);
		}


		$html = '';

		if ($params['enable_social_share']) {
			if ($params['enabled']) {
				$html .= kendall_elated_get_shortcode_module_template_part('templates/' . $params['type'], 'socialshare', '', $params);
			}
		}

		return $html;

	}

	/**
	 * Get Social Networks data to display
	 * @return array
	 */
	private function getSocialNetworksParamsDropdown() {

		$networks = array();

		foreach ($this->socialNetworks as $net) {

			$html = '';
			if (kendall_elated_options()->getOptionValue('enable_'.$net.'_share') == 'yes') {

				$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$params = array(
					'name' => $net
				);
				$params['link'] = $this->getSocialNetworkShareLink($net, $image);
				$params['label'] = $this->getSocialNetworkLabel( $net );
				$params['custom_icon'] = (kendall_elated_options()->getOptionValue($net.'_icon')) ? kendall_elated_options()->getOptionValue($net.'_icon') : '';
				$html = kendall_elated_get_shortcode_module_template_part('templates/parts/network', 'socialshare', '', $params);

			}

			$networks[$net] = $html;

		}

		return $networks;

	}

	/**
	 * Get Social Networks data to display
	 * @return array
	 */
	private function getSocialNetworksParamsList($params) {

		$networks = array();
		$icons_type = $params['icon_type'];

		foreach ($this->socialNetworks as $net) {

			$html = '';
			if (kendall_elated_options()->getOptionValue('enable_'.$net.'_share') == 'yes') {

				$image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$params = array(
					'name' => $net
				);
				$params['link'] = $this->getSocialNetworkShareLink($net, $image);
				$params['icon'] = $this->getSocialNetworkIcon($net, $icons_type);
				$params['custom_icon'] = (kendall_elated_options()->getOptionValue($net.'_icon')) ? kendall_elated_options()->getOptionValue($net.'_icon') : '';
				$html = kendall_elated_get_shortcode_module_template_part('templates/parts/network-list', 'socialshare', '', $params);

			}

			$networks[$net] = $html;

		}

		return $networks;

	}

	/**
	 * Get share link for networks
	 *
	 * @param $net
	 * @param $image
	 * @return string
	 */
	private function getSocialNetworkShareLink($net, $image) {

		switch ($net) {
			case 'facebook':
				if(wp_is_mobile()) {
					$link = 'window.open(\'http://m.facebook.com/sharer.php?u=' . urlencode(get_permalink()) .'\');';
				} else {
					$link = 'window.open(\'http://www.facebook.com/sharer.php?s=100&amp;p[title]=' . urlencode(kendall_elated_addslashes(get_the_title())) . '&amp;p[url]=' . urlencode(get_permalink()) . '&amp;p[images][0]=' . $image[0] . '&amp;p[summary]=' . urlencode(kendall_elated_addslashes(get_the_excerpt())) . '\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');';
				}
				break;
			case 'twitter':
				$count_char = (isset($_SERVER['https'])) ? 23 : 22;
				$twitter_via = (kendall_elated_options()->getOptionValue('twitter_via') !== '') ? ' via ' . kendall_elated_options()->getOptionValue('twitter_via') . ' ' : '';

				if(wp_is_mobile()) {
					$link = 'window.open(\'https://twitter.com/intent/tweet?text=' . urlencode(kendall_elated_the_excerpt_max_charlength($count_char) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;>';
				} else {
					$link = 'window.open(\'http://twitter.com/home?status=' . urlencode(kendall_elated_the_excerpt_max_charlength($count_char) . $twitter_via) . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				}
				break;
			case 'google_plus':
				$link = 'popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'linkedin':
				$link = 'popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'tumblr':
				$link = 'popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'pinterest':
				$link = 'popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . kendall_elated_addslashes(get_the_title()) . '&amp;media=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'vk':
				$link = 'popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '&amp;image=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			default:
				$link = '';
		}

		return $link;

	}

	private function getSocialNetworkIcon($net, $type) {

		switch ($net) {
			case 'facebook':
				$icon = ( $type == 'circle' ) ? 'social_facebook_circle' : 'social_facebook';
				break;
			case 'twitter':
				$icon = ( $type == 'circle' ) ? 'social_twitter_circle' : 'social_twitter';
				break;
			case 'google_plus':
				$icon = ( $type == 'circle' ) ? 'social_googleplus_circle' : 'social_googleplus';
				break;
			case 'linkedin':
				$icon = ( $type == 'circle' ) ? 'social_linkedin_circle' : 'social_linkedin';
				break;
			case 'tumblr':
				$icon = ( $type == 'circle' ) ? 'social_tumblr_circle' : 'social_tumblr';
				break;
			case 'pinterest':
				$icon = ( $type == 'circle' ) ? 'social_pinterest_circle' : 'social_pinterest';
				break;
			case 'vk':
				$icon = 'fa fa-vk';
				break;
			default:
				$icon = '';
		}

		return $icon;

	}

	private function getSocialNetworkLabel( $net ) {

		switch ($net) {
			case 'facebook':
				$label = esc_html__( 'Facebook', 'kendall' );
				break;
			case 'twitter':
				$label = esc_html__( 'Twitter', 'kendall' );
				break;
			case 'google_plus':
				$label = esc_html__( 'Google Plus', 'kendall' );
				break;
			case 'linkedin':
				$label = esc_html__( 'LinkedIn', 'kendall' );
				break;
			case 'tumblr':
				$label = esc_html__( 'Tumblr', 'kendall' );
				break;
			case 'pinterest':
				$label = esc_html__( 'Pinterest', 'kendall' );
				break;
			case 'vk':
				$label = esc_html__( 'VKontakte', 'kendall' );
				break;
			default:
				$label = '';
		}

		return $label;

	}

}