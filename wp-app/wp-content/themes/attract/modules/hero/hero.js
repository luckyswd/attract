class Hero {
  constructor() {
    this.init()
  }

  init() {
    this.swiperInit()
  }

  swiperInit() {
    new Swiper(".swiper-hero", {
      slidesPerView: 1,
      slidesPerGroup: 1,
      autoHeight: true,
      loop: true,
      autoplay: {
        delay: 9000,
      },
    });
  }
}

new Hero();