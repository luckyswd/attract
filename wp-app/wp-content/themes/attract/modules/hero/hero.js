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

setTimeout(() => {
  const tags = document.querySelectorAll('.marquee-tag')

  tags && tags.forEach((tag) => {
    tag.style.fontSize = '12px';
  })
}, 3000)