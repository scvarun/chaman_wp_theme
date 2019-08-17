<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Unifato
 */

if ( ! function_exists( 'unifato_the_element_classes' ) ) {
	/**
	 * Display HTML classes for an element.
	 *
	 * @since 1.0
	 *
	 * @param string $context The element we're targeting.
	 * @param string|array $class One or more classes to add to the class list.
	 */
	function unifato_the_element_classes( $context, $class = '' ) {
		echo 'class="' . join( ' ', unifato_get_element_classes( $context, $class ) ) . '"'; // WPCS: XSS ok, sanitization ok.
	}
}

if ( ! function_exists( 'unifato_get_element_classes' ) ) {
	/**
	 * Retrieve HTML classes for an element.
	 *
	 * @since 1.0.0
	 *
	 * @param string $context The element we're targeting.
	 * @param string|array $class One or more classes to add to the class list.
	 * @return array Array of classes.
	 */
	function unifato_get_element_classes( $context, $class = '' ) {
		$classes = array();

		if ( ! empty( $class ) ) {
			if ( ! is_array( $class ) ) {
				$class = preg_split( '#\s+#', $class );
			}

			$classes = array_merge( $classes, $class );
		}

		$classes = array_map( 'esc_attr', $classes );

		return apply_filters( "unifato_{$context}_class", $classes, $class );
	}
}

if ( ! function_exists( 'unifato_body_classes' ) ) {
	add_filter( 'body_class', 'unifato_body_classes' );

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 * @return array
	 */
	function unifato_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		$classes[] = 'header-overlay';

		// Adds a class of no-sidebar when there is no sidebar present.
		// if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		// 	$classes[] = 'no-sidebar';
		// }

		return $classes;
	}
}

if ( ! function_exists( 'unifato_get_microdata' ) ) {
	/**
	 * Get any necessary microdata.
	 *
	 * @since 1.0
	 *
	 * @param string $context The element to target.
	 * @return string Our final attribute to add to the element.
	 */
	function unifato_get_microdata( $context ) {
		$data = false;

		if ( 'body' === $context ) {
			$type = 'WebPage';

			if ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) {
				$type = 'Blog';
			}

			if ( is_search() ) {
				$type = 'SearchResultsPage';
			}

			$type = apply_filters( 'generate_body_itemtype', $type );

			$data = sprintf(
				'itemtype="https://schema.org/%s" itemscope',
				esc_html( $type )
			);
		}

		if ( 'header' === $context ) {
			$data = 'itemtype="https://schema.org/WPHeader" itemscope';
		}

		if ( 'navigation' === $context ) {
			$data = 'itemtype="https://schema.org/SiteNavigationElement" itemscope';
		}

		if ( 'article' === $context ) {
			$type = apply_filters( 'generate_article_itemtype', 'CreativeWork' );

			$data = sprintf(
				'itemtype="https://schema.org/%s" itemscope',
					esc_html( $type )
				);
		}

		if ( 'post-author' === $context ) {
			$data = 'itemprop="author" itemtype="https://schema.org/Person" itemscope';
		}

		if ( 'comment-body' === $context ) {
			$data = 'itemtype="https://schema.org/Comment" itemscope';
		}

		if ( 'comment-author' === $context ) {
			$data = 'itemprop="author" itemtype="https://schema.org/Person" itemscope';
		}

		if ( 'sidebar' === $context ) {
			$data = 'itemtype="https://schema.org/WPSideBar" itemscope';
		}

		if ( 'footer' === $context ) {
			$data = 'itemtype="https://schema.org/WPFooter" itemscope';
		}

		if ( $data ) {
			return apply_filters( "generate_{$context}_microdata", $data );
		}
	}
}

if ( ! function_exists( 'unifato_the_microdata' ) ) {
	/**
	 * Output our microdata for an element.
	 *
	 * @since 1.0
	 *
	 * @param $context The element to target.
	 * @return string The microdata.
	 */
	function unifato_the_microdata( $context ) {
		echo unifato_get_microdata( $context ); // WPCS: XSS ok, sanitization ok.
	}
}
