<?php

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function sanitizarHtml($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

function validarTokenORedireccionar($url) {
    $token = sanitizarHtml($_GET['token']);

    if (!$token) {
        header("Location: " . $url);
    }

    return $token;
}