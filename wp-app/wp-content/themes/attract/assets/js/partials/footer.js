const categories = document.querySelectorAll('.category-wrap');

categories && categories.forEach((category) => {
  const cat = category.querySelector('.service_category');

  cat.addEventListener('click', () => {
    category.classList.toggle('js-active');
  })
})