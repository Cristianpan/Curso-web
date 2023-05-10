<?php
require 'includes/app.php';
require 'includes/backend/propiedades.php';
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
  header('Location: index.php');
}
incluirTemplate('header');
$propiedad = obtenerPropiedadPorId($id);
if (empty($propiedad)) {
  header('Location: index.php');
}
?>

<main class="container section centered-content">
  <h1>Casa en venta frente al bosque</h1>
  <img loading="lazy" src="<?php echo str_replace("../", "", $propiedad['imagen']) ?>" alt="Imagen de casa en venta" />


  <div class="summary-property">
    <p class="price"><?php echo $propiedad['precio'] ?></p>
    <ul class="characteristics-icon">
      <li>
        <img src="/build/img/icono_wc.svg" alt="icono wc" />
        <p><?php echo $propiedad['wc'] ?></p>
      </li>
      <li>
        <img src="/build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p><?php echo $propiedad['estacionamiento'] ?></p>
      </li>
      <li>
        <img src="/build/img/icono_dormitorio.svg" alt="icono dormitorio" />
        <p><?php echo $propiedad['habitaciones'] ?></p>
      </li>
    </ul>

    <p><?php echo $propiedad['descripcion'] ?></p>
  </div>
</main>

<?php
incluirTemplate('footer');
?>