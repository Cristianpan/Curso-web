<?php
require '../includes/funciones.php';
incluirTemplate('header', false, true);
$propiedades = obtenerPropiedades();
$i = 0;
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
          <td><?php echo $propiedad['id']; ?></td>
          <td><?php echo $propiedad['titulo']; ?></td>
          <td><img class="imagen-tabla" src="<?php echo $propiedad['imagen']; ?>" alt="imagen tabla"></td>
          <td>$ <?php echo $propiedad['precio']; ?></td>
          <td>
            <a href="" class="button-red-block">Eliminar</a>
            <a href="" class="button-green-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>

<?php
incluirTemplate('footer', false, true);
?>