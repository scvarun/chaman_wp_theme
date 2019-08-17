<?php
/**
 * 
 *
 * @package Unifato
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.\
}


function mytheme_custom_styles() {
    
}


if ( ! function_exists( 'unifato_theme_options_styling' ) ) {
	add_action( 'wp_enqueue_scripts', 'unifato_theme_options_styling' );

	/**
	 * Theme options styling
	 *
	 * @since 1.0.0
	 */
  function unifato_theme_options_styling() {
    $custom_css = '
/* 
 * ==============
 * COLORS
 * ==============
 */

// Backgrounds
.bg-primary,
.map-marker, .map-marker::before, .map-marker::after,
.shape-circle,
.accordion-default h5 button::before,
.accordion-default h5 button[aria-expanded="true"]::before,
.btn-line-under::before,
.btn-line-under::after,
.counter-box-line-under::after,
.price_slider_amount button:hover,
.social-list-colored-circle a,
.tabs-vertical .nav-link.active::after,
.tagcloud a::before {
	background: :primary;
}

.tabs-vertical .nav-link.active::after {
  background: :secondary;
}

.site-navigation .menu-right-sidebar > a.sidebar-toggle,
.site-navigation .menu-right-sidebar > a.sidebar-toggle:hover,
.accordion-default h5 button,
.right-sidebar .close,
.woocommerce a.button.alt,
.woocommerce input.button.alt,
.woocommerce button.button.alt,
.woocommerce .wc-tab .submit,
.woocommerce .checkout_coupon button,
.woocommerce .woocommerce-form-login button,
.woocommerce .woocommerce-form-register button,
.tabs-default .nav-link:after,
.comment-reply-link,
.search-form button,
.search-form input[type="submit"],
.widget_categories button,
.widget_categories input[type="submit"],
.woocommerce-product-search button,
.woocommerce-product-search input[type="submit"],
.post-password-form button,
.post-password-form buttoninput[type="submit"],
.widget_calendar tbody a {
  background: :primary;
  background: linear-gradient(45deg, :primary, :secondary);
}

.btn-fancy,
.btn-cta,
.error-page .error-search-form .btn,
.coming-soon-page .newsletter-form .btn,
.team-hover-fancy .team-content:after {
  background: :primary;
  background: linear-gradient(225deg, :primary, :secondary);
}

.error-title {
  background: linear-gradient(135deg, :primary, :secondary);
}

.form-material .form-control {
  background-image: linear-gradient(:primary, :primary), linear-gradient(:theme-border-color, :theme-border-color);
}

// Colors
.color-primary,
.text-primary,
.fancy-heading a:hover,
h1 a:hover, .h1 a:hover,
h2 a:hover, .h2 a:hover,
h3 a:hover, .h3 a:hover,
h4 a:hover, .h4 a:hover,
h5 a:hover, .h5 a:hover,
h6 a:hover, .h6 a:hover,
.blogpost-mediabox footer a:hover,
.pricing-box-minimal.pricing-box-active h4,
.pricing-box-minimal.pricing-box-active header > small,
.price,
.price ins,
.price del,
.uni-megamenu .menu-item[class*="col-"] > a,
.uni-megamenu .menu-item[class*="col-"] > a:hover,
.tabs-border .nav-link.active,
.tabs-shadow .nav-link.active,
.tabs-vertical .nav-link:hover,
.tabs-vertical .nav-link.active {
	color: :primary;
}

.text-tertiary {
  color: :tertiary;
}

// Border Color
.woocommerce-product-gallery .flex-control-thumbs li img.flex-active {
  border-color: :primary;
}

.theme-border-color {
  border-color: :theme-border-color;
}

/* 
 * ==============
 * FONT SIZE
 * ==============
 */
h1, .h1,
.h1-font-size,
.countdown-minimal .countdown-content span strong,
.event-item .date-container .date {
  font-size: :h1-font-size;
}

h2, .h2,
.h2-font-size,
.error-subtitle {
  font-size: :h2-font-size;
}

h3, .h3,
.h3-font-size,
.btn-cta,
.element-cta-1 h4,
.icon-box i,
.pricing-currency,
.wc-tab h2,
.cart_totals h2,
.woocommerce-checkout-review-order h2,
form.woocommerce-checkout h3 {
  font-size: :h3-font-size;
}

h4, .h4,
.h4-font-size,
.cart_totals .order-total .woocommerce-Price-amount,
.woocommerce-checkout-review-order .order-total .woocommerce-Price-amount {
  font-size: :h4-font-size;
}

h5, .h5,
.h5-font-size,
.accordion h5,
.icon-box-fancy h6,
.quotes-carousel blockquote {
	font-size: :h5-font-size;
}

h6, .h6,
.h6-font-size {
  font-size: :h6-font-size;
}

/* 
 * ==============
 * FONT FAMILY
 * ==============
 */
.accordion h5 {
	font-family: :font-family-base;
}

/* 
 * ==============
 * HEADER
 * ==============
 */
.header-navbar {
  height: calc(:nav-height + 1px);
}

body.header-overlay,
body.header-overlay .navbar {
  margin-top: calc(-:nav-height - 1px);
}

.menu-search .form-group:after,
.site-navigation > li.menu-item > a {
  line-height: :nav-height;
}

body.header-overlay .navbar.js-is-stuck,
body.header-overlay .navbar.js-is-sticky {
  margin-top: calc(-:sticky-nav-height);
}
.header-navbar.navbar.js-is-sticky,
.header-navbar.navbar.js-is-stuck {
  height: :sticky-nav-height;
}

.js-is-stuck .menu-search .form-group:after,
.js-is-sticky .menu-search .form-group:after,
.js-is-stuck .site-navigation > li > a,
.js-is-sticky .site-navigation > li > a {
  line-height: :sticky-nav-height;
}

.nav-container .site-navigation .sub-menu {
  min-width: :min-submenu-width;
}

.site-navigation li.menu-item {
  font-size: :menu-item-font-size;
}';

    $custom_css = strtr($custom_css, [
      ':primary' 					    => get_theme_mod('colors__primary'),
      ':secondary'            => get_theme_mod('colors__secondary'),
      ':tertiary' 				    => get_theme_mod('colors__tertiary'),
      ':theme-border-color'   => get_theme_mod('colors__theme_border_color'),
      ':font-size-base'       => get_theme_mod('unifato_options__fonts__font_size_base'),
      ':h1-font-size' 		    => get_theme_mod('unifato_options__fonts__h1_font_size'),
      ':h2-font-size' 		    => get_theme_mod('unifato_options__fonts__h2_font_size'),
      ':h3-font-size' 		    => get_theme_mod('unifato_options__fonts__h3_font_size'),
      ':h4-font-size' 		    => get_theme_mod('unifato_options__fonts__h4_font_size'),
      ':h5-font-size' 		    => get_theme_mod('unifato_options__fonts__h5_font_size'),
      ':h6-font-size' 		    => get_theme_mod('unifato_options__fonts__h6_font_size'),
      ':nav-height'           => get_theme_mod('unifato_options__header__nav_height'),
      ':sticky-nav-height'    => get_theme_mod('unifato_options__header__sticky_nav_height'),
      ':min-submenu-width'    => get_theme_mod('unifato_options__header__min_submenu_width'),
      ':menu-item-font-size'  => get_theme_mod('unifato_options__header__nav_menu_item_font_size'),
    ]);

    wp_enqueue_style( 'unifato-custom', get_template_directory_uri() . "/assets/css/custom.css", false, THEME_VERSION, 'all' );
    wp_add_inline_style( 'unifato-custom', $custom_css );
  }
}
