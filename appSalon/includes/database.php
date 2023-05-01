<?php
//conexion a una base de datos
$db = mysqli_connect('localhost', 'root', 'Gatosinbotas1', 'appsalon');
//$db = mysqli_connect('localhost', 'root', '', 'appsaloncristian');   FOR ADMINS TESTS
mysqli_set_charset($db, "utf8");

if (!$db) {
    echo "Error en la conexión";
    exit; 
}