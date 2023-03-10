<?php
namespace KendallElated\Modules\Shortcodes\PieCharts\PieChartBasic;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class PieChartBasic
 */
class PieChartBasic implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_pie_chart';

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
			'name' => esc_html__('Elated Pie Chart', 'kendall'),
			'base' => $this->getBase(),
			'icon' => 'icon-wpb-pie-chart extended-custom-icon',
			'category' => esc_html__('by ELATED', 'kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Type of Central text', 'kendall'),
					'param_name' => 'type_of_central_text',
					'value' => array(
						esc_html__('Percent', 'kendall')  => 'percent',
						esc_html__('Title', 'kendall') => 'title'
					),
					'save_always' => true,
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Percentage', 'kendall'),
					'param_name' => 'percent',
					'description' => '',
					'admin_label' => true,
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Title', 'kendall'),
					'param_name' => 'title',
					'description' => '',
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'heading' =>esc_html__( 'Text', 'kendall'),
					'param_name' => 'text',
					'description' => '',
					'admin_label' => true
				),
				array(
					'type' => 'dropdown',
					'heading' =>esc_html__( 'Skin', 'kendall'),
					'param_name' => 'skin',
					'description' => '',
					'admin_label' => true,
					'value' => array(
						'' => '',
			esc_html__('Light', 'kendall') => 'light',
			esc_html__('Dark', 'kendall') => 'dark'
					),
					'group' => esc_html__('Design Options', 'kendall')
				),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Active Color', 'kendall'),
                    'param_name' => 'active_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'kendall')
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => esc_html__('Inactive Color', 'kendall'),
                    'param_name' => 'inactive_color',
                    'description' => '',
                    'admin_label' => true,
                    'group' => esc_html__('Design Options', 'kendall')
                ),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Size(px)', 'kendall'),
					'param_name' => 'size',
					'description' => '',
					'admin_label' => true,
					'group' =>esc_html__( 'Design Options', 'kendall'),
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__('Margin below chart (px)', 'kendall'),
					'param_name' => esc_html__('margin_below_chart', 'kendall'),
					'description' => '',
					'group' =>esc_html__( 'Design Options', 'kendall'),
				),
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
	public function render($atts, $content = null) {

		$args = array(
			'size' => '',
			'type_of_central_text' => 'percent',
			'title' => '',
			'title_tag' => 'h4',
			'percent' => '',
			'text' => '',
            'active_color' => '',
            'inactive_color' => '',
			'margin_below_chart' => '',
			'skin' => ''
		);

		$params = shortcode_atts($args, $atts);

		$params['pie_chart_data'] = $this->getPieChartData($params);
		$params['pie_chart_style'] = $this->getPieChartStyle($params);

		$html = kendall_elated_get_shortcode_module_template_part('templates/pie-chart-basic', 'piecharts/piechartbasic', '', $params);

		return $html;


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

	private function getPieChartStyle($params) {

		$pieChartStyle = array();

		if ($params['margin_below_chart'] !== '') {
			$pieChartStyle[] = 'margin-top: ' . $params['margin_below_chart'] . 'px';
		}

		return $pieChartStyle;

	}

}