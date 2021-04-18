<?php
namespace KendallElated\Modules\Shortcodes\ProgressBar;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class ProgressBar implements ShortcodeInterface{
	private $base;
	
	function __construct() {
		$this->base = 'eltd_progress_bar';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Elated Progress Bar', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-progress-bar extended-custom-icon',
			'category' => esc_html__( 'by ELATED', 'kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' =>  esc_html__('Title', 'kendall'),
					'param_name' => 'title',
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' =>  esc_html__('Percentage', 'kendall'),
					'param_name' => 'percent',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' =>  esc_html__('Percentage Type', 'kendall'),
					'param_name' => 'percentage_type',
					'value' => array(
			esc_html__('Floating', 'kendall')  => 'floating',
			esc_html__('Static', 'kendall') => 'static'
					),
					'dependency' => Array('element' => 'percent', 'not_empty' => true)
				),
			    array(
				    'type' => 'dropdown',
				    'admin_label' => true,
				    'heading' => esc_html__( 'Skin', 'kendall'),
				    'param_name' => 'skin',
				    'save_always' => true,
				    'value' => array(
			esc_html__( 'Dark', 'kendall')  => 'dark',
			esc_html__( 'Light', 'kendall') => 'light'
				    ),
			        'dependency' => Array('element' => 'percentage_type', 'value' => 'static')
			    ),
			)
		) );

	}

	public function render($atts, $content = null) {
		$args = array(
			'skin' => '',
            'title' => '',
            'percent' => '100',
            'percentage_type' => 'floating'
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$params['percentage_classes'] = $this->getPercentageClasses($params);
		if(!empty($percentage_type) && $percentage_type === 'static'){
			$params['skin_class'] = $skin;
		}

        //init variables
		$html = kendall_elated_get_shortcode_module_template_part('templates/progress-bar-template', 'progress-bar', '', $params);
		
        return $html;
		
	}
	/**
    * Generates css classes for progress bar
    *
    * @param $params
    *
    * @return array
    */
	private function getPercentageClasses($params){
		
		$percentClassesArray = array();
		
		if(!empty($params['percentage_type']) !=''){
			
			if($params['percentage_type'] == 'floating'){
				
				$percentClassesArray[]= 'eltd-floating eltd-floating-outside';

			}
			elseif($params['percentage_type'] == 'static'){
				
				$percentClassesArray[] = 'eltd-static';
				
			}
		}

		return implode(' ', $percentClassesArray);
	}
}