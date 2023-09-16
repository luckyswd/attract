class Services {
  constructor() {
    this.init()
  }

  init() {
    const categories = document.querySelectorAll('.single-service');
    const posts = document.querySelectorAll('.service-card ');

    categories.forEach((category) => {
      category.addEventListener('click', () => {
        const postIds = category.dataset.ids;

        categories.forEach((otherCategory) => {
          otherCategory.classList.remove('js-active');
        });

        category.classList.add('js-active');

        window.scrollTo(0, 790);

        posts.forEach((post) => {
          const postId = post.dataset.id;

          if (postIds.includes(postId)) {
            post.classList.remove('hidden');
          } else {
            post.classList.add('hidden');
          }
        })
      })
    })
  }
}

new Services();