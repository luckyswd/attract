class Result {
    constructor() {
        this.init();
    }

    init() {
        const columns = document.querySelector('.result-bottom').getAttribute('data-columns');
        const swiper = new Swiper(".result-bottom", {
            loop: false,
            spaceBetween: 20,
            slidesPerView: columns,

            pagination: {
                el: '.pagination',
                clickable: true
            },
            navigation: false,

            watchOverflow: true,

            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    draggable: true
                },

                768: {
                    slidesPerView: columns,
                },
            }
        });
    }
}

new Result();