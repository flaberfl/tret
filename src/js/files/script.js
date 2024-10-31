// Подключение функционала "Чертоги Фрилансера"
import { isMobile } from "./functions.js";
// Подключение списка активных модулей
import { flsModules } from "./modules.js";
window.addEventListener("load", function () {
  document.body.classList.remove("load");
});



document.querySelectorAll


// Добавление и удаления класса по клику


let block = document.getElementsByClassName('product-item__favorite');
for (let i = 0; i < block.length; i++) {
  block[i].onclick = function () {
    this.classList.toggle('active');
  }
}

let sizeValue = document.getElementsByClassName('product-item__size-value');
for (let i = 0; i < sizeValue.length; i++) {
  sizeValue[i].onclick = function () {
    console.log('fff');
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
