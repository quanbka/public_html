<?php
namespace ElatedCore\CPT\Portfolio;

use ElatedCore\Lib\PostTypeInterface;

/**
 * Class PortfolioRegister
 * @package ElatedCore\CPT\Portfolio
 */
class PortfolioRegister implements PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'portfolio-item';
        $this->taxBase = 'portfolio-category';

        add_filter('single_template', array($this, 'registerSingleTemplate'));
    }

    /**
     * @return string
     */
    public function getBase() {
        return $this->base;
    }

    /**
     * Registers custom post type with WordPress
     */
    public function register() {
        $this->registerPostType();
        $this->registerTax();
        $this->registerTagTax();
    }

    /**
     * Registers portfolio single template if one does'nt exists in theme.
     * Hooked to single_template filter
     * @param $single string current template
     * @return string string changed template
     */
    public function registerSingleTemplate($single) {
        global $post;

        if($post->post_type == $this->base) {
            if(!file_exists(get_template_directory().'/single-portfolio-item.php')) {
                return ELATED_CORE_CPT_PATH.'/portfolio/templates/single-'.$this->base.'.php';
            }
        }

        return $single;
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $kendall_elated_Framework, $kendall_elated_options;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';
        $slug = $this->base;

        if(eltd_core_theme_installed()) {
            $menuPosition = $kendall_elated_Framework->getSkin()->getMenuItemPosition('portfolio');
            $menuIcon = $kendall_elated_Framework->getSkin()->getMenuIcon('portfolio');

            if(isset($kendall_elated_options['portfolio_single_slug'])) {
                if($kendall_elated_options['portfolio_single_slug'] != ""){
                    $slug = $kendall_elated_options['portfolio_single_slug'];
                }
            }
        }

        register_post_type( $this->base,
            array(
                'labels' => array(
                    'name' => esc_html__( 'Portfolio','eltd_core' ),
                    'singular_name' => esc_html__( 'Portfolio Item','eltd_core' ),
                    'add_item' => esc_html__('New Portfolio Item','eltd_core'),
                    'add_new_item' => esc_html__('Add New Portfolio Item','eltd_core'),
                    'edit_item' => esc_html__('Edit Portfolio Item','eltd_core')
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => $slug),
                'menu_position' => $menuPosition,
                'show_ui' => true,
                'supports' => array('author', 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes', 'comments'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => esc_html__( 'Portfolio Categories', 'taxonomy general name' ),
            'singular_name' => esc_html__( 'Portfolio Category', 'taxonomy singular name' ),
            'search_items' =>  esc_html__( 'Search Portfolio Categories','eltd_core' ),
            'all_items' => esc_html__( 'All Portfolio Categories','eltd_core' ),
            'parent_item' => esc_html__( 'Parent Portfolio Category','eltd_core' ),
            'parent_item_colon' => esc_html__( 'Parent Portfolio Category:','eltd_core' ),
            'edit_item' => esc_html__( 'Edit Portfolio Category','eltd_core' ),
            'update_item' => esc_html__( 'Update Portfolio Category','eltd_core' ),
            'add_new_item' => esc_html__( 'Add New Portfolio Category','eltd_core' ),
            'new_item_name' => esc_html__( 'New Portfolio Category Name','eltd_core' ),
            'menu_name' => esc_html__( 'Portfolio Categories','eltd_core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'portfolio-category' ),
        ));
    }

    /**
     * Registers custom tag taxonomy with WordPress
     */
    private function registerTagTax() {
        $labels = array(
            'name' => esc_html__( 'Portfolio Tags', 'taxonomy general name' ),
            'singular_name' => esc_html__( 'Portfolio Tag', 'taxonomy singular name' ),
            'search_items' =>  esc_html__( 'Search Portfolio Tags','eltd_core' ),
            'all_items' => esc_html__( 'All Portfolio Tags','eltd_core' ),
            'parent_item' => esc_html__( 'Parent Portfolio Tag','eltd_core' ),
            'parent_item_colon' => esc_html__( 'Parent Portfolio Tags:','eltd_core' ),
            'edit_item' => esc_html__( 'Edit Portfolio Tag','eltd_core' ),
            'update_item' => esc_html__( 'Update Portfolio Tag','eltd_core' ),
            'add_new_item' => esc_html__( 'Add New Portfolio Tag','eltd_core' ),
            'new_item_name' => esc_html__( 'New Portfolio Tag Name','eltd_core' ),
            'menu_name' => esc_html__( 'Portfolio Tags','eltd_core' ),
        );

        register_taxonomy('portfolio-tag',array($this->base), array(
            'hierarchical' => false,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'portfolio-tag' ),
        ));
    }
}