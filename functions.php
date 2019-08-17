<?php
/**
 * Unifato functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require get_template_directory() . '/inc/setup.php';
require get_template_directory() . '/inc/general.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/structure/header.php';
require get_template_directory() . '/inc/structure/blog.php';
// require get_template_directory() . '/inc/structure/styles.php';
