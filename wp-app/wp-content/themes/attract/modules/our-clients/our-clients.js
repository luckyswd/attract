class OurClients {
    constructor() {

        this.grid = document.querySelector('[data-grid]');
        if(!this.grid) return;

        this.gridSize = {
            w: 0,
            h: 0
        }

        this.cards = document.querySelectorAll('[data-grid-card]');
        for(let card of this.cards) {
            this.init(card);
        }

        this.calcGridSize();
        this.markGridItems();

        document.addEventListener('click', (e) => {
            if(e.target.dataset.gridCardModalClose !== undefined) {
                this.resetAllActiveCard()
            }
        })

        window.addEventListener('resize', (e) => {
            this.calcGridSize();
            this.markGridItems();
        })
    }

    calcGridSize() {
        this.gridSize.w = this.grid.offsetWidth;
        this.gridSize.h = this.grid.offsetHeight;
    }

    markGridItems() {
        for(let card of this.cards) {
            if((this.gridSize.h - card.offsetTop - card.offsetHeight) < card.offsetHeight){
                card.classList.add('bottom');
            } else {
                card.classList.remove('bottom');
            }

            if((this.gridSize.w - card.offsetLeft - card.offsetWidth) < card.offsetWidth){
                card.classList.add('right');
            } else {
                card.classList.remove('right');
            }
        }
    }

    resetAllActiveCard() {
        const cards = document.querySelectorAll('[data-grid-card].active');
        for(let card of cards) {
            card.classList.remove('active')
        }
    }

    init(card) {
        const btnActivate = card.querySelector('[data-grid-card-modal-activate]');
        btnActivate.addEventListener('click', () => {
            
            this.resetAllActiveCard();
            card.classList.add('active');
            
        })
    }
}

new OurClients();