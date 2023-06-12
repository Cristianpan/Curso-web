<?php 
namespace Model; 
use DbConnection;
use JsonSerializable;

class Tarea extends ActiveRecord implements JsonSerializable {
    protected static $table = "tareas"; 
    protected $id; 
    private $proyectoId; 
    private $nombre; 
    private $descripcion; 
    private $estado; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? null; 
        $this->proyectoId = $args['proyectoId'] ?? null; 
        $this->nombre = $args['nombre'] ?? ''; 
        $this->descripcion = $args['descripcion'] ? $args['descripcion'] : 'Ninguna'; 
        $this->estado = $args['estado'] ?? 0; 
    }

    public function jsonSerialize(): array {
        return get_object_vars($this);
    }

    public function save(){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO tareas (proyectoId, nombre, descripcion, estado) VALUES (?,?,?,?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param("issi", $this->proyectoId, $this->nombre, $this->descripcion, $this->estado);
        
        $stmt->execute();

        if ($stmt->affected_rows){
            $this->id = $stmt->insert_id;
            $flag = true; 
        }

        $stmt->close(); 
        $db->close();

        return $flag; 
    }

    public function update() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "UPDATE tareas SET proyectoId = ?, nombre = ?, descripcion = ?, estado = ? WHERE id = ?"; 
        $stmt = $db->prepare($query);
        $stmt->bind_param("issii", $this->proyectoId, $this->nombre, $this->descripcion, $this->estado, $this->id);
        
        $stmt->execute();

        if ($stmt->affected_rows){
            $flag = true; 
        }

        $stmt->close(); 
        $db->close();

        return $flag; 
    }

    public static function getByProyectId($proyectoId){
        $dato = [];
        $db = DbConnection::getDbConnection(); 
        $query = "SELECT * FROM tareas WHERE proyectoId = ?";
        $stmt = $db->prepare($query); 
        $stmt->bind_param("i", $proyectoId);
        $stmt->execute(); 

        $resultado = $stmt->get_result();

        while ($value = $resultado->fetch_assoc()) {
            $dato[] = new Tarea($value);
        }

        $stmt->close();
        $db->close();
        
        return $dato; 
    }

    public static function crearObjeto($dato){
        return new Tarea($dato);
    }

    //getters and setters
    public function setId ($id){
        $this->id = $id;
    }
    
    public function getIdsetId () {
        return $this->id;
    }

    public function setProyectoId ($proyectoId){
        $this->proyectoId = $proyectoId;
    }
    
    public function getProyectoId () {
        return $this->proyectoId;
    }

    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombresetNombre () {
        return $this->nombre;
    }

    public function setDescripcion ($descripcion){
        $this->descripcion = $descripcion;
    }
    
    public function getDescripcion () {
        return $this->descripcion;
    }

    public function setEstado ($estado){
        $this->estado = $estado;
    }
    
    public function getEstado () {
        return $this->estado;
    }
}