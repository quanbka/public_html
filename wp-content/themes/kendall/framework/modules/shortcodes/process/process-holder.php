<?php
namespace KendallElated\Modules\Shortcodes\Process;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Tabs
 * @package KendallElated\Modules\Process
 */
class ProcessHolder implements ShortcodeInterface {

	private $base;

	function __construct() {
		$this->base = 'eltd_process_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer. Hooked on vc_before_init
	 *
	 * @see eltd_core_get_carousel_slider_array_vc()
	 */
	public function vcMap() {

		vc_map(array(
			'name' => esc_html__('Process Holder','kendall'),
			'base' => $this->getBase(),
			'as_parent' => array('only' => 'eltd_process'),
			'content_element' => true,
			'category' => esc_html__('by ELATED','kendall'),
			'icon' => 'icon-wpb-circles extended-custom-icon',
			'show_settings_on_create' => true,
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Columns','kendall'),
					'param_name' => 'columns',
					'value' => array(
						esc_html__('Four','kendall')      => 'four',
						esc_html__('Five','kendall')      => 'five',
						esc_html__('Six' ,'kendall')     =>  'six'
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => ''
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
			'columns' => ''
		);

		$params = shortcode_atts($args, $atts);
		$params['content'] = $content;
		$params['classes'] = 'eltd-processes-holder eltd-' . $params['columns'] . '-columns clearfix';

		$html = kendall_elated_get_shortcode_module_template_part('templates/process-holder', 'process', '', $params);

		return $html;

	}
}