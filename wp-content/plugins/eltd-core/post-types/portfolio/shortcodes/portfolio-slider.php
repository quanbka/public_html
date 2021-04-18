<?php
namespace ElatedCore\CPT\Portfolio\Shortcodes;

use ElatedCore\Lib;

/**
 * Class PortfolioSlider
 * @package ElatedCore\CPT\Portfolio\Shortcodes
 */
class PortfolioSlider implements Lib\ShortcodeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'eltd_portfolio_slider';

        add_action('vc_before_init', array($this, 'vcMap'));

	    //Filters For autocomplete param:
	    //For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
	    add_filter( 'vc_autocomplete_eltd_portfolio_slider_selected_projects_callback', array( &$this, 'portfolioIdAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    add_filter( 'vc_autocomplete_eltd_portfolio_slider_selected_projects_render', array( &$this, 'portfolioIdAutocompleteRender', ), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

	    //Portfolio category filter
	    add_filter( 'vc_autocomplete_eltd_portfolio_slider_category_callback', array( &$this, 'portfolioCategoryAutocompleteSuggester', ), 10, 1 ); // Get suggestion(find). Must return an array

	    //Portfolio category render
	    add_filter( 'vc_autocomplete_eltd_portfolio_slider_category_render', array( &$this, 'portfolioCategoryAutocompleteRender', ), 10, 1 ); // Get suggestion(find). Must return an array
    }

    /**
     * Returns base for shortcode
     * @return string
     */
    public function getBase() {
        return $this->base;
    }


    /**
     * Maps shortcode to Visual Composer
     *
     * @see vc_map()
     */
    public function vcMap() {
        if(function_exists('vc_map')) {
            vc_map( array(
                'name' => esc_html__('Portfolio Slider','eltd_core'),
                'base' => $this->base,
                'category' => esc_html__('by ELATED','eltd_core'),
                'icon' => 'icon-wpb-portfolio-slider extended-custom-icon',
                'allowed_container_element' => 'vc_row',
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__('Portfolio Slider Template','eltd_core'),
                        'param_name' => 'type',
                        'value' => array(
                            esc_html__( 'Gallery','eltd_core') => 'gallery',
                            esc_html__('Standard','eltd_core') => 'standard'
                        ),
						'save_always' => true,
						'admin_label' => true,
                        'description' => '',
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Hover Type','eltd_core'),
                        'param_name' => 'hover_type',
                        'value' => array(
                                esc_html__( 'Centered','eltd_core')	=> 'centered',
                                esc_html__( 'Overlay','eltd_core')    => 'overlay',
                        ),
                        'admin_label' => true,
                        'description' => '',
                    ),
                    array(
                        'type' => 'dropdown',
                        'admin_label' => true,
                        'heading' => esc_html__('Image size','eltd_core'),
                        'param_name' => 'image_size',
                        'value' => array(
                            esc_html__( 'Default','eltd_core') => '',
                            esc_html__( 'Original Size','eltd_core') => 'full',
                            esc_html__(  'Square','eltd_core') => 'square',
                            esc_html__(  'Landscape','eltd_core') => 'landscape',
                            esc_html__(  'Portrait','eltd_core') => 'portrait'
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        
                        'heading' =>esc_html__( 'Order By','eltd_core'),
                        'param_name' => 'order_by',
                        'value' => array(
                            '' => '',
                            esc_html__('Menu Order','eltd_core') => 'menu_order',
                            esc_html__( 'Title','eltd_core') => 'title',
                            esc_html__( 'Date','eltd_core') => 'date'
                        ),
						'admin_label' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',                        
                        'heading' => esc_html__('Order','eltd_core'),
                        'param_name' => 'order',
                        'value' => array(
                            '' => '',
                            esc_html__('ASC','eltd_core') => 'ASC',
                            esc_html__('DESC','eltd_core') => 'DESC',
                        ),
						'admin_label' => true,
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',                        
                        'heading' => esc_html__('Number','eltd_core'),
                        'param_name' => 'number',
                        'value' => '-1',
						'admin_label' => true,
                        'description' => esc_html__('Number of portolios on page (-1 is all)','eltd_core')
                    ),
                    array(
                        'type' => 'dropdown',                        
                        'heading' => esc_html__('Number of Portfolios Shown','eltd_core'),
                        'param_name' => 'portfolios_shown',
						'admin_label' => true,
                        'value' => array(
                            '3' => '3',
                            '4' => '4',
                            '5' => '5',
                            '6' => '6'
                        ),
                        'description' => esc_html__('Number of portfolios that are showing at the same time in full width (on smaller screens is responsive so there will be less items shown)','eltd_core'),
                    ),
                    array(
                        'type' => 'autocomplete',
                        'heading' => esc_html__('Category','eltd_core'),
                        'param_name' => 'category',
						'admin_label' => true,
                        'description' => esc_html__('Category Slug (leave empty for all)','eltd_core')
                    ),
	                array(
		                'type'        => 'autocomplete',
		                'heading'     => esc_html__('Show Only Projects with Listed IDs','eltd_core'),
		                'param_name'  => 'selected_projects',
		                'settings' => array(
			                'multiple' => true,
			                'sortable' => true,
			                'unique_values' => true,
			                // In UI show results except selected. NB! You should manually check values in backend
		                ),
		                'description' => esc_html__('Input portfolio ID or portfolio title to see suggestions','eltd_core'),
		                'save_always' => true
	                ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Title Tag','eltd_core'),
                        'param_name' => 'title_tag',
                        'value' => array(
                            ''   => '',
                            'h2' => 'h2',
                            'h3' => 'h3',
                            'h4' => 'h4',
                            'h5' => 'h5',
                            'h6' => 'h6',
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' =>esc_html__( 'Navigation','eltd_core'),
                        'param_name' => 'navigation',
                        'value' => array(
                                esc_html__( 'No','eltd_core')   => 'no',
                                esc_html__( 'Yes','eltd_core') => 'yes',
                        ),
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'class' => '',
                        'heading' => esc_html__('Pagination','eltd_core'),
                        'param_name' => 'pagination',
                        'value' => array(
                                esc_html__('No','eltd_core')   => 'no',
                                esc_html__( 'Yes','eltd_core') => 'yes',
                        ),
                        'description' => ''
                    )
                )
            ) );
        }
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
            'type' => 'standard',
			'hover_type' => 'centered',
            'image_size' => 'full',
            'order_by' => 'date',
            'order' => 'ASC',
            'number' => '-1',
            'category' => '',
            'selected_projects' => '',
            'title_tag' => 'h4',
			'portfolios_shown' => '3',
			'portfolio_slider' => 'yes',
            'navigation' => 'yes',
            'pagination' => 'no'
        );

        $args = array_merge($args, kendall_elated_icon_collections()->getShortcodeParams());
		$params = shortcode_atts($args, $atts);
		
		extract($params);
		
		$html ='';
		$html .= kendall_elated_execute_shortcode('eltd_portfolio_list', $params);
        return $html;
    }

	/**
	 * Filter portfolios by ID or Title
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioIdAutocompleteSuggester( $query ) {
		global $wpdb;
		$portfolio_id = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts} 
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data = array();
				$data['value'] = $value['id'];
				$data['label'] = __( 'Id', 'js_composer' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'js_composer' ) . ': ' . $value['title'] : '' );
				$results[] = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio by id
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioIdAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio
			$portfolio = get_post( (int) $query );
			if ( ! is_wp_error( $portfolio ) ) {

				$portfolio_id = $portfolio->ID;
				$portfolio_title = $portfolio->post_title;

				$portfolio_title_display = '';
				if ( ! empty( $portfolio_title ) ) {
					$portfolio_title_display = ' - ' . esc_html__( 'Title', 'eltd_core' ) . ': ' . $portfolio_title;
				}

				$portfolio_id_display = esc_html__( 'Id', 'eltd_core' ) . ': ' . $portfolio_id;

				$data          = array();
				$data['value'] = $portfolio_id;
				$data['label'] = $portfolio_id_display . $portfolio_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}

	/**
	 * Filter portfolio categories
	 *
	 * @param $query
	 *
	 * @return array
	 */
	public function portfolioCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'portfolio-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['portfolio_category_title'] ) > 0 ) ? esc_html__( 'Category', 'eltd_core' ) . ': ' . $value['portfolio_category_title'] : '' );
				$results[]     = $data;
			}
		}

		return $results;

	}

	/**
	 * Find portfolio by slug
	 * @since 4.4
	 *
	 * @param $query
	 *
	 * @return bool|array
	 */
	public function portfolioCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$portfolio_category = get_term_by( 'slug', $query, 'portfolio-category' );
			if ( is_object( $portfolio_category ) ) {

				$portfolio_category_slug = $portfolio_category->slug;
				$portfolio_category_title = $portfolio_category->name;

				$portfolio_category_title_display = '';
				if ( ! empty( $portfolio_category_title ) ) {
					$portfolio_category_title_display = esc_html__( 'Category', 'eltd_core' ) . ': ' . $portfolio_category_title;
				}

				$data          = array();
				$data['value'] = $portfolio_category_slug;
				$data['label'] = $portfolio_category_title_display;

				return ! empty( $data ) ? $data : false;
			}

			return false;
		}

		return false;
	}
	
	
}