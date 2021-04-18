<?php
namespace KendallElated\Modules\Shortcodes\Accordion;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class Accordion implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'eltd_accordion';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return	$this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Elated Accordion', 'kendall'),
			'base' => $this->base,
			'as_parent' => array('only' => 'eltd_accordion_tab'),
			'content_element' => true,
			'category' => esc_html__('by ELATED','kendall'),
			'icon' => 'icon-wpb-accordion extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Extra class name', 'kendall' ),
					'param_name' => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'kendall' )
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Style','kendall'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Accordion'  ,'kendall')        => 'accordion',
						esc_html__('Boxed Accordion','kendall')       => 'boxed_accordion',
						esc_html__('Toggle'   ,'kendall')             => 'toggle',
						esc_html__('Boxed Toggle','kendall')          => 'boxed_toggle'
					),
					'admin_label' => true,
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Skin','kendall'),
					'param_name' => 'skin',
					'value' => array(
						'' => '',
					esc_html__('Light','kendall') => 'light',
					esc_html__('Dark','kendall') => 'dark',
					),
					'admin_label' => true,
					'save_always' => true,
					'dependency' => array('element' => 'style', 'value' => array('boxed_accordion', 'boxed_toggle'))
				)
			)
		) );
	}
	public function render($atts, $content = null) {
		$default_atts=(array(
			'title' => '',
			'style' => 'accordion',
			'skin' => ''
		));
		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$params['classes'] = $this->getAccordionClasses($params);
		$params['content'] = $content;
		
		$output = '';
		
		$output .= kendall_elated_get_shortcode_module_template_part('templates/accordion-holder-template','accordions', '', $params);

		return $output;
	}

	/**
	   * Generates accordion classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getAccordionClasses($params){
		
		$classes = array();

		$classes[] = 'eltd-accordion-holder clearfix';

		$style = $params['style'];
		switch($style) {
			case 'toggle':
				$classes[] = 'eltd-toggle eltd-initial';
				break;
			case 'boxed_toggle':
				$classes[] = 'eltd-toggle eltd-boxed';
				break;
			case 'boxed_accordion':
				$classes[] = 'eltd-accordion eltd-boxed';
				break;			
			default:
				$classes[] = 'eltd-accordion eltd-initial';
		}

		if ( $params['skin'] ) {
			$classes[] = $params['skin'];
		}

		return implode(' ', $classes);
	}
}
