//Strings

const fraseMotivacional = "Centrate hacia donde quieres ir, no en lo que temes";

/**
 * Formas alternativas de crear un string
 * const producto = String("Monitor 30 in")
 * const producto = new String ("Monitor 30 in"); arreglo de caracteres
 */

console.log(fraseMotivacional);

// obtener numero de caracteres

console.log(fraseMotivacional.length);

// comprobar si una palabra existe en una cadena de texto

/*
 * >= 0, existe 
 * < 0, no existe
 */
console.log(fraseMotivacional.indexOf('Centrate')); 

/**
 * true, existe 
 * false, no existe
 */
console.log(fraseMotivacional.includes("Centrate")); 
