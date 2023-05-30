<?php
  if(!isset($_SESSION)) {
    session_start(); 
  }

  $auth = $_SESSION['auth'] ?? false; 

  if(!isset($inicio)){
    $inicio = false; 
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bienes Raíces</title>
    <link rel="stylesheet" href="/build/css/app.css" />
</head>

<body>
    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="container header-content">
            <div class="bar">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="Logotipo de bienes raices " />
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="menú responsive" />
                </div>

                <div class="derecha">
                    <img class="dark-mode-boton" src="/build/img/dark-mode.svg" alt="dark mode" />
                    <nav class="nav">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Anuncios</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth) : ?>
                            <a href="/logout">Cerrar Sesion</a>
                        <?php endif ?>
                    </nav>
                </div>
            </div>

            <?php if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php } ?>
        </div>
    </header>


    <?php echo $contenido ?>

    <footer class="footer section">
        <div class="container footer-content">
            <nav class="nav">
                <a href="/nosotros">Nosotros</a>
                <a href="/propiedades">Anuncios</a>
                <a href="/blog">Blog</a>
                <a href="/contacto">Contacto</a>
            </nav>
        </div>


        <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
    </footer>
    <script src="/build/js/bundle.min.js"></script>
</body>

</html>