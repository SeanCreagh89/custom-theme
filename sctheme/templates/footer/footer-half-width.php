<?php

/**
	* Theme Footer 1/2 Width Widget Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<?php

if ( is_active_sidebar( 'footer-widget-1' )) { ?>

<div class="half-width">

	<div class="widget">

		<?php dynamic_sidebar( 'footer-widget-1' ); ?>

	</div>

</div>

<?php }

if ( is_active_sidebar( 'footer-widget-2' )) { ?>

<div class="half-width">

	<div class="widget">

		<?php dynamic_sidebar( 'footer-widget-2' ); ?>

	</div>

</div>
	
<?php }

if ( is_active_sidebar( 'footer-widget-3' )) { ?>

<div class="half-width">

	<div class="widget">

		<?php dynamic_sidebar( 'footer-widget-3' ); ?>

	</div>

</div>
	
<?php }

if ( is_active_sidebar( 'footer-widget-4' )) { ?>

<div class="half-width">

	<div class="widget">

		<?php dynamic_sidebar( 'footer-widget-4' ); ?>

	</div>

</div>
	
<?php } ?>