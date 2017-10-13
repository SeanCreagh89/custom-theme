<?php

/**
	* Theme Footer
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<footer>

	<?php

	if ( is_active_sidebar( 'footer-widget-1' ) || is_active_sidebar( 'footer-widget-2' )
		|| is_active_sidebar( 'footer-widget-3' ) || is_active_sidebar( 'footer-widget-4' ) ) {

		get_template_part( 'templates/footer/footer-widgets' );

	}

	?>

	<?php get_template_part( 'templates/footer/footer-footnote' ); ?>

</footer>

<?php wp_footer(); ?>

</body>

</html>