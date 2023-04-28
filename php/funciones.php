<?php 
//aplica tipado estricto
declare(strict_types=1); 
include 'includes/header.php';



function sumar (int $a = 0, int $b = 0): int {
    return $a + $b; 
}
function restar (int $a = 0, int $b = 0): int {
    return $b - $a; 
}

echo sumar(2, 3) . "<br/>";
echo sumar(2, 3) . "<br/>";

//parametros nombrados
echo restar(2, 3) . "<br/>";
echo restar(b: 2, a:3) . "<br/>";

function estaAutenticado(bool $value) : ? string {
    if ($value) {
        return "El usuario está autenticado"; 
    } 

    return null; 
}

echo estaAutenticado(true) . "<br/>"; 


include 'includes/footer.php';