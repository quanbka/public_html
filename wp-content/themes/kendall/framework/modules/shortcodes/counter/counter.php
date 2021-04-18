<?php
namespace KendallElated\Modules\Shortcodes\Counter;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class Counter
 */
class Counter implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_counter';

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

		vc_map( array(
			'name'                      => esc_html__( 'Elated Counter', 'kendall' ),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by ELATED','kendall' ),
			'admin_enqueue_css'         => array( kendall_elated_get_skin_uri() . '/assets/css/eltd-vc-extend.css' ),
			'icon'                      => 'icon-wpb-counter extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array_merge(
				array(
					array(
						'type'        => 'dropdown',
						'admin_label' => true,
						'heading'     => esc_html__('Type','kendall' ),
						'param_name'  => 'type',
						'value'       => array(
							esc_html__('Zero Counter','kendall' )   => 'zero',
							esc_html__('Random Counter','kendall' ) => 'random'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Position','kendall' ),
						'param_name'  => 'position',
						'value'       => array(
							esc_html__('Left','kendall' )   => 'left',
							esc_html__('Right','kendall' )  => 'right',
							esc_html__('Center','kendall' ) => 'center'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('With Icon','kendall' ),
						'param_name'  => 'with_icon',
						'value'       => array(
								esc_html__('Yes','kendall' ) => 'yes',
								esc_html__('No','kendall' )  => 'no'
						),
						'save_always' => true,
						'admin_label' => true
					)
				),
				kendall_elated_icon_collections()->getVCParamsArray( array(
					'element' => 'with_icon',
					'value'   => array( 'yes' )
				) ),
				array(
					array(
						'type'       => 'attach_image',
						'heading'    => esc_html__( 'Custom Icon', 'kendall' ),
						'param_name' => 'custom_icon',
						'dependency'  => array( 'element' => 'with_icon', 'value' => array( 'yes' ) ),
					),
					array(
						'type'        => 'textfield',
						'admin_label' => true,
						'heading'     => esc_html__('Digit','kendall' ),
						'param_name'  => 'digit',
						'description' => ''
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Title','kendall' ),
						'param_name'  => 'title',
						'admin_label' => true,
						'description' => ''
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Text','kendall' ),
						'param_name'  => 'text',
						'admin_label' => true,
						'description' => ''
					),
					array(
						'type'        => 'textfield',
						'heading'     => esc_html__('Padding Bottom(px)','kendall' ),
						'param_name'  => 'padding_bottom',
						'admin_label' => true,
						'description' => '',
						'group'       => esc_html__('Design Options','kendall' ),
					),
					array(
						'type'        => 'textfield',
						'heading'     =>esc_html__( 'Digit Font Size (px)','kendall' ),
						'param_name'  => 'font_size',
						'description' => '',
						'group'       =>esc_html__( 'Design Options','kendall' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>esc_html__( 'Counter Color','kendall' ),
						'param_name'  => 'counter_color',
						'admin_label' => true,
						'description' => '',
						'group'       => esc_html__('Design Options','kendall' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Title Color','kendall' ),
						'param_name'  => 'title_color',
						'admin_label' => true,
						'description' => '',
						'group'       =>esc_html__( 'Design Options','kendall' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     => esc_html__('Icon Color','kendall' ),
						'param_name'  => 'icon_color',
						'admin_label' => true,
						'description' => '',
						'group'       => esc_html__('Design Options','kendall' ),
					),
					array(
						'type'        => 'colorpicker',
						'heading'     =>esc_html__( 'Text Color','kendall' ),
						'param_name'  => 'text_color',
						'description' => '',
						'admin_label' => true,
						'group'       =>esc_html__( 'Design Options','kendall' ),
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
			'type'            => '',
			'position'        => '',
			'digit'           => '',
			'underline_digit' => '',
			'title'           => '',
			'font_size'       => '',
			'text'            => '',
			'padding_bottom'  => '',
			'with_icon'       => 'no',
			'counter_color'   => '',
			'title_color'     => '',
			'icon_color'      => '',
			'text_color'      => '',
			'custom_icon'		=>''

		);

		$args   = array_merge( $args, kendall_elated_icon_collections()->getShortcodeParams() );
		$params = shortcode_atts( $args, $atts );

		$params['counter_holder_styles'] = $this->getCounterHolderStyle( $params );
		$params['counter_styles']        = $this->getCounterStyle( $params );
		$params['icon']                  = $this->getCounterIcon( $params );
		$params['icon_style']            = $this->getCounterIconStyle( $params );
		$params['title_style']           = $this->getCounterTitleStyle( $params );
		$params['text_style']            = $this->getCounterTextStyle( $params );

		//Get HTML from template
		$html = kendall_elated_get_shortcode_module_template_part( 'templates/counter-template', 'counter', '', $params );

		return $html;

	}

	/**
	 * Return Counter holder styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCounterHolderStyle( $params ) {
		$counterHolderStyle = array();

		if ( $params['padding_bottom'] !== '' ) {

			$counterHolderStyle[] = 'padding-bottom: ' . $params['padding_bottom'] . 'px';

		}

		return implode( ';', $counterHolderStyle );
	}

	/**
	 * Return Counter styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getCounterStyle( $params ) {
		$counterStyle = array();

		if ( $params['font_size'] !== '' ) {
			$counterStyle[] = 'font-size: ' . $params['font_size'] . 'px';
		}
		if ( $params['counter_color'] !== '' ) {
			$counterStyle[] = 'color: ' . $params['counter_color'];
		}

		return implode( ';', $counterStyle );
	}

	/**
	 * Return Counter Icon
	 *
	 * @param $params
	 *
	 * @return mixed
	 */
	private function getCounterIcon( $params ) {

		$icon = kendall_elated_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );

		if ( $params['with_icon'] == 'yes' ) {
			return kendall_elated_icon_collections()->renderIcon( $params[ $icon ], $params['icon_pack'] );
		}
	}

	private function getCounterIconStyle( $params ) {

		$counterIconStyle = array();

		if ( $params['icon_color'] !== '' ) {
			$counterIconStyle[] = 'color: ' . $params['icon_color'];
		}

		return implode( ';', $counterIconStyle );
	}

	private function getCounterTitleStyle( $params ) {
		$counterTitleStyle = array();

		if ( $params['title_color'] !== '' ) {
			$counterTitleStyle[] = 'color: ' . $params['title_color'];
		}

		return implode( ';', $counterTitleStyle );
	}

	private function getCounterTextStyle( $params ) {
		$counterTextStyle = array();

		if ( $params['text_color'] !== '' ) {
			$counterTextStyle[] = 'color: ' . $params['text_color'];
		}

		return implode( ';', $counterTextStyle );
	}

}