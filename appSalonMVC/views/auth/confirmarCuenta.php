<h1 class="nombre-pagina">Confirmar Cuenta</h1>

<?php
    if (!empty($message)) {
        $content = "<div class='modal ".$message['tipo']."'>";
        $content .= "<p> " . $message['informacion']. "</p>"; 
        $content .= "</div>"; 
        echo $content;
    }
?> 

<div class="actions">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesión</a>
</div>