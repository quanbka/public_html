<?php

class KendallElatedFullScreenMenuOpener extends KendallElatedWidget {
    public function __construct() {
        parent::__construct(
            'eltd_full_screen_menu_opener', // Base ID
            esc_html__('Elated Full Screen Menu Opener', 'kendall') // Name
        );

		$this->setParams();
    }

	protected function setParams() {

		$this->params = array(
			array(
				'name'			=> 'fullscreen_menu_opener_icon_color',
				'type'			=> 'textfield',
				'title'			=> esc_html__('Icon Color', 'kendall'),
				'description'	=> esc_html__('Define color for Side Area opener icon', 'kendall')
			)
		);

	}

    public function widget($args, $instance) {

		$fullscreen_icon_styles = array();

		if ( !empty($instance['fullscreen_menu_opener_icon_color']) ) {
			$fullscreen_icon_styles[] = 'background-color: ' . $instance['fullscreen_menu_opener_icon_color'];
		}

		$icon_size = kendall_elated_options()->getOptionValue( 'fullscreen_menu_icon_size' );

	    print $args['before_widget'];
		?>
        <a href="javascript:void(0)" class="eltd-fullscreen-menu-opener <?php echo esc_attr( $icon_size )?>">
            <span class="eltd-fullscreen-menu-opener-inner">
                <i class="eltd-line" <?php kendall_elated_inline_style($fullscreen_icon_styles); ?>>&nbsp;</i>
            </span>
        </a>
	    <?php
	    print $args['after_widget'];

     }

}