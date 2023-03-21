    const swiperEl = document.querySelector('swiper-container')

    Object.assign(swiperEl, {
      slidesPerView: 3,
      centeredSlides: true,
      spaceBetween: 30,
      navigation: true,
      virtual: {
        slides: (function () {
          const slides = [];
          for (var i = 0; i < 600; i += 1) {
            slides.push('Slide ' + (i + 1));
          }
          return slides;
        })(),
      },
    });

    swiperEl.initialize();

    const swiper = swiperEl.swiper;