<?php
require '../includes/app.php';
require '../includes/backend/vendedores.php';
require '../includes/validators/validadorPropiedad.php';
require '../includes/utils/utileria.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

isAuth();

incluirTemplate('header');

$carpetaImagen = '../imagenes';
$propiedad = new Propiedad;
$vendedores = obtenerVendedores();

//Arreglo con mensajes de errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propiedad = new Propiedad($_POST);
    $imagenPropiedad = $_FILES['imagen'];

    $errores = validarDatos($propiedad, $imagenPropiedad);
    $errores = array_merge($errores, validarImagen($imagenPropiedad));
    

    if (empty($errores)) {
        if ($propiedad->guardar()) {
            crearCarpeta($carpetaImagen);

            $imagen = Image::make($imagenPropiedad['tmp_name'])->fit(800,600);
            $imagen->save($propiedad->getImagen());
            //crearArchivoImagen($imagenPropiedad['tmp_name'], $propiedad->getImagen());

            header('Location: index.php?resultado=1');
        }
    }
}
?>

<main class="container section centered-content">
    <h1>Crear</h1>
    <a href="index.php" class="button-green">Volver</a>

    <form class="form" method="post" action="crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo</label>
            <?php echo isset($errores['titulo']) ? "<p class='error'>" . $errores['titulo'] . "</p>" : ''; ?>
            <input type="text" id="titulo" name="titulo" placeholder="Propiedad" value="<?php echo $propiedad->getTitulo(); ?>">

            <label for="precio">Precio</label>
            <?php echo isset($errores['precio']) ? "<p class='error'>" . $errores['precio'] . "</p>" : ''; ?>
            <input type="number" id="precio" name="precio" placeholder="Precio propiedad" value="<?php echo $propiedad->getPrecio(); ?>">

            <label for="imagen">Imagen</label>
            <?php echo isset($errores['imagen']) ? "<p class='error'>" . $errores['imagen'] . "</p>" : ''; ?>
            <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png" name="imagen">

            <label for="descripcion">Descripción</label>
            <?php echo isset($errores['descripcion']) ? "<p class='error'>" . $errores['descripcion'] . "</p>" : ''; ?>
            <textarea id="descripcion" name="descripcion"><?php echo $propiedad->getDescripcion(); ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <?php echo isset($errores['habitaciones']) ? "<p class='error'>" . $errores['habitaciones'] . "</p>" : ''; ?>
            <input type="number" id="habitaciones" name="habitaciones" min="1" max="9" placeholder="3" value="<?php echo $propiedad->getHabitaciones(); ?>">

            <label for="wc">Baños:</label>
            <?php echo isset($errores['wc']) ? "<p class='error'>" . $errores['wc'] . "</p>" : ''; ?>
            <input type="number" id="wc" min="1" max="9" name="wc" placeholder="3" value="<?php echo $propiedad->getWc(); ?>">

            <label for="estacionamiento">Estacionamiento:</label>
            <?php echo isset($errores['estacionamiento']) ? "<p class='error'>" . $errores['estacionamiento'] . "</p>" : ''; ?>
            <input type="number" id="estacionamiento" name="estacionamiento" min="1" max="9" placeholder="3" value="<?php echo $propiedad->getEstacionamiento(); ?>">
        </fieldset>

        <fieldset>
            <legend for="vendedor">Vendedor</legend>
            <?php echo isset($errores['vendedor']) ? "<p class='error'>" . $errores['vendedor'] . "</p>" : ''; ?>
            <select id="vendedor" name="vendedorId">
                <option value=" " selected>Seleccionar</option>
                <?php
                foreach ($vendedores as $vendedor) {
                    echo "<option value ='" . $vendedor['id'] . "'" . ($propiedad->getVendedorId() === $vendedor['id'] ? 'selected' : '') . ">" . $vendedor['nombre'] . " " . $vendedor['apellido'];
                }
                ?>
            </select>
        </fieldset>

        <div class="submit">
            <input type="submit" class="button-green" value="Enviar" />
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>