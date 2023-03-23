const header = document.querySelector('header')
if (header) {
    const burger = header.querySelector('.header__burger')
    burger.addEventListener('click', () => {
        const wrapper = header.querySelector('.header__wrapper')

        if (wrapper.classList.contains('active-menu')) {
            wrapper.classList.remove('active-menu')
        } else {
            wrapper.classList.add('active-menu')
        }


    })
}