<?php

/**
	* Theme Single Post Template
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

		get_template_part( 'templates/blog/post-navigation' );

		endwhile;

	else :

		echo "<h1>Ooops...</h1>";
		echo "<p>It looks like the portfolio item you were looking for doesn't exist.</p>";

	endif;

	?>

</div>

<?php get_footer(); ?>