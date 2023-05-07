<?php 
require 'app.php'; 

function incluirTemplate(String $nombre, bool $inicio = false, $cssExterno = false) {
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


    if ($auth !== null && $auth === true) {
        return true; 
    }

    return false; 

} 