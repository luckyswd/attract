new Swiper(".our-cases__cards-swiper", {
    breakpoints: {
        320: {
            slidesPerView: 1,
            spaceBetween: 15,
        },
        680: {
            slidesPerView: 2,
            spaceBetween: 30,
        },

        1441: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
    },
    centeredSlides: true,
    grabCursor: true,
    loop: true,
    autoplay: {
        delay: 4000,
    },
});