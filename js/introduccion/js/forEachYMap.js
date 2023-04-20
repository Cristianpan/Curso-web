const alumnos = [
    {nombre: "Pedro", edad: 20},
    {nombre: "Juan", edad: 15},
    {nombre: "Diana", edad: 32},
    {nombre: "Roberto", edad: 18},
    {nombre: "Julio", edad: 21},
]

//FoEach 

alumnos.forEach(({nombre, edad})=> {
    console.log(`Nombre: ${nombre}, Edad: ${edad}`); 
}); 

//Map -> retorna un nuevo arreglo

const nombreAlumnos = alumnos.map(({nombre})=> nombre); 

console.log(nombreAlumnos)