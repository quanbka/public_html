<?php
namespace KendallElated\Modules\Shortcodes\PricingTables;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTables implements ShortcodeInterface {
	private $base;

	function __construct() {
		$this->base = 'eltd_pricing_tables';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name'                    => esc_html__( 'Elated Pricing Tables', 'kendall' ),
			'base'                    => $this->base,
			'as_parent'               => array( 'only' => 'eltd_pricing_table' ),
			'content_element'         => true,
			'category'                => esc_html__('by ELATED', 'kendall' ),
			'icon'                    => 'icon-wpb-pricing-tables extended-custom-icon',
			'show_settings_on_create' => true,
			'params'                  => array(
				array(
					'type'        => 'dropdown',
					'heading'     =>esc_html__( 'Enlarge featured', 'kendall' ),
					'param_name'  => 'enlarge_featured',
					'value'       => array(
						esc_html__('No', 'kendall' )  => 'no',
						esc_html__('Yes', 'kendall' ) => 'yes'
					),
					'save_always' => true,
					'admin_label' => true
				)
			),
			'js_view'                 => 'VcColumnView'
		) );
	}

	public function render( $atts, $content = null ) {
		$args = array(
			'enlarge_featured' => 'no'
		);

		$params = shortcode_atts( $args, $atts );
		extract( $params );

		$class = '';
		if ( $enlarge_featured == 'yes' ) {
			$class = 'eltd-bigger-featured';
		}

		$html = '<div class="eltd-pricing-tables ' . $class . '">';
		$html .= do_shortcode( $content );
		$html .= '</div>';

		return $html;
	}
}