class Result {
    constructor() {
        this.init();
    }

    init() {
        const columns = parseInt(document.querySelector('.result-bottom').getAttribute('data-columns'));
        const swiper = new Swiper(".result-bottom", {
            loop: false,
            spaceBetween: 20,

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

                769: {
                    slidesPerView: columns - 1,
                },

                1024: {
                    slidesPerView: columns,
                }
            }
        });
    }
}

new Result();