class Cases {
    constructor() {
        !!document.querySelector('.catalog-cases') && this.init();
    }

    init() {
        const caseCategories = document.querySelectorAll('.single-case');
        const caseCards = document.querySelectorAll('.case-card');

        caseCategories.forEach((category) => {
            category.addEventListener('click', () => {
                const postIds = category.dataset.ids;

                caseCategories.forEach((otherCategory) => {
                    otherCategory.classList.remove('js-active');
                });

                category.classList.add('js-active');

                const sectionStart = document.querySelector('.catalog-cases.distance');
                sectionStart.scrollIntoView(true);

                caseCards.forEach((post) => {
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