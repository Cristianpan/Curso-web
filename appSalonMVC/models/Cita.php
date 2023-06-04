<?php

namespace Model;
use DbConnection;

class Cita extends ActiveRecord {

    protected static $table = "citas";
    protected $id; 
    private $usuarioId; 
    private $fecha; 
    private $hora; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? ''; 
        $this->usuarioId = $args['usuarioId'] ?? ''; 
        $this->fecha = $args['fecha'] ?? ''; 
        $this->hora = $args['hora'] ?? '';
    }
    

    public function save (){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO citas (usuarioId, fecha, hora) 
        VALUES (?,?,?)";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("iss",$this->usuarioId, $this->fecha, $this->hora);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $this->id = $stmt->insert_id;
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }

    public function update(){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "UPDATE citas SET usuarioId = ?, fecha = ?, hora = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issi",$this->usuarioId, $this->fecha, $this->hora, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }

    public static function crearObjeto($dato){
        return new Cita($dato);
    }

    public function setId ($id){
        $this->id = $id;
    }
    
    public function getId () {
        return $this->id;
    }

    public function setUsuarioId ($usuarioId){
        $this->usuarioId = $usuarioId;
    }
    
    public function getUsuarioId () {
        return $this->usuarioId;
    }

    public function setFecha ($fecha){
        $this->fecha = $fecha;
    }
    
    public function getFecha () {
        return $this->fecha;
    }

    public function setHora ($hora){
        $this->hora = $hora;
    }
    
    public function getHora () {
        return $this->hora;
    }
}
