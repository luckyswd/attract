const questions = document.querySelectorAll('.myths-question');

questions.forEach(function(question) {
    const mythsQuestionTop = question.querySelector('.myths-question-top');

    mythsQuestionTop.addEventListener('click', function() {
        const mythsQuestion = question;

        questions.forEach(function(q) {
            if (q !== mythsQuestion) {
                q.classList.remove('js-active');
            }
        });

        mythsQuestion.classList.toggle('js-active');
    });
});
