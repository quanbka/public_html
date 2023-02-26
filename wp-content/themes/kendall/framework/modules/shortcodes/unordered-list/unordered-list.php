<?php
namespace KendallElated\Modules\Shortcodes\UnorderedList;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class unordered List
 */
class UnorderedList implements ShortcodeInterface{

	private $base;

	function __construct() {
		$this->base='eltd_unordered_list';
		
		add_action('vc_before_init', array($this, 'vcMap'));
	}

	/**\
	 * Returns base for shortcode
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Elated List - Unordered', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-unordered-list extended-custom-icon',
			'category' => esc_html__('by ELATED','kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' =>esc_html__( 'Style','kendall'),
					'param_name' => 'style',
					'value' => array(
						esc_html__('Circle','kendall') => 'circle',
						esc_html__('Line','kendall')	 => 'line'
					),
					'description' => '',
                    'save_always'=>true
				),
				array(
					'type' => 'dropdown',
					'admin_label' => true,
					'heading' =>esc_html__( 'Animate List','kendall'),
					'param_name' => 'animate',
					'value' => array(
						esc_html__('No','kendall') => 'no',
						esc_html__('Yes','kendall') => 'yes'
					),
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'heading' =>esc_html__( 'Font Weight','kendall'),
					'param_name' => 'font_weight',
					'value' => array(
						esc_html__('Default','kendall') => '',
						esc_html__('Light','kendall') => 'light',
						esc_html__('Normal','kendall') => 'normal',
						esc_html__('Bold','kendall') => 'bold'
					),
					'description' => ''
				),
				array(
					'type' => 'textfield',
					'heading' =>esc_html__( 'Padding left (px)','kendall'),
					'param_name' => 'padding_left',
					'value' => ''
				),
				array(
					'type' => 'textarea_html',
					'heading' =>esc_html__( 'Content','kendall'),
					'param_name' => 'content',
					'value' => '<ul><li>Lorem Ipsum</li><li>Lorem Ipsum</li><li>Lorem Ipsum</li></ul>',
					'description' => ''
				)
			)
		) );
	}

	public function render($atts, $content = null) {
		$args = array(
            'style' => '',
            'animate' => '',
            'font_weight' => '',
            'padding_left' => ''
        );
		$params = shortcode_atts($args, $atts);
		
		//Extract params for use in method
		extract($params);
		
		$list_item_classes = "";

        if ($style !== '') {
			if($style == 'circle'){
				$list_item_classes .= ' eltd-circle';
			}elseif ($style == 'line') {
				$list_item_classes .= ' eltd-line';
			}
        }

		if ($animate == 'yes') {
			$list_item_classes .= ' eltd-animate-list';
		}
		
		$list_style = '';
		if($padding_left != '') {
			$list_style .= 'padding-left: ' . $padding_left .'px;';
		}
		$content = preg_replace('#^<\/p>|<p>$#', '', $content);
        $html = '<div class="eltd-unordered-list '.$list_item_classes.'" '.  kendall_elated_get_inline_style($list_style).'>'.do_shortcode($content).'</div>';
        return $html;
	}
}