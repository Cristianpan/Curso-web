//Array methods

const numeros = [1, 2, 3, 4]; 

const meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo']; 


//union de dos arreglos con spread operator
const numeros2 = [5, 6, 7, 8, ...numeros]; 

//agregar elementos a un arreglo

numeros.push(5); //agrega elemento al final del arreglo
numeros.unshift(80); //agrega al inicio del arreglo

console.log(numeros); 

//eliminar elementos a un arreglo; 

meses.pop(); //elimina el valor al final
meses.shift(); //elimina el valor del inicio
meses.slice(0, 1); //elimina n valores desde la posicion dada

console.log(meses); 

/**
 * retorna un nuevo arreglo con los elementos que cumplan la condicion dada
 * 
 */

const nuevosMeses = meses.filter((mes)=> mes != "Enero"); 

console.log(nuevosMeses); 

//for each 

numeros.forEach(elemen => console.log(elemen)); 

/**
 * includes
 * retorna si existe o no, el elemento dado en el arreglo
 */
console.log(meses.includes('Marzo')); 
console.log(meses.includes('Diciembre')); 

//Some ideal para arreglo de objetos

const alumnos = [
    {nombre: "Pedro", edad: 20},
    {nombre: "Juan", edad: 15},
    {nombre: "Diana", edad: 32},
    {nombre: "Roberto", edad: 18},
    {nombre: "Julio", edad: 21},
]

let result = alumnos.some((alumno)=> {return alumno.edad === 32});
console.log(result); 


// reduce 

result = alumnos.reduce((total, alumno) => {
    return total + alumno.edad; 
}, 0); 

console.log(result); 