<?php include 'includes/header.php';
//herencia 

abstract class Transporte {
    private $ruedas; 
    private $capacidad; 

    public function __construct(int $ruedas, int $capacidad) {  
       $this->ruedas = $ruedas;   
       $this->capacidad = $capacidad;   
    }

    abstract public function getModoDeArranque(): string; 

    public function getInfo(): string {
        return "Ruedas: $this->ruedas, Capacidad: $this->capacidad"; 
    }

    public function getRuedas():int {
        return $this->ruedas; 
    }

    public function getCapacidad(): int {
        return $this->capacidad; 
    }
}

class Bicicleta extends Transporte {
    public function __construct(int $ruedas, int $capacidad){
        parent::__construct($ruedas, $capacidad); 
    }

    public function getModoDeArranque(): string{
        return "Pedaleada";
    }
}

class Automovil extends Transporte {
    private $puertas;

    public function __construct(int $ruedas, int $capacidad, string $puertas){
        parent::__construct($ruedas, $capacidad); 
        $this->puertas = $puertas; 
    }

    public function getModoDeArranque(): string {
        return "Arranque con motor";
    }
    
    public function getInfo(): string {
        return parent::getInfo() .  ", Puertas: $this->puertas"; 
    }

    public function getPuertas(): int {
        return $this->puertas; 
    }
}

$auto = new Automovil(4, 4, 4); 
$bici = new Bicicleta(2,1); 
/**
 * Se aplica el polimorfismo dado que a pesar de que ambos objetos tienen el mismo método,
 * cada uno lo implementa de forma diferenta, por ende, el resultado es diferente; 
 * El polimorfismo se puede aplicar entre clases que heredan de la clase u clases que implementan una misma inerfaz
 */
echo "Auto: " . $auto->getInfo() . "<br>"; 
echo "Bicileta: " . $bici->getInfo() . "<br>"; 




include 'includes/footer.php';