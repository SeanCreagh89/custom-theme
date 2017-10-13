<?php

/**
	* Theme Header Top Bar Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div id="top-bar" class="wrapper">

	<div class="container clearfix">

		<div id="inner-container">

			<?php if ( has_nav_menu( 'secondary' ) ) { ?>

			<nav class="menu">

				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>

			</nav>

			<?php } 

			if ( is_active_sidebar( 'header-widget-tb' ) ) { ?>

			<div class="widget">

				<?php dynamic_sidebar( 'header-widget-tb' ); ?>

			</div>

			<?php } ?>

		</div>

	</div>

</div>