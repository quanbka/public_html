<?php
namespace KendallElated\Modules\Shortcodes\Button;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;


/**
 * Class Button that represents button shortcode
 * @package KendallElated\Modules\Shortcodes\Button
 */
class Button implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	/**
	 * Sets base attribute and registers shortcode with Visual Composer
	 */
	public function __construct() {
		$this->base = 'eltd_button';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	/**
	 * Returns base attribute
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}

	/**
	 * Maps shortcode to Visual Composer
	 */
	public function vcMap() {
		vc_map( array(
			'name'                      => esc_html__( 'Elated Button', 'kendall' ),
			'base'                      => $this->base,
			'category'                  => esc_html__( 'by ELATED','kendall' ),
			'icon'                      => 'icon-wpb-button extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Size','kendall' ),
						'param_name'  => 'size',
						'value'       => array(
							esc_html__( 'Default','kendall' )               => '',
							esc_html__( 'Small','kendall' )                  => 'small',
							esc_html__( 'Medium','kendall' )                 => 'medium',
							esc_html__( 'Large','kendall' )                  => 'large',
							esc_html__( 'Extra Large','kendall' )            => 'huge',
							esc_html__( 'Extra Large Full Width','kendall' ) => 'huge-full-width'
						),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Type','kendall' ),
						'param_name'  => 'type',
						'value'       => array(
							esc_html__( 'Default','kendall' )     => '',
                            esc_html__( 'Solid','kendall' )       => 'solid',
							esc_html__( 'Outline','kendall' )     => 'outline',
							esc_html__( 'Transparent','kendall' ) => 'transparent'
						),
						'save_always' => true,
						'admin_label' => true
					),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Hover Type','kendall' ),
                        'param_name'  => 'hover_type',
                        'value'       => array(
                            esc_html__( 'Gradient','kendall' )     => 'gradient_hover',
                            esc_html__( 'Solid','kendall' )     => 'solid_hover',
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'type', 'value' => array( 'solid')),
                    ),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Text','kendall' ),
						'param_name'  => 'text',
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     =>esc_html__(  'Link','kendall' ),
						'param_name'  => 'link',
						'admin_label' => true
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>esc_html__(  'Link Target','kendall' ),
						'param_name'  => 'target',
						'value'       => array(
								esc_html__( 'Self','kendall' )  => '_self',
								esc_html__( 'Blank','kendall' ) => '_blank'
						),
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Custom CSS class','kendall' ),
						'param_name'  => 'custom_class',
						'admin_label' => true
					)
				),
				kendall_elated_icon_collections()->getVCParamsArray( array(), '', true ),
				array(
					array(
						'type'        => 'colorpicker',
						'heading'     =>esc_html__(  'Color','kendall' ),
						'param_name'  => 'color',
						'group'       =>esc_html__(  'Design Options','kendall' ),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>esc_html__(  'Hover Color','kendall' ),
						'param_name'  => 'hover_color',
						'group'       =>esc_html__(  'Design Options','kendall' ),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Start Background Color','kendall' ),
						'param_name'  => 'start_background_color',
						'admin_label' => true,
						'dependency'  => array( 'element' => 'type', 'value' => array( 'solid' ) ),
						'group'       =>esc_html__(  'Design Options','kendall' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'End Background Color','kendall' ),
						'param_name'  => 'end_background_color',
						'admin_label' => true,
						'dependency'  => array( 'element' => 'type', 'value' => array( 'solid' ) ),
						'group'       =>esc_html__(  'Design Options','kendall' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>esc_html__(  'Hover Background Color','kendall' ),
						'param_name'  => 'hover_background_color',
						'admin_label' => true,
						'dependency' => array('element' => 'type', 'value' => array( '','outline')),
						'group'       =>esc_html__(  'Design Options','kendall' )
					),
                    array(
                        'type'        => 'colorpicker',
                        'heading'     =>esc_html__(  'Hover Background Color','kendall' ),
                        'param_name'  => 'solid_hover_background_color',
                        'admin_label' => true,
                        'dependency' => array('element' => 'hover_type', 'value' => array('solid_hover')),
                        'group'       =>esc_html__(  'Design Options','kendall' )
                    ),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Border Color','kendall' ),
						'param_name'  => 'border_color',
						'admin_label' => true,
						'group'       =>esc_html__(  'Design Options','kendall' ),
						'dependency' => array('element' => 'type', 'value' => array('', 'outline')),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Hover Border Color','kendall' ),
						'param_name'  => 'hover_border_color',
						'admin_label' => true,
						'group'       => esc_html__( 'Design Options','kendall' ),
						'dependency' => array('element' => 'type', 'value' => array('', 'outline')),
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Font Size (px)','kendall' ),
						'param_name'  => 'font_size',
						'admin_label' => true,
						'group'       =>esc_html__(  'Design Options','kendall' )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>esc_html__(  'Font Weight','kendall' ),
						'param_name'  => 'font_weight',
						'value'       => kendall_elated_get_font_weight_array( true ),
						'admin_label' => true,
						'group'       => esc_html__( 'Design Options','kendall' ),
						'save_always' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     =>esc_html__( 'Margin','kendall' ),
						'param_name'  => 'margin',
						'description' => esc_html__( 'Insert margin in format: 0px 0px 1px 0px', 'kendall' ),
						'admin_label' => true,
						'group'       => esc_html__( 'Design Options','kendall' )
					)
				)
			) //close array_merge
		) );
	}

	/**
	 * Renders HTML for button shortcode
	 *
	 * @param array $atts
	 * @param null $content
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'size'                   => '',
			'type'                   => '',
			'text'                   => '',
			'link'                   => '',
			'target'                 => '',
			'color'                  => '',
			'hover_color'            => '',
			'start_background_color'  => '',
			'end_background_color'	=>'',
			'hover_background_color' 	=> '',
            'solid_hover_background_color' 	=> '',
			'border_color'           => '',
			'hover_border_color'     => '',
			'font_size'              => '',
			'font_weight'            => '',
			'margin'                 => '',
			'custom_class'           => '',
			'html_type'              => 'anchor',
			'input_name'             => '',
			'hover_animation'        => '',
            'hover_type'          =>'',
			'custom_attrs'           => array()
		);

		$default_atts = array_merge( $default_atts, kendall_elated_icon_collections()->getShortcodeParams() );
		$params       = shortcode_atts( $default_atts, $atts );

		if ( $params['html_type'] !== 'input' ) {
			$iconPackName   = kendall_elated_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
			$params['icon'] = $iconPackName ? $params[ $iconPackName ] : '';
		}

		$params['size'] = ! empty( $params['size'] ) ? $params['size'] : 'medium';
		$params['type'] = ! empty( $params['type'] ) ? $params['type'] : 'outline';


		$params['link']   = ! empty( $params['link'] ) ? $params['link'] : '#';
		$params['target'] = ! empty( $params['target'] ) ? $params['target'] : '_self';

		//prepare params for template
		$params['button_classes']      = $this->getButtonClasses( $params );
		$params['button_custom_attrs'] = ! empty( $params['custom_attrs'] ) ? $params['custom_attrs'] : array();
		$params['button_styles']       = $this->getButtonStyles( $params );
		$params['button_data']         = $this->getButtonDataAttr( $params );

		return kendall_elated_get_shortcode_module_template_part( 'templates/' . $params['html_type'], 'button', $params['hover_animation'], $params );
	}

	/**
	 * Returns array of button styles
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['color'] ) ) {
			$styles[] = 'color: ' . $params['color'];
		}

		if ( ! empty( $params['border_color'] ) ) {
			$styles[] = 'border-color: ' . $params['border_color'];
		}

		if ( ! empty( $params['font_size'] ) ) {
			$styles[] = 'font-size: ' . kendall_elated_filter_px( $params['font_size'] ) . 'px';
		}

		if ( ! empty( $params['font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}

		if ( ! empty( $params['margin'] ) ) {
			$styles[] = 'margin: ' . $params['margin'];
		}

		if ( ! empty( $params['start_background_color'] ) && ! empty( $params['end_background_color'] )  ) {
	        $styles [] ='background:linear-gradient(to right,'.$params['start_background_color'].' 0,'.$params['end_background_color'].' 50%,'.$params['start_background_color'].' 100%);background-size: 200% 200%;';

        }
		return $styles;
	}

	/**
	 *
	 * Returns array of button data attr
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonDataAttr( $params ) {
		$data = array();


		if ( ! empty( $params['hover_color'] ) ) {
			$data['data-hover-color'] = $params['hover_color'];
		}

		if ( ! empty( $params['hover_background_color'] ) ) {
			$data['data-hover-background-color'] = $params['hover_background_color'];
		}

        if ( ! empty( $params['start_background_color'] ) ) {
            $data['data-solid-start-background-color'] = $params['start_background_color'];
        }
        if ( ! empty( $params['end_background_color'] ) ) {
            $data['data-solid-end-background-color'] = $params['end_background_color'];
        }

		if ( ! empty( $params['solid_hover_background_color'] ) ) {
			$data['data-solid-hover-background-color'] = $params['solid_hover_background_color'];
		}

		if ( ! empty( $params['hover_border_color'] ) ) {
			$data['data-hover-border-color'] = $params['hover_border_color'];
		}

		return $data;
	}

	/**
	 * Returns array of HTML classes for button
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getButtonClasses( $params ) {
		$buttonClasses = array(
			'eltd-btn',
			'eltd-btn-' . $params['size'],
			'eltd-btn-' . $params['type']
		);

		if ( ! empty( $params['hover_background_color'] ) ) {
			$buttonClasses[] = 'eltd-btn-custom-hover-bg';
		}

		if ( ! empty( $params['hover_border_color'] ) ) {
			$buttonClasses[] = 'eltd-btn-custom-border-hover';
		}

		if ( ! empty( $params['solid_hover_background_color'] )) {
			$buttonClasses[] = 'eltd-btn-custom-gradient-hover';
		}

		if ( ! empty( $params['hover_color'] ) ) {
			$buttonClasses[] = 'eltd-btn-custom-hover-color';
		}

		if ( ! empty( $params['icon'] ) ) {
			$buttonClasses[] = 'eltd-btn-icon';
		}

		if ( ! empty( $params['custom_class'] ) ) {
			$buttonClasses[] = $params['custom_class'];
		}

		if ( ! empty( $params['hover_animation'] ) ) {
			$buttonClasses[] = 'eltd-btn-' . $params['hover_animation'];
		}
        if ( ! empty( $params['hover_type'] ) ) {
            $buttonClasses[] = 'eltd-btn-' . $params['hover_type'];
        }

		return $buttonClasses;
	}
}