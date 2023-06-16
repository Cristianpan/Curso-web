<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__texto">Inicia Sesión en DevWebCamp</p>

    <form class="form" action="/login" method="post">
        <div class="form__field">
            <label for="email" class="form__label">Email</label>
            <?= isset($errors['email']) ? "<p class='error'>" . $errors['email'] . "</p>" : ''; ?>
            <input type="email" class="form__input" placeholder="Tu email" id="email" name="email">
        </div>
        <div class="form__field">
            <label for="password" class="form__label">Contraseña</label>
            <?= isset($errors['password']) ? "<p class='error'>" . $errors['password'] . "</p>" : ''; ?>
            <input type="password" class="form__input" placeholder="Tu contraseña" id="password" name="password">
        </div>
        <?= isset($errors['usuario']) ? "<p class='error'>" . $errors['usuario'] . "</p>" : ''; ?>
        
        <a href="/olvide" class="action-link">¿Olvidaste tu contraseña?</a>
        
        <input type="submit" class="form__submit" value="Iniciar Sesión">

    </form>
    
    <a href="/registro" class="action-link">¿Aún no tienes cuenta? <span>Regístrate<span></a>
</main>