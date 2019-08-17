<?php
/**
 * Theme Setup
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly.
}

// Set our theme version.
define( 'THEME_VERSION', '1.0.0' );

if ( ! function_exists( 'unifato_theme_setup' ) ) {
  add_action( 'after_setup_theme', 'unifato_theme_setup' );

  /**
   * Setup theme defaults
   *
   * @since 1.0.0
   */
  function unifato_theme_setup() {

    // Makes the theme translation ready
    // load_theme_textdomain( 'unifato', get_stylesheet_directory() . '/languages' );

    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );

    add_theme_support( 'customize-selective-refresh-widgets' );
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-color-palette', array() );
    add_theme_support( 'responsive-embeds' );

    // Post Thumbnail Sizes
    add_theme_support( 'post-thumbnails' );
    add_image_size ( 'unifato-archive', 727, 560, true );
    add_image_size ( 'unifato-archive-slider', 626, 101, true );
    add_image_size ( 'unifato-thumbnail', 300, 300, true );

    // Register Navigatiion Menus
    register_nav_menus( array(
      'primary' => esc_html__( 'Main Menu', 'unifato' ),
      'mobile' => esc_html__( 'Mobile Menu', 'unifato' )
    ) );

    // Switch default core markup for comment form, and comments to output valid HTML5.
    add_theme_support( 'html5', array(
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ) );

    // Set up the WordPress core custom background feature.
    add_theme_support( 'custom-background', apply_filters( 'unifato_custom_background_args', array(
      'default-color' => 'e5e5e5',
      'default-image' => '',
    ) ) );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
      'height'      => 100,
      'width'       => 226,
      'flex-width'  => true,
      'flex-height' => true,
    ) );

    /**
     * Set the content width to something large
     * We set a more accurate width in generate_smart_content_width()
     */
    global $content_width;
    if ( ! isset( $content_width ) ) {
      $content_width = 1200;
    }
  }
}