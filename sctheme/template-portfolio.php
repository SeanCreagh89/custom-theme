<?php

/**
	* Theme Portfolio Template
	*
	* Template Name: Portfolio
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

				query_posts( array( 'post_type' => 'portfolio' ) );

				while ( have_posts() ) : the_post(); ?>

				<div id="portfolio" class="post-wrapper">

					<a href="<?php echo get_the_permalink(); ?>" class="remove-spacing">

						<div class="featured-image">

							<?php 

							$featured_image = get_the_post_thumbnail();

							if ( $featured_image != '' ) {

								echo $featured_image;

							} else {

								echo '<img src="' . get_template_directory_uri() . '/assets/placeholder.jpg" />';

							}

							?>

						</div>

						<?php $overlay = 'style="background: url( ' . get_template_directory_uri() . '/assets/overlay.png) no-repeat bottom; background-size: 100%;"'; ?>

						<div class="overlay" <?php echo $overlay; ?>></div>

						<div class="post-title">

							<h3>

								<?php the_title(); ?>

							</h3>

						</div>

					</a>

				</div>

				<?php

				endwhile;

			else :

				echo "<h1>Ooops...</h1>";
				echo "<p>It looks like there are no portfolio items yet.</p>";

			endif;

			?>

		</div>

	</div>

</div>

<?php get_footer(); ?>