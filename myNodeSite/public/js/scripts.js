// Add hover effect to the logo
$('#logo').hover(function() {
  $(this).css('cursor', 'pointer');
  $(this).click(function() {
    window.location.href = 'index.html'; // Redirect to homepage on click
  });
});

// Fade in content and hide form initially
$('.content').hide().fadeIn(1000);
