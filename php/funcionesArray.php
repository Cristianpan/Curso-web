<?php include 'includes/header.php';
// in_array - buscar elementos en un arreglo
$carrito = ['Tablet', 'Computadora', 'Telefono']; 
var_dump(in_array('Tablet', $carrito)); 
var_dump(in_array('XBOX', $carrito)); 

// Contar elementos existentes de un arreglo
count($carrito); 
sizeof($carrito); 

//Ordenar elementos de un array 
$numeros = [1, 45, 4, 8,9]; 
sort($numeros);  // de menor a mayor
rsort($numeros); // de mayor a menor

echo "<pre>"; 
var_dump($numeros); 
echo "</pre>"; 

//Ordenar arreglo asociativo 
$cliente = [
    'nombre' => 'Cristian', 
    'apellido' => 'Pan',  
    'saldo' => 200,
    'edad' => 22
]; 

asort($cliente); //Ordena de menor a mayor por valores
echo "<pre>"; 
var_dump($cliente); 
echo "</pre>"; 

arsort($cliente); //Ordena de menor a mayor por valores
echo "<pre>"; 
var_dump($cliente); 
echo "</pre>";

ksort($cliente); //Ordeba de menor a mayor por keys
echo "<pre>"; 
var_dump($cliente); 
echo "</pre>";

krsort($cliente); //Ordeba de menor a mayor por keys
echo "<pre>"; 
var_dump($cliente); 
echo "</pre>";



include 'includes/footer.php';