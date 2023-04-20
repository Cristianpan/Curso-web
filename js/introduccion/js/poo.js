// POO

/* object literal */

const producto = {
  nombre: "Telefono",
  precio: 5000,
};

// Object constructor

function Producto(nombre, precio) {
  this.nombre = nombre;
  this.precio = precio;
}
/**
 * proto type
 *
 * Crear funciones que solo se utilizan en un objeto especifico
 */

Producto.prototype.formatearProducto = function () {
  return `El Producto ${this.nombre} tiene un precio de $ ${this.precio}`;
};

const producto2 = new Producto("Tablet", 2000);
const producto3 = new Producto("Laptop", 15000);

console.log(producto2.formatearProducto());

// Class

class Persona {
  constructor(nombre, edad) {
    this.nombre = nombre;
    this.edad = edad;
  }

  getInfo() {
    return `Nombre: ${this.nombre}, Edad: ${this.edad} `;
  }
}

class Estudiante extends Persona {
  constructor(nombre, edad, escuela, grado) {
    super(nombre, edad);
    this.escuela = escuela;
    this.grado = grado;
  }

  //overwrite
  getInfo() {
    return `${super.getInfo()} Escuela: ${this.escuela}, Grado: ${this.grado}`;
  }
}

const estudiante = new Estudiante("Cristian", 22, "UADY", "4to semestre");
console.log(estudiante.getInfo());

const persona = new Persona("Lourdes", 45);
console.log(persona.getInfo())