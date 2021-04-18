<?php
namespace KendallElated\Modules\Shortcodes\Process;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Process
 * @package KendallElated\Modules\Process
 */
class Process implements ShortcodeInterface {

	private $base;

	function __construct() {
		$this->base = 'eltd_process';
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
	 */
	public function vcMap() {

		vc_map(array(
			'name' => esc_html__('Process','kendall'),
			'base' => $this->getBase(),
			'as_child' => array('only' => 'eltd_process_holder'),
			'content_element' => true,
			'category' => esc_html__('by ELATED','kendall'),
			'icon' => 'icon-wpb-circle extended-custom-icon',
			'show_settings_on_create' => true,
			'params' => array_merge(
				array(
					array(
						'type' => 'dropdown',
						'param_name' => 'type',
						'heading' => esc_html__('Type','kendall'),
						'value' => array(
						esc_html__('Icons in Process','kendall') => 'process_icons',
						esc_html__('Text in Process','kendall') => 'process_text',
						),
						'admin_label' => true,
						'save_always' => true
					)
				),
				kendall_elated_icon_collections()->getVCParamsArray(array('element' => 'type', 'value' => 'process_icons')),
				array(
					array(
						'type' => 'textfield',
						'param_name' => 'text_in_process',
						'heading' => esc_html__('Text in Process','kendall'),
						'admin_label' => true,
						'dependency'  => array('element' => 'type', 'value' => 'process_text')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'title',
						'heading' => esc_html__('Title','kendall'),
						'admin_label' => true
					),
					array(
						'type' => 'attach_image',
						'param_name' => 'background_image',
						'heading' => esc_html__('Background Image','kendall'),
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'param_name' => 'link',
						'heading' => esc_html__('Link','kendall'),
						'admin_label' => true
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'target',
						'heading' =>esc_html__( 'Target','kendall'),
						'admin_label' => true,
						'value' => array(
							esc_html__('Self','kendall')=> '_self',
							esc_html__('Blank','kendall') => '_blank',
						),
						'dependency' => array('element' => 'type', 'not_empty' => true)
					),
					array(
						'type' => 'textfield',
						'param_name' => 'text',
						'heading' => esc_html__('Text','kendall'),
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'param_name' => 'icon_size',
						'heading' =>esc_html__( 'Icon Size','kendall'),
						'group' => esc_html__('Design Group','kendall'),
						'admin_label' => true
					)
				)

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
			'type' => '',
			'text_in_process' => '',
			'background_image' => '',
			'link' => '',
			'target' => 'blank',
			'title' => '',
			'text' => '',
			'icon_size' => '38'
		);

		$args = array_merge($args, kendall_elated_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		extract($params);

		if($type === 'process_icons'){
			$params['icon'] = $this->getProcessIcon($params);
		}
		$params['type_class'] = $this->getProcessType($params);
		$params['background_image_style'] = $this->getBackgroundImage($params);

		$html = kendall_elated_get_shortcode_module_template_part('templates/process', 'process', '', $params);

		return $html;

	}

	/**
	 * Get Icon
	 *
	 * @param $params
	 * @return mixed|string
	 */
	private function getProcessIcon($params) {

		$iconPack = $params['icon_pack'];
		$iconParam = kendall_elated_icon_collections()->getIconCollectionParamNameByKey($iconPack);

		$icon = $params[$iconParam];

		$icon_atts = array(
			'icon_pack' => $iconPack,
			$iconParam => $icon,
			'custom_size' => $params['icon_size']
		);

		return kendall_elated_execute_shortcode('eltd_icon', $icon_atts);

	}

	/**
	 * Get Type Class
	 *
	 * @param $params
	 * @return string
	 */
	private function getProcessType($params) {

		$type_class = '';
		if(isset($params['type']) && $params['type'] !== ''){
			if($params['type'] === 'process_icons'){
				$type_class = 'eltd-process-with-icon';
			}elseif($params['type'] === 'process_text'){
				$type_class = 'eltd-process-with-text';
			}
		}

		return $type_class;

	}
	/**
	 * Get Background Image
	 *
	 * @param $params
	 * @return string
	 */
	private function getBackgroundImage($params){

		$background_image_style = '';
		$background_image = wp_get_attachment_image_src( $params['background_image'], 'full' );
		if($background_image && $background_image !==''){
			$background_image_style = 'background-image: url('.$background_image[0].')';
		}
		return $background_image_style;

	}

}