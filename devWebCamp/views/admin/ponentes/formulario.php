<fieldset class="form__fieldset">
    <legend class="form__legend">Informacion Personal</legend>

    <div class="form__field">
        <label for="nombre" class="form__label">Nombre</label>
        <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="nombre" name="nombre" placeholder="Nombre del ponente">
    </div>
    <div class="form__field">
        <label for="apellido" class="form__label">Apellido</label>
        <?= isset($errors['apellido']) ? "<p class='error'>" . $errors['apellido'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="apellido" name="apellido" placeholder="Apellido del ponente">
    </div>
    <div class="form__field">
        <label for="ciudad" class="form__label">Ciudad</label>
        <?= isset($errors['ciudad']) ? "<p class='error'>" . $errors['ciudad'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="ciudad" name="ciudad" placeholder="Ciudad del ponente">
    </div>
    <div class="form__field">
        <label for="pais" class="form__label">País</label>
        <?= isset($errors['pais']) ? "<p class='error'>" . $errors['pais'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="pais" name="pais" placeholder="Pais del ponente">
    </div>
    <div class="form__field">
        <label for="imagen" class="form__label">Imagen</label>
        <?= isset($errors['pais']) ? "<p class='error'>" . $errors['pais'] . "</p>" : ''; ?>
        <input class="form__input form__input--file" type="file" id="imagen" name="imagen">
    </div>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Informacion Extra</legend>

    <div class="form__field">
        <label for="tags_input" class="form__label">Áreas de Experiencia (separadas por coma)</label>
        <input class="form__input" type="text" id="tags_input" name="tags_input" placeholder="Ej. Node.js, PHP, CSS">
        <ul id="tags" class="form__list"></ul>
        <input type="hidden" name="tags">
    </div>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Redes Sociales</legend>
    <div class="form__field">
        <div class="form__container-icon"> 
            <div class="form__icon">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[facebook]" placeholder="Facebook">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon"> 
            <div class="form__icon">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[twitter]" placeholder="Twitter">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon"> 
            <div class="form__icon">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[youtube]" placeholder="Youtube">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon"> 
            <div class="form__icon">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[instagram]" placeholder="Instagram">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon"> 
            <div class="form__icon">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[tiktok]" placeholder="Tiktok">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon"> 
            <div class="form__icon">
                <i class="fa-brands fa-github"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[github]" placeholder="Github">
        </div>
    </div>
</fieldset>