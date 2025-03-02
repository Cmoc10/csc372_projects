$('#contact_button_html').click(function() {
    var button = $(this);
    button.fadeOut(300, function() {
      var xhr = new XMLHttpRequest();
      xhr.onload = function() {
        if(xhr.status === 200) {
          var responseContainer = $('<div class="response-container"></div>');
          responseContainer.html(xhr.responseText);
          button.after(responseContainer);
        }
      };
      xhr.open('GET', 'src/data/ajax.html', true);
      xhr.send(null);
    });
  });