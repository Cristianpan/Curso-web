<?php include 'includes/header.php';
// For each 
$clientes = ["Juan", "Pedro", "Rodrigo", "Maria", "Marta"];

foreach ($clientes as $cliente) {
    echo "Cliente: {$cliente} <br/>";
}

// Uso en arreglos asociativos 
$alumno = [
    "matricula" => "18003566",
    "nombre" => "Andrés",
    "apellidos" => "Martinez Alvarado"
];

echo "<br/>";

foreach ($alumno as $key => $value) {
    echo $key . " - " . $value . "<br/>";
}


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

foreach($alumnos as $alumno) { ?>
    <li>
        <p>Alumno: <?php  echo $alumno['nombre'] . ", " . $alumno['apellidos']; ?></p>
        <p>Edad: <?php echo $alumno['edad'] . " años"; ?> </p>
        <p>Matricula: <?php echo $alumno['matricula'] . " años"; ?> </p>
    </li>
    <?php
}


include 'includes/footer.php';
