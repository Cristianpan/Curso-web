<?php
  require 'includes/app.php'; 
  incluirTemplate('header');
?>
<main class="container section">
  <h1>Casas y Depas en Venta</h1>
  <?php require 'includes/templates/anuncios.php' ?>
</main>

<?php 
  incluirTemplate('footer'); 
?>