<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>
    <p class="auth__texto">Coloca tu nueva contraseña</p>

    <?php  
        include_once __DIR__ . "/../templates/alerts.php"; 
        if (!empty($message) && $message['tipo'] === 'error'){
           return;  
        }  
    ?>

    <form method="post" class="form">
        <div class="form__field">
            <label for="password" class="form__label">Contraseña</label>
            <?= isset($errors['password']) ? "<p class='error'>" . $errors['password'] . "</p>" : ''; ?>
            <input type="password" class="form__input" placeholder="Tu nueva contraseña" id="password" name="password" />
        </div>
        <div class="form__field">
            <label for="password2" class="form__label">Repetir Contraseña</label>
            <input type="password" class="form__input" placeholder="Confirma tu contraseña" id="password2" name="password2" />
        </div>

        <a href="/login" class="action-link">¿Ya tienes una cuenta? <span>Inicia Sesión<span></a>
        
        <input type="submit" class="form__submit" value="Guardar Contraseña">
        
    </form>
    
    <a href="/olvide" class="action-link">¿Aún no tienes cuenta? Registrate</a>

</main>