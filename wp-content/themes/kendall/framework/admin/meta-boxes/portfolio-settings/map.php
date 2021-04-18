<?php

if(!function_exists('kendall_elated_portfolio_settings_meta_box_map')) {
    function kendall_elated_portfolio_settings_meta_box_map() {

        $meta_box = kendall_elated_add_meta_box(array(
            'scope' => 'portfolio-item',
            'title' => esc_html__('Portfolio Settings', 'kendall'),
            'name'  => 'portfolio_settings_meta_box'
        ));

        kendall_elated_add_meta_box_field(array(
            'name'        => 'eltd_portfolio_single_template_meta',
            'type'        => 'select',
            'label'       => esc_html__('Portfolio Type', 'kendall'),
            'description' => esc_html__('Choose a default type for Single Project pages', 'kendall'),
            'parent'      => $meta_box,
            'options'     => array(
                ''                  => esc_html__('Default', 'kendall'),
                'small-images'      => esc_html__('Portfolio small images', 'kendall'),
                'small-slider'      => esc_html__('Portfolio small slider', 'kendall'),
                'big-images'        => esc_html__('Portfolio big images', 'kendall'),
                'big-slider'        => esc_html__('Portfolio big slider', 'kendall'),
                'custom'            => esc_html__('Portfolio custom', 'kendall'),
                'full-width-custom' => esc_html__('Portfolio full width custom', 'kendall'),
                'gallery'           => esc_html__('Portfolio gallery', 'kendall'),
                'masonry'           => esc_html__('Portfolio masonry', 'kendall'),
                'masonry-wide'      => esc_html__('Portfolio masonry wide', 'kendall')
            )
        ));

        $all_pages = array();
        $pages     = get_pages();
        foreach($pages as $page) {
            $all_pages[$page->ID] = $page->post_title;
        }

        kendall_elated_add_meta_box_field(array(
            'name'        => 'portfolio_single_back_to_link',
            'type'        => 'select',
            'label'       => esc_html__('"Back To" Link', 'kendall'),
            'description' => esc_html__('Choose "Back To" page to link from portfolio Single Project page', 'kendall'),
            'parent'      => $meta_box,
            'options'     => $all_pages
        ));

        kendall_elated_add_meta_box_field(array(
            'name'        => 'portfolio_external_link',
            'type'        => 'text',
            'label'       => esc_html__('Portfolio External Link', 'kendall'),
            'description' => esc_html__('Enter URL to link from Portfolio List page', 'kendall'),
            'parent'      => $meta_box,
            'args'        => array(
                'col_width' => 3
            )
        ));

        kendall_elated_add_meta_box_field(array(
            'name'        => 'portfolio_masonry_dimenisions',
            'type'        => 'select',
            'label'       => esc_html__('Dimensions for Masonry', 'kendall'),
            'description' => esc_html__('Choose image layout when it appears in Masonry type portfolio lists', 'kendall'),
            'parent'      => $meta_box,
            'options'     => array(
                'default'            => esc_html__('Default', 'kendall'),
                'large_width'        => esc_html__('Large width', 'kendall'),
                'large_height'       => esc_html__('Large height', 'kendall'),
                'large_width_height' => esc_html__('Large width/height', 'kendall')
            )
        ));
    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_portfolio_settings_meta_box_map');
}