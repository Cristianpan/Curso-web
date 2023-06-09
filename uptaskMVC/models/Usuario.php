<?php 
namespace Model; 
use DbConnection; 

class Usuario extends ActiveRecord {
    protected static $table = "usuarios";
    protected $id; 
    private $nombre; 
    private $email; 
    private $password; 
    private $token; 
    private $confirmado; 

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null; 
        $this->nombre = $args['nombre'] ?? ''; 
        $this->email = $args['email'] ?? ''; 
        $this->password = $args['password'] ?? ''; 
        $this->token = $args['token'] ?? null; 
        $this->confirmado = $args['confirmado'] ?? 0; 
    }

    public function save(){
        $flag = false; 
        $db = DbConnection::getDbConnection();
        $query = "INSERT INTO usuarios (nombre, email, password, token, confirmado) VALUES (?,?,?,?, ?)";

        $stmt = $db->prepare($query);

        $stmt->bind_param("ssssi", $this->nombre, $this->email, $this->password, $this->token, $this->confirmado);

        $stmt->execute();

        if ($stmt->affected_rows){
            $flag = true; 
        }

        $stmt->close();
        $db->close();

        return $flag; 
    }

    public function update(){
        $flag = false; 
        $db = DbConnection::getDbConnection();
        $query = "UPDATE usuarios SET nombre = ?, email = ?, password = ?, token = ?, confirmado = ? WHERE id = ?";

        $stmt = $db->prepare($query);

        $stmt->bind_param("ssssii", $this->nombre, $this->email, $this->password, $this->token, $this->confirmado, $this->id);

        $stmt->execute();

        if ($stmt->affected_rows){
            $flag = true; 
        }
        
        $stmt->close();
        $db->close();

        return $flag; 
    }

    public function existeCorreoRegistrado() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
        $stmt = $db->prepare($query);

        $stmt->bind_param("s", $this->email);

        $stmt->execute();

        $stmt->bind_result($count);
        $stmt->fetch();
        
        if ($count) {
            $flag = true; 
        }
        return $flag; 
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
    }

    public static function crearObjeto($dato){
        return new Usuario($dato);
    }

    //setters and getters
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

    public function setEmail ($email){
        $this->email = $email;
    }
    
    public function getEmail () {
        return $this->email;
    }

    public function setPassword ($password){
        $this->password = $password;
    }
    
    public function getPassword () {
        return $this->password;
    }

    public function setToken ($token){
        $this->token = $token;
    }
    
    public function getToken () {
        return $this->token;
    }

    public function setConfirmado ($confirmado){
        $this->confirmado = $confirmado;
    }
    
    public function getConfirmado () {
        return $this->confirmado;
    }

}