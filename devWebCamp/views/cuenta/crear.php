<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__texto">Regístrate en DevWebCamp</p>

    <form method="post" action="/registro" class="form">
        <div class="form__field">
            <label for="nombre" class="form__label">Nombre</label>
            <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : ''; ?>
            <input type="text" class="form__input" placeholder="Tu nombre" id="nombre" name="nombre" value="<?= sanitizarHtml($usuario->getNombre())?>" />
        </div>
        <div class="form__field">
            <label for="apellido" class="form__label">Apellido</label>
            <?= isset($errors['apellido']) ? "<p class='error'>" . $errors['apellido'] . "</p>" : ''; ?>
            <input type="text" class="form__input" placeholder="Tu apellido" id="apellido" name="apellido" value="<?= sanitizarHtml($usuario->getApellido())?>" />
        </div>
        <div class="form__field">
            <label for="email" class="form__label">Email</label>
            <?= isset($errors['email']) ? "<p class='error'>" . $errors['email'] . "</p>" : ''; ?>
            <input type="email" class="form__input" placeholder="Tu email" id="email" name="email" value="<?= sanitizarHtml($usuario->getEmail())?>" />
        </div>
        <div class="form__field">
            <label for="password" class="form__label">Contraseña</label>
            <?= isset($errors['password']) ? "<p class='error'>" . $errors['password'] . "</p>" : ''; ?>
            <input type="password" class="form__input" placeholder="Tu contraseña" id="password" name="password" />
        </div>
        <div class="form__field">
            <label for="password2" class="form__label">Repetir Contraseña</label>
            <input type="password" class="form__input" placeholder="Tu contraseña" id="password2" name="password2" />
        </div>

        <a href="/olvide" class="action-link">¿Olvidaste tu contraseña?</a>

        <input type="submit" class="form__submit" value="Crear Cuenta">

    </form>
    
    <a href="/" class="action-link">¿Ya tienes una cuenta? <span>Inicia Sesión<span></a>

</main>