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

