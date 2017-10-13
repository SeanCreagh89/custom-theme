<?php

/**
	* Theme Footer Widget Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div id="footer-widgets" class="wrapper">

	<div class="container">

		<?php $i = 0;

		if ( is_active_sidebar( 'footer-widget-1' ) ) { ++$i; }
		if ( is_active_sidebar( 'footer-widget-2' ) ) { ++$i; }
		if ( is_active_sidebar( 'footer-widget-3' ) ) { ++$i; }
		if ( is_active_sidebar( 'footer-widget-4' ) ) { ++$i; }

		if ( $i == 1 ) {

			get_template_part( 'templates/footer/footer-full-width' );

		} elseif ( $i == 2 ) {

			get_template_part( 'templates/footer/footer-half-width' );

		} elseif ( $i == 3 ) {

			get_template_part( 'templates/footer/footer-third-width' );

		} else if ( $i == 4 ) {

			get_template_part( 'templates/footer/footer-quarter-width' );

		} ?>

	</div>

</div>