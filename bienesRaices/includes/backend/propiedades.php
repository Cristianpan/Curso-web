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
    $vendedor = mysqli_real_escape_string($db, $propiedad['vendedorId']);

    $query = "INSERT INTO propiedades (vendedorId, titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado) 
        VALUES ($vendedor, '$titulo', $precio, '$nombreImagen', '$descripcion', $habitaciones, $wc, $estacionamiento" . ",'" . $propiedad['creado'] . "')";


$resultado = mysqli_query($db, $query);

if ($resultado) {
        crearArchivoImagen($propiedad['imagen']['tmp_name'], $nombreImagen);
        $mensaje = "Insertado Correctamente";
    } else {
        $mensaje = "Ha habido un error";
    }
    mysqli_close($db);

    return $mensaje;
}

function obtenerPropiedades($limit = 0):array {
    $db = getDbConnection();
    $propiedades = []; 
    $query = "SELECT * FROM propiedades"; 
    if ($limit > 0) {
        $query = $query. " LIMIT $limit"; 
    }

    $resultado = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($resultado)) {
        $propiedades[] = $row; 
    }

    mysqli_close($db);
    
    return $propiedades; 
}

function obtenerPropiedadPorId(int $id): array {
    $db = getDbConnection(); 
    $propiedad = []; 
    $query = "SELECT * FROM propiedades WHERE id = $id"; 
    $resultado = mysqli_query($db, $query);
    if ($resultado->num_rows !== 0) {
        $propiedad = mysqli_fetch_assoc($resultado); 
    } 
    mysqli_close($db);
    
    return $propiedad; 
}

function actualizarPropiedad(array $propiedad, string $imagenAnterior):string {
    $carpetaImagen = "../imagenes/";
    $db = getDbConnection();
    $mensaje = '';
    $id = $propiedad['id']; 

    
    $titulo = mysqli_real_escape_string($db, $propiedad['titulo']);
    $precio = mysqli_real_escape_string($db, $propiedad['precio']);
    $descripcion = mysqli_real_escape_string($db, $propiedad['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $propiedad['habitaciones']);
    $wc = mysqli_real_escape_string($db, $propiedad['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $propiedad['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $propiedad['vendedorId']);
    if ($propiedad['imagen']['name']) {
        eliminarArchivo($imagenAnterior); 
        $nombreImagen = $carpetaImagen . generarIdentificadorArchivo(".jpg");
    } else {
        $nombreImagen = $imagenAnterior;  
    }
    
    $query = "UPDATE propiedades SET vendedorId = $vendedorId, titulo = '$titulo', precio = $precio, imagen = '$nombreImagen', descripcion = '$descripcion', habitaciones = $habitaciones, 
    wc = $wc, estacionamiento = $estacionamiento WHERE id = $id";

    $resultado = mysqli_query($db, $query);

    if ($resultado) {
        if ($propiedad['imagen']['name']) {
            crearArchivoImagen($propiedad['imagen']['tmp_name'], $nombreImagen);
            $mensaje = "Actualizado correctamente";
        } else {
            $mensaje = "Ha habido un error"; 
        }
    }
        
    mysqli_close($db);

    return $mensaje; 
}

function eliminarPropiedad(int $id): bool {
    $db = getDbConnection(); 
    $imagen = getImagen($id); 
    $query = "DELETE FROM propiedades WHERE id = $id"; 

    
    $resultado = mysqli_query($db, $query); 
    
    if (!$resultado) {
        return false; 
    }

    mysqli_close($db);
    eliminarArchivo($imagen);  
    return true;
}

function getImagen(int $id): string {
    $db = getDbConnection(); 
    $query = "SELECT imagen FROM propiedades WHERE id = $id"; 

    $resultado = mysqli_query($db, $query); 
    $nombreImagen = mysqli_fetch_column($resultado); 

    mysqli_close($db); 
    return $nombreImagen; 
}
