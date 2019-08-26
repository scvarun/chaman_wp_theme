(function($) {
  'use strict';

  var Custom = {
    init: function() {
      this.enableAdmissionForm();
      this.enableLogoSvgAnimation();
    },

    enableAdmissionForm: function() {
      var admissionForm = document.getElementById('admission-form');
      if(admissionForm == null) return;

      var tabs = admissionForm.querySelectorAll('.form-tabs a');

      lodash.each(tabs, function(tabLink){
        tabLink.addEventListener('click', function(e) {
          e.preventDefault();
          var hash = this.hash;
          var content = document.querySelector(hash);
          var divs = content.parentNode.children;
          var links = this.parentNode.children;
          lodash.each(links, function(l) {
            if(l !== tabLink)
              l.dataset.open = "false";
          });
          lodash.each(divs, function(div) {
            div.dataset.open = "false";
          });
          this.dataset.open = "true";
          content.dataset.open = "true";
        });
      });
    },

    enableLogoSvgAnimation: function() {
      var svg = document.getElementById('CHAMAN_LOGO_SVG');
      if( svg === null ) return;
      svg.classList.add('animated');
      var elements = svg.querySelectorAll('rect, path');
      console.log(elements);
      var heading = svg.getElementsByClassName('logo-heading');


      anime({
        targets: svg.querySelectorAll('rect, path'),
        keyframes: [
          {opacity: 1},
          {opacity: 0},
          {opacity: 1},
          {opacity: 0},
          {opacity: 1},
        ],
        easing: 'easeInOut',
        duration: 3000,
        delay: function(el, i, l) {
          return i * 200;
        },
      });

      // anime({
      //   targets: heading,
      //   opacit: 1,
      //   delay: 6000,
      //   duration: 3000,
      //   easing: 'easeInOut',
      // });

      // anime({
      //   targets: elements,
      //   keyframes: [
      //     {opacity: 0},
      //     {opacity: 1},
      //     {opacity: 0},
      //     {opacity: 1},
      //     {opacity: 0},
      //   ],
      //   easing: 'easeInOut',
      //   duration: 3000,
      //   delay: function(el, i, l) {
      //     return 6000 + i * 200;
      //   },
      // });
    },
  };

  $(document).ready(function() {
    Custom.init();
  });

  document.addEventListener('DOMContentLoaded', function() {
  });

})(jQuery);
