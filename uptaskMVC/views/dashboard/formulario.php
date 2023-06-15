<?= isset($errors['proyecto']) ? "<p class='error'>" . $errors['proyecto'] . "</p>" : ''; ?>
<div class="field">
    <label for="proyecto">Nombre Proyecto</label>
    <input type="text" name="proyecto" id="proyecto" placeholder="Nombre del proyecto">
</div>