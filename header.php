<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>

<link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>	
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">

	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<!-- site-header -->
	<header class="site-header">

		<!-- hd-search -->
		<div class="hd-search">
			<?php get_search_form(); ?>
		</div><!-- /hd-search -->

		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
		
		<nav class="site-nav">

			<?php

			$args = array(
					'theme_location' => 'primary'
				);

			?>

			<?php wp_nav_menu( $args ); ?>
		</nav>

	</header><!-- /site-header -->

	<div class="container">

