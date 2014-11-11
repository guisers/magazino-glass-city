<?php

add_action( 'wp_enqueue_scripts', 'enqueue_parent_theme_style' );
function enqueue_parent_theme_style() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

function enqueue_child_scripts() {
	wp_register_script( 'magazino_custom_js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ));
	wp_enqueue_script( 'magazino_custom_js' );
	wp_enqueue_style( 'genericons', get_stylesheet_directory_uri().'/font/genericons.css' );
}

add_action( 'wp_enqueue_scripts', 'enqueue_child_scripts');

?>