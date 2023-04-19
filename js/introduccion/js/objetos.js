// Objeto

"use strict"; // ejecuta js en modo estricto

const auto = {
  marca: "Mini Cooper",
  precio: 744000,
  color: "rojo",
};

console.log(auto);

/* console.log(auto.marca);
console.log(auto['marca']);  */

//agregar nuevas propiedades
auto.placa = "HYNN7";

//borrar propiedades
delete auto.color;

console.log(auto);

//destructuracion de objetos

const { precio, marca, placa } = auto;

console.log(`Marca: ${marca}, Precio: ${precio}, Placa: ${placa}`);


//evita que el objeto pueda ser modificado
Object.freeze(auto); 

/**
 * Object.freeze no permite modificar nada del objeto
 * Object.sealed, permite modificar el valor de la propiedad existente de un objeto
 */
auto.color = "red"; 

console.log(Object.isFrozen(auto)); 