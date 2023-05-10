<?php   
include 'includes/header.php'; 

use models\Cliente;
use models\Direccion;
/*
function miAutoLoad($clase) {
    $partes = explode("\\", $clase); 

    require "models/$partes[1].php"; 
}

  //Carga de forma automática las clases conforme las vayamos requiriendo, de acuerdo 
  //al auto loader que ha sido creado; 
spl_autoload_register('miAutoLoad');  */

require 'vendor/autoload.php'; 


$cliente = new Cliente("12345", "Cristian", new Direccion("31", "87312", "México")); 
echo $cliente->getInfoCliente() . "<br>";


include 'includes/footer.php'; 
