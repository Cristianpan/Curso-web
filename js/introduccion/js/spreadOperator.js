// Spread Operator

const datosPersona = {
  nombre: "Cristian David",
  apellido: "Pan Zaldivar",
};
const direccionPersona = {
  calle: 14,
  col: "México",
};


const persona = {...datosPersona, ...direccionPersona}; 

console.log(persona); 