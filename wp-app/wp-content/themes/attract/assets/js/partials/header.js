(() => {
  const header = document.querySelector('header')
  const burger = header.querySelector('.header__burger');

  const desktopMenu = header.querySelector('.header__buttons');
  const desktopSubMenus = desktopMenu.querySelectorAll('.menu>.menu-item-has-children>.sub-menu');

  const mobileSubMenuToggles = document.querySelectorAll('.header__buttons-mobile .parent-icon');

  const submenuInit = (submenu) => {
    const li = submenu.parentElement;
    const menuItemsHasChildren = submenu.querySelectorAll('.menu-item-has-children');
    let wrapper = null;
    let subSubWrapper = null;

    const wrapSubMenus = () => {
      wrapper = document.createElement('div');
      wrapper.classList.add('submenu-wrapper');
      subSubWrapper = document.createElement('div');
      subSubWrapper.classList.add('subsubmenu-wrapper');
      wrapper.appendChild(submenu);
      wrapper.appendChild(subSubWrapper);
      li.appendChild(wrapper);
    }

    const appendSubSubMenu = (e) => {
      subSubWrapper.innerHTML = '';
      const submenu = e.target.querySelector('.sub-menu');
      subSubWrapper.appendChild(submenu.cloneNode(true));
    }

    const listeners = () => {
      for(let item of menuItemsHasChildren) {
        item.addEventListener('mouseenter', appendSubSubMenu);
      }
    }

    const init = () => {
      wrapSubMenus()
      listeners()
      const li = submenu.querySelector('.menu-item-has-children');
      li && li.dispatchEvent(new Event('mouseenter'));
    }

    init()
  }

  for(let menu of desktopSubMenus) {
    submenuInit(menu);
  }


  const mobileSubMenuToggleInit = (btn) => {

    const clickHandler = (e) => {
      const li = e.target.parentElement;
      if(li.classList.contains('active')) {
        li.classList.remove('active')
      } else {
        li.classList.add('active')
      }
    }

    btn.addEventListener('click', clickHandler)
  }

  for(let toggle of mobileSubMenuToggles) {
    mobileSubMenuToggleInit(toggle)
  }

  burger.addEventListener('click', () => {
    if (header.classList.contains('active-menu')) {
        header.classList.remove('active-menu')
    } else {
        header.classList.add('active-menu')
    }
  })




  // const menuItem = header.querySelectorAll(
  //   "#menu-mobile-menu .menu-item.parent-menu-item"
  // );
  // const menuParent = header.querySelectorAll(
  //   ".menu-item-has-children"
  // );


  // menuItem.forEach((menuItemLink) => {
  //   menuItemLink.addEventListener("click", (e) => {
  //       const linkValue = e.target.hash;
  //       if (!linkValue.search("#")) {
  //           header.classList.remove("active-menu");
  //       }
  //   });
  // });

  // menuParent.forEach((menuParentLink) => {
  //   menuParentLink.addEventListener("click", () => {
  //     if (menuParentLink.classList.contains("active-sub-menu")) {
  //       menuParentLink.classList.remove("active-sub-menu");
  //     } else {
  //       menuParentLink.classList.add("active-sub-menu");
  //     }
  //   });
  // });

  // const headerButtonsMobile = header.querySelectorAll('.header__button-mobile');
  // headerButtonsMobile.forEach((btn) => {
  //     btn.addEventListener('click', () => {
  //         header.classList.remove('active-menu')
  //     })
  // })
})();