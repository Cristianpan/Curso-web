<?php
require 'includes/config/database.php';
require 'includes/backend/propiedades.php';
  $propiedades = obtenerPropiedades($limit);
?>

<div class="ads-content">

  <?php foreach ($propiedades as $propiedad) : ?>
    <div class="ad">

      <img loading="lazy" src="<?php echo str_replace("../", "", $propiedad['imagen']) ?>" alt="anuncio" />

      <div class="ad-content">
        <h3><?php echo $propiedad['titulo'] ?></h3>
        <p><?php echo $propiedad['descripcion'] ?></p>
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
            <p><?php echo $propiedad['habitaciones']?></p>
          </li>
        </ul>

        <a href="anuncio.php?id=<?php echo $propiedad['id']?>" class="button-yellow-block">Ver Propiedad</a>
      </div>
      <!-- .ad-content -->
    </div>
    <!-- .ad-->
  <?php endforeach; ?>
</div>
<!--.ads-content -->