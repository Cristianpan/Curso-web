<?php
class DbConnection{

    static function getDbConnection(){
        $db = new mysqli('localhost', 'root', 'Gatosinbotas1', 'bienesRaices');
        $db->set_charset("utf8");
        
        return $db;
    }
}
