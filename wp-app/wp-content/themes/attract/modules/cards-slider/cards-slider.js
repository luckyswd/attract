class CardsSlider {

    selector = '.cards-slider__slider';

    constructor() {
        !!document.querySelector(this.selector) && this.init();
    }

    init() {
        new Swiper(this.selector, {
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