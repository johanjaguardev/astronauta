const hamburguer = document.querySelector('.hamburguer')
const header = document.querySelector('.header')
const menuLinks = document.querySelectorAll('.header__menu li a')

console.log(menuLinks)

if(hamburguer) {
  hamburguer.addEventListener('click', () => {
    hamburguer.classList.toggle('open')
    header.classList.toggle('open')
  })
}

if( menuLinks ) {
  menuLinks.forEach((link) => {
    link.addEventListener('click', () => {
      hamburguer.classList.toggle('open')
      header.classList.toggle('open')
    })
  })
}
