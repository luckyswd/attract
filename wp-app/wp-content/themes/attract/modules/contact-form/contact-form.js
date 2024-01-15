class ContactForm {
    constructor() {
        this.init();
    }

    init() {

        function switchFilled(field, fieldWrap) {
            if (field.value.length > 0) {
                fieldWrap.classList.add('filled');
            } else {
                fieldWrap.classList.remove('filled');
            }
        }

        const inputs = document.querySelectorAll(".contact-form input");

        inputs.forEach((input) => {
            switchFilled(input, input.parentElement.parentElement);

            input.addEventListener("input", function() {
                switchFilled(input, input.parentElement.parentElement);
            })
        });


    }
}

new ContactForm();