class Team {
  constructor() {
      if(!document.querySelector('.swiper-team')) return;
        
      document.addEventListener('DOMContentLoaded', () => {
          this.init();
      });
  }

  init() {
    new Swiper(".swiper-team", {
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