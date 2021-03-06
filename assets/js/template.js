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
      var self = this;
      this.enableSmoothScroll();
      this.enableSliderArrow();
      this.enableSliders();
      this.enableTabbedForm();
      setTimeout(function() {
        self.enableElementorSectionPopup();
      }, 1000);
    },

    enableSmoothScroll: function() {
      $('a:not(.slider-arrow-next):not(.slider-arrow-prev):not(.no-scroll)').on('click', function(e) {
        console.log(this.hash);
        if( this.hash !== '' ) {
          var hash = this.hash;
          var $hash = $(hash);
          if(!$hash.length) return;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function() {
            window.location.hash = hash;
          });
          e.preventDefault();
        }
      });
    },

    enableSliders: function() {
      var $blogposts = $('.blogpost-thumbs, .team-members, .partners');
      if(!$blogposts.length) return;
      var defaults = {
        infinite: true,
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [
          {
            breakpoint: 800,
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

    enableTabbedForm: function() {
      var $tabbedForms = $('.tabbed-form');
      if( !$tabbedForms.length ) return;

      $tabbedForms.each(function() {
        var tabbedForm = this;
        var $tabbedForm = $(this);
        var $links = $tabbedForm.find('.form-tabs a');
        var $contents = $tabbedForm.find('.form-tabs-content').children('.form-content');

        function changeTab($target) {
          $contents.each(function() {
            var $content = $(this);
            if($content[0] === $target[0])
              $content[0].dataset.open = 'true';
            else
              $content[0].dataset.open = 'false';
          });

          $links.each(function() {
            var $link = $(this);
            if('#' + $target[0].id == $link[0].hash)
              $link[0].dataset.open = 'true';
            else
              $link[0].dataset.open = 'false';
          });

          $('html, body').animate({
            scrollTop: $target.offset().top - 200
          }, 300);
        }

        $links.on('click', function(e) {
          e.preventDefault();
          var $currentLink = $(this);
          var $target = $(this.hash);

          if(!$target.length) {
            console.error('Target ' + this.hash + ' not found')
          }

          changeTab($target);
        });

        var $nextLinks = $tabbedForm.find('.next');
        $nextLinks.each(function() {
          var $nextLink = $(this);
          $nextLink.on('click', function(e) {
            e.preventDefault();
            var $link = $(this);
            var $currentLink = $tabbedForm.find('.form-tabs a[data-open="true"]');
            $currentLink[0].dataset.open = 'false';
            var $next = $($currentLink.nextAll('a')[0]);
            var $target = $($next[0].hash);
            if(!$target.length) {
              console.error('Target ' + this.hash + ' not found')
            }
            changeTab($target);
          });
        });
        
        var $prevLinks = $tabbedForm.find('.previous');
        $prevLinks.each(function() {
          var $prevLink = $(this);
          $prevLink.on('click', function(e) {
            e.preventDefault();
            var $link = $(this);
            var $currentLink = $tabbedForm.find('.form-tabs a[data-open="true"]');
            $currentLink[0].dataset.open = 'false';
            var $next = $($currentLink.prevAll('a')[0]);
            var $target = $($next[0].hash);
            if(!$target.length) {
              console.error('Target ' + this.hash + ' not found')
            }
            changeTab($target);
          });
        })

        tabbedForm.addEventListener('wpcf7mailsent', function() {
          var $final = $tabbedForm.find('.form-tabs [data-final]');
          if(!$final.length) return;
          var $links = $tabbedForm.find('.form-tabs a');
          $final[0].style.display = 'block';
          $links.each(function() {
            var $link = $(this);
            if( this !== $final[0] )
              this.style.display = 'none';
          });
          $final.trigger('click');
        });

      });
    },
    
    enableElementorSectionPopup: function() {
      if( document.body.classList.contains('elementor-editor-active') )
        return;
      var sectionPopupToggles = document.getElementsByClassName('section-popup-toggle');
      if(sectionPopupToggles.length === 0) return;
      var backdrop = document.createElement('div');
      backdrop.id = 'section-popup-backdrop';
      document.getElementById('scroll-wrapper').appendChild(backdrop);
      lodash.each(sectionPopupToggles, function(sectionPopupToggle) {
        var toggleFunc = function(el) {
          var hash = el.hash;
          var hashElem = document.querySelector(hash);
          if( hashElem === null || hashElem.length === 0 ) {
            console.error('Element not found for section popup.')
            return;
          }
          var toggleClassFunc = function(e) {
            document.body.classList.toggle('section-popup-active');
            hashElem.classList.toggle('active');
            e.stopPropagation();
          };

          el.addEventListener('click', toggleClassFunc);

          var closeBtns = hashElem.querySelectorAll('.section-popup-close');
          lodash.each(closeBtns, function(closeBtn) {
            closeBtn.addEventListener('click', function(e) {
              e.preventDefault();
              hashElem.classList.remove('active');
              document.body.classList.remove('section-popup-active');
            });
          });
        };

        if( sectionPopupToggle.tagName === 'A' ) {
          toggleFunc(sectionPopupToggle);
        } else {
          var links = sectionPopupToggle.querySelectorAll('a');
          if( links.length !== 0 ) {
            lodash.each(links, function(link) {
              toggleFunc(link);
            });
          }
        }
      });
    },


    /*
     * ====================================
     * Plugins
     * ====================================
     */
    enablePlugins: function() {
      this.enableSticky();
      this.enableCountdown();
      this.enableJarallax();
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

    enableCountdown: function() {
      var $el = $('.countdown');
      if( !$el.length ) return;
      var defaults = {
        contentFormat: '%-D day%!D %H:%M:%S',
      };
      $el.each(function() {
        var $this = $(this);
        var options = $this.data('plugin-options');
        var $content = $this.find('.countdown-content');
        if( $content.html().length )
          options.contentFormat = $content.html();
        $content.html('');
        options = $.extend({}, defaults, options);
        var instance = $this.countdown(options.finalDate, options);
        instance.on('update.countdown', function(e) {
          if(e.elapsed) $this[0].dataset.status = 'elapsed';
          $content.html(e.strftime(options.contentFormat));
        });
        if( $this.find('.countdown-completed-content').length ) {
          instance.on('finish.countdown', function(e) {
            $this[0].dataset.status = 'finished';
          });
        }

        $this[0].dataset.status = 'active';
        if( this.template === undefined ) this.template = {};
        this.template.countdown = instance;
      });
    },

    enableJarallax: function() {
      var $el = $('.background-parallax');
      if( !$el.length ) return;
      var defaults = {
        speed: .2,
        onInit: function() {
          var $image = $(this.$item).find('[id^="jarallax-container"] > div');
          $image[0].style.backgroundPosition = null;
          $image[0].style.backgroundSize = null;
          $image[0].style.backgroundRepeat = null;
          $image[0].style.backgroundImage = null;
          $image[0].parentNode.style.clip = 'rect(0, ' + $image.parent().width() + 'px, ' + $image.parent().height() + 'px, 0)';

          if(window.innerWidth < 820) {
            $image[0].style.position = 'absolute';
            $image[0].style.top = '20px';
            $image[0].style.bottom = '-20px';
            $image[0].style.minHeight = 'calc(' + $image.parent().height() + 'px + 20px)';
            $image[0].style.maxHeight = 'calc(' + $image.parent().height() + 'px + 20px)';
          } else {
            $image[0].style.position = 'fixed';
            $image[0].style.top = 'calc(' + $image.parent().offset().top + 'px - 4%)';
            $image[0].style.bottom = 'calc(' + ($image.parent().offset().top + $image.parent().outerHeight()) + 'px - 4%)';
            $image[0].style.minHeight = 'calc(' + $image.parent().height() + 'px + 7%)';
            $image[0].style.maxHeight = 'calc(' + $image.parent().height() + 'px + 7%)';
          }
        },
      };
      window.addEventListener('load', function() {
        $el.each(function() {
          var $this = $(this);
          var options = $this.data('plugin-options');
          options = $.extend({}, defaults, options);
          if(window.innerWidth < 820)
            options.speed = options.mobileSpeed;
          var $j = $this.jarallax(options);
        });
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