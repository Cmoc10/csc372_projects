let slideIndex = 1; // Initialize slide index
showSlides(slideIndex); // Show the first slide

// Function to move slides forward or backward
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Function to jump to a specific slide
function currentSlide(n) {
  showSlides(slideIndex = n);
}

$('#contact_button').hover(function() {
  $(this).css('transform', 'scale(1.05)');
});
  $('#contact_button').click(function() {
    window.location.href = '404.php'; // Redirect to contact page on click
  });

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
