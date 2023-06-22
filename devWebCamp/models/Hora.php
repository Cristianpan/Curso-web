<?php 

namespace Model; 

use DbConnection; 

class Hora extends ActiveRecord {
    protected static $table = 'horas';
    protected $id; 
    private $hora; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? null; 
        $this->hora = $args['hora'] ?? '';
    }

    public function save(){
        $flag = false; 
        $db = DbConnection::getDbConnection(); 
        $query = "INSERT INTO horas (hora) VALUES (?)";

        $stmt = $db->prepare($query);

        $stmt->bind_param("s", $this->hora);
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
        $query = "UPDATE dias SET hora = ? WHERE id = ?";

        $stmt = $db->prepare($query);

        $stmt->bind_param("si", $this->hora, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;

    }

    public static function crearObjeto($dato){
        return new Hora($dato);
    }
    
    public function setId ($id){
        $this->id = $id;
    }
    
    public function getId () {
        return $this->id;
    }

    public function setHora ($hora){
        $this->hora = $hora;
    }
    
    public function getHora () {
        return $this->hora;
    }
}