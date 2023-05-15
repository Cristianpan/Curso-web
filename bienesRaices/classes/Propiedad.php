<?php 
namespace App;
use App\ActiveRecord;
use DbConnection;


class Propiedad extends ActiveRecord {   
    protected static $table = 'propiedades';
    protected $id; 
    private $vendedorId;
    private $titulo; 
    private $precio; 
    private $imagen; 
    private $descripcion; 
    private $habitaciones;
    private $wc; 
    private $estacionamiento;  
    private $creado; 

    public function __construct($args = []) {
        $this->id = $args['id'] ?? ''; 
        $this->vendedorId = $args['vendedorId'] ?? ''; 
        $this->titulo = $args['titulo'] ?? ''; 
        $this->precio = $args['precio'] ?? ''; 
        $this->imagen = $args['imagen'] ?? ''; 
        $this->habitaciones = $args['habitaciones'] ?? ''; 
        $this->descripcion = $args['descripcion'] ?? ''; 
        $this->wc = $args['wc'] ?? ''; 
        $this->estacionamiento = $args['estacionamiento'] ?? ''; 
        $this->creado = $args['creado'] ?? date('Y/m/d'); 
    }


    public function save(){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        //creacion de query
        $query = "INSERT INTO propiedades (vendedorId, titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado) 
        VALUES (?,?,?,?,?,?,?,?,?)";
        //creando el prepared statement
        $stmt = $db->prepare($query);  
        //dandole valores al prepared statement
        $stmt->bind_param("isdssiiis", $this->vendedorId, $this->titulo, $this->precio, $this->imagen, $this->descripcion, $this->habitaciones, $this->wc, $this->estacionamiento, $this->creado);

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

        $query = "UPDATE propiedades SET vendedorId = ?, titulo = ?, imagen = ?, precio = ?, descripcion = ?, habitaciones = ?, wc = ?, estacionamiento = ? WHERE id = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("issdsiiii", $this->vendedorId, $this->titulo,$this->imagen, $this->precio, $this->descripcion, $this->habitaciones, $this->wc, $this->estacionamiento, $this->id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $flag = true;  
        }
        
        $stmt->close();
        $db->close();
        return $flag;
    }
    
    public static function crearObjeto($dato){
        return new Propiedad($dato);
    }

    //getters and setters
    public function getId() {
        return $this->id; 
    }
    public function setId($id) {
        $this->id = $id; 
    }

    public function getVendedorId() {
        return $this->vendedorId; 
    }
    public function setVendedorId($vendedorId) {
        $this->vendedorId = $vendedorId; 
    }

    public function getPrecio() {
        return $this->precio; 
    }
    public function setPrecio($precio) {
        $this->precio = $precio; 
    }

    public function getImagen() {
        return $this->imagen; 
    }
    public function setImagen($imagen) {
        $this->imagen = $imagen; 
    }

    public function getTitulo() {
        return $this->titulo; 
    }
    public function setTitulo($titulo) {
        $this->titulo = $titulo; 
    }

    public function getHabitaciones() {
        return $this->habitaciones; 
    }
    public function setHabitaciones($habitaciones) {
        $this->habitaciones = $habitaciones; 
    }

    public function getWc() {
        return $this->wc; 
    }
    public function setWc($wc) {
        $this->wc = $wc; 
    }

    public function getEstacionamiento() {
        return $this->estacionamiento; 
    }
    public function setEstacionamiento($estacionamiento) {
        $this->estacionamiento = $estacionamiento; 
    }
    
    public function getCreado() {
        return $this->creado; 
    }
    public function setCreado($creado) {
        $this->creado = $creado; 
    }

    public function getDescripcion() {
        return $this->descripcion; 
    }
    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion; 
    }
}