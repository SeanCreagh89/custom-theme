<?php

/**
	* Theme 404 Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<?php get_header(); ?>

<div id="Content">

	<div id="404" class="wrapper">

		<div class="container">

			<h1>Oops... Error 404</h1>
			<p>We're sorry, but unfortunately the page you're looking for does not exist.</p>
			<span>Please check the address and try again or</span>

			<div id="redirect-404">

				<a href="<?php echo get_home_url(); ?>" class="button">return to homepage</a>

			</div>

		</div>


	</div>

</div>

<?php get_footer(); ?>