<?php

/**
	* Theme Page Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<?php get_header(); ?>

<div id="Content">

	<?php

	if ( have_posts() ) : 

		while ( have_posts() ) : the_post(); ?>

			<h1><?php the_title(); ?></h1>

			<?php

			the_content();

		endwhile;

	else :

		echo "<h1>Ooops...</h1>";
		echo "<p>It looks like the page you were looking for doesn't exist.</p>";

	endif;

	?>

</div>

<?php get_footer(); ?>