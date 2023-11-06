class Result {
    constructor() {
        this.init();
    }

    init() {
        const columns = document.querySelector('.result-bottom').getAttribute('data-columns');
        const swiper = new Swiper(".result-bottom", {
            loop: true,
            spaceBetween: 20,

            pagination: {
                el: '.pagination',
                clickable: true
            },
            navigation: false,

            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },

                768: {
                    slidesPerView: columns,
                },
            }
        });
    }
}

new Result();