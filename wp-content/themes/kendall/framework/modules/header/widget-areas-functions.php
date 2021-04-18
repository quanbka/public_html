<?php

if ( ! function_exists( 'kendall_elated_register_top_header_areas' ) ) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function kendall_elated_register_top_header_areas() {
		$top_bar_layout  = kendall_elated_options()->getOptionValue( 'top_bar_layout' );
		$top_bar_enabled = kendall_elated_options()->getOptionValue( 'top_bar' );

		if ( $top_bar_enabled == 'yes' ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Left', 'kendall' ),
				'id'            => 'eltd-top-bar-left',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
				'after_widget'  => '</div>'
			) );

			//register this widget area only if top bar layout is three columns
			if ( $top_bar_layout === 'three-columns' ) {
				register_sidebar( array(
					'name'          => esc_html__( 'Top Bar Center', 'kendall' ),
					'id'            => 'eltd-top-bar-center',
					'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
					'after_widget'  => '</div>'
				) );
			}

			register_sidebar( array(
				'name'          => esc_html__( 'Top Bar Right', 'kendall' ),
				'id'            => 'eltd-top-bar-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-top-bar-widget">',
				'after_widget'  => '</div>'
			) );
		}
	}

	add_action( 'widgets_init', 'kendall_elated_register_top_header_areas' );
}

if ( ! function_exists( 'kendall_elated_header_standard_widget_areas' ) ) {
	/**
	 * Registers widget areas for standard header type
	 */
	function kendall_elated_header_standard_widget_areas() {
		register_sidebar( array(
			'name'          => esc_html__( 'Right From Main Menu', 'kendall' ),
			'id'            => 'eltd-right-from-main-menu',
			'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-main-menu-widget">',
			'after_widget'  => '</div>',
			'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the main menu', 'kendall' )
		) );
	}

	add_action( 'widgets_init', 'kendall_elated_header_standard_widget_areas' );
}

if ( ! function_exists( 'kendall_elated_header_dual_widget_areas' ) ) {
	/**
	 * Registers widget areas for standard header type
	 */
	function kendall_elated_header_dual_widget_areas() {
		register_sidebar( array(
			'name'          => esc_html__( 'Right From Main Menu Header Dual', 'kendall' ),
			'id'            => 'eltd-right-from-main-menu-dual',
			'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-main-menu-widget-dual">',
			'after_widget'  => '</div>',
			'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the main menu when Dual Header is enabled', 'kendall' )
		) );
	}

	add_action( 'widgets_init', 'kendall_elated_header_dual_widget_areas' );
}

if ( ! function_exists( 'kendall_elated_header_vertical_widget_areas' ) ) {
	/**
	 * Registers widget areas for vertical header
	 */
	function kendall_elated_header_vertical_widget_areas() {
		register_sidebar( array(
			'name'        => esc_html__( 'Vertical Area', 'kendall' ),
			'description' => esc_html__( 'Widgets added here will appear on the bottom of vertical menu', 'kendall' ),
			'id'            => 'eltd-vertical-area',
			'before_widget' => '<div id="%1$s" class="widget %2$s eltd-vertical-area-widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h6 class="eltd-vertical-area-widget-title">',
			'after_title'   => '</h6>'
		) );
	}

	add_action( 'widgets_init', 'kendall_elated_header_vertical_widget_areas' );
}

if ( ! function_exists( 'kendall_elated_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function kendall_elated_register_mobile_header_areas() {
		if ( kendall_elated_is_responsive_on() ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Right From Mobile Logo', 'kendall' ),
				'id'            => 'eltd-right-from-mobile-logo',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-right-from-mobile-logo">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo', 'kendall' )
			) );
		}
	}

	add_action( 'widgets_init', 'kendall_elated_register_mobile_header_areas' );
}

if ( ! function_exists( 'kendall_elated_register_sticky_header_areas' ) ) {
	/**
	 * Registers widget area for sticky header
	 */
	function kendall_elated_register_sticky_header_areas() {
		if ( in_array( kendall_elated_options()->getOptionValue( 'header_behaviour' ), array(
			'sticky-header-on-scroll-up',
			'sticky-header-on-scroll-down-up'
		) ) ) {
			register_sidebar( array(
				'name'          => esc_html__( 'Sticky Right', 'kendall' ),
				'id'            => 'eltd-sticky-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s eltd-sticky-right">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear on the right hand side in sticky menu', 'kendall' )
			) );
		}
	}

	add_action( 'widgets_init', 'kendall_elated_register_sticky_header_areas' );
}