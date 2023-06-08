<?php 
namespace Model;

use DbConnection;
use Model\ActiveRecord;

class Proyecto extends ActiveRecord {
    protected static $table = 'proyectos'; 
    protected $id; 
    private $usuarioId; 
    private $proyecto; 
    private $url; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? ''; 
        $this->usuarioId = $args['usuarioId'] ?? ''; 
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