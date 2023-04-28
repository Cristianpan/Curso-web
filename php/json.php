<?php include 'includes/header.php';
$alumnos = [ 
    [
        'nombre' => 'Cristian', 
        'apellidos' => 'Pan Zaldivar', 
        'edad' => 22, 
        'matricula' => '16003523' 
    ], 
    [
        'nombre' => 'Juan', 
        'apellidos' => 'Perez Cruz', 
        'edad' => 20, 
        'matricula' => '16003423' 
    ], 
    [
        'nombre' => 'Diana', 
        'apellidos' => 'Vazquez Rodriguez', 
        'edad' => 19, 
        'matricula' => '16003223' 
    ], 
    [
        'nombre' => 'Jhonatan', 
        'apellidos' => 'Quevedo Zaldivar', 
        'edad' => 22, 
        'matricula' => '16003525' 
    ], 
];

echo "<pre>"; 
var_dump($alumnos); 


//Concierte un arreglo a formato
$json = json_encode($alumnos, JSON_UNESCAPED_UNICODE); 
var_dump($json); 
echo "</pre>"; 

// convierte un json a un arreglo
$json_array = json_decode($json); 

include 'includes/footer.php';