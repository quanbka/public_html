<?php
namespace KendallElated\Modules\Shortcodes\Tabs;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 */
class Tabs implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'eltd_tabs';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name'                    => esc_html__( 'Elated Tabs', 'kendall' ),
			'base'                    => $this->getBase(),
			'as_parent'               => array( 'only' => 'eltd_tab' ),
			'content_element'         => true,
			'show_settings_on_create' => true,
			'category'                => esc_html__( 'by ELATED', 'kendall' ),
			'icon'                    => 'icon-wpb-tabs extended-custom-icon',
			'js_view'                 => 'VcColumnView',
			'params'                  => array(
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     => esc_html__( 'Tabs Type', 'kendall' ),
					'param_name'  => 'type',
					'value'       => array(
						esc_html__( 'Horizontal', 'kendall' ) => 'horizontal_tab',
						esc_html__( 'Vertical', 'kendall' )   => 'vertical_tab'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'admin_label' => true,
					'heading'     =>esc_html__(  'Tabs Style', 'kendall' ),
					'param_name'  => 'style',
					'value'       => array(
			esc_html__( 'Color' , 'kendall' )      => 'color',
			esc_html__( 'Transparent', 'kendall' ) => 'transparent',
					),
					'save_always' => true,
					'description' => ''
				),
			)
		) );

	}

	public function render( $atts, $content = null ) {
		$args = array(
			'type'  => 'horizontal_tab',
			'style' => 'color'
		);

		$params = shortcode_atts( $args, $atts );

		extract( $params );

		// Extract tab titles
		preg_match_all( '/tab_title="([^\"]+)"/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();

		/**
		 * get tab titles array
		 *
		 */
		if ( isset( $matches[0] ) ) {
			$tab_titles = $matches[0];
		}

		$tab_title_array = array();

		foreach ( $tab_titles as $tab ) {
			preg_match( '/tab_title="([^\"]+)"/i', $tab[0], $tab_matches, PREG_OFFSET_CAPTURE );
			$tab_title_array[] = $tab_matches[1][0];
		}

		$params['tabs_titles']     = $tab_title_array;
		$params['tab_class']       = $this->getTabClass( $params );
		$params['tab_style_class'] = $this->getTabStyleClass( $params );
		$params['content']         = $content;

		$output = kendall_elated_get_shortcode_module_template_part( 'templates/tab-template', 'tabs', '', $params );

		return $output;
	}

	/**
	 * Generates tabs class
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getTabClass( $params ) {
		$tab_style = $params['type'];

		switch ( $tab_style ) {
			case 'vertical_tab':
				$tab_class = 'eltd-vertical-tab';
				break;
			default :
				$tab_class = 'eltd-horizontal-tab';
				break;
		}

		return $tab_class;
	}

	/**
	 * Generates tabs class
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getTabStyleClass( $params ) {
		$tab_style = $params['style'];

		switch ( $tab_style ) {
			case 'transparent':
				$tab_class = 'eltd-transparent-tabs';
				break;
			default :
				$tab_class = 'eltd-color-tabs';
				break;
		}

		return $tab_class;
	}

}