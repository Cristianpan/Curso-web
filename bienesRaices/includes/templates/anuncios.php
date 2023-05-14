<?php
  use App\Propiedad;

  if ($_SERVER['SCRIPT_NAME'] === '/anuncios.php'){
    $propiedades = Propiedad::getAll();
  } else {
    $propiedades = Propiedad::getLimit(3);
  }
?>

<div class="ads-content">

  <?php foreach ($propiedades as $propiedad) : ?>
    <div class="ad">

      <img loading="lazy" src="<?php echo str_replace("../", "", $propiedad->getImagen()) ?>" alt="anuncio" />

      <div class="ad-content">
        <h3><?php echo $propiedad->getTitulo() ?></h3>
        <p><?php echo $propiedad->getDescripcion() ?></p>
        <p class="price"><?php echo $propiedad->getPrecio() ?></p>
        <ul class="characteristics-icon">
          <li>
            <img src="/build/img/icono_wc.svg" alt="icono wc" />
            <p><?php echo $propiedad->getWc()?></p>
          </li>
          <li>
            <img src="/build/img/icono_estacionamiento.svg" alt="icono estacionamiento" />
            <p><?php echo $propiedad->getEstacionamiento()?></p>
          </li>
          <li>
            <img src="/build/img/icono_dormitorio.svg" alt="icono dormitorio" />
            <p><?php echo $propiedad->getHabitaciones()?></p>
          </li>
        </ul>

        <a href="anuncio.php?id=<?php echo $propiedad->getId()?>" class="button-yellow-block">Ver Propiedad</a>
      </div>
      <!-- .ad-content -->
    </div>
    <!-- .ad-->
  <?php endforeach; ?>
</div>
<!--.ads-content -->