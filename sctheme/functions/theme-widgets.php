<?php

/**
	* Theme Widgets and Sidebars
	*
	* @package SCTheme
	* @author Sean Creagh
*/



function theme_widgets() {

	/* --- Header Widgets --- */
	register_sidebar(array (
		'name' => __('Header | Topbar', 'theme-widgets'),
		'id' => 'header-widget-tb',
		'description' => __('Appears at the top of the site', 'sctheme'),
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	));



	/* --- Sidebar Widgets --- */
	for ($i = 1; $i <= 2; $i++) {

		$orientation;

		if ( $i == 1 )
			$orientation = "Left";

		else
			$orientation = "Right";

		register_sidebar(array (
			'name' => __('Sidebar', 'theme-widgets') .' | #' . $orientation,
			'id' => 'sidebar-widget-' . $i,
			'description' => __('Appears on the '. $orientation .' hand side of the site', 'sctheme'),
			'before_title' => '<h1>',
			'after_title' => '</h1>'
		));

	}



	/* --- Footer Widgets  --- */
	for ($i = 1; $i <= 4; $i++) {

		register_sidebar(array(
			'name' => __('Footer', 'theme-widgets') . ' | ' . $i,
			'id' => 'footer-widget-' . $i,
			'description' => __('Appears in the footer section of the site.', 'sctheme'),
			'before_title' => '<h1>',
			'after_title' => '</h1>'
		));

	}

	register_sidebar(array(
		'name' => __('Footer | Footnote', 'theme-widgets'),
		'id' => 'footer-widget-fn',
		'description' => __('Appears in the footnote section of the site', 'sctheme'),
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	));

}

add_action( 'widgets_init', 'theme_widgets' );

?>