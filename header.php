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
	<div id="top"></div>

	<nav id="navbar" class="navbar navbar-expand-sm navbar-dark sticky-wrapper" <?php unifato_the_microdata( 'header' ); ?> role="banner">
		<?php unifato_construct_logo() ?>

		<?php
		if (has_nav_menu( 'mobile' )): ?>
		<a href="javascript:void(0);" class="nav-toggle d-block d-sm-none" data-target="#mobile-navigation">
	    Menu
	  </a>

	  <!-- Mobile Navigation -->
		<div class="nav-container mobile-nav invisible" id="mobile-navigation">
			<a href="javascript:void(0);" class="nav-toggle d-block d-sm-none mb-1" data-target="#mobile-navigation">
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

			<?php
				$facebook = get_theme_mod('chaman_options__social__facebook_url');
				$linkedin = get_theme_mod('chaman_options__social__linked_url');
				$instagram = get_theme_mod('chaman_options__social__instagram_url');
				if($facebook != '' || $linkedin != '' || $instagram != ''): ?>
			?>
			<div class="social-links text-white">
				<h6 class="text-uppercase">Follow Us</h6>
				<ul class="list-unstyled">
					<?php if($facebook != ''): ?>
					<li><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook-f"></i></a></li>
					<?php endif; ?>
					<?php if($linkedin != ''): ?>
					<li><a href="<?php echo $linkedin; ?>"><i class="fa fa-linkedin-square"></i></a></li>
					<?php endif; ?>
					<?php if($instagram != ''): ?>
					<li><a href="<?php echo $instagram; ?>"><i class="fa fa-instagram"></i></a></li>
					<?php endif; ?>	
				</ul>
			</div><!-- /.social-links -->
			<?php endif; ?>
		</div><!-- /.nav-container -->

		<?php endif;

		if (has_nav_menu('primary')): ?>
		<!-- Main Navigation -->
		<div class="nav-container d-none d-sm-block" <?php unifato_the_microdata( 'navigation' ); ?>>
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

	<div class="content-wrapper"<?php echo unifato_content_wrapper_attr(); ?>>
		
