// Funciones

// Declaracion de funciones

function sum(num1 = 0, num2 = 0) {
  return num1 + num2;
}

console.log(sum());
console.log(sum(3, 4));

//expresion de la funcion

const resta = function (num1 = 0, num2 = 0) {
    return num2 - num1; 
};

console.log(resta(4, 5)); 

// IIFE

(function() {
    console.log("Hello World"); 
})(); 

(()=> {console.log("Hola Mundo")})(); 