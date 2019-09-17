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
add_filter('wpcf7_autop_or_not', '__return_false');


// ADDING BROWSER SPECIFIC CLASSES
if (!function_exists('gst_browser_body_class')) {
  function gst_browser_body_class($classes) {
    global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
    
    if($is_lynx) $classes[] = 'lynx';
    elseif($is_gecko) $classes[] = 'gecko';
    elseif($is_opera) $classes[] = 'opera';
    elseif($is_NS4) $classes[] = 'ns4';
    elseif($is_safari) $classes[] = 'webkit safari';
    elseif($is_chrome) $classes[] = 'webkit chrome';
    elseif($is_IE) $classes[] = 'ie';
    else $classes[] = 'unknown';
    
    if($is_iphone) $classes[] = 'iphone';
    return $classes;
  }
}
add_filter('body_class','gst_browser_body_class');