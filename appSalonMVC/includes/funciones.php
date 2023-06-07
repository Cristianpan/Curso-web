<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function sanitizarHtml($value) {
    return htmlspecialchars($value);
}

function esUltimo($actual, $proximo){
    return $actual !== $proximo; 
}

function validarORedireccionar($url) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: /" . $url);
    }

    return $id;
}