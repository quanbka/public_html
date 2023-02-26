<?php

class KendallElatedSideAreaOpener extends KendallElatedWidget {
	public function __construct() {
		parent::__construct(
			'eltd_side_area_opener', // Base ID
			esc_html__('Elated Side Area Opener', 'kendall') // Name
		);

		$this->setParams();
	}

	protected function setParams() {

		$this->params = array(
			array(
				'name'        => 'side_area_opener_icon_color',
				'type'        => 'textfield',
				'title'       => esc_html__('Icon Color', 'kendall'),
				'description' => esc_html__('Define color for Side Area opener icon', 'kendall')
			)
		);

	}


	public function widget( $args, $instance ) {

		$sidearea_icon_styles = array();

		if ( ! empty( $instance['side_area_opener_icon_color'] ) ) {
			$sidearea_icon_styles[] = 'color: ' . $instance['side_area_opener_icon_color'];
		}

		$icon_size = '';
		if ( kendall_elated_options()->getOptionValue( 'side_area_predefined_icon_size' ) ) {
			$icon_size = kendall_elated_options()->getOptionValue( 'side_area_predefined_icon_size' );
		}
		print $args['before_widget'];
		?>
		<a class="eltd-side-menu-button-opener <?php echo esc_attr( $icon_size ); ?>" <?php kendall_elated_inline_style( $sidearea_icon_styles ) ?>
		   href="javascript:void(0)">
			<?php echo kendall_elated_get_side_menu_icon_html(); ?>
		</a>
		<?php
		print $args['after_widget'];
	}

}