<?php 

namespace Model; 

use DbConnection; 

class Registro extends ActiveRecord {
    protected static $table = "registros"; 
    protected $id; 
    private $usuarioId; 
    private $paqueteId; 
    private $pagoId; 
    private $token; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->usuarioId = $args['usuarioId'] ?? null;
        $this->paqueteId = $args['paqueteId'] ?? null;
        $this->pagoId = $args['pagoId'] ?? null;
        $this->token = $args['token'] ?? '';
    }

    public function save(){
        $flag = false;
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO registros (usuarioId, paqueteId, pagoId, token) VALUES (?,?,?,?)";

        $stmt = $db->prepare($query);

        $stmt->bind_param("iiis", $this->usuarioId, $this->paqueteId, $this->pagoId, $this->token);

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

        $query = "UPDATE registros SET usuarioId = ?, paqueteId = ?, pagoId = ?, token = ? WHERE id = ?";

        $stmt = $db->prepare($query);

        $stmt->bind_param("iiisi", $this->usuarioId, $this->paqueteId, $this->pagoId, $this->token, $this->id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;
        }

        $stmt->close();
        $db->close();
        return $flag;
    }

    public static function crearObjeto($data){
        $data['usuarioId'] = Usuario::getById($data['usuarioId']);
        $data['paqueteId'] = Paquete::getById($data['paqueteId']);
        return new Registro($data);
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

    public function setPaqueteId ($paqueteId){
        $this->paqueteId = $paqueteId;
    }
    
    public function getPaqueteId () {
        return $this->paqueteId;
    }

    public function setPagoId ($pagoId){
        $this->pagoId = $pagoId;
    }
    
    public function getPagoId () {
        return $this->pagoId;
    }

    public function setToken ($token){
        $this->token = $token;
    }
    
    public function getToken () {
        return $this->token;
    }
}
