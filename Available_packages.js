let slideIndex = 1;

document.addEventListener("DOMContentLoaded", function() {
  showSlides(slideIndex); // Show the first slide when the page is fully loaded
});

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");

  // Adjust the slideIndex if it exceeds or is less than the range
  if (n > slides.length) { slideIndex = 1; }
  if (n < 1) { slideIndex = slides.length; }

  // Hide all slides and remove the active class from all dots
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }

  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }

  // Show the current slide and highlight the current dot
  slides[slideIndex - 1].style.display = "block";
  dots[slideIndex - 1].className += " active";
}
