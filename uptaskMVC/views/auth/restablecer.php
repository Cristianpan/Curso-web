<div class="contenedor restablecer">
    <?php include_once __DIR__ . "/../templates/nombreSitio.php" ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Coloca tu nuevo password</p>
        <?php include_once __DIR__ . "/../templates/alert.php" ?>

        <?php if (!empty($message) && $message['tipo']=== 'error') return; ?>

        <form class="form" method="post">
            <?= isset($errors['password']) ? "<p class='error'>" . $errors['password'] . "</p>" : ''; ?>
            <div class="field">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Tu contraseña" name="password">
            </div>
            <div class="field">
                <label for="password2">Repetir Contraseña</label>
                <input type="password" id="password2" placeholder="Confirma tu contraseña" name="password2">
            </div>
            <div class="aling-right">
                <input type="submit" class="button" value="Guardar contraseña">
            </div>
        </form>
        <div class="actions">
            <a href="/crear">Iniciar Sesión</a>
        </div>

    </div> <!--.contenedor-sm-->
</div>