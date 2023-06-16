<?php

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