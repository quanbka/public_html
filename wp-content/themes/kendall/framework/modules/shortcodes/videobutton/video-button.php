<?php
namespace KendallElated\Modules\Shortcodes\VideoButton;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

/**
 * Class VideoButton
 */
class VideoButton implements ShortcodeInterface {

	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_video_button';

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
			'name'                      => esc_html__( 'Elated Video Button', 'kendall' ),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__( 'by ELATED','kendall' ),
			'icon'                      => 'icon-wpb-video-button extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					"type"       => "textfield",
					"heading"    => esc_html__( "Video Link",'kendall' ),
					"param_name" => "video_link",
					"value"      => ""
				),
				array(
					"type"       => "textfield",
					"heading"    => esc_html__( "Play Button Size (px)",'kendall' ),
					"param_name" => "button_size",
					"value"      => "",
					"dependency" => array( 'element' => 'video_link', 'not_empty' => true ),
				),
				array(
					"type"       => "colorpicker",
					"heading"    => esc_html__( "Play Button Color",'kendall' ),
					"param_name" => "button_color",
					"value"      => ""
				),
				array(
					"type"       => "colorpicker",
					"heading"    =>esc_html__(  "Play Button Hover Color",'kendall' ),
					"param_name" => "button_hover_color",
					"value"      => ""
				),
				array(
					"type"       => "textfield",
					"heading"    => esc_html__( "Title",'kendall' ),
					"param_name" => "title",
					"value"      => "",
				),
				array(
					"type"       => "dropdown",
					"heading"    =>esc_html__(  "Title Tag",'kendall' ),
					"param_name" => "title_tag",
					"value"      => array(
						""   => "",
						"h2" => "h2",
						"h3" => "h3",
						"h4" => "h4",
						"h5" => "h5",
						"h6" => "h6",
					),
					"dependency" => array( 'element' => 'title', 'not_empty' => true ),
				),
			)
		) );

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 *
	 * @return string
	 */
	public function render( $atts, $content = null ) {

		$args = array(
			'video_link'         => '#',
			'button_size'        => '',
			'title'              => '',
			'title_tag'          => 'h6',
			'button_color'       => '',
			'button_hover_color' => ''

		);

		$params = shortcode_atts( $args, $atts );

		$params['button_style']    = $this->getButtonStyle( $params );
		$params['video_title_tag'] = $this->getVideoButtonTitleTag( $params, $args );
		$params['button_data']     = $this->getButtonDataAttr( $params );

		//Get HTML from template
		$html = kendall_elated_get_shortcode_module_template_part( 'templates/video-button-template', 'videobutton', '', $params );

		return $html;

	}

	/**
	 * Return Style for Button
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getButtonStyle( $params ) {
		$button_style = array();

		if ( $params['button_size'] !== '' ) {
			$button_size    = strstr( $params['button_size'], 'px' ) ? $params['button_size'] : $params['button_size'] . 'px';
			$button_style[] = 'width: ' . $button_size;
			$button_style[] = 'height: ' . $button_size;
			$button_style[] = 'font-size: ' . intval( $button_size ) * 0.8 . 'px';
		}

		if ( $params['button_color'] !== '' ) {
			$button_style[] = 'color: ' . $params['button_color'];
			$button_style[] = 'border-color: ' . $params['button_color'];
		}

		return implode( ';', $button_style );
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

		if ( $params['button_hover_color'] !== '' ) {
			$data['data-hover-color'] = $params['button_hover_color'];
		}

		return $data;
	}

	/**
	 * Return Title Tag. If provided heading isn't valid get the default one
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getVideoButtonTitleTag( $params, $args ) {
		$headings_array = array( 'h2', 'h3', 'h4', 'h5', 'h6' );

		return ( in_array( $params['title_tag'], $headings_array ) ) ? $params['title_tag'] : $args['title_tag'];
	}
}