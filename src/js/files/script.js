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
  console.log('Я нажал!!');

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


// let sizeValue = document.querySelectorAll('.product-item__size-value');
// for (let i = 0; i < sizeValue.length; i++) {
//   sizeValue[i].onclick = function () {
//     this.classList.toggle('active');
//   }
// }

// sizeValue.forEach(item => {
//   item.addEventListener('click', (e) => {
//     console.log(sizeValue);
//     sizeValue.forEach(el => { el.classList.remove('active'); });
//     item.classList.add('active');
//   })
// })

let addToBasket = document.getElementsByClassName('button__basket');
for (let i = 0; i < addToBasket.length; i++) {
  addToBasket[i].onclick = function () {
    this.classList.toggle('active');
  }
}












// Добавление и удаления класса по клику
// Выбор блока по ID

// let block = document.getElementById("favorite-id");

//   block.onclick = function () {
//     console.log('Fci');
//     this.classList.toggle('active');
//   }
