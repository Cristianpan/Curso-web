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