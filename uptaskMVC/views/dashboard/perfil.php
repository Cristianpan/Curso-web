<?php include_once __DIR__ . "/header-dashboard.php" ?>


<div class="contenedor-sm">
    <?php include_once __DIR__ . "/../templates/alert.php" ?>

    <a href="/cambiarPassword" class="link">Cambiar Contraseña</a>

    <form method="post" class="form">
        <?= isset($errors['nombre']) ? "<p class='error'>" . $errors['nombre'] . "</p>" : ''; ?>
        <div class="field">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" value="<?= $usuario->getNombre() ?>" name="nombre" placeholder="Tu nombre">
        </div>

        <?= isset($errors['email']) ? "<p class='error'>" . $errors['email'] . "</p>" : ''; ?>
        <div class="field">
            <label for="email">Email</label>
            <input type="text" id="email" value="<?= $usuario->getEmail() ?>" name="email" placeholder="Tu correo">
        </div>

        <div class="aling-right">
            <input type="submit" value="Guardar Cambios">
        </div>
    </form>
</div>
<?php include_once __DIR__ . "/footer-dashboard.php" ?>