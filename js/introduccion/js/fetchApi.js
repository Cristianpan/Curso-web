const cardText = document.querySelector(".card__text"); 
const boton = document.querySelector(".boton"); 


const getChuckNorrisRandomPhrase = async ()=> {
    const response = await fetch("https://api.chucknorris.io/jokes/random");
    const {value} = await response.json();
    return value;
}
/*funcion para cuando se carga la página */
(async ()=> {
    cardText.textContent = await getChuckNorrisRandomPhrase() 
})(); 

//evento de click para cambiar la frase
boton.addEventListener("click", async ()=> {
    cardText.textContent = await getChuckNorrisRandomPhrase() ; 
})

