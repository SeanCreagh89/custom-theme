<?php

/**
	* Theme Header Navigation Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<nav class="menu">

	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

</nav>

<nav class="responsive-menu">

	<i id="toggle-menu" class="icon-bars"></i>

	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

</nav>