<?php 
namespace app; 

class Propiedad {
    private $id; 
    private $vendedorId;
    private $titulo; 
    private $precio; 
    private $imagen; 
    private $descripcion; 
    private $habitaciones;
    private $wc; 
    private $estacionamineto;  
    private $creado; 

    public function __construct($args = []) {
        $this->id = $args['id'] ?? ''; 
        $this->vendedorId = $args['vendedorId'] ?? ''; 
        $this->titulo = $args['titulo'] ?? ''; 
        $this->precio = $args['precio'] ?? ''; 
        $this->imagen = $args['imagen'] ?? ''; 
        $this->habitaciones = $args['habitaciones'] ?? ''; 
        $this->wc = $args['wc'] ?? ''; 
        $this->estacionamineto = $args['estacionamineto'] ?? ''; 
        $this->creado = $args['creado'] ?? ''; 
    }

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
        return $this->estacionamineto; 
    }
    public function setEstacionamiento($estacionamineto) {
        $this->estacionamineto = $estacionamineto; 
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