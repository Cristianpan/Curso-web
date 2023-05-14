<?php
require 'includes/app.php'; 
use App\Propiedad;
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
  header('Location: index.php');
}
incluirTemplate('header');
$propiedad = Propiedad::getById($id);
if (is_null($propiedad)) {
  header('Location: index.php');
}
?>

<main class="container section centered-content">
  <h1><?php echo $propiedad->getTitulo()?></h1>
  <img loading="lazy" src="<?php echo str_replace("../", "", $propiedad->getImagen()) ?>" alt="Imagen de casa en venta" />


  <div class="summary-property">
    <p class="price"><?php echo $propiedad->getPrecio() ?></p>
    <ul class="characteristics-icon">
      <li>
        <img src="/build/img/icono_wc.svg" alt="icono wc" />
        <p><?php echo $propiedad->getWc()?></p>
      </li>
      <li>
        <img src="/build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
        <p><?php echo $propiedad->getEstacionamiento();?></p>
      </li>
      <li>
        <img src="/build/img/icono_dormitorio.svg" alt="icono dormitorio" />
        <p><?php echo $propiedad->getHabitaciones();?></p>
      </li>
    </ul>

    <p><?php echo $propiedad->getDescripcion()?></p>
  </div>
</main>

<?php
incluirTemplate('footer');
?>