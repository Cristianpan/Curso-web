<?php 

    include 'includes/header.php'; 
    /**
     * Opción de configuración para que el PDO tenga el encoding de utf8mb4; 
     */
    $options = [ 
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ];
    ///Conectar a una db con PDO
    $db = new PDO('mysql:host=localhost; dbname=bienesRaices', 'root', 'Gatosinbotas1', $options); 

    $query = "SELECT titulo from propiedades"; 

    $stmt = $db->prepare($query); 

    $stmt->execute(); 

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC); 

   foreach($resultado as $propiedad) {
    echo $propiedad['titulo'] . "<br>";
   } 

    include 'includes/footer.php'; 