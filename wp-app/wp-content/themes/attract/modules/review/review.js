class Review {
  constructor() {
    this.init();
    this.handelVideo()
  }

  init() {
    const swiper = new Swiper(".swiper-review", {
      fadeEffect: { crossFade: true },
      speed: 500,
      slidersPerView: 1,
      effect: "fade",
      loop: true,
      simulateTouch: false,

      pagination: {
        el: ".pagination",
        clickable: true
      },

      navigation: {
        nextEl: ".swiper-next",
        prevEl: ".swiper-prev",
      },
    });

    swiper.on('slideChange', function () {
      const videos = document.querySelectorAll('.review video')

      videos && videos.forEach((video) => {
        video.pause();
      })
    });
  }

  handelVideo() {
    const videoContainers = document.querySelectorAll('.video-container');

    videoContainers && videoContainers.forEach((videoContainer) => {
      const previewImage = videoContainer.querySelector('img')
      const video = videoContainer.querySelector('video')
      const playIcon = videoContainer.querySelector('.play-icon')

      previewImage && previewImage.addEventListener('click', () => {
        previewImage.style.display = 'none';
        playIcon.style.display = 'none';
        video.style.display = 'block';
        video.play();
      })

      playIcon && playIcon.addEventListener('click', () => {
        previewImage.style.display = 'none';
        playIcon.style.display = 'none';
        video.style.display = 'block';
        video.play();
      })
    })
  }
}

new Review();