class Cases_V2 {
    constructor() {
        !!document.querySelector('.catalog-cases-v2') && this.init();
    }

    init() {
        const casesCategoriesWrapper = document.querySelector('.catalog-cases-v2 .cases-categories');
        const caseCategories = document.querySelectorAll('.catalog-cases-v2 .single-case');
        const activeCategory = casesCategoriesWrapper.dataset.active;

        caseCategories.forEach((category) => {
            let categorySlug = category.dataset.slug;
            if (categorySlug === activeCategory) {
                category.classList.add('active');
            }
        });
    }
}

new Cases_V2();