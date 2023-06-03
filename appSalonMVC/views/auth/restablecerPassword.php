<h1 class="nombre-pagina">Restablece tu constraseña</h1>
<p class="descripcion-pagina">Coloca tu nueva contraseña</p>

<?php include __DIR__ . "/../components/message.php"?>


<?php if (!empty($message) && $message['tipo'] === "error") return; ?>

<form class="form" method="POST">
    <div class="field">
        <label for="password">Contraseña</label>
        <?php echo isset($alerts['password']) ? "<p class='error'>" . $alerts['password'] . "</p>" : ''; ?>
        <input type="password" id="password" name="password" placeholder="Tu nueva contraseña">
    </div>

    <div class="align-right">
        <input class="button" type="submit" value="Guardar Nueva Contraseña">
    </div>
</form>

<div class="actions">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crearCuenta">¿Aún no tienes una cuenta? Regístrate</a>
</div>