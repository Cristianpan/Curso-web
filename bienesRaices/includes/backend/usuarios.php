<?php 
function obtenerUsuarioPorEmail (string $email): array{
    $db = getDbConnection();
    $email = mysqli_real_escape_string($db, $email); 
    $usuario = []; 

    $query = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($db, $query); 

    if ($resultado->num_rows !== 0) {
        $usuario = mysqli_fetch_assoc($resultado); 
    }

    return $usuario;
}
