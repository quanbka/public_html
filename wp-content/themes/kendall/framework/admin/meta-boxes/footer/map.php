<?php
if(!function_exists('kendall_elated_footer_meta_box_map')) {

    function kendall_elated_footer_meta_box_map() {

        $footer_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('page', 'portfolio-item', 'post'),
                'title' => esc_html__('Footer', 'kendall'),
                'name' => 'footer_meta'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_disable_footer_meta',
                'type' => 'yesno',
                'default_value' => 'no',
                'label' => esc_html__('Disable Footer for this Page', 'kendall'),
                'description' => esc_html__('Enabling this option will hide footer on this page', 'kendall'),
                'parent' => $footer_meta_box,
            )
        );
        kendall_elated_add_meta_box_field(
            array(
                'name' => 'eltd_footer_background_image_meta',
                'type' => 'image',
                'default_value' => '',
                'label' => esc_html__('Footer Background Image for this Page', 'kendall'),
                'parent' => $footer_meta_box,
            )
        );
    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_footer_meta_box_map');
}