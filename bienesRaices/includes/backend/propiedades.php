<?php
function crearPropiedad(array $propiedad): string {
    $carpetaImagen = "../imagenes/";
    $db = getDbConnection();
    $mensaje = '';
    crearCarpeta($carpetaImagen);
    $nombreImagen = $carpetaImagen . generarIdentificadorArchivo(".jpg");
    
    
    $titulo = mysqli_real_escape_string($db, $propiedad['titulo']);
    $precio = mysqli_real_escape_string($db, $propiedad['precio']);
    $descripcion = mysqli_real_escape_string($db, $propiedad['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $propiedad['habitaciones']);
    $wc = mysqli_real_escape_string($db, $propiedad['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $propiedad['estacionamiento']);
    $vendedor = mysqli_real_escape_string($db, $propiedad['vendedor']);

    $query = "INSERT INTO propiedades (vendedorId, titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado) 
        VALUES ('$vendedor', '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento'" . ",'" . $propiedad['creado'] . "')";


    $resultado = mysqli_query($db, $query);

    if ($resultado) {
        move_uploaded_file($propiedad['imagen']['tmp_name'], $nombreImagen);
        $mensaje = "Insertado Correctamente";
    } else {
        $mensaje = "Ha habido un error";
    }
    mysqli_close($db);

    return $mensaje;
}

function obtenerPropiedades() {
    $db = getDbConnection();
    $propiedes = []; 
    $query = "SELECT * FROM propiedades"; 

    $resultado = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($resultado)) {
        $propiedades[] = $row; 
    }
    
    return $propiedades; 
}
