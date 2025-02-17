document.getElementById('shirt').addEventListener('click', function() {
    window.location.href = 'merch.html';
});

let slideIndex = 1;
showSlides(slideIndex);

document.querySelectorAll('.slideshow_pic').addEventListener('click', function() {
    window.location.href = 'alumni.html';
});

// Function to move slides forward or backward
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Function to jump to a specific slide
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  // Loop back to the first slide if out of bounds
  if (n > slides.length) { slideIndex = 1; }
  if (n < 1) { slideIndex = slides.length; }

  // Hide all slides
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  // Remove active class from all dots
  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }

  // Show the active slide and mark the corresponding dot
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].classList.add("active");
}

// Initialize the first slide
showSlides(slideIndex);
