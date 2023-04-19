/**
 * Variables en js
 * Variables de tipos dinamicos
 * Sensible case
 */

// var ya no se usa o al menos no se recomienda su uso por el scope

var clase = "Geometría Avanzada"; // Inicialización de variable con valor

var salon; //Inicializacion de variable sin valor

salon = 1;

var nombre = "Cristian",
  apellido = "Pan",
  telefono = "9912312313";

/*Uso de cambalcase para variables*/

var nombreProducto = "Monitor HD";

const user = {
  nombre: "Cristian",
  apellido: "Pan",
  telefono: "9912312313",
};

/*Pascalcase para clases*/
class EmpleadoAdministrador {
  constructor(nombre, sueldo) {
    this.nombre = nombre;
    this.sueldo = sueldo;
  }
}

const empleado = new EmpleadoAdministrador("Cristian", 2000); 
console.log(empleado) // objetc

// Variable let

let auto = "Mini Cooper";

let x = 1,
  y = 2;
z = 3;

// Variable const

/**
 * Representa un valor constante
 */
const helloWorld = "Hello world";
