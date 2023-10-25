jQuery(document).ready(function($) {
    const questions = $('.myths-question');

    questions.each(function() {
        const mythsQuestionTop = $(this).find('.myths-question-top');

        mythsQuestionTop.click(function() {
            const mythsQuestion = $(this).closest('.myths-question');
            
            mythsQuestion.siblings().removeClass('js-active');
            mythsQuestion.toggleClass('js-active');
        })
    })
})