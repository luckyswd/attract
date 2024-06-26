class Review {
  constructor() {

    if(!document.querySelector('.review-sides')) return;

    this.swiper1 = null;
    this.swiper2 = null;

    document.addEventListener('DOMContentLoaded', () => {
      this.init();
      this.handelVideo()
    });
  }

  init() {
    const delayAutoplay = (s) => {
      s.autoplay.stop();
      enterView({
          selector: '.review-sides',
          offset: 0.52,
          enter: function() {
              s.autoplay.start();
          },
          exit: function() {
              console.log('exit')
              s.autoplay.stop();
          },
          // once: true,
      });
    }

    this.swiper1 = new Swiper(".review-sides__left-slider", {
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      spaceBetween: 30,
      allowTouchMove: false,
      pagination: {
        el: ".pagination",
        clickable: true
      },
      navigation: {
        nextEl: ".review .swiper-next",
        prevEl: ".review .swiper-prev",
      },
    });
    this.swiper2 = new Swiper(".review-sides__right-slider", {
      effect: "cards",
      grabCursor: true,
      autoplay: {
        delay: 5000,
        pauseOnMouseEnter: true,
      },
      navigation: {
        nextEl: ".review .swiper-next",
        prevEl: ".review .swiper-prev",
      },
      pagination: {
        el: ".pagination",
        clickable: true
      },
      thumbs: {
        swiper: this.swiper1
      },
      on: {
        init: delayAutoplay
    },
    });

    const stopVideos = () => {
      const posters = document.querySelectorAll('.video__container.playing .video__poster')
      posters && posters.forEach((poster) => {
        poster.click();
      })

      this.swiper2 && this.swiper2.autoplay.start();
    }

    this.swiper2.on('slideChange', stopVideos );
  }

  handelVideo() {
    const videoContainers = document.querySelectorAll('.video__container');

    videoContainers && videoContainers.forEach((videoContainer) => {
      const poster = videoContainer.querySelector('.video__poster')
      const playIcon = videoContainer.querySelector('.video__play-icon')
      const video = videoContainer.querySelector('video')

      const playVideo = (e) => {
        // poster.classList.add('hide');
        !video.src && (video.src = video.dataset.src);
        this.swiper2 && this.swiper2.autoplay.stop();
        if(videoContainer.classList.contains('playing')) {
          // console.log(videoContainer.classList.contains('playing'));
          video.pause();
          videoContainer.classList.add('stopped');
          videoContainer.classList.remove('playing');
        } else {
          video.play();
          videoContainer.classList.remove('stopped');
          videoContainer.classList.add('playing');
        }
      }

      poster && poster.tagName != 'A' && poster.addEventListener('click', playVideo)
      video.addEventListener("ended", (event) => {poster.click()});
    })
  }
}

new Review();