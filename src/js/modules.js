const modulos = document.querySelectorAll('.modulos__item')
if ( modulos ) {
  modulos.forEach((modulo) => {
    modulo.querySelector('.modulos__2').classList.remove('open') 
    modulo.addEventListener('click', () => {
      modulo.querySelector('.modulos__2').classList.toggle('open') 
      document.querySelector('body').classList.toggle('modulos__overlay') 
    })
  })
}

const modulosClose = document.querySelectorAll('.modulos__close')
if ( modulosClose ) {
  modulosClose.forEach((close) => {
    document.querySelector('body').classList.remove('modulos__overlay') 
    close.closest('.modulos__2').classList.remove('open')
  })
}