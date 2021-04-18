<?php
namespace KendallElated\Modules\Shortcodes\InfoBox;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class InfoBox implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'eltd_info_box';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map( array(
			'name'                      =>esc_html__( 'Info Box','kendall'),
			'base'                      => $this->base,
			'category'                  => esc_html__( 'by ELATED','kendall'),
			'icon'                      => 'icon-wpb-info-box extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'heading'     =>esc_html__(  'Layout','kendall'),
						'param_name'  => 'layout',
						'value'       => array(
							esc_html__( 'Detailed','kendall') => 'detailed',
							esc_html__( 'Simple','kendall')   => 'simple'
						),
						'save_always' => true,
						'admin_label' => true
					)
				),
				kendall_elated_icon_collections()->getVCParamsArray( array(
					'element' => 'layout',
					'value'   => array( 'detailed' )
				), '', true ),
				array(
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Title','kendall'),
						'param_name'  => 'title',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Title Link','kendall'),
						'param_name'  => 'title_link',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'layout', 'value' => array( 'simple' ) )
					),
					array(
						'type'        => 'textarea',
						'heading'     => esc_html__( 'Text','kendall'),
						'param_name'  => 'text',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'layout', 'value' => array( 'detailed' ) )
					),

					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Button Link','kendall'),
						'param_name'  => 'button_link',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'layout', 'value' => array( 'detailed' ) )
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__( 'Button Text','kendall'),
						'param_name'  => 'button_text',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true )
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Button Target','kendall'),
						'param_name'  => 'button_target',
						'value'       => array(
							esc_html__( 'Same Window','kendall') => '_self',
							esc_html__( 'New Window','kendall')  => '_blank'
						),
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true )
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Interactivity','kendall'),
						'param_name'  => 'interactivity',
						'value'       => array(
							esc_html__( 'Yes','kendall') => 'yes',
							esc_html__( 'No','kendall')  => 'no'
						),
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true ),
						'group'       => esc_html__( 'Behavior','kendall')
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Skin','kendall'),
						'param_name'  => 'skin',
						'value'       => array(
							esc_html__( 'Standard','kendall') => '',
							esc_html__( 'Light','kendall')    => 'light'
						),
						'save_always' => true,
						'admin_label' => true,
						'group'       => esc_html__( 'Design Options','kendall')
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Background Color','kendall'),
						'param_name'  => 'background_color',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
						'group'       => esc_html__( 'Design Options','kendall')
					),
					array(
						'type'        => 'attach_image',
						'heading'     =>esc_html__(  'Background Image','kendall'),
						'param_name'  => 'background_image',
						'value'       => '',
						'save_always' => true,
						'admin_label' => true,
						'group'       =>esc_html__(  'Design Options','kendall')
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__( 'Button Type','kendall'),
						'param_name'  => 'button_type',
						'value'       => array(
							esc_html__( 'Solid','kendall')       => 'solid',
							esc_html__( 	'Outline','kendall')     => 'outline',
							esc_html__( 	'Transparent','kendall') => 'transparent'
						),
						'save_always' => true,
						'admin_label' => true,
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true ),
						'group'       => esc_html__( 'Design Options','kendall')
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button Hover Background Color','kendall'),
						'param_name'  => 'button_hover_bg_color',
						'value'       => '',
						'save_always' => true,
						'group'       => esc_html__( 'Design Options','kendall'),
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>esc_html__(  'Button Hover Text Color','kendall'),
						'param_name'  => 'button_hover_color',
						'value'       => '',
						'save_always' => true,
						'group'       => esc_html__( 'Design Options','kendall'),
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Button Hover Border Color','kendall'),
						'param_name'  => 'button_hover_border_color',
						'value'       => '',
						'save_always' => true,
						'group'       => esc_html__( 'Design Options','kendall'),
						'dependency'  => array( 'element' => 'button_link', 'not_empty' => true )
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__( 'Icon Color','kendall'),
						'param_name'  => 'icon_color',
						'value'       => '',
						'save_always' => true,
						'dependency'  => array( 'element' => 'icon_pack', 'not_empty' => true ),
						'group'       => esc_html__( 'Design Options','kendall')
					)
				)
			)
		) );
	}

	public function render( $atts, $content = null ) {
		$defaultAtts = array(
			'layout'                    => 'detailed',
			'background_color'          => '',
			'background_image'          => '',
			'interactivity'             => '',
			'title'                     => '',
			'title_link'                => '',
			'button_link'               => '',
			'button_text'               => '',
			'button_target'             => '',
			'button_type'               => '',
			'button_hover_bg_color'     => '',
			'button_hover_color'        => '',
			'button_hover_border_color' => '',
			'text'                      => '',
			'icon_color'                => '',
			'skin'                      => ''
		);

		$defaultAtts = array_merge( $defaultAtts, kendall_elated_icon_collections()->getShortcodeParams() );
		$params      = shortcode_atts( $defaultAtts, $atts );

		$params['holder_styles']  = $this->getHolderStyles( $params );
		$params['button_params']  = $this->getButtonParams( $params );
		$params['holder_classes'] = $this->getHolderClasses( $params );

		$iconPackName          = kendall_elated_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
		$params['icon']        = $iconPackName ? $params[ $iconPackName ] : '';
		$params['show_icon']   = $params['icon'] !== '';
		$params['icon_styles'] = $this->getIconStyles( $params );

		return kendall_elated_get_shortcode_module_template_part( 'templates/info-box-template', 'info-box', $params['layout'], $params );
	}

	private function getHolderStyles( $params ) {
		$styles = array();

		if ( $params['background_color'] !== '' ) {
			$styles[] = 'background-color: ' . $params['background_color'];
		} elseif ( $params['background_image'] ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['background_image'] ) . ')';
		}

		return $styles;
	}

	private function getButtonParams( $params ) {
		$btnParams = array();

		if ( isset( $params['button_link'] )  && $params['button_link'] !== '') {
			$btnParams['link'] = $params['button_link'];
		}

		if ( isset( $params['button_text'] ) && $params['button_text'] !== '' ) {
			$btnParams['text'] = $params['button_text'];
		}

		if ( isset( $params['button_target'] ) && $params['button_target'] !== '') {
			$btnParams['button_target'] = $params['button_target'];
		}

		if ( isset( $params['button_type'] ) && $params['button_type'] !== '' ) {
			$btnParams['type'] = $params['button_type'];
		}

		if ( isset( $params['button_hover_bg_color'] )  && $params['button_hover_bg_color'] !== '') {
			$btnParams['hover_background_color'] = $params['button_hover_bg_color'];
		}

		if ( isset( $params['button_hover_color'] ) && $params['button_hover_color'] !== '') {
			$btnParams['hover_color'] = $params['button_hover_color'];
		}

		if ( isset( $params['button_hover_border_color'] ) && $params['button_hover_border_color']  !== '') {
			$btnParams['hover_border_color'] = $params['button_hover_border_color'];
		}

		return $btnParams;
	}

	private function getHolderClasses( $params ) {
		$classes   = array( 'eltd-info-box-holder' );
		$classes[] = 'eltd-' . $params['layout'];

		if ( $params['interactivity'] !== 'no' ) {
			$classes[] = 'eltd-interactive';
		}

		if ( $params['skin'] !== '' ) {
			$classes[] = 'eltd-' . $params['skin'];
		}

		if ( ! empty( $params['background_image'] ) && empty( $params['background_color'] ) ) {
			$classes[] = 'eltd-info-box-with-image';
		}

		return $classes;
	}

	private function getIconStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['show_icon'] ) && $params['show_icon'] ) {
			if ( ! empty( $params['icon_color'] ) ) {
				$styles[] = 'color: ' . $params['icon_color'];
			}
		}

		return implode( ', ', $styles );
	}

}