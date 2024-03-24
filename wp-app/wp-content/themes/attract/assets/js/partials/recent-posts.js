const swiper = new Swiper(".swiper-recent-posts__wrap", {
    spaceBetween: 20,

    navigation: {
      nextEl: ".recent-posts__container .swiper-next",
      prevEl: ".recent-posts__container .swiper-prev",
    },

    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10,
      },

      480: {
        slidesPerView: 2,
        spaceBetween: 10,
      },

      1025: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
    },
});