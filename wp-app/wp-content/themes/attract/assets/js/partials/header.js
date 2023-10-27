const header = document.querySelector('header')
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