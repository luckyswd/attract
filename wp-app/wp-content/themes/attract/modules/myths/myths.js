const questions = document.querySelectorAll('.myths-question');

questions && questions.forEach((question) => {
  const mythsQuestionTop = question.querySelector('.myths-question-top');

  mythsQuestionTop.addEventListener('click', () => {
    questions && questions.forEach((question) => {
      question.classList.remove('js-active');
    })

    question.classList.add('js-active');
  })
})