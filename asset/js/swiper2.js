// JavaScript
// Initialize swiper
const swiper = new Swiper('.swiper-container', {
    // Optional parameters
    direction: 'horizontal',
  
    // Display multiple cards
    slidesPerView: 3,
    spaceBetween: 20,
    slidesPerGroup: 1,
  
    // If you need navigation buttons
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

  });
  