(() => {
    document.addEventListener('DOMContentLoaded', () => {
      const els = document.querySelectorAll('.phone-field');
      for(let el of els) {
          el.addEventListener('focus', () => {
              IMask(
                  el,
                  {
                    mask: '+00000000000000000000',
                  }
                )
          }, {once: true})
      }
    })
})();

(() => {
  // Fancybox.show([{ src: "#success-send-message", type: "inline" }]);
  var wpcf7Elms = document.querySelectorAll( '.wpcf7' );
  for(let el of wpcf7Elms) {
    el.addEventListener( 'wpcf7mailsent', function( event ) {
      const form = el.querySelector('.wpcf7-form');
      form.reset();
      Fancybox.close();
      setTimeout(() => {
        Fancybox.show([{ src: "#success-send-message", type: "inline" }]);
      }, 300)
    }, false );
  }
 
})();

