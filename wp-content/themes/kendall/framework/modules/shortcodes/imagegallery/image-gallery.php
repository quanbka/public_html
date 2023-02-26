<?php
namespace KendallElated\Modules\Shortcodes\ImageGallery;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class ImageGallery implements ShortcodeInterface{

	private $base;

	/**
	 * Image Gallery constructor.
	 */
	public function __construct() {
		$this->base = 'eltd_image_gallery';

		add_action('vc_before_init', array($this, 'vcMap'));
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

		vc_map(array(
			'name'                      => esc_html__('Elated Image Gallery', 'kendall'),
			'base'                      => $this->getBase(),
			'category'                  => esc_html__('by ELATED', 'kendall'),
			'icon'                      => 'icon-wpb-image-gallery extended-custom-icon',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'			=> 'attach_images',
					'heading'		=> esc_html__('Images', 'kendall'),
					'param_name'	=> 'images',
					'description'	=> esc_html__('Select images from media library', 'kendall')
				),
				array(
					'type'			=> 'textfield',
					'heading'		=> esc_html__('Image Size', 'kendall'),
					'param_name'	=> 'image_size',
					'description'	=>esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'kendall')
				),
				array(
					'type'        => 'dropdown',
					'heading'     => esc_html__('Gallery Type', 'kendall'),
					'admin_label' => true,
					'param_name'  => 'type',
					'value'       => array(
						esc_html__('Slider'	, 'kendall')	=> 'slider',
						esc_html__('Carousel'	, 'kendall')	=> 'carousel',
						esc_html__('Image Grid', 'kendall')	=> 'image_grid',
						esc_html__('Carousel Variable Image Size', 'kendall') => 'carousel_var_img_size'
					),
					'description' => esc_html__('Select gallery type', 'kendall'),
					'save_always' => true
				),

				array(
					'type' => 'dropdown',
					'heading' => 'Number of Images Shown',
					'param_name' => 'images_shown_slider',
					'admin_label' => true,
					'value' => array(
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6'
					),
					'save_always' => true,
					'dependency'  => array(
						'element' => 'type',
						'value'   => array(
							'carousel'
						)
					),
					'description' => 'Number of images that are showing at the same time in full width (on smaller screens is responsive so there will be less images shown)',
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide duration', 'kendall'),
					'admin_label'	=> true,
					'param_name'	=> 'autoplay',
					'value'			=> array(
						'3'			=> '3',
						'5'			=> '5',
						'10'		=> '10',
						esc_html__('Disable', 'kendall')	=> 'disable'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider',
							'carousel'
						)
					),
					'description' => esc_html__('Auto rotate slides each X seconds', 'kendall')
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Slide Animation', 'kendall'),
					'admin_label'	=> true,
					'param_name'	=> 'slide_animation',
					'value'			=> array(
						esc_html__('Slide', 'kendall')		=> 'slide',
						esc_html__('Fade', 'kendall')		=> 'fade',
						esc_html__('Fade Up', 'kendall')	=> 'fadeUp',
						esc_html__('Back Slide', 'kendall')=> 'backSlide',
						esc_html__('Go Down', 'kendall')	=> 'goDown'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'slider',
							'carousel'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Column Number', 'kendall'),
					'param_name'	=> 'column_number',
					'value'			=> array(2, 3, 4, 5),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' 	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					),
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__( 'Open PrettyPhoto on click', 'kendall'),
					'param_name'	=> 'pretty_photo',
					'value'			=> array(
						esc_html__('No', 'kendall')		=> 'no',
						esc_html__(	'Yes', 'kendall')		=> 'yes'
					),
					'save_always'	=> true,
				),
				array(
					'type' => 'dropdown',
					'heading' => esc_html__('Grayscale Images', 'kendall'),
					'param_name' => 'grayscale',
					'value' => array(
						esc_html__('No', 'kendall') => 'no',
						esc_html__('Yes', 'kendall') => 'yes'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element'	=> 'type',
						'value'		=> array(
							'image_grid'
						)
					)
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Navigation Arrows', 'kendall'),
					'param_name' 	=> 'navigation',
					'value' 		=> array(
						esc_html__('Yes', 'kendall')		=> 'yes',
						esc_html__('No'	, 'kendall')	=> 'no'
					),
					'dependency' 	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel',
							'carousel_var_img_size'
						)
					),
					'save_always'	=> true
				),
				array(
					'type'			=> 'dropdown',
					'heading'		=> esc_html__('Show Pagination', 'kendall'),
					'param_name' 	=> 'pagination',
					'value' 		=> array(
						esc_html__('Yes', 'kendall') 		=> 'yes',
						esc_html__('No', 'kendall')		=> 'no'
					),
					'save_always'	=> true,
					'dependency'	=> array(
						'element' => 'type',
						'value' => array(
							'slider',
							'carousel',
							'carousel_var_img_size'
						)
					)
				)
			)
		));

	}

	/**
	 * Renders shortcodes HTML
	 *
	 * @param $atts array of shortcode params
	 * @param $content string shortcode content
	 * @return string
	 */
	public function render($atts, $content = null) {

		$args = array(
			'images'			=> '',
			'image_size'		=> 'thumbnail',
			'images_shown_slider' => '',
			'type'				=> 'slider',
			'autoplay'			=> '5000',
			'slide_animation'	=> 'slide',
			'pretty_photo'		=> '',
			'column_number'		=> '',
			'grayscale'			=> '',
			'navigation'		=> 'yes',
			'pagination'		=> 'yes'
		);

		$params = shortcode_atts($args, $atts);
		$params['slider_data'] = $this->getSliderData($params);
		$params['image_size'] = $this->getImageSize($params['image_size']);
		$params['images'] = $this->getGalleryImages($params);
		$params['pretty_photo'] = ($params['pretty_photo'] == 'yes') ? true : false;
		$params['columns'] = 'eltd-gallery-columns-' . $params['column_number'];
		$params['gallery_classes'] = ($params['grayscale'] == 'yes') ? 'eltd-grayscale' : '';

		if ($params['type'] == 'image_grid') {
			$template = 'gallery-grid';
		} elseif($params['type'] == 'carousel'){
			$template = 'gallery-carousel';
		}elseif ($params['type'] == 'slider') {
			$template = 'gallery-slider';
		} elseif($params['type'] == 'carousel_var_img_size'){
			$template = 'gallery-carousel-var-img-size';
		}

		$html = kendall_elated_get_shortcode_module_template_part('templates/' . $template, 'imagegallery', '', $params);

		return $html;

	}

	/**
	 * Return images for gallery
	 *
	 * @param $params
	 * @return array
	 */
	private function getGalleryImages($params) {
		$image_ids = array();
		$images = array();
		$i = 0;

		if ($params['images'] !== '') {
			$image_ids = explode(',', $params['images']);
		}

		foreach ($image_ids as $id) {

			$image['image_id'] = $id;
			$image_original = wp_get_attachment_image_src($id, 'full');
			$image['url'] = $image_original[0];
			$image['title'] = get_the_title($id);

			$images[$i] = $image;
			$i++;
		}

		return $images;

	}

	/**
	 * Return image size or custom image size array
	 *
	 * @param $image_size
	 * @return array
	 */
	private function getImageSize($image_size) {

		$image_size = trim($image_size);
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if(in_array( $image_size, array('thumbnail', 'thumb', 'medium', 'large', 'full'))) {
			return $image_size;
		} elseif(!empty($matches[0])) {
			return array(
					$matches[0][0],
					$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}

	/**
	 * Return all configuration data for slider
	 *
	 * @param $params
	 * @return array
	 */
	private function getSliderData($params) {

		$slider_data = array();

		$slider_data['data-autoplay'] = ($params['autoplay'] !== '') ? $params['autoplay'] : '';
		$slider_data['data-animation'] = ($params['slide_animation'] !== '') ? $params['slide_animation'] : '';
		$slider_data['data-navigation'] = ($params['navigation'] !== '') ? $params['navigation'] : '';
		$slider_data['data-pagination'] = ($params['pagination'] !== '') ? $params['pagination'] : '';

		if(isset($params['images_shown_slider']) && ($params['type'] === 'carousel')){
			$slider_data['data-images-shown'] = ($params['images_shown_slider'] !== '') ? $params['images_shown_slider'] : '';
		}

		return $slider_data;

	}

}