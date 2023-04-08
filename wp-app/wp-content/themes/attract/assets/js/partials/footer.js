class Modal {
    constructor() {
        this.init()
    }

    init() {
        this.openModal('promotion__button')
        this.openModal('header__social-modal')
        this.closeModal('header__social-modal')
    }

    openModal(calssName) {
        calssName = '.' + calssName
        const openBtn = document.querySelector(calssName)
        if (openBtn) {
            const modalWindow = document.querySelector('.modal-window');
            const overlayModal = document.querySelector('.overlay-modal')
            const html = document.querySelector('html')

            openBtn.addEventListener('click', () => {
                if (modalWindow.classList.contains('open-js')) {
                    modalWindow.classList.remove('open-js')
                    overlayModal.classList.remove('open-js')
                    html.style.overflow = 'auto'
                } else {
                    modalWindow.classList.add('open-js')
                    overlayModal.classList.add('open-js')
                    html.style.overflow = 'hidden'

                }
            })
        }
    }

    closeModal() {
        const closeBtn = document.querySelector('.modal-window__close')
        if (closeBtn) {
            const modalWindow = document.querySelector('.modal-window');
            const overlayModal = document.querySelector('.overlay-modal')
            const html = document.querySelector('html')

            closeBtn.addEventListener('click', () => {
                if (modalWindow.classList.contains('open-js')) {
                    modalWindow.classList.remove('open-js')
                    overlayModal.classList.remove('open-js')
                    html.style.overflow = 'auto'
                } else {
                    modalWindow.classList.add('open-js')
                    overlayModal.classList.add('open-js')
                    html.style.overflow = 'hidden'
                }
            })
        }
    }

}

new Modal();