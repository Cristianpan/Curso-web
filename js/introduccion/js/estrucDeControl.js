/**
 * ==, comparacion
 * ===, comparacion estricta
 */

//if else
const x = 100;

if (x === 100) {
  console.log("Es igual");
} else {
  console.log("No es igual");
}

//Switch

const metodoDePago = "Efectivo";

switch (metodoDePago) {
  case "Efectivo":
    console.log("Pagaste con efectivo");
    break;
  case "Tarjea":
    console.log("Pagaste con tarjeta");
    break;
  case "Cheque":
    console.log("El usuario pagará con cheque. Revisaremos los fondos");
  default:
    console.log("No existe el método de pago dado");
}

//For loop
const printEven = () => {
  for (let i = 0; i < 10; i++) {
    if (i % 2 == 0) {
      console.log(`${i} es multiplo de 2`);
    }
  }
};

//printEven();

//While loop

let i = 0;

const printMultipleOf3 = () => {
    while (i < 10) {
      if (i % 3 == 0) {
        console.log(`${i} es multiplo de 3`);
      }
    
      i++; 
    }
} 

//printMultipleOf3(); 


// Do while loop
do {
    console.log(i); 
    i++; 
} while (i < 10); 
