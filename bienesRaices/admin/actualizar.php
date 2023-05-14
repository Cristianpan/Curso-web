<?php

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;
require '../includes/app.php'; 
require '../includes/utils/utileria.php';
require '../includes/backend/propiedades.php';
require '../includes/backend/vendedores.php';
require '../includes/validators/validadorPropiedad.php';
isAuth();

incluirTemplate('header');


$id = $_GET['id']; 
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id) {
    header("Location: index.php"); 
}

$vendedores = obtenerVendedores(); 

$propiedad = Propiedad::getById($id);
$nombreImagen = $propiedad->getImagen();

if (is_null($propiedad)) {
    header('Location: index.php');
}
$errores = []; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $propiedad = new Propiedad($_POST);
    $propiedad->setId($id);
    $imagenPropiedad = $_FILES['imagen'];

    $errores = validarDatos($propiedad, $imagenPropiedad);    
    if ($imagenPropiedad['name']) {
        $propiedad->setImagen('../imagenes/' . generarIdentificadorArchivo(".jpg"));
    } else {
        $propiedad->setImagen($nombreImagen);
    }
    
    if (empty($errores)) {
        //insertar en la base de datos  
        if ($propiedad->update() && $imagenPropiedad['name']) {
            eliminarArchivo($nombreImagen);
            $imagen = Image::make($imagenPropiedad['tmp_name'])->fit(800,600);
            $imagen->save($propiedad->getImagen());
        }
        //redireccionar al usuario
        header('Location: index.php?resultado=2'); 
    }
}


?>

<main class="container section centered-content">
<h1>Actualizar Propiedad</h1>
    <a href="index.php" class="button-green">Volver</a>

    <form class="form" method="post" enctype="multipart/form-data">

        <?php include '../includes/templates/formulario.php' ?>

        <div class="submit">
            <input type="submit" class="button-green" value="Actualizar Propiedad" />
        </div>
    </form>
</main>

<?php
incluirTemplate('footer', false);
?>