/* eslint-env browser */
(function() {
  'use strict';
  document.addEventListener('DOMContentLoaded', function() {

    // Popular Dishes Slider Pagination
    const flickity = new Flickity('.main-carousel');
    const carouselStatus = document.querySelector('.js-carousel-status');

    function updateStatus() {
      const slideNumber = flickity.selectedIndex + 1;
      const totalSlides = flickity.slides.length;

      const slideNumberSpan = document.createElement('span');
      slideNumberSpan.textContent = slideNumber;
      slideNumberSpan.classList.add('slide-number');

      const totalSlidesSpan = document.createElement('span');
      totalSlidesSpan.textContent = totalSlides;
      totalSlidesSpan.classList.add('total-slides');

      carouselStatus.innerHTML = '';

      carouselStatus.appendChild(slideNumberSpan);
      carouselStatus.appendChild(document.createTextNode('/'));
      carouselStatus.appendChild(totalSlidesSpan);
    }

    updateStatus();

    flickity.on('select', updateStatus);
    // End

  });
})();
