//try catch

const num1 = 20; 
const num2 = 30; 


try {
    console.log(num1); 
    console.log(num3); 
    console.log(num2); 
} catch (error) {
    console.log(error.message); 
}


const tipoDePago = "BitCoin"; 
try {
    if (tipoDePago !=="Efectivo" || tipoDePago !== "Tarjeta"){
        throw new Error("No existe el metodo de pago"); 
    }
} catch (error) {
    console.log(error.message); 
}