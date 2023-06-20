<fieldset class="form__fieldset">
    <legend class="form__legend">Informacion Personal</legend>

    <div class="form__field">
        <label for="nombre" class="form__label">Nombre</label>
        <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="nombre" name="nombre" placeholder="Nombre del ponente" value="<?= sanitizarHtml($ponente->getNombre()) ?>">
    </div>
    <div class="form__field">
        <label for="apellido" class="form__label">Apellido</label>
        <?= isset($errors['apellido']) ? "<p class='error'>" . $errors['apellido'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="apellido" name="apellido" placeholder="Apellido del ponente" value="<?= sanitizarHtml($ponente->getApellido()) ?>">
    </div>
    <div class="form__field">
        <label for="ciudad" class="form__label">Ciudad</label>
        <?= isset($errors['ciudad']) ? "<p class='error'>" . $errors['ciudad'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="ciudad" name="ciudad" placeholder="Ciudad del ponente" value="<?= sanitizarHtml($ponente->getCiudad()) ?>">
    </div>
    <div class="form__field">
        <label for="pais" class="form__label">País</label>
        <?= isset($errors['pais']) ? "<p class='error'>" . $errors['pais'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="pais" name="pais" placeholder="Pais del ponente" value="<?= sanitizarHtml($ponente->getPais()) ?>">
    </div>
    <div class="form__field">
        <label for="imagen" class="form__label">Imagen</label>
        <?= isset($errors['imagen']) ? "<p class='error'>" . $errors['imagen'] . "</p>" : ''; ?>
        <input class="form__input form__input--file" type="file" name="imagen">
    </div>

    <?php if ($ponente->getImagen()) : ?>
        <p>Imagen Actual:</p>
        <div class="form__image">
            <picture>
                <source srcset="<?= $_ENV['HOST'] . "/img/speakers/" . $ponente->getImagen() . ".webp" ?>" type="image/webp">
                <source srcset="<?= $_ENV['HOST'] . "/img/speakers/" . $ponente->getImagen() . ".png" ?>" type="image/png">
                <img src="<?= $_ENV['HOST'] . "/img/speakers/" . $ponente->getImagen() . ".png" ?>" alt="">
            </picture>
        </div>
    <?php endif ?>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Informacion Extra</legend>

    <div class="form__field">
        <label for="tags_input" class="form__label">Áreas de Experiencia (separadas por coma)</label>
        <?= isset($errors['tags']) ? "<p class='error'>" . $errors['tags'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="tags_input" placeholder="Ej. Node.js, PHP, CSS">
        <ul id="tags" class="form__list"></ul>
        <input type="hidden" name="tags" value="<?= sanitizarHtml($ponente->getTags()) ?>">
    </div>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Redes Sociales</legend>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-facebook"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[facebook]" placeholder="Facebook" value="<?= $redes->facebook ?? ''?>">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-twitter"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[twitter]" placeholder="Twitter" value="<?= $redes->twitter ?? ''?>">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[youtube]" placeholder="Youtube" value="<?= $redes->youtube ?? ''?>">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-instagram"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[instagram]" placeholder="Instagram" value="<?= $redes->instagram ?? ''?>">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-tiktok"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[tiktok]" placeholder="Tiktok" value="<?= $redes->tiktok ?? ''?>">
        </div>
    </div>
    <div class="form__field">
        <div class="form__container-icon">
            <div class="form__icon">
                <i class="fa-brands fa-github"></i>
            </div>
            <input class="form__input--social" type="text" name="redes[github]" placeholder="Github" value="<?= $redes->github ?? ''?>" >
        </div>
    </div>
</fieldset>