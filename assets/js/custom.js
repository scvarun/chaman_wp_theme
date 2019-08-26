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
      var heading = svg.getElementsByClassName('logo-heading');
      anime({
        targets: elements,
        keyframes: [
          {opacity: 1, duration: 500},
          {opacity: 0, duration: 500},
          {opacity: 1, duration: 500},
          {opacity: 0, duration: 500},
          {opacity: 1, duration: 500},
          {opacity: 0, duration: 500},
          {opacity: 1, duration: 500},
          {opacity: 0, duration: 500, delay: 3000},
          {opacity: 1, duration: 500},
          {opacity: 0, duration: 500},
          {opacity: 1, duration: 500},
          {opacity: 0, duration: 500},
        ],
        easing: 'easeInOutExpo',
        delay: anime.stagger(300)
      });

      anime({
        targets: heading,
        opacity: 1,
        duration: 500,
        delay: 4500,
        easing: 'easeInOutQuad',
      });
    },
  };

  $(document).ready(function() {
    Custom.init();
  });

  document.addEventListener('DOMContentLoaded', function() {
  });

})(jQuery);
