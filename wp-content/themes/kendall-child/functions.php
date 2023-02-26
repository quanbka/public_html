<?php

/*** Child Theme Function  ***/

function kendall_elated_child_theme_enqueue_scripts() {
	$parent_style = 'kendall_elated_default_style';

	wp_enqueue_style('kendall_elated_handle_child_style', get_stylesheet_directory_uri() . '/style.css', array($parent_style));
}
add_action('wp_enqueue_scripts', 'kendall_elated_child_theme_enqueue_scripts');