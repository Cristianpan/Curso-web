<?php

namespace Model;

use DbConnection;

class AdminCitas
{
    private $id;
    private $hora;
    private $cliente;
    private $email;
    private $telefono;
    private $servicio;
    private $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->cliente = $args['cliente'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->servicio = $args['servicio'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }


    public static function getByFecha($fecha){
        $flag = false; 
        $db = DbConnection::getDbConnection();

        $query = "SELECT citas.id, citas.hora, CONCAT( usuarios.nombre, ' ', usuarios.apellido) as cliente, ";
        $query .= " usuarios.email, usuarios.telefono, servicios.nombre as servicio, servicios.precio  ";
        $query .= " FROM citas  ";
        $query .= " LEFT OUTER JOIN usuarios ";
        $query .= " ON citas.usuarioId=usuarios.id  ";
        $query .= " LEFT OUTER JOIN citasServicios ";
        $query .= " ON citasServicios.citaId=citas.id ";
        $query .= " LEFT OUTER JOIN servicios ";
        $query .= " ON servicios.id=citasServicios.servicioId ";
        $query .= " WHERE fecha =  ? ";

        $stmt = $db->prepare($query);

        $stmt->bind_param("s", $fecha);

        $stmt->execute();

        
        $resultado = $stmt->get_result();
        $array = [];
        while ($dato = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($dato); 
        }

        $stmt->close(); 
        $db->close();
        return $array;
    }

    public static function crearObjeto($dato){
        return new AdminCitas($dato);
    }


    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setHora($hora){
        $this->hora = $hora;
    }

    public function getHora(){
        return $this->hora;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function setServicio($servicio){
        $this->servicio = $servicio;
    }

    public function getServicio(){
        return $this->servicio;
    }

    public function setPrecio($precio){
        $this->precio = $precio;
    }

    public function getPrecio(){
        return $this->precio;
    }
}
