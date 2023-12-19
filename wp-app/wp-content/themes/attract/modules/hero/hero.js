Marquee3k.init()
window.addEventListener('click', (e) => {
  const target = e.target;

  if (target.closest('.carousel__button.is-close') || target.closest('.fancybox__slide.is-selected.has-inline')) {
    const videos = document.querySelectorAll('video');

    videos && videos.forEach((video) => {
      video.pause();
    })
  }
})