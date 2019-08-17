<?php
/**
 * Header elements.
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'unifato_construct_header' ) ) {
	add_action( 'unifato_header', 'unifato_construct_header' );

	/**
	 * Construct Header
	 *
	 * @since 1.0
	 */
	function unifato_construct_header() {

		/**
		 * Display before header container
		 *
		 * @since 1.0
		 */
		do_action( 'unifato_header_before' );

		?>
    <nav id="navbar" <?php unifato_the_element_classes( 'header' ); ?> <?php unifato_the_microdata( 'header' ); ?> role="banner">
			<?php
				/**
				 * Display before header content
				 *
				 * @since 1.0
				 */
				do_action( 'unifato_before_header_content' );


				/**
				 * Main Header Content
				 *
				 * @since 1.0
				 *
				 * @hooked unifato_contruct_logo - 10
				 * @hooked unifato_main_nav - 20
				 * @hooked unifato_nav_quick_links - 30
				 */
				do_action( 'unifato_header_content' );


				/**
				 * Display after header content
				 *
				 * @since 1.0
				 *
				 * @hooked unifato_quick_links - 10
				 */
				do_action( 'unifato_after_header_content' );
			?>
    </nav><!-- /#navbar -->
		<?php

		/**
		 * Display after header container
		 *
		 * @since 1.0
		 */
		do_action( 'unifato_header_after' );
  }
}

if ( ! function_exists( 'unifato_construct_logo' ) ) {
	add_action( 'unifato_header_content', 'unifato_construct_logo', 10 );

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
		do_action( 'unifato_before_logo' );

		$logo_images = array();

		$logo_list = [
			'mobile' 		=> 'unifato_options__title_tagline__mobilr_logo', 
			'sticky' 		=> 'unifato_options__title_tagline__sticky_logo',
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

		/**
		 * generate_after_logo hook.
		 *
		 * @since 1.0.0
		 */
		do_action( 'unifato_after_logo' );
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
 
if ( ! function_exists( 'unifato_main_nav' ) ) {
	add_action( 'unifato_header_content', 'unifato_main_nav', 20 );

	/**
	 * Main Navigation Area
	 *
	 * @since 1.0.0
	 */
	function unifato_main_nav() {
		$menu = '';

		if (has_nav_menu( 'mobile' )): ?>
			<a href="javascript:void(0);" class="nav-toggle d-block d-lg-none" data-target="#navigation-1">
		    Menu
		  </a>

		  <!-- Mobile Navigation -->
			<div class="nav-container mobile-nav invisible" data-target="#navigation-1">
				<a href="javascript:void(0);" class="nav-toggle d-block d-lg-none mb-1" data-target="#navigation-1">
		      <img src="<?php get_template_directory_uri() ?>/assets/img/mobile-nav-arrow.png" alt="" />
		    </a>

				<?php
				wp_nav_menu(array(
					'theme_location'	=> 'mobile',
					'menu'				=> $menu,
					'container'		=> false,
					'menu_id'			=> 'navbar-menu-mobile',
					'menu_class'	=> 'navbar-nav man-navigation',
					'depth'				=> 1
				)); ?>
			</div>

		<?php endif;

		if (has_nav_menu('primary')): ?>
		<!-- Main Navigation -->
		<div class="nav-container d-none d-lg-block" <?php unifato_the_microdata( 'navigation' ); ?>>
			<?php
			wp_nav_menu(array(
				'theme_location'	=> 'primary',
				'menu'				=> $menu,
				'container'		=> false,
				'menu_id'			=> 'navbar-menu-main',
				'menu_class'	=> 'navbar-nav man-navigation',
				'depth'				=> 1
			)); ?>
		</div>
		<?php endif;
	}
}

if ( ! function_exists( 'unifato_toggle_sidebar' ) ) {
	add_action( 'unifato_nav_quick_links', 'unifato_toggle_sidebar', 30 );

	/**
	 * Quick Search in Header
	 *
	 * @since 1.0.0
	 */
	function unifato_toggle_sidebar() {
		if ( is_active_sidebar( 'toggle-sidebar' ) ) :
		?>
			
			<li class="menu-item menu-right-sidebar">
	      <a href="javascript: void(0);" id="sidebar-toggle-2" class="sidebar-toggle" data-template-sidebar-trigger="#toggle-sidebar-2" data-template-open="false">
	        <i class="feather-menu"></i>
	      </a>

				<div id="toggle-sidebar-2" class="sidebar right-sidebar" data-template-open="false">
	        <div class="right-sidebar-body">
	          <button class="close">
              <i class="feather-x"></i>
            </button>

						<?php dynamic_sidebar( 'toggle-sidebar' ); ?>
	        </div><!-- /.right-sidebar-body -->
	      </div><!-- /.menu-right-sidebar -->
	    </li><!-- /.menu-right-sidebar -->

		<?php
		endif;
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

			/**
			 * Display before page title are
			 *
			 * @since 1.0.0
			 */
			do_action( 'unifato_title_before' );
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
			/**
			 * Display after page title area
			 *
			 * @since 1.0.0
			 */
			do_action( 'unifato_title_after' );

		endif;
	}
}
