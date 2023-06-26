<?php

namespace Model;
use Model\ActiveRecord;
use DbConnection;

class EventoRegistro extends ActiveRecord {

    protected static $table = 'eventosregistros';
    protected $id; 
    private $eventoId; 
    private $registroId; 

    public function __construct($args = []) {
        $this->id = $args['id'] ?? ''; 
        $this->eventoId = $args['eventoId'] ?? ''; 
        $this->registroId = $args['registroId'] ?? '';         
    }


    public function save (){
        $flag = false;
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO eventosregistros (eventoId, registroId) VALUES (?,?)";

        $stmt = $db->prepare($query);

        $stmt->bind_param("ii", $this->eventoId, $this->registroId);

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

        $query = "UPDATE eventosregistros SET eventoId = ?, registroId = ? WHERE id = ?";

        $stmt = $db->prepare($query);

        $stmt->bind_param("ii", $this->eventoId, $this->registroId, $this->id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;
        }

        $stmt->close();
        $db->close();
        return $flag;
    }

    public static function crearObjeto($dato){
        return new EventoRegistro($dato);
    }

    public function setId ($id){
        $this->id = $id;
    }
    
    public function getId () {
        return $this->id;
    }

    public function setEventoId ($eventoId){
        $this->eventoId = $eventoId;
    }
    
    public function getEventoId () {
        return $this->eventoId;
    }


    public function setRegistroId ($registroId){
        $this->registroId = $registroId;
    }
    
    public function getRegistroId () {
        return $this->registroId;
    }





}