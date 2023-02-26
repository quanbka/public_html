<?php
namespace KendallElated\Modules\Shortcodes\ElementsHolder;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class ElementsHolder implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'eltd_elements_holder';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Elements Holder', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-elements-holder extended-custom-icon',
			'category' => esc_html__('by ELATED','kendall'),
			'as_parent' => array('only' => 'eltd_elements_holder_item'),
			'js_view' => 'VcColumnView',
			'params' => array(
				array(
					'type' => 'colorpicker',
					'class' => '',
					'heading' => esc_html__('Background Color','kendall'),
					'param_name' => 'background_color',
					'value' => '',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'heading' => esc_html__('Columns','kendall'),
					'admin_label' => true,
					'param_name' => 'number_of_columns',
					'value' => array(
						esc_html__('1 Column','kendall')      => 'one-column',
						esc_html__('2 Columns','kendall')    	=> 'two-columns',
						esc_html__('3 Columns' ,'kendall')    => 'three-columns',
						esc_html__('4 Columns','kendall')     => 'four-columns',
						esc_html__('5 Columns','kendall')     => 'five-columns',
						esc_html__('6 Columns' ,'kendall')    => 'six-columns'
					),
					'description' => ''
				),
				array(
					'type' => 'checkbox',
					'class' => '',
					'heading' => esc_html__('Items Float Left','kendall'),
					'param_name' => 'items_float_left',
					'value' => array(esc_html__('Make Items Float Left?','kendall') => 'yes'),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness','kendall'),
					'heading' => esc_html__('Switch to One Column','kendall'),
					'param_name' => 'switch_to_one_column',
					'value' => array(
							esc_html__('Default','kendall')    		=> '',
							esc_html__('Below 1280px' ,'kendall')		=> '1280',
							esc_html__('Below 1024px' ,'kendall')   	=> '1024',
							esc_html__(	'Below 768px','kendall')     	=> '768',
							esc_html__('Below 600px','kendall')    	=> '600',
							esc_html__('Below 480px','kendall')    	=> '480',
							esc_html__('Never'  ,'kendall')  			=> 'never'
					),
					'description' => esc_html__('Choose on which stage item will be in one column','kendall')
				),
				array(
					'type' => 'dropdown',
					'class' => '',
					'group' => esc_html__('Width & Responsiveness','kendall'),
					'heading' => esc_html__('Choose Alignment In Responsive Mode','kendall'),
					'param_name' => 'alignment_one_column',
					'value' => array(
							esc_html__('Default','kendall')    	=> '',
							esc_html__('Left' ,'kendall')			=> 'left',
							esc_html__('Center','kendall')    	=> 'center',
							esc_html__('Right','kendall')     	=> 'right'
					),
					'description' => esc_html__('Alignment When Items are in One Column','kendall')
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'number_of_columns' 		=> '',
			'switch_to_one_column'		=> '',
			'alignment_one_column' 		=> '',
			'items_float_left' 			=> '',
			'background_color' 			=> ''
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';

		$elements_holder_classes = array();
		$elements_holder_classes[] = 'eltd-elements-holder';
		$elements_holder_style = '';

		if($number_of_columns != ''){
			$elements_holder_classes[] .= 'eltd-'.$number_of_columns ;
		}

		if($switch_to_one_column != ''){
			$elements_holder_classes[] = 'eltd-responsive-mode-' . $switch_to_one_column ;
		} else {
			$elements_holder_classes[] = 'eltd-responsive-mode-768' ;
		}

		if($alignment_one_column != ''){
			$elements_holder_classes[] = 'eltd-one-column-alignment-' . $alignment_one_column ;
		}

		if($items_float_left !== ''){
			$elements_holder_classes[] = 'eltd-elements-items-float';
		}

		if($background_color != ''){
			$elements_holder_style .= 'background-color:'. $background_color . ';';
		}

		$elements_holder_class = implode(' ', $elements_holder_classes);

		$html .= '<div ' . kendall_elated_get_class_attribute($elements_holder_class) . ' ' . kendall_elated_get_inline_attr($elements_holder_style, 'style'). '>';
			$html .= do_shortcode($content);
		$html .= '</div>';

		return $html;

	}

}
