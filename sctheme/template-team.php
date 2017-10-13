<?php

/**
	* Theme Team Members Template
	*
	* Template Name: Team Members
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

				query_posts( array( 'post_type' => 'team-members', 'post_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );

				while ( have_posts() ) : the_post(); ?>

				<div id="team" class="post-wrapper">

					<div class="featured-image remove-spacing">

						<?php

						$featured_image = get_the_post_thumbnail();

						if ( $featured_image != '' )
							echo '<a>' . $featured_image . '</a>';

						else
							echo '<a><img src="' . get_template_directory_uri() . '/assets/placeholder.jpg" /></a>';

						?>

					</div>

					<div class="post-container remove-spacing">

						<?php

						$member = get_post_meta( $post->ID, '_team_member_name_key', true );

						if ( $member != "" )
							echo '<h4 class="post-title">' . $member . '</h4>';

						else
							echo '<h4 class="post-title">' . get_the_title() . '</h4>';

						$position = get_post_meta( $post->ID, '_team_member_position_key', true );

						if ( $position != "" )
							echo '<span class="post-position">' . $position . '</span>';

						echo '<p>' . get_the_content() . '</p>';

						$facebook = get_post_meta( $post->ID, '_team_member_facebook_key', true );
						$twitter = get_post_meta( $post->ID, '_team_member_twitter_key', true );
						$linkedin = get_post_meta( $post->ID, '_team_member_linkedin_key', true );

						if ( $facebook != "" || $twitter != "" || $linkedin != "" ) { ?>

						<div class="post-social-media">

							<?php

							if ( $facebook != "" )
								echo '<a href="' . $facebook . '" target="_blank"><i class="icon-facebook"></i></a>';

							if ( $twitter != "" )
								echo '<a href="' . $twitter . '" target="_blank"><i class="icon-twitter"></i></a>';

							if ( $linkedin != "" )
								echo '<a href="' . $linkedin . '" target="_blank"><i class="icon-linkedin"></i></a>';

							?>

						</div>

						<?php } ?>

					</div>

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