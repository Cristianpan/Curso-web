<?php include 'includes/header.php';

$nombreCliente = "Cristian Pan "; 


//strlen() muestra la longitud de un string
echo strlen($nombreCliente); 
echo "<br/>"; 

//trim() elimina espacios en blanco al inicio y al final de una cadena
$texto = trim($nombreCliente); 
echo strlen($texto); 
echo "<br/>";

//Convertir String a mayusculas 
echo strtoupper($texto); 
echo "<br/>";

//Convertir String a minusculas 
echo strtolower($texto); 
echo "<br/>";

//Remplazar valor substring por otro

echo str_replace('Pan', 'Zaldivar', $nombreCliente); 
echo "<br/>";

// Revisar si existe un substring en un string
echo strpos($nombreCliente, 'Pan'); 
echo "<br/>";

$tipoDeCliente = "premium"; 

//Concatenacion de variables
echo "El cliente {$nombreCliente} es {$tipoDeCliente}"; 
echo "<br/>";
echo "El cliente " . $nombreCliente . " es " . $tipoDeCliente;




include 'includes/footer.php';