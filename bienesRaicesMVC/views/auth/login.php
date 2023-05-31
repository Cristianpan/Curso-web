<main class="container secction centered-content">
    <h1>Iniciar Sesión</h1>
    <form class="form" method="post" action="/login">
        <fieldset>
            <legend>Ingrese sus credenciales de acceso</legend>

            <label for="email">E-mail</label>
            <?php echo isset($errores['email']) ? "<p class='error'>" . $errores['email'] . "</p>" : ''; ?>
            <input type="email" id="email" placeholder="Tu email" name="email" required/>

            <label for="password">Password</label>
            <?php echo isset($errores['password']) ? "<p class='error'>" . $errores['password'] . "</p>" : ''; ?>
            <input type="password" id="password" placeholder="Tu contraseña" name="password" required/>
            <?php echo isset($errores['usuario']) ? "<p class='error'>" . $errores['usuario'] . "</p>" : ''; ?>
        </fieldset>

        <div class="submit">
            <input type="submit" class="button-green" value="Iniciar Sesión"/>
        </div>
    </form>
</main>
