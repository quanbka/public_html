<?php
namespace KendallElated\Modules\Shortcodes\SectionTitle;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class SectionTitle implements ShortcodeInterface{

	private $base;

	public function __construct() {
		$this->base = 'eltd_section_title';
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

		vc_map(
			array(
				'name' => esc_html__('Section Title','kendall'),
				'base' => $this->getBase(),
				'category' => esc_html__('by ELATED','kendall'),
				'icon' => 'icon-wpb-section-title extended-custom-icon',
				'params' => array(
					array(
						'type' => 'textfield',
						'param_name' => 'title',
						'heading' => esc_html__('Section Title','kendall'),
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'textfield',
						'param_name' => 'subtitle',
						'heading' => esc_html__('Section Subtitle','kendall'),
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'enable_separator',
						'heading' => esc_html__('Enable Separator','kendall'),
						'description' => '',
						'value' => array(
							esc_html__('','kendall') => '',
							esc_html__('Yes','kendall') => 'yes',
							esc_html__('No','kendall') => 'no'
						),
						'admin_label' => true,
						'group' =>esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'alignment',
						'heading' => esc_html__('Alignment','kendall'),
						'description' => '',
						'value' => array(
							esc_html__('Center','kendall') => '',
							esc_html__('Left','kendall') => 'left',
							esc_html__('Right','kendall') => 'right'
						),
						'admin_label' => true,
						'group' =>esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'title_h_element',
						'heading' => esc_html__( 'Choose Title Size','kendall'),
						'description' => '',
						'value' => array(
							'' => '',
							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6'
						),
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'title_font_family',
						'heading' => esc_html__( 'Title Font Family','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'title_font_size',
						'heading' => esc_html__( 'Title Font Size','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'colorpicker',
						'param_name' => 'title_color',
						'heading' => esc_html__( 'Title Color','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'title_font_weight',
						'heading' => esc_html__( 'Title Font Weight','kendall'),
						'description' => '',
						'value' => kendall_elated_get_font_weight_array(true),
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'title_line_height',
						'heading' =>esc_html__(  'Title Line Height','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'title_text_transform',
						'heading' => esc_html__('Title Text Transform', 'kendall'),
						'description' => '',
						'admin_label' => '',
						'value' => kendall_elated_get_text_transform_array(true),
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'title_letter_spacing',
						'heading' => esc_html__('Title Letter Spacing', 'kendall'),
						'description' => '',
						'admin_label' => '',
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'title_margin',
						'heading' => esc_html__('Title Margin', 'kendall'),
						'description' => '',
						'admin_label' => '',
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'subtitle_h_element',
						'heading' => esc_html__( 'Choose Subtitle Size','kendall'),
						'description' => '',
						'value' => array(
							'' => '',
 							'h2' => 'h2',
							'h3' => 'h3',
							'h4' => 'h4',
							'h5' => 'h5',
							'h6' => 'h6'
						),
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'subtitle_font_family',
						'heading' => esc_html__( 'Subtitle Font Family','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'subtitle_font_size',
						'heading' =>esc_html__(  'Subitle Font Size','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'colorpicker',
						'param_name' => 'subtitle_color',
						'heading' => esc_html__( 'Subitle Color','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'subtitle_font_weight',
						'heading' => esc_html__( 'Subtitle Font Weight','kendall'),
						'description' => '',
						'value' => kendall_elated_get_font_weight_array(true),
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'subtitle_line_height',
						'heading' =>esc_html__(  'Subtitle Line Height','kendall'),
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'dropdown',
						'param_name' => 'subtitle_text_transform',
						'heading' => esc_html__('Subtitle Text Transform', 'kendall'),
						'description' => '',
						'admin_label' => '',
						'value' => kendall_elated_get_text_transform_array(true),
						'group' => esc_html__( 'Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'param_name' => 'subtitle_letter_spacing',
						'heading' => esc_html__('Subtitle Letter Spacing', 'kendall'),
						'description' => '',
						'admin_label' => '',
						'group' => esc_html__( 'Design Options','kendall')
					),
				)
			)
		);

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
			'title' => '',
			'subtitle' => '',
			'alignment' => '',
			'title_h_element' => 'h2',
			'title_font_size' => '',
			'title_font_family' => '',
			'title_color'	=> '',
			'title_font_weight' => '',
			'title_line_height' => '',
			'title_text_transform' => '',
			'title_letter_spacing' => '',
			'title_margin'  => '',
			'subtitle_h_element' => 'h5',
			'subtitle_font_family' => '',
			'subtitle_font_size' => '',
			'subtitle_color'	=> '',
			'subtitle_font_weight' => '',
			'subtitle_line_height' => '',
			'subtitle_text_transform' => '',
			'subtitle_letter_spacing' => '',
			'enable_separator'	=>''
		);

		$params = shortcode_atts($args, $atts);
		$params['section_title_holder_style'] = $this->getSectionHolderStyle($params);
		$params['section_title_style'] = $this->getSectionTitleStyle($params);
		$params['section_subtitle_style'] = $this->getSectionSubtitleStyle($params);
		$params['separator_classes']=$this->getSectionTitleSeparatorClasses($params);

		$html = kendall_elated_get_shortcode_module_template_part('templates/section-title', 'sectiontitle', '', $params);

		return $html;

	}

	/**
	 * Section Holder Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getSectionHolderStyle($params) {

		$holder_styles = array();

		$holder_styles[] = ($params['alignment'] !== '') ? 'text-align: ' . $params['alignment'] : 'text-align: center';

		return $holder_styles;

	}

	/**
	 * Title Styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getSectionTitleStyle($params) {

		$title_styles = array();
		$title_styles[] = ($params['title_font_family'] !== '') ? 'font-family: '.$params['title_font_family'] : '';
		$title_styles[] = ($params['title_font_size'] !== '') ? 'font-size: ' . kendall_elated_filter_px($params['title_font_size']) . 'px' : '';
		$title_styles[] = ($params['title_color'] !== '') ? 'color: ' . $params['title_color'] : '';
		$title_styles[] = ($params['title_font_weight'] !== '') ? 'font-weight: ' . $params['title_font_weight'] : '';
		$title_styles[] = ($params['title_line_height'] !== '') ? 'line-height: ' .kendall_elated_filter_px($params['title_line_height']).'px'  : '';
		$title_styles[] = ($params['title_text_transform'] !== '') ? 'text-transform: ' .$params['title_text_transform']  : '';
		$title_styles[] = ($params['title_letter_spacing'] !== '') ? 'letter-spacing: ' .kendall_elated_filter_px($params['title_letter_spacing']).'px'  : '';
		$title_styles[] = ($params['title_margin'] !== '') ? 'margin: ' .$params['title_margin']  : '';

		return $title_styles;

	}

	/**
	 * Subtitle styles
	 *
	 * @param $params
	 * @return array
	 */
	private function getSectionSubtitleStyle($params) {

		$subtitle_styles = array();

		$subtitle_styles[] = ($params['subtitle_font_family'] !== '') ? 'font-family: '.$params['subtitle_font_family'] : '';
		$subtitle_styles[] = ($params['subtitle_font_size'] !== '') ? 'font-size: ' . kendall_elated_filter_px($params['subtitle_font_size']) . 'px' : '';
		$subtitle_styles[] = ($params['subtitle_color'] !== '') ? 'color: ' . $params['subtitle_color'] : '';
		$subtitle_styles[] = ($params['subtitle_font_weight'] !== '') ? 'font-weight: ' . $params['subtitle_font_weight'] : '';
		$subtitle_styles[] = ($params['subtitle_line_height'] !== '') ? 'line-height: ' .kendall_elated_filter_px($params['subtitle_line_height']).'px'  : '';
		$subtitle_styles[] = ($params['subtitle_text_transform'] !== '') ? 'text-transform: ' .$params['subtitle_text_transform'] : '';
		$subtitle_styles[] = ($params['subtitle_letter_spacing'] !== '') ? 'letter-spacing: ' .kendall_elated_filter_px($params['subtitle_letter_spacing']).'px'  : '';


		return $subtitle_styles;

	}

	private function getSectionTitleSeparatorClasses($params){
		$class = '';
		if($params['enable_separator']!=='' && isset($params['enable_separator'])){
			switch($params['enable_separator']){
				case 'yes':
					$class.='eltd-enable-separator';
					break;
				default:
					$class.='eltd-disable-separator';
					break;
			}
		}

		return $class;

	}

}