const initSiema = (selector) => {
  const mySiema = new Siema({
    selector: `.${selector}`,
    duration: 200,
    easing: 'ease-out',
    perPage: 1, 
    startIndex: 0,
    draggable: true,
    multipleDrag: true,
    threshold: 20,
    loop: false,
    rtl: false,
    onInit: () => {},
    onChange: () => {},
  })
  document.querySelector(`.${selector}__side.prev`).addEventListener('click', () => mySiema.prev())
  document.querySelector(`.${selector}__side.next`).addEventListener('click', () => mySiema.next())

  document.querySelectorAll(`.${selector}__dot`).forEach((dot) => {
    const number = dot.getAttribute('data-number')
    dot.addEventListener('click', () => {
      mySiema.goTo(number)
    })
  })
}
initSiema('siema')

