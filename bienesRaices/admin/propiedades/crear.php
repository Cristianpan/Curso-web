<?php
require '../../includes/app.php';
require '../../includes/validators/ValidadorPropiedad.php';
require '../../includes/utils/utileria.php';

use App\Propiedad;
use App\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

isAuth();

incluirTemplate('header');

$carpetaImagen = '../imagenes/';
$propiedad = new Propiedad;
$vendedores = Vendedor::getAll();

//Arreglo con mensajes de errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propiedad = new Propiedad($_POST);
    $imagenPropiedad = $_FILES['imagen'];

    $errores = validarDatos($propiedad, $imagenPropiedad);
    $errores = array_merge($errores, validarImagen($imagenPropiedad));
    

    if (empty($errores)) {
        $propiedad->setImagen($carpetaImagen . generarIdentificadorArchivo(".jpg"));
        
        if ($propiedad->save()) {
            crearCarpeta("../".$carpetaImagen);
            $imagen = Image::make($imagenPropiedad['tmp_name'])->fit(800,600);
            $imagen->save("../" . $propiedad->getImagen());
            header('Location: ../index.php?resultado=1');
        }
    }
}
?>

<main class="container section centered-content">
    <h1>Crear</h1>
    <a href="../index.php" class="button-green">Volver</a>

    <form class="form" method="post" action="crear.php" enctype="multipart/form-data">
        <?php include '../../includes/templates/formularioPropiedad.php'?>
        <div class="submit">
            <input type="submit" class="button-green" value="Enviar" />
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>