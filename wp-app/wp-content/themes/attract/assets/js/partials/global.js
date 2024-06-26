const stopVideoIfFancyboxClosing = () => {
  document.addEventListener('click', (e) => {
    const target = e.target;
    if (target.closest('.carousel__button.is-close') || target.classList.contains('fancybox__slide')) {
      const videos = document.querySelectorAll('video');
      videos && videos.forEach((video) => {
        video.pause();
      })
    }
  })
}
document.addEventListener('DOMContentLoaded', () => {
  !!document.querySelector('.marquee3k') && Marquee3k.init();
  stopVideoIfFancyboxClosing();
});