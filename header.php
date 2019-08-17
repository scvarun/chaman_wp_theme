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

	<?php
		/**
		 * Header
		 *
		 * @since 1.0.0
		 */
		do_action( 'unifato_header' );
	?>

	<div id="top"></div>
	<div class="content-wrapper">
		
