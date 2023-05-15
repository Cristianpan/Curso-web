<?php 

define('TEMPLATES_URL', __DIR__ . '/templates'); 
define('FUNCIONES_URL',__DIR__  . 'funciones.php');

function incluirTemplate(String $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/$nombre.php"; 
}

function printObjetc($object) {
    echo "<pre>"; 
    var_dump($object); 
    echo "</pre>"; 
}

function isAuth(): bool {
    session_start(); 
    $auth = $_SESSION['auth']; 

    if ($auth === null || $auth === false) {
        header("Location: /login.php"); 
    }

    return true; 
} 

function validarTipoContenido($tipo) {
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}