// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";
window.addEventListener("load", function () {
  document.body.classList.remove("load");
});



// element?.addEventListener
// Фильтр товаров по Категориям


const filterArea = document.querySelector('.filter-category__top');
const filterBox = document.querySelectorAll('.filter-category__slide');
const navBox = filterArea?.querySelectorAll('nav ul li');


const filterGoods = (filterClass) => {
  navBox.forEach((item) => item.classList.remove('active'));
  const active = document.querySelector(`[data-f="${filterClass}"]`);
  if (active) active.classList.add('active');

  filterBox.forEach((item) => {
    item.classList.remove('hide');
    if (!item.classList.contains(filterClass) && filterClass !== 'all') {
      item.classList.add('hide');
    }
  });
};

document.querySelector('.filter-category__nav')?.addEventListener('click', (event) => {

  if (event.target.tagName !== 'LI') return;
  let filterClass = event.target.dataset['f'];
  filterGoods(filterClass);
  // window.location.hash = event.target.dataset['f'];
});

// if (window.location.hash) {
//   console.log(window.location.hash);
//   filterGoods(window.location.hash.slice(1));
// }


// Добавление и удаления класса по клику


let block = document.getElementsByClassName('product-item__favorite');
for (let i = 0; i < block.length; i++) {
  block[i].onclick = function () {
    this.classList.toggle('active');
  }
}

let addToBasket = document.getElementsByClassName('button__basket');
for (let i = 0; i < addToBasket.length; i++) {
  addToBasket[i].onclick = function () {
    this.classList.toggle('active');
  }
}

let addSocial = document.getElementsByClassName('contact-social__button');
for (let i = 0; i < addSocial.length; i++) {
  addSocial[i].onclick = function () {
    this.classList.toggle('active');
  }
}

let deliveryMetod = document.getElementsByClassName('shipping-checkout__item-list');
for (let i = 0; i < deliveryMetod.length; i++) {
  deliveryMetod[i].onclick = function () {
    this.classList.toggle('active');
  }
}


// // Получаем элемент с классом body
const btnsSide = document.querySelector('.side-buttons');

// Определяем функцию, которая будет вызываться при прокрутке страницы
function addActiveClass() {
  // Проверяем, проскролили ли мы страницу на 400px сверху
  if (window.scrollY >= 200) {
    // Если да, то добавляем класс active
    // console.log(scrollY);
    btnsSide.classList.add('active');
  } else {
    // Иначе удаляем класс active, если он уже есть
    btnsSide.classList.remove('active');
  }
}

// Добавляем обработчик события прокрутки
window.addEventListener('scroll', addActiveClass);


let menuParents = document.querySelectorAll('.menu__item');

for (let index = 0; index < menuParents.length; index++) {
  const menuParent = menuParents[index];
  menuParent.addEventListener('mouseenter', function (e) {
    menuParent.classList.add('_active');
  });
  menuParent.addEventListener('mouseleave', function (e) {
    menuParent.classList.remove('_active');
  });
}