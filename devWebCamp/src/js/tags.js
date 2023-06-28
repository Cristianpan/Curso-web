(()=> {
    document.addEventListener('DOMContentLoaded', iniciarApp); 
    let tags = [];

    function iniciarApp(){
        readTags(); 
    }

    function readTags(){
        const tagsInput = document.querySelector('#tags_input')
        const tagsInputHidden = document.querySelector('[name=tags]');
        if (tagsInput){
            tagsInput.addEventListener('beforeinput',saveTag); 

            if (tagsInputHidden.value){
                tags = tagsInputHidden.value.split(',');
                showTags();
            }
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
        const tag = createTagLi(newTag);
        tagsDiv.appendChild(tag);
        updateInputHidden();
    }

    function showTags(){
        const tagsDiv = document.querySelector("#tags"); 
        tags.forEach((tag)=> {
            const tagLi = createTagLi(tag);
            tagsDiv.appendChild(tagLi);
        });
    }

    function removeTag(e){
        tags = tags.filter(tag => tag != e.target.textContent);
        e.target.remove(); 
        updateInputHidden();
    }

    function updateInputHidden(){
        const inputHidden = document.querySelector('[name=tags]'); 
        inputHidden.value = tags.toString();
    }

    function createTagLi(tag){
        const tagLi = document.createElement('LI');
        tagLi.classList.add('form__tag');
        tagLi.textContent = tag;
        tagLi.ondblclick = removeTag;
        return tagLi;
    }

})();