<?php
namespace ElatedCore\CPT\Slider;

use ElatedCore\Lib;

/**
 * Class SliderRegister
 * @package ElatedCore\CPT\Slider
 */
class SliderRegister implements Lib\PostTypeInterface {
    /**
     * @var string
     */
    private $base;

    public function __construct() {
        $this->base = 'slides';
        $this->taxBase = 'slides_category';
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
    }

    /**
     * Registers custom post type with WordPress
     */
    private function registerPostType() {
        global $kendall_elated_Framework;

        $menuPosition = 5;
        $menuIcon = 'dashicons-admin-post';

        if(eltd_core_theme_installed()) {
            $menuPosition = $kendall_elated_Framework->getSkin()->getMenuItemPosition('slider');
            $menuIcon = $kendall_elated_Framework->getSkin()->getMenuIcon('slider');
        }

        register_post_type($this->base,
            array(
                'labels' 		=> array(
                    'name' 				=> esc_html__('Elated Slider','eltd_core' ),
                    'menu_name'	=> esc_html__('Elated Slider','eltd_core' ),
                    'all_items'	=> esc_html__('Slides','eltd_core' ),
                    'add_new' =>  esc_html__('Add New Slide','eltd_core'),
                    'singular_name' 	=> esc_html__('Slide','eltd_core' ),
                    'add_item'			=> esc_html__('New Slide','eltd_core'),
                    'add_new_item' 		=> esc_html__('Add New Slide','eltd_core'),
                    'edit_item' 		=> esc_html__('Edit Slide','eltd_core')
                ),
                'public'		=>	false,
                'show_in_menu'	=>	true,
                'rewrite' 		=> 	array('slug' => 'slides'),
                'menu_position' => 	$menuPosition,
                'show_ui'		=>	true,
                'has_archive'	=>	false,
                'hierarchical'	=>	false,
                'supports'		=>	array('title', 'thumbnail', 'page-attributes'),
                'menu_icon'  =>  $menuIcon
            )
        );
    }

    /**
     * Registers custom taxonomy with WordPress
     */
    private function registerTax() {
        $labels = array(
            'name' => esc_html__( 'Sliders', 'eltd_core' ),
            'singular_name' => esc_html__( 'Slider', 'eltd_core' ),
            'search_items' =>  esc_html__( 'Search Sliders','eltd_core' ),
            'all_items' => esc_html__( 'All Sliders','eltd_core' ),
            'parent_item' => esc_html__( 'Parent Slider','eltd_core' ),
            'parent_item_colon' => esc_html__( 'Parent Slider:','eltd_core' ),
            'edit_item' => esc_html__( 'Edit Slider','eltd_core' ),
            'update_item' => esc_html__( 'Update Slider','eltd_core' ),
            'add_new_item' => esc_html__( 'Add New Slider','eltd_core' ),
            'new_item_name' => esc_html__( 'New Slider Name','eltd_core' ),
            'menu_name' => esc_html__( 'Sliders','eltd_core' ),
        );

        register_taxonomy($this->taxBase, array($this->base), array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'query_var' => true,
            'show_admin_column' => true,
            'rewrite' => array( 'slug' => 'slides-category' ),
        ));
    }
}