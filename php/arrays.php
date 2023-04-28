<?php include 'includes/header.php';

//Arreglo indexado

$alumnos = ['Cristian Pan', 'Diana Vazquez', 'Jonathan Quevedo'];
/**
 * <pre></pre>
 * muestra su contenido con el formato establecido por el código fuente
 */
echo "<pre>";
var_dump($alumnos);
echo "</pre>";


// Acceder a un elemento de un arreglo
echo $alumnos[1];

//Añadir elemento nuevo, al final 
array_push($alumnos, 'Mauricio Carrillo');

//Añadir al inicio 
array_unshift($alumnos, 'Pablo Medina');

//imprimir arreglo
echo "<pre>";
var_dump($alumnos);
echo "</pre>";

// Arreglos asociativos 

$cliente = [
    'nombre' => 'Juan',
    'saldo' => 200,
    'informacion' => [
        'tipo' => 'premium',
        'telefono' => '9993981242'
    ]
];
echo "<pre>";
var_dump($cliente['informacion']['tipo']);
echo "</pre>";



include 'includes/footer.php';
