<?php
require '../../includes/app.php';
require '../../includes/validators/ValidadorVendedor.php';
use App\Vendedor;
isAuth();

incluirTemplate('header');

$id = $_GET['id']; 
$id = filter_var($id, FILTER_VALIDATE_INT); 

if(!$id) {
    header("Location: ../index.php"); 
}

$vendedor = Vendedor::getById($id);

//Arreglo con mensajes de errores
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vendedor = new Vendedor($_POST);
    $vendedor->setId($id);
    $errores = validarDatos($vendedor);    

    printObjetc($vendedor);

    if (empty($errores)) {
        $vendedor->update();
        header('Location: ../index.php?resultado=2');
    } 
}
?>

<main class="container section centered-content">
    <h1>Actualizar Vendedor</h1>
    <a href="../index.php" class="button-green">Volver</a>

    <form class="form" method="post">
        <?php include '../../includes/templates/formularioVendedor.php'?>
        <div class="submit">
            <input type="submit" class="button-green" value="Enviar" />
        </div>
    </form>
</main>

<?php
incluirTemplate('footer');
?>