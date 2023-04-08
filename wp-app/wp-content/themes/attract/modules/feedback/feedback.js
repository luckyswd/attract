new Swiper(".feedback__swiper", {
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 15,
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2000,
            },
        },

        480: {
            slidesPerView: 2,
            spaceBetween: 20,
            grabCursor: true,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 2000,
            },
        },
        768: {
            slidesPerView: 3,
            centeredSlides: true,
            spaceBetween: 20,
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 2000,
            },
        },

    },
});
