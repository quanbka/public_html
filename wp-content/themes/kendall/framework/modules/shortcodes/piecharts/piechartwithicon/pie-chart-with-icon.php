<?php
namespace KendallElated\Modules\Shortcodes\PieCharts\PieChartWithIcon;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class PieChartWithIcon implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_pie_chart_with_icon';

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
		vc_map( array(
			'name' => esc_html__('Elated Pie Chart With Icon', 'kendall'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart-with-icon extended-custom-icon',
			'category' => esc_html__('by ELATED','kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array_merge(
				array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Percentage','kendall'),
						'param_name' => 'percent',
						'description' => '',
						'admin_label' => true
					),
					array(
						'type' => 'dropdown',
						'heading' => esc_html__('Skin','kendall'),
						'param_name' => 'skin',
						'description' => '',
						'admin_label' => true,
						'value' => array(
							'' => '',
							esc_html__('Light','kendall') => 'light',
							esc_html__('Dark','kendall') => 'dark'
						),
						'group' => esc_html__('Design Options','kendall')
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Size(px)','kendall'),
						'param_name' => 'size',
						'description' => '',
						'admin_label' => true,
						'group' => esc_html__('Design Options','kendall'),
					),
					array(
						'type' => 'textfield',
						'heading' =>esc_html__( 'Margin below chart (px)','kendall'),
						'param_name' => 'margin_below_chart',
						'description' => '',
						'group' =>esc_html__( 'Design Options','kendall'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Title','kendall'),
						'param_name' => 'title',
						'description' => '',
						'admin_label' => true
					),
                    array(
                        'type' => 'colorpicker',
                        'heading' =>esc_html__( 'Active Color','kendall'),
                        'param_name' => 'active_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options','kendall')
                    ),
                    array(
                        'type' => 'colorpicker',
                        'heading' =>esc_html__( 'Inactive Color','kendall'),
                        'param_name' => 'inactive_color',
                        'description' => '',
                        'admin_label' => true,
                        'group' => esc_html__('Design Options','kendall')
                    ),
				),
				kendall_elated_icon_collections()->getVCParamsArray(),
				array(
					array(
						'type' => 'colorpicker',
						'heading' =>esc_html__( 'Icon Color','kendall'),
						'param_name' => 'icon_color',
						'dependency' => Array('element' => 'icon_pack', 'value' => kendall_elated_icon_collections()->getIconCollectionsKeys()),
						'group' => esc_html__('Design Options','kendall'),
					),
					array(
						'type' => 'textfield',
						'heading' => esc_html__('Icon Size (px)','kendall'),
						'param_name' => 'icon_custom_size',
						'dependency' => Array('element' => 'icon_pack', 'value' => kendall_elated_icon_collections()->getIconCollectionsKeys()),
						'admin_label' => true,
						'group' => esc_html__('Design Options','kendall'),
					),
					array(
						'type' => 'textfield',
						'heading' =>esc_html__( 'Text','kendall'),
						'param_name' => 'text',
						'description' => '',
						'admin_label' => true
					)
				)
			)

		) );
	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null)
	{

		$args = array(
			'size' => '',
			'percent' => '',
			'icon_color' => '',
			'icon_custom_size' => '',
			'title' => '',
			'text' => '',
            'active_color' => '',
            'inactive_color' => '',
			'margin_below_chart' => '',
			'skin' => ''
		);

		$args = array_merge($args, kendall_elated_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		
		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);
		$params['icon'] = $this->getPieChartIcon($params);

		$html = kendall_elated_get_shortcode_module_template_part('templates/pie-chart-with-icon', 'piecharts/piechartwithicon', '', $params);

		return $html;

	}

	/**
	 * Return Pie Chart icon style for icon getPieChartIcon() method
	 *
	 * @param $params
	 * @return string
	 */
	private function getIconStyles($params) {

		$iconStyles = array();

		if ($params['icon_color'] !== '') {
			$iconStyles[] = 'color: ' . $params['icon_color'];
		}

		if ($params['icon_custom_size'] !== '') {
			$iconStyles[] = 'font-size: ' . $params['icon_custom_size'] . 'px';
		}

		return implode(';', $iconStyles);

	}

	/**
	 * Return Pie Chart style
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

	/**
	 * Return data attributes for Pie Chart
	 *
	 * @param $params
	 * @return array
	 */
	private function getPieChartData($params) {

		$pieChartData = array();

		if( $params['size'] !== '' ) {
			$pieChartData['data-size'] = $params['size'];
		}
		if( $params['percent'] !== '' ) {
			$pieChartData['data-percent'] = $params['percent'];
		}
        if( $params['active_color'] !== '') {
            $pieChartData['data-bar-color'] = $params['active_color'];
        }
        if( $params['inactive_color'] !== '') {
            $pieChartData['data-track-color'] = $params['inactive_color'];
        }

		return $pieChartData;

	}

	/**
	 * Return Pie Chart Icon
	 *
	 * @param $params
	 * @return mixed
	 */
	private function getPieChartIcon($params) {

		$icon = kendall_elated_icon_collections()->getIconCollectionParamNameByKey($params['icon_pack']);
		$iconStyles = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles($params);

		$pie_chart_icon = kendall_elated_icon_collections()->renderIcon( $params[$icon], $params['icon_pack'], $iconStyles );

		return $pie_chart_icon;

	}

}