<?php

//Carousels

if(!function_exists('kendall_elated_carousel_meta_box_map')) {

    function kendall_elated_carousel_meta_box_map() {
        $carousel_meta_box = kendall_elated_add_meta_box(
            array(
                'scope' => array('carousels'),
                'title' => esc_html__('Carousel', 'kendall'),
                'name' => 'carousel_meta'
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_carousel_image',
                'type'        => 'image',
                'label'       => esc_html__('Carousel Image', 'kendall'),
                'description' => esc_html__('Choose carousel image (min width needs to be 215px)', 'kendall'),
                'parent'      => $carousel_meta_box
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_carousel_hover_image',
                'type'        => 'image',
                'label'       => esc_html__('Carousel Hover Image', 'kendall'),
                'description' => esc_html__('Choose carousel hover image (min width needs to be 215px)', 'kendall'),
                'parent'      => $carousel_meta_box
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_carousel_item_link',
                'type'        => 'text',
                'label'       => esc_html__('Link', 'kendall'),
                'description' => esc_html__('Enter the URL to which you want the image to link to (e.g. http://www.example.com)', 'kendall'),
                'parent'      => $carousel_meta_box
            )
        );

        kendall_elated_add_meta_box_field(
            array(
                'name'        => 'eltd_carousel_item_target',
                'type'        => 'selectblank',
                'label'       => esc_html__('Target', 'kendall'),
                'description' => esc_html__('Specify where to open the linked document', 'kendall'),
                'parent'      => $carousel_meta_box,
                'options' => array(
                    '_self' => esc_html__('Self', 'kendall'),
                    '_blank' => esc_html__('Blank', 'kendall'),
                )
            )
        );
    }

    add_action('kendall_elated_meta_boxes_map', 'kendall_elated_carousel_meta_box_map');
}