<?php
class DbConnection{

    static function getDbConnection(){
        $db = new mysqli('localhost', 'root', 'Gatosinbotas1', 'appsalon');
        $db->set_charset("utf8");
        
        return $db;
    }
}
