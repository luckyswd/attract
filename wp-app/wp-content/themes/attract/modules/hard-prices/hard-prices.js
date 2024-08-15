class HardPrices {
  constructor() {
    !!document.querySelector('.plans-section') && this.init();
  }

  reRenderPlanCard($card) {
    const usersContainers = [...$card.querySelectorAll('[data-plan-users-count]')];
    const priceContainers = [...$card.querySelectorAll('[data-plan-price]')];

    const users = $card.querySelector('[data-plan-users-val]').value;
    const yearSale = $card.querySelector('[data-plan-year-sale-val]').value;
    let price = $card.querySelector('[data-plan-price-val]').value;

    if(this.period === 'year') {
      price = Math.ceil(price * (1 - yearSale / 100));
    }

    usersContainers.forEach((container) => {
      container.innerText = users;
    })

    priceContainers.forEach((container) => {
      container.innerText = price;
    })

  }

  setPlanCardConstants($card, valsObj) {
    for(let key in valsObj) {
      const $input = $card.querySelector('['+ key +']');
      $input && ($input.value = valsObj[key]);
    }
  }

  reRenderPlanCards() {
    this.planCards.forEach(($card) => {
      this.reRenderPlanCard($card);
    });
  }

  setPeriod(newPeriod) {
    this.period = newPeriod;
  }

  updateActivePeriodButton() {
    [...this.sectionPeriod.querySelectorAll('button.active')].forEach((btn) => {
      btn.classList.remove('active')
    });
    this.sectionPeriod.querySelector('[data-period="'+this.period+'"]').classList.add('active');
  }

  listeners() {
    this.sectionPeriod.addEventListener('click',(e) => {
      const btn = e.target;

      if(btn.classList.contains('active')) return;

      const newVal = e.target.dataset.period;
      if(!!newVal) {
        this.setPeriod(newVal);
        this.updateActivePeriodButton();
        this.reRenderPlanCards();
      }
    })

    this.planCards.forEach(($card) => {
      const usersSelect = $card.querySelector('[data-users-select]');
      usersSelect && usersSelect.addEventListener('change', () => {
        const option = usersSelect.options[usersSelect.options.selectedIndex];
        this.setPlanCardConstants($card, {
          'data-plan-users-val': option.dataset.users,
          'data-plan-year-sale-val': option.dataset.yearSalePercent,
          'data-plan-price-val': option.value,
        });
        this.reRenderPlanCard($card)
      })
    })
  }

  init() {

    this.period = 'month';
    this.container = document.querySelector('.plans-section');
    this.sectionPeriod = this.container.querySelector('.plans-section__period');
    this.planCards = [...this.container.querySelectorAll('.plan-card')];

    this.listeners();
    
  }
}

new HardPrices();
