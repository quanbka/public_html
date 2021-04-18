<?php

namespace KendallElated\Modules\Shortcodes\BlogList;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogList
 */
class BlogList implements ShortcodeInterface {
	/**
	* @var string
	*/
	private $base;
	
	function __construct() {
		$this->base = 'eltd_blog_list';
		
		add_action('vc_before_init', array($this,'vcMap'));

		//Category filter
		add_filter( 'vc_autocomplete_eltd_blog_list_category_callback', array( &$this, 'blogListCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Category render
		add_filter( 'vc_autocomplete_eltd_blog_list_category_render', array( &$this, 'blogListCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array

	}
	
	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Elated Blog List', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-list extended-custom-icon',
			'category' => esc_html__('by ELATED','kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Type', 'kendall'),
						'param_name' => 'type',
						'value' => array(
							esc_html__('Standard','kendall') => 'standard',
							esc_html__('Masonry','kendall') => 'masonry',
							esc_html__('Simple','kendall') => 'simple',
							esc_html__('Author on Top','kendall') => 'author_on_top',
							esc_html__('With Bottom Border','kendall') => 'border_bottom',
							esc_html__('Minimal','kendall')   => 'minimal'
						),
						'description' => '',
                        'save_always' => true
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Number of Posts','kendall'),
						'param_name' => 'number_of_posts',
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Number of Columns','kendall'),
						'param_name' => 'number_of_columns',
						'value' => array(
							esc_html__('One','kendall') => '1',
							esc_html__('Two','kendall') => '2',
							esc_html__('Three','kendall') => '3',
							esc_html__('Four','kendall') => '4'
						),
						'description' => '',
						'dependency' => array(
							'element' => 'type',
							'value' => array('standard', 'masonry', 'simple', 'author_on_top','border_bottom')
						),
                        'save_always' => true
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Order By','kendall'),
						'param_name' => 'order_by',
						'value' => array(
							esc_html__('Title','kendall') => 'title',
							esc_html__('Date','kendall') => 'date'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Order','kendall'),
						'param_name' => 'order',
						'value' => array(
								esc_html__('ASC','kendall') => 'ASC',
								esc_html__('DESC','kendall') => 'DESC'
						),
						'save_always' => true,
						'description' => ''
					),
					array(
						'type' => 'autocomplete',
						'heading' =>esc_html__( 'Category Slug','kendall'),
						'param_name' => 'category',
						'description' => esc_html__('Leave empty for all or use comma for list','kendall'),
						'admin_label' => true
					),
					array(
						'type' => 'dropdown',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Image Size','kendall'),
						'param_name' => 'image_size',
						'value' => array(
								esc_html__('Original','kendall') => 'original',
								esc_html__('Landscape','kendall') => 'landscape',
								esc_html__('Square','kendall') => 'square'
						),
						'description' => '',
						'dependency' => Array('element' => 'type', 'value' => array('boxes')),
                        'save_always' => true
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Title font size','kendall'),
						'param_name' => 'title_font_size'
					),
					array(
						'type' => 'textfield',
						'holder' => 'div',
						'class' => '',
						'heading' => esc_html__('Text length','kendall'),
						'param_name' => 'text_length',
						'description' => esc_html__('Number of characters','kendall')
					)
				)
		) );

	}
	public function render($atts, $content = null) {
		
		$default_atts = array(
			'type' => 'boxes',
            'number_of_posts' => '',
            'number_of_columns' => 3,
            'image_size' => 'original',
            'order_by' => '',
            'order' => '',
            'category' => '',
            'title_font_size' => '',
			'text_length' => '90'			
        );
		
		$params = shortcode_atts($default_atts, $atts);
		extract($params);
		$params['holder_classes'] = $this->getBlogHolderClasses($params);
	
		$queryArray = $this->generateBlogQueryArray($params);
		$query_result = new \WP_Query($queryArray);
		$params['query_result'] = $query_result;	
     
		
        $thumbImageSize = $this->generateImageSize($params);
		$params['thumb_image_size'] = $thumbImageSize;

		$params['title_style'] = $this->generateTitleStyle($params);

		$html ='';
        $html .= kendall_elated_get_shortcode_module_template_part('templates/blog-list-holder', 'blog-list', '', $params);
		return $html;
		
	}

	private function generateTitleStyle($params){

		$title_styles = array();
		$title_styles[] = ($params['title_font_size'] !== '') ? 'font-size: ' . kendall_elated_filter_px($params['title_font_size']) . 'px' : '';

		return $title_styles;

	}

	/**
	   * Generates holder classes
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getBlogHolderClasses($params){
		$holderClasses = '';

		$columns_number = $this->getColumnNumberClass($params);

		if(!empty($params['type'])){
			switch($params['type']){
				case 'author_on_top':
					$holderClasses = 'eltd-blog-author-top';
				break;
				case 'border_bottom' :
					$holderClasses = 'eltd-blog-border-bottom';
				break;	
				case 'masonry' : 
					$holderClasses = 'eltd-masonry';
				break;
				case 'simple' :
					$holderClasses = 'eltd-blog-simple';
				break;
				case 'minimal' :
					$holderClasses = 'eltd-blog-minimal';
				break;
				default: 
					$holderClasses = 'eltd-blog-standard';
			}
		}
		
		$holderClasses .= ' '.$columns_number;
		
		return $holderClasses;
		
	}

	/** 
	   * Generates column classes for boxes type
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function getColumnNumberClass($params){
		
		$columns_number = '';
		$columns = $params['number_of_columns'];
		if($params['type'] !== 'minimal'){
			switch ($columns) {
				case 1:
					$columns_number = 'eltd-one-column';
					break;
				case 2:
					$columns_number = 'eltd-two-columns';
					break;
				case 3:
					$columns_number = 'eltd-three-columns';
					break;
				case 4:
					$columns_number = 'eltd-four-columns';
					break;
				default:
					$columns_number = 'eltd-one-column';
					break;
			}
		}


		return $columns_number;
	}

	/**
	   * Generates query array
	   *
	   * @param $params
	   *
	   * @return array
	*/
	public function generateBlogQueryArray($params){
		
		$queryArray = array(
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);
		return $queryArray;
	}

	/**
	   * Generates image size option
	   *
	   * @param $params
	   *
	   * @return string
	*/
	private function generateImageSize($params){
		$thumbImageSize = '';
		$imageSize = $params['image_size'];
		
		if ($imageSize !== '' && $imageSize == 'landscape') {
            $thumbImageSize .= 'kendall_elated_landscape';
        } else if($imageSize === 'square'){
			$thumbImageSize .= 'kendall_elated_square';
		} else if ($imageSize !== '' && $imageSize == 'original') {
            $thumbImageSize .= 'full';
        }
		return $thumbImageSize;
	}

	/**
	 * Filter categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function blogListCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'kendall' ) . ': ' . $value['category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find categories by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function blogListCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get category
			$category = get_term_by( 'slug', $query, 'category' );
			if ( is_object( $category ) ) {

				$category_slug = $category->slug;
				$category_title = $category->name;

				$category_title_display = '';
				if ( ! empty( $category_title ) ) {
					$category_title_display = esc_html__( 'Category', 'kendall' ) . ': ' . $category_title;
				}

				$data          = array();
				$data['value'] = $category_slug;
				$data['label'] = $category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
	
}
