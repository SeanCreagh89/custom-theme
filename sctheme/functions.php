<?php

/**
	* Theme Functions and Set-up
	*
	* @package SCTheme
	* @author Sean Creagh
*/



define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'SCTheme' );
define( 'THEME_VERSION', '1.0' );

define( 'LIBS_DIR', THEME_DIR . '/functions' );
define( 'LIBS_URI', THEME_DIR . '/functions' );



/* --- Load Theme Functions --- */
require_once( LIBS_DIR . '/theme-head.php' );
require_once( LIBS_DIR . '/theme-customizer.php' );
require_once( LIBS_DIR . '/theme-widgets.php' );
require_once( LIBS_DIR . '/theme-post-types.php' );
require_once( LIBS_DIR . '/theme-identity.php' );
require_once( LIBS_DIR . '/theme-breadcrumbs.php' );



/* --- Theme Set-up --- */
function sctheme_setup() {

	/*--- Enable Custom Logos Support ---*/
	add_theme_support( 'custom-logo', array ( 
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' )
	));

	/* --- Enables Use of wp_nav_menu(); --- */
	register_nav_menus( array (
		'primary' => __( 'Primary Menu | Main Navigation', 'sctheme' ),
		'secondary' => __( 'Secondary Menu | Header - Top Bar', 'sctheme' ),
		'tertiary' => __( 'Tertiary Menu | Footer - Bottom Bar', 'sctheme' )
	));

	/* --- Enable Post Thumbnails Support --- */
	add_theme_support( 'post-thumbnails' );

	/* ---
	*
	* Switch Default Core Markup For:
		* Search Form
		* Comment Form
		* Comments
	* To Output Valid HTML
	*
	--- */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/* --- Enable Post Format Support --- */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}

add_action( 'after_setup_theme', 'sctheme_setup' );

/* --- Enable Excerpt Support --- */
function excerpt_support() {

	add_post_type_support( 'page', 'excerpt' );

}

add_action( 'init', 'excerpt_support' );

function excerpt_length( $length ) {

	return 60; // Timeline Template
	// return 15; // Masonry Template.

}

add_filter( 'excerpt_length', 'excerpt_length', 999 );

function excerpt_read_more( $more ) {

	return '<div><a class="button" href="' . get_permalink( get_the_ID() ) . '">' . __('Read More', '') . '</a></div>';

}

add_filter( 'excerpt_more', 'excerpt_read_more' );

?>