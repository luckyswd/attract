class Modal {
    constructor() {
        this.init()
    }

    init() {
        this.openModal('promotion__button')
        this.openModal('header__social-modal')
        this.closeModal('.overlay-modal')
        this.closeModal('.modal-window__close')
        this.openModalVideo()
    }

    openModal(calssName) {
        calssName = '.' + calssName
        const openBtn = document.querySelector(calssName)
        if (openBtn) {
            const modalWindow = document.querySelector('.modal-window');
            const overlayModal = document.querySelector('.overlay-modal')
            const html = document.querySelector('html')
            openBtn.addEventListener('click', () => {
                    modalWindow.classList.add('open-js')
                    overlayModal.classList.add('open-js')
                    html.style.overflow = 'hidden'
            })
        }
    }

    closeModal(className) {
        const closeModal = document.querySelector(className)
        const html = document.querySelector('html')
        const modalWindowVideo = document.querySelector('.modal-window-video');
        const iframeVideo = modalWindowVideo.querySelector('iframe')

        closeModal.addEventListener('click', () => {
            const openModals = document.querySelectorAll('.open-js')
            iframeVideo.src = '';
            closeModal.classList.remove('open-js')
            openModals.forEach((openModal) => {
                openModal.classList.remove('open-js')
                html.style.overflow = 'auto'
            })
        })
    }

    openModalVideo() {
        const feedbackCards = document.querySelectorAll('.feedback__card')
        if (feedbackCards) {
            const overlayModal = document.querySelector('.overlay-modal')
            const html = document.querySelector('html')
            const modalWindowVideo = document.querySelector('.modal-window-video');
            const iframeVideo = modalWindowVideo.querySelector('iframe')
            feedbackCards.forEach((feedbackCard) => {
                feedbackCard.addEventListener('click', () => {
                    iframeVideo.src = 'https://www.youtube.com/embed/' + feedbackCard.getAttribute('id')
                    modalWindowVideo.classList.add('open-js')
                    overlayModal.classList.add('open-js')
                    html.style.overflow = 'hidden'
                })
            })
        }
    }
}

new Modal();