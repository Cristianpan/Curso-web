<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="nombre-pagina">Llene el siguiente formulario</p>

<form action="/crearCuenta" method="post" class="form">
    <div class="field">
        <label for="nombre">Nombre</label>
        <?php echo isset($alerts['nombre']) ? "<p class='error'>" . $alerts['nombre'] . "</p>" : ''; ?>
        <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="<?php echo sanitizarHtml($usuario->getNombre())?>"/>
    </div>
    <div class="field">
        <label for="apellido">Apellido</label>
        <?php echo isset($alerts['apellido']) ? "<p class='error'>" . $alerts['apellido'] . "</p>" : ''; ?>
        <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" value="<?php echo sanitizarHtml($usuario->getApellido())?>"/>
    </div>
    <div class="field">
        <label for="telefono">Telefono</label>
        <?php echo isset($alerts['telefono']) ? "<p class='error'>" . $alerts['telefono'] . "</p>" : ''; ?>
        <input type="tel" id="telefono" name="telefono" placeholder="Tu telefono" value="<?php echo sanitizarHtml($usuario->getTelefono())?>"/>
    </div>
    <div class="field">
        <label for="email">Correo</label>
        <?php echo isset($alerts['email']) ? "<p class='error'>" . $alerts['email'] . "</p>" : ''; ?>
        <input type="email" id="email" name="email" placeholder="Tu correo electrónico" value="<?php echo sanitizarHtml($usuario->getEmail())?>"/>
    </div>
    <div class="field">
        <label for="password">Contraseña</label>
        <?php echo isset($alerts['password']) ? "<p class='error'>" . $alerts['password'] . "</p>" : ''; ?>
        <input type="password" id="password" name="password" placeholder="Tu contraseña" value="<?php echo sanitizarHtml($usuario->getPassword())?>"/>
    </div>
    
    <div class="align-right">
        <input type="submit" value="Crear Cuenta" class="button">
    </div>
</form>

<div class="actions">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>