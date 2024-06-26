class ContactForm {
    constructor() {
        !!document.querySelector(".contact-form") && this.init();
    }

    switchFilled(field, fieldWrap) {
        if (field.value.length > 0) {
            fieldWrap.classList.add('filled');
        } else {
            fieldWrap.classList.remove('filled');
        }
    }

    inputHandler(e) {
        const input = e.target;
        input.nodeName === 'INPUT' && this.switchFilled(input, input.parentElement.parentElement);
    }

    listeners() {
        const forms = document.querySelectorAll(".contact-form form");

        for(let form of forms) {
            form.addEventListener('input', (e) => {
                this.inputHandler(e);
            })
        }
    }

    init() {
        const inputs = document.querySelectorAll(".contact-form input");
        inputs.forEach((input) => {
            this.switchFilled(input, input.parentElement.parentElement);
        });

        this.listeners();
    }
}

new ContactForm();