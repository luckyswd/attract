class Team {
  constructor() {
      this.init();
  }

  init() {
    const swiper = new Swiper(".swiper-team", {
        loop: true,
        spaceBetween: 10,

        pagination: false,  
        navigation: {
          nextEl: ".swiper-next",
          prevEl: ".swiper-prev",
        },
        
        breakpoints: {
            320: {
                slidesPerView: 1.5,
                spaceBetween: 20,
            },

            769: {
                slidesPerView: 2.5,
            },

            1025: {
                slidesPerView: 4,
            },
        }
    });
  }
}


new Team();