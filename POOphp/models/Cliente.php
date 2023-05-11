<?php
namespace models; 
class Cliente {
    private string $id; 
    private string $nombre;  
    private Direccion $direccion; 

    public function __construct(string $id, string $nombre,Direccion $direccion){
        $this->id = $id; 
        $this->nombre = $nombre; 
        $this->direccion = $direccion; 
    }

    public function getInfoCliente(): string{
        return "id: $this->id, nombre: $this->nombre<br>Dirección: " . $this->direccion->getInfoDireccion();  
    }
    //getters and setters
}