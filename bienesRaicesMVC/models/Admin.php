<?php

namespace Model;
use DbConnection;

class Admin extends ActiveRecord {
    protected static $table = "usuarios";
    protected $id;
    private $email;
    private $password;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public static function getByEmail($email) {
        $dato = null;
        $db = DbConnection::getDbConnection();
        $query = "SELECT * FROM " . static::$table . " WHERE email = (?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $resultado = $stmt->get_result();

        if ($resultado->num_rows != 0) {
            $dato = static::crearObjeto($resultado->fetch_assoc());
        }

        $stmt->close();
        $db->close();
        return $dato; 
    }

    public function save(){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO usuarios (email, password) 
        VALUES (?,?)";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("ss", $this->email, $this->password);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }

    public function update(){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "UPDATE usuarios SET email = ?, password = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssi", $this->email, $this->password,$this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }


    public static function crearObjeto($dato){
        return new Admin($dato);
    }




    //getters and setters

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }
}
