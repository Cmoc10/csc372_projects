$('#contact_button_json').click(function() {
    var button = $(this);
    button.fadeOut(300, function() {
        var xhr = new XMLHttpRequest();
        xhr.responseType = 'json';
        xhr.onload = function() {
            if (xhr.status === 200) {
                var formData = xhr.response.form; // Extract form data
                var responseContainer = $('<div class="response-container"></div>');
                
                // Create the form element
                var form = $('<form></form>')
                    .attr('action', formData.action)
                    .attr('method', formData.method);
  
                // Loop through the fields and add them to the form
                for (var i = 0; i < formData.fields.length; i++) {
                    var field = formData.fields[i];
                    
                    var label = $('<label></label>')
                        .attr('for', field.id)
                        .text(field.label);
                    
                    var input = $('<input>')
                        .attr('type', field.type)
                        .attr('id', field.id)
                        .attr('name', field.name);
                    
                    if (field.required) {
                        input.attr('required', 'required');
                    }
  
                    // Append label and input to the form
                    form.append(label).append(input).append('<br>');
                }
  
                // Create submit button
                var submitButton = $('<input>')
                    .attr('type', formData.submit.type)
                    .attr('value', formData.submit.value);
  
                form.append(submitButton);
  
                // Append form to response container and display it
                responseContainer.append(form);
                button.after(responseContainer);
            }
        };
        xhr.open('GET', 'src/data/ajax.json', true);
        xhr.send(null);
    });
  });