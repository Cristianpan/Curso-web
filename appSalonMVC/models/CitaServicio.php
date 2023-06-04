<?php 
    namespace Model; 
    use DbConnection;

    class CitaServicio extends ActiveRecord {
        protected static $table = 'citasservicios'; 
        protected $id; 
        private $citaId; 
        private $servicioId; 

        public function __construct($args = []){
            $this->id = $args['id'] ?? ''; 
            $this->citaId = $args['citaId'] ?? ''; 
            $this->servicioId = $args['servicioId'] ?? ''; 
        }

        public function save (){
            $flag = false; 
            $db = DbConnection::getDbConnection();
    
            $query = "INSERT INTO citasservicios (citaId, servicioId) 
            VALUES (?,?)";
            
            $stmt = $db->prepare($query);  
            
            $stmt->bind_param("ii", $this->citaId, $this->servicioId);
    
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
    
            $query = "UPDATE citasservicios SET citaId = ?, servicioId= ?  WHERE id = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("iii",$this->citaId, $this->servicioId, $this->id);
            $stmt->execute();
    
            if ($stmt->affected_rows > 0) {
                $flag = true;  
            }
            
            $stmt->close();
            $db->close();
            return $flag;
        }
    
        public static function crearObjeto($dato){
            return new CitaServicio($dato);
        }


        public function setId ($id){
            $this->id = $id;
        }
        
        public function getId () {
            return $this->id;
        }

        public function setCitaId ($citaId){
            $this->citaId = $citaId;
        }
        
        public function getCitaId () {
            return $this->citaId;
        }

        public function setServicioId ($servicioId){
            $this->servicioId = $servicioId;
        }
        
        public function getServicioId () {
            return $this->servicioId;
        }
    }