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

let deliveryMetod = document.getElementsByClassName('shipping-checkout__item-list');
for (let i = 0; i < deliveryMetod.length; i++) {
  deliveryMetod[i].onclick = function () {
    this.classList.toggle('active');
  }
}




// let dataList = {};
// fetch('https://api.hh.ru/areas/7').then(response => {
//   return response.json()
// }).then(
//   json => {
//     dataList = json;
//     json.areas.forEach(area => {
//       var opt = document.createElement('option');
//       opt.value = area.id;
//       opt.innerHTML = area.name;
//       billing_area.appendChild(opt);
//     }
//     );
//   }
// );


// billing_area.addEventListener('change', () => {

//   billing_city.innerHTML = '';
//   dataList.areas.filter(item => item.id == billing_area.options[billing_area.selectedIndex].value)[0].areas.forEach(
//     area => {
//       var opt = document.createElement('option');
//       opt.value = area.id;
//       opt.innerHTML = area.name;
//       billing_city.appendChild(opt);
//     }
//   )

// });











// Добавление и удаления класса по клику
// Выбор блока по ID

// let block = document.getElementById("favorite-id");

//   block.onclick = function () {
//     console.log('Fci');
//     this.classList.toggle('active');
//   }


// Повяление кнопок при скролле страниццы

// let btnsSide = document.querySelector('.side-buttons')
// //
// function magic() {
//   if (window.pageYOffset > 100) {
//     btnsSide.style.display = 'grid'
//   } else { btnsSide.style.display = 'none' }
// }
// //
// // btnsSide.onclick = function () {
// //   window.scrollTo(0, 0)
// // }

// // When scrolling, we run the function
// window.onscroll = magic



// window.onscroll = function () {
//   var scrolled = window.pageYOffset || document.documentElement.scrollTop,
//     topBtn = document.getElementById('sidebtn');
//   if (scrolled > 350) {
//     topBtn.classList.add('active');
//   }
//   else { topBtn.classList.remove('active'); }
// }

// window.onscroll = function () {
//   let scrolled = window.pageYOffset || document.documentElement.scrollTop,
//     topBtn = document.getElementById('sidebtn');
//   if (scrolled > 350) {
//     topBtn?.classList.add('active');
//   }
//   else { topBtn?.classList.remove('active'); }
// }



// // // Получаем элемент с классом body
// const btnsSide = document.querySelector('.side-buttons');

// // Определяем функцию, которая будет вызываться при прокрутке страницы
// function addActiveClass() {
//   // Проверяем, проскролили ли мы страницу на 400px сверху
//   if (window.scrollY >= 200) {
//     // Если да, то добавляем класс active
//     console.log(scrollY);
//     btnsSide.classList.add('active');
//   } else {
//     // Иначе удаляем класс active, если он уже есть
//     btnsSide.classList.remove('active');
//   }
// }

// // Добавляем обработчик события прокрутки
// window.addEventListener('scroll', addActiveClass);