<?php
namespace KendallElated\Modules\Shortcodes\CallToAction;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class CallToAction
 */
class CallToAction implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_call_to_action';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
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

		$call_to_action_button_icons_array     = array();
		$call_to_action_button_IconCollections = kendall_elated_icon_collections()->iconCollections;
		foreach ( $call_to_action_button_IconCollections as $collection_key => $collection ) {

			$call_to_action_button_icons_array[] = array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Button Icon','kendall'),
				'param_name'  => 'button_' . $collection->param,
				'value'       => $collection->getIconsArray(),
				'save_always' => true,
				'dependency'  => Array( 'element' => 'button_icon_pack', 'value' => array( $collection_key ) )
			);

		}

		vc_map( array(
			'name'                      => esc_html__( 'Elated Call To Action', 'kendall' ),
			'base'                      => $this->getBase(),
			'category'                  =>  esc_html__('by ELATED','kendall' ),
			'icon'                      => 'icon-wpb-call-to-action extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Full Width','kendall'),
						'param_name'  => 'full_width',
						'admin_label' => true,
						'value'       => array(
							esc_html__('Yes','kendall') => 'yes',
							esc_html__('No','kendall')  => 'no'
						),
						'save_always' => true,
						'description' => '',
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Content in grid','kendall'),
						'param_name'  => 'content_in_grid',
						'value'       => array(
							esc_html__('Yes','kendall') => 'yes',
							esc_html__('No','kendall')  => 'no'
						),
						'save_always' => true,
						'description' => '',
						'dependency'  => array( 'element' => 'full_width', 'value' => 'yes' )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Grid size','kendall'),
						'param_name'  => 'grid_size',
						'value'       => array(
							'80/20' => '80',
							'50/50' => '50',
							'66/33' => '66'
						),
						'save_always' => true,
						'description' => '',
						'dependency'  => array( 'element' => 'content_in_grid', 'value' => 'yes' )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Type','kendall'),
						'param_name'  => 'type',
						'admin_label' => true,
						'value'       => array(
							esc_html__('Normal','kendall')    => 'normal',
							esc_html__('With Icon','kendall') => 'with-icon',
						),
						'save_always' => true,
						'description' => ''
					)
				),
				kendall_elated_icon_collections()->getVCParamsArray( array(
					'element' => 'type',
					'value'   => array( 'with-icon' )
				) ),
				array(
					array(
						'type'        => 'textfield',
						'heading'     =>  esc_html__('Icon Size (px)','kendall'),
						'param_name'  => 'icon_size',
						'description' => '',
						'dependency'  => Array( 'element' => 'type', 'value' => array( 'with-icon' ) ),
						'group'       =>  esc_html__('Design Options','kendall'),
					),
					array(
						'type'        => 'textfield',
						'heading'     =>  esc_html__('Box Padding (top right bottom left) px','kendall'),
						'param_name'  => 'box_padding',
						'admin_label' => true,
						'description' =>  esc_html__('Default padding is 55px top and bottom, left and right 0','kendall'),
						'group'       =>  esc_html__('Design Options','kendall')
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Default Text Font Size (px)','kendall'),
						'param_name'  => 'text_size',
						'description' => esc_html__( 'Font size for p tag','kendall'),
						'group'       => esc_html__( 'Design Options','kendall'),
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Show Button','kendall'),
						'param_name'  => 'show_button',
						'value'       => array(
								esc_html__('Yes','kendall') => 'yes',
								esc_html__('No','kendall')  => 'no'
						),
						'admin_label' => true,
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Button Position','kendall'),
						'param_name'  => 'button_position',
						'value'       => array(
								esc_html__('Default/right','kendall') => '',
								esc_html__('Center' ,'kendall')       => 'center',
								esc_html__('Left','kendall')          => 'left'
						),
						'description' => '',
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Button Size','kendall'),
						'param_name'  => 'button_size',
						'value'       => array(
								esc_html__('Default','kendall')     => '',
								esc_html__('Small','kendall')       => 'small',
								esc_html__('Medium','kendall')      => 'medium',
								esc_html__('Large','kendall')       => 'large',
								esc_html__('Extra Large','kendall') => 'big_large'
						),
						'description' => '',
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Button Type','kendall'),
						'param_name'  => 'button_type',
						'value'       => array(
								esc_html__('Solid','kendall')       => 'solid',
								esc_html__('Outline','kendall')     => 'outline',
								esc_html__('Transparent','kendall') => 'transparent'
						),
						'save_always' => true,
						'description' => '',
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
                    array(
                        'type'        => 'dropdown',
                        'heading'     => esc_html__( 'Button Hover Type','kendall' ),
                        'param_name'  => 'button_hover_type',
                        'value'       => array(
                            esc_html__( 'Gradient','kendall' )     => 'gradient_hover',
                            esc_html__( 'Solid','kendall' )     => 'solid_hover',
                        ),
                        'save_always' => true,
                        'admin_label' => true,
                        'dependency' => array('element' => 'button_type', 'value' => array( 'solid')),
                    ),
					array(
						'type'        => 'textfield',
						'heading'     =>  esc_html__('Button Text','kendall'),
						'param_name'  => 'button_text',
						'admin_label' => true,
						'description' => esc_html__( 'Default text is "button"','kendall'),
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
					array(
						'type'        => 'textfield',
						'heading'     =>  esc_html__('Button Link','kendall'),
						'param_name'  => 'button_link',
						'description' => '',
						'admin_label' => true,
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Button Target','kendall'),
						'param_name'  => 'button_target',
						'value'       => array(
							''      => '',
							esc_html__('Self','kendall')  => '_self',
							esc_html__('Blank','kendall') => '_blank'
						),
						'description' => '',
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
					array(
						'type'        => 'dropdown',
						'heading'     =>  esc_html__('Button Icon Pack','kendall'),
						'param_name'  => 'button_icon_pack',
						'value'       => array_merge( array( 'No Icon' => '' ), kendall_elated_icon_collections()->getIconCollectionsVC() ),
						'save_always' => true,
						'dependency'  => array( 'element' => 'show_button', 'value' => array( 'yes' ) )
					),
					array(
						'type'        => 'attach_image',
						'heading'     =>  esc_html__('Background Image','kendall'),
						'param_name'  => 'background_image',
						'save_always' => true,
						'group'       =>  esc_html__('Design Options','kendall'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Background Color','kendall'),
						'param_name'  => 'background_color',
						'save_always' => true,
						'group'       =>  esc_html__('Design Options','kendall'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button Color','kendall'),
						'param_name'  => 'button_color',
						'save_always' => true,
						'group'       => esc_html__( 'Design Options','kendall'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button Start Background Color','kendall' ),
						'param_name'  => 'button_start_background_color',
						'admin_label' => true,
						'dependency'  => array( 'element' => 'button_type', 'value' => array( 'solid' ) ),
						'group'       =>esc_html__(  'Design Options','kendall' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button End Background Color','kendall' ),
						'param_name'  => 'button_end_background_color',
						'admin_label' => true,
						'dependency'  => array( 'element' => 'button_type', 'value' => array( 'solid' ) ),
						'group'       =>esc_html__(  'Design Options','kendall' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>  esc_html__('Button Border Color','kendall'),
						'param_name'  => 'button_border_color',
						'save_always' => true,
						'group'       =>  esc_html__('Design Options','kendall'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>  esc_html__('Button Hover Color','kendall'),
						'param_name'  => 'button_hover_color',
						'save_always' => true,
						'group'       =>  esc_html__('Design Options','kendall'),
						'admin_label' => true
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button Hover Background Color','kendall' ),
						'param_name'  => 'button_solid_hover_background_color',
						'admin_label' => true,
						'save_always' => true,
						'dependency'  => array( 'element' => 'button_hover_type', 'value' => array( 'solid_hover' ) ),
						'group'       =>esc_html__(  'Design Options','kendall' )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button Hover Border Color','kendall'),
						'param_name'  => 'button_hover_border_color',
						'save_always' => true,
						'group'       => esc_html__( 'Design Options','kendall'),
						'admin_label' => true
					)
				),
				$call_to_action_button_icons_array,
				array(
					array(
						'type'        => 'textarea_html',
						'admin_label' => true,
						'heading'     => esc_html__( 'Content','kendall'),
						'param_name'  => 'content',
						'value'       => '<p>' .  esc_html__('I am test text for Call to action.','kendall') . '</p>',
						'description' => ''
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
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {

		$args = array(
			'type'                          => 'normal',
			'full_width'                    => 'yes',
			'content_in_grid'               => 'yes',
			'grid_size'                     => '80',
			'icon_size'                     => '',
			'box_padding'                   => '47px 0',
			'text_size'                     => '20',
			'show_button'                   => 'yes',
			'button_position'               => 'right',
			'button_size'                   => '',
			'button_type'                   => '',
			'button_link'                   => '',
			'button_text'                   => 'button',
			'button_target'                 => '',
			'button_icon_pack'              => '',
			'background_image'              => '',
			'background_color'              => '',
			'button_color'                  => '',
			'button_end_background_color'       => '',
			'button_start_background_color'	=>'',
			'button_hover_color'            => '',
            'button_hover_type'            => '',
			'button_solid_hover_background_color'       => '',
			'button_border_color' => '',
			'button_hover_border_color' => '',
		);

		$call_to_action_icons_form_fields = array();

		foreach ( kendall_elated_icon_collections()->iconCollections as $collection_key => $collection ) {

			$call_to_action_icons_form_fields[ 'button_' . $collection->param ] = '';

		}

		$args = array_merge( $args, kendall_elated_icon_collections()->getShortcodeParams(), $call_to_action_icons_form_fields );

		$params = shortcode_atts( $args, $atts );

		$params['content']               = $content;
		$params['text_wrapper_classes']  = $this->getTextWrapperClasses( $params );
		$params['content_styles']        = $this->getContentStyles( $params );
		$params['call_to_action_styles'] = $this->getCallToActionStyles( $params );
		$params['icon']                  = $this->getCallToActionIcon( $params );
		$params['button_parameters']     = $this->getButtonParameters( $params );
        $params['call_to_action_bg_color'] = $this->getCallToActionBgColor($params);

		//Get HTML from template
		$html = kendall_elated_get_shortcode_module_template_part( 'templates/call-to-action-template', 'calltoaction', '', $params );

		return $html;

	}

	/**
	 * Return Classes for Call To Action text wrapper
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getTextWrapperClasses( $params ) {

        $classes='';
        $classes .=  ( $params['show_button'] == 'yes' ) ? 'eltd-call-to-action-column1 eltd-call-to-action-cell' : '';

        return $classes;
	}

	/**
	 * Return CSS styles for Call To Action Icon
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getIconStyles( $params ) {
		$icon_style = array();

		if ( $params['icon_size'] !== '' ) {
			$icon_style[] = 'font-size: ' . $params['icon_size'] . 'px';
		}

		return implode( ';', $icon_style );
	}

	/**
	 * Return CSS styles for Call To Action Content
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getContentStyles( $params ) {
		$content_styles = array();

		if ( $params['text_size'] !== '' ) {
			$content_styles[] = 'font-size: ' . $params['text_size'] . 'px';
		}

		return implode( ';', $content_styles );
	}

	/**
	 * Return CSS styles for Call To Action shortcode
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCallToActionStyles( $params ) {
		$call_to_action_styles = array();

		if ( $params['box_padding'] != '' ) {
			$call_to_action_styles[] = 'padding: ' . $params['box_padding'];
		}

		if ( $params['background_image'] !== '' ) {
			$image = wp_get_attachment_image_src( $params['background_image'] );
			if ( is_array( $image ) ) {
				$call_to_action_styles[] = 'background-image: url(' . $image[0] . ')';
			}
		}

		if ( $params['background_color'] !== '' ) {
			$call_to_action_styles[] = 'background-color: ' . $params['background_color'];
		}

		return implode( ';', $call_to_action_styles );
	}

    private function getCallToActionBgColor($params){
        $call_to_action_bg = array();

        if ( $params['background_color'] != '' ) {
            $call_to_action_bg[] = 'background-color: ' . $params['background_color'];
        }

        return implode( ';', $call_to_action_bg );
    }

	/**
	 * Return Icon for Call To Action Shortcode
	 *
	 * @param $params
	 *
	 * @return mixed
	 */
	private function getCallToActionIcon( $params ) {

		$icon                                   = kendall_elated_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
		$iconStyles                             = array();
		$iconStyles['icon_attributes']['style'] = $this->getIconStyles( $params );
		$call_to_action_icon                    = '';
		if ( ! empty( $params[ $icon ] ) ) {
			$call_to_action_icon = kendall_elated_icon_collections()->renderIcon( $params[ $icon ], $params['icon_pack'], $iconStyles );
		}

		return $call_to_action_icon;

	}

	private function getButtonParameters( $params ) {
		$button_params_array = array();

		if ( ! empty( $params['button_link'] ) ) {
			$button_params_array['link'] = $params['button_link'];
		}

		if ( ! empty( $params['button_size'] ) ) {
			$button_params_array['size'] = $params['button_size'];
		}
		if ( ! empty( $params['button_type'] ) ) {
			$button_params_array['type'] = $params['button_type'];
		}

        if ( ! empty( $params['button_hover_type'] ) ) {
            $button_params_array['hover_type'] = $params['button_hover_type'];
        }

		if ( ! empty( $params['button_icon_pack'] ) ) {
			$button_params_array['icon_pack']     = $params['button_icon_pack'];
			$iconPackName                         = kendall_elated_icon_collections()->getIconCollectionParamNameByKey( $params['button_icon_pack'] );
			$button_params_array[ $iconPackName ] = $params[ 'button_' . $iconPackName ];
		}

		if ( ! empty( $params['button_target'] ) ) {
			$button_params_array['target'] = $params['button_target'];
		}
        if ( ! empty( $params['button_solid_hover_background_color'] ) ) {
            $button_params_array['solid_hover_background_color'] = $params['button_solid_hover_background_color'];
        }

		if ( ! empty( $params['button_text'] ) ) {
			$button_params_array['text'] = $params['button_text'];
		}

		if ( ! empty( $params['button_color'] ) ) {
			$button_params_array['color'] = $params['button_color'];
			$button_params_array['border_color'] = $params['button_color'];
		}

		if ( ! empty( $params['button_start_background_color'] ) ) {
			$button_params_array['start_background_color'] = $params['button_start_background_color'];
		}
		if ( ! empty( $params['button_end_background_color'] ) ) {
			$button_params_array['end_background_color'] = $params['button_end_background_color'];
		}

		if ( ! empty( $params['button_hover_color'] ) ) {
			$button_params_array['hover_color'] = $params['button_hover_color'];
			$button_params_array['hover_border_color'] = $params['button_hover_color'];
		}


		if ( ! empty( $params['button_hover_background_color'] ) ) {
			$button_params_array['hover_background_color'] = $params['button_hover_background_color'];
		}

		if ( ! empty( $params['button_border_color'] ) ) {
			$button_params_array['border_color'] = $params['button_border_color'];
		}

		if ( ! empty( $params['button_hover_border_color'] ) ) {
			$button_params_array['hover_border_color'] = $params['button_hover_border_color'];
		}

		return $button_params_array;
	}
}