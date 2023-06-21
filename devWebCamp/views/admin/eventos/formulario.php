<fieldset class="form__fieldset">
    <legend class="form__legend">
        Información Evento
    </legend>

    <div class="form__field">
        <label for="nombre" class="form__label">Nombre Evento</label>
        <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : ''; ?>
        <input class="form__input" type="text" id="nombre" name="nombre" placeholder="Nombre del evento" value="<?= $evento->getNombre()?>">
    </div>
    <div class="form__field">
        <label for="descripcion" class="form__label">Descripcion</label>
        <?= isset($errors['descripcion']) ? "<p class='error'>" . $errors['descripcion'] . "</p>" : ''; ?>
        <textarea name="descripcion" id="descripcion" rows="4" class="form__input" placeholder="Descripcion del evento"><?= $evento->getDescripcion()?></textarea>
    </div>
    <div class="form__field">
        <label for="categoria" class="form__label">Categoria</label>
        <?= isset($errors['categoria']) ? "<p class='error'>" . $errors['categoria'] . "</p>" : ''; ?>
        <select class="form__input" name="categoria" id="categoria">
            <option value="">- Seleccionar -</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option  <?php echo ($evento->getCategoriaId() == $categoria->getId()) ? 'selected' : '' ?> value="<?= $categoria->getId() ?>"><?= $categoria->getNombre() ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <div class="form__field">
        <label for="dia" class="form__label">Día</label>
        <?= isset($errors['dia']) ? "<p class='error'>" . $errors['dia'] . "</p>" : ''; ?>

        <div class="form__radio">
            <?php foreach ($dias as $dia) : ?>
                <div>
                    <label for="<?= strtolower($dia->getNombre()) ?>"><?= $dia->getNombre() ?></label>
                    <input type="radio" id="<?= strtolower($dia->getNombre()) ?>" name="dia" value="<?= $dia->getId() ?>" />
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div class="form__field">
        <label class="form__label">Seleccionar Hora</label>
        <?= isset($errors['hora']) ? "<p class='error'>" . $errors['hora'] . "</p>" : ''; ?>
        
        <ul id="horas" class="horas">
            <?php foreach ($horas as $hora) : ?>
                <li data-hora-id="<?= $hora->getId()?>"  class="horas__hora horas__hora--disabled"><?= $hora->getHora() ?></li>
                <?php endforeach ?>
        </ul>

        <input type="hidden" value="" name="hora">
    </div>
</fieldset>

<fieldset class="form__fieldset">
    <legend class="form__legend">Información Extra</legend>
    <div class="form__field">
        <label for="ponentes" class="form__label">Ponentes</label>
        <?= isset($errors['ponentes']) ? "<p class='error'>" . $errors['ponentes'] . "</p>" : ''; ?>
        <input type="text" class="form__input" id="ponentes" name="ponentes" placeholder="Buscar Ponente">

        <ul id="listado-ponentes" class="listado-ponentes"></ul>

    </div>
    
    <div class="form__field">
        <label for="disponibles" class="form__label">Lugares Disponibles</label>
        <?= isset($errors['disponibles']) ? "<p class='error'>" . $errors['disponibles'] . "</p>" : ''; ?>
        <input type="text" class="form__input" id="disponibles" name="disponibles" placeholder="Ej. 20" value="<?= $evento->getDisponibles()?>">
    </div>
</fieldset>