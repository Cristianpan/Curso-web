<?php 
function obtenerVendedores(): array {
    $db = getDbConnection();
    $vendedores = []; 
    
    $query = "SELECT * FROM vendedores"; 
    $resultado = mysqli_query($db, $query);

    while ($row = mysqli_fetch_assoc($resultado)) {
        $vendedores[] = $row; 
    }
    
    mysqli_close($db); 

    return $vendedores;
}