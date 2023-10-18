class Team {
  constructor() {
      this.init();
  }

  init() {
    const swiper = new Swiper(".swiper-team", {
        loop: false,
        spaceBetween: 10,

        pagination: false,  
        navigation: {
          nextEl: ".swiper-next",
          prevEl: ".swiper-prev",
        },
        
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 20,
            },

            433: {
                slidesPerView: 2,
            },

            1025: {
                slidesPerView: 4,
            },
        }
    });
  }
}


new Team();