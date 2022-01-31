const hamburguer = document.querySelector('.hamburguer')
const header = document.querySelector('.header')
if(hamburguer) {
  hamburguer.addEventListener('click', () => {
    hamburguer.classList.toggle('open')
    header.classList.toggle('open')
  })
}
