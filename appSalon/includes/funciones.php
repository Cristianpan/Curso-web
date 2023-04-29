<?php

function obtenerServicios(): array
{
    try {
        // Importar conexión
        require 'database.php';

        //Escribir el sql

        $sql = "SELECT * FROM servicios;";
        $consulta = mysqli_query($db, $sql);  //Realiza la consulta

        //Servicios 
        $servicios = [];

        // Obtener los resultados
        while ($row = mysqli_fetch_assoc($consulta)) {
            $servicios[] = $row; //formato alternativa a un array_push($array, $element); 
        }

        return $servicios;
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

