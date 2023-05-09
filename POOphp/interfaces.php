<?php include 'includes/header.php';
interface Hablar {
    public function getModoDeHabla(): string;  
}

class Persona implements Hablar {
    public function getModoDeHabla(): string {
        return "Yo hablo normal"; 
    }
}

class Perro implements Hablar {
    public function getModoDeHabla(): string
    {
        return "Yo ladro"; 
    }
}

$persona = new Persona(); 
$perro = new Perro(); 

echo "Persona: " . $persona->getModoDeHabla() . "<br>"; 
echo "Perro: " . $perro->getModoDeHabla() . "<br>"; 

include 'includes/footer.php';