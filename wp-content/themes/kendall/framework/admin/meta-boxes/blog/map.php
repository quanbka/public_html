<?php

if(!function_exists('kendall_elated_blog_meta_box_map')) {

    function kendall_elated_blog_meta_box_map() {

        $eltd_blog_categories = array();
        $categories = get_categories();

        foreach($categories as $category) {
            $eltd_blog_categories[$category->term_id] = $category->name;
        }

        $blog_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('page'),
                'title' => esc_html__('Blog', 'kendall'),
                'name' => 'blog_meta'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_blog_category_meta',
                'type'        => 'selectblank',
                'label'       => esc_html__('Blog Category', 'kendall'),
                'description' => esc_html__('Choose category of posts to display (leave empty to display all categories)', 'kendall'),
                'parent'      => $blog_meta_box,
                'options'     => $eltd_blog_categories
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_show_posts_per_page_meta',
                'type'        => 'text',
                'label'       => esc_html__('Number of Posts', 'kendall'),
                'description' => esc_html__('Enter the number of posts to display', 'kendall'),
                'parent'      => $blog_meta_box,
                'options'     => $eltd_blog_categories,
                'args'        => array("col_width" => 3)
            )
        );
    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_blog_meta_box_map');
}