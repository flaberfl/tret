// Підключення з node_modules
import * as noUiSlider from 'nouislider';

// Підключення стилів з scss/base/forms/range.scss 
// у файлі scss/forms/forms.scss

// Підключення стилів з node_modules
// import 'nouislider/dist/nouislider.css';

export function rangeInit() {
	const squareSlider = document.querySelector('#range');
	if (squareSlider) {
		noUiSlider.create(squareSlider, {
			start: 1, // [0,200000]
			connect: [true, false],
			step: 1,
			range: {
				'min': [1],
				'max': [200]
			},
			/*
			format: wNumb({
				decimals: 0
			})
			*/
		});

		var inputSq = document.getElementById('num');

		squareSlider.noUiSlider.on('update', function (values) {
			inputSq.value = Math.round(values);
		});

		inputSq.addEventListener('change', function (oninput) {
			squareSlider.noUiSlider.set(this.value);
		});


		// priceSlider.noUiSlider.on('change', function (values, handle) {


		// 	// var value = values[handle];

		// 	// if (handle) {
		// 	// 	input.value = value;
		// 	// }
		// });


		// input.value = Math.round(values);



		/*
		const priceStart = document.getElementById('price-start');
		const priceEnd = document.getElementById('price-end');
		priceStart.addEventListener('change', setPriceValues);
		priceEnd.addEventListener('change', setPriceValues);
		*/
		function setPriceValues() {
			let priceStartValue;
			let priceEndValue;
			if (priceStart.value != '') {
				priceStartValue = priceStart.value;
			}
			if (priceEnd.value != '') {
				priceEndValue = priceEnd.value;
			}
			priceSlider.noUiSlider.set([priceStartValue, priceEndValue]);
		}
	}
}
rangeInit();

