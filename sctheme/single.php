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

	<div id="single" class="wrapper">

		<?php

		if ( have_posts() ) :

			while ( have_posts() ) : the_post(); ?>

				<div class="container">

					<?php

					echo get_the_title();
					echo get_the_post_thumbnail();
					echo '<p>Published by <i class="icon-user"></i>' . get_the_author_posts_link() . '<i class="icon-calender-o"></i>' . get_the_date() . '<i class="icon-clock-o"></i>' . get_the_time() . '<p>';
					the_content();

					?>

				</div>

				<?php

				get_template_part( 'templates/blog/post-navigation' );

				if ( comments_open() || get_comments_number() )
					comments_template();

			endwhile;

		else :

			echo "<h1>Ooops...</h1>";
			echo "<p>It looks like the portfolio item you were looking for doesn't exist.</p>";

		endif;

		?>

	</div>

</div>

<?php get_footer(); ?>