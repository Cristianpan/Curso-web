<?php
class DbConnection{

    static function getDbConnection(){
        $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD'], $_ENV['DB_NAME']);
        $db->set_charset("utf8");
        
        return $db;
    }
}
