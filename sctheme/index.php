<?php

/**
	* Theme Main Index
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<?php get_header(); ?>

<div id="Content">

	<div id="posts" class="wrapper">

		<div class="container">

			<?php

			if ( have_posts() ) : 

				while ( have_posts() ) : the_post();

					get_template_part( 'templates/blog/timeline' );
					// get_template_part( 'templates/blog/masonry-grid' );
					// get_template_part( 'templates/blog/tiles' );

				endwhile;

				echo '<div class="pagination-wrapper">';

				the_posts_pagination( array(
					'prev_text' => __( '<i class="icon-angle-left"></i>', 'sctheme' ),
					'next_text' => __( '<i class="icon-angle-right"></i>', 'sctheme' ),
					'before_page_number' => __( '', 'sctheme' )
				) );

				echo '</div>';

			else :

				echo "<h1>Ooops...</h1>";
				echo "<p>It looks like we haven't posted anything yet.</p>";

			endif;

			?>

		</div>

	</div>

</div>

<?php get_footer(); ?>