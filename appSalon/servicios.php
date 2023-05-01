<?php
require 'includes/funciones.php';
$servicios = obtenerServicios();

header('Content-Type: application/json');
echo json_encode($servicios, JSON_UNESCAPED_UNICODE);