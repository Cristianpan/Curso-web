<?php 
require 'app.php'; 

function incluirTemplate(String $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/$nombre.php"; 
}