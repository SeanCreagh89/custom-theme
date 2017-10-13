<?php

/**
	* Theme Posts | Masonry Template
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div id="masonry" class="post-wrapper">

	<div class="featured-image remove-spacing">

		<?php 

		$featured_image = get_the_post_thumbnail();

		if ( $featured_image != '' ) {

			echo '<a href="' . get_the_permalink() .'">' . $featured_image . '</a>';

		} else {

			echo '<a href="' . get_the_permalink() .'"><img src="' . get_template_directory_uri() . '/assets/placeholder.jpg" /></a>';

		}

		?>

	</div>

	<div class="post-container remove-spacing clearfix">

		<a class="post-title" href="<?php the_permalink(); ?>"><h4><?php the_title(); ?></h4></a>

		<span class="post-metadata">

			<?php echo 'Published by<i class="icon-user"></i>' . get_the_author_posts_link(); ?>

		</span>

		<span class="post-metadata">

			<?php echo '<i class="icon-calender-o"></i>' . get_the_date() . '<i class="icon-clock-o"></i>' . get_the_time(); ?>

		</span>

		<p class="post-excerpt">

			<?php echo get_the_excerpt(); ?>

		</p>

	</div>

</div>