<?php
//conexion a una base de datos
$db = mysqli_connect('localhost', 'root', 'Gatosinbotas1', 'appsalon');

if (!$db) {
    echo "Error en la conexión";
    exit; 
}