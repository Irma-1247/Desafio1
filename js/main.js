const opciones = document.querySelector('#opciones');
const contenidoSelect = document.querySelector('#select .contenido-select');
const hiddenInput = document.querySelector('#inputSelect');

document.querySelectorAll('#opciones > .opcion').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelect.innerHTML = e.currentTarget.innerHTML;
		opciones.classList.toggle('active');
		hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;
	});
});

select.addEventListener('click', () =>{
	opciones.classList.toggle('active');
});

//Repitiendo para el segundo
const opciones2 = document.querySelector('#opciones2');
const contenidoSelect2 = document.querySelector('#select2 .contenido-select');
const hiddenInput2 = document.querySelector('#inputSelect2');

document.querySelectorAll('#opciones2 > .opcion2').forEach((opcion2) => {
	opcion2.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelect2.innerHTML = e.currentTarget.innerHTML;
		opciones2.classList.toggle('active');
		hiddenInput2.value = e.currentTarget.querySelector('.titulo').innerText;
	});
});

select2.addEventListener('click', () =>{
	opciones2.classList.toggle('active');
});