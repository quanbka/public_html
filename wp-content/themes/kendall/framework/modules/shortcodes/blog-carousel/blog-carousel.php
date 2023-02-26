<?php

namespace KendallElated\Modules\Shortcodes\BlogCarousel;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;
/**
 * Class BlogCarousel
 */
class BlogCarousel implements ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	function __construct() {
		$this->base = 'eltd_blog_carousel';

		add_action('vc_before_init', array($this,'vcMap'));

		//Category filter
		add_filter( 'vc_autocomplete_eltd_blog_carousel_category_callback', array( &$this, 'blogListCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

		//Category render
		add_filter( 'vc_autocomplete_eltd_blog_carousel_category_render', array( &$this, 'blogListCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
	}

	public function getBase() {
		return $this->base;
	}
	public function vcMap() {

		vc_map( array(
			'name' => esc_html__('Elated Blog Carousel', 'kendall'),
			'base' => $this->base,
			'icon' => 'icon-wpb-blog-carousel extended-custom-icon',
			'category' => esc_html__('by ELATED','kendall'),
			'allowed_container_element' => 'vc_row',
			'params' => array(
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' =>esc_html__( 'Number of Posts','kendall'),
					'param_name' => 'number_of_posts',
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' =>esc_html__( 'Number of Columns','kendall'),
					'param_name' => 'number_of_columns',
					'value' => array(
							esc_html__('Two','kendall') => '2',
							esc_html__('Three','kendall') => '3',
							esc_html__('Four','kendall') => '4'
					),
					'description' => '',
					'save_always' => true
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' =>esc_html__( 'Order By','kendall'),
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
					'heading' =>esc_html__( 'Order','kendall'),
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
					'heading' => esc_html__('Category Slug','kendall'),
					'param_name' => 'category',
					'description' => esc_html__('Leave empty for all or use comma for list','kendall'),
					'admin_label' => true
				),
				array(
					'type' => 'textfield',
					'holder' => 'div',
					'class' => '',
					'heading' => esc_html__('Text length','kendall'),
					'param_name' => 'text_length',
					'description' =>esc_html__( 'Number of characters','kendall')
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' =>esc_html__( 'Border Type','kendall'),
					'param_name' => 'border_type',
					'value' => array(
						esc_html__('Transparent','kendall') => 'transparent',
						esc_html__('Solid','kendall') => 'solid'
					),
					'save_always' => true,
					'description' => ''
				),
				array(
					'type' => 'dropdown',
					'holder' => 'div',
					'class' => '',
					'heading' =>esc_html__( 'Navigation Skin','kendall'),
					'param_name' => 'navigation_skin',
					'value' => array(
						esc_html__('Default','kendall') => 'default',
						esc_html__('Light','kendall') => 'light'
					),
					'save_always' => true,
					'description' => ''
				),
			)
		) );

	}
	public function render($atts, $content = null) {

		$default_atts = array(
			'number_of_posts' => '-1',
			'number_of_columns' => 4,
			'order_by' => '',
			'order' => '',
			'category' => '',
			'text_length' => '90',
			'border_type'=>'',
			'navigation_skin'	=>''
		);

		$params = shortcode_atts($default_atts, $atts);
		extract($params);

		$holder_classes = $this->getColumnNumberClass($params);
		$queryArray = $this->generateBlogQueryArray($params);
		$params['item_classes'] = $this->getBlogCarouselClasses($params);
		$query_result = new \WP_Query($queryArray);

		$html = '<div class="eltd-blog-carousel-holder '.esc_attr($holder_classes).'">';
		$html .= '<div class="eltd-blog-carousel-wrapper">';
		$post_count = 0;

		//if is set number_of_posts, compare with that value, in other cases take all posts
		$max_items = $query_result->found_posts;
		if($number_of_posts !== '' && $number_of_posts !== '-1'){
			$max_items = $number_of_posts;
		}

		if($query_result->have_posts()){
			$html .= '<div class = "eltd-blog-carousel">';

			while($query_result->have_posts()){
				$query_result->the_post();

				$post_count++;

				if($post_count <= $max_items){

					$html .= kendall_elated_get_shortcode_module_template_part('templates/blog-carousel-item', 'blog-carousel', '', $params);

					if( $post_count % $number_of_columns === 0){

						if($post_count < $max_items){
							$html .= '</div>';
							$html .= '<div class = "eltd-blog-carousel">';
						}

					}
				}

			}

			$html .= '</div>';
			wp_reset_postdata();
		}else{
			$html .= '<p>'. esc_html_e( 'Sorry, no posts matched your criteria.', 'kendall' ) .'</p>';
		}
		$html .= '</div>'; //close eltd-blog-carousel-holder
		$html .= '</div>'; //close eltd-blog-carousel
		return $html;

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
			'post_type' => 'post',
			'post_status' => 'publish',
			'orderby' => $params['order_by'],
			'order' => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'category_name' => $params['category']
		);
		return $queryArray;
	}

	/**
	 * Generates column classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getColumnNumberClass($params){

		$classes = '';
		$columns = $params['number_of_columns'];
		switch ($columns) {
			case 2:
				$classes = 'eltd-two-columns';
				break;
			case 3:
				$classes = 'eltd-three-columns';
				break;
			case 4:
				$classes = 'eltd-four-columns';
				break;
		}

		switch($params['navigation_skin']){
			case 'light':
				$classes.= ' eltd-light-navigation-skin';
				break;
			default:
				break;

		}


		return $classes;
	}


	private function getBlogCarouselClasses($params){
		$classes = array();

		switch($params['border_type']){
			case 'solid':
				$classes [] = 'eltd-border-solid';
				break;
			default:
				$classes [] = 'eltd-border-transparent';
				break;
		}

		return implode(' ',$classes);
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
