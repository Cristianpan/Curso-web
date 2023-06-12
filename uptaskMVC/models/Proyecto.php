<?php 
namespace Model;

use DbConnection;
use JsonSerializable;
use Model\ActiveRecord;

class Proyecto extends ActiveRecord implements JsonSerializable{
    protected static $table = 'proyectos'; 
    protected $id; 
    private $usuarioId; 
    private $proyecto; 
    private $url; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? null; 
        $this->usuarioId = $args['usuarioId'] ?? null; 
        $this->proyecto = $args['proyecto'] ?? ''; 
        $this->url = $args['url'] ?? ''; 
    }

    public function save() {
        $flag = false; 
        $db = DbConnection::getDbConnection();
        $query = "INSERT INTO proyectos (usuarioId, proyecto, url) VALUES (?,?,?)";

        $stmt = $db->prepare($query);
        $stmt->bind_param("iss", $this->usuarioId, $this->proyecto, $this->url);
        $stmt->execute(); 

        if ($stmt->affected_rows) {
            $flag = true; 
        }

        $stmt->close();
        $db->close();

        return $flag;
    }

    public function jsonSerialize(): array {
        return get_object_vars($this);
    }

    public function update() {
        $flag = false; 
        $db = DbConnection::getDbConnection();
        $query = "UPDATE proyectos SET usuarioId = ?, proyecto = ?, url = ? WHERE id = ?";

        $stmt = $db->prepare($query);
        $stmt->bind_param("issi", $this->usuarioId, $this->proyecto, $this->url, $this->id);
        $stmt->execute(); 

        if ($stmt->affected_rows) {
            $flag = true; 
        }

        $stmt->close();
        $db->close();
        
        return $flag;
    }

    public static function getByUsuarioId($usuarioId){
        $dato = [];
        $db = DbConnection::getDbConnection(); 
        $query = "SELECT * FROM proyectos WHERE usuarioId = ?";
        $stmt = $db->prepare($query); 
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute(); 

        $resultado = $stmt->get_result();

        while ($value = $resultado->fetch_assoc()) {
            $dato[] = new Proyecto($value);
        }

        $stmt->close();
        $db->close();
        
        return $dato; 
    }

    public static function crearObjeto($dato){
        return new Proyecto($dato);
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

    public function setProyecto ($proyecto){
        $this->proyecto = $proyecto;
    }
    
    public function getProyecto () {
        return $this->proyecto;
    }

    public function setUrl ($url){
        $this->url = $url;
    }
    
    public function getUrl () {
        return $this->url;
    }
}