const buttons = document.querySelectorAll('.btn');
const timers = {};
let defaultWidth;

buttons.forEach((btn, index) => {
  btn.dataset.width = btn.clientWidth + 2;

  btn.addEventListener('mouseover', () => {
    if (btn.classList.contains('js-hover-btn')) {
      return;
    }
    const uniqBtnName = btn.textContent.trim() + index;

    if (timers[uniqBtnName] !== null) {
      clearTimeout(timers[uniqBtnName]);
    }

    const spanText = btn.querySelector('span');

    btn.classList.add('js-animation-up');
    btn.classList.add('js-hover-btn');
    spanText.style.visibility = 'hidden';

    setHoverWidth(btn)

    timers[uniqBtnName] = setTimeout(() => {
      btn.classList.remove('js-animation-up');
      btn.classList.add('js-animation-down');


      setTimeout(() => {
        btn.classList.remove('js-animation-down');
        spanText.style.visibility = 'visible';
        delete timers[uniqBtnName]
      }, 300)

    }, 600);
  });

  btn.addEventListener('mouseout', (event) => {
    const target = event.relatedTarget || event.toElement;

    if (!btn.contains(target)) {
      btn.classList.remove('js-hover-btn');
      setDefaultWidth(btn)
    }
  });
});

function setHoverWidth(btn) {
  const negativeTranslate = btn.dataset.negativeTranslate ?? '';
  defaultWidth = btn.dataset.width
  const percentWidth = (5 / 100) * defaultWidth;

  btn.style.maxWidth = (defaultWidth - (percentWidth * 2)) + 'px';
  btn.style.width = (defaultWidth - (percentWidth * 2)) + 'px';
  btn.style.minWidth = (defaultWidth - (percentWidth * 2)) + 'px';
  if (negativeTranslate !== 'disabled') {
    btn.style.transform = `translateX(${negativeTranslate}${percentWidth}px)`;
  }
}

function setDefaultWidth(btn) {
  btn.style.maxWidth = defaultWidth + 'px'
  btn.style.width = defaultWidth + 'px'
  btn.style.minWidth = defaultWidth + 'px'
  btn.style.transform = `translateX(0)`;
}