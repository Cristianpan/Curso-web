<?php

declare(strict_types = 1); 
include 'includes/header.php';

class Alumno {
      /**
     * modificadores de acceso 
     * private, public, protected
     */
    private $nombre; 
    private $matricula; 
    //constructor
    public function __construct(string $nombre, string $matricula){
        $this->nombre = $nombre; 
        $this->matricula = $matricula; 
    }

    public function getInfoAlumno() {
        return "Nombre: $this->nombre, Matricula: $this->matricula"; 
    }
    

    //getters and setters
    public function getNombre(): string {
        return $this->nombre; 
    }
    
    public function setNombre(string $nombre){
        $this->nombre = $nombre; 
    }
    
    public function setMatricula(string $matricula) {
        $this->matricula = $matricula; 
    }
    public function getMatricula() {
        return $this->matricula; 
    }
}

class Escuela {
    private static $nombre = "UADY"; 
    private static $telefono = "123456789"; 
    private $alumnos = []; 

    public function __construct(array $alumnos) {
        $this->alumnos = $alumnos; 
    }

    public static function obtenerInfoEscuela(): string {
        return "Nombre de la Escuela: " . self::$nombre  . ", Tel:" .  self::$telefono . "<br>";  
    }

    public function getAlumnos(): array {
        return $this->alumnos; 
    }

    public function getTelefono() {
        return $this->telefono; 
    }
    public function getNombre() {
        return $this->nombre; 
    }
}

$alumnos[] = new Alumno("Cristian", "16003566");  
$alumnos[] = new Alumno("Mauricio", "16002067");  
$alumnos[] = new Alumno("Mauricio", "16002067");  

$escuela = new Escuela($alumnos);

$escuelaAlumnos = $escuela->getAlumnos(); 

//llamada al metodo estático  
echo Escuela::obtenerInfoEscuela(); 
echo "Alumnos <br>";
foreach($escuelaAlumnos as $alumno) {
    echo $alumno->getInfoAlumno() . "<br>"; 
}


include 'includes/footer.php';