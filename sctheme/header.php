<?php

/**
	* Theme Header
	*
	* @package SCTheme
	* @author Sean Creagh
*/



?>

<!DOCTYPE html>

<html>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php wp_head(); ?>
</head>

<body>

	<header>

		<?php

		if ( has_nav_menu( 'secondary' ) || is_active_sidebar( 'header-widget-tb' ) ) {
			
			get_template_part( 'templates/header/header-top-bar' );

		}

		?>

		<div id="main-bar" class="wrapper">

			<div class="container clearfix">

				<?php

				theme_identity();

				if ( has_nav_menu( 'primary' ) ) {

					get_template_part( 'templates/header/header-navigation' );

				}

				?>

			</div>

		</div>

		<?php theme_breadcrumbs(); ?>

	</header>