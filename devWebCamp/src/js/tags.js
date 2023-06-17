(()=> {
    window.addEventListener('DOMContentLoaded', iniciarApp); 
    let tags = [];

    function iniciarApp(){
        readTags(); 
    }

    function readTags(){
        const tagsInput = document.querySelector('#tags_input')
        if (tagsInput){
            tagsInput.addEventListener('beforeinput',saveTag); 
        }   
    }

    function saveTag(e){
        if (e.data === ','){
            //Se evita que la coma se ingresada en el input
            e.preventDefault();
            const value = e.target.value.trim();

            if (value){
                tags = [...tags, value];
                e.target.value = '';
                addTag(value);
            }
        }
    }

    function addTag(newTag){
        const tagsDiv = document.querySelector("#tags"); 
        const tag = document.createElement('LI');
        tag.classList.add('form__tag');
        tag.textContent = newTag;
        tag.ondblclick = removeTag;
        tagsDiv.appendChild(tag);
        updateInputHidden();
    }

    function removeTag(e){
        console.log(e);
        tags = tags.filter(tag => tag != e.target.textContent);
        e.target.remove(); 
        updateInputHidden();
    }

    function updateInputHidden(){
        const inputHidden = document.querySelector('[name=tags]'); 
        inputHidden.value = tags.toString();
    }

})();