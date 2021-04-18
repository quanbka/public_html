<?php

/**
 * Widget that adds separator boxes type
 *
 * Class Separator_Widget
 */
class KendallElatedSeparatorWidget extends KendallElatedWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_separator_widget', // Base ID
            esc_html__('Elated Separator Widget', 'kendall') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'type' => 'dropdown',
                'title' => 'Type',
                'name' => 'type',
                'options' => array(
                    'normal' => esc_html__('Normal', 'kendall'),
                    'full-width' => esc_html__('Full Width', 'kendall')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Position', 'kendall'),
                'name' => 'position',
                'options' => array(
                    'center' => esc_html__('Center', 'kendall'),
                    'left' => esc_html__('Left', 'kendall'),
                    'right' => esc_html__('Right', 'kendall')
                )
            ),
            array(
                'type' => 'dropdown',
                'title' => esc_html__('Style', 'kendall'),
                'name' => 'border_style',
                'options' => array(
                    'solid' => esc_html__('Solid', 'kendall'),
                    'dashed' => esc_html__('Dashed', 'kendall'),
                    'dotted' => esc_html__('Dotted',  'kendall'),
                )
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Color', 'kendall'),
                'name' => 'color'
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Width', 'kendall'),
                'name' => 'width',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Thickness (px)', 'kendall'),
                'name' => 'thickness',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Top Margin', 'kendall'),
                'name' => 'top_margin',
                'description' => ''
            ),
            array(
                'type' => 'textfield',
                'title' => esc_html__('Bottom Margin', 'kendall'),
                'name' => 'bottom_margin',
                'description' => ''
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

        extract($args);

        //prepare variables
        $params = '';

        //is instance empty?
        if(is_array($instance) && count($instance)) {
            //generate shortcode params
            foreach($instance as $key => $value) {
                $params .= " $key='$value' ";
            }
        }

        echo '<div class="widget eltd-separator-widget">';

        //finally call the shortcode
        echo do_shortcode("[eltd_separator $params]"); // XSS OK

        echo '</div>'; //close div.eltd-separator-widget
    }
}