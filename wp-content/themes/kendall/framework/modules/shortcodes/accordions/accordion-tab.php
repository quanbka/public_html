<?php 
namespace KendallElated\Modules\Shortcodes\AccordionTab;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
	* class Accordions
*/
class AccordionTab implements ShortcodeInterface{
	/**
	 * @var string
	 */
	private $base;
	function __construct() {
		$this->base = 'eltd_accordion_tab';
		add_action('vc_before_init', array($this, 'vcMap'));
	}
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if(function_exists('vc_map')){
			vc_map( array(
				"name" => esc_html__('Elated Accordion Tab', 'kendall'),
				"base" => $this->base,
				"as_parent" => array('except' => 'vc_row'),
				"as_child" => array('only' => 'eltd_accordion'),
				'is_container' => true,
				"category" => esc_html__('by ELATED','kendall'),
				"icon" => "icon-wpb-accordion-section extended-custom-icon",
				"show_settings_on_create" => true,
				"js_view" => 'VcColumnView',
				"params" => array(
					array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'kendall' ),
						'param_name' => 'title',
						'admin_label' => true,
						'value' => esc_html__( 'Section', 'kendall' ),
						'description' => esc_html__( 'Enter accordion section title.', 'kendall' )
					),
					array(
						'type' => 'el_id',
						'heading' => esc_html__( 'Section ID', 'kendall' ),
						'param_name' => 'el_id',
						'description' => sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'kendall' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'kendall' ) . '</a>' ),
					),
					array(
						"type" => "dropdown",
						"class" => "",
						"heading" => esc_html__("Title Tag",'kendall'),
						"param_name" => "title_tag",
						"value" => array(
							""   => "",
							"p"  => "p",
							"h2" => "h2",
							"h3" => "h3",
							"h4" => "h4",
							"h5" => "h5",
							"h6" => "h6",
						),
						"description" => ""
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Content Border Color', 'kendall' ),
						'param_name' => 'content_border_color',
						'admin_label' => true,
						'description' => esc_html__( 'Enter accordion content border color.', 'kendall' )
					),
					array(
						'type' => 'colorpicker',
						'heading' => esc_html__( 'Content Background Color', 'kendall' ),
						'param_name' => 'content_background_color',
						'admin_label' => true,
						'value' => esc_html__( 'Section', 'kendall' ),
						'description' => esc_html__( 'Enter accordion content background color.', 'kendall' )
					),
				)

			));
		}
	}	
	public function render($atts, $content = null) {

		$default_atts = (array(
			'title'	=> esc_html__("Accordion Title",'kendall'),
			'title_tag' => 'h5',
			'content_border_color' => '',
			'content_background_color' => '',
			'el_id' => ''
		));
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$params['content'] = $content;
		$params['content_style'] = $this->getContentStyle($params);
		
		$output = '';
		
		$output .= kendall_elated_get_shortcode_module_template_part('templates/accordion-template','accordions', '',$params);

		return $output;
		
	}

	private function getContentStyle($params){

		$content_style = array();
		if($params['content_border_color'] !== '' ){
			$content_style[] = 'border-color: '.$params['content_border_color'];
		}
		if($params['content_background_color'] !== '' ){
			$content_style[] = 'background-color: '.$params['content_background_color'];
		}

		return implode(';', $content_style);

	}

}