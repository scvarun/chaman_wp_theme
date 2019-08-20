<?php
/**
 * The template for displaying the header.
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php unifato_the_microdata( 'body' ); ?>>
<div id="wrapper" class="wrapper">

	<nav id="navbar" class="navbar navbar-expand-md navbar-dark sticky-wrapper" <?php unifato_the_microdata( 'header' ); ?> role="banner">
		<?php unifato_construct_logo() ?>

		<?php
		if (has_nav_menu( 'mobile' )): ?>
		<a href="javascript:void(0);" class="nav-toggle d-block d-md-none" data-target="#mobile-navigation">
	    Menu
	  </a>

	  <!-- Mobile Navigation -->
		<div class="nav-container mobile-nav invisible" id="mobile-navigation">
			<a href="javascript:void(0);" class="nav-toggle d-block d-md-none mb-1" data-target="#mobile-navigation">
	      <img src="<?php echo get_template_directory_uri() ?>/assets/img/mobile-nav-arrow.png" alt="" />
	    </a>

			<?php
			wp_nav_menu(array(
				'theme_location'	=> 'mobile',
				'menu'				=> '',
				'container'		=> false,
				'menu_id'			=> 'navbar-menu-mobile',
				'menu_class'	=> 'navbar-nav main-navigation',
				'depth'				=> 1
			)); ?>
		</div><!-- /.nav-container -->

		<?php endif;

		if (has_nav_menu('primary')): ?>
		<!-- Main Navigation -->
		<div class="nav-container d-none d-md-block" <?php unifato_the_microdata( 'navigation' ); ?>>
			<?php
			wp_nav_menu(array(
				'theme_location'	=> 'primary',
				'menu'				=> '',
				'container'		=> false,
				'menu_id'			=> 'navbar-menu-main',
				'menu_class'	=> 'navbar-nav main-navigation',
				'depth'				=> 1
			)); ?>
		</div><!-- /.nav-container -->
		<?php endif;
		?>
	</nav><!-- #navbar -->

	<div id="top"></div>
	<div class="content-wrapper"<?php echo unifato_content_wrapper_attr(); ?>>
		
