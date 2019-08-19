(function($) {
  'use strict';

  if( window.lodash === undefined )
    window.lodash = _.noConflict();

  var Unifato = {
    init: function() {
      this.header();
      this.sidebar();
      this.content();
      this.enablePlugins();
    },

    /*
     * ====================================
     * Header
     * ====================================
     */
    header: function() {
      this.enableNavToggle();
    },

    enableNavToggle: function() {
      var navToggles = document.getElementsByClassName('nav-toggle');
      lodash.each(navToggles, function(navToggle) {
        var target = document.querySelector(navToggle.dataset.target);
        navToggle.addEventListener('click', function(e) {
          e.preventDefault();
          target.classList.toggle('active');
          document.body.classList.toggle('navigation-overlay');
        });
      })
    },

    /*
     * ====================================
     * Sidebar
     * ====================================
     */
    sidebar: function() {
    },

    /*
     * ====================================
     * Content
     * ====================================
     */
    content: function() {
      this.enableSmoothScroll();
      this.enableSliderArrow();
      this.enableSliders();
    },

    enableSmoothScroll: function() {
      $('a:not(.slider-arrow-next):not(.slider-arrow-prev):not(.no-scroll)').on('click', function(e) {
        if( this.hash !== '' ) {
          e.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {
            window.location.hash = hash;
          });
        }
      });
    },

    enableSliders: function() {
      var $blogposts = $('.blogpost-thumbs, .team-members');
      if(!$blogposts.length) return;
      var defaults = {
        infinite: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 992,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      };
      $blogposts.each(function() {
        var $blogpost = $(this);
        var options = $blogpost.data('plugin-options');
        options = $.extend({}, defaults, options);
        $blogpost.slick(options);
      });
    },

    enableSliderArrow: function() {
      var $arrows = $('.slider-arrow-next, .slider-arrow-prev');
      if(!$arrows.length) return;
      $arrows.each(function() {
        var $arrow = $(this);
        $arrow.on('click', function(e) {
          e.preventDefault();
          if(this.hash !== '') {
            var $slider = $(this.hash);
            if(!$slider.length) return;
            if(this.classList.contains('slider-arrow-next'))
              $slider.slick('slickNext');
            else if(this.classList.contains('slider-arrow-prev'))
              $slider.slick('slickPrev');
          }
        });
      });
    },
    
    /*
     * ====================================
     * Plugins
     * ====================================
     */
    enablePlugins: function() {
      this.enableSticky();
    },

    enableSticky: function() {
      var $el = $('.sticky-wrapper');
      if( !$el.length ) return;
      var defaults = {
        useStickyClasses: true
      };
      $el.each(function() {
        var $sticky = $(this);
        var options = $sticky.data('plugin-options');
        options = $.extend({}, defaults, options);
        stickybits($sticky[0], options);

        // Workaround for firefox bug
        var posY = window.pageYOffset;
        var posX = window.pageXOffset;
        window.scrollTo(posY, window.pageYOffset - 1);
        window.scrollTo(posY, window.pageYOffset);
      });
    },
  };

  function elementInViewport(el) {
    var top = el.offsetTop;
    var left = el.offsetLeft;
    var width = el.offsetWidth;
    var height = el.offsetHeight;

    while(el.offsetParent) {
      el = el.offsetParent;
      top += el.offsetTop;
      left += el.offsetLeft;
    }

    return (
      top < (window.pageYOffset + window.innerHeight) &&
      left < (window.pageXOffset + window.innerWidth) &&
      (top + height) > window.pageYOffset &&
      (left + width) > window.pageXOffset
    );
  }

  document.addEventListener('DOMContentLoaded', function() {
    Unifato.init();
  });
})(jQuery);