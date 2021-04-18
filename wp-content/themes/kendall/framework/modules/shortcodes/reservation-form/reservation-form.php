<?php
namespace KendallElated\Modules\Shortcodes\ReservationForm;

use KendallElated\Modules\Shortcodes\Lib\ShortcodeInterface;

class ReservationForm implements ShortcodeInterface {
	private $base;

	public function __construct() {
		$this->base = 'eltd_reservation_form';

		add_action('vc_before_init', array($this, 'vcMap'));
	}

	public function getBase() {
		return $this->base;
	}

	public function vcMap() {
		vc_map(array(
			'name'                      => esc_html__('Reservation Form', 'kendall'),
			'base'                      => $this->base,
			'category'                  => esc_html__('by ELATED', 'kendall'),
            'icon'                      => 'icon-wpb-reservation-form extended-custom-icon',
			'icon'                      => '',
			'allowed_container_element' => 'vc_row',
			'params'                    => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('OpenTable ID', 'kendall'),
					'param_name'  => 'open_table_id',
					'admin_label' => true
				),
                array(
                    'type'        => 'dropdown',
                    'heading'     => esc_html__('Skin', 'kendall'),
                    'param_name'  => 'skin',
                    'value'       => array(
	                    esc_html__('Default', 'kendall') => '',
                        esc_html__('Dark', 'kendall')  => 'dark',
                        esc_html__('Light', 'kendall') => 'light'
                    ),
                    'admin_label' => true
                ),
			)
		));
	}

	public function render($atts, $content = null) {
		$default_atts = array(
			'open_table_id' => '',
			'skin'          => ''
		);

		$params = shortcode_atts($default_atts, $atts);
		$params['holder_classes'] = '';
        if($params['skin'] !== ''){
            $params['holder_classes'] = 'eltd-skin-'.$params['skin'];
        }

        $html = kendall_elated_get_shortcode_module_template_part('templates/reservation-form', 'reservation-form', '', $params);

        return $html;
	}

}