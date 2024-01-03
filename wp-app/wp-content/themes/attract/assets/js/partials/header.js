const header = document.querySelector('header')
const burger = header.querySelector('.header__burger')
const menuItem = header.querySelectorAll(
  "#menu-mobile-menu .menu-item.parent-menu-item"
);
const menuParent = header.querySelectorAll(
  ".menu-item-has-children"
);

burger.addEventListener('click', () => {
    if (header.classList.contains('active-menu')) {
        header.classList.remove('active-menu')
    } else {
        header.classList.add('active-menu')
    }
})


menuItem.forEach((menuItemLink) => {
  menuItemLink.addEventListener("click", (e) => {
      const linkValue = e.target.hash;
      if (!linkValue.search("#")) {
          header.classList.remove("active-menu");
      }
  });
});

menuParent.forEach((menuParentLink) => {
  menuParentLink.addEventListener("click", () => {
     if (menuParentLink.classList.contains("active-sub-menu")) {
       menuParentLink.classList.remove("active-sub-menu");
     } else {
       menuParentLink.classList.add("active-sub-menu");
     }
  });
});

const headerButtonsMobile = header.querySelectorAll('.header__button-mobile');
headerButtonsMobile.forEach((btn) => {
    btn.addEventListener('click', () => {
        header.classList.remove('active-menu')
    })
})