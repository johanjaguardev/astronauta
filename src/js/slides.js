const initSiema = (selector, perPage) => {
  if( document.querySelector(`.${selector}-siema`) ) {
    const siema = new Siema({
      selector: `.${selector}-siema`,
      duration: 200,
      easing: 'ease-out',
      perPage: perPage, 
      startIndex: 0,
      draggable: true,
      multipleDrag: true,
      threshold: 20,
      loop: true,
      rtl: false,
      onInit: () => {},
      onChange: () => {},
    })

    if ( document.querySelector(`.${selector}-siema__side.siema__prev`) ) {
      document.querySelector(`.${selector}-siema__side.siema__prev`).addEventListener('click', () => {
        siema.prev()
      })
    }

    if( document.querySelector(`.${selector}-siema__side.siema__next`) ) {
      document.querySelector(`.${selector}-siema__side.siema__next`).addEventListener('click', () => {
        siema.next()
      })
    }
    
    if ( document.querySelectorAll(`.${selector}-siema__dot`) ) {
      document.querySelectorAll(`.${selector}-siema__dot`).forEach((dot) => {
        const number = dot.getAttribute('data-number')
        dot.addEventListener('click', () => {
          siema.goTo(number)
        })
      })
    }
  }
}
initSiema('test', 3)
initSiema('objetivos', 2)
initSiema('clientes', 6)

