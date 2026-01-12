// Optimized slideshow with better performance
let slideIndex = 0;
let slides, dots;
let isTransitioning = false;

// Cache DOM elements on load
document.addEventListener('DOMContentLoaded', function () {
  slides = document.getElementsByClassName("mySlides");
  dots = document.getElementsByClassName("dot");

  if (slides.length > 0) {
    // Initialize first slide
    slides[0].classList.add('active');
    if (dots.length > 0) {
      dots[0].classList.add('active');
    }

    // Start slideshow
    setTimeout(showSlides, 5000);
  }
});

function showSlides() {
  if (!slides || slides.length === 0 || isTransitioning) return;

  isTransitioning = true;
  const currentSlide = slideIndex;

  // Calculate next slide
  slideIndex = (slideIndex + 1) % slides.length;

  // Use requestAnimationFrame for smooth transitions
  requestAnimationFrame(() => {
    // Remove active class from current slide
    slides[currentSlide].classList.remove('active');
    if (dots.length > 0) {
      dots[currentSlide].classList.remove('active');
    }

    // Add active class to next slide
    requestAnimationFrame(() => {
      slides[slideIndex].classList.add('active');
      if (dots.length > 0) {
        dots[slideIndex].classList.add('active');
      }

      // Reset transition flag after animation completes
      setTimeout(() => {
        isTransitioning = false;
      }, 600); // Match CSS transition duration
    });
  });

  // Schedule next slide
  setTimeout(showSlides, 5000);
}