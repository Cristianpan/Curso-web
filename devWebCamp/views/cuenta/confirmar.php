<main class="auth">
    <h2 class="auth__heading"><?= $titulo ?></h2>

    <?php include_once __DIR__ .'/../templates/alerts.php'?>

    <?php 
        if (empty($message) || $message['tipo'] === 'exito'){
            echo '<a href="/login" class="action-link"><span>Inicia Sesión<span></a>';
        }
    ?>
</main>