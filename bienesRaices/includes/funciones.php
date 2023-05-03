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