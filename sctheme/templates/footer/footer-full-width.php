<?php

/**
	* Theme Footer Full Width Widget Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div class="full-width">

	<div class="widget">

		<?php if ( is_active_sidebar( 'footer-widget-1' ) ) {

			dynamic_sidebar( 'footer-widget-1' );

		} elseif ( is_active_sidebar( 'footer-widget-2' ) ) {

			dynamic_sidebar( 'footer-widget-2' );

		} elseif ( is_active_sidebar( 'footer-widget-3' ) ) {

			dynamic_sidebar( 'footer-widget-3' );

		} elseif ( is_active_sidebar( 'footer-widget-4' ) ) {

			dynamic_sidebar( 'footer-widget-4' );

		} ?>

	</div>

</div>