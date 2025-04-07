$('#contact_button_jQuery').click(function() {
    $(this).fadeOut(300, function() {
      var responseContainer = $('<div class="response-container"></div>');
      responseContainer.load('src/data/ajax.html');
      $(this).after(responseContainer);
    });
  });