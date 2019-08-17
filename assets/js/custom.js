(function($) {
  'use strict';

  var Custom = {
    init: function() {
      this.enableAdmissionForm();
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
  };

  document.addEventListener('DOMContentLoaded', function() {
    Custom.init();
  });

})(jQuery);
