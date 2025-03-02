$('#contact_button_xml').click(function() {
    var button = $(this);
    button.fadeOut(300, function() {
        var xhr = new XMLHttpRequest();
        xhr.responseType = 'document';
        xhr.onload = function() {
            if (xhr.status === 200) {
                var xmlDoc = xhr.response;
                var root = xmlDoc.getElementsByTagName('root')[0];
                
                if (root) {
                    // Create a new form element
                    var form = document.createElement('form');
                    
                    // Copy attributes from root to form
                    for (var i = 0; i < root.attributes.length; i++) {
                        var attr = root.attributes[i];
                        form.setAttribute(attr.name, attr.value);
                    }
                    
                    // Move all child nodes to the new form
                    while (root.firstChild) {
                        form.appendChild(root.firstChild);
                    }
                    
                    // Wrap in jQuery and insert into the document
                    var responseContainer = $('<div class="response-container"></div>');
                    responseContainer.append(form);
                    button.after(responseContainer);
                }
            }
        };
        xhr.open('GET', 'src/data/ajax.xml', true);
        xhr.send(null);
    });
});