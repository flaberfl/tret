import { isMobile } from "./functions.js";
import { flsModules } from "./modules.js";

// ymaps.ready(init);

// function init() {
//   // var center = [59.9386, 30.3141];
//   var myMap1 = new ymaps.Map('map1', {
//     center: [59.9386, 30.3141],
//     zoom: 18
//   });
//   var myMap2 = new ymaps.Map('map2', {
//     center: [59.9386, 30.3241],
//     zoom: 16
//   });
//   var myPlacemark2 = new ymaps.Placemark([59.9386, 30.3241], {
//     hintContent: 'Метка'
//   }, {

//     iconLayout: 'default#image',
//     iconImageHref: 'img/map/point.svg',
//     // Размеры метки.
//     iconImageSize: [284, 284],
//   });
//   // myMap1.geoObjects.add(myPlacemark1);
//   myMap2.geoObjects.add(myPlacemark2);


//   myMap1.controls.remove('geolocationControl');
//   myMap1.controls.remove('searchControl'); // удаляем поиск
//   myMap1.controls.remove('trafficControl'); // удаляем контроль трафика
//   myMap1.controls.remove('typeSelector'); // удаляем тип

//   // map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
//   myMap1.controls.remove('zoomControl'); // удаляем контрол зуммирования
//   myMap1.controls.remove('rulerControl'); // удаляем контрол правил
//   myMap1.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)


//   myMap2.controls.remove('geolocationControl');
//   myMap2.controls.remove('searchControl'); // удаляем поиск
//   myMap2.controls.remove('trafficControl'); // удаляем контроль трафика
//   myMap2.controls.remove('typeSelector'); // удаляем тип

//   // map.controls.remove('fullscreenControl'); // удаляем кнопку перехода в полноэкранный режим
//   myMap2.controls.remove('zoomControl'); // удаляем контрол зуммирования
//   myMap2.controls.remove('rulerControl'); // удаляем контрол правил
//   myMap2.behaviors.disable(['scrollZoom']); // отключаем скролл карты (опционально)
// }


function autoRemoveActiveClass() {

  const elements = document.querySelectorAll(".reviews-map__box");
  elements.forEach((element, i) => {
    element.classList.remove('active')
  })
}

if (document.querySelector('.reviews-map__person_1') !== null) {
  document.querySelector('.reviews-map__person_1').addEventListener('mouseenter', function () {
    autoRemoveActiveClass();
    document.querySelector('.reviews-map__box_1').classList.toggle('active');
  });
}

if (document.querySelector('.reviews-map__person_2') !== null) {
  document.querySelector('.reviews-map__person_2').addEventListener('mouseenter', function () {
    autoRemoveActiveClass();
    document.querySelector('.reviews-map__box_2').classList.toggle('active');
  });
}

if (document.querySelector('.reviews-map__person_3') !== null) {
  document.querySelector('.reviews-map__person_3').addEventListener('mouseenter', function () {
    autoRemoveActiveClass();
    document.querySelector('.reviews-map__box_3').classList.toggle('active');
  });
}

if (document.querySelector('.reviews-map__person_4') !== null) {
  document.querySelector('.reviews-map__person_4').addEventListener('mouseenter', function () {
  autoRemoveActiveClass();
  document.querySelector('.reviews-map__box_4').classList.toggle('active');
});
}

if (document.querySelector('.reviews-map__person_5') !== null) {
  document.querySelector('.reviews-map__person_5').addEventListener('mouseenter', function () {
    autoRemoveActiveClass();
    document.querySelector('.reviews-map__box_5').classList.toggle('active');
  });
}

if (document.querySelector('.reviews-map__person_6') !== null) {
  document.querySelector('.reviews-map__person_6').addEventListener('mouseenter', function () {
    autoRemoveActiveClass();
    document.querySelector('.reviews-map__box_6').classList.toggle('active');
  });
}

if (document.querySelector('.reviews-map__person_7') !== null) {
  document.querySelector('.reviews-map__person_7').addEventListener('mouseenter', function () {
    autoRemoveActiveClass();
    document.querySelector('.reviews-map__box_7').classList.toggle('active');
  });
}

// Присвоим попапам и линкам на них порядковые номера

// const objPopupVideoLink = document.querySelectorAll('.video-popup');
// const objPopupVideo = document.querySelectorAll('.video-popup');

// objPopupVideoLink.forEach((element, i) =>
//   element.setAttribute('data-popup', '#video-popup' + '-' + i));

// for (var i = 0, b; b = document.getElementById('videos-popup-video'); ++i) {
//   b.id += '-' + i;
// }



const objPopupVideoLink = document.querySelectorAll('.video-popup');
const objPopupVideo = document.querySelectorAll('.video-popup');

objPopupVideoLink.forEach((element, i) =>
  element.setAttribute('data-popup', '#video-popup' + '-' + i));

for (var i = 0, b; b = document.getElementById('video-popup'); ++i) {
  b.id += '-' + i;
}




// const objPopupTypesLinkNew = document.querySelectorAll('.item-types__link_new');
// const objPopupNew = document.querySelectorAll('.types-works-popup_new');

// objPopupTypesLinkNew.forEach((element, i) =>
//   element.setAttribute('data-popup', '#types-works-popup-new' + '-' + i));

// for (var i = 0, b; b = document.getElementById('types-works-popup-new'); ++i) {
//   b.id += '-' + i;
// }


// const objPopupTypesLinkOld = document.querySelectorAll('.item-types__link_old');
// const objPopupOld = document.querySelectorAll('.types-works-popup_old');

// objPopupTypesLinkOld.forEach((element, i) =>
//   element.setAttribute('data-popup', '#types-works-popup-old' + '-' + i));

// for (var i = 0, b; b = document.getElementById('types-works-popup-old'); ++i) {
//   b.id += '-' + i;
// }









// Назначение активного ТАБА
const activeTabs = document.querySelectorAll('.tabs__title_start');
activeTabs.forEach((element, i) => {
  element.classList.add('_tab-active')
})

// Диапазонный слайдер

let range = document.querySelector('.range-input');
let field = document.getElementById('num1');
let squareHidden = document.getElementById('sh');
let from = document.getElementById('from');
let to = document.getElementById('to');


range.addEventListener('input', function (e) {
  field.value = e.target.value;
  squareHidden.innerHTML = field.value;

  from.innerHTML = 0;
  to.innerHTML = 0;

  if (field.value >= 1 && field.value <= 44) {
    from.innerHTML = 30;
    to.innerHTML = 49;
  }

  if (field.value >= 45 && field.value <= 69) {
    from.innerHTML = 49;
    to.innerHTML = 74;
  }
  if (field.value >= 70 && field.value <= 99) {
    from.innerHTML = 75;
    to.innerHTML = 100;
  }
  if (field.value >= 100 && field.value <= 150) {
    from.innerHTML = 106;
    to.innerHTML = 135;
  }
  if (field.value > 150) {
    from.innerHTML = 120;
    to.innerHTML = '~';
  }
});

field.addEventListener('input', function (e) {
  range.value = e.target.value;
  squareHidden.innerHTML = field.value;

  if (field.value >= 1 && field.value <= 44) {
    from.innerHTML = 30;
    to.innerHTML = 49;
  }

  if (field.value >= 45 && field.value <= 69) {
    from.innerHTML = 49;
    to.innerHTML = 74;
  }
  if (field.value >= 70 && field.value <= 99) {
    from.innerHTML = 75;
    to.innerHTML = 100;
  }
  if (field.value >= 100 && field.value <= 150) {
    from.innerHTML = 106;
    to.innerHTML = 135;
  }
  if (field.value > 150) {
    from.innerHTML = 120;
    to.innerHTML = "";
  }
});

for (let e of document.querySelectorAll('input[type="range"].slider-progress')) {
  e.style.setProperty('--value', e.value);
  e.style.setProperty('--min', e.min == '' ? '0' : e.min);
  e.style.setProperty('--max', e.max == '' ? '100' : e.max);
  e.addEventListener('input', () => e.style.setProperty('--value', e.value));
}

// Код квиза
const quiz = document.querySelector('.quiz-form');
const quizItems = quiz.querySelectorAll('.quiz-form__fieldset');
const btnsNext = quiz.querySelectorAll('.quiz-form__button_next');
const btnsPrev = quiz.querySelectorAll('.quiz-form__button_prev');
const startNext = document.getElementById('start-next');


let count = 0;
quizItems[count].classList.add('_active');

btnsNext.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    count++;
    initQuiz();
  });
  btn.disabled = true;
});

btnsPrev.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    e.preventDefault();
    count--;
    initQuiz();
  });
});

function initQuiz() {

  quizItems.forEach((element, i) => {
    element.classList.remove('_active')
    if (i === count) {
      element.classList.add('_active')
    }
  })
  changeHeader();
}
changeHeader();


field.oninput = ValueInp;
function ValueInp() {

  this.value = this.value.substr(0, 4);
  if (this.value > 500) {
    this.value = this.value.substr(0, 1);
  }

  if (this.value !== '') {
    startNext.disabled = false;
  } else {
    startNext.disabled = true;
  }
}


quizItems.forEach((quizItem, quizItemIndex) => {

  quizItem.addEventListener('change', (e) => {
    const target = e.target;
    const inputsChecked = quizItem.querySelectorAll('input:checked');

    if (inputsChecked.length > 0) {
      // разблокировать кнопку именно эту
      btnsNext[quizItemIndex].disabled = false;
    } else {
      // заблокировать эту кнопку
      btnsNext[quizItemIndex].disabled = true;

      if (field.value !== '') {
        btnsNext[quizItemIndex].disabled = false;
      } else {
        btnsNext[quizItemIndex].disabled = true;
      }
    }
  })
});

function changeHeader() {
  const elementsForm = quiz.querySelectorAll('.quiz-form__fieldset_8');
  const subVisible = quiz.querySelectorAll('[sub-visible]');
  const subHidden = quiz.querySelectorAll('[sub-hidden]');

  subVisible.forEach(element => {
    element.hidden = false;
  });

  subHidden.forEach(element => {
    element.hidden = true;
  });

  elementsForm.forEach(elementForm => {

    if (elementForm.classList.contains('_active')) {

      subVisible.forEach(element => {
        element.hidden = true;
      });

      subHidden.forEach(element => {
        element.hidden = false;
      });
    }
  });
}

// Скрипт вывода наименования подарка при выборе подарка в квизе
function SendPresent() {
  let present = document.querySelector('.present-options');
  let radios = present.querySelectorAll('input[type="radio"]');
  let outputPresent = document.getElementById('present');
  let btnPresent = document.querySelector('.button__present');

  btnPresent.addEventListener('click', function () {
    for (let radio of radios) {
      if (radio.checked) {
        outputPresent.innerHTML = radio.value;
      }
    }
  });
}

// Запуск скрипта - когда запущен попап
document.addEventListener("afterPopupOpen", function (e) {
  const currentPopup = e.detail.popup;
  SendPresent();
});


flsModules.popup.close('#interview-popup')
console.log(flsModules.popup.close('#interview-popup'));

