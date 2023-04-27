<?php include 'includes/header.php';

// Boolean 
$logueado = true; 

if ($logueado) {
    echo "Has iniciado sesión <br>"; 
} else {
    echo "Credenciales incorrectas <br>"; 
}

//Enteros
$numero = 200;
var_dump($numero);
echo "<br>";  

//Flotantes 
$float = 200.5; 
var_dump($float); 
echo "<br>";  

//String
$nombre = "Cristian"; 
var_dump($nombre); 
echo "<br>";  

//Array 
$array = []; 
var_dump($array); 
echo "<br>";  



include 'includes/footer.php';