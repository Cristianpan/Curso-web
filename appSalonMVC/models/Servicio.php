<?php 
    namespace Model; 
    use DbConnection;
use JsonSerializable;

    class Servicio extends ActiveRecord implements JsonSerializable {
        protected static $table = "servicios"; 
        protected $id; 
        private $nombre; 
        private $precio; 

        public function __construct($args = []) {
            $this->id = $args['id'] ?? '';
            $this->nombre = $args['nombre'] ?? '';
            $this->precio = $args['precio'] ?? '';
        }

        public function jsonSerialize():array {
            return [
                'id' => $this->id,
                'nombre' => $this->nombre, 
                'precio' => $this->precio
            ];
        }

        public function save (){
            $flag = false; 
            $db = DbConnection::getDbConnection();
    
            $query = "INSERT INTO servicios (nombre, precio) 
            VALUES (?,?)";
            
            $stmt = $db->prepare($query);  
            
            $stmt->bind_param("sd",$this->nombre, $this->precio);
    
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
    
            $query = "UPDATE servicios SET nombre = ?, precio = ? WHERE id = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("sdi",$this->nombre, $this->precio, $this->id);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                $flag = true;  
            }
            
            $stmt->close();
            $db->close();
            return $flag;
        }

        public static function crearObjeto($args){
            return new Servicio($args);
        }

        //setters y getters
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

        public function setPrecio ($precio){
            $this->precio = $precio;
        }
        
        public function getPrecio () {
            return $this->precio;
        }
    }