<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__texto">Recupera tu acceso a DevWebCamp</p>

    <?php include_once __DIR__ . '/../templates/alerts.php' ?>

    <form class="form" action="/olvide" method="post">
        <div class="form__field">
            <label for="email" class="form__label">Email</label>
            <input type="email" class="form__input" placeholder="Tu email" id="email" name="email">
        </div>

        <a href="/login" class="action-link">¿Ya tienes una cuenta? <span>Inicia Sesión<span></a>
        
        <input type="submit" class="form__submit" value="Enviar">
        
    </form>
    
    <a href="/login" class="action-link">¿Aún no tienes una cuenta? <span>Registrate<span></a>

</main>