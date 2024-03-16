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

    // Input Number
    const numberInput = document.querySelector('.js-form-number-input');
    const plusButton = document.querySelector('.input-number-plus');
    const minusButton = document.querySelector('.input-number-minus');
    plusButton.addEventListener('click', function() {
      numberInput.stepUp();
    });
    minusButton.addEventListener('click', function() {
      numberInput.stepDown();
    });
    // End

    // Mobile Nav
    const hamburgerIcon = document.querySelector('.js-header-hamburger');
    const navMenu = document.querySelector('.header__navbar-nav');
    const closeMenuBtn = document.querySelector('.js-close-icon');

    hamburgerIcon.addEventListener('click', function() {
      document.body.style.overflow = 'hidden';
      navMenu.classList.toggle('show-menu');
    });

    closeMenuBtn.addEventListener('click', function() {
      document.body.style.overflow = '';
      navMenu.classList.remove('show-menu');
    });

  });
})();
