<?php
namespace ElatedCore\CPT\Carousels\Shortcodes;

use ElatedCore\Lib;

/**
 * Class Carousel
 * @package ElatedCore\CPT\Carousels\Shortcodes
 */
class Carousel implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_carousel';

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
			'name'                      => esc_html__('Carousel','eltd_core'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by ELATED','eltd_core'),
			'icon'                      => 'icon-wpb-carousel-slider extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Carousel Slider','eltd_core'),
					'param_name'  => 'carousel',
					'value'       => eltd_core_get_carousel_slider_array_vc(),
					'description' => '',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Carousel Type','eltd_core'),
					'param_name'  => 'carousel_type',
					'value'       => array(
						esc_html__('Standard','eltd_core') => 'standard',
						esc_html__('Variable Image Size','eltd_core') => 'var_image_size'
					),
					'save_always' => true,
					'description' => '',
					'admin_label' => true
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Order By','eltd_core'),
					'param_name'  => 'orderby',
					'value'       => array(
						''      => '',
						esc_html__('Title','eltd_core') => 'title',
						esc_html__('Date','eltd_core')  => 'date'
					),
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Order','eltd_core'),
					'param_name'  => 'order',
					'value'       => array(
						''     => '',
						esc_html__('ASC','eltd_core')  => 'ASC',
						esc_html__('DESC','eltd_core') => 'DESC',
					),
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     =>esc_html__( 'Number of items showing','eltd_core'),
					'param_name'  => 'number_of_items',
					'value'       => array(
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6'
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     =>esc_html__( 'Image Animation','eltd_core'),
					'param_name'  => 'image_animation',
					'value'       => array(
						esc_html__('Image Change','eltd_core') => 'image-change',
						esc_html__('Image Zoom','eltd_core')   => 'image-zoom',
						esc_html__('Underline','eltd_core')	=> 'underline',
					),
					'admin_label' => true,
					'save_always' => true,
					'description' =>esc_html__( 'Note: Only on "Image Change" zoom image will be used. Underline animation can be used only for one row layout.','eltd_core')
				),
				array(
					'type'        => 'colorpicker',
					'heading'     =>esc_html__( 'Carousel Line Color','eltd_core'),
					'param_name'  => 'line_color',
					'admin_label' => true,
					'description' =>esc_html__( 'Line color used in underline animation','eltd_core'),
					'dependency'  => array( 'element' => 'image_animation', 'value'   => 'underline')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Show navigation?','eltd_core'),
					'param_name'  => 'show_navigation',
					'value'       => array(
						esc_html__('Yes','eltd_core') => 'yes',
						esc_html__('No','eltd_core')  => 'no',
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     =>esc_html__( 'Show pagination?','eltd_core'),
					'param_name'  => 'show_pagination',
					'value'       => array(
						esc_html__('Yes','eltd_core') => 'yes',
						esc_html__('No','eltd_core')  => 'no',
					),
					'save_always' => true,
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Show Items In Two Rows?','eltd_core'),
					'param_name'  => 'show_in_two_rows',
					'value'       => array(
						esc_html__('No','eltd_core')  => '',
						esc_html__('Yes','eltd_core') => 'yes',
					),
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Autoplay','eltd_core'),
					'param_name'  => 'autoplay',
					'value'       => array(
						esc_html__('No','eltd_core')  => 'no',
						esc_html__('Yes','eltd_core') => 'yes',
					),
					'admin_label' => true,
					'description' => ''
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Autoplay Duration','eltd_core'),
					'param_name'  => 'autoplay_duration',
					'value'       => '',
					'admin_label' => true,
					'description' => esc_html__('Slide duration (in milliseconds)','eltd_core'),
					'dependency'  => array(
						'element' => 'autoplay',
						'value'   => 'yes'
					)
				),
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
			'carousel'          => '',
			'carousel_type'     => '',
			'orderby'           => 'date',
			'order'             => 'ASC',
			'number_of_items'   => '5',
			'image_animation'   => 'underline',
			'line_color' 			=> '',
			'show_in_two_rows'  => '',
			'show_navigation'   => '',
			'show_pagination'   => '',
			'autoplay'          => '',
			'autoplay_duration' => '4000'
		);

		$params                             = shortcode_atts( $args, $atts );
		$params['carousel_data_attributes'] = $this->getCarouselDataAttributes( $params );

		extract( $params );
		$classes = $this->getCarouselClasses($params);

		$html = '';

		if ( $carousel !== '' ) {

			$html .= '<div class="eltd-carousel-holder clearfix '.$classes.'">';
			$html .= '<div class="eltd-carousel" ' . kendall_elated_get_inline_attrs( $carousel_data_attributes ) . '>';

			$args = array(
				'post_type'          => 'carousels',
				'carousels_category' => $params['carousel'],
				'orderby'            => $params['orderby'],
				'order'              => $params['order'],
				'posts_per_page'     => '-1'
			);

			$query = new \WP_Query( $args );

			if ( $query->have_posts() ) {
				while ( $query->have_posts() ) {
					$query->the_post();

					$carousel_item = $this->getCarouselItemData( get_the_ID(), $params );

					if ( $show_in_two_rows == 'yes' && $query->current_post % 2 == 0 ) {
						$html .= '<div class="eltd-carousel-item-outer-holder">';
					}

					$html .= eltd_core_get_shortcode_module_template_part( 'carousels', 'carousel-template', '', $carousel_item );

					if ( $show_in_two_rows == 'yes' && $query->current_post % 2 !== 0 ) {
						$html .= '</div>';
					}
				}
			}

			wp_reset_postdata();


			$html .= '</div>';
			$html .= '</div>';

		}

		return $html;
	}

	/**
	 * Return carousel css class based on choosen type
	 *
	 * @param $params
	 *
	 * @return string
	 */

	private function getCarouselClasses($params){
		$classes = array();

		if($params['carousel_type']){
			switch ($params['carousel_type']){
				case 'standard':
					$classes[] = 'eltd-carousel-standard-type';
					break;
				case 'var_image_size':
					$classes[] = 'eltd-carousel-var-image-size-type';
					break;
			}
		}

		return implode('',$classes);

 	}

	/**
	 * Return all data that carousel needs, images, titles, links, etc
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getCarouselItemData( $item_id, $params ) {

		$carousel_item = array();

		if ( ( $meta_temp = get_post_meta( $item_id, 'eltd_carousel_image', true ) ) !== '' ) {
			$carousel_item['image'] = $meta_temp;
		} else {
			$carousel_item['image'] = '';
		}

		if ( $params['image_animation'] == 'image-change' && ( $meta_temp = get_post_meta( $item_id, 'eltd_carousel_hover_image', true ) ) !== '' ) {
			$carousel_item['hover_image'] = $meta_temp;
			$carousel_item['hover_class'] = 'eltd-has-hover-image';
		} else {
			$carousel_item['hover_image'] = '';
			$carousel_item['hover_class'] = '';
		}

		if ( ( $meta_temp = get_post_meta( $item_id, 'eltd_carousel_item_link', true ) ) != '' ) {
			$carousel_item['link'] = $meta_temp;
		} else {
			$carousel_item['link'] = '';
		}

		if ( ( $meta_temp = get_post_meta( $item_id, 'eltd_carousel_item_target', true ) ) != '' ) {
			$carousel_item['target'] = $meta_temp;
		} else {
			$carousel_item['target'] = '_self';
		}

		$carousel_item['title'] = get_the_title();

		$carousel_item['animation'] = $params['image_animation'];

		$carousel_item['carousel_line_styles'] = $this->getCarouselLineStyles( $params );

		$carousel_item['carousel_image_classes'] = $this->getCarouselImageClasses( $params );

		return $carousel_item;

	}

	/**
	 * Return CSS classes for carousel image
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getCarouselImageClasses( $params ) {

		$carousel_image_classes = array();
		if ( $params['image_animation'] !== '' ) {
			$carousel_image_classes[] = 'eltd-' . $params['image_animation'];
		}

		return implode( ' ', $carousel_image_classes );

	}

	/**
	 * Return styles for carousel line
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getCarouselLineStyles( $params ) {

		$carousel_line_styles = array();

		if ($params['line_color'] !== '') {
			$carousel_line_styles[] = 'background-color: ' . $params['line_color'];
		}
		
		return implode(';', $carousel_line_styles);

	}

	/**
	 * Return data attributes for carousel
	 *
	 * @param $params
	 *
	 * @return array
	 */
	private function getCarouselDataAttributes( $params ) {

		$carousel_data = array();

		if ( $params['number_of_items'] !== '' ) {
			$carousel_data['data-items'] = $params['number_of_items'];
		}
		if ( $params['show_in_two_rows'] !== '' ) {
			$carousel_data['data-show_in_two_rows'] = 'yes';
		} else {
			$carousel_data['data-show_in_two_rows'] = 'no';
		}
		if ( $params['show_navigation'] !== '' ) {
			$carousel_data['data-navigation'] = $params['show_navigation'];
		}
		if ( $params['show_pagination'] !== '' ) {
			$carousel_data['data-pagination'] = $params['show_pagination'];
		}
		if ( $params['autoplay'] !== '' ) {
			$carousel_data['data-autoplay'] = $params['autoplay'];
		}
		if ( $params['autoplay_duration'] !== '' ) {
			$carousel_data['data-autoplay-duration'] = $params['autoplay_duration'];
		}
		if ( $params['image_animation'] !== '' ) {
			$carousel_data['data-image-animation'] = $params['image_animation'];
		}

		return $carousel_data;

	}

}