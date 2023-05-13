<?php
require '../includes/app.php'; 
require '../includes/backend/propiedades.php';
require "../includes/utils/utileria.php"; 

isAuth(); 

use App\Propiedad;
$propiedades = [];
$propiedades = Propiedad::getAll();

incluirTemplate('header');

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $id = $_POST['id']; 
  $id = filter_var($id, FILTER_VALIDATE_INT);
   $propiedad = Propiedad::getById($id);
  if($propiedad->delete()) {
    eliminarArchivo($propiedad->getImagen());
    header('Location: index.php?resultado=3'); 
  }
}


?>

<main class="container section centered-content">
  <h1>Administrador de Bienes Raices</h1>
  <p class="modal exito"></p>
  <a href="crear.php" class="button-green">Nueva propiedad</a>

  <table class="propiedades">
    <thead class="head">
      <th>ID</th>
      <th>Titulo</th>
      <th>Imagen</th>
      <th>Precio</th>
      <th>Acciones</th>
    </thead>

    <tbody>
      <?php foreach ($propiedades as $propiedad) : ?>
        <tr>
          <td><?php echo $propiedad->getId(); ?></td>
          <td><?php echo $propiedad->getTitulo(); ?></td>
          <td><img class="imagen-tabla" src="<?php echo $propiedad->getImagen(); ?>" alt="imagen tabla"></td>
          <td>$ <?php echo $propiedad->getPrecio(); ?></td>
          <td>
            <form method="post">
              <input type="hidden" name="id" value="<?php echo $propiedad->getId();?>">
              <input type="submit" class="button-red-block" value="Eliminar">
            </form>
            <a href="actualizar.php?id=<?php echo $propiedad->getId();?>" class="button-green-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>

<?php
incluirTemplate('footer');
?>