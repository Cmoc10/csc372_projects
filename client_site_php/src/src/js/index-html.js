// Israel Cancer Research Fund Button
$('#icrf_button').click(function() {
  var button = $(this);
  var infoDiv = $('#icrf_info');
  
  // If info is already displayed, hide it
  if (infoDiv.html() !== '') {
    infoDiv.slideUp(400, function() {
      infoDiv.html('');
    });
    return;
  }
  
  // Otherwise, load and display the info
  button.prop('disabled', true);
  
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    if(xhr.status === 200) {
      infoDiv.html(xhr.responseText);
      infoDiv.hide().slideDown(400);
      button.prop('disabled', false);
    }
  };
  xhr.open('GET', './src/data/icrf.html', true);
  xhr.send(null);
});

// United Hatzalah Button
$('#hatzalah_button').click(function() {
  var button = $(this);
  var infoDiv = $('#hatzalah_info');
  
  // If info is already displayed, hide it
  if (infoDiv.html() !== '') {
    infoDiv.slideUp(400, function() {
      infoDiv.html('');
    });
    return;
  }
  
  // Otherwise, load and display the info
  button.prop('disabled', true);
  
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    if(xhr.status === 200) {
      // Parse XML response
      var xmlDoc = xhr.responseXML;
      var organization = xmlDoc.getElementsByTagName("organization")[0];
      var name = organization.getElementsByTagName("name")[0].textContent;
      var description = organization.getElementsByTagName("description")[0].textContent;
      var website = organization.getElementsByTagName("website")[0].textContent;
      
      // Create HTML from XML data
      var content = '<h3>' + name + '</h3>';
      content += '<p>' + description + '</p>';
      content += '<p><a href="' + website + '" target="_blank">Visit Website</a></p>';
      
      infoDiv.html(content);
      infoDiv.hide().slideDown(400);
      button.prop('disabled', false);
    }
  };
  xhr.open('GET', './src/data/hatzalah.xml', true);
  xhr.send(null);
});

// Special Olympics Rhode Island Button
$('#sori_button').click(function() {
  var button = $(this);
  var infoDiv = $('#sori_info');
  
  // If info is already displayed, hide it
  if (infoDiv.html() !== '') {
    infoDiv.slideUp(400, function() {
      infoDiv.html('');
    });
    return;
  }
  
  // Otherwise, load and display the info
  button.prop('disabled', true);
  
  var xhr = new XMLHttpRequest();
  xhr.onload = function() {
    if(xhr.status === 200) {
      // Parse JSON response
      var data = JSON.parse(xhr.responseText);
      
      // Create HTML from JSON data
      var content = '<h3>' + data.name + '</h3>';
      content += '<p>' + data.description + '</p>';
      content += '<p><a href="' + data.website + '" target="_blank">Visit Website</a></p>';
      
      infoDiv.html(content);
      infoDiv.hide().slideDown(400);
      button.prop('disabled', false);
    }
  };
  xhr.open('GET', './src/data/sori.json', true);
  xhr.send(null);
});