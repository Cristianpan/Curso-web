// querySelector

const heading = document.querySelector(".header__text h2"); // 0 o 1 elemento

//heading.textContent = "Nuevo Heading";
console.log(heading);

//querySelectorAll

const enlaces = document.querySelectorAll(".nav__link"); //retorna 0 o todos los elementos con el mismo "identificador"
//console.log(enlaces);

/* enlaces[0].href = "https://www.youtube.com/"; //modificar atributo href
console.log(enlaces[0].href)
enlaces[0].classList.add('nueva-clase'); //agregar nueva clase
enlaces[0].classList.remove('nav__link'); //remover clase existente
 */

/// getElementById

const heading2 = document.getElementById("heading");

//console.log(heading2); 



// Generar un nuevo elemento 

const nuevoEnlace = document.createElement('A'); 

// Agregar el href
nuevoEnlace.href = "https://www.youtube.com/watch?v=k7t2XOhA5UY"

//Agregar el texto 
nuevoEnlace.textContent = "Recetas"

//Agregar clase 
nuevoEnlace.classList.add("nav__link"); 

//Agregarlo al documento

const nav = document.querySelector('.nav'); 
nav.appendChild(nuevoEnlace); 