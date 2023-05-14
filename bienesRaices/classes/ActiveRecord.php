<?php 
namespace App; 
use DbConnection;

abstract class ActiveRecord {

    protected $id;
    protected static $table = '';

    public static function getAll() {
        $db = DbConnection::getDbConnection();
        $query = "SELECT * FROM " . static::$table; 

        $stmt = $db->prepare($query);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $array = [];
        while ($dato = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($dato); 
        }


        $stmt->close();
        $db->close();
        return $array;
    }

    public static function getById($id) {
        $dato = null;
        $db = DbConnection::getDbConnection();
        $query = "SELECT * FROM " . static::$table . " WHERE id = (?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        
        $resultado = $stmt->get_result();

        if ($resultado->num_rows != 0) {
            $dato = static::crearObjeto($resultado->fetch_assoc());
        }

        $stmt->close();
        $db->close();
        return $dato; 
    }
    
    public static function getLimit($limit) {
        $db = DbConnection::getDbConnection();
        $query = "SELECT * FROM " . static::$table . " LIMIT ?"; 

        $stmt = $db->prepare($query);
        $stmt->bind_param("i", $limit);
        $stmt->execute();

        $resultado = $stmt->get_result();
        $array = [];
        while ($dato = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($dato); 
        }


        $stmt->close();
        $db->close();
        return $array;

    }

    public function delete() {
        $flag = false; 
        $db = DbConnection::getDbConnection();  
        $query = "DELETE FROM " . static::$table . " WHERE id = ?";
        $stmt = $db->prepare($query);
        
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true; 
        }
        
        $stmt->close();
        $db->close();

        return $flag;
    }

    abstract public static function crearObjeto($dato);

    abstract public function save();

    abstract public function update();
}