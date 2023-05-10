<?php
class Direccion {
    private string $calle;
    private string $codigoPostal; 
    private string $colonia; 
    
    public function __construct(string $calle, string $codigoPostal, string $colonia){
        $this->calle = $calle; 
        $this->codigoPostal = $codigoPostal; 
        $this->colonia = $colonia; 
    }

    public function getInfoDireccion(): string {
        return "Calle $this->calle, codigo postal $this->codigoPostal, colonia $this->colonia"; 
    }

    //getters and setters; 
}