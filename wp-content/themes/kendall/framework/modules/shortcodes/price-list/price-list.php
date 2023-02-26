<?php
namespace KendallElated\Modules\Shortcodes\PriceList;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class PriceList implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'eltd_price_list';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Price List', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-price-list extended-custom-icon',
			'category' =>  esc_html__('by ELATED','kendall'),
			'as_parent' => array('only' => 'eltd_price_list_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
					array(
						'type' => 'colorpicker',
						'class' => '',
						'heading' => esc_html__( 'Background Color','kendall'),
						'param_name' => 'background_color',
						'value' => '',
						'description' => ''
					)
				)
		));
	}

	public function render($atts, $content = null) {
		$args = array(
			'background_color' => '',
		);

		$params = shortcode_atts($args, $atts);

		$restaurant_style = '';
		if ($params['background_color'] !== ''){
			$restaurant_style .= 'background-color: '.$params['background_color'].';';
		}

		$html = '';

		$html .= '<div class="eltd-price-list" '.kendall_elated_get_inline_style($restaurant_style).'>';
		$html .= '<div class="eltd-price-list-holder">';
		$html .= do_shortcode($content);
		$html .= '</div>';
		$html .= '</div>';

		return $html;

	}

}
