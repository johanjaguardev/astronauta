const hamburguer = document.querySelector('.hamburguer')
const header = document.querySelector('.header')
hamburguer.addEventListener('click', () => {
  hamburguer.classList.toggle('open')
  header.classList.toggle('open')
})