class Blog {
  constructor() {
    this.init()
  }

  init() {
    const categories = document.querySelectorAll('.single-article');
    const posts = document.querySelectorAll('.article-card ');

    categories.forEach((category) => {
      category.addEventListener('click', () => {
        const postIds = category.dataset.ids;

        categories.forEach((otherCategory) => {
          otherCategory.classList.remove('js-active');
        });

        category.classList.add('js-active');

        const sectionStart = document.querySelector('.articles.distance');
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

new Blog();

jQuery(document).ready(function ($) {
  const categories = document.querySelectorAll(".single-article");
  const articlesCards = $(".articles-wrapper");

categories.forEach((category) => {
  category.addEventListener("click", (event) => {
    event.preventDefault();
    
    const currentCategory = event.target
      .getAttribute("data-category")
      .replace(/[\[\]']+/g, "")
      .split(",")[0];
    $.ajax({
      type: "POST",
      url: loadpostsAjax.ajaxurl,
      data: {
        action: "upload_posts",
        countProducts: 9,
        currentCategory: currentCategory,
      },
      success: function (data) {
        $(".articles-cards").remove();
        articlesCards.append(data);
      },
    });
    });
  });
});