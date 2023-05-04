<?php 
function crearPropiedad(array $propiedad): string {
    $db = getDbConnection();
    $mensaje = '';

    $titulo = mysqli_real_escape_string($db, $propiedad['titulo']);
    $precio = mysqli_real_escape_string($db, $propiedad['precio']);
    $descripcion = mysqli_real_escape_string($db, $propiedad['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $propiedad['habitaciones']);
    $wc = mysqli_real_escape_string($db, $propiedad['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $propiedad['estacionamiento']);
    $vendedor = mysqli_real_escape_string($db, $propiedad['vendedor']);
    
    $query = "INSERT INTO propiedades (vendedorId, titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado) 
        VALUES ('$vendedor', '$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento'" . ",'". $propiedad['creado']. "')";


    $resultado = mysqli_query($db, $query);

     if ($resultado) {
        $mensaje = "Insertado Correctamente";
    } else {
        $mensaje = "Ha habido un error";
    }
    mysqli_close($db); 

    return $mensaje;
}