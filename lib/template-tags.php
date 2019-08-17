<?php
/**
* Template Tags
*
* @package Unifato
*/

// Layout ------------------------------------------------------------------------
function update_global_config($config) {
  if(isset($config['header_skin']))
    $GLOBALS['header_skin'] = $config['header_skin'];
}

function get_header( $config = array() ) {
  update_global_config($config);

  $templates[] = 'partials/header.php';
  $located = locate_template( $templates, false );

  if( $located ) {
    extract( $config );

    if( isset( $body_class ) && $body_class ) {
      add_body_class( $body_class );
    }
    if( isset( $styles ) && $styles ) {
      foreach($styles as $style) {
        enqueue_style( $style );
      }
    }
    if( isset( $scripts ) && $scripts ) {
      foreach($scripts as $script) {
        enqueue_script( $script );
      }
    }
    require_once $located;
  }
}

function get_header_error($config) {

  $templates[] = 'partials/header-alt.php';
  $located = locate_template( $templates, false );

  if( $located ) {
    extract( $config );

    if( isset( $body_class ) && $body_class ) {
      add_body_class( $body_class );
    }
    if( isset( $styles ) && $styles ) {
      foreach($styles as $style) {
        enqueue_style( $style );
      }
    }
    if( isset( $scripts ) && $scripts ) {
      foreach($scripts as $script) {
        enqueue_script( $script );
      }
    }
    require_once $located;
  }
}

function get_page_title( $config = array() ) {

  $templates[] = 'partials/page-title.php';
  $located = locate_template( $templates, false );

  if( $located ) {
    extract( $config );
    require_once $located;
  }
}

function get_page_heading( $title, $emptyString = 'Home' ) {
  $heading = '';
  if(isset($title)) {
    $type = gettype($title);
    if($type === 'string')
      $heading = $title;
    else if($type === 'array')
      $heading = $title[0];
  } else
    $heading = $emptyString;
  return $heading;
}

function get_page_title_alt( $config = array() ) {

  $templates[] = 'partials/page-title-alt.php';
  $located = locate_template( $templates, false );

  if( $located ) {
    extract( $config );
    require_once $located;
  }
}

function get_footer( $config = array() ) {

  $templates[] = 'partials/footer.php';
  $located = locate_template( $templates, false );

  if( $located ) {
    extract( $config );
    require_once $located;
  }
}

// Markup ------------------------------------------------------------------------
function add_body_class($class) {
  if(!empty($class)) {
    global $body_classes;
    $body_classes[] = is_array($class) ? join(' ', $class) : $class;
  }
}
function body_class($class='') {
  global $body_classes;

  add_body_class($class);

  if(empty($body_classes)) {
    return;
  }

  echo ' class="' . join( ' ', array_unique($body_classes)) . '"';
}