<?php

namespace App;
use App\ActiveRecord;
use DbConnection;


class Vendedor extends ActiveRecord {
    protected static $table = 'vendedores';
    protected $id;
    private $nombre; 
    private $apellido; 
    private $telefono;

    public function __construct($dato){
        $this->id = $dato['id'] ?? '';
        $this->nombre = $dato['nombre'] ?? '';
        $this->apellido = $dato['apellido'] ?? '';
        $this->telefono = $dato['telefono'] ?? '';
    }

    public function save() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        //creacion de query
        $query = "INSERT INTO vendedores (nombre, apellido, telefono) 
        VALUES (?,?,?)";
        //creando el prepared statement
        $stmt = $db->prepare($query);  
        //dandole valores al prepared statement
        $stmt->bind_param("sss", $this->nombre, $this->apellido, $this->telefono);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag; 
    }

    public function update() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "UPDATE vendedores SET nombre = ?, apellido = ?, telefono = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssi", $this->nombre, $this->apellido, $this->telefono, $this->id);
        
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
        
    }

    public static function crearObjeto($dato){
        return new Vendedor($dato);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre(){
        return $this->nombre; 
    }

    public function setNombre($nombre){
       $this->nombre = $nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }
}