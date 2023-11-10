class Cases {
    constructor() {
      this.init()
    }
  
    init() {
      const categories = document.querySelectorAll('.single-case');
      const posts = document.querySelectorAll('.case-card');
  
      categories.forEach((category) => {
        category.addEventListener('click', () => {
          const postIds = category.dataset.ids;
  
          categories.forEach((otherCategory) => {
            otherCategory.classList.remove('js-active');
          });
  
          category.classList.add('js-active');
  
          const sectionStart = document.querySelector('.cases.distance');
          sectionStart.scrollIntoView(true);
  
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
  
  new Cases();