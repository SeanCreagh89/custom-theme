<?php

/**
	* Theme Posts | Posts Navigation
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<div class="post-navigation clearfix">

	<?php

	$current_post = get_the_ID();
	$previous_post = get_previous_post();
	$next_post = get_next_post();

	if ( $previous_post->ID != null ) { ?>

	<a href="<?php echo get_the_permalink( $previous_post->ID ); ?>" class="previous-post">

		<?php
		
		$previous_post_thumbnail = get_the_post_thumbnail( $previous_post->ID );

		if ( $previous_post_thumbnail != '' ) {

			echo $previous_post_thumbnail;

		} else {

			echo '<img src="' . get_template_directory_uri() . '/assets/placeholder.jpg" />';

		}

		echo '<span class="post-name remove-spacing">' . get_the_title( $previous_post->ID ) . '</span>';
		echo '<span class="arrow-tabs remove-spacing"><i class="icon-angle-left"></i></span>';

		?>

	</a>

	<?php }

	if ( $next_post->ID != null ) { ?>

	<a href="<?php echo get_the_permalink( $next_post->ID ); ?>" class="next-post">

		<?php

		echo '<span class="arrow-tabs remove-spacing"><i class="icon-angle-right"></i></span>';
		echo '<span class="post-name remove-spacing">' . get_the_title( $next_post->ID ) . '</span>';
		
		$next_post_thumbnail = get_the_post_thumbnail( $next_post->ID );

		if ( $next_post_thumbnail != '' ) {

			echo $next_post_thumbnail;

		} else {

			echo '<img src="' . get_template_directory_uri() . '/assets/placeholder.jpg" />';

		}

		?>

	</a>

	<?php } ?>

</div>