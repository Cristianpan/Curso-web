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

function aos_animacion() :string {
    $efectos = ['fade-up', 'fade-down', 'fade-left', 'fade-right', 'flip-left', 'flip-right', 'zoom-in', 'zoom-in-up', 'zoom-in-down'];

    $efecto = array_rand($efectos, 1);

    return " data-aos='$efectos[$efecto]' ";
}