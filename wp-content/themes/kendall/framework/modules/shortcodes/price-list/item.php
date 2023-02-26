<?php
namespace KendallElated\Modules\Shortcodes\PriceListItem;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class PriceListItem implements ShortcodeInterface{
	private $base;

	function __construct() {
		$this->base = 'eltd_price_list_item';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( 
				array(
					'name' => esc_html__('Elated Price List Item', 'kendall'),
					'base' => $this->base,
					'as_child' => array('only' => 'eltd_price_list'),
					'category' => esc_html__('by ELATED', 'kendall'),
					'icon' => 'icon-wpb-restaurant-item extended-custom-icon',
					'params' =>	array(
							array(
								'type' => 'textfield',
								'class' => '',
								'heading' => esc_html__('Item Title', 'kendall'),
								'param_name' => 'title',
								'value' => '',
								'description' => ''
							),
							array(
								'type'       => 'dropdown',
								'heading'    =>esc_html__( 'Title Tag', 'kendall'),
								'param_name' => 'title_tag',
								'value'      => array(
									''   => '',
									'h2' => 'h2',
									'h3' => 'h3',
									'h4' => 'h4',
									'h5' => 'h5',
									'h6' => 'h6',
								),
								'dependency' => array('element' => 'title', 'not_empty' => true)
							),
                            array(
                                'type'        => 'colorpicker',
                                'heading'     => esc_html__('Title Background Color','kendall' ),
                                'param_name'  => 'title_bg_color',
                                'admin_label' => true,
                                'description' => '',
                                'dependency' => array('element' => 'title', 'not_empty' => true)
                            ),
							array(
								'type'       => 'dropdown',
								'heading'    => esc_html__( 'Mark as Trending?', 'kendall'),
								'param_name' => 'trending_item',
								'value'      => array(
									esc_html__('No', 'kendall')   => 'no',
									esc_html__('Yes', 'kendall')   => 'yes'
								),
								'dependency' => array('element' => 'title', 'not_empty' => true)
							),
							array(
								'type' => 'textfield',
								'class' => '',
								'heading' => esc_html__('Currency', 'kendall'),
								'param_name' => 'currency',
								'value' => '',
								'description' => esc_html__('Default is "$"', 'kendall')
							),
							array(
								'type' => 'textfield',
								'class' => '',
								'heading' =>esc_html__( 'Price', 'kendall'),
								'param_name' => 'price',
								'value' => '',
								'description' => ''
							),
							array(
								'type' => 'textfield',
								'class' => '',
								'heading' =>esc_html__( 'Description', 'kendall'),
								'param_name' => 'description',
								'value' => '',
								'description' => ''
							)
					)
				)
			);			
		}
	}

	public function render($atts, $content = null) {
		$args = array(
			'title' => '',
			'title_tag' => 'h4',
			'trending_item' => 'no',
			'currency' => '$',
			'price' => '',
			'description' => '',
            'title_bg_color'=>''
		);

		$params = shortcode_atts($args, $atts);
		$params['content'] = $content;
        $params['title_style'] = $this->getTitleStyle($params);

		$html = kendall_elated_get_shortcode_module_template_part('templates/item-template', 'price-list', '', $params);

		return $html;
	}


    private function getTitleStyle($params){
        $style='';

        if($params['title_bg_color']!==''){
            $style.='background-color:'.$params['title_bg_color'];
        }

        return $style;
    }

}
