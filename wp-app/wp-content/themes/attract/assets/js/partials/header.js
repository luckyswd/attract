const header = document.querySelector('header')
if (header) {
    const burger = header.querySelector('.header__burger')
    burger.addEventListener('click', () => {
        if (header.classList.contains('active-menu')) {
            header.classList.remove('active-menu')
        } else {
            header.classList.add('active-menu')
        }
    })

    const headerButtonsMobile = header.querySelectorAll('.header__button-mobile');
    headerButtonsMobile.forEach((btn) => {
        btn.addEventListener('click', () => {
            header.classList.remove('active-menu')
        })
    })
}

function moveHeaderSelector(event) {
    const getElement = event.target;
    const navLinks = document.querySelectorAll('header .header__buttons a');
    navLinks.forEach(navLink => {
        navLink.classList.remove('active');
    });
    getElement.classList.add('active');
    const selectorMark = document.querySelector('.selector-mark');
    const parentRect = selectorMark.parentElement.getBoundingClientRect();
    const linkRect = getElement.getBoundingClientRect();
    selectorMark.style.left = (linkRect.left - parentRect.left) + 'px';
    selectorMark.style.width = (getElement.offsetWidth) + 'px';
}

const navLinks = document.querySelectorAll('header .header__buttons a');
navLinks.forEach(navLink => {
    navLink.addEventListener('click', moveHeaderSelector);
});