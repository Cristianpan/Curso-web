// Arrow functions

const sumar = (num1 = 0, num2 = 0) => {
  return num1 + num2;
};

console.log(sumar());
console.log(sumar(2, 3));

const aprendiendo = (tecnologia) => console.log(`Aprendiendo ${tecnologia}`);

aprendiendo("React Js");
