<?php

/**
	* Theme Enqueue Styles & Scripts
	*
	* @package SCTheme
	* @author Sean Creagh
*/



/* --- Enqueue Theme Styles --- */
function theme_styles() {

	wp_enqueue_style( 'style', get_stylesheet_uri(), false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'sctheme-layout', THEME_URI . '/styles/layout.css', false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'sctheme-responsive', THEME_URI . '/styles/responsive.css', false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'sctheme-color', THEME_URI . '/styles/color.css', false, THEME_VERSION, 'all' );
	wp_enqueue_style( 'sctheme-font', THEME_URI . '/styles/font.css', false, THEME_VERSION, 'all' );

}

add_action( 'wp_enqueue_scripts', 'theme_styles' );



/* --- Enqueue Theme Scripts --- */
function theme_script() {

	wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, THEME_VERSION, true );
	wp_enqueue_script( 'sctheme-scripts', THEME_URI . '/scripts/script.js', false, THEME_VERSION, true );

}

add_action( 'wp_enqueue_scripts', 'theme_script' );



/* --- Enqueue Theme Fonts --- */
function theme_fonts() {
 
    wp_enqueue_style( 'font-awesome', THEME_URI. '/fonts/font-awesome/css/font-awesome.min.css', false, THEME_VERSION, 'all' );
    wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed' );
 
}

add_action( 'wp_enqueue_scripts', 'theme_fonts' );

?>