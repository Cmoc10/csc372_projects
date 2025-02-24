let slideIndex = 1; // Initialize slide index
showSlides(slideIndex); // Show the first slide

// Add hover effect to the logo
$('#logo').hover(function() {
  $(this).css('cursor', 'pointer');
  $(this).click(function() {
    window.location.href = 'index.html'; // Redirect to homepage on click
  });
});

// Redirect to merch page on shirt click
$('#shirt').click(function() {
  window.location.href = 'merch.html';
});

// Redirect to alumni page on slideshow picture click
$('.slideshow_pic').click(function() {
  window.location.href = 'alumni.html';
});

// Fade in content and hide form initially
$('.content').hide().fadeIn(1000);
$('form').hide();

// Show form on contact button click
$('#contact_button').click(function() {
  $(this).fadeOut(300, function() {
    $('form').slideDown(1000); // Slide down form
  });
});

// Function to move slides forward or backward
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Function to jump to a specific slide
function currentSlide(n) {
  showSlides(slideIndex = n);
}

// Function to show slides based on the current slide index
function showSlides(n) {
  let slides = $(".mySlides");
  let dots = $(".dot");
  let newsPieces = $(".news_piece");

  // Loop back to the first slide if out of bounds
  if (n > slides.length) { slideIndex = 1; }
  if (n < 1) { slideIndex = slides.length; }

  // Hide all slides and news pieces
  for (let i = 0; i < slides.length; i++) {
  slides[i].style.display = "none";
  newsPieces[i].style.display = "none";
  }

  // Remove active class from all dots
  for (let i = 0; i < dots.length; i++) {
  dots[i].classList.remove("active");
  }

  // Show the active slide and news piece, and mark the corresponding dot
  slides[slideIndex - 1].style.display = "block";
  newsPieces[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add("active");
}

// Initialize the first slide
showSlides(slideIndex);
