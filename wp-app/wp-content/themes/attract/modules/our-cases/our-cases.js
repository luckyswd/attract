new Swiper(".our-cases__cards-swiper", {
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
        680: {
            slidesPerView: 2,
            centeredSlides: true,
            spaceBetween: 30,
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 2000,
            },
        },

        1441: {
            slidesPerView: 3,
            centeredSlides: true,
            spaceBetween: 30,
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 2000,
            },
        },
    },
});