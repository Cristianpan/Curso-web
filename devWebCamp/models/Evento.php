<?php

namespace Model;
use DbConnection;

class Evento extends ActiveRecord {

    protected static $table = 'eventos'; 
    protected $id; 
    private $nombre; 
    private $descripcion; 
    private $disponibles; 
    private $categoriaId; 
    private $diaId; 
    private $horaId; 
    private $ponenteId; 


    public function __construct($args = []){
        $this->id = $args['id'] ?? null; 
        $this->nombre = $args['nombre'] ?? ''; 
        $this->descripcion = $args['descripcion'] ?? ''; 
        $this->disponibles = $args['disponibles'] ?? ''; 
        $this->categoriaId =  $args['categoria'] ?? ''; 
        $this->diaId = $args['dia'] ?? ''; 
        $this->horaId =  $args['hora'] ?? ''; 
        $this->ponenteId = $args['ponente'] ?? ''; 
    }
    public function save() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO eventos (nombre, descripcion, disponibles, categoriaId, diaId, horaId, ponenteId) VALUES (?,?,?,?,?,?,?)";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("ssiiiii",$this->nombre, $this->descripcion, $this->disponibles, $this->categoriaId, $this->diaId, $this->horaId, $this->ponenteId);

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
        $query = "UPDATE eventos  SET nombre = ?, descripcion = ?, disponibles = ?, categoriaId = ?, diaId = ?, horaId = ?, ponenteId = ? WHERE id = ?";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("ssiiiiii",$this->nombre, $this->descripcion, $this->disponibles, $this->categoriaId, $this->diaId, $this->horaId, $this->ponenteId, $this->id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }

    public static function getByCategoriaYDia($categoriaId, $diaId){
        $db = DbConnection::getDbConnection();

        $query = "SELECT id, categoriaId, diaId, horaId FROM eventos WHERE categoriaId = ? AND diaId = ?";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("ii", $categoriaId, $diaId);

        $stmt->execute();
        $resultado = $stmt->get_result();

        $array = []; 

        while ($dato = $resultado->fetch_assoc()){
            $array[] = $dato; 
        }
        
        $stmt->close();
        $db->close();

        return $array; 
    }

    public static function crearObjeto($dato){
        return new Evento($dato);
    }

    public function setId($id){
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setDescripcion ($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDisponibles ($disponibles){
        $this->disponibles = $disponibles;
    }
    
    public function getDisponibles () {
        return $this->disponibles;
    }

    public function setCategoriaId ($categoriaId){
        $this->categoriaId = $categoriaId;
    }
    
    public function getCategoriaId() {
        return $this->categoriaId;
    }

    public function setHoraId ($horaId){
        $this->horaId = $horaId;
    }
    
    public function getHoraId() {
        return $this->horaId;
    }

    public function setDiaId($diaId){
        $this->diaId = $diaId;
    }
    
    public function getDiaId() {
        return $this->diaId;
    }

    public function setPonenteId($ponenteId){
        $this->ponenteId = $ponenteId;
    }
    
    public function getPonenteId() {
        return $this->ponenteId;
    }
}