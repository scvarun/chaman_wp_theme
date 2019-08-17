<?php
/**
 * Header elements.
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'unifato_construct_logo' ) ) {
	/**
	 * Construct Logo Area
	 *
	 * @since 1.0.0
	 */
	function unifato_construct_logo() {
		/**
		 * generate_before_logo hook.
		 *
		 * @since 1.0.0
		 */
		$logo_images = array();

		$logo_list = [
			'mobile' 		=> 'chaman_options__title_tagline__mobile_logo', 
			'sticky' 		=> 'chaman_options__title_tagline__sticky_logo',
			'default' 	=> 'custom_logo',
		];

		if( function_exists('the_custom_logo') ) {
			foreach($logo_list as $key => $logo_type) {
				$logo_mod = get_theme_mod($logo_type);
				if( $logo_mod ) {
					$logo_url = wp_get_attachment_image_src( $logo_mod, 'full' );
					$logo_url = esc_url( apply_filters( 'unifato_logo', $logo_url[0] ) );
					if($logo_url !== NULL)
						array_push($logo_images, unifato_print_logo($key, $logo_url));
				}
			}

			// Print our HTML.
			echo apply_filters( 'unifato_logo_output', sprintf( // WPCS: XSS ok, sanitization ok.
				'<a href="%1$s" title="%2$s" rel="home" class="navbar-brand">
					%3$s
				</a>',
				esc_url( apply_filters( 'unifato_logo_href' , home_url( '/' ) ) ),
				esc_attr( apply_filters( 'unifato_logo_title', get_bloginfo( 'name', 'display' ) ) ),
				implode(' ', $logo_images)
			) );
		}
	}
}

if( ! function_exists('unifato_print_logo') ) {
	function unifato_print_logo($key, $logo_url) {
		$attr = apply_filters( 'unifato_logo_attributes', array(
			'class' => $key . '-logo',
			'alt'	=> esc_attr( apply_filters( 'unifato_logo_title', get_bloginfo( 'name', 'display' ) ) ),
			'src'	=> $logo_url,
			'title'	=> esc_attr( apply_filters( 'unifato_logo_title', get_bloginfo( 'name', 'display' ) ) ),
		) );

		$attr = array_map( 'esc_attr', $attr );

		$html_attr = '';
		foreach ( $attr as $name => $value ) {
			$html_attr .= " $name=" . '"' . $value . '"';
		}

		return sprintf(
			'<img %1$s />',
			$html_attr
		);
	}
}

if ( ! function_exists( 'unifato_title' ) ) {
	/**
	 * Page Title
	 *
	 * @since 1.0.0
	 */
	function unifato_title() {

		if ( ! is_404() ) :
			?>
			<!-- Page Title Area -->
			<div class="page-title <?php if(is_single()) echo ' page-title-short'; ?>">
				<div class="container">
					<?php

						unifato_breadcrumb();

					?>
				</div><!-- /.container -->
			</div><!-- /.page-title -->
			<?php
		endif;
	}
}
