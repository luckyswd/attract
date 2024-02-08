class ServicesVideos {
    constructor() {
      this.init();
    }
  
      init() {
        const swiper = new Swiper(".services-videos__row_1-swiper", {
            spaceBetween: 10,
            slidesPerView: "auto",
        });

        const swiper2 = new Swiper(".services-videos__row_2-swiper", {
            spaceBetween: 10,
            slidesPerView: "auto",
        });
        

        if(!window.playVideoBtnsInited) {
            document.addEventListener('click', (e) => {
                let target = e.target.classList.contains('play-video') ? e.target : e.target.closest('.play-video');
                if(!!target) {
                    const poster = target.closest('.services-videos__item-poster');
                    const video = poster.previousElementSibling;
                    poster.classList.add('hide');
                    video.play();
                }

                target = e.target.classList.contains('load-more-btn') ? e.target : e.target.closest('.load-more-btn');
                if(!!target) {
                    const row = target.parentNode.previousElementSibling;
                    row.classList.toggle('hide');
                    target.classList.toggle('to-hide');
                }
    
            })


            window.playVideoBtnsInited = true;
        }
    }
  
  
  }
  
  new ServicesVideos();
  
  