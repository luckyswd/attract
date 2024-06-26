class Rules {
  constructor() {
    !!document.querySelector('.documents-rules-tabs') && this.init();
  }

  init() {
    
    const categories = document.querySelectorAll(".single-documents-rules");
    const posts = document.querySelectorAll(".documents-rules__data");

    categories.forEach((category) => {
      category.addEventListener("click", () => {
        const postIds = category.dataset.ids;

        categories.forEach((otherCategory) => {
          otherCategory.classList.remove("js-active");
        });

        category.classList.add("js-active");

        const sectionStart = document.querySelector(
          ".documents-rules-tabs.distance"
        );
        sectionStart.scrollIntoView(true);

        posts.forEach((post) => {
          const postId = post.dataset.id;

          if (postIds.includes(postId)) {
            post.classList.remove("hidden");
          } else {
            post.classList.add("hidden");
          }
        });
      });
    });
  }
}

new Rules();
