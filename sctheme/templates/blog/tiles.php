<?php

/**
	* Theme Posts | Tile Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div id="tiles" class="post-wrapper">

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