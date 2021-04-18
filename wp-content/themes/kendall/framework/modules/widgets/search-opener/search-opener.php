<?php

/**
 * Widget that adds search icon that triggers opening of search form
 *
 * Class Elated_Search_Opener
 */
class KendallElatedSearchOpener extends KendallElatedWidget {
    /**
     * Set basic widget options and call parent class construct
     */
    public function __construct() {
        parent::__construct(
            'eltd_search_opener', // Base ID
            esc_html__('Elated Search Opener', 'kendall') // Name
        );

        $this->setParams();
    }

    /**
     * Sets widget options
     */
    protected function setParams() {
        $this->params = array(
            array(
                'name'        => 'search_icon_size',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Size (px)', 'kendall'),
                'description' => esc_html__('Define size for Search icon', 'kendall')
            ),
            array(
                'name'        => 'search_icon_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Color', 'kendall'),
                'description' => esc_html__('Define color for Search icon', 'kendall'),
            ),
            array(
                'name'        => 'search_icon_hover_color',
                'type'        => 'textfield',
                'title'       => esc_html__('Search Icon Hover Color', 'kendall'),
                'description' => esc_html__('Define hover color for Search icon', 'kendall')
            ),
            array(
                'name'        => 'show_label',
                'type'        => 'dropdown',
                'title'       => esc_html__('Enable Search Icon Text', 'kendall'),
                'description' => esc_html__('Enable this option to show \'Search\' text next to search icon in header', 'kendall'),
                'options'     => array(
                    ''    => '',
                    'yes' => esc_html__('Yes', 'kendall'),
                    'no'  => esc_html__('No', 'kendall')
                )
            ),
			array(
				'name'			=> 'close_icon_position',
				'type'			=> 'dropdown',
				'title'			=> esc_html__('Close icon stays on opener place', 'kendall'),
				'description'	=> esc_html__('Enable this option to set close icon on same position like opener icon', 'kendall'),
				'options'		=> array(
					'yes'	=> esc_html__('Yes', 'kendall'),
					'no'	=> esc_html__('No', 'kendall')
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

        $search_type_class    = 'eltd-search-opener';
		$fullscreen_search_overlay = false;
        $search_opener_styles = array();
        $show_search_text     = $instance['show_label'] == 'yes' || kendall_elated_options()->getOptionValue('enable_search_icon_text')== 'yes' ? true : false;
		$close_icon_on_same_position = $instance['close_icon_position'] == 'yes' ? true : false;

	    if ( kendall_elated_options()->getOptionValue( 'search_type' ) == 'fullscreen-search' ) {
		    if (kendall_elated_options()->getOptionValue('search_animation') == 'search-from-circle') {
			    $fullscreen_search_overlay = true;
		    }
	    }

        if(kendall_elated_options()->getOptionValue( 'search_type' ) == 'search_covers_header') {
            if(kendall_elated_options()->getOptionValue( 'search_type' ) == 'yes') {
                $search_type_class .= ' search_covers_only_bottom';
            }
        }

        if(!empty($instance['search_icon_size'])) {
            $search_opener_styles[] = 'font-size: '.$instance['search_icon_size'].'px';
        }

        if(!empty($instance['search_icon_color'])) {
            $search_opener_styles[] = 'color: '.$instance['search_icon_color'];
        }

        ?>

	    <?php print $args['before_widget']; ?>
        <a <?php echo kendall_elated_get_inline_attr($instance['search_icon_hover_color'], 'data-hover-color'); ?>
			<?php if ( $close_icon_on_same_position ) {
				echo kendall_elated_get_inline_attr('yes', 'data-icon-close-same-position');
			} ?>
            <?php kendall_elated_inline_style($search_opener_styles); ?>
            <?php kendall_elated_class_attribute($search_type_class); ?> href="javascript:void(0)">
            <?php
            kendall_elated_icon_collections()->getSearchIcon( kendall_elated_options()->getOptionValue( 'search_icon_pack' ), false );
            ?>
            <?php if($show_search_text) { ?>
                <span class="eltd-search-icon-text"><?php esc_html_e('Search', 'kendall'); ?></span>
            <?php } ?>
        </a>
	    <?php print $args['after_widget']; ?>
		<?php if($fullscreen_search_overlay) { ?>
			<div class="eltd-fullscreen-search-overlay"></div>
		<?php } ?>
    <?php }
}