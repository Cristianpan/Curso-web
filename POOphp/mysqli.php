<?php
    include 'includes/header.php'; 


    /**
     * Consulta a base de datos con mysqli
     */
    $db = new mysqli('localhost', 'root', 'Gatosinbotas1', 'bienesRaices');
    $db->set_charset( "utf8"); 


    //creación de query
    $query = "SELECT titulo from propiedades"; 

    //preparamos el statement para que no puedan corromper la db
    $preparedStatement = $db->prepare($query);
    //executamos el query
    $preparedStatement->execute();
    //creamos la variable donde se almacenaran los resultados
    $preparedStatement->bind_result($titulo);
 
    //obtenemos los resultados y se imprimen
    while ($preparedStatement->fetch()) {
        var_dump($titulo); 
        echo "<br>";
    }


    include 'includes/footer.php'; 