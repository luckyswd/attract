class SinglePost {
  constructor() {
    this.init();
  }

    init() {
    const swiper = new Swiper(".swiper-recent-posts__wrap", {
      spaceBetween: 20,

      navigation: {
        nextEl: ".swiper-next",
        prevEl: ".swiper-prev",
      },

      breakpoints: {
        320: {
          slidesPerView: 1.05,
          spaceBetween: 10,
        },

        480: {
          slidesPerView: 2.05,
          spaceBetween: 10,
        },

        1025: {
          slidesPerView: 3.08,
          spaceBetween: 20,
        },
      },
    });
  }


}

new SinglePost();
