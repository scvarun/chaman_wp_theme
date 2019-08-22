jQuery(function($){
  $('.load_more_btn').click(function(){
    var button = $(this);
    var text = button.text();
    var data = {
      'action': 'loadmore',
      'query': unifato_load_more_params.posts,
      'page' : unifato_load_more_params.current_page
    };

    $.ajax({
      url: unifato_load_more_params.ajaxurl,
      data: data,
      type: 'POST',
      beforeSend: function(xhr) {
        button.text('Loadding..');
        button.attr('disabled', 'disabled');
      },
      success: function(data) {
        if( data ) {
          button.text(text);
          var articles = button.closest('main').find('article');
          var lastArticle = articles[articles.length - 1];
          $(data).insertAfter(lastArticle);
          button.removeAttr('disabled');
          unifato_load_more_params.current_page++;
          if(unifato_load_more_params.current_page == unifato_load_more_params.max_page) {
            button.parent().find('.load_more_message')[0].classList.toggle('d-none');
            button.remove();
          }
        } else {
          button.remove();
        }
      },
      error: function(e) {
        console.error(e.status + ' ' +  e.statusText);
      }
    });
  });
});