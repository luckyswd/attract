new Swiper(".feedback__swiper", {
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 15,
        },

        480: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20,
        },
    },

    grabCursor: true,
    autoplay: {
        delay: 4000,
    },
});
