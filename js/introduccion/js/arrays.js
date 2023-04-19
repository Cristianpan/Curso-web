// Arrays
"use strict"; 
const numeros = [1, 2, 3, 4]; 

console.table(numeros)

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']; 

//acceder a valores de un arreglo; 

console.log(numeros[0]); 
console.log(meses[0]); 

// numero de items en un arreglo
console.log(meses.length); 

//imprimir todos los meses con spread operator

console.log(...meses); 

//imprimir todos los meses con for each 

numeros.forEach((elemen)=> {
    console.log(elemen); 
}); 
