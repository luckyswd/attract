const buttons = document.querySelectorAll('.btn, .contact-form__form-send');
const timers = {};
let defaultWidth;

buttons.forEach((btn, index) => {
  const isAnimationSpan = btn.querySelector('.hover-animation');

  if (!isAnimationSpan) {
    return;
  }

  btn.addEventListener('mouseover', () => {
    if (btn.classList.contains('js-hover-btn')) {
      return;
    }

    const uniqBtnName = btn.textContent.trim() + index;

    if (timers[uniqBtnName] !== null) {
      clearTimeout(timers[uniqBtnName]);
    }

    const spanText = btn.querySelector('span');

    isAnimationSpan.classList.add('js-animation-up');
    btn.classList.add('js-hover-btn');
    spanText.style.visibility = 'hidden';

    timers[uniqBtnName] = setTimeout(() => {
      isAnimationSpan.classList.remove('js-animation-up');
      isAnimationSpan.classList.add('js-animation-down');


      setTimeout(() => {
        isAnimationSpan.classList.remove('js-animation-down');
        spanText.style.visibility = 'visible';
        delete timers[uniqBtnName]
      }, 200)

    }, 200);
  });

  btn.addEventListener('mouseout', (event) => {
    const target = event.relatedTarget || event.toElement;

    if (!btn.contains(target)) {
      btn.classList.remove('js-hover-btn');
    }
  });
});