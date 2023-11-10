class Result {
    constructor() {
        this.init();
    }

    init() {
        const resultBottom = document.querySelector('.result-bottom');
        if (resultBottom) {
            const columns = parseInt(resultBottom.getAttribute('data-columns'));
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
}

new Result();