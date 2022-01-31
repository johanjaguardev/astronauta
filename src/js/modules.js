const modulos = document.querySelectorAll('.modulos__item')
if ( modulos ) {
  modulos.forEach((modulo) => {
    modulo.addEventListener('click', () => {
      document.querySelector('body').classList.toggle('modulos__overlay')
      modulo.querySelector('.modulos__2').classList.toggle('open')
    })
  })
}