<?php 
namespace Model; 
use DbConnection;

class Ponente extends ActiveRecord {
    protected static $table = 'ponentes'; 
    protected $id; 
    private $nombre;
    private $apellido; 
    private $ciudad; 
    private $pais; 
    private $imagen; 
    private $tags; 
    private $redes; 

    public function __construct($args = []){
        $this->id = $args['id'] ?? null; 
        $this->nombre = $args['nombre'] ?? ''; 
        $this->apellido = $args['apellido'] ?? ''; 
        $this->ciudad = $args['ciudad'] ?? ''; 
        $this->pais = $args['pais'] ?? ''; 
        $this->imagen = $args['imagen'] ?? ''; 
        $this->tags = $args['tags'] ?? ''; 
        $this->redes = $args['redes'] ?? ''; 
    }
    public function save() {
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "INSERT INTO ponentes (nombre, apellido, ciudad, pais, imagen, tags, redes) VALUES (?,?,?,?,?,?,?)";
        
        $stmt = $db->prepare($query);  
        
        $stmt->bind_param("sssssss",$this->nombre, $this->apellido, $this->ciudad, $this->pais, $this->imagen, $this->tags, $this->redes);

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

        $query = "UPDATE ponentes SET nombre = ?, apellido = ?, ciudad = ?, pais = ?, imagen = ?, tags = ?, redes = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("sssssssi",$this->nombre, $this->apellido, $this->ciudad, $this->pais, $this->imagen, $this->tags, $this->redes, $this->id);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }

    public static function crearObjeto($dato){
        return new Ponente($dato);
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

    public function setCiudad ($ciudad){
        $this->ciudad = $ciudad;
    }
    
    public function getCiudad () {
        return $this->ciudad;
    }

    public function setPais ($pais){
        $this->pais = $pais;
    }
    
    public function getPais () {
        return $this->pais;
    }

    public function setImagen ($imagen){
        $this->imagen = $imagen;
    }
    
    public function getImagen () {
        return $this->imagen;
    }

    public function setTags ($tags){
        $this->tags = $tags;
    }
    
    public function getTags () {
        return $this->tags;
    }

    public function setRedes ($redes){
        $this->redes = $redes;
    }
    
    public function getRedes () {
        return $this->redes;
    }
}