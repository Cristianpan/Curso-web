<?php 
namespace Model; 

use DbConnection; 

class Dia extends ActiveRecord {
    protected static $table = 'dias';
    protected $id; 
    private $nombre; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? null; 
        $this->nombre = $args['nombre'] ?? '';
    }

    public function save(){
        $flag = false; 
        $db = DbConnection::getDbConnection(); 
        $query = "INSERT INTO dias (nombre) VALUES (?)";

        $stmt = $db->prepare($query);

        $stmt->bind_param("s", $this->nombre);
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
        $query = "UPDATE dias SET nombre = ? WHERE id = ?";

        $stmt = $db->prepare($query);

        $stmt->bind_param("si", $this->nombre, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;

    }

    public static function crearObjeto($dato){
        return new Categoria($dato);
    }
    
    public function setId ($id){
        $this->id = $id;
    }
    
    public function getId () {
        return $this->id;
    }

    public function setNombre ($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre () {
        return $this->nombre;
    }

}