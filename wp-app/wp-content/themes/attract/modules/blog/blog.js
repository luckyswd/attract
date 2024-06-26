class Blog {

    constructor() {
        const container = document.querySelector('.articles');
        if(!!container) {
            this.init()
        }
    }

    send(category = '', paged = 1) {
        const data = new FormData();

        data.append( 'action', 'get_blog_posts' );
        data.append( 'nonce', myajax.nonce );
        data.append( 'paged', paged );
        !!category && data.append( 'cat', category );
                
        return fetch(myajax.url, {
            method: "POST",
            body: data
        }).then((res) => res.text());
    }

    getActiveCategoryId() {
        const activeCat = document.querySelector('.articles-categories .js-active');
        if(!activeCat) return '';
        return +activeCat.dataset.category;
    }

    updateHTMLContent(html) {
        const articles = document.querySelector('.articles');
        articles.insertAdjacentHTML('afterend', html);
        articles.remove();
    }

    scrollToTop() {
        const sectionStart = document.querySelector('.articles.distance');
        sectionStart.scrollIntoView(true);
    }

    setUrlQuery(params) {
        const paramsArr = [];
        for(let key in params) {
            paramsArr.push(`${key}=${params[key]}`);
        }

        const url = new URL(window.location);
        url.search = paramsArr.join('&');
        // url.searchParams.delete('product_cat');
        window.history.pushState(null, '', url.toString());
    }
    
    init() {
        document.addEventListener('click', (e) => {
            let target = e.target.classList.contains('category-filter') && e.target || null;
            if(!!target) {
                let catId = +target.dataset.category;
                if(target.classList.contains('js-active')) {
                    catId = '';
                }
                this.setUrlQuery({'cat': catId})
                this.send(catId, 1).then((res) => this.updateHTMLContent(res));
                return;
            }

            target = e.target.classList.contains('page-numbers') && e.target.nodeName === 'A' && e.target || e.target.closest('a.page-numbers');
            if(!!target) {
                e.preventDefault();
                const splitted = target.href.split('/');
                const page = +splitted[Math.max(0, splitted.length - 2)] || 1;
                const catId = this.getActiveCategoryId();
                this.setUrlQuery({'cat': catId, 'paged': page});
                this.send(catId, page).then((res) => this.updateHTMLContent(res)).then(() => this.scrollToTop());
                return;
            }
        })
    }
}

new Blog();