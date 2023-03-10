<?php

/**
 * Class KendallElatedLinearIcons
 */
class KendallElatedLinearIcons implements iKendallElatedIconCollection {
	/**
	 * @var array of all available icons
	 */
	public $icons;
	/**
	 * @var array of all social icons
	 */
	public $socialIcons;
	/**
	 * @var string title of icon collection
	 */
	public $title;
	/**
	 * @var string parameter that will be used in shortcodes
	 */
	public $param;
	/**
	 * @var string URL to css file of icon collection
	 */
	public $styleUrl;

	/**
	 * @param string $title title of icon collection
	 * @param string $param param that will be used in shortcodes
	 */
	public function __construct( $title = '', $param = '' ) {
		$this->socialIcons = array();
		$this->title = $title;
		$this->param = $param;
		$this->setIconsArray();
		$this->setSocialIconsArray();
		$this->styleUrl = ELATED_ASSETS_ROOT . "/css/linear-icons/style.css";
	}

	/**
	 * Sets icon property
	 */
	private function setIconsArray() {
		$this->icons = array(
			'' => '',
			'lnr-home' => 'lnr-home',
			'lnr-apartment' => 'lnr-apartment',
			'lnr-pencil' => 'lnr-pencil',
			'lnr-magic-wand' => 'lnr-magic-wand',
			'lnr-drop' => 'lnr-drop',
			'lnr-lighter' => 'lnr-lighter',
			'lnr-poop' => 'lnr-poop',
			'lnr-sun' => 'lnr-sun',
			'lnr-moon' => 'lnr-moon',
			'lnr-cloud' => 'lnr-cloud',
			'lnr-cloud-upload' => 'lnr-cloud-upload',
			'lnr-cloud-download' => 'lnr-cloud-download',
			'lnr-cloud-sync' => 'lnr-cloud-sync',
			'lnr-cloud-check' => 'lnr-cloud-check',
			'lnr-database' => 'lnr-database',
			'lnr-lock' => 'lnr-lock',
			'lnr-cog' => 'lnr-cog',
			'lnr-trash' => 'lnr-trash',
			'lnr-dice' => 'lnr-dice',
			'lnr-heart' => 'lnr-heart',
			'lnr-star' => 'lnr-star',
			'lnr-star-half' => 'lnr-star-half',
			'lnr-star-empty' => 'lnr-star-empty',
			'lnr-flag' => 'lnr-flag',
			'lnr-envelope' => 'lnr-envelope',
			'lnr-paperclip' => 'lnr-paperclip',
			'lnr-inbox' => 'lnr-inbox',
			'lnr-eye' => 'lnr-eye',
			'lnr-printer' => 'lnr-printer',
			'lnr-file-empty' => 'lnr-file-empty',
			'lnr-file-add' => 'lnr-file-add',
			'lnr-enter' => 'lnr-enter',
			'lnr-exit' => 'lnr-exit',
			'lnr-graduation-hat' => 'lnr-graduation-hat',
			'lnr-license' => 'lnr-license',
			'lnr-music-note' => 'lnr-music-note',
			'lnr-film-play' => 'lnr-film-play',
			'lnr-camera-video' => 'lnr-camera-video',
			'lnr-camera' => 'lnr-camera',
			'lnr-picture' => 'lnr-picture',
			'lnr-book' => 'lnr-book',
			'lnr-bookmark' => 'lnr-bookmark',
			'lnr-user' => 'lnr-user',
			'lnr-users' => 'lnr-users',
			'lnr-shirt' => 'lnr-shirt',
			'lnr-store' =>'lnr-store',
			'lnr-cart' => 'lnr-cart',
			'lnr-tag' => 'lnr-tag',
			'lnr-phone-handset' => 'lnr-phone-handset',
			'lnr-phone' => 'lnr-phone',
			'lnr-pushpin' => 'lnr-pushpin',
			'lnr-map-marker' => 'lnr-map-marker',
			'lnr-map' => 'lnr-map',
			'lnr-location' => 'lnr-location',
			'lnr-calendar-full' => 'lnr-calendar-full',
			'lnr-keyboard' => 'lnr-keyboard',
			'lnr-spell-check' => 'lnr-spell-check',
			'lnr-screen' => 'lnr-screen',
			'lnr-smartphone' => 'lnr-smartphone',
			'lnr-tablet' =>'lnr-tablet',
			'lnr-laptop' => 'lnr-laptop',
			'lnr-laptop-phone' => 'lnr-laptop-phone',
			'lnr-power-switch' => 'lnr-power-switch',
			'lnr-bubble' => 'lnr-bubble',
			'lnr-heart-pulse' => 'lnr-heart-pulse',
			'lnr-construction' => 'lnr-construction',
			'lnr-pie-chart' => 'lnr-pie-chart',
			'lnr-chart-bars' => 'lnr-chart-bars',
			'lnr-gift' => 'lnr-gift',
			'lnr-diamond' => 'lnr-diamond',
			'lnr-linearicons' => 'lnr-linearicons',
			'lnr-dinner' => 'lnr-dinner',
			'lnr-coffee-cup' => 'lnr-coffee-cup',
			'lnr-leaf' => 'lnr-leaf',
			'lnr-paw' => 'lnr-paw',
			'lnr-rocket' => 'lnr-rocket',
			'lnr-briefcase' => 'lnr-briefcase',
			'lnr-bus' => 'lnr-bus',
			'lnr-car' => 'lnr-car',
			'lnr-train' => 'lnr-train',
			'lnr-bicycle' => 'lnr-bicycle',
			'lnr-wheelchair' => 'lnr-wheelchair',
			'lnr-select' => 'lnr-select',
			'lnr-earth' => 'lnr-earth',
			'lnr-smile' => 'lnr-smile',
			'lnr-sad' => 'lnr-sad',
			'lnr-neutral' => 'lnr-neutral',
			'lnr-mustache' => 'lnr-mustache',
			'lnr-alarm' => 'lnr-alarm',
			'lnr-bullhorn' => 'lnr-bullhorn',
			'lnr-volume-high' => 'lnr-volume-high',
			'lnr-volume-medium' => 'lnr-volume-medium',
			'lnr-volume-low' => 'lnr-volume-low',
			'lnr-volume' => 'lnr-volume',
			'lnr-mic' => 'lnr-mic',
			'lnr-hourglass' => 'lnr-hourglass',
			'lnr-undo' => 'lnr-undo',
			'lnr-redo' => 'lnr-redo',
			'lnr-sync' => 'lnr-sync',
			'lnr-history' => 'lnr-history',
			'lnr-clock' => 'lnr-clock',
			'lnr-download' => 'lnr-download',
			'lnr-upload' => 'lnr-upload',
			'lnr-enter-down' => 'lnr-enter-down',
			'lnr-exit-up' => 'lnr-exit-up',
			'lnr-bug' => 'lnr-bug',
			'lnr-code' => 'lnr-code',
			'lnr-link' => 'lnr-link',
			'lnr-unlink' => 'lnr-unlink',
			'lnr-thumbs-up' => 'lnr-thumbs-up',
			'lnr-thumbs-down' => 'lnr-thumbs-down',
			'lnr-magnifier' => 'lnr-magnifier',
			'lnr-cross' => 'lnr-cross',
			'lnr-menu' => 'lnr-menu',
			'lnr-list' => 'lnr-list',
			'lnr-chevron-up' => 'lnr-chevron-up',
			'lnr-chevron-down' => 'lnr-chevron-down',
			'lnr-chevron-left' => 'lnr-chevron-left',
			'lnr-chevron-right' => 'lnr-chevron-right',
			'lnr-arrow-up' => 'lnr-arrow-up',
			'lnr-arrow-down' => 'lnr-arrow-down',
			'lnr-arrow-left' => 'lnr-arrow-left',
			'lnr-arrow-right' => 'lnr-arrow-right',
			'lnr-move' => 'lnr-move',
			'lnr-warning' => 'lnr-warning',
			'lnr-question-circle' => 'lnr-question-circle',
			'lnr-menu-circle' => 'lnr-menu-circle',
			'lnr-checkmark-circle' => 'lnr-checkmark-circle',
			'lnr-cross-circle' => 'lnr-cross-circle',
			'lnr-plus-circle' => 'lnr-plus-circle',
			'lnr-circle-minus' => 'lnr-circle-minus',
			'lnr-arrow-up-circle' => 'lnr-arrow-up-circle',
			'lnr-arrow-down-circle' => 'lnr-arrow-down-circle',
			'lnr-arrow-left-circle' => 'lnr-arrow-left-circle',
			'lnr-arrow-right-circle' => 'lnr-arrow-right-circle',
			'lnr-chevron-up-circle' => 'lnr-chevron-up-circle',
			'lnr-chevron-down-circle' => 'lnr-chevron-down-circle',
			'lnr-chevron-left-circle' => 'lnr-chevron-left-circle',
			'lnr-chevron-right-circle' => 'lnr-chevron-right-circle',
			'lnr-crop' => 'lnr-crop',
			'lnr-frame-expand' => 'lnr-frame-expand',
			'lnr-frame-contract' => 'lnr-frame-contract',
			'lnr-layers' => 'lnr-layers',
			'lnr-funnel' => 'lnr-funnel',
			'lnr-text-format' => 'lnr-text-format',
			'lnr-text-format-remove' => 'lnr-text-format-remove',
			'lnr-text-size' => 'lnr-text-size',
			'lnr-bold' => 'lnr-bold',
			'lnr-italic' => 'lnr-italic',
			'lnr-underline' => 'lnr-underline',
			'lnr-strikethrough' => 'lnr-strikethrough',
			'lnr-highlight' => 'lnr-highlight',
			'lnr-text-align-left' => 'lnr-text-align-left',
			'lnr-text-align-center' => 'lnr-text-align-center',
			'lnr-text-align-right' => 'lnr-text-align-right',
			'lnr-text-align-justify' => 'lnr-text-align-justify',
			'lnr-line-spacing' => 'lnr-line-spacing',
			'lnr-indent-increase' => 'lnr-indent-increase',
			'lnr-indent-decrease' => 'lnr-indent-decrease',
			'lnr-pilcrow' => 'lnr-pilcrow',
			'lnr-direction-ltr' => 'lnr-direction-ltr',
			'lnr-direction-rtl' => 'lnr-direction-rtl',
			'lnr-page-break' =>'lnr-page-break',
			'lnr-sort-alpha-asc' => 'lnr-sort-alpha-asc',
			'lnr-sort-amount-asc' => 'lnr-sort-amount-asc',
			'lnr-hand' => 'lnr-hand',
			'lnr-pointer-up' => 'lnr-pointer-up',
			'lnr-pointer-right' => 'lnr-pointer-right',
			'lnr-pointer-down' =>'lnr-pointer-down',
			'lnr-pointer-left' => 'lnr-pointer-left'
		);
	}

	/**
	 * Sets social icons property
	 */
	private function setSocialIconsArray() {
		$this->socialIcons = array();
	}

	/**
	 * Method that returns $icons property
	 * @return mixed
	 */
	public function getIconsArray() {
		return $this->icons;
	}

	/**
	 * Generates HTML for provided icon and parameters
	 * @param $icon string
	 * @param array $params
	 * @return mixed
	 */
	public function render($icon, $params = array()) {
		$html = '';
		extract($params);
		$iconAttributesString = '';
		$iconClass = '';
		if (isset($icon_attributes) && count($icon_attributes)) {
			foreach ($icon_attributes as $icon_attr_name => $icon_attr_val) {
				if ($icon_attr_name === 'class') {
					$iconClass = $icon_attr_val;
					unset($icon_attributes[$icon_attr_name]);
				} else {
					$iconAttributesString .= $icon_attr_name . '="' . $icon_attr_val . '" ';
				}
			}
		}

		if (isset($before_icon) && $before_icon !== '') {
			$beforeIconAttrString = '';
			if (isset($before_icon_attributes) && count($before_icon_attributes)) {
				foreach ($before_icon_attributes as $before_icon_attr_name => $before_icon_attr_val) {
					$beforeIconAttrString .= $before_icon_attr_name . '="' . $before_icon_attr_val . '" ';
				}
			}

			$html .= '<' . $before_icon . ' ' . $beforeIconAttrString . '>';
		}

		$html .= '<i class="eltd-icon-linear-icon lnr ' . $icon . ' ' . $iconClass . '" ' . $iconAttributesString . '></i>';

		if (isset($before_icon) && $before_icon !== '') {
			$html .= '</' . $before_icon . '>';
		}

		return $html;
	}

	/**
	 * Checks if icon collection has social icons
	 * @return mixed
	 */
	public function hasSocialIcons() {
		return false;
	}

	/**
	 * @return mixed
	 */
	public function getSearchIcon() {

		return $this->render('lnr-magnifier');
	}

	/**
	 * @return mixed
	 */
	public function getSearchClose() {

		return $this->render('lnr-cross');
	}

	/**
	 * @return mixed
	 */
	public function getMenuSideIcon() {

		return $this->render('lnr-menu');
	}

	/**
	 * @return mixed
	 */
	public function getBackToTopIcon() {

		return $this->render('lnr-chevron-up');
	}

	/**
	 * @return mixed
	 */
	public function getMobileMenuIcon() {

		return $this->render('lnr-menu');
	}

}