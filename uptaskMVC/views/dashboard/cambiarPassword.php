<?php include_once __DIR__ . "/header-dashboard.php" ?>


<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alert.php" ?>

    <a href="/perfil" class="link">Volver a Perfil</a>

    <form method="post" class="form">
        <div class="field">
            <label for="password_actual">Contraseña actual</label>
            <input type="password" id="password_actual" name="password_actual" placeholder="Tu contraseña actual">
        </div>

        <?= isset($errors['password']) ? "<p class='error'>" . $errors['password'] . "</p>" : ''; ?>
        <div class="field">
            <label for="password">Nueva contraseña</label>
            <input type="password" id="password" name="password" placeholder="Tu nueva contraseña">
        </div>
        <div class="field">
            <label for="password2">Confirmar contraseña</label>
            <input type="password" id="password2" name="password2" placeholder="Confirma tu contraseña">
        </div>

        <div class="aling-right">
            <input type="submit" value="Guardar Cambios">
        </div>
    </form>
</div>
<?php include_once __DIR__ . "/footer-dashboard.php" ?>