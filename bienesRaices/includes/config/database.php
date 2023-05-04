<?php
    function getDbConnection(): mysqli {
        $db = mysqli_connect('localhost', 'root', 'Gatosinbotas1', 'bienesRaices');
        mysqli_set_charset($db, "utf8");
        if (!$db) {
            echo "Error en la conexión";
            exit;
        }

        return $db; 
    }
