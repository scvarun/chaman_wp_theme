<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Unifato
 */


if ( ! function_exists( 'unifato_pingback_header' ) ) {
	add_action( 'wp_head', 'unifato_pingback_header' );

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 */
	function unifato_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}

/*
 * ==========================
 * To disable Auto-P tag in Contact form 7
 * ==========================
 */
define( 'WPCF7_AUTOP', false );