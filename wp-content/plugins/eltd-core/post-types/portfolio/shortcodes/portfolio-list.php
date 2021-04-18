<?php
namespace ElatedCore\CPT\Portfolio\Shortcodes;

use ElatedCore\Lib;

/**
 * Class PortfolioList
 * @package ElatedCore\CPT\Portfolio\Shortcodes
 */
class PortfolioList implements Lib\ShortcodeInterface {
	/**
	 * @var string
	 */
	private $base;

	public function __construct() {
		$this->base = 'eltd_portfolio_list';

		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

		//Filters For autocomplete param:
		//For suggestion: vc_autocomplete_[shortcode_name]_[param_name]_callback
		add_filter( 'vc_autocomplete_eltd_portfolio_list_selected_projects_callback', array(
			&$this,
			'portfolioIdAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		add_filter( 'vc_autocomplete_eltd_portfolio_list_selected_projects_render', array(
			&$this,
			'portfolioIdAutocompleteRender',
		), 10, 1 ); // Render exact portfolio. Must return an array (label,value)

		//Portfolio category filter
		add_filter( 'vc_autocomplete_eltd_portfolio_list_category_callback', array(
			&$this,
			'portfolioCategoryAutocompleteSuggester',
		), 10, 1 ); // Get suggestion(find). Must return an array

		//Portfolio category render
		add_filter( 'vc_autocomplete_eltd_portfolio_list_category_render', array(
			&$this,
			'portfolioCategoryAutocompleteRender',
		), 10, 1 ); // Get suggestion(find). Must return an array
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
	 * @see vc_map
	 */
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {

			$icons_array = array();
			if ( eltd_core_theme_installed() ) {
				$icons_array = \KendallElatedIconCollections::get_instance()->getVCParamsArray();
			}

			vc_map( array(
					'name'                      => esc_html__('Portfolio List','eltd_core'),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__('by ELATED','eltd_core'),
					'icon'                      => 'icon-wpb-portfolio extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Portfolio List Template','eltd_core'),
							'param_name'  => 'type',
							'value'       => array(
								esc_html__('Standard with Space','eltd_core')    => 'standard',
								esc_html__('Standard without Space','eltd_core') => 'standard_no_space',
								esc_html__('Gallery with Space','eltd_core')     => 'gallery',
								esc_html__('Gallery without Space','eltd_core')  => 'gallery_no_space',
								esc_html__('Tiled Gallery'  ,'eltd_core')        => 'tiled_gallery',
								esc_html__('Masonry','eltd_core')                => 'masonry',
								esc_html__('Pinterest','eltd_core')              => 'pinterest'
							),
							'admin_label' => true,
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Hover Type','eltd_core'),
							'param_name'  => 'hover_type',
							'value'       => array(
								esc_html__('Centered','eltd_core')     => 'centered',
								esc_html__('Overlay','eltd_core')      => 'overlay',
								esc_html__('Light Shader','eltd_core') => 'light_shader',
								esc_html__('Dark Shader','eltd_core')  => 'dark_shader',
								esc_html__('Slide Up' ,'eltd_core')    => 'slide_up',
							),
							'admin_label' => true,
							'description' => '',
							'dependency'  => array(
								'element' => 'type',
								'value'   => array(
									'gallery',
									'gallery_no_space',
									'masonry',
									'pinterest'
								)
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Appear Effect','eltd_core'),
							'param_name'  => 'appear_effect',
							'value'       => array(
								esc_html__('No effect','eltd_core')  => 'no_effect',
								esc_html__('One by One','eltd_core') => 'one_by_one',
							),
							'admin_label' => true,
							'description' => '',
							'dependency'  => array(
								'element' => 'type',
								'value'   => array(
									'gallery',
									'gallery_no_space',
									'masonry',
									'pinterest'
								)
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Show Excerpt','eltd_core'),
							'param_name'  => 'show_excerpt',
							'value'       => array(
								esc_html__('No','eltd_core')  => 'no',
								esc_html__('Yes','eltd_core') => 'yes'
							),
							'admin_label' => true,
							'description' => '',
							'dependency'  => array(
								'element' => 'type',
								'value'   => array( 'standard', 'standard_no_space' )
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     =>esc_html__( 'Show Excerpt On Hover','eltd_core'),
							'param_name'  => 'show_excerpt_on_hover',
							'value'       => array(
								esc_html__('No','eltd_core')  => 'no',
								esc_html__('Yes','eltd_core') => 'yes'
							),
							'admin_label' => true,
							'description' => '',
							'dependency'  => array(
								'element' => 'hover_type',
								'value'   => array( 'overlay', 'light_shader', 'dark_shader' )
							),
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Spacing Between Items','eltd_core'),
							'param_name'  => 'spacing_type',
							'value'       => array(
									esc_html__('Large Spacing','eltd_core') => 'large_spacing',
									esc_html__('Small Spacing' ,'eltd_core')=> 'small_spacing'
							),
							'admin_label' => true,
							'save_always' => true,
							'admin_label' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'standard', 'gallery' ) ),
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Title Tag','eltd_core'),
							'param_name'  => 'title_tag',
							'value'       => array(
								''   => '',
								'h2' => 'h2',
								'h3' => 'h3',
								'h4' => 'h4',
								'h5' => 'h5',
								'h6' => 'h6',
							),
							'admin_label' => true,
							'description' => ''
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Image Proportions','eltd_core'),
							'param_name'  => 'image_size',
							'value'       => array(
								esc_html__('Original','eltd_core')  => 'full',
								esc_html__('Square','eltd_core')    => 'square',
								esc_html__('Landscape','eltd_core') => 'landscape',
								esc_html__('Portrait','eltd_core')  => 'portrait'
							),
							'save_always' => true,
							'admin_label' => true,
							'description' => '',
							'dependency'  => array(
								'element' => 'type',
								'value'   => array(
									'standard',
									'standard_no_space',
									'gallery',
									'gallery_no_space',
									'tiled_gallery'
								)
							)
						),
						array(
							'type'        => 'textfield',
							'admin_label' => true,
							'heading'     => esc_html__('Row Height (px)','eltd_core'),
							'param_name'  => 'tiled_row_height',
							'value'       => '200',
							'save_always' => true,
							'description' => esc_html__('Targeted row height, which may vary depending on the proportions of the images.','eltd_core'),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'tiled_gallery' ) )
						),
						array(
							'type'        => 'textfield',
							'admin_label' => true,
							'heading'     => esc_html__('Spacing (px)','eltd_core'),
							'param_name'  => 'tiled_spacing',
							'value'       => '10',
							'save_always' => true,
							'description' =>esc_html__( 'Define horizontal and vertical spacing between items','eltd_core'),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'tiled_gallery' ) )
						),
						array(
							'type'        => 'dropdown',
							'admin_label' => true,
							'heading'     =>esc_html__( 'Last Row Behavior','eltd_core'),
							'param_name'  => 'tiled_last_row',
							'value'       => array(
								esc_html__('Align left','eltd_core')      => 'nojustify',
								esc_html__('Align right','eltd_core')     => 'right',
								esc_html__('Align centrally','eltd_core') => 'center',
								esc_html__(	'Justify' ,'eltd_core')        => 'justify',
								esc_html__(	'Hide' ,'eltd_core')           => 'hide'
							),
							'description' => esc_html__('Defines whether to justify the last row, align it in a certain way, or hide it.','eltd_core'),
							'dependency'  => array( 'element' => 'type', 'value' => array( 'tiled_gallery' ) )
						),
						array(
							'type'        => 'textfield',
							'admin_label' => true,
							'heading'     => esc_html__('Justify Threshold (0-1)','eltd_core'),
							'param_name'  => 'titled_threshold',
							'value'       => '0.75',
							'description' => esc_html__('If the last row takes up more than this part of available width, it will be justified despite the defined alignment. Enter 1 to never justify the last row.','eltd_core'),
							'dependency'  => array(
								'element' => 'tiled_last_row',
								'value'   => array( 'nojustify', 'right', 'center' )
							)
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Enable Pagination','eltd_core'),
							'param_name'  => 'enable_pagination',
							'value'       => array(
									esc_html__('Yes','eltd_core') => 'yes',
									esc_html__('No','eltd_core')  => 'no'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Pagination Type','eltd_core'),
							'param_name'  => 'pagination_type',
							'value'       => array(
								esc_html__('Load More' ,'eltd_core')          => 'load_more',
								esc_html__('Standard Pagination' ,'eltd_core')=> 'standard_pagination'
							),
							'save_always' => true,
							'admin_label' => true,
							'dependency'  => array(
								'element' => 'enable_pagination',
								'value'   => 'yes'
							)
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Border Arround Image','eltd_core'),
							'param_name'  => 'enable_image_border',
							'value'       => array(
									esc_html__('No','eltd_core')  => 'no',
									esc_html__('Yes','eltd_core') => 'yes'
							),
							'save_always' => true,
							'admin_label' => true
						),
						array(
							'type'        => 'colorpicker',
							'heading'     =>esc_html__( 'Border Color','eltd_core'),
							'param_name'  => 'border_color',
							'admin_label' => true,
							'description' => '',
							'dependency'  => array(
								'element' => 'enable_image_border',
								'value'   => 'yes'
							)
						),
						array(
							'type'        => 'dropdown',
							'heading'     =>esc_html__( 'Order By','eltd_core'),
							'param_name'  => 'order_by',
							'value'       => array(
								esc_html__(	'Date','eltd_core')       => 'date',
								esc_html__('Menu Order','eltd_core') => 'menu_order',
								esc_html__('Title','eltd_core')      => 'title'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => '',
							'group'       =>esc_html__( 'Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Order','eltd_core'),
							'param_name'  => 'order',
							'value'       => array(
								esc_html__('DESC','eltd_core') => 'DESC',
								esc_html__('ASC','eltd_core')  => 'ASC'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => '',
							'group'       => esc_html__('Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'autocomplete',
							'heading'     =>esc_html__( 'One-Category Portfolio List','eltd_core'),
							'param_name'  => 'category',
							'admin_label' => true,
							'description' =>esc_html__( 'Enter one category slug (leave empty for showing all categories)','eltd_core'),
							'group'       =>esc_html__( 'Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Number of Portfolios Per Page','eltd_core'),
							'param_name'  => 'number',
							'value'       => '-1',
							'admin_label' => true,
							'description' => esc_html__('(enter -1 to show all)','eltd_core'),
							'group'       => esc_html__('Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Number of Columns','eltd_core'),
							'param_name'  => 'columns',
							'value'       => array(
								''      => '',
								esc_html__('One','eltd_core')   => 'one',
								esc_html__('Two','eltd_core')   => 'two',
								esc_html__('Three','eltd_core') => 'three',
								esc_html__(	'Four','eltd_core')  => 'four',
								esc_html__(	'Five' ,'eltd_core') => 'five',
								esc_html__(	'Six' ,'eltd_core')  => 'six'
							),
							'admin_label' => true,
							'description' => esc_html__('Default value is Three','eltd_core'),
							'dependency'  => array(
								'element' => 'type',
								'value'   => array(
									'standard',
									'standard_no_space',
									'gallery',
									'gallery_no_space'
								)
							),
							'group'       => esc_html__('Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Grid Size','eltd_core'),
							'param_name'  => 'grid_size',
							'value'       => array(
									esc_html__('Default' ,'eltd_core')       => '',
									esc_html__(	'3 Columns Grid','eltd_core') => 'three',
									esc_html__(	'4 Columns Grid' ,'eltd_core')=> 'four',
									esc_html__(	'5 Columns Grid','eltd_core') => 'five'
							),
							'admin_label' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'pinterest' ) ),
							'group'       => esc_html__('Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'autocomplete',
							'heading'     => esc_html__('Show Only Projects with Listed IDs','eltd_core'),
							'param_name'  => 'selected_projects',
							'settings'    => array(
								'multiple'      => true,
								'sortable'      => true,
								'unique_values' => true,
								// In UI show results except selected. NB! You should manually check values in backend
							),
							'description' => esc_html__('Input portfolio ID or portfolio title to see suggestions','eltd_core'),
							'group'       => esc_html__('Query and Layout Options','eltd_core'),
							'save_always' => true
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Enable Category Filter','eltd_core'),
							'param_name'  => 'filter',
							'value'       => array(
									esc_html__('No','eltd_core')  => 'no',
									esc_html__('Yes','eltd_core') => 'yes'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' => esc_html__('Default value is No','eltd_core'),
							'group'       =>esc_html__( 'Query and Layout Options','eltd_core')
						),
						array(
							'type'        => 'dropdown',
							'heading'     => esc_html__('Filter Order By','eltd_core'),
							'param_name'  => 'filter_order_by',
							'value'       => array(
									esc_html__('Name','eltd_core')  => 'name',
									esc_html__(	'Count','eltd_core') => 'count',
									esc_html__('Id' ,'eltd_core')   => 'id',
									esc_html__(	'Slug','eltd_core')  => 'slug'
							),
							'admin_label' => true,
							'save_always' => true,
							'description' =>esc_html__( 'Default value is Name','eltd_core'),
							'dependency'  => array( 'element' => 'filter', 'value' => array( 'yes' ) ),
							'group'       => esc_html__('Query and Layout Options','eltd_core')
						)
					)
				)
			);
		}
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
			'type'                  => 'standard',
			'hover_type'            => 'centered',
			'appear_effect'         => 'no_effect',
			'show_excerpt_on_hover' => 'no',
			'show_excerpt'          => 'no',
			'enable_image_border'         => '',
			'border_color'          => '',
			'spacing_type'          => '',
			'columns'               => 'three',
			'grid_size'             => 'three',
			'image_size'            => 'full',
			'tiled_row_height'      => '',
			'tiled_spacing'         => '',
			'tiled_last_row'        => '',
			'tiled_threshold'       => '',
			'order_by'              => 'date',
			'order'                 => 'ASC',
			'number'                => '-1',
			'filter'                => 'no',
			'filter_order_by'       => 'name',
			'category'              => '',
			'selected_projects'     => '',
			'enable_pagination'     => '',
			'pagination_type'       => '',
			'title_tag'             => 'h4',
			'next_page'             => '',
			'portfolio_slider'      => '',
			'next_page'             => '',
			'portfolios_shown'      => '',
			'navigation'            => '',
			'pagination'            => ''
		);

		$params = shortcode_atts( $args, $atts );
		extract( $params );

		$query_array             = $this->getQueryArray( $params );
		$query_results           = new \WP_Query( $query_array );
		$params['query_results'] = $query_results;

		$classes = $this->getPortfolioClasses( $params );

		$data_atts = $this->getDataAtts( $params );
		$data_atts .= 'data-max-num-pages = ' . $query_results->max_num_pages;
		$max_num_pages            = $query_results->max_num_pages;
		$params['masonry_filter'] = '';

		$html = '';
		$html .= '<div class = "eltd-portfolio-list-wrapper clearfix">';
		if ( $filter == 'yes' && ( $type == 'masonry' || $type == 'pinterest' ) ) {
			$params['filter_categories'] = $this->getFilterCategories( $params );
			$params['masonry_filter']    = 'eltd-masonry-filter';
			$html .= eltd_core_get_shortcode_module_template_part( 'portfolio', 'portfolio-filter', '', $params );
		}

		$html .= '<div class = "eltd-portfolio-list-holder-outer ' . $classes . '" ' . $data_atts . '>';

		if ( $filter == 'yes' && ( $type !== 'masonry' && $type !== 'pinterest' ) ) {
			$params['filter_categories'] = $this->getFilterCategories( $params );
			$html .= eltd_core_get_shortcode_module_template_part( 'portfolio', 'portfolio-filter', '', $params );
		}

		$html .= '<div class = "eltd-portfolio-list-holder clearfix" >';
		if ( $type == 'masonry' || $type == 'pinterest' ) {
			$html .= '<div class="eltd-portfolio-list-masonry-grid-sizer"></div>';
			$html .= '<div class="eltd-portfolio-list-masonry-grid-gutter"></div>';
		}

		if ( $query_results->have_posts() ):
			while ( $query_results->have_posts() ) : $query_results->the_post();

				$params['current_id']           = get_the_ID();
				$params['image_style']          = $this->getItemImageStyle( get_the_ID() );
				$params['thumb_size']           = $this->getImageSize( $params );
				$params['like_icon_html']       = $this->getLikeIconHtml( $params );
				$params['category_html']        = $this->getItemCategoriesHtml( $params );
				$params['categories']           = $this->getItemCategories( $params );
				$params['article_masonry_size'] = $this->getMasonrySize( $params );
				$params['item_link']            = $this->getItemLink( $params );
				$params['item_style']           = $this->getItemStyle($params);

				$html .= eltd_core_get_shortcode_module_template_part( 'portfolio', $type, '', $params );

			endwhile;
		else:

			$html .= '<p>' . _e( 'Sorry, no posts matched your criteria.' ) . '</p>';

		endif;
		$html .= '</div>'; //close eltd-portfolio-list-holder

		//print pagination html(load more or standard pagination)
		if ( $enable_pagination === 'yes' ) {

			if ( $pagination_type === 'load_more' ) {
				$html .= eltd_core_get_shortcode_module_template_part( 'portfolio', 'load-more-template', '', $params );
			} elseif ( $pagination_type === 'standard_pagination' ) {
				$html .= eltd_core_porftolio_standard_pagination_html( $max_num_pages );
			}
		}
		wp_reset_postdata();
		$html .= '</div>'; // close eltd-portfolio-list-holder-outer
		$html .= '</div>'; // close eltd-portfolio-list-wrapper
		return $html;
	}

	public function getItemImageStyle( $id ) {

		$background_image     = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
		$featured_image_style = 'background-image: url(' . esc_url( $background_image[0] ) . ')';

		return $featured_image_style;

	}

	/**
	 * Generates portfolio list query attribute array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getQueryArray( $params ) {

		$query_array = array(
			'post_type'      => 'portfolio-item',
			'orderby'        => $params['order_by'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number']
		);

		if ( ! empty( $params['category'] ) ) {
			$query_array['portfolio-category'] = $params['category'];
		}

		$project_ids = null;
		if ( isset ( $params['selected_projects'] ) && $params['selected_projects'] !== '') {
			$project_ids             = explode( ',', $params['selected_projects'] );
			$query_array['post__in'] = $project_ids;
		}

		$paged = '';
		if ( empty( $params['next_page'] ) ) {
			if ( get_query_var( 'paged' ) ) {
				$paged = get_query_var( 'paged' );
			} elseif ( get_query_var( 'page' ) ) {
				$paged = get_query_var( 'page' );
			}
		}

		if ( isset( $params['next_page'] ) && $params['next_page'] !== '') {
			$query_array['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}

		return $query_array;
	}

	/**
	 * Generates portfolio icons html
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getPortfolioIconsHtml( $params ) {

		$html       = '';
		$id         = $params['current_id'];
		$slug_list_ = 'pretty_photo_gallery';

		$featured_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $id ), 'full' ); //original size
		$large_image          = $featured_image_array[0];

		$html .= '<div class="eltd-item-icons-holder">';

		$html .= '<a class="eltd-portfolio-lightbox" title="' . get_the_title( $id ) . '" href="' . $large_image . '" data-rel="prettyPhoto[' . $slug_list_ . ']">';
		$html .= '<span></span>';
		$html .= '</a>';


		if ( function_exists( 'kendall_elated_like_portfolio_list' ) ) {
			$html .= kendall_elated_like_portfolio_list( $id );
		}

		$html .= '<a class="eltd-preview" title="Go to Project" href="' . $this->getItemLink( $params ) . '" data-type="portfolio_list"></a>';

		$html .= '</div>';

		return $html;

	}

	public function getLikeIconHtml( $params ) {
		$html = '';
		$id   = $params['current_id'];

		if ( function_exists( 'kendall_elated_like_portfolio_list' ) ) {
			$html .= '<div class="eltd-ptf-like-holder">';
			$html .= kendall_elated_like_portfolio_list( $id );
			$html .= '</div>';
		}

		return $html;
	}

	/**
	 * Generates portfolio classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getPortfolioClasses( $params ) {
		$classes               = array();
		$type                  = $params['type'];
		$hover_type            = $params['hover_type'];
		$appear_effect         = $params['appear_effect'];
		$show_excerpt_on_hover = $params['show_excerpt_on_hover'];
		$spacing_type          = $params['spacing_type'];
		$columns               = $params['columns'];
		$grid_size             = $params['grid_size'];
		switch ( $type ):
			case 'standard':
				$classes[] = 'eltd-ptf-standard';

				//set class for spacing between items
				if ( $spacing_type === 'small_spacing' ) {
					$classes[] = 'eltd-ptf-small-spacing';
				} else if ( $spacing_type === 'large_spacing' ) {
					$classes[] = 'eltd-ptf-large-spacing';
				}

				break;
			case 'standard_no_space':
				$classes[] = 'eltd-ptf-standard-no-space';
				break;
			case 'gallery':
				$classes[] = 'eltd-ptf-gallery';

				//set class for spacing between items
				if ( $spacing_type === 'small_spacing' ) {
					$classes[] = 'eltd-ptf-small-spacing';
				} else if ( $spacing_type === 'large_spacing' ) {
					$classes[] = 'eltd-ptf-large-spacing';
				}

				break;
			case 'gallery_no_space':
				$classes[] = 'eltd-ptf-gallery-no-space';
				break;

			case 'tiled_gallery':
				$classes[] = 'eltd-ptf-gallery-tiled';
				break;
			case 'masonry':
				$classes[] = 'eltd-ptf-masonry';
				break;
			case 'pinterest':
				$classes[] = 'eltd-ptf-pinterest';
				break;
		endswitch;

		if ( empty( $params['portfolio_slider'] ) ) { // portfolio slider mustn't have this classes

			if ( $type !== 'masonry' && $type !== 'pinterest' ) {
				switch ( $columns ):
					case 'one':
						$classes[] = 'eltd-ptf-one-column';
						break;
					case 'two':
						$classes[] = 'eltd-ptf-two-columns';
						break;
					case 'three':
						$classes[] = 'eltd-ptf-three-columns';
						break;
					case 'four':
						$classes[] = 'eltd-ptf-four-columns';
						break;
					case 'five':
						$classes[] = 'eltd-ptf-five-columns';
						break;
					case 'six':
						$classes[] = 'eltd-ptf-six-columns';
						break;
				endswitch;
			}
			if ( $params['enable_pagination'] === 'yes' ) {
				if ( $params['pagination_type'] === 'load_more' ) {

					$classes[] = 'eltd-ptf-load-more';

				} elseif ( $params['pagination_type'] === 'standard_pagination' ) {

					$classes[] = 'eltd-ptf-standard-pagination';

				}

			}

		}

		if ( $type == "pinterest" ) {
			switch ( $grid_size ):
				case 'three':
					$classes[] = 'eltd-ptf-pinterest-three-columns';
					break;
				case 'four':
					$classes[] = 'eltd-ptf-pinterest-four-columns';
					break;
				case 'five':
					$classes[] = 'eltd-ptf-pinterest-five-columns';
					break;
			endswitch;
		}
		if ( $params['filter'] == 'yes' ) {
			$classes[] = 'eltd-ptf-has-filter';
			if ( $params['type'] == 'masonry' || $params['type'] == 'pinterest' ) {
				if ( $params['filter'] == 'yes' ) {
					$classes[] = 'eltd-ptf-masonry-filter';
				}
			}
		}

		if ( isset( $params['portfolio_slider'] ) && $params['portfolio_slider'] == 'yes' ) {
			$classes[] = 'eltd-portfolio-slider-holder';
		}
		if($params['enable_image_border'] === 'yes'){
			$classes[] = 'eltd-show-border';
		}
		if ( ( $type == "pinterest" ) || ( $type == 'masonry' ) || ( $type == 'gallery' ) || ( $type == 'gallery_no_space' ) ) {
			switch ( $hover_type ):
				case 'overlay':
					$classes[] = 'eltd-ptf-overlay';
					break;
				case 'light_shader':
					$classes[] = 'eltd-ptf-light-shader';
					break;
				case 'dark_shader':
					$classes[] = 'eltd-ptf-dark-shader';
					break;
				case 'slide_up':
					$classes[] = 'eltd-ptf-slide-up';
					break;
				case 'centered':
					$classes[] = 'eltd-ptf-centered';
			endswitch;
		}

		if ( $show_excerpt_on_hover === 'yes' ) {
			$classes[] = 'eltd-ptf-excerpt';
		}

		if ( $appear_effect !== 'no_effect' ) {
			$classes[] = 'eltd-appear-effect';
			if ( $appear_effect === 'one_by_one' ) {
				$classes[] = 'eltd-ptf-one-by-one';
			}
		} else {
			$classes[] = 'eltd-no-appear-effect';
		}

		return implode( ' ', $classes );

	}

	/**
	 * Generates portfolio image size
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getImageSize( $params ) {

		$thumb_size = 'full';
		$type       = $params['type'];

		if ( $type == 'standard' || $type == 'gallery' || $type == 'tiled_gallery' ) {
			if ( isset( $params['image_size'] ) && $params['image_size'] !== '') {
				$image_size = $params['image_size'];

				switch ( $image_size ) {
					case 'landscape':
						$thumb_size = 'kendall_elated_landscape';
						break;
					case 'portrait':
						$thumb_size = 'kendall_elated_portrait';
						break;
					case 'square':
						$thumb_size = 'kendall_elated_square';
						break;
					case 'full':
						$thumb_size = 'full';
						break;
				}
			}
		} elseif ( $type == 'masonry' ) {

			$id           = $params['current_id'];
			$masonry_size = get_post_meta( $id, 'portfolio_masonry_dimenisions', true );

			switch ( $masonry_size ):
				default :
					$thumb_size = 'kendall_elated_square';
					break;
				case 'large_width' :
					$thumb_size = 'kendall_elated_large_width';
					break;
				case 'large_height' :
					$thumb_size = 'kendall_elated_large_height';
					break;
				case 'large_width_height' :
					$thumb_size = 'kendall_elated_large_width_height';
					break;
			endswitch;
		}


		return $thumb_size;
	}

	/**
	 * Generates portfolio item categories ids.This function is used for filtering
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getItemCategories( $params ) {
		$id                    = $params['current_id'];
		$category_return_array = array();

		$categories = wp_get_post_terms( $id, 'portfolio-category' );

		foreach ( $categories as $cat ) {
			$category_return_array[] = 'portfolio_category_' . $cat->term_id;
		}

		return implode( ' ', $category_return_array );
	}

	/**
	 * Generates portfolio item categories html based on id
	 *
	 * @param $params
	 *
	 * @return html
	 */
	public function getItemCategoriesHtml( $params ) {
		$id = $params['current_id'];

		$categories    = wp_get_post_terms( $id, 'portfolio-category' );
		$category_html = '<div class="eltd-ptf-category-holder">';
		$k             = 1;
		foreach ( $categories as $cat ) {
			$category_html .= '<a href="' . get_category_link( $cat->term_id ) . '">';
			$category_html .= '<span>' . $cat->name . '</span>';
			$category_html .= '</a>';
			if ( count( $categories ) != $k ) {
				$category_html .= ' / ';
			}
			$k ++;
		}
		$category_html .= '</div>';

		return $category_html;
	}

	/**
	 * Generates masonry size class for each article( based on id)
	 *
	 * @param $params
	 *
	 * @return string
	 */
	public function getMasonrySize( $params ) {
		$masonry_size_class = '';

		if ( $params['type'] == 'masonry' ) {

			$id           = $params['current_id'];
			$masonry_size = get_post_meta( $id, 'portfolio_masonry_dimenisions', true );
			switch ( $masonry_size ):
				default :
					$masonry_size_class = 'eltd-default-masonry-item';
					break;
				case 'large_width' :
					$masonry_size_class = 'eltd-large-width-masonry-item';
					break;
				case 'large_height' :
					$masonry_size_class = 'eltd-large-height-masonry-item';
					break;
				case 'large_width_height' :
					$masonry_size_class = 'eltd-large-width-height-masonry-item';
					break;
			endswitch;
		}

		return $masonry_size_class;
	}

	/**
	 * Generates filter categories array
	 *
	 * @param $params
	 *
	 *
	 *
	 *
	 * * @return array
	 */
	public function getFilterCategories( $params ) {

		$cat_id       = 0;
		$top_category = '';

		if ( isset( $params['category'] ) && $params['category'] !== '' ) {

			$top_category = get_term_by( 'slug', $params['category'], 'portfolio-category' );
			if ( isset( $top_category->term_id ) ) {
				$cat_id = $top_category->term_id;
			}

		}

		$order = ( $params['filter_order_by'] == 'count' ) ? 'DESC' : 'ASC';

		$args = array(
			'taxonomy' => 'portfolio-category',
			'child_of' => $cat_id,
			'orderby'  => $params['filter_order_by'],
			'order'    => $order
		);

		$filter_categories = get_terms( $args );

		return $filter_categories;

	}

	/**
	 * Generates datta attributes array
	 *
	 * @param $params
	 *
	 * @return array
	 */
	public function getDataAtts( $params ) {

		$data_attr          = array();
		$data_return_string = '';

		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}

		if ( isset( $paged ) && $paged !== '' ) {
			$data_attr['data-next-page'] = $paged + 1;
		}
		if ( isset( $params['type'] ) && $params['type'] !== '' ) {
			$data_attr['data-type'] = $params['type'];
		}
		if ( isset( $params['columns'] ) && $params['columns'] !== '' ) {
			$data_attr['data-columns'] = $params['columns'];
		}
		if ( isset( $params['grid_size'] ) && $params['grid_size'] !== ''  ) {
			$data_attr['data-grid-size'] = $params['grid_size'];
		}
		if ( isset( $params['order_by'] ) && $params['order_by'] !== '') {
			$data_attr['data-order-by'] = $params['order_by'];
		}
		if ( isset( $params['order'] ) && $params['order'] !== '' ) {
			$data_attr['data-order'] = $params['order'];
		}
		if ( isset( $params['number'] )  && $params['number'] !== '') {
			$data_attr['data-number'] = $params['number'];
		}
		if ( isset( $params['image_size'] ) && $params['image_size'] !=='' ) {
			$data_attr['data-image-size'] = $params['image_size'];
		}
		if ( isset( $params['filter'] ) && $params['filter'] !== '' ) {
			$data_attr['data-filter'] = $params['filter'];
		}
		if ( isset( $params['filter_order_by'] ) && $params['filter_order_by'] !== '' ) {
			$data_attr['data-filter-order-by'] = $params['filter_order_by'];
		}
		if ( isset( $params['category'] ) && $params['category'] !== '' ) {
			$data_attr['data-category'] = $params['category'];
		}
		if ( isset( $params['selected_projects'] ) && $params['selected_projects'] !== '' ) {
			$data_attr['data-selected-projects'] = $params['selected_projects'];
		}
		if ( isset( $params['enable_pagination'] ) && $params['enable_pagination'] !== '') {

			$data_attr['data-enable-pagination'] = $params['enable_pagination'];
			if ( isset( $params['pagination_type'] ) &&  $params['pagination_type'] !== '') {
				$data_attr['data-pagination-type'] = $params['pagination_type'];
			}

		}
		if ( isset( $params['title_tag'] ) && $params['title_tag'] !== '') {
			$data_attr['data-title-tag'] = $params['title_tag'];
		}
		if ( isset( $params['portfolio_slider'] ) && $params['portfolio_slider'] == 'yes' ) {
			$data_attr['data-items']      = $params['portfolios_shown'];
			$data_attr['data-pagination'] = $params['pagination'];
			$data_attr['data-navigation'] = $params['navigation'];
		}

		//generate data params for tiled gallery type
		if ( isset( $params['tiled_row_height'] )  && $params['tiled_row_height'] !== '') {
			$data_attr['data-row-height'] = $params['tiled_row_height'];
		}
		if ( isset( $params['tiled_spacing'] ) && $params['tiled_spacing'] !== '' ) {
			$data_attr['data-spacing'] = $params['tiled_spacing'];
		}
		if ( isset( $params['tiled_last_row'] ) && $params['tiled_last_row'] !== '') {
			$data_attr['data-last-row'] = $params['tiled_last_row'];
		}
		if ( isset( $params['tiled_threshold'] ) && $params['tiled_threshold'] !== '') {
			$data_attr['data-threshold'] = $params['tiled_threshold'];
		}

		//generate return value as string
		foreach ( $data_attr as $key => $value ) {
			if ( $key !== '' ) {
				$data_return_string .= $key . '= "' . esc_attr( $value ) . '" ';
			}
		}

		return $data_return_string;
	}

	public function getItemLink( $params ) {

		$id             = $params['current_id'];
		$portfolio_link = get_permalink( $id );
		if ( get_post_meta( $id, 'portfolio_external_link', true ) !== '' ) {
			$portfolio_link = get_post_meta( $id, 'portfolio_external_link', true );
		}

		return $portfolio_link;

	}


	private function getItemStyle($params){
		$style = array();
		$border_color = $params['border_color'];
		if($border_color !== ''){
			$style[] = 'border-color: '.$border_color;
		}
		return $style;
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
		$portfolio_id    = (int) $query;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT ID AS id, post_title AS title
					FROM {$wpdb->posts}
					WHERE post_type = 'portfolio-item' AND ( ID = '%d' OR post_title LIKE '%%%s%%' )", $portfolio_id > 0 ? $portfolio_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['id'];  //Param that will be saved in shortcode
				$data['label'] = esc_html__( 'Id', 'eltd_core' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . esc_html__( 'Title', 'eltd_core' ) . ': ' . $value['title'] : '' );
				$results[]     = $data;
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

				$portfolio_id    = $portfolio->ID;
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
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS portfolio_category_title
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
	 * Find portfolio by id
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

				$portfolio_category_slug  = $portfolio_category->slug;
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