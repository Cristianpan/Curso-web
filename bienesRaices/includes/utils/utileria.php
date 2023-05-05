<?php
/**Crea una carpeta en caso de no existir en la ruta especificada */
function crearCarpeta(string $path) {
    if (!is_dir($path)) {
        mkdir($path); 
    }
}
/*Genera un identificador único para un archivo con la extension dada */
function generarIdentificadorArchivo(string $extension): string {
    $identificador = md5( uniqid(rand(), true)) . $extension;
    return  $identificador;  
}