<?php
function obtenerPropiedades($limit = 0):array {
    $db = DbConnection::getDbConnection();
    $propiedades = []; 
    $query = "SELECT * FROM propiedades"; 
    if ($limit > 0) {
        $query = $query. " LIMIT $limit"; 
    }

    $resultado = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($resultado)) {
        $propiedades[] = $row; 
    }

    $db->close();
    
    return $propiedades; 
}

function obtenerPropiedadPorId(int $id): array {
    $db = DbConnection::getDbConnection(); 
    $propiedad = []; 
    $query = "SELECT * FROM propiedades WHERE id = $id"; 
    $resultado = mysqli_query($db, $query);
    if ($resultado->num_rows !== 0) {
        $propiedad = mysqli_fetch_assoc($resultado); 
    } 
    $db->close();
    
    return $propiedad; 
}

function actualizarPropiedad(array $propiedad, string $imagenAnterior):string {
    $carpetaImagen = "../imagenes/";
    $db = DbConnection::getDbConnection();
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
        
    $db->close();

    return $mensaje; 
}

function eliminarPropiedad(int $id): bool {
    $db = DbConnection::getDbConnection(); 
    $imagen = getImagen($id); 
    $query = "DELETE FROM propiedades WHERE id = $id"; 

    
    $resultado = mysqli_query($db, $query); 
    
    if (!$resultado) {
        return false; 
    }

    $db->close();
    eliminarArchivo($imagen);  
    return true;
}

function getImagen(int $id): string {
    $db = DbConnection::getDbConnection(); 
    $query = "SELECT imagen FROM propiedades WHERE id = $id"; 

    $resultado = mysqli_query($db, $query); 
    $nombreImagen = mysqli_fetch_column($resultado); 

    $db->close(); 
    return $nombreImagen; 
}
