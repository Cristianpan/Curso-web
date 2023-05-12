<?php 
function obtenerVendedores(): array {
    $db = DbConnection::getDbConnection();
    $vendedores = []; 
    
    $query = "SELECT * FROM vendedores"; 
    $resultado = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($resultado)) {
        $vendedores[] = $row; 
    }

    $db->close();

    return $vendedores;
}