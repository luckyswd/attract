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
      loopFillGroupWithBlank: true,
      autoHeight: true,
      loop: true,
      autoplay: {
        delay: 9000,
      },
    });
  }
}

new Hero();