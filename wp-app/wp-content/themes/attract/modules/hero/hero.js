Marquee3k.init()
window.addEventListener('click', (e) => {
  const target = e.target;
  if (target.closest('.carousel__button.is-close') || target.classList.contains('fancybox__slide')) {
    const videos = document.querySelectorAll('video');
    videos && videos.forEach((video) => {
      video.pause();
    })
  }
})