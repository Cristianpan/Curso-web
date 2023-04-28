<?php include 'includes/header.php';
$autenticado = true;
$correo = "correo@correo.com";
$contraseña = "12345";
$admin = true;

//Condicional if, else if and else
if ($correo === "correo@correo.com" && $contraseña === "12345") {
    echo "Usuario autenticado <br/>";

    if ($admin) {
        echo "Menú Administrador <br/>"; 
    } else {
        echo "Menú Operador <br/>"; 
    }

} else if ($correo === "correo@corre0.com") {
    echo "El correo es incorrecto. Verifique e intente nuevamente.  <br/>";
} else if ($contraseña === "12345") {
    echo "La contraseña es incorrecta. Verifique e intente nuevamente. <br/>"; 
}

//Switch

$numMes = 4; 

switch ($numMes) {
    case 2: 
        echo  "El mes tiene 28 días <br/>"; 
        break; 
    case 1: case 3: case 5: case 7: case 8: case 10: case 12: 
        echo "El mes tiene 31 días <br/>"; 
        breaK; 
    default: 
        echo "El mes tiene 30 días <br/>"; 
}

//While 
$i = 0; 
while ($i < 3) {
    echo $i++ . ","; 
}
echo "<br/>"; 


//Do While  
do {
    echo --$i . ",";
} while($i > 0); 
echo "<br/>"; 

// For Loop
for ($i = 0; $i < 10; $i++){
    echo "{$i} - "; 
    
    if ($i % 3 === 0) {
        echo "Fizz "; 
    } 

    if ($i % 5 === 0) {
        echo "Buzz"; 
    } 

    echo "<br/>"; 
}

include 'includes/footer.php';
