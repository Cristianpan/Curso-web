<?php 
namespace Model; 
use DbConnection;

class Usuario extends ActiveRecord {
    protected static $table = "usuarios";

    protected $id; 
    private $nombre; 
    private $apellido; 
    private $email; 
    private $password; 
    private $admin; 
    private $confirmado; 
    private $token; 

    public function __construct($args = []) {
        $this->id = $args["id"] ?? "";
        $this->nombre = $args["nombre"] ?? "";
        $this->apellido = $args["apellido"] ?? "";
        $this->email = $args["email"] ?? "";
        $this->password = $args["password"] ?? "";
        $this->admin = $args["admin"] ?? 0;
        $this->confirmado = $args["confirmado"] ?? 0;
        $this->token = $args["token"] ?? "";
    }

    public static function crearObjeto($dato){
        return new Usuario($dato);
    }

    public function save() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO usuarios (nombre, apellido, email, password, admin, confirmado, token) 
        VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("ssssiis",$this->nombre, $this->apellido, $this->email, $this->password, $this->admin, $this->confirmado, $this->token);

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

        $query = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, password = ?, telefono = ?, admin = ?, confirmado = ?, token = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("ssssiisi",$this->nombre, $this->apellido, $this->email, $this->password, $this->admin, $this->confirmado, $this->token, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }

    public function hashPassword() {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    public function crearToken(){
        $this->token = uniqid();
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
    
    //setter and getters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre () {
        return $this->nombre;
    }

    public function setNombre ($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellido () {
        return $this->apellido;
    }

    public function setApellido ($apellido){
        $this->apellido = $apellido;
    }

    public function setEmail ($email){
        $this->$email = $email;
    }

    public function getEmail () {
        return $this->email;
    }

    public function getPassword () {
        return $this->password;
    }

    public function setPassword ($password){
        $this->password = $password;
    }

    public function getAdmin(){
        return $this->admin; 
    }

    public function setAdmin ($admin){
        $this->admin = $admin;
    }

    public function getConfirmado () {
        return $this->confirmado;
    }

    public function setConfirmado ($confirmado){
        $this->confirmado = $confirmado;
    }

    public function getToken () {
        return $this->token;
    }

    public function setToken ($token){
        $this->token = $token;
    }

}