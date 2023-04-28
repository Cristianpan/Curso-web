<?php include 'includes/header.php';

$alumnos = ['Juan', 'Pedro', 'Roger', 'Abraham']; 
$cliente = [
    'nombre' => 'Cristian',
    'edad' => 22
]; 

//Emty, retorna true si el arreglo esta vacio, false en caso contrario
var_dump(empty($alumnos)); 
echo "<br/>"; 

// Isset - Verifica que un arreglo o una propiedad esten definidas
var_dump(isset($clientes)); 
echo "<br/>"; 
var_dump(isset($alumnos)); 
echo "<br/>"; 

//Verificar existencia de propiedad 
var_dump(isset($cliente['nombre'])); 
echo "<br/>"; 
var_dump(isset($cliente['direccion'])); 

include 'includes/footer.php';