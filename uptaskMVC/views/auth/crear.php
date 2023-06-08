<div class="contenedor crear">
    <?php include_once __DIR__ . "/../templates/nombreSitio.php" ?>

    <div class="contenedor-sm">
        <p class="descripcion-pagina">Crea tu cuenta en UpTask</p>

        <form action="/crear" class="form" method="post">
            <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : ''; ?>
            <div class="field">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" placeholder="Tu Nombre" name="nombre" value="<?= $usuario->getNombre() ?>">
            </div>
            <?= isset($errors['email']) ? "<p class='error'>" . $errors['email'] . "</p>" : ''; ?>
            <div class="field">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Tu Email" name="email" value="<?= $usuario->getEmail() ?>">
            </div>
            <?= isset($errors['password']) ? "<p class='error'>" . $errors['password'] . "</p>" : ''; ?>
            <div class="field">
                <label for="password">Contraseña</label>
                <input type="password" id="password" placeholder="Tu Contraseña" name="password">
            </div>
            <div class="field">
                <label for="password2">Repetir Contraseña</label>
                <input type="password" id="password2" placeholder="Confirma tu contrasseña" name="password2">
            </div>
            <div class="aling-right">
                <input type="submit" class="button" value="Crear cuenta">
            </div>
        </form>

        <div class="actions">
            <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
            <a href="/olvide">¿Olvidaste tu contraseña?</a>
        </div>

    </div> <!--.contenedor-sm-->
</div>