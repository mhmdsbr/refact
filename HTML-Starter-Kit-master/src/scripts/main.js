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

    const prevButton = document.querySelector('.c-popular-dishes__slide-prev-button');
    const nextButton = document.querySelector('.c-popular-dishes__slide-next-button');

    prevButton.addEventListener('click', function() {
      event.preventDefault();
      flickity.previous();
    });

    nextButton.addEventListener('click', function() {
      event.preventDefault();
      flickity.next();
    });
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

    // booking messages
    const form = document.getElementById('bookingForm');
    const messagesContainer = document.querySelector('.c-booking__messages');
    const successMessage = messagesContainer.querySelector('.c-booking__success-message');
    const errorMessage = messagesContainer.querySelector('.c-booking__error-message');

    form.addEventListener('submit', function(event) {
      event.preventDefault();

      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();

      if (name !== '' && email !== '') {
        // Show success message
        messagesContainer.style.display = 'block';
        successMessage.style.display = 'flex';
        errorMessage.style.display = 'none';
      } else {
        // Show error message
        messagesContainer.style.display = 'block';
        successMessage.style.display = 'none';
        errorMessage.style.display = 'flex';
      }
    });

    // Close buttons event listeners
    successMessage.querySelector('a').addEventListener('click', function(event) {
      event.preventDefault();
      messagesContainer.style.display = 'none';
    });

    errorMessage.querySelector('a').addEventListener('click', function(event) {
      event.preventDefault();
      messagesContainer.style.display = 'none';
    });
    //end



  });
})();
