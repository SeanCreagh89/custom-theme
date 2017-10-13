<?php

/**
	* Theme Indentity Output
	*
	* @package SCTheme
	* @author Sean Creagh
*/



function theme_identity() {

	if ( function_exists( 'the_custom_logo' ) ) {

		$logo = get_custom_logo();
		$title = get_bloginfo( 'name', 'raw' );
		$tagline = get_bloginfo( 'description', 'raw' );

		echo '<div id="site-identity">';

		if ( !empty( $logo ) ) {

			echo $logo;

		} elseif ( $title !== null || $tagline !== null ) {

			if ( $title !== "" && $tagline !== "" ) {

				echo '<a href="' . get_home_url() . '"><h2 id="site-title">' . $title . '</h2></a>';
				echo '<h4 id="site-tagline">' . $tagline . '</h4>';

			} elseif ( $title !== "" && $tagline == "" ) {

				echo '<a href="' . get_home_url() . '"><h2 id="site-title" class="large-font">' . $title . '</h2></a>';

			} elseif ( $title == "" ) {

				echo '<p>Please a logo or title to your site...</p>';

			}

		}

		echo '</div>';

	}

}

?>