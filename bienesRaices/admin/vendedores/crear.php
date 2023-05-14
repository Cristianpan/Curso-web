<?php
require '../../includes/app.php';
require '../../includes/validators/ValidadorVendedor.php';
require '../../includes/utils/utileria.php';
use App\Vendedor;
isAuth();

incluirTemplate('header');

$vendedor = new Vendedor;  

//Arreglo con mensajes de errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendedor = new Vendedor($_POST);
    $errores = validarDatos($vendedor);    

    if (empty($errores)) {
        
        if ($vendedor->save()) {
            header('Location: ../index.php?resultado=1');
        }
    } 
}
?>

<main class="container section centered-content">
    <h1>Registrar Vendedor</h1>
    <a href="../index.php" class="button-green">Volver</a>

    <form class="form" method="post" action="crear.php">
        <?php include '../../includes/templates/formularioVendedor.php'?>
        <div class="submit">
            <input type="submit" class="button-green" value="Enviar" />
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>