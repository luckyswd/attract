class CardsSlider {
    constructor() {
        this.init();
    }

    init() {
        const swiper = new Swiper(".cards-slider__slider", {
            spaceBetween: 20,
            slidesPerView: 1,
            navigation: {
              nextEl: ".cards-slider__arrows-wrap .swiper-next",
              prevEl: ".cards-slider__arrows-wrap .swiper-prev",
            },
        
            breakpoints: {
                480: {
                    slidesPerView: "auto",
                },
                1024: {
                    slidesPerView: 2,
                },
                1440: {
                    slidesPerView: 3,
                },
            },
        });
    }
}

new CardsSlider();