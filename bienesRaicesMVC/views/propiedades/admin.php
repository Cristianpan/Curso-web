<main class="container section centered-content">
  <h1>Administrador de Bienes Raices</h1>
  <p class="modal exito"></p>
  <h2>Propiedades</h2>
  <a href="/propiedades/crear" class="button-green">Nueva propiedad</a>
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
          <td><img class="imagen-tabla" src="<?php echo "/imagenes/" . $propiedad->getImagen(); ?>" alt="imagen tabla"></td>
          <td>$ <?php echo $propiedad->getPrecio(); ?></td>
          <td>
            <form method="post" action="/propiedades/eliminar">
              <input type="hidden" name="id" value="<?php echo $propiedad->getId(); ?>">
              <input type="hidden" name="tipo" value="propiedad">
              <input type="submit" class="button-red-block" value="Eliminar">
            </form>
            <a href="/propiedades/actualizar?id=<?php echo $propiedad->getId(); ?>" class="button-green-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <div class="submit">
  </div>

  <h2>Vendedores</h2>
  <a href="/vendedores/crear" class="button-green">Nuevo vendedor</a>
  <table class="propiedades">
    <thead class="head">
      <th>ID</th>
      <th>Nombre</th>
      <th>Telefono</th>
      <th>Acciones</th>
    </thead>

    <tbody>
      <?php foreach ($vendedores as $vendedor) : ?>
        <tr>
          <td><?php echo $vendedor->getId(); ?></td>
          <td><?php echo $vendedor->getNombre() . " " . $vendedor->getApellido(); ?></td>
          <td><?php echo $vendedor->getTelefono(); ?></td>
          <td>
            <form method="post" action="/vendedores/eliminar">
              <input type="hidden" name="id" value="<?php echo $vendedor->getId(); ?>">
              <input type="hidden" name="tipo" value="vendedor">
              <input type="submit" class="button-red-block" value="Eliminar">
            </form>
            <a href="/vendedores/actualizar?id=<?php echo $vendedor->getId(); ?>" class="button-green-block">Actualizar</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</main>