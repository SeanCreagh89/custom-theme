<?php

/**
	* Theme Footer Footnote Bar Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div id="footnote-bar" class="wrapper">

	<div class="container">

		<?php if ( has_nav_menu( 'tertiary' ) ) { ?>

		<nav id="footer-menu">

			<?php wp_nav_menu( array( 'theme_location' => 'tertiary' ) ); ?>

		</nav>

		<?php } ?>

		<div id="footnote">

			<a id="back-to-top" class="icon-arrow-up" href="#"></a>

			<?php if ( is_active_sidebar( 'footer-widget-fn' ) ) {

				dynamic_sidebar( 'footer-widget-fn' );

			} else {

				$title = get_bloginfo( 'name', 'raw' );
				echo '<p>&copy;'.date( 'Y' ).' '.$title.'. All Rights Reserved. Developed by Sean Creagh.</p>';

			} ?>

		</div>

	</div>

</div>