<?php
namespace KendallElated\Modules\Shortcodes\PricingTable;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class PricingTable implements ShortcodeInterface{
	private $base;
	function __construct() {
		$this->base = 'eltd_pricing_table';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		vc_map( array(
			'name' => esc_html__('Elated Pricing Table', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-pricing-table extended-custom-icon',
			'category' =>esc_html__( 'by ELATED', 'kendall'),
			'allowed_container_element' => 'vc_row',
			'as_child' => array('only' => 'eltd_pricing_tables'),
			'params' => array(
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Title', 'kendall'),
					'param_name' => 'title',
					'value' =>esc_html__( 'Basic Plan', 'kendall'),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price', 'kendall'),
					'param_name' => 'price',
					'description' => esc_html__('Default value is 100', 'kendall')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Currency', 'kendall'),
					'param_name' => 'currency',
					'description' => esc_html__('Default mark is $', 'kendall')
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' => esc_html__('Price Period', 'kendall'),
					'param_name' => 'price_period',
					'description' =>esc_html__( 'Default label is monthly', 'kendall')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Show Button', 'kendall'),
					'param_name' => 'show_button',
					'value' => array(
						esc_html__('Default', 'kendall') => '',
						esc_html__('Yes', 'kendall') => 'yes',
						esc_html__('No', 'kendall') => 'no'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' =>esc_html__( 'Button Text', 'kendall'),
					'param_name' => 'button_text',
					'dependency' => array('element' => 'show_button',  'value' => 'yes') 
				),
				array(
					'type' => 'textfield',
					'admin_label' => true,
					'heading' =>esc_html__( 'Button Link', 'kendall'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button',  'value' => 'yes')
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' => esc_html__('Featured', 'kendall'),
					'param_name' => 'featured',
					'value' => array(
							esc_html__('No', 'kendall') => 'no',
							esc_html__('Yes', 'kendall') => 'yes'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'textarea_html',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Content', 'kendall'),
					'param_name' => 'content',
					'value' => '<li>content content content</li><li>content content content</li><li>content content content</li>',
					'description' => ''
				)
			)
		));
	}

	public function render($atts, $content = null) {
	
		$args = array(
			'title'         			   => esc_html__('Basic Plan', 'kendall'),
			'price'         			   => '100',
			'currency'      			   => '$',
			'price_period'  			   => esc_html__('Monthly', 'kendall'),
			'featured'        			   => 'no',
			'show_button'				   => 'yes',
			'link'          			   => '',
			'button_text'   			   => 'button'
		);
		$params = shortcode_atts($args, $atts);
		extract($params);

		$html						= '';
		$pricing_table_clasess		= 'eltd-price-table';
		
		if($featured == 'yes') {
			$pricing_table_clasess .= ' eltd-featured';
		}
		
		$params['pricing_table_classes'] = $pricing_table_clasess;
        $params['content'] = preg_replace('#^<\/p>|<p>$#', '', $content);
		
		$html .= kendall_elated_get_shortcode_module_template_part('templates/pricing-table-template','pricing-table', '', $params);
		return $html;

	}

}
