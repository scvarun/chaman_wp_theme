<?php
/**
 * General functions.
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
* ----------------------------------------------------------------------------------------
* Enqueue Scripts and Styles
* ----------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'unifato_theme_scripts' ) ) {
  add_action( 'wp_enqueue_scripts', 'unifato_theme_scripts' );

	function unifato_theme_scripts() {
		$dir_uri = get_template_directory_uri() . "/assets";

    wp_enqueue_style( 'unifato-style', get_stylesheet_uri() );

		wp_enqueue_style( 'unifato-fonts', $dir_uri . "/fonts/fonts.css", false, THEME_VERSION, 'all' );
    wp_enqueue_style( 'font-awesome', "//cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css", false, THEME_VERSION, 'all' );
    wp_enqueue_style( 'wpos-slick-style', $dir_uri . '/vendors/slick-slider/slick.css', false, THEME_VERSION, 'all' );
		wp_enqueue_style( 'unifato-main', $dir_uri . "/css/style.css", false, THEME_VERSION, 'all' );
    wp_enqueue_style( 'unifato-custom', $dir_uri . "/css/custom.css", false, THEME_VERSION, 'all' );

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap', $dir_uri . '/vendors/bootstrap/bootstrap.min.js', array('jquery'), THEME_VERSION, true);
		wp_register_script( 'bootstrap-popper', $dir_uri . '/vendors/bootstrap/popper.min.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script( 'lodash', $dir_uri . '/vendors/lodash/lodash.min.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script( 'stickybits', $dir_uri . '/vendors/stickybits/stickybits.min.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script( 'animejs', $dir_uri . '/vendors/animejs/anime.min.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script( 'smooth-scroll', $dir_uri . '/vendors/smooth-scroll/smooth-scroll.js', array('jquery'), THEME_VERSION, true);
    // wp_enqueue_script( 'luxyjs', $dir_uri . '/vendors/luxyjs/luxy.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script( 'modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js', THEME_VERSION, true );
    // wp_enqueue_script( 'css-parser', $dir_uri . '/vendors/filter-polyfill/cssParser.js', array('jquery'), THEME_VERSION, true);
    // wp_add_inline_script('css-parser', "var polyfilter_scriptpath = '" . $dir_uri . "/vendors/filter-polyfill/';");
    // wp_enqueue_script( 'css-filters-polyfill', $dir_uri . '/vendors/filter-polyfill/css-filters-polyfill.js', array('jquery'), THEME_VERSION, true);

    wp_enqueue_script( 'wpos-slick-jquery', $dir_uri . '/vendors/slick-slider/slick.min.js', array('jquery'), THEME_VERSION, true);
		
    wp_enqueue_script( 'unifato-main', $dir_uri . '/js/template.js', array('jquery'), THEME_VERSION, true);
    wp_enqueue_script( 'unifato-custom', $dir_uri . '/js/custom.js', array('jquery'), THEME_VERSION, true);
	}
}




/**
* ----------------------------------------------------------------------------------------
* Add Footer to Content
* ----------------------------------------------------------------------------------------
*/
if ( ! function_exists( 'unifato_main_footer' ) ) {
  add_action('unifato_main_footer', 'unifato_main_footer');

  function unifato_main_footer() {
    try {
      if(!class_exists('ChamanAddons\\Chaman_Addons')) {
        //Plugin Not exists or activated
        throw new Exception('\"Chaman Addons\" not installed or activated');
      }


      /* Values from Theme Options */
      $footer = get_theme_mod('chaman_options__footer__default_footer');

      if($footer == 'default') {
        echo get_template_part( 'inc/structure/footer', 'none' );
        return;
      }

      $footer = ltrim($footer, '_');
      $footer = (int)$footer;
      /* End Theme Options */

      /* Values from Page Options */
      $show_default_footer = get_post_meta(get_the_id(), '__show_default_footer', true);

      if( $show_default_footer == 'no' ) {
        $override_footer = get_post_meta(get_the_id(), '__override_footer', true);
        $footer = (int)$override_footer;
      }
      /* End Page Options */


      if( gettype($footer) != 'integer' )
        throw new Exception("Footer value provided is not an integer. Value type provided: " . gettype($footer), 1);
      else if( $footer <= 0 ) 
        throw new Exception("Footer value not greater than zero.", 1);


      /* Query */
      $args = [
        'post_type'   => 'footer',
        'p'           => $footer,
      ];

      $query = new WP_Query($args);

      if( $query->have_posts() ) {
        while( $query->have_posts() ) {
          $query->the_post();
          the_content();
          break;
        }
      } else {
        throw new Exception("No footers found for the provided id", 1);
      }

      wp_reset_postdata();
      /* End Query */
    } catch(Exception $e) {
      ?> <script>console.error('Footer error: ' + '<?php echo $e->getMessage(); ?>');</script> <?php
      echo get_template_part( 'inc/structure/footer', 'none' );
    }
  }
}
