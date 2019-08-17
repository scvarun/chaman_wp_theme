<?php
/**
 * Init the engine
 *
 * @package Unifato
 */

define('ABSPATH', dirname(dirname(__FILE__)) . '/');

$GLOBALS['body_class'] = '';
$GLOBALS['body_classes'] = array();
$GLOBALS['enable_relative_nav'] = false;

// Includes -------------------------------------------------
include_once 'functions.php';
include_once 'script-loader.php';
include_once 'template-tags.php';

// Vendors
$fonts = 'assets/fonts';
$js = 'assets/js';
$css = 'assets/css';
$vendors = 'assets/vendors';
$node = 'node_modules';

// CSS
enqueue_style( 'template-fonts', $fonts . '/fonts.css' );
enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' );
enqueue_style( 'slick', $vendors . '/slick-slider/slick.css' );
enqueue_style( 'template', $css . '/style.css', 99 );
enqueue_style( 'custom', $css . '/custom.css', 99 );

// JS
enqueue_script( 'jquery', $vendors . '/jquery/jquery.min.js' );
enqueue_script( 'bootstrap', $vendors . '/bootstrap/bootstrap.min.js' );
enqueue_script( 'popper', $vendors . '/bootstrap/popper.min.js' );
enqueue_script( 'lodash', $vendors . '/lodash/lodash.min.js' );
enqueue_script( 'stickybits', $vendors . '/stickybits/stickybits.min.js' );
enqueue_script( 'slick', $vendors . '/slick-slider/slick.min.js' );
enqueue_script( 'template', $js . '/template.js', 99);
enqueue_script( 'custom', $js . '/custom.js', 99 );