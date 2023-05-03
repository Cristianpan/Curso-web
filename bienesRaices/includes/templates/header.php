<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href=" <?php echo $cssExterno ? '.' : '' ?>./build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
      <div class="container header-content">
        <div class="bar">
          <a href="<?php echo $cssExterno ? '../' : '' ?>index.php">
            <img src="<?php echo $cssExterno ? '.' : '' ?>./build/img/logo.svg" alt="Logotipo de bienes raices " />
          </a>

          <div class="mobile-menu">
            <img src="<?php echo $cssExterno ? '.' : '' ?>./build/img/barras.svg" alt="menú responsive" />
          </div>

          <div class="derecha">
            <img
              class="dark-mode-boton"
              src="<?php echo $cssExterno ? '.' : '' ?>./build/img/dark-mode.svg"
              alt="dark mode"
            />
            <nav class="nav">
              <a href="<?php echo $cssExterno ? '../' : '' ?>nosotros.php">Nosotros</a>
              <a href="<?php echo $cssExterno ? '../' : '' ?>anuncios.php">Anuncios</a>
              <a href="<?php echo $cssExterno ? '../' : '' ?>blog.php">Blog</a>
              <a href="<?php echo $cssExterno ? '../' : '' ?>contacto.php">Contacto</a>
            </nav>
          </div>
        </div>
        
        <?php if($inicio) { ?>
          <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
        <?php } ?>
      </div>
    </header>