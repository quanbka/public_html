<?php

/**
 * Widget that adds social icon
 *
 * Class Social_Icon_Widget
 */
class KendallElatedSocialIconWidget extends KendallElatedWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_social_icon_widget', // Base ID
            esc_html__('Elated Social Icon Widget', 'kendall') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array_merge(
            kendall_elated_icon_collections()->getSocialIconWidgetParamsArray(),
            array(
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Link', 'kendall'),
                    'name' => 'link',
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'title' => esc_html__('Target', 'kendall'),
                    'name' => 'target',
                    'options' => array(
                        '_self' => esc_html__('Same Window', 'kendall'),
                        '_blank' => esc_html__('New Window', 'kendall')
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'dropdown',
                    'title' => esc_html__('Type', 'kendall'),
                    'name' => 'type',
                    'options' => array(
                        'normal' => esc_html__('Normal', 'kendall'),
                        'circle' => esc_html__('Circle', 'kendall'),
                        'square' => esc_html__('Square', 'kendall'),
                    ),
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Text Size (px)', 'kendall'),
                    'name' => 'text_size',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Color', 'kendall'),
                    'name' => 'color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Hover Color', 'kendall'),
                    'name' => 'hover_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Border Width', 'kendall'),
                    'name' => 'border_width',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Border Color', 'kendall'),
                    'name' => 'border_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Hover Border Color', 'kendall'),
                    'name' => 'hover_border_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Background Color', 'kendall'),
                    'name' => 'background_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Hover Background Color', 'kendall'),
                    'name' => 'hover_background_color',
                    'description' => ''
                ),
                array(
                    'type' => 'textfield',
                    'title' => esc_html__('Margin', 'kendall'),
                    'name' => 'margin',
                    'description' => esc_html__('Margin (top right bottom left)', 'kendall')
                )
            )
        );
    }

    /**
     * Generates widget's HTML
     *
     * @param array $args args from widget area
     * @param array $instance widget's options
     */
    public function widget($args, $instance) {

        $icon_params = array();

        if (!empty($instance['icon_pack']) && $instance['icon_pack'] !== '') {
            $icon_params['icon_pack'] = $instance['icon_pack'];
        }
        if (!empty($instance['fa_icon']) && $instance['fa_icon'] !== '') {
            $icon_params['fa_icon'] = $instance['fa_icon'];
        }
        if (!empty($instance['fe_icon']) && $instance['fe_icon'] !== '') {
            $icon_params['fe_icon'] = $instance['fe_icon'];
        }
        if (!empty($instance['ion_icon']) && $instance['ion_icon'] !== '') {
            $icon_params['ion_icon'] = $instance['ion_icon'];
        }
        if (!empty($instance['simple_line_icons']) && $instance['simple_line_icons'] !== '') {
            $icon_params['simple_line_icons'] = $instance['simple_line_icons'];
        }
        if (!empty($instance['type']) && $instance['type'] !== '') {
            $icon_params['type'] = $instance['type'];
        }
        if (!empty($instance['color']) && $instance['color'] !== '') {
            $icon_params['icon_color'] = $instance['color'];
        }
        if (!empty($instance['hover_color']) && $instance['hover_color'] !== '') {
            $icon_params['hover_icon_color'] = $instance['hover_color'];
        }
        if (!empty($instance['link']) && $instance['link'] !== '') {
            $icon_params['link'] = $instance['link'];
        }
        if (!empty($instance['target']) && $instance['target'] !== '') {
            $icon_params['target'] = $instance['target'];
        }
        if (!empty($instance['margin']) && $instance['margin'] !== '') {
            $icon_params['margin'] = $instance['margin'];
        }
        if (!empty($instance['text_size']) && $instance['text_size'] !== '') {
            $icon_params['custom_size'] = $instance['text_size'];
        }
        if (!empty($instance['border_width']) && $instance['border_width'] !== '') {
            $icon_params['border_width'] = $instance['border_width'];
        }
        if (!empty($instance['border_color']) && $instance['border_color'] !== '') {
            $icon_params['border_color'] = $instance['border_color'];
        }
        if (!empty($instance['hover_border_color']) && $instance['hover_border_color'] !== '') {
            $icon_params['hover_border_color'] = $instance['hover_border_color'];
        }
        if (!empty($instance['background_color']) && $instance['background_color'] !== '') {
            $icon_params['background_color'] = $instance['background_color'];
        }
        if (!empty($instance['hover_background_color']) && $instance['hover_background_color'] !== '') {
            $icon_params['hover_background_color'] = $instance['hover_background_color'];
        }

        print $args['before_widget'];
        print kendall_elated_execute_shortcode( 'eltd_icon', $icon_params );
        print $args['after_widget'];

    }
}