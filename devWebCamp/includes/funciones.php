<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/public/img/');

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function sanitizarHtml($html) : string {
    return htmlspecialchars($html);
}

function validarTokenORedireccionar($name, $url) {
    $token = sanitizarHtml($_GET[$name] ?? '');

    if (!$token) {
        header("Location: " . $url);
    }

    return $token;
}

function paginaActual($path){
    return str_contains($_SERVER['PATH_INFO'] ?? '', $path) ? true : false; 
}