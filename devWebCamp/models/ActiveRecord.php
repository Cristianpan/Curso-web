<?php
namespace Model;
use DbConnection;
use Dotenv\Parser\Value;

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

    public static function where($data, $column) {
        $db = DbConnection::getDbConnection();
        $dato = null; 
        $query = "SELECT * FROM " .  static::$table . " WHERE $column = ?";  
        $stmt = $db->prepare($query);

        $stmt->bind_param("s", $data);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if ($resultado->num_rows != 0){
            $dato = static::crearObjeto($resultado->fetch_assoc());
        }

        $stmt->close();
        $db->close();

        return $dato; 
    }

    public static function paginar($registrosPorPagina, $offset){
        $db = DbConnection::getDbConnection();
        $query = "SELECT * FROM " .  static::$table . " LIMIT ? OFFSET ?";
        $stmt = $db->prepare($query);
        
        $stmt->bind_param("ii", $registrosPorPagina, $offset);
    
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

    public static function getNumRegisters($column = "", $value = ""){
        $db = DbConnection::getDbConnection();
        $query = "SELECT COUNT(*) FROM " . static::$table;
        if ($column && $value) {
            $query .= " WHERE $column = ?";
        }

        $stmt = $db->prepare($query);
        
        if ($column && $value){
            $stmt->bind_param("i", $value);
        }

        $stmt->bind_result($total);

        $stmt->execute();

        $stmt->fetch(); 

        $stmt->close();
        $db->close();

        return $total;
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