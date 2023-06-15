<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__texto">Regístrate en DevWebCamp</p>

    <form class="form">
        <div class="form__field">
            <label for="nombre" class="form__label">Nombre</label>
            <input type="text" class="form__input" placeholder="Tu nombre" id="nombre" name="nombre">
        </div>
        <div class="form__field">
            <label for="apellido" class="form__label">Apellido</label>
            <input type="text" class="form__input" placeholder="Tu apellido" id="apellido" name="apellido">
        </div>
        <div class="form__field">
            <label for="email" class="form__label">Email</label>
            <input type="email" class="form__input" placeholder="Tu email" id="email" name="email">
        </div>
        <div class="form__field">
            <label for="password" class="form__label">Contraseña</label>
            <input type="password" class="form__input" placeholder="Tu contraseña" id="password" name="password">
        </div>
        <div class="form__field">
            <label for="password2" class="form__label">Repetir Contraseña</label>
            <input type="password" class="form__input" placeholder="Tu contraseña" id="password2" name="password2">
        </div>

        <a href="/olvide" class="action-link">¿Olvidaste tu contraseña?</a>

        <input type="submit" class="form__submit" value="Crear Cuenta">

    </form>
    
    <a href="/login" class="action-link">¿Ya tienes una cuenta? <span>Inicia Sesión<span></a>

</main>