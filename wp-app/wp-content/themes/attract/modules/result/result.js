class Result {
  constructor() {
    document.querySelector('.result-bottom') && this.init();
  }

  init() {
    const resultsBottom = document.querySelectorAll('.result-bottom');

    resultsBottom && resultsBottom.forEach((swiperContainer) => {
      const columns = parseInt(swiperContainer.getAttribute('data-columns'));

      new Swiper(swiperContainer, {
        loop: false,
        spaceBetween: 20,
        pagination: {
          el: '.pagination',
          clickable: true
        },
        navigation: false,
        autoHeight: true,
        watchOverflow: true,
        breakpoints: {
          320: {
            slidesPerView: 1,
            spaceBetween: 20,
            draggable: true
          },

          769: {
            slidesPerView: columns - 1,
          },

          1024: {
            slidesPerView: columns,
          }
        }
      });
    })
  }
}

new Result();